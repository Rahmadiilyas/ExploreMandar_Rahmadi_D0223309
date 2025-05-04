<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class exploremandarController extends Controller
{
    public function tambahuser(){
        return view("admin.tambahuser");
    }
}
