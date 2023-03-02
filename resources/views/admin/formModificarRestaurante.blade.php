<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Restaurantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="w-full max-w-xs mx-auto">
                    <h3 class='text-lg dark:text-gray-400'>Modificar restaurante</h3>
                    
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method='POST' action='/restaurantesAdmin/{{ $restaurante->id }}/update'>
                        @csrf

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">
                                Nombre
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="nombre" name="nombre" type="text" value="{{ old('nombre') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="direccion">
                                Direccion
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="direccion" name="direccion" type="text" value="{{ old('direccion') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="ciudad">
                                Ciudad
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="ciudad" name="ciudad" type="text" value="{{ old('ciudad') }}">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="telefono">
                                Telefono
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="telefono" name="telefono" type="text" value="{{ old('telefono') }}">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="latitud">
                                Latitud
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="latitud" name="latitud" type="text" value="{{ old('latitud') }}">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="longitud">
                                Longitud
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="longitud" name="longitud" type="text" value="{{ old('longitud') }}">
                        </div>


                        <div class="flex items-center justify-center">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Modificar restaurante
                            </button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>

