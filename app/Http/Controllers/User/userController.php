<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(){
        return view('pembeli.beranda');
    }
    public function about(){
        return view('pembeli.about');
    }
}
