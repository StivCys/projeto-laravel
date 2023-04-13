<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public $motivo_contatos=[
        '1'=>'Dúvida',
        '2'=>'Elogio',
        '3'=>'Reclamação',
        '4'=>'Sugestão',
    ];
    public function Principal(){
        
        return view('site.principal',['motivo_contatos'=>$this->motivo_contatos]);
    }

}
