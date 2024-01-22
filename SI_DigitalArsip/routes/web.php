<?php

use App\Http\Controllers\aktifitascontroller;
use App\Http\Controllers\profilecontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kategoricontroller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelolaberkasController;
use App\Http\Controllers\Kelolauser;
use App\Http\Controllers\KelolauserController;
use App\Http\Controllers\SubKategoriController;
use App\Http\Controllers\downloadcontroller;
use App\Http\Controllers\standarcontroller;
use App\Http\Controllers\Reportberkas;
use App\Http\Controllers\departmentcontroller;
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

Route::group(['middleware' => 'auth'], function () {

    route::group(['middleware' => 'role:Admin'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('master');

        //kelola standarisasi Done
        Route::get('/kelola_standarisasi/hide/data', [standarcontroller::class, 'data'])->name('standarisasi.data');
        Route::resource('/kelola_standarisasi', standarcontroller::class);
        Route::post('/kelola_standarisasi/store', [standarcontroller::class, 'store'])->name('standarisasi.store');
        Route::get('/kelola_standarisasi/{id}/edit', 'standarcontroller@edit');
        Route::delete('/kelola_standarisasi/{id}', 'standarcontroller@destroy')->name('standarisasi.destroy');
        Route::patch('/kelola_standarisasi/update/{id}', [standarcontroller::class, 'update'])->name('standarisasi.update');

        // kelola kategori done
        Route::get('/kelola_kategori/hide/data', [Kategoricontroller::class, 'data'])->name('kategori.data');
        Route::resource('/kelola_kategori', Kategoricontroller::class);
        Route::post('/kelola_kategori/store', [Kategoricontroller::class, 'store'])->name('kategori.store');
        Route::get('/kelola_kategori/{id}/edit', 'Kategoricontroller@edit');
        Route::delete('/kelola_kategori/{id}', 'Kategoricontroller@destroy')->name('kategori.destroy');
        Route::patch('/kelola_kategori/update/{id}', [Kategoricontroller::class, 'update'])->name('kategori.update');

        // kelola sub kategori done
        Route::get('/kelola_sub-kategori/hide/data', [SubKategoriController::class, 'data'])->name('subkategori.data');
        Route::resource('/kelola_sub-kategori', SubKategoriController::class);
        Route::post('/kelola_sub-kategori/store', [SubKategoriController::class, 'store'])->name('subkategori.store');
        Route::get('/kelola_sub-kategori/{id}/edit', 'SubKategoriController@edit');
        Route::delete('/kelola_sub-kategori/{id}', 'SubKategoriController@destroy')->name('subkategori.destroy');
        Route::patch('/kelola_sub-kategori/update/{id}', [SubKategoriController::class, 'update'])->name('subkategori.update');

        Route::get('/kelola_departement/hide/data', [departmentcontroller::class, 'data'])->name('department.data');
        Route::resource('/kelola_departement', departmentcontroller::class);
        Route::post('/kelola_departement/store', [departmentcontroller::class, 'store'])->name('department.store');
        Route::get('/kelola_departement/{id}/edit', 'departmentcontroller@edit');
        Route::delete('/kelola_departement/{id}', 'departmentcontroller@destroy')->name('department.destroy');
        Route::patch('/kelola_departement/update/{id}', [departmentcontroller::class, 'update'])->name('department.update');

        //kelola Berkas
        Route::get('/kelolaberkas/hide/data', [KelolaberkasController::class, 'data'])->name('kelolaberkas.data');
        Route::resource('/kelolaberkas', KelolaberkasController::class);
        Route::post('/kelolaberkas/store', [KelolaberkasController::class, 'store'])->name('kelolaberkas.store');
        Route::get('/kelolaberkas/{id}/edit', 'KelolaberkasController@edit');
        Route::delete('/kelolaberkas/{id}', 'KelolaberkasController@destroy')->name('kelolaberkas.destroy');
        Route::patch('/kelolaberkas/update/{id}', [KelolaberkasController::class, 'update'])->name('kelolaberkas.update');
        Route::get('/kelolaberkas/download/{id}', [KelolaberkasController::class, 'download']);
        Route::get('/kelolaberkas/detail/{id}', [KelolaberkasController::class, 'show']);

        //Kelola Report Berkas
        Route::post('/Report/cetak', [Reportberkas::class, 'cetak'])->name('report.cetak');
        Route::resource('/Report', Reportberkas::class);

        //Aktifitas
        Route::get('/aktifitas/data', [Aktifitascontroller::class, 'data']);
        Route::resource('/aktifitas', Aktifitascontroller::class);

        //Kelola User Done
        Route::get('/kelolauser/data', [KelolauserController::class, 'data']);
        Route::resource('/kelolauser', KelolauserController::class);
        Route::post('/kelolauser/store', [KelolauserController::class, 'store'])->name('Kelolauser.store');
        Route::get('/kelolauser/edit/{id}', [KelolauserController::class, 'edit'])->name('Kelolauser.edit');
        Route::get('/kelolauser/{id}/detail', [KelolauserController::class, 'detail'])->name('Kelolauser.detail');
        Route::get('/kelolauser/delete/{id}', [KelolauserController::class, 'destroy']);
        Route::post('/kelolauser/update', [KelolauserController::class, 'update']);
        Route::resource('/download', downloadcontroller::class);
    });
    Route::get('/kelolaberkas/hide/data', [KelolaberkasController::class, 'data'])->name('kelolaberkas.data');
    Route::resource('/kelolaberkas', KelolaberkasController::class);
    Route::post('/kelolaberkas/store', [KelolaberkasController::class, 'store'])->name('kelolaberkas.store');
    Route::get('/kelolaberkas/{id}/edit', 'KelolaberkasController@edit');
    // Route::delete('/kelolaberkas/{id}', 'KelolaberkasController@destroy')->name('kelolaberkas.destroy');
    // Route::patch('/kelolaberkas/update/{id}', [KelolaberkasController::class, 'update'])->name('kelolaberkas.update');
    Route::get('/kelolaberkas/download/{id}', [KelolaberkasController::class, 'download']);
    Route::get('/kelolaberkas/detail/{id}', [KelolaberkasController::class, 'show']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('master');
    Route::get('/kelolaberkas/data', [KelolaberkasController::class, 'data']);
    Route::resource('/kelolaberkas', KelolaberkasController::class);
    Route::post('/kelolaberkas/store', [KelolaberkasController::class, 'store'])->name('kelolaberkas.store');
    Route::get('/kelolaberkas/edit/{id}', [KelolaberkasController::class, 'edit'])->name('Kelolaberkas.edit');
    Route::get('/kelolaberkas/delete/{id}', [KelolaberkasController::class, 'destroy']);
    Route::post('/kelolaberkas/update', [KelolaberkasController::class, 'update']);
    Route::get('/kelolaberkas/download/{id}', [KelolaberkasController::class, 'download']);

    //Profile Settings Done
    Route::get('/profilesettings/', [profilecontroller::class, 'settings'])->name('Kelolaberkas.settings');
    Route::post('/profilesettings/store', [profilecontroller::class, 'store'])->name('Kelolauser.store');
    Route::get('/profilesettings/edit/{id}', [profilecontroller::class, 'edit'])->name('Kelolauser.edit');
    Route::patch('/profilesettings/update', [profilecontroller::class, 'update']);
    Route::resource('/download', downloadcontroller::class);
});


Route::get('/logout', [DashboardController::class, 'logout'])->middleware(['auth', 'verified'])->name('master');

require __DIR__ . '/auth.php';
