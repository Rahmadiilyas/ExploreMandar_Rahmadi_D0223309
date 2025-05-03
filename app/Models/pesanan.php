<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    protected $table = 'pesanan';
    protected $guarded = [];
    public function users(){
        return $this->belongsTo(pengguna::class);
    }
    public function produk(){
        return $this->belongsToMany(produk::class, 'detailpesanan')->withPivot('jumlah', 'sub_total');
    }
    public function detailpesanan(){
        return $this->hasMany(detailpesanan::class);
    }
    public function pembayaran(){
        return $this->hasOne(pembayaran::class);
    }

}
