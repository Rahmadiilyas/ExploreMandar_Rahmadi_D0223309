<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    protected $table = 'users';
    protected $guarded = [];

    public function produk(){
        return $this->hasMany(produk::class);
    }

    public function pesanan(){
        return $this->hasMany(pesanan::class, 'user_id');
    }
    public function ulasan(){
        return $this->hasMany(ulasan::class);
    }
    public function keranjang(){
        return $this->hasMany(keranjang::class);
    }
    public function isKreator()
    {
        return $this->role === 'kreator';
    }

    /**
     * Menentukan apakah pengguna ini adalah admin
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Menentukan apakah pengguna ini adalah pembeli
     */
    public function isPembeli()
    {
        return $this->role === 'pembeli';
    }

}
