<?php

namespace App\Http\Controllers;

use Faker\Provider\ar_EG\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Composer;

class TesteController extends Controller
{

    public function inicio(){
        return "Isso é um teste";
    }

    //PASSANDO PARAMETROS PARA VIEW
    public function TesteSoma(int $p1=1, int $p2=3){
        
        // return view('site.teste',['p1'=> $p1,'p2'=>$p2]);// maneira usando array associativo
        // return view('site.teste',compact('p1','p2'));// maneira usando  func compact() ** MAIS FACIL MENOS COD
        return view('site.teste')->with('p1',$p1)->with('p2',$p2); // maneira usando with()

    }
}
