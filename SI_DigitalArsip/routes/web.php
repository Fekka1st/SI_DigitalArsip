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
use App\Http\Controllers\downloadcontroller;
use App\Http\Controllers\dashboard;
use App\Http\Middleware\CheckRole;

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


Route::middleware(['auth', CheckRole::class . ':Admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['verified'])->name('master');

    Route::get('/kategori/data', [Kategoricontroller::class, 'data']);
    Route::resource('/kategori', Kategoricontroller::class);
    Route::post('/kategori/store', [Kategoricontroller::class, 'store'])->name('kategori.store');
    Route::get('/kategori/edit/{id}', [Kategoricontroller::class, 'edit'])->name('kategori.edit');
    Route::get('/kategori/delete/{id}', [Kategoricontroller::class, 'destroy']);
    Route::post('/kategori/update', [Kategoricontroller::class, 'update']);

    Route::get('/sub-kategori/data', [SubKategoriController::class, 'data']);
    Route::resource('/sub-kategori', SubKategoriController::class);
    Route::post('/sub-kategori/store', [SubKategoriController::class, 'store'])->name('subkategori.store');
    Route::get('/sub-kategori/edit/{id}', [SubKategoriController::class, 'edit'])->name('subkategori.edit');
    Route::get('/sub-kategori/delete/{id}', [SubKategoriController::class, 'destroy']);
    Route::post('/sub-kategori/update', [SubKategoriController::class, 'update']);

    Route::get('/kelolaberkas/data', [KelolaberkasController::class, 'data']);
    Route::resource('/kelolaberkas', KelolaberkasController::class);
    Route::post('/kelolaberkas/store', [KelolaberkasController::class, 'store'])->name('kelolaberkas.store');
    Route::get('/kelolaberkas/edit/{id}', [KelolaberkasController::class, 'edit'])->name('Kelolaberkas.edit');
    Route::get('/kelolaberkas/delete/{id}', [KelolaberkasController::class, 'destroy']);
    Route::post('/kelolaberkas/update', [KelolaberkasController::class, 'update']);
    Route::get('/kelolaberkas/download/{id}', [KelolaberkasController::class, 'download']);

    Route::get('/aktifitas/data', [Aktifitascontroller::class, 'data']);
    Route::resource('/aktifitas', Aktifitascontroller::class);
    Route::get('/kelolauser/data', [KelolauserController::class, 'data']);
    Route::resource('/kelolauser', KelolauserController::class);
    Route::post('/kelolauser/store', [KelolauserController::class, 'store'])->name('Kelolauser.store');
    Route::get('/kelolauser/edit/{id}', [KelolauserController::class, 'edit'])->name('Kelolauser.edit');
    Route::get('/kelolauser/delete/{id}', [KelolauserController::class, 'destroy']);
    Route::post('/kelolauser/update', [KelolauserController::class, 'update']);
    Route::resource('/download', downloadcontroller::class);
 
    // Sisipkan route untuk Admin lainnya di sini
});

// // Group route untuk pengguna dengan peran "Staff"
// Route::middleware(['auth', CheckRole::class . ':Staff'])->group(function () {
//     Route::get('/dashboard', [Dashboard::class, 'index'])->middleware(['verified'])->name('master');


    // Route::get('/kelolaberkas/data', [KelolaberkasController::class, 'data']);
    // Route::resource('/kelolaberkas', KelolaberkasController::class);
    // Route::post('/kelolaberkas/store', [KelolaberkasController::class, 'store'])->name('kelolaberkas.store');
    // Route::get('/kelolaberkas/edit/{id}', [KelolaberkasController::class, 'edit'])->name('Kelolaberkas.edit');
    // Route::get('/kelolaberkas/delete/{id}', [KelolaberkasController::class, 'destroy']);
    // Route::post('/kelolaberkas/update', [KelolaberkasController::class, 'update']);
    // Route::get('/kelolaberkas/download/{id}', [KelolaberkasController::class, 'download']);

//     // Sisipkan route untuk Staff lainnya di sini
// });

Route::get('/logout', [DashboardController::class, 'logout'])->middleware(['auth', 'verified'])->name('master');


require __DIR__ . '/auth.php';
