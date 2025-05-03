<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\kreator\kreatorController;
use App\Http\Controllers\pesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\prosesPembayaran;
use App\Http\Controllers\simpanPembayaran;
use App\Http\Controllers\User\userController;
use App\Http\Middleware\kreatorMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('blog-details');
});
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/simpanpembayaran', [simpanPembayaran::class, 'store']);


Route::middleware(['auth', 'pembeliMiddleware'])->group(function(){
    Route::get('/pembeli/dashboard', [userController::class, 'index'])->name('pembeli.beranda');
});

Route::middleware(['auth', 'adminMiddleware'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
Route::middleware(['auth', 'kreatorMiddleware'])->group(function(){
    Route::get('/kreator/dashboard', [kreatorController::class, 'index'])->name('kreator.dashboard');
});

