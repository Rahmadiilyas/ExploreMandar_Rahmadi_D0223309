<?php

namespace App\Http\Controllers;

use App\Models\detailpesanan;
use App\Models\pembayaran;
use App\Models\pesanan;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class simpanPembayaran extends Controller
{
    public function store(Request $request)
    {
        // Ambil data dari form POST atau parameter request
        $user_id = $request->input('user_id'); // Mengambil ID pengguna
        $produkData = $request->input('produk'); // Array data produk
        $total_harga = $request->input('total_harga'); // Total harga pesanan
        dd($user_id, $produkData, $total_harga); 
        // Memulai transaksi database
        DB::beginTransaction();

        try {
            // Membuat pesanan
            $pesanan = Pesanan::create([
                'user_id' => $user_id,
                'status' => 'menunggu',
                'total_harga' => $total_harga,
                'status_pembayaran' => 'belum dibayar',
            ]);

            // Loop untuk menambah detail pesanan
            foreach ($produkData as $produkItem) {
                // Ambil data produk
                $produk = Produk::findOrFail($produkItem['id']);

                // Mengecek apakah stok produk mencukupi
                if ($produk->stok < $produkItem['jumlah']) {
                    // Jika stok tidak cukup, lempar exception dan hentikan transaksi
                    throw new \Exception('Stok produk ' . $produk->nama . ' tidak cukup');
                }

                // Mengurangi stok produk
                $produk->decrement('stok', $produkItem['jumlah']);

                // Menambahkan detail pesanan
                DetailPesanan::create([
                    'pesanan_id' => $pesanan->id,
                    'produk_id' => $produkItem['id'],
                    'jumlah' => $produkItem['jumlah'],
                    'sub_total' => $produkItem['harga'] * $produkItem['jumlah'],
                ]);
            }
            dd($pesanan, $produkData); 
            // Jika tidak ada masalah, commit perubahan
            DB::commit();

            // Kembali dengan pesan sukses
            return redirect()->back()->with('success', 'Pesanan berhasil dibuat!');

        } catch (\Exception $e) {
            // Jika ada error, rollback perubahan
            DB::rollBack();

            // Kembali dengan pesan error
            return redirect()->back()->with('error', 'Transaksi gagal: ' . $e->getMessage());
        }
    }
}