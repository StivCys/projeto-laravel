<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});

*/

//--rotas nomeadas pela function name para evitar dependencia direta da rota caso ela mude um dia
Route::get('/', 'PrincipalController@Principal')->name('site.index');

Route::get('/sobre-nos', 'SobreNosController@SobreNos')->name('site.sobre-nos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

Route::get('/teste', 'TesteController@inicio')->name('site.teste');

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

//--rotas agrupadas  por prefixo app e nomeadas pela function name
Route::middleware('autenticacao:parametro_padrao,visitante')->prefix('/app')->group(function(){
    Route::get('/home','AppHomeController@index')->name('app.home');
    Route::get('/sair','LoginController@sair')->name('app.sair');
    Route::get('/cliente','AppClienteController@index')->name('app.cliente');
    Route::get('/fornecedores','AppFornecedoresController@index')->name('app.fornecedor');
    Route::get('/produto','AppProdutosController@index')->name('app.produto');
});

//--rota validando parametros com regex, obs o  '?' torna o paremetro opcional
Route::get('/contato/{nome}/{idade}/{atividade?}', function(string $nome, int $idade, string $atividade='atividade não declarada'){
    echo "ola $nome - $idade - Atividade: $atividade"; 
})->where('nome','[A-Za-z]+')->where('idade','[0-9]+')->where('atividade','^[A-Za-z\s]+$');//a ultima  regex que aceita espaço entre palavras
 
###############################
//REDIRECIONAMENTO DE ROTAS
Route::get('/rota1',function(){
    return "Rota 1";

})->name('site.rota1');

// PRIMEIRA MANEIRA
Route::get('/rota2',function(){
    // return "Rota 2";
    // Redirecionando direto na fun calback
    return redirect()->route('site.rota1');
})->name('site.rota2');

// SEGUNDA MANEIRA - REDIRECIONANDO DIRETAMENTE USANDO redirect
// Route::redirect('/rota2', '/rota1');
################################

#########
//ENCAMINHANDO PARAMETROS DA ROTA PARA O CONTROLADOR
Route::get('/teste/{p1?}/{p2?}','TesteController@TesteSoma')->name('site.teste');
// Route::get('/teste','TesteController@TesteSoma')->name('site.teste');

#ROTA DE CONTIGENCIA, ROTA DE FALLBACK PARA EVITAR ERROS  E REDIRECIONAR PARA UMA PAGINA ESPECIFICA
Route::fallback(function(){
    echo "A rota acessada não existe.<a href='".route('site.index')."'>Clique aqui para voltar para a pagina principal</a> ";
});




/*
aqui podem ser usados os verbos http get , post , put , patch , delete , options
*/ 