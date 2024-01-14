<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\standar;
use App\Models\aktifitas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use DataTables;

class standarcontroller extends Controller
{

    public function index()
    {
        return view('standarisasi.index');
    }

    public function data()
    {
        $data = standar::orderBy('id', 'desc')->get();
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


    public function create()
    {

    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        // Cek apakah validasi gagal
        if ($validator->fails()) {
            abort(403, 'Data Tidak boleh kosong');
        }
        $standar = standar::create([
            'nama_standarisasi' => $request->nama,
            'Keterangan' => $request->keterangan
        ]);

        $aktifitas = aktifitas::create([
            'aktifitas' => 'Menambahkan Data Standarisasi'. ' - ' . $request->nama ,
            'Staff' => auth()->user()->name
        ]);
        Alert::success('Sukses', 'Data berhasil disimpan!')->persistent(true, false);
        return redirect('/kelola_standarisasi');
    }


    public function edit($id)
    {

        $standarisasi = standar::find($id);
        if (!$standarisasi) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }
        return response()->json(['standarisasi' => $standarisasi]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $standar = standar::find($id);
        $aktifitas = aktifitas::create([
            'aktifitas' => 'Mengedit Data Standarisasi'. ' - ' . $standar->nama_standarisasi . ' Ke '. $request->nama,
            'Staff' => auth()->user()->name
        ]);
        $standar->nama_standarisasi = $request->nama;
        $standar->keterangan = $request->Keterangan;
        $standar->update();


        Alert::success('Sukses', 'Data berhasil diedit!')->persistent(true, false);
        return redirect('/kelola_standarisasi');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = standar::find($id);

        $aktifitas = aktifitas::create([
            'aktifitas' => 'Hapus Data Standarisasi'. ' - ' . $data->nama_standarisasi,
            'Staff' => auth()->user()->name
        ]);

        standar::destroy($id);
        Alert::success('Sukses', 'Data berhasil dihapus!');
        return Redirect()->back();
    }
}
