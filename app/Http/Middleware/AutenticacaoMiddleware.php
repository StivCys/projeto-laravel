<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$metodo_autenticaco, $perfil_usuario)
    {
        // echo $metodo_autenticaco.'-'.$perfil_usuario;
        // echo "<br>";
        // if($metodo_autenticaco=='parametro_padrao')
        // {
        //     echo 'Verificar usuario e senha no banco de dados '.$perfil_usuario;
        // }

        // if($metodo_autenticaco=='ldap'){
        //     echo "Verificar usuario e senhao no Active Directory (AD) ".$perfil_usuario;
        // }

        // echo "<br>";
        // if(false){
        //     return $next($request);
        // }else{

        //     return response('Acesso restrito');
        // }
        session_start();    
        if(isset($_SESSION['user_name']) && $_SESSION['user_email']){
            return $next($request);
        }else{
            return redirect()->route('site.login',['erro'=>2]);
        }    

    }
}
