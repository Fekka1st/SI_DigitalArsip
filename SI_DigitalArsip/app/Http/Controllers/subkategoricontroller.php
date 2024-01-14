<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subkategori;
use App\Models\aktifitas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class SubKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return view('subkategori.index');
    }


    public function data()
    {
        $data = subkategori::orderBy('id', 'desc')->get();
        return dataTables()
            ->of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                return
                    ' <div class="btn-group" role="group" aria-label="Basic example">
                    <a type="button" href="#" class="btn btn-warning btn-edit" id="btn-edit" data-toggle="modal"
                        data-target="#editModal" data-id="' . $data->id . '">
                        <i class="fas fa-edit"></i>
                    </a>

                    <button type="button" class="btn btn-danger btn-hapus" id="btn-hapus" data-toggle="modal"
                        data-target="#hapusModal" data-id="' . $data->id . '">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', 'Data tidak sesuai!')->persistent(true, false);
            return redirect('/kelola_sub-kategori');
        }
        $subkategori = subkategori::create([
            'Nama_SubKategori' => $request->nama,
            'Keterangan' => $request->keterangan
        ]);

        $aktifitas = aktifitas::create([
            'aktifitas' => 'Menambahkan Sub-Kategori'.' - '.$request->nama,
            'Staff' => auth()->user()->name
        ]);
        Alert::success('Sukses', 'Data berhasil disimpan!');
        return redirect('/kelola_sub-kategori');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $subkategori = subkategori::find($id);
        if (!$subkategori) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }
        return response()->json(['subkategori' => $subkategori]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'Keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', 'Data tidak sesuai!')->persistent(true, false);
            return redirect('/kelola_sub-kategori');
        }
        $subkategori = subkategori::find($id);
        $aktifitas = aktifitas::create([
            'aktifitas' => 'Mengedit Data Sub-Kategori'. ' - ' . $subkategori->Nama_SubKategori . ' Ke '. $request->nama,
            'Staff' => auth()->user()->name
        ]);

        $subkategori->Nama_SubKategori = $request->nama;
        $subkategori->Keterangan = $request->Keterangan;
        $subkategori->update();
        Alert::success('Sukses', 'Data berhasil diedit!');

        return redirect('/kelola_sub-kategori');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = subkategori::find($id);

        $aktifitas = aktifitas::create([
            'aktifitas' => 'Hapus Data Sub-Kategori'. ' - ' . $data->Nama_SubKategori,
            'Staff' => auth()->user()->name
        ]);

        subkategori::destroy($id);
        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/kelola_sub-kategori');
    }
}
