<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $guarded = [];

    public function pesanan(){
        return $this->belongsTo(pesanan::class);
    }
}
