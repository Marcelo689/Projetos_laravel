<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;
class FornecedorController extends Controller
{
    public function index() {
        
        return view('app.fornecedor.index');
    }

    public function listar(){
        return view('app.fornecedor.listar');
    }

    public function adicionar(Request $request){
        $msg = '';
        if($request->input('_token') != ''){
            $regras = [
                'nome'=> 'required | min:3',
                'site'=> 'required',
                'uf'=> 'required | min:2 | max:2',
                'email'=> 'required | email'
            ];
            $feedback=[
                'required'=> 'O campo :attribute deve ser preenchido',
                'uf.min' => 'O campo uf deve conter 2 caracteres',
                'uf.max' => 'O campo uf deve conter 2 caracteres',
                'nome.min'=> 'O campo nome deve ter no minimo 3 caracteres',
                'email'=> 'O campo deve conter um email válido'
            ];

            $request->validate($regras,$feedback);
            
            $fornecedor = new Fornecedor();

            $fornecedor->create($request->all());

            $msg = "Cadastro realizado com sucesso";
        }
        return view('app.fornecedor.adicionar',['msg'=> $msg]);
    }
}
