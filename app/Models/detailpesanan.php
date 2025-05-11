<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detailPesanan extends Model
{
    protected $table = 'detail_pesanan';
    protected $guarded = [];

    public function pesanan(){
        return $this->belongsTo(pesanan::class, 'pesanan_id');


    }

    public function produk(){
        return $this->belongsTo(produk::class, 'produk_id');
    }
    public function ulasan()
{
    return $this->hasOne(ulasan::class);
}
}
