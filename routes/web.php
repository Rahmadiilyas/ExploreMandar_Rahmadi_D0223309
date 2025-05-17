<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\kreator\kreatorController;
use App\Http\Controllers\pesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\prosesPembayaran;
use App\Http\Controllers\simpanPembayaran;
use App\Http\Controllers\Tamucontroller;
use App\Http\Controllers\User\userController;
use App\Http\Middleware\kreatorMiddleware;
use Illuminate\Support\Facades\Route;


Route::controller(Tamucontroller::class)->group(function(){
    Route::get('/', 'beranda')->name('tamu.beranda');
    Route::get('/about1', 'about');
    Route::get('/produk1', 'produk')->name('tamu.produk');
    Route::get('/wisataa1', 'index')->name('tamu.wisata');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile1', [ProfileController::class, 'edit1'])->name('profile.edit1');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile1', [ProfileController::class, 'update1'])->name('profile.update1');
    Route::post('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/simpanpembayaran', [simpanPembayaran::class, 'store']);

Route::middleware(['auth', 'pembeliMiddleware'])->group(function () {
    Route::get('/pembeli/beranda', [userController::class, 'beranda'])->name('pembeli.beranda');
    // Halaman dashboard dan home
    Route::get('/pembeli/produk', [userController::class, 'produk'])->name('pembeli.produk');
    // Keranjang
    Route::get('/pembeli/keranjang', [userController::class, 'index1'])->name('pembeli.keranjang');
    Route::get('/pembeli/about', [userController::class, 'about'])->name('pembeli.about');
    Route::post('/keranjang/tambah/{produk_id}', [userController::class, 'tambah'])->name('keranjang.tambah');
    Route::delete('/keranjang/hapus/{id}', [userController::class, 'hapus'])->name('keranjang.hapus');

    // Checkout
    Route::get('/keranjang/checkout', [userController::class, 'checkout'])->name('keranjang.checkout');
    Route::post('/keranjang/prosesCheckout', [userController::class, 'prosesCheckout'])->name('keranjang.prosesCheckout');

    // Pembelian langsung (tanpa keranjang)
    Route::get('/produk/{id}/beli', [userController::class, 'beli'])->name('pembeli.beli');

    // Riwayat pesanan (opsional)
    Route::get('pesanan/{id}', [UserController::class, 'detailPesanan'])->name('pesanan.detail');
    Route::post('checkout', [UserController::class, 'prosesCheckout'])->name('keranjang.prosesCheckout');
    //wisata

// Route::get('/wisata', [userController::class, 'wisata'])->name('pembeli.wisata');
Route::get('/wisata', [userController::class, 'index'])->name('pembeli.wisata');
Route::get('/wisata/{id}', [userController::class, 'show'])->name('wisata.show');
Route::get('/wisata/lokasi/{lokasi}', [userController::class, 'byLokasi'])->name('wisata.byLokasi');
Route::get('/wisata/search', [userController::class, 'search'])->name('wisata.search');
Route::get('/pesanansaya', [userController::class, 'detailPesanan'])->name('pembeli.detailpesanan');

Route::get('/ulasan/form/{id}', [userController::class, 'form'])->name('ulasan.form');
Route::post('/ulasan/simpan', [userController::class, 'simpan'])->name('ulasan.simpan');

Route::get('/profil', [userController::class, 'profil'])->name('pembeli.profil');
Route::put('/pesanan/konfirmasi/{id}', [userController::class, 'konfirmasi'])->name('pesanan.konfirmasi');


});


Route::middleware(['auth', 'adminMiddleware'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/lihatuser', [AdminController::class, 'lihatuser'])->name('admin.lihatuser');
    Route::get('/tambahuser', [AdminController::class, 'tambahuser'])->name('admin.tambahuser');
    Route::post('/tambahuser/simpan', [AdminController::class, 'simpanuser'])->name('admin.simpanuser');
    Route::get('/edituser/{id}', [AdminController::class, 'edituser'])->name('admin.edituser');
    Route::post('/updateuser/{id}', [AdminController::class, 'updateuser'])->name('admin.updateuser');
    Route::post('/deleteuser/{id}', [AdminController::class, 'deleteuser'])->name('admin.deleteuser');
    Route::get('/lihatkategori', [AdminController::class, 'lihatkategori'])->name('admin.lihatkategori');
    Route::get('/lihatproduk', [AdminController::class, 'lihatproduk'])->name('admin.lihatproduk');
    Route::get('/lihatpesanan', [AdminController::class, 'lihatpesanan'])->name('admin.lihatpesanan');
    Route::get('/lihatlaporan', [AdminController::class, 'lihatlaporan'])->name('admin.lihatlaporan');
    Route::get('/lihatulasan', [AdminController::class, 'lihatulasan'])->name('admin.lihatulasan');
    Route::get('/lihatwisata', [AdminController::class, 'lihatwisata'])->name('admin.lihatwisata');

   



});
Route::middleware(['auth', 'kreatorMiddleware'])->group(function(){
    Route::get('/kreator/dashboard', [kreatorController::class, 'index'])->name('kreator.dashboard');
    Route::get('/kreator/lihatproduk', [kreatorController::class, 'lihatproduk'])->name('kreator.lihatproduk');
    Route::get('/kreator/tambahproduk', [kreatorController::class, 'tambahproduk'])->name('kreator.tambahproduk');
    Route::post('/kreator/tambahproduk/simpan', [kreatorController::class, 'simpanproduk'])->name('kreator.simpanproduk');
    Route::get('/kreator/editproduk/{id}', [kreatorController::class, 'editproduk'])->name('kreator.editproduk');
    Route::post('/kreator/updateproduk/{id}', [kreatorController::class, 'updateproduk'])->name('kreator.updateproduk');
    Route::post('/kreator/deleteproduk/{id}', [kreatorController::class, 'deleteproduk'])->name('kreator.deleteproduk');
    Route::get('/kreator/lihatkategori', [kreatorController::class, 'lihatkategori'])->name('kreator.lihatkategori');
    Route::get('/kreator/tambahkategori', [kreatorController::class, 'tambahkategori'])->name('kreator.tambahkategori');
    Route::post('/kreator/tambahkategori/simpan', [kreatorController::class, 'simpankategori'])->name('kreator.simpankategori');
    Route::get('/kreator/editkategori/{id}', [kreatorController::class, 'editkategori'])->name('kreator.editkategori');
    Route::post('/kreator/updatekategori/{id}', [kreatorController::class, 'updatekategori'])->name('kreator.updatekategori');
    Route::post('/kreator/deletekategori/{id}', [kreatorController::class, 'deletekategori'])->name('kreator.deletekategori');
    Route::get('/kreator/lihatwisata', [kreatorController::class, 'lihatwisata'])->name('kreator.lihatwisata');
    Route::get('/kreator/tambahwisata', [kreatorController::class, 'tambahwisata'])->name('kreator.tambahwisata');
    Route::post('/kreator/tambahwisata/simpan', [kreatorController::class, 'simpanwisata'])->name('kreator.simpanwisata');
    Route::get('/kreator/editwisata/{id}', [kreatorController::class, 'editwisata'])->name('kreator.editwisata');
    Route::post('/kreator/updatewisata/{id}', [kreatorController::class, 'updatewisata'])->name('kreator.updatewisata');
    Route::post('/kreator/deletewisata/{id}', [kreatorController::class, 'deletewisata'])->name('kreator.deletewisata');
    Route::get('/kreator/lihatulasan', [kreatorController::class, 'lihatulasan'])->name('kreator.lihatulasan');
    Route::get('/kreator/lihatpesanan', [kreatorController::class, 'lihatpesanan'])->name('kreator.lihatpesanan');

    Route::get('/validasi-pembayaran', [kreatorController::class, 'daftarPembayaran'])->name('kreator.validasi.index');
    Route::post('/validasi-pembayaran/{id}', [kreatorController::class, 'validasiPembayaran'])->name('kreator.validasi.proses');
    Route::post('/validasi-pembayaran/{id}/tolak', [kreatorController::class, 'tolakPembayaran'])->name('kreator.validasi.tolak');
});



