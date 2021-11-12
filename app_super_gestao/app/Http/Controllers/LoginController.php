<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class LoginController extends Controller
{
    public function index(Request $request){
        $erro = $request->get("erro");
        if($erro == 1){
            $erro = "Combinação de usuário e senha não existe!";
        }else if($erro == 2){
            $erro = "Necessário realizar login para ter acesso a página";
        }
        return view('site.login',['titulo'=>'Login','erro' => $erro]);
    }
    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
    public function autenticar(Request $request){
        $regras = [
            'usuario' => 'email',
            'senha'=> 'required',
        ];
        $feedback = [
            'email'=>'Campo deve ser um email válido',
            'senha.required'=>'Campo senha deve ser preenchido',
        ];

        $request->validate($regras,$feedback);
        $usuario = $request->get("usuario");
        $senha = $request->get("senha");

        echo "<pre>$usuario <br> $senha</pre>";
        
        $user = new User();

        $existe = $user->where('email',$usuario)
        ->where('password',$senha)
        ->get()->first();
        
        if(isset($existe->name)){
            session_start();
            $_SESSION['nome'] = $existe->name;
            $_SESSION['email'] = $existe->email;
            
            return redirect()->route('app.home');
        }else{
            return redirect()->route('site.login',["erro"=> 1]);
        }
    }
}
