<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kategoricontroller;
use App\Http\Controllers\DashboardController;

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
});


require __DIR__ . '/auth.php';
