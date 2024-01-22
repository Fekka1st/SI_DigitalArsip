<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\aktifitas;
use Illuminate\Http\Request;
use App\Models\departement;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class departmentcontroller extends Controller
{
    //

    public function index(){
        return view('keloladepartment.index');
    }
    public function data()
    {
        $data = departement::orderBy('id', 'desc')->get();
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
        ]);

        // Cek apakah validasi gagal
        if ($validator->fails()) {
            abort(403, 'Data Tidak boleh kosong');
        }
        $request->keterangan = $request->keterangan ?: "";

        $departement = departement::create([
            'nama_departement' => $request->nama,
            'keterangan' => $request->keterangan
        ]);

        $aktifitas = aktifitas::create([
            'aktifitas' => 'Menambahkan Data Departement'. ' - ' . $request->nama ,
            'Staff' => auth()->user()->name
        ]);
        Alert::success('Sukses', 'Data berhasil disimpan!')->persistent(true, false);
        return redirect('/kelola_departement');
    }

    public function edit($id)
    {

        $departement = departement::find($id);
        if (!$departement) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }
        return response()->json(['departement' => $departement]);
    }
    public function update(Request $request, string $id)
    {
        //

        $departement = departement::find($id);
        $request->Keterangan = $request->Keterangan ?: "";
        $aktifitas = aktifitas::create([
            'aktifitas' => 'Mengedit Data Departement'. ' - ' . $departement->nama_departement . ' Ke '. $request->nama,
            'Staff' => auth()->user()->name
        ]);

        $departement->nama_departement = $request->nama;
        $departement->keterangan = $request->Keterangan;
        $departement->update();


        Alert::success('Sukses', 'Data berhasil diedit!')->persistent(true, false);
        return redirect('/kelola_departement');


    }
    public function destroy(string $id)
    {
        //
        $data = departement::find($id);

        $aktifitas = aktifitas::create([
            'aktifitas' => 'Hapus Data Departement'. ' - ' . $data->nama_departement,
            'Staff' => auth()->user()->name
        ]);

        departement::destroy($id);
        Alert::success('Sukses', 'Data berhasil dihapus!');
        return redirect('/kelola_departement');
    }

}
