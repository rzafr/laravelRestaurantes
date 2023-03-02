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
                    <h3 class='text-lg dark:text-gray-400'>Agregar plato</h3>
                    
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method='POST' action='/restaurantesAdmin/{{ $restaurante->id }}/platos/store' enctype="multipart/form-data">
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
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="descripcion">
                                Descripcion
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="descripcion" name="descripcion" type="text" value="{{ old('descripcion') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="foto">
                                Foto
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="foto" name="foto" type="file" value="{{ old('foto') }}">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="precio">
                                Precio
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="precio" name="precio" type="text" value="{{ old('precio') }}">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="categoria">
                                Categoria
                            </label>
                            <select
                                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                                name="categoria">
                                <option value="tradicional">Tradicional</option>
                                <option value="italiana">Italiana</option>
                                <option value="hamburgueseria">Hamburgueseria</option>
                                <option value="china">China</option>
                            </select>
                        </div>


                        <div class="flex items-center justify-center">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Agregar plato
                            </button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>

