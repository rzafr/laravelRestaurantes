@extends('web.layout')

@section('titulo', 'Restaurante ' . $restaurante->nombre)

@section('main')
    
    <div class='row mb-5'>
        <div class='col-5'>
            <h4>Direccion: {{$restaurante->direccion}}</h4>
            <h4>Ciudad: {{$restaurante->ciudad}}</h4>
            <h4>Telefono: {{$restaurante->telefono}}</h4>
            <h4>Latitud: {{$restaurante->latitud}}º</h4>
            <h4>Longitud: {{$restaurante->longitud}}º</h4>
            <a href="/platos/{{ $restaurante->id }}"><x-boton type='secondary' mensaje='Ver carta'/></a>
        </div>
        <div class='col-5'>
            <div id='map' style="width: 500px; height: 300px"></div>
        </div>
    </div>

@endsection

@section('scripts')

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap">
    </script>

    <script type="text/javascript">
        function initMap() {
            var latitud = "{{ json_encode($restaurante->latitud) }}";
            var longitud = "{{ json_encode($restaurante->longitud) }}";
            var myLatLng = {lat: Number(latitud), lng: Number(longitud) };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 9,
                center: myLatLng
            });
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: '{{ $restaurante->nombre }}'
            });
        }
    </script>
    
@endsection