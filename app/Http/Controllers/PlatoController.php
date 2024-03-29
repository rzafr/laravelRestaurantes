<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use App\Models\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('web.platos', [ 'platos' => Plato::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Restaurante $restaurante)
    {
        return view('admin.formAgregarPlato', ['restaurante' => $restaurante]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Restaurante $restaurante)
    {
        // Mete los datos del input en la sesion
        $request->flash();

        // Grabamos un objeto Plato en BBDD con los datos del $request
        $plato = new Plato();
        $plato->nombre = $request->input('nombre');
        $plato->descripcion = $request->input('descripcion');
        $plato->precio = $request->input('precio');
        $plato->categoria = $request->input('categoria');
        $plato->restaurante_id = $restaurante->id;

        // Foto
        $path = $request->file('foto')->store('public');
        
        // Cambiamos public por storage en la BBDD para que se pueda ver la imagen en la web
        $plato->foto = str_replace('public', 'storage', $path);

        $plato->save();

        return redirect('/restaurantesAdmin/' . $restaurante->id . '/platos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function show(Plato $plato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function edit(Plato $plato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plato $plato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurante $restaurante, Plato $plato)
    {
        $plato->delete();
        
        return redirect('/restaurantesAdmin/' . $restaurante->id . '/platos');
    }

    /**
     * Manda a la vista de carta, el restaurante y sus platos
     */
    public function platosRestaurante(Restaurante $restaurante)
    {
        return view('web.platosRestaurante' , ['restaurante' => $restaurante, 'platos' => $restaurante->platos()->get()]);
    }

    /**
     * Manda a la intranet, el restaurante y sus platos
     */
    public function platosRestauranteAdmin(Restaurante $restaurante)
    {
        return view('admin.platosRestaurante' , ['restaurante' => $restaurante, 'platos' => $restaurante->platos()->get()]);
    }

    /**
     * Muestra los 10 platos mas pedidos en orden descendente
     */
    public function platosMasPedidos()
    {

        $platosMasPedidos = DB::table('platos')
                            ->select('platos.*', DB::raw('count(*) as pedidos'))
                            ->join('pedido_plato', 'platos.id', '=', 'pedido_plato.plato_id')
                            ->groupBy('platos.id')
                            ->orderByDesc('pedidos')
                            ->limit(10)
                            ->get();

        return view('welcome', ['platosMasPedidos' => $platosMasPedidos, 'restaurantes' => Restaurante::all() ]);
    }

    /**
     * Metodo de la API para crear un plato
     */
    public function crearPlato(Request $request, $id)
    {
        // Grabamos un objeto Plato en BBDD con los datos del $request
        $plato = new Plato();
        $plato->nombre = $request->nombre;
        $plato->descripcion = $request->descripcion;
        $plato->foto = $request->foto;
        $plato->precio = $request->precio;
        $plato->categoria = $request->categoria;
        $plato->restaurante_id = $id;

        $plato->save();

        return response()->json(['msg:' => 'Plato creado']);
    }

}