<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function index(){
        $fornecedores = [
            0=>['nome'=>'Estevo',
                'ativo'=>'S',
                'cnpj'=>'',
                'ddd'=>'41',
                'telefone'=>'35656565656',
                
            ],
            1=>['nome'=>'Jose',
                'ativo'=>'S',
                'cnpj'=>'0151561406544',
                'ddd'=>'11',
                'telefone'=>'35656565656',
            ],
            2=>['nome'=>'Pedro',
                'ativo'=>'S',
                'cnpj'=>'0151561406544',
                'ddd'=>'43',
                'telefone'=>'35656565656',
            ],
                
        ];
        
        return view('app.fornecedor.index',compact('fornecedores'));
    }
}
