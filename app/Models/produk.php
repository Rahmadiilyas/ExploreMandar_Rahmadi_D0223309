<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = 'produk';
    protected $guarded = [];
    public function kategori(){
        return $this->belongsTo(kategori::class);
    }
    public function pesanan(){
        return $this->belongsToMany(pesanan::class, 'detailpesanan')->withPivot('jumlah', 'sub_total');
    }
    public function ulasan(){
        return $this->hasMany(ulasan::class);
    }
    public function keranjang(){
        return $this->hasMany(keranjang::class);
    }
    public function detailpesanan(){
        return $this->hasMany(detailpesanan::class);
    }


}
