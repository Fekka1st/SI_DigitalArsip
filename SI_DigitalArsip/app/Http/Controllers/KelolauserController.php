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
        echo $data;
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
                    'url' => 'img/profile/' . $filename
                ]
            );
            $aktifitas = aktifitas::create([
                'aktifitas' => 'Menambahkan User Baru',
                'nama' => $request->name,
                'Staff' => auth()->user()->name
            ]);
            echo 'Success';
        } else {
            echo 'Gagal';
        }
        return redirect('/kelolauser');
    }

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
        $user = DB::table('users')->where('id', $id)->get();
        return view('kelolauser.update', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $oldUser = users::find($request->id);

        if ($oldUser) {
            $oldFilePath = $oldUser->url;

            if ($request->hasFile('filename')) {
                // Menghapus file lama jika ada
                if ($oldFilePath && file_exists(public_path($oldFilePath))) {
                    unlink(public_path($oldFilePath));
                }

                // Upload file baru
                $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('filename')->getClientOriginalName());
                $request->file('filename')->move(public_path('img/profile'), $filename);
            } else {
                // Jika tidak ada file yang diunggah, gunakan url lama
                $filename = $oldUser->url;
            }

            $user = users::where('id', $request->id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'no_telp' => $request->notelp,
                    'password' => Hash::make($request->password),
                    'role' => $request->role,
                    'url' => 'img/profile/' . $filename
                ]);

            $aktifitas = aktifitas::create([
                'aktifitas' => 'Mengupdate User Baru',
                'nama' => $request->name,
                'Staff' => auth()->user()->name
            ]);

            if ($user && $oldFilePath) {
                $oldFilePath = public_path($oldFilePath);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
        } else {
            // Pengguna dengan ID yang diberikan tidak ditemukan
            // Lakukan tindakan yang sesuai, seperti menampilkan pesan error atau mengarahkan pengguna ke halaman yang sesuai.
        }


        return redirect('/kelolauser');
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
            'aktifitas' => 'Menghapus User ',
            'nama' => $data->name,
            'Staff' => auth()->user()->name
        ]);

        users::destroy($id);

        return Redirect()->back();
    }
}
