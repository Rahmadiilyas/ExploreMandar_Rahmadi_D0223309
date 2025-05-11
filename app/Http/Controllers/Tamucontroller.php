<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tamucontroller extends Controller
{
    public function beranda(){
        return view('Tamu.beranda');
    }
    public function about(){
        return view('Tamu.about');
    }
    public function produk(){
        return view('Tamu.produk');
    }
    public function wisata(){
        return view('Tamu.wisata');
    }
}
