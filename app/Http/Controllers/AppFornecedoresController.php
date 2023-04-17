<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class AppFornecedoresController extends Controller
{
    public function index(){
        
        return view('app.fornecedor.index');
    }

    public function listar(Request $request){
        
        $fornecedores = Fornecedor::where('nome','like','%'.$request->input('nome').'%')
                        ->where('site','like','%'.$request->input('site').'%')
                        ->where('uf','like','%'.$request->input('uf').'%')
                        ->where('email','like','%'.$request->input('email').'%')
                        ->paginate(4);

        return view('app.fornecedor.listar',['fornecedores'=>$fornecedores,'request'=>$request->all()]);
    }
    
    public function adicionar(Request $request){
        $msg='';
        //adiciona novo registro
        if($request->input('_token')!='' && $request->input('id')==''){
            
            $regras=[
                'nome'=>'required|min:3',
                'site'=>'required|min:6',
                'uf'=>'required| min:2|max:2',
                'email'=>'email'
            ];

            $feedback=[
                'nome.required'=>"Preencha o nome por favor",
                'nome.min'=>"O nome precisa ter mais de 3 caracteres",
                'site.min'=>"O site precisa ter mais de 5 caracteres",
                'site.required'=>"O site precisa ser informado",
                'uf.min'=>"Uf precisa ter pelo menos 2 caracteres",
                'uf.max'=>"Uf precisa ter no máximo 2 caracteres",
                'email.email'=>"Informe um e-mail válido",
            ];

            $request->validate($regras,$feedback);

            
            if(Fornecedor::create($request->all())){
                $msg="Registro inserido com sucesso";
            }else{
                $msg="Ocorreu um erro na inserção do registro";
            }
        }

        //--edicao de registro
        if($request->input('_token')!='' && $request->input('id')!=''){
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());
            if($update){
                $msg= "edição realizada com sucesso";
            } else {
                $msg= "edição falhou";
            }
            return redirect()->route('app.fornecedor.alterar',['id'=>$request->input('id'),'msg'=>$msg],303,[]);
        }

         return view('app.fornecedor.adicionar',['msg'=>$msg]);
    }

    public function alterar($id,$msg=''){
        
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar',['fornecedor'=>$fornecedor,'msg'=>$msg] );

    }
    
    public function excluir($id){
        //echo $id;
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor');
    }
    
    
}
