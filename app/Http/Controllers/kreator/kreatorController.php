<?php

namespace App\Http\Controllers\kreator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class kreatorController extends Controller
{
    public function index(){
        return view('kreator.dashboard');
    }
}
