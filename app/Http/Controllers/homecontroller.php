<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class homecontroller extends Controller
{
 public function index(){

        $produks = produk::latest()->get();
        return view('tamu.produk', compact('produks'));
    }
 }   

