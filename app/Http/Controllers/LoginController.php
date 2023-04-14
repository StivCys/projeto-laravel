<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{
    //
    public function index(Request $request){

        $erro='';
        if($request->get('erro')=='1'){
            $erro=" Usuario e ou senha não existem";
        }
        if($request->get('erro')=='2'){
            $erro="Necessario fazer login para ter acesso a pagina";
        }
        return view('site.login',['titulo'=>'Login','erro'=>$erro]);
    }

    public function autenticar(Request $request){
        // echo"<pre>";
        // print_r($request->all());
        // echo"<pre>";

        $regras=[
            'login'=>'email',
            'password'=>'min:4|max:50',
        ];

        $feedback=[
            'login.email'=>"Informe um e-mail valido",
            'password.min'=>"A senha precisa ter mais de 4 caracteres ",
            'password.max'=>"A senha precisa ter no máximo de 50 caracteres ",
        ];

        $request->validate($regras,$feedback);

        $login=$request->get('login');
        $password=$request->get('password');

        $userFind =new User();

        $user=$userFind->where('email',$login)
                ->where('password',$password)
                ->get()->first();

        if(isset($user->name)){
            session_start();
            $_SESSION['user_name']=$user->name;
            $_SESSION['user_email']=$user->email;
            return redirect()->route('app.home');

        }else{
            return redirect()->route('site.login',['erro'=>1]);
        }

        // echo"<pre>";
        // print_r($user);
        //print_r($request->all());
        // echo"<pre>";
        //  redirect()->route('site.login');
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
