<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class wisata extends Model
{
    protected $table = 'wisata';
    protected $guarded = [];

    public function galeri(){
        return $this->hasMany(galeri::class);
    }
}
