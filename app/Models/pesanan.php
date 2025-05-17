<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    protected $table = 'pesanan';
    protected $guarded = [];
    public function user(){
        return $this->belongsTo(pengguna::class, 'user_id');
    }
    // public function produk(){
    //     return $this->belongsTo(produk::class);
    // }
    public function detailPesanan()
    {
        return $this->hasMany(detailPesanan::class, 'pesanan_id'); 
    }
    
    public function pembayaran(){
        return $this->hasOne(pembayaran::class);
    }
    

}
