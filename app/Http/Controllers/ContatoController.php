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
        //--validate caso não atenda os requisitos faz o redirect para a pagina anterior para informar os erros pela variavel $errors na view 
        $request->validate([
            'nome'=>'required|min:5|max:50',
            'telefone'=>'required',
            'email'=>'required',
            'motivo_contato'=>'required',
            'mensagem'=>'required|max:2000',
        ]);
        SiteContato::create($request->all());
        return view('site.contato',['motivo_contatos'=>$this->motivo_contatos]);
    }
}
