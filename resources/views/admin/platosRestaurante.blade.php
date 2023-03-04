<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('La carta de ' . $restaurante->nombre) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <x-boton-t href="/restaurantesAdmin/{{ $restaurante->id }}/platos/agregar">
                {{ __('Agregar plato') }}
            </x-boton-t>
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Descripcion
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Foto
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Precio
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Categoria
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Restaurante
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($platos as $plato)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $plato->nombre }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $plato->descripcion }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <img src="{{ asset($plato->foto) }}" width="200" height="200" alt="{{ $plato->nombre }}">
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $plato->precio }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $plato->categoria }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $plato->restaurante_id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <x-boton-t href="/restaurantesAdmin/{{ $restaurante->id }}/platos/{{ $plato->id }}/eliminar">
                                            {{ __('Eliminar') }}
                                        </x-boton-t>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>