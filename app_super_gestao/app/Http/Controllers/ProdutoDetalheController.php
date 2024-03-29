<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProdutoDetalhe;
use App\ItemDetalhe;
use App\Unidade;
class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Teste";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $unidades = Unidade::all();
        return view('app.produto_detalhe.create',['unidades'=>$unidades]);
        // ProdutoDetalhe::create($request->all());
        // return redirect()->route('app.produto-detalhe');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProdutoDetalhe::create($request->all());
        $msg = "Registro criado com sucesso";
        
        echo $msg;
        //return redirect()->route('app.produto-detalhe',['msg'=> $msg]);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\ProdutoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produtoDetalhe= ItemDetalhe::with(['Item'])->find($id);
        $unidades = Unidade::all();
        
        return view("app.produto_detalhe.edit",['produto_detalhe'=>$produtoDetalhe,'unidades'=>$unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ProdutoDetalhe 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ProdutoDetalhe $produtoDetalhe)
    {
        $produtoDetalhe->update($request->all());
        return redirect()->route('produto-detalhe.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
