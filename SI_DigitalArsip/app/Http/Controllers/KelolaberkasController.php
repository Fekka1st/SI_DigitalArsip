<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\aktifitas;
use App\Models\berkas;
use App\Models\kategori;
use App\Models\subkategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\download;

class KelolaberkasController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
        $data['berkas'] = berkas::select('NamaBerkas', 'berkas.id', 'berkas.keterangan', 'berkas.url', 'kategoris.Nama_Kategori', 'subkategoris.Nama_SubKategori', 'users.name', 'berkas.tanggal','standarisasis.nama_standarisasi')
            ->join('users', 'berkas.id_user', '=', 'users.id')
            ->join('kategoris', 'berkas.id_kategori', '=', 'kategoris.id')
            ->join('subkategoris', 'berkas.id_subkategori', '=', 'subkategoris.id')
            ->join('standarisasis','berkas.id_standarisasi','=','standarisasis.id')
            ->get();

        return view('berkas.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //
        $kategori = kategori::all();
        $subkategori =  subkategori::all();
        $user =  User::all();
        return view('berkas.tambah', compact('kategori', 'subkategori', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'filename' => 'required|mimes:docx,pdf,xls,xlsx',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasfile('filename')) {
            $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('filename')->getClientOriginalName());
            $request->file('filename')->move(public_path('document'), $filename);

            $berkas = Berkas::create([
                'NamaBerkas' => $request->NamaBerkas,
                'keterangan' => $request->keterangan,
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $berkas = Berkas::findOrFail($id);
        // Mengambil data berkas berdasarkan ID

        $filePath = public_path($berkas->url);
        // Mendapatkan path file yang akan dihapus

        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $aktifitas = aktifitas::create([
            'aktifitas' => 'Menghapus Berkas'. $berkas->original_name,
            'Staff' => auth()->user()->name
        ]);
        $berkas->delete();
        // Menghapus data berkas dari database

        return redirect('/kelolaberkas')->with('success', 'Data berkas berhasil dihapus.');
    }

    public function download($id)
    {
        $berkas = Berkas::findOrFail($id);
        // Mengambil data berkas berdasarkan ID

        $filePath = public_path($berkas->url);
        // Mendapatkan path file yang akan didownload

        if (file_exists($filePath)) {
            $date = now()->format('Y-m-d'); // Format tanggal saat ini
            $fileName = strtotime($date) . '_' . $berkas->original_name; // Ubah tanggal menjadi epoch dan gabungkan dengan nama asli file

            $download = download::create([
                'namaberkas' => $fileName,
                'namastaff' => auth()->user()->name,
                'tanggal' => now()
            ]);
            return response()->download($filePath, $fileName);
        } else {
            return redirect('/berkas')->with('error', 'Berkas tidak ditemukan.');
        }
    }
}
