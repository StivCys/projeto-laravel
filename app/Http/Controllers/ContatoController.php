<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){

        

        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";
        // var_dump($_POST);

        // dd($request);

        if(count($request->all()) ){
            // METODO PEDREIRA
            /*
            $contato=new SiteContato();
            $contato->nome=$request->input('nome');
            $contato->telefone=$request->input('telefone');
            $contato->email=$request->input('email');
            $contato->motivo_contato=$request->input('motivo_contato');
            $contato->mensagem=$request->input('mensagem');
            $contato->save();
            */

            //METODO PRATICO
            $contato=new SiteContato();
            // precisa ter a variavel no model $fillable definindo todos os campos do array que viram no request
            $contato->fill($request->all());
            $contato->save();


        }


        $motivo_contatos = MotivoContato::all();
        return view('site.contato',['motivo_contatos'=>$motivo_contatos]);
    }

    public function salvar(Request $request){
        
        //dd($request);  
        
        //--realizar as validaçoes antes de persistir no banco
        //--validate caso não atenda os requisitos faz o redirect para a pagina
        // anterior para informar os erros pela variavel $errors na view 
        
        //--regras para os campos do formulario
        $regras=[
            'nome'=>'required|min:3|max:50|unique:site_contatos',
            'telefone'=>'required',
            'email'=>'email',
            'motivo_contatos_id'=>'required',
            'mensagem'=>'required|min:10|max:2000',
        ];

        //mensagem personalizadas
        $feedback=[
            'nome.required'=>'O campo nome precisa ser preenchido',
            'nome.min'=>'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max'=>'O campo nome precisa ter no máximo 50 caracteres',
            'nome.unique'=>'O campo nome ja consta na base de dados',
            'telefone.required'=>'O campo telefone precisa se informado',
            'email.email'=>'Informe um email valido',
            'motivo_contatos_id.required'=>'Informe o motivo do contato ',
            'mensagem.required'=>'Escrevea sua mensagem',
            'mensagem.min'=>'Sua mensagem precisa ter no mínimo 10 carteres',
            'mensagem.max'=>'Sua mensagem precisa ter no máximo 2000 carteres',
        ];
        
        $request->validate($regras,$feedback);

        SiteContato::create($request->all());
        
        $motivo_contatos = MotivoContato::all();
        return view('site.contato',['motivo_contatos'=>$motivo_contatos]);
    }
}
