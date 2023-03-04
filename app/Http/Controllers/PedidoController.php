<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Restaurante;
use App\Models\Plato;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $pedido = new Pedido();
        $pedido->estado = "recibido";
        $pedido->cliente_id = Auth::user()->id;
        $pedido->restaurante_id = session('local');
        $pedido->repartidor_id = User::where('estado', 'libre')->first()->id;

        $pedido->save();

        // Insertamos los platos en la tabla pivote

        // Sacamos las lineas de pedido de la sesion
        $lineas = session('carrito.lineas');

        // Para cada linea insertamos su id que es el id del plato en la tabla pivote pedido_plato
        foreach ($lineas as $linea) {
            $pedido->platos()->attach($linea['id']);
        }
        
        //$pedido->platos()->attach($plato->id);

        return view('web.pedidoOK');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }

    /**
     * Agrega platos de un mismo restaurante al carrito
     */
    public function addCarrito(Restaurante $restaurante, Plato $plato, Request $request) 
    {
        if (!session()->has('carrito.lineas')) {
            session(['local' => $restaurante->id]);

        } else if ($restaurante->id != session('local')) {
            // Mostramos mensaje de que los pedidos se hacen al mismo restaurante
            return view('web.pedidoNoPermitido');
        }

        // Agregamos el plato al carrito y lo metemos en la sesion
        $request->session()->push('carrito.lineas', array(
            'id' => $plato->id,
            'name' => $plato->nombre,
            'price' => $plato->precio,
            'quantity' => 1
        ));

        return redirect('/platos/' . $restaurante->id);

    }

    /**
     * Muestra el carrito
     */
    public function showCarrito()
    {
        if (!session()->has('carrito.lineas')) {
            return view('web.carritoVacio');
        }
        
        // Sacamos las lineas de pedido de la sesion
        $lineas = session('carrito.lineas');

        // Si el carrito esta vacio hay que mostrar mensaje de advertencia

        return view('web.carrito' , ['lineas' => $lineas]);
    }

}
