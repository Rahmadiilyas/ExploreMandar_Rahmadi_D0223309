<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {


        // Tabel users untuk menyimpan data pengguna
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'kreator', 'pembeli'])->default('pembeli');
            $table->string('alamat')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // Tabel kategori produk
        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
        });

        // Tabel produk
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->integer('harga');
            $table->text('deskripsi');
            $table->foreignId('kategori_id')->constrained('kategori')->cascadeOnDelete();
            $table->string('gambar');
            $table->integer('stok')->default(0);
            $table->timestamps();
        });

        // Tabel pesanan
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('produk_id')->constrained('produk')->cascadeOnDelete();
            $table->integer('jumlah');
            $table->integer('total_harga');
            $table->string('status'); // misalnya: 'menunggu', 'diproses', 'selesai'
            $table->string('status_pembayaran')->default('belum dibayar'); // 'belum dibayar', 'sudah dibayar'
            $table->timestamps();
        });

        // Tabel pembayaran
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id')->constrained('pesanan')->cascadeOnDelete();
        
            // Data dari form isian pengguna
            $table->string('nama_penerima');
            $table->string('alamat_pengiriman');
            $table->string('nomor_telepon');
            $table->string('catatan')->nullable(); // opsional, misal: pesan tambahan dari pembeli
        
            // Bukti pembayaran manual (upload gambar atau foto)
            $table->string('bukti_pembayaran')->nullable();
        
            // Status verifikasi manual oleh kreator/penjual
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu');
        
            $table->timestamps();
        });
        

        // Tabel detail pesanan untuk produk yang dipesan
        Schema::create('detail_pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id')->constrained('pesanan')->cascadeOnDelete();
            $table->foreignId('produk_id')->constrained('produk')->cascadeOnDelete();
            $table->integer('jumlah');
            $table->integer('sub_total'); // harga * jumlah
            $table->timestamps();
        });

        // Tabel ulasan untuk produk
        Schema::create('ulasan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->constrained('produk')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->text('isi');
            $table->tinyInteger('rating'); // skala 1-5
            $table->boolean('verifikasi')->default(false); // untuk menandakan apakah ulasan sudah diverifikasi
            $table->timestamps();
        });

        // Tabel wisata
        Schema::create('wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });

        // Tabel galeri untuk gambar wisata
        Schema::create('galeri', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('path_gambar');
            $table->foreignId('wisata_id')->nullable()->constrained('wisata')->cascadeOnDelete();
            $table->timestamps();
        });

        // Tabel keranjang untuk menyimpan produk yang ditambahkan oleh pengguna ke keranjang
        Schema::create('keranjang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('produk_id')->constrained('produk')->cascadeOnDelete();
            $table->integer('jumlah');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('keranjang');
        Schema::dropIfExists('galeri');
        Schema::dropIfExists('wisata');
        Schema::dropIfExists('ulasan');
        Schema::dropIfExists('detail_pesanan');
        Schema::dropIfExists('pembayaran');
        Schema::dropIfExists('pesanan');
        Schema::dropIfExists('produk');
        Schema::dropIfExists('kategori');
        Schema::dropIfExists('users');
      
    }
};
