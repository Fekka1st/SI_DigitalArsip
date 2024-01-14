<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\aktifitas;
use App\Models\berkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\kategori;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
            // Ambil data untuk grafik
            $chartData = DB::table('berkas')
                ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('COUNT(*) as count'))
                ->groupBy('month')
                ->get();
                $aktifitasData = DB::table('aktifitas')
                ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as day'), DB::raw('COUNT(*) as count'))
                ->where('created_at', '>', now()->subDays(7))
                ->groupBy('day')
                ->get();

            // Kirim data grafik ke tampilan
            return view('dashboard', compact('user', 'kategori', 'akun', 'aktifitas', 'berkas', 'chartData','aktifitasData'));
        }

        return view('dashboard2');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
