<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\download;
use Illuminate\Http\Request;

class downloadcontroller extends Controller
{
    //
    public function index(){
        $data['download'] = download::all();
        return view('download')->with($data);
    }
}
