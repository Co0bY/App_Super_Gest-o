<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';
        if($erro = $request->get('erro') == 1){
            $erro = "Usuário ou Senha não existem";
        }elseif($erro = $request->get('erro') == 2){
            $erro = "Necessário realizar login para entrar na página";
        };
        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }
    public function autenticar(Request $request){
        //regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //mensagens de feedback de validação
        $feedback = [
            'usuario.email' => 'O campo usuario (e-mail) é obriatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);
        $email = $request->get('usuario');
        $senha = $request->get('senha');


        //iniciar model users
        $user = new User();
        
        $usuario = $user->where('email', $email)->where('password', $senha)->get()->first();
        
        if(isset($usuario->name)){
            session_start();
            $_SESSION['name'] = $usuario['name'];
            $_SESSION['email'] = $usuario['email'];

            return redirect()->route('cliente.index');
        }else{
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }
    
    public function sair(){
        session_destroy();

        return redirect()->route('site.index');
    }
}
