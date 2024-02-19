<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class dashboard extends Controller
{
    //
    public function index()
    {
        return view('dashboard2');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
