<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class galeri extends Model
{
       
    protected $table = 'galeri';
    protected $guarded = [];

    public function wisata(){
        return $this->belongsTo(wisata::class);
    }
}
