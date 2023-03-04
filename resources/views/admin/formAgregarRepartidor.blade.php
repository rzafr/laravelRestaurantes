<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Formulario nuevo repartidor') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="/repartidores/store">
                @csrf

                <!-- Nombre -->
                <div>
                    <x-input-label for="nombre" :value="__('Nombre')" />
                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                </div>

                <!-- Apellidos -->
                <div>
                    <x-input-label for="apellidos" :value="__('Apellidos')" />
                    <x-text-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')" required autofocus autocomplete="apellidos" />
                    <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="text" name="password" :value="old('password')" required autofocus autocomplete="password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Rol -->
                <div>
                    <x-input-label for="rol" :value="__('Rol')" />
                    <x-text-input id="rol" class="block mt-1 w-full" type="text" name="rol" :value="old('rol')" required autofocus autocomplete="rol" value="repartidor" />
                    <x-input-error :messages="$errors->get('rol')" class="mt-2" />
                </div>

                <!-- Telefono -->
                <div>
                    <x-input-label for="telefono" :value="__('Telefono')" />
                    <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required autofocus autocomplete="telefono" />
                    <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                </div>

                <!-- Salario -->
                <div>
                    <x-input-label for="salario" :value="__('Salario')" />
                    <x-text-input id="salario" class="block mt-1 w-full" type="text" name="salario" :value="old('salario')" required autofocus autocomplete="salario" />
                    <x-input-error :messages="$errors->get('salario')" class="mt-2" />
                </div>

                <!-- Estado -->
                <div>
                    <x-input-label for="estado" :value="__('Estado')" />
                    <x-text-input id="estado" class="block mt-1 w-full" type="text" name="estado" :value="old('estado')" required autofocus autocomplete="estado" value="libre" />
                    <x-input-error :messages="$errors->get('estado')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Agregar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

