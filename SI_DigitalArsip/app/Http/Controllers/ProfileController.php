<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use APP\models\user;
use App\Models\Aktifitas;
use Auth;
use Illuminate\Support\Facades\Hash;

class profilecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function settings()
    {
        //
        $user = DB::table('users')->where('id', auth()->user()->id)->get();
        return view('profileuser.index', ['user' => $user]);
    }


    public function update(Request $request)
    {
        $id= Auth()->user()->id;
        $user = User::find($id);

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


            if ($request->filled("password")) {
                $user->password = Hash::make($request->password);
            }


            $user->save();

            $aktifitas = Aktifitas::create([
                'aktifitas' => 'Pengaturan Profile - ' . Auth()->user()->name,
                'Staff' => auth()->user()->name
            ]);

            return redirect('/dashboard');
        } else {

            abort(404);
        }

    }
}
