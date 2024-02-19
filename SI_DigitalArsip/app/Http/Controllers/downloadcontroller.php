<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\departement;
use App\Models\download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class downloadcontroller extends Controller
{
    public function index(){
        if(Auth::user()->role == 'Admin'){
            $data['download'] = Download::orderBy('tanggal', 'desc')->get();
            return view('download')->with($data);

        }else if(Auth::user()->role == 'Staff'){
            $namaStaff = Auth::user()->id_departement;
            $department = departement::find($namaStaff);
            $data['download'] = Download::where('department', $department->nama_departement)->orderBy('tanggal', 'desc')->get();
            return view('download')->with($data);
        }

    }
}
