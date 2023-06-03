<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\kategori;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;


class kategoricontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['kategori'] = kategori::all();
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
        $kategori = kategori::create([
            'Nama_Kategori' => $request->namakategori,
            'Keterangan' => $request->keterangan
        ]);
        // Alert::success('Congrats', 'You\'ve Successfully Registered');
        return redirect('/kategori')->with('success', 'Created successfully!');
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
    public function update(Request $request, string $id)
    {
        // kategori::where('id', $id)
        //     ->update([
        //         'Nama_Kategori' => $request->namakategori,
        //         'Keterangan' => $request->keterangan
        //     ]);
        $kategori = kategori::findOrFail(1);

        $kategori->Nama_Kategori = $request->namakategori;
        $kategori->Keterangan = $request->keterangan;
        $kategori->save();
        return Redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        kategori::destroy($id);
        return Redirect()->back();
    }
}