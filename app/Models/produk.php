<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = 'produk';
    protected $guarded = [];
    public function kategori(){
        return $this->belongsTo(kategori::class, 'kategori_id');
    }
    public function pesanan()
    {
        return $this->belongsToMany(pesanan::class, 'detailpesanan')
                    ->withPivot('jumlah', 'total_harga')
                    ->withTimestamps();
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
      public function user()
    {
        return $this->belongsTo(pengguna::class, 'pengguna_id');
    }


}
