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
    public function index(){
        $data['berkas'] = DB::table('berkas')
        ->join('users', 'berkas.id_user', '=', 'users.id')
        ->join('kategoris', 'berkas.id_kategori', '=', 'kategoris.id')
        ->join('subkategoris', 'berkas.id_subkategori', '=', 'subkategoris.id')
        ->join('standarisasis','berkas.id_standarisasi','=','standarisasis.id')
        ->orderBy('id','desc')
        ->select(
            'berkas.*',
            'users.name as nama_staff',
            'kategoris.Nama_Kategori',
            'subkategoris.Nama_SubKategori',
            'standarisasis.nama_standarisasi' // Perbaikan: tambahkan nama_standarisasi di sini
        )
        ->get();

    return view('Report.index')->with($data);
    }

    public function show(){

    }

    public function cetak(Request $request){

        // Cetak semua berkas
        if (empty($request->mulai) && empty($request->akhir)) {
            $data = DB::table('berkas')
            ->join('users', 'berkas.id_user', '=', 'users.id')
            ->join('kategoris', 'berkas.id_kategori', '=', 'kategoris.id')
            ->join('subkategoris', 'berkas.id_subkategori', '=', 'subkategoris.id')
            ->join('standarisasis', 'berkas.id_standarisasi', '=', 'standarisasis.id')
            ->select(
                'berkas.*',
                'users.name as nama_staff',
                'kategoris.Nama_Kategori',
                'subkategoris.Nama_SubKategori',
                'standarisasis.nama_standarisasi' // Perbaikan: tambahkan nama_standarisasi di sini
            )
            ->get();

            $pdf = Pdf::loadView('Report.cetak', ['data' => $data])->setPaper('a4', 'landscape');
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

                $data = DB::table('berkas')
                    ->join('users', 'berkas.id_user', '=', 'users.id')
                    ->join('kategoris', 'berkas.id_kategori', '=', 'kategoris.id')
                    ->join('subkategoris', 'berkas.id_subkategori', '=', 'subkategoris.id')
                    ->join('standarisasis','berkas.id_standarisasi','=','standarisasis.id')
                    ->select(
                        'berkas.*',
                        'users.name as nama_staff',
                        'kategoris.Nama_Kategori',
                        'subkategoris.Nama_SubKategori',
                        'standarisasis.nama_standarisasi' // Perbaikan: tambahkan nama_standarisasi di sini
                    )
                    ->whereBetween('berkas.created_at', [$mulai, $akhir])
                    ->get();

            } catch (\Exception $e) {
                // Tangani error jika terjadi kesalahan dalam format tanggal
                dd($mulai, $akhir );
                return response()->json(['error' => 'Format tanggal tidak valid'], 400);
            }

            $pdf = Pdf::loadView('Report.cetak', ['data' => $data])->setPaper('a4', 'landscape');
            return $pdf->download('Report-Berkas Tanggal ' . now() . '.pdf');
        }


    }
}
