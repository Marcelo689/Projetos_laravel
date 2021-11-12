<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContato;

class PrincipalController extends Controller
{
    public function principal() {
        $motivo_contatos = MotivoContato::all();

        return view('site.principal',['motivo_contatos'=>$motivo_contatos]);
    }

    public function salvar(Request $request){
        $request->validate(
            [
            'nome' => 'required | min:3 | max:40',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contato'=> 'required',
            'mensagem'=> 'required'
            ]
            
        );
    }
}
