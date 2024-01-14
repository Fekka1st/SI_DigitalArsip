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

        return view('kelolakategori.index');
    }

    public function data()
    {
        $data = kategori::orderBy('id', 'desc')->get();
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
            'namakategori' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', 'Data tidak sesuai!')->persistent(true, false);
            return redirect('/kelola_kategori');
        }
        $kategori = kategori::create([
            'Nama_Kategori' => $request->namakategori,
            'Keterangan' => $request->keterangan
        ]);

        $aktifitas = aktifitas::create([
            'aktifitas' => 'Menambahkan Kategori'.' - '. $request->namakategori ,
            'Staff' => auth()->user()->name
        ]);
        Alert::success('Sukses', 'Data berhasil disimpan!');

    return redirect('/kelola_kategori');
    }



    public function edit(string $id)
    {
        //
        $kategori = kategori::find($id);
        if (!$kategori) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }
        return response()->json(['kategori' => $kategori]);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'namakategori' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
        Alert::error('Error', 'Data tidak sesuai!')->persistent(true, false);
        return redirect('/kelola_kategori');
        }

        $kategori = kategori::find($id);
        $aktifitas = aktifitas::create([
            'aktifitas' => 'Mengedit Data Kategori'. ' - ' . $kategori->Nama_Kategori . ' Ke '. $request->namakategori,
            'Staff' => auth()->user()->name
        ]);
        $kategori->Nama_Kategori = $request->namakategori;
        $kategori->keterangan = $request->keterangan;
        $kategori->update();
        Alert::success('Sukses', 'Data berhasil diedit!');

        return redirect('/kelola_kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = kategori::find($id);

        $aktifitas = aktifitas::create([
            'aktifitas' => 'Hapus Data Kategori'. ' - ' . $data->Nama_Kategori,
            'Staff' => auth()->user()->name
        ]);

        kategori::destroy($id);
        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/kelola_kategori');
    }
}
