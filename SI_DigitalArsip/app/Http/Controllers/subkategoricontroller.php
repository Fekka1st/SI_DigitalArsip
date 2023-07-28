<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subkategori;
use App\Models\aktifitas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SubKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['subkategori'] = subkategori::orderBy('id', 'desc')->get();
        return view('subkategori.subkategori')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('subkategori.tambah');
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
        $subkategori = subkategori::create([
            'Nama_SubKategori' => $request->namakategori,
            'Keterangan' => $request->keterangan
        ]);

        $aktifitas = aktifitas::create([
            'aktifitas' => 'Menambahkan Sub Kategori'.' - '.$request->namakategori,
            'Staff' => auth()->user()->name
        ]);
        return redirect('/sub-kategori')->with('success', 'Created successfully!');
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
        $subkategori = DB::table('subkategoris')->where('id', $id)->get();
        return view('subkategori.update', ['subkategori' => $subkategori]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'namakategori' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            abort(403, 'Data Tidak boleh kosong');
        }
        $subkategori = subkategori::where('id', $request->id)
            ->update(
                ['Nama_SubKategori' => $request->namakategori, 'Keterangan' => $request->keterangan]
            );


        $aktifitas = aktifitas::create([
            'aktifitas' => 'Update Sub Kategori'.' - '. $request->namakategori,
            'Staff' => auth()->user()->name
        ]);

        return redirect('/sub-kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = subkategori::find($id);

        $aktifitas = aktifitas::create([
            'aktifitas' => 'Menghapus Sub Kategori'.' - '.$data->Nama_SubKategori,
            'Staff' => auth()->user()->name
        ]);
        subkategori::destroy($id);

        return Redirect()->back();
    }
}
