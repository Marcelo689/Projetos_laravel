<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {


        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['titulo' => 'Contato (teste)','motivo_contatos'=>$motivo_contatos]);
    }

    public function salvar(Request $request){
        $regras =[
            'nome' => 'required | min:3 | max:40',
            'telefone' => 'required',
            'email' => 'email | unique:site_contatos',
            'motivo_contatos_id'=> 'required',
            'mensagem'=> 'required| max:2000'
            
        ];
        $mensagemAlerta =[
            'nome.min'=>"Nome deve conter no mínimo 3 caracteres",
            'nome.max'=>"Nome deve conter no máximo 40 caracteres",
            'required'=>"Você deve preencher o campo :attribute",
            "email"=> "Você deve preencher um email válido",
            "unique"=> "O campo :attribute deve ser único",
            'mensagem.max'=>"A Mensagem deve ter no máximo 2000 caracteres"
        ];
        $request->validate($regras,$mensagemAlerta);        
        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}
