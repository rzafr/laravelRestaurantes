@extends('web.layout')

@section('titulo', 'Los platos mas pedidos en Indalfood')

@section('main')
    
    
    @foreach($platos as $plato)
        <x-plato>
            <div class="col-3">
                <img src="{{ asset($plato->foto) }}" class="card-img-top" height="250" alt="{{ $plato->nombre }}">
            </div>   
            <div class="col-4">
                <h5 class="fw-bold">{{ $plato->nombre }}</h5>
                <p>
                    Categoria: {{ $plato->categoria }}
                </p>
                <p>
                    {{ $plato->descripcion }}
                </p>
                <p class="fw-bold">
                    Precio: {{ $plato->precio }} €
                </p>
            </div>
            
        </x-plato>
    @endforeach
    

@endsection