<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ulasan extends Model
{
    protected $table = 'ulasan';
    protected $guarded = [];

    public function produk(){
        return $this->belongsTo(produk::class, 'produk_id');
    }
    public function user(){
        return $this->belongsTo(pengguna::class, 'user_id');
    }
}
