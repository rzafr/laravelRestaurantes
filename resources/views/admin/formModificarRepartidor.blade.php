<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Repartidores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="w-full max-w-xs mx-auto">
                    <h3 class='text-lg dark:text-gray-400'>Modificar repartidor</h3>
                    
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method='POST' action='/repartidores/{{ $repartidor }}/update'>
                        @csrf

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="dni">
                                DNI
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="dni" name="dni" type="text" value="{{ old('dni') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">
                                Nombre
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="nombre" name="nombre" type="text" value="{{ old('nombre') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="apellidos">
                                Apellidos
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="apellidos" name="apellidos" type="text" value="{{ old('apellidos') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                Email
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="email" name="email" type="text" value="{{ old('email') }}">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                Password
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="password" name="password" type="text" value="{{ old('password') }}">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="rol">
                                Rol
                            </label>
                            <select
                                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                                name="rol">
                                <option value="repartidor">Repartidor</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="direccion">
                                Direccion
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="direccion" name="direccion" type="text" value="{{ old('direccion') }}">
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
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="salario">
                                Salario
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="salario" name="salario" type="text" value="{{ old('salario') }}">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="estado">
                                Estado
                            </label>
                            <select
                                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                                name="estado">
                                <option value="libre" selected>Libre</option>
                                <option value="ocupado">Ocupado</option>
                            </select>
                        </div>


                        <div class="flex items-center justify-center">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Modificar repartidor
                            </button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>

