<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\aktifitas;
use App\Models\kategori;
use App\Models\subkategori;
use Illuminate\Http\Request;
use app\Models\user;
use App\Models\users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KelolauserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['user'] = users::all();
        return view('kelolauser.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['users'] = users::all();
        $data['kategoris'] = kategori::all();
        $data['subkategoris'] = subkategori::all();
        return view('kelolauser.tambah')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        if ($request->hasfile('filename')) {
            $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('filename')->getClientOriginalName());
            $request->file('filename')->move(public_path('img/profile'), $filename);
            users::create(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'no_telp' => $request->notelp,
                    'password' => Hash::make($request->password),
                    'role' => $request->role,
                    'url' => '/img/profile/' . $filename
                ]
            );
            $aktifitas = aktifitas::create([
                'aktifitas' => 'Menambahkan User Baru',
                'Staff' => auth()->user()->name
            ]);
            echo 'Success';
        } else {
            echo 'Gagal';
        }
        return redirect('/kelolauser');
    }

    public function detail(string $id)
    {
        //
        $user = DB::table('users')->where('id', $id)->get();
        return view('kelolauser.detail', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = DB::table('users')->where('id', $id)->get();
        return view('kelolauser.update', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($request->id); // Ganti 'users' dengan 'User' jika modelnya bernama 'User'

        if ($user) {
            // Lakukan validasi untuk inputan berkas
            $request->validate([
                'filename' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Atur sesuai kebutuhan
            ]);
    
            if ($request->hasFile('filename')) {
                // Menghapus file lama jika ada
                $oldFilePath = $user->url;
                if ($oldFilePath && file_exists(public_path($oldFilePath))) {
                    unlink(public_path($oldFilePath));
                }
    
                // Upload file baru
                $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('filename')->getClientOriginalName());
                $request->file('filename')->move(public_path('/img/profile'), $filename);
    
                // Set url baru untuk gambar
                $user->url = '/img/profile/' . $filename;
            }
    
            // Update data lainnya
            $user->name = $request->name;
            $user->email = $request->email;
            $user->no_telp = $request->notelp;
            $user->role = $request->role;
    
            if ($request->filled('password')) {
                // Jika password diisi, update password
                $user->password = Hash::make($request->password);
            }
    
            // Simpan perubahan
            $user->save();
    
            // Buat record aktifitas
            $aktifitas = Aktifitas::create([
                'aktifitas' => 'Edit User Baru - ' . $request->name,
                'Staff' => auth()->user()->name
            ]);
    
            return redirect('/kelolauser')->with('success', 'Data berhasil diupdate!');
        } else {
            // Pengguna dengan ID yang diberikan tidak ditemukan
            abort(404); // Ubah menjadi 404 jika ingin menampilkan halaman error 404
        }
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = users::find($id);

        if ($data->url) {
            $oldFilePath = public_path($data->url);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        $aktifitas = aktifitas::create([
            'aktifitas' => 'Menghapus User '.' - '.$data->name,
            'Staff' => auth()->user()->name
        ]);

        users::destroy($id);

        return Redirect()->back();
    }
}
