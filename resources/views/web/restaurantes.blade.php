@extends('web.layout')

@section('titulo', 'Los restaurantes de Indalfood')

@section('main')
    
    <div class='row mb-5'>
        @foreach($restaurantes as $restaurante)
            <x-restaurante>
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $restaurante->nombre }}</h5>
                    <p class="card-text">
                        Direccion: {{ $restaurante->direccion }}
                    </p>
                    <p class="card-text">
                        {{ $restaurante->ciudad }}
                    </p>
                    <p class="card-text fw-bold">
                        Telefono: {{ $restaurante->telefono }}
                    </p>
                    <!--Luego controlar que los pedidos tienen que ser al mismo restautante-->
                    <a href="/platos/{{ $restaurante->id }}"><x-boton type='secondary' mensaje='Ver carta'/></a>
                    <a href="/restaurantes/{{ $restaurante->id }}"><x-boton type='secondary' mensaje='Ver en el mapa'/></a>
                </div>
            </x-restaurante>
        @endforeach
    </div>

@endsection