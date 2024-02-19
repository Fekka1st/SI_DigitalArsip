<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\berkas;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class Reportberkas extends Controller
{
    //
    public function index()
{
    $berkas = DB::table('standarisasis')
        ->leftJoin('berkas', 'standarisasis.id', '=', 'berkas.id_standarisasi')
        ->select('standarisasis.nama_standarisasi', DB::raw('COALESCE(COUNT(berkas.id), 0) AS jumlah_berkas'))
        ->groupBy('standarisasis.id', 'standarisasis.nama_standarisasi')
        ->get();

        $chart = DB::table('standarisasis')
    ->leftJoin('berkas', 'standarisasis.id', '=', 'berkas.id_standarisasi')
    ->select('standarisasis.nama_standarisasi', DB::raw('COALESCE(COUNT(berkas.id), 0) AS jumlah_berkas'))
    ->groupBy('standarisasis.id', 'standarisasis.nama_standarisasi')
    ->get();

    return view('Report.index', compact('berkas','chart'));
}


    public function show(){

    }

    public function cetak(Request $request){
        $namaUser = auth()->user()->name;
        if (empty($request->mulai) && empty($request->akhir)) {
            $data = DB::table('standarisasis')
            ->leftJoin('berkas', 'standarisasis.id', '=', 'berkas.id_standarisasi')
            ->select('standarisasis.nama_standarisasi', DB::raw('COALESCE(COUNT(berkas.id), 0) AS jumlah_berkas'))
            ->groupBy('standarisasis.id', 'standarisasis.nama_standarisasi')
            ->get();

            $namaUser = auth()->user()->name;

            $pdf = Pdf::loadView('Report.cetak', ['data' => $data ,'namaUser' => $namaUser])->setPaper('a4', 'landscape');
            $pdf->getDomPDF()->getOptions()->setIsHtml5ParserEnabled(true);
            $pdf->getDomPDF()->set_option('isHtml5ParserEnabled', true);
            $pdf->getDomPDF()->set_option('isPhpEnabled', true);

            return $pdf->download('Report-Berkas Tanggal ' . now() . '.pdf');

            }else{

            $validator = Validator::make($request->all(), [
                'mulai' => 'required',
                'akhir' => 'required',
            ]);

            if ($validator->fails()) {
                Alert::error('Error', 'Silahkan isi dengan benar')->persistent(true, false);
                return redirect('/Report');
            }

            // Cetak berdasarkan tanggal
            $mulai = $request->input('mulai');
            $akhir = $request->input('akhir');
            try {
                $mulai = \Carbon\Carbon::createFromFormat('Y-m-d', $mulai)->startOfDay();
                $akhir = \Carbon\Carbon::createFromFormat('Y-m-d', $akhir)->endOfDay();

                $data = DB::table('standarisasis')
                ->leftJoin('berkas', 'standarisasis.id', '=', 'berkas.id_standarisasi')
                ->select('standarisasis.nama_standarisasi', DB::raw('COALESCE(COUNT(berkas.id), 0) AS jumlah_berkas'))
                ->whereBetween('berkas.created_at', [$mulai, $akhir])
                ->groupBy('standarisasis.id', 'standarisasis.nama_standarisasi')
                ->get();

            } catch (\Exception $e) {
                return response()->json(['error' => 'Format tanggal tidak valid'], 400);
            }

            $pdf = Pdf::loadView('Report.cetak', ['data' => $data])->setPaper('a4', 'landscape');
            return $pdf->download('Report-Berkas Tanggal ' . now() . '.pdf');
        }


    }
}
