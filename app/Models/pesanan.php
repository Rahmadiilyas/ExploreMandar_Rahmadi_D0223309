<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    protected $table = 'pesanan';
    protected $guarded = [];
    public function users(){
        return $this->belongsTo(pengguna::class, 'user_id');
    }
    public function produk(){
        return $this->belongsTo(produk::class);
    }
    public function detailpesanan(){
        return $this->hasMany(detailpesanan::class, 'pesanan_id');
    }
    public function pembayaran(){
        return $this->hasOne(pembayaran::class);
    }

}
