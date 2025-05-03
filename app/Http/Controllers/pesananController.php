<?php

namespace App\Http\Controllers;

use App\Models\pesanan;
use Illuminate\Http\Request;

class pesananController extends Controller
{
    public function cekStatus($id)
{
    $pesanan = pesanan::find($id);

    if (!$pesanan) {
        return response()->json(['message' => 'Pesanan tidak ditemukan'], 404);
    }

    return response()->json([
        'pesanan_id' => $pesanan->id,
        'status' => $pesanan->status,
        'status_pembayaran' => $pesanan->status_pembayaran,
    ]);
}
}
