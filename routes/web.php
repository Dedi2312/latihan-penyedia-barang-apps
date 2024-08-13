<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//-----------------------------------------------------------------//

Route::get('/',[UserController::class,'index'])->name('dashboard');

Route::middleware(['auth','userMiddleware'])->group(function(){
    // isi
});

Route::get('home',[UserController::class,'index'])->name('dashboard');

Route::middleware(['auth','adminMiddleware'])->group(function(){
    // isi
    Route::get('admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('admin/produk',[AdminController::class,'produk'])->name('admin.produk');
    Route::post('admin/tambah-produk',[AdminController::class,'storeProduk'])->name('admin.tambah-produk');
    Route::put('admin/edit-produk/{id}',[AdminController::class,'updateProduk'])->name('admin.edit-produk');
    Route::delete('admin/hapus-produk/{id}',[AdminController::class,'hapusProduk'])->name('admin.hapus-produk');
});