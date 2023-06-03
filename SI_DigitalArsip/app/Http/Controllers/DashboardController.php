<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\aktifitas;
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

        return view('dashboard', compact('user', 'kategori', 'akun', 'aktifitas'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
