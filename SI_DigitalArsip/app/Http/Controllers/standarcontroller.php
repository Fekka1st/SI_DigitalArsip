<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\standar;
use App\Models\aktifitas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class standarcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['standar'] = standar::orderBy('id', 'desc')->get();
        return view('standarisasi.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('standarisasi.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'namastandar' => 'required',
            'keterangan' => 'required',
        ]);
    
        // Cek apakah validasi gagal
        if ($validator->fails()) {
            abort(403, 'Data Tidak boleh kosong');
        }
        $standar = standar::create([
            'nama_standarisasi' => $request->namastandar,
            'Keterangan' => $request->keterangan
        ]);

        $aktifitas = aktifitas::create([
            'aktifitas' => 'Tambah Standar'.' - '. $request->namastandar ,
            'Staff' => auth()->user()->name
        ]);
        return redirect('/standar')->with('success', 'Data berhasil diisi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $standar = DB::table('standarisasis')->where('id', $id)->get();
        return view('standarisasi.update', ['standar' => $standar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $validator = Validator::make($request->all(), [
            'namastandar' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            abort(403, 'Data Tidak boleh kosong');
        }
        
        $standar = standar::where('id', $request->id)
        ->update(
            ['nama_standarisasi' => $request->namastandar, 'Keterangan' => $request->keterangan]
        );

        $aktifitas = aktifitas::create([
            'aktifitas' => 'Edit Standar'. ' - '.$request->namastandar,
            'Staff' => auth()->user()->name
        ]);
        return redirect('/standar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = standar::find($id);

        $aktifitas = aktifitas::create([
            'aktifitas' => 'Hapus Standar'. ' - ' . $data->nama_standarisasi,
            'Staff' => auth()->user()->name
        ]);

        standar::destroy($id);

        return Redirect()->back();
    }
}
