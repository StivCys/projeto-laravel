<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppHomeController extends Controller
{
    public function index(){
        
        return view('app.home',['titulo'=>"Home"]);
    }
}
