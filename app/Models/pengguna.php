<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    protected $table = 'users';
    protected $guarded = [];
    public function role(){
        return $this->belongsTo(role::class);
    }

    public function pesanan(){
        return $this->hasMany(pesanan::class);
    }
    public function ulasan(){
        return $this->hasMany(ulasan::class);
    }
    public function keranjang(){
        return $this->hasMany(keranjang::class);
    }
}
