<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Unidade;
use App\UnidadePeso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $produtos = Produto::select('*','produtos.id as prod_id','produtos.descricao as prod_desc','unidades_peso.descricao as peso_desc','unidades.unidade as uni_desc')->leftJoin('unidades','unidades.id','=','produtos.unidade_id')
                             ->leftJoin('unidades_peso','unidades_peso.id','=','produtos.unidade_peso_id')
                             ->paginate(10);


                            //  dd($produtos);
        return view('app.produto.index',['produtos'=>$produtos,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $unidades= Unidade::all();
        $unidadesPeso= UnidadePeso::all();
        return view('app.produto.create',['unidades'=>$unidades,'unidades_peso'=>$unidadesPeso]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->input('_token')!='' && $request->input('id')==''){
            $regras=[
                'nome'=>'required|min:2|max:30',
                'descricao'=>'required|min:10|max:100',
                'peso'=>'required',
                'unidade_id'=>'required',
            ];

            $feedback=[
                'nome.required'=>"O nome do produto é obrigatório",
                'descricao.required'=>"A Descriação do produto é obrigatória",
                'descricao.min'=>"A Descriação do produto precisa ter no mínimo 10 caracteres",
                'descricao.max'=>"A Descriação do produto precisa ter no máximo 100 caracteres",
                'peso.required'=>"O peso precisa ser informado",
                'unidade_id.required'=>"A unidade precisa ser informada",
            ];

            //dd($request);
            $request->validate($regras,$feedback);

            Produto::create($request->all());
        }

        return redirect()->route('produto.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
        $unidade=Unidade::find($produto->unidade_id);
        $unidade_peso=UnidadePeso::find($produto->unidade_peso_id);
        return view('app.produto.show',['produto'=>$produto,'unidade'=>$unidade,'unidade_peso'=>$unidade_peso]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
        // echo "<pre>";
        // var_dump($produto);
        // echo "</pre>";
        $unidades= Unidade::all();
        $unidades_peso= UnidadePeso::all();
        return view('app.produto.edit',['produto'=>$produto,'unidades'=>$unidades,'unidades_peso'=>$unidades_peso]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        //
        if($request->input('_token')!='' && $request->input('id')!=''){
            $regras=[
                'nome'=>'required|min:2|max:30',
                'descricao'=>'required|min:10|max:100',
                'peso'=>'required',
                'unidade_id'=>'required',
            ];

            $feedback=[
                'nome.required'=>"O nome do produto é obrigatório",
                'descricao.required'=>"A Descriação do produto é obrigatória",
                'descricao.min'=>"A Descriação do produto precisa ter no mínimo 10 caracteres",
                'descricao.max'=>"A Descriação do produto precisa ter no máximo 100 caracteres",
                'peso.required'=>"O peso precisa ser informado",
                'unidade_id.required'=>"A unidade precisa ser informada",
            ];

            //dd($request);
            $request->validate($regras,$feedback);

            $produto->update($request->all());
        }

        return redirect()->route('produto.show',['produto'=>$produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
