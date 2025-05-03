<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    protected $table = 'keranjang';
    protected $guarded = [];

    public function user(){
        return $this->belongsToMany(pengguna::class);
    }
    public function produk(){
        return $this->belongsTo(produk::class);
    }
}
