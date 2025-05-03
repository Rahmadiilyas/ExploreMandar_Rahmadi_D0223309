<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detailpesanan extends Model
{
    protected $table = 'detail_pesanan';
    protected $guarded = [];
    public function produk(){
        return $this->belongsTo(produk::class);
    }
    public function pesanan(){
        return $this->belongsTo(pesanan::class);
    }
}
