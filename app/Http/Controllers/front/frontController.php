<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class frontController extends Controller
{
    public function home(){
        return view('front.home');
    }
}
