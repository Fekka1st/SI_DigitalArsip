<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\aktifitas;
use Illuminate\Http\Request;

class aktifitascontroller extends Controller
{
    public function index()
    {
        $data['aktifitas'] = aktifitas::orderBy('id', 'desc')->get();
        return view('aktifitas')->with($data);
    }


}
