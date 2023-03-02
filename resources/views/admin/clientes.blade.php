<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Control de clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Rol
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        DNI
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Apellidos
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Direccion
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Ciudad
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Telefono
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $cliente)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $cliente->rol }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $cliente->dni }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $cliente->nombre }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $cliente->apellidos }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $cliente->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $cliente->direccion }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $cliente->ciudad }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $cliente->telefono }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <x-boton-t href="/clientes/{{ $cliente->id }}/eliminar">
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