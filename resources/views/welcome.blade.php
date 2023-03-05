@extends('web.layout')

@section('buscador')

    
    <div class="row no-gutters my-2">

        <!-- Buscador de restaurantes -->
        <div class="col-2">
            <form method='POST' action='restaurantes/buscarNombre'>
                @csrf
                    <select class="form-select" name="restaurante">
                        @foreach($restaurantes as $restaurante)
                            <option value="{{$restaurante->id}}">{{$restaurante->nombre}}</option>
                        @endforeach
                    </select>
                    <input type="submit" class='form-control border border-secondary mt-2' id="enviar" name="enviar" value="Buscar restaurante">
            </form>
        </div>

        <!-- Buscador de categorias -->
        <div class="col-2">
            <form method='POST' action='restaurantes/buscarCategoria'>
                @csrf
                    <select class="form-select" name="categoria">
                        <option value="tradicional">Tradicional</option>
                        <option value="americana">Americana</option>
                        <option value="italiana">Italiana</option>
                        <option value="china">China</option>
                    </select>
                    <input type="submit" class='form-control border border-secondary mt-2' id="enviar" name="enviar" value="Buscar categoria">
            </form>
        </div>
    </div>
             
@endsection

@section('titulo', 'Los platos mas pedidos en nuestros restaurantes')

@section('main')

    @foreach($platosMasPedidos as $plato)

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
