<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;
use App\LogAcessoModel;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ip=$request->server->get('REMOTE_ADDR');
        $rota=$request->getRequestUri();
        $msg="Ip $ip   PASSOU PELA ROTA $rota ";
        LogAcessoModel::create(['log'=>$msg]);
        // return  Response('Chegamos no middleware');
        
        //--MANIPULANDO O RETORNO
        $resposta= $next($request);
        $resposta->setStatusCode('201','O texto do statusText foi alterado');
        // dd($resposta);
        return $resposta;
    }
}
