<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\aktifitas;
use App\Models\berkas;
use App\Models\departement;
use App\Models\kategori;
use App\Models\subkategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\download;
use App\Models\standar;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Yaza\LaravelGoogleDriveStorage\Gdrive;
class KelolaberkasController extends Controller
{
    public function index()
    {
        $standar = Standar::pluck("nama_standarisasi", "id");
        $kategori = Kategori::pluck("Nama_Kategori", "id");
        $subkategori = Subkategori::pluck("Nama_SubKategori", "id");
        return view(
            "berkas.index",
            compact("standar", "kategori", "subkategori")
        );
    }

    public function data()
    {
        if (Auth()->user()->role == "Admin") {
            $data = Berkas::with([
                "kategori",
                "user",
                "subkategori",
                "standarisasi",
                "department",
            ])
                ->orderBy("id", "desc")
                ->get();
            $data = $data->map(function ($berkas) {
                $berkas->created_at = \Carbon\Carbon::parse(
                    $berkas->created_at
                )->format("Y-m-d H:i:s");
                $berkas->tanggal = \Carbon\Carbon::parse(
                    $berkas->tanggal
                )->format("Y-m-d");

                return $berkas;
            });
            return dataTables()
                ->of($data)
                ->addIndexColumn()
                ->addColumn("aksi", function ($data) {
                    return ' <div class="btn-group" role="group" aria-label="Basic example">
            <a type="button" href="#" class="btn btn-warning btn-edit" id="btn-edit" data-toggle="modal"
                data-target="#editModal" data-id="' .
                        $data->id .
                        '">
                <i class="fas fa-edit"></i>
            </a>
            <a type="button" href="#" class="btn btn-info btn-detail" id="btn-detail" data-toggle="modal"
            data-target="#detailmodal" data-id="' .
                        $data->id .
                        '">
            <i class="fas fa-info"></i>
            </a>
            </a>
            <a type="button" href="/kelolaberkas/download/' .
                        $data->id .
                        '" class="btn btn-primary ">
            <i class="fas fa-download"></i>
            </a>
            <button type="button" class="btn btn-danger btn-hapus" id="btn-hapus" data-toggle="modal"
                data-target="#hapusModal" data-id="' .
                        $data->id .
                        '">
                <i class="fas fa-trash-alt"></i>
            </button>
        </div>';
                })
                ->rawColumns(["aksi"])
                ->make(true);
        } elseif (Auth()->user()->role == "Staff") {
            $data = Berkas::with([
                "kategori",
                "user",
                "subkategori",
                "standarisasi",
                "department",
            ])
                ->whereHas("user", function ($query) {
                    $query->where(
                        "id_department",
                        auth()->user()->id_departement
                    );
                })
                ->orderBy("id", "desc")
                ->get();
            $data = $data->map(function ($berkas) {
                $berkas->created_at = \Carbon\Carbon::parse(
                    $berkas->created_at
                )->format("Y-m-d H:i:s");
                $berkas->tanggal = \Carbon\Carbon::parse(
                    $berkas->tanggal
                )->format("Y-m-d");

                return $berkas;
            });

            return dataTables()
                ->of($data)
                ->addIndexColumn()
                ->addColumn("aksi", function ($data) {
                    return ' <div class="btn-group" role="group" aria-label="Basic example">
            <a type="button" href="#" class="btn btn-info btn-detail" id="btn-detail" data-toggle="modal"
            data-target="#detailmodal" data-id="' .
                        $data->id .
                        '">
            <i class="fas fa-info"></i>
            </a>
            <a type="button" href="/kelolaberkas/download/' .
                        $data->id .
                        '" class="btn btn-primary ">
            <i class="fas fa-download"></i>
            </a>
            </div>';
                })
                ->rawColumns(["aksi"])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "filename" => "required|mimes:docx,pdf,xls,xlsx|max:2048", // Maksimal ukuran file 2 MB
        ]);

        if ($validator->fails()) {
            Alert::error(
                "Error",
                "Tolong sesuaikan format dan ukuran berkasnya"
            )->persistent(true, false);
            return redirect("/kelolaberkas");
        }

        if ($request->hasfile("filename")) {
            $file = $request->file("filename");
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = time() . "_" . $filename;

            $department = departement::find(auth()->user()->id_departement);
            $departmentName = $department->nama_departement;
            $localPath = $departmentName . "/" . $name;
            // $path = $file->storeAs("document", $name, "public"); ini code upload secara lokal
            $cek = Gdrive::put($localPath, $request->file("filename"));

            $berkas = Berkas::create([
                "NamaBerkas" => $request->NamaBerkas,
                "keterangan" => $request->keterangan,
                "id_standarisasi" => $request->id_standar,
                "id_user" => auth()->user()->id,
                "id_kategori" => $request->id_kategori,
                "id_subkategori" => $request->id_subkategori,
                "url" => $localPath, // Simpan path file ke database
                "extension" => $extension,
                "original_name" => $filename,
                "id_department" => auth()->user()->id_departement,
            ]);

            $aktifitas = aktifitas::create([
                "aktifitas" => "Menambahkan Berkas Baru - " . $filename,
                "Staff" => auth()->user()->name,
            ]);

            Alert::success("Sukses", "Data berhasil disimpan!");
            return redirect("/kelolaberkas");
        }
        Alert::error("Gagal", "Data upload berkas");
        return redirect("/kelolaberkas");
    }

    public function show(string $id)
    {
        $berkas = Berkas::with([
            "kategori",
            "subkategori",
            "standarisasi",
            "user",
            "department",
        ])->findOrFail($id);
        return response()->json(["berkas" => $berkas]);
    }

    public function edit(string $id)
    {
        $berkas = berkas::find($id);
        if (!$berkas) {
            return response()->json(["error" => "Data tidak ditemukan"], 404);
        }
        return response()->json(["berkas" => $berkas]);
    }

    public function update(Request $request, $id)
    {
        $berkas = Berkas::findOrFail($id);

        $aktifitas = aktifitas::create([
            'aktifitas' => 'Mengedit Data Berkas'. ' - ' . $berkas->NamaBerkas . ' Ke '. $request->NamaBerkas,
            'Staff' => auth()->user()->name
        ]);

        $berkas->update([
            "NamaBerkas" => $request->NamaBerkas,
            "keterangan" => $request->keterangan,
            "id_standarisasi" => $request->id_standar,
            "id_kategori" => $request->id_kategori,
            "id_subkategori" => $request->id_subkategori,
            "id_department" => auth()->user()->id_departement,
        ]);

        if ($berkas) {
            Alert::success("Sukses", "Data berhasil diperbarui!");
            return redirect("/kelolaberkas");
        } else {
            Alert::Error("Error", "Data tidak daapt diperbarui!");
            return redirect("/kelolaberkas");
        }
    }

    public function destroy(string $id)
    {
        $berkas = Berkas::findOrFail($id);
        $aktifitas = aktifitas::create([
            "aktifitas" => "Menghapus Berkas - " . $berkas->original_name,
            "Staff" => auth()->user()->name,
        ]);
        // Storage::delete("public/" . $berkas->url);
        Gdrive::delete($berkas->url);
        $berkas->delete();
        Alert::success("Sukses", "Data berhasil Hapus");
        return redirect("/kelolaberkas");
    }

    public function download($id)
    {
        $berkas = Berkas::findOrFail($id);
        $data = Gdrive::get($berkas->url);

        $nama =  auth()->user()->id_departement;
        $department = departement::find($nama);
        $download = download::create([
            "namaberkas" => $data->filename,
            "namastaff" => auth()->user()->name,
            "department" =>  $department->nama_departement,
            "tanggal" => now(),
        ]);

        return response($data->file, 200)
            ->header('Content-Type', $data->ext)
            ->header('Content-disposition', 'attachment; filename="'.$data->filename.'"');

        // $filePath = storage_path("app/public/" . $berkas->url);
        // if (file_exists($filePath)) {
        //     $originalName = $berkas->original_name;
        //     $extension = $berkas->extension;

        //     var_dump($originalName);
        //     $fileName = time() . "_" . $originalName . "." . $extension;


        //     return response()->download($filePath, $fileName);
        // } else {
        //     Alert::Error("Error", "Data tidak dapat diunduh");
        //     return redirect("/kelolaberkas");
        // }
    }
}
