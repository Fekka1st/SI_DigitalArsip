<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class downloadcontroller extends Controller
{
    //
    public function index(){
        if(Auth::user()->role == 'Admin'){
            $data['download'] = download::all();
            return view('download')->with($data);
        }else if(Auth::user()->role == 'Staff'){
            $namaStaff = Auth::user()->name;
            $data['download'] = Download::where('namastaff', $namaStaff)->get();;
            return view('download')->with($data);
        }

    }
}
