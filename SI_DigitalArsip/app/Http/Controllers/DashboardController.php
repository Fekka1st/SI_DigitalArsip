<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\aktifitas;
use App\Models\berkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\kategori;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $kategori = kategori::count();
        $aktifitas = aktifitas::count();
        $akun = User::count();
        $user = Auth::user();
        $berkas = berkas::count();

        if(Auth::user()->role == 'Admin'){
            return view('dashboard', compact('user', 'kategori', 'akun', 'aktifitas', 'berkas'));
        }
        return view('dashboard2');
        
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
