<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Cliente;
class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pedidos = Pedido::with(['produtos'])->paginate(10);
        return view("app.pedido.index",['pedidos'=>$pedidos,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('app.pedido.create',['clientes'=>$clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'cliente_id'=>'exists:clientes,id',
        ];
        $feedback = [
            'cliente_id.exists'=>"O campo Cliente deve ser preenchido"
        ];

        $request->validate($regras,$feedback);
        $pedido = new Pedido();

        $pedido->cliente_id = $request->get('cliente_id');
        $pedido->save();
        //Pedido::with(['produtos'])->create($request->all());

        return redirect()->route('pedido.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::find($id);
        return view('app.pedido.show',['pedido'=>$pedido]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = Cliente::all();
        $pedido = Pedido::find($id);
        return view('app.pedido.edit',['pedido'=>$pedido,'clientes'=>$clientes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $regras = [
            'cliente_id'=>'exists:clientes,id',
        ];
        $feedback = [
            'cliente_id.exists'=>"O campo deve ser preenchido com um Cliente válido"
        ];
        $request->validate($regras,$feedback);
        Pedido::find($id)->update($request->all());
        return redirect()->route('pedido.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = Pedido::find($id);

        $pedido->delete();

        return redirect()->route('pedido.index');
    }
}
