<?php

use App\Http\Controllers\aktifitascontroller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kategoricontroller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelolaberkasController;
use App\Http\Controllers\Kelolauser;
use App\Http\Controllers\KelolauserController;
use App\Http\Controllers\SubKategoriController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('master');

    Route::get('/kategori/data', [kategoricontroller::class, 'data']);
    Route::resource('/kategori', kategoricontroller::class);
    Route::post('/kategori/store', [kategoricontroller::class, 'store'])->name('kategori.store');
    Route::get('/kategori/edit/{id}', [kategoricontroller::class, 'edit'])->name('kategori.edit');
    Route::get('/kategori/delete/{id}', [kategoricontroller::class, 'destroy']);
    Route::post('/kategori/update', [kategoricontroller::class, 'update']);



    Route::get('/sub-kategori/data', [SubKategoriController::class, 'data']);
    Route::resource('/sub-kategori', SubKategoriController::class);
    Route::post('/sub-kategori/store', [SubKategoriController::class, 'store'])->name('subkategori.store');
    Route::get('/sub-kategori/edit/{id}', [SubKategoriController::class, 'edit'])->name('subkategori.edit');
    Route::get('/sub-kategori/delete/{id}', [SubKategoriController::class, 'destroy']);
    Route::post('/sub-kategori/update', [SubKategoriController::class, 'update']);

    Route::get('/aktifitas/data', [aktifitascontroller::class, 'data']);
    Route::resource('/aktifitas', aktifitascontroller::class);

    Route::get('/kelolauser/data', [KelolauserController::class], 'data');
    Route::resource('/kelolauser', KelolauserController::class);
    Route::post('/kelolauser/store', [KelolauserController::class, 'store'])->name('Kelolauser.store');
    Route::get('/kelolauser/edit/{id}', [KelolauserController::class, 'edit'])->name('Kelolauser.edit');
    Route::get('/kelolauser/delete/{id}', [KelolauserController::class, 'destroy']);
    Route::post('/kelolauser/update', [KelolauserController::class, 'update']);

    Route::get('/kelolaberkas/data', [KelolaberkasController::class], 'data');
    Route::resource('/kelolaberkas', KelolaberkasController::class);
    Route::post('/kelolaberkas/store', [KelolaberkasController::class, 'store'])->name('kelolaberkas.store');


    Route::get('/logout', [DashboardController::class, 'logout'])->middleware(['auth', 'verified'])->name('master');
});


require __DIR__ . '/auth.php';
