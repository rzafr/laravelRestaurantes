<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Http\Request;

class RestauranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.restaurantes', [ 'restaurantes' => Restaurante::all() ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin()
    {
        return view('admin.restaurantes', [ 'restaurantes' => Restaurante::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.formAgregarRestaurante');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Mete los datos del input en la sesion
        $request->flash();

        // Creamos un objeto Restaurante con los datos del $request y lo grabamos en BBDD 
        $restaurante = new Restaurante();
        $restaurante->nombre = $request->input('nombre');
        $restaurante->direccion = $request->input('direccion');
        $restaurante->ciudad = $request->input('ciudad');
        $restaurante->telefono = $request->input('telefono');
        $restaurante->latitud = $request->input('latitud');
        $restaurante->longitud = $request->input('longitud');

        $restaurante->save();

        return view('admin.restaurantes', [ 'restaurantes' => Restaurante::all() ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurante $restaurante)
    {
        return view('web.restauranteDetalle', ['restaurante' => $restaurante]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurante $restaurante)
    {
        return view('admin.formModificarRestaurante', ['restaurante' => $restaurante]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurante $restaurante)
    {
        // Recuperamos el objeto Restaurante que queremos actualizar
        $restaurante = Restaurante::find($restaurante->id);
        
        // Mete los datos del input en la sesion
        $request->flash();

        // Modificamos el objeto Restaurante con los datos del $request y lo grabamos en BBDD
        $restaurante->nombre = $request->input('nombre');
        $restaurante->direccion = $request->input('direccion');
        $restaurante->ciudad = $request->input('ciudad');
        $restaurante->telefono = $request->input('telefono');
        $restaurante->latitud = $request->input('latitud');
        $restaurante->longitud = $request->input('longitud');

        $restaurante->save();

        return view('admin.restaurantes', [ 'restaurantes' => Restaurante::all() ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurante $restaurante)
    {
        $restaurante->delete();
        return redirect('/restaurantesAdmin');
    }

}
