@extends('web.layout')

@section('titulo', 'Tu carrito en Indalfood')

@section('main')

    <div class='row mb-5'>
        <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Plato</th>
            <th scope="col">Precio</th>
            <th scope="col">Unidades</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lineas as $linea)
            <tr>
            <td>{{ $linea['name'] }}</td>
            <td>{{ $linea['price'] }} €</td>
            <td>{{ $linea['quantity'] }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <a href="/pedido"><x-boton type='secondary' mensaje='Realizar pedido'/></a>
    </div>
    
@endsection