<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    
        protected $table = 'kategori';
        protected $guarded = [];

    
        public function produk(){
            return $this->hasMany(produk::class);
        }
    
}
