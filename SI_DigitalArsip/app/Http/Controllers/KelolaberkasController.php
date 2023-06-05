<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\aktifitas;
use App\Models\berkas;
use App\Models\kategori;
use App\Models\kelolaberkas;
use App\Models\subkategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelolaberkasController extends Controller
{
    //
    public function index()
    {
        $data['berkas'] = berkas::select('NamaBerkas', 'berkas.keterangan', 'berkas.url', 'kategoris.Nama_Kategori', 'subkategoris.Nama_SubKategori', 'users.name', 'berkas.created_at')
            ->join('users', 'berkas.id_user', '=', 'users.id')
            ->join('kategoris', 'berkas.id_kategori', '=', 'kategoris.id')
            ->join('subkategoris', 'berkas.id_subkategori', '=', 'subkategoris.id')
            ->get();

        return view('berkas.index')->with($data);
    }
    public function create()
    {
        //
        $kategori = kategori::all();
        $subkategori =  subkategori::all();
        $user =  User::all();
        return view('berkas.tambah', compact('kategori', 'subkategori', 'user'));
    }
    public function store(Request $request)
    {


        if ($request->hasfile('filename')) {
            $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('filename')->getClientOriginalName());
            $request->file('filename')->move(public_path('document'), $filename);

            $berkas = Berkas::create([
                'NamaBerkas' => 'Menambahkan Berkas Baru',
                'keterangan' => $request->NamaBerkas,
                'id_user' => auth()->user()->id,
                'id_kategori' => $request->id_kategori,
                'id_subkategori' => $request->id_subkategori,
                'url' => 'document/' . $filename,
            ]);

            $aktifitas = aktifitas::create([
                'aktifitas' => 'Menambahkan Berkas Baru',
                'nama' => $request->NamaBerkas,
                'Staff' => auth()->user()->name
            ]);
            echo 'Success';
            return redirect('/kelolaberkas')->with('success', 'Data berkas berhasil disimpan.');
        } else {
            echo 'Gagal';
            return redirect('/kelolaberkas')->with('error', 'Gagal');
        }
    }

    
}
