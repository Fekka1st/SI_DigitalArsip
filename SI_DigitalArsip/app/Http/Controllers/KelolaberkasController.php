<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\kelolaberkas;
use Illuminate\Http\Request;


class KelolaberkasController extends Controller
{
    //
    public function index()
    {
        $data['index'] = kelolaberkas::all();
        return view('berkas.index')->with($data);
    }
}
