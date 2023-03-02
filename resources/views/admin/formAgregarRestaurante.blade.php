<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Formulario nuevo restaurante') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="/restaurantesAdmin/store">
                @csrf

                <!-- Nombre -->
                <div>
                    <x-input-label for="nombre" :value="__('Nombre')" />
                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                </div>

                <!-- Direccion -->
                <div>
                    <x-input-label for="direccion" :value="__('Direccion')" />
                    <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required autofocus autocomplete="direccion" />
                    <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
                </div>

                <!-- Ciudad -->
                <div>
                    <x-input-label for="ciudad" :value="__('Ciudad')" />
                    <x-text-input id="ciudad" class="block mt-1 w-full" type="text" name="ciudad" :value="old('ciudad')" required autofocus autocomplete="ciudad" />
                    <x-input-error :messages="$errors->get('ciudad')" class="mt-2" />
                </div>

                <!-- Telefono -->
                <div>
                    <x-input-label for="telefono" :value="__('Telefono')" />
                    <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required autofocus autocomplete="telefono" />
                    <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                </div>

                <!-- Latitud -->
                <div>
                    <x-input-label for="latitud" :value="__('Latitud')" />
                    <x-text-input id="latitud" class="block mt-1 w-full" type="text" name="latitud" :value="old('latitud')" required autofocus autocomplete="latitud" />
                    <x-input-error :messages="$errors->get('latitud')" class="mt-2" />
                </div>

                <!-- Longitud -->
                <div>
                    <x-input-label for="longitud" :value="__('Longitud')" />
                    <x-text-input id="longitud" class="block mt-1 w-full" type="text" name="longitud" :value="old('longitud')" required autofocus autocomplete="longitud" />
                    <x-input-error :messages="$errors->get('longitud')" class="mt-2" />
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

