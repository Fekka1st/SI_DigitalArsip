<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\download;
use Illuminate\Http\Request;

class downloadcontroller extends Controller
{
    //
    public function index(){
        $data['downloads'] = download::all();
        return view('download')->with($data);
    }
}
