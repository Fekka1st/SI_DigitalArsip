<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\kategori;
use App\Models\aktifitas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;


class kategoricontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['kategori'] = kategori::orderBy('id', 'desc')->get();
        return view('kelolakategori.kategori')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelolakategori.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //	
        $validator = Validator::make($request->all(), [
            'namakategori' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            abort(403, 'Data Tidak boleh kosong');
        }
        $kategori = kategori::create([
            'Nama_Kategori' => $request->namakategori,
            'Keterangan' => $request->keterangan
        ]);

        $aktifitas = aktifitas::create([
            'aktifitas' => 'Tambah Kategori'.' - '. $request->namakategori ,
            'Staff' => auth()->user()->name
        ]);
        return redirect('/kategori')->with('success', 'Data berhasil diisi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**.
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $kategori = DB::table('kategoris')->where('id', $id)->get();
        return view('kelolakategori.update', ['kategori' => $kategori]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'namakategori' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            abort(403, 'Data Tidak boleh kosong');
        }
        $kategori = kategori::where('id', $request->id)
            ->update(
                ['Nama_Kategori' => $request->namakategori, 'Keterangan' => $request->keterangan]
            );


        $aktifitas = aktifitas::create([
            'aktifitas' => 'Edit Kategori'. ' - '.$request->namakategori,
            'Staff' => auth()->user()->name
        ]);

        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = kategori::find($id);

        $aktifitas = aktifitas::create([
            'aktifitas' => 'Hapus Kategori'. ' - '.$data->Nama_Kategori,
            'Staff' => auth()->user()->name
        ]);
        kategori::destroy($id);

        return Redirect()->back();
    }
}
