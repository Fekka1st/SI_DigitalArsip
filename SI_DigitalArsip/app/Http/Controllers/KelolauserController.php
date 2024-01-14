<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\aktifitas;
use App\Models\kategori;
use App\Models\subkategori;
use Illuminate\Http\Request;
use app\Models\user;
use App\Models\users;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class KelolauserController extends Controller
{
    public function index()
    {
        $data["user"] = users::all();
        return view("kelolauser.index")->with($data);
    }
    public function create()
    {
        $data["users"] = users::all();
        $data["kategoris"] = kategori::all();
        $data["subkategoris"] = subkategori::all();
        return view("kelolauser.tambah")->with($data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required",
            "notelp" => "required",
            "jabatan" => "required",
            "password" => "required",
            "role" => "required",
        ]);

        if ($validator->fails()) {
            Alert::error("Error", "Harap isi semua kolom")->persistent(
                true,
                false
            );
            return redirect("/kelolauser");
        }

        if ($request->hasfile("filename")) {
            $validator = Validator::make($request->all(), [
                "filename" => "required|image|mimes:jpg,jpeg,png",
            ]);
            $filename =
                round(microtime(true) * 1000) .
                "-" .
                str_replace(
                    " ",
                    "-",
                    $request->file("filename")->getClientOriginalName()
                );
            $request
                ->file("filename")
                ->move(public_path("img/profile"), $filename);
        } else {
            Alert::error(
                "Error",
                "Terjadi Kesalahan Pada File Foto"
            )->persistent(true, false);
            return redirect("/kelolauser");
        }
        users::create([
            "name" => $request->name,
            "email" => $request->email,
            "no_telp" => $request->notelp,
            "Jabatan" => $request->jabatan,
            "password" => Hash::make($request->password),
            "role" => $request->role,
            "url" => "/img/profile/" . $filename,
        ]);
        $aktifitas = aktifitas::create([
            "aktifitas" => "Menambahkan User Baru",
            "Staff" => auth()->user()->name,
        ]);
        Alert::success("Sukses", "Data berhasil disimpan!");
        return redirect("/kelolauser");
    }

    public function detail(string $id)
    {
        $user = DB::table("users")
            ->where("id", $id)
            ->first();

        if ($user) {
            $user->no_telp = str_replace("-", "", $user->no_telp);
            if (substr($user->no_telp, 0, 1) === "0") {
                // Jika ya, rubah menjadi 62
                $user->no_telp = "62" . substr($user->no_telp, 1);
            }

            // Mengirimkan data sebagai JSON
            return Response::json(['user' => $user]);
        } else {
            return Response::json(['error' => 'Terjadi Kesalahan. Harap Hubungi Admin'], 404);
        }
    }

    public function edit(string $id)
    {
        //
        $user = DB::table("users")
            ->where("id", $id)
            ->get();
        return view("kelolauser.update", ["user" => $user]);
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($request->id);

        if ($user) {
            $request->validate([
                "filename" => "image|mimes:jpeg,png,jpg,gif|max:2048",
            ]);

            if ($request->hasFile("filename")) {
                $oldFilePath = $user->url;
                if ($oldFilePath && file_exists(public_path($oldFilePath))) {
                    unlink(public_path($oldFilePath));
                }

                $filename =
                    round(microtime(true) * 1000) .
                    "-" .
                    str_replace(
                        " ",
                        "-",
                        $request->file("filename")->getClientOriginalName()
                    );
                $request
                    ->file("filename")
                    ->move(public_path("/img/profile"), $filename);

                $user->url = "/img/profile/" . $filename;
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->no_telp = $request->notelp;
            $user->role = $request->role;

            if ($request->filled("password")) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            $aktifitas = Aktifitas::create([
                "aktifitas" => "Edit User Baru - " . $request->name,
                "Staff" => auth()->user()->name,
            ]);

            Alert::success("Sukses", "Data berhasil diedit!");
            return redirect("/kelolauser");
        } else {
            abort(404);
        }
    }

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
            "aktifitas" => "Hapus Data User" . " - " . $data->name,
            "Staff" => auth()->user()->name,
        ]);
        Alert::success("Sukses", "Data berhasil dihapus");
        users::destroy($id);
        return redirect("/kelolauser");
    }
}
