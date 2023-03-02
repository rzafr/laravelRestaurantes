<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexClientes()
    {
        return view('admin.clientes', [ 'clientes' => User::clientes()->get() ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexRepartidores()
    {
        return view('admin.repartidores', [ 'repartidores' => User::repartidores()->get() ]);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRepartidores()
    {
        return view('admin.formAgregarRepartidor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRepartidores(Request $request)
    {
        // Mete los datos del input en la sesion
        $request->flash();

        // Creamos un objeto User con los datos del $request y lo grabamos en BBDD 
        $repartidor = new User();
        $repartidor->dni = $request->input('dni');
        $repartidor->nombre = $request->input('nombre');
        $repartidor->apellidos = $request->input('apellidos');
        $repartidor->email = $request->input('email');
        $repartidor->password = $request->input('password');
        $repartidor->rol = $request->input('rol');
        $repartidor->direccion = $request->input('direccion');
        $repartidor->ciudad = $request->input('ciudad');
        $repartidor->telefono = $request->input('telefono');
        $repartidor->salario = $request->input('salario');
        $repartidor->estado = $request->input('estado');

        $repartidor->save();

        return redirect('/repartidores');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editRepartidores($id)
    {
        return view('admin.formModificarRepartidor', ['repartidor' => $id]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRepartidores(Request $request, $id)
    {
        // Recuperamos el objeto User que queremos actualizar
        $repartidor = User::find($id);
        
        // Mete los datos del input en la sesion
        $request->flash();

        // Modificamos el objeto User con los datos del $request y lo grabamos en BBDD
        $repartidor->dni = $request->input('dni');
        $repartidor->nombre = $request->input('nombre');
        $repartidor->apellidos = $request->input('apellidos');
        $repartidor->email = $request->input('email');
        $repartidor->password = $request->input('password');
        $repartidor->rol = $request->input('rol');
        $repartidor->direccion = $request->input('direccion');
        $repartidor->ciudad = $request->input('ciudad');
        $repartidor->telefono = $request->input('telefono');
        $repartidor->salario = $request->input('salario');
        $repartidor->estado = $request->input('estado');

        $repartidor->save();

        return redirect('/repartidores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyClientes($id)
    {
        User::where('id', $id)->delete();
        return redirect('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyRepartidores($id)
    {
        User::where('id', $id)->delete();
        return redirect('/repartidores');
    }
}
