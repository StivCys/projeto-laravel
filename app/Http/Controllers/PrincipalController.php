<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContato;

class PrincipalController extends Controller
{
    

    public function __construct(){
    }
    
    public function Principal(){
        
        $motivo_contatos = MotivoContato::all();
        return view('site.principal',['motivo_contatos'=>$motivo_contatos]);
    }

}
