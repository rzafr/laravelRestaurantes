<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Formulario nuevo plato') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action='/restaurantesAdmin/{{ $restaurante->id }}/platos/store' enctype="multipart/form-data">
                @csrf

                <!-- Nombre -->
                <div>
                    <x-input-label for="nombre" :value="__('Nombre')" />
                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                </div>

                <!-- Descripcion -->
                <div>
                    <x-textarea-label for="descripcion" :value="__('Descripcion')" />
                    <x-textarea id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" :value="old('descripcion')" required autofocus autocomplete="descripcion" />
                    <x-textarea-error :messages="$errors->get('descripcion')" class="mt-2" />
                </div>

                <!-- Foto -->
                <div>
                    <x-input-label for="foto" :value="__('Foto')" />
                    <x-text-input id="foto" class="block mt-1 w-full" type="file" name="foto" :value="old('foto')" required autofocus autocomplete="foto" />
                    <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                </div>

                <!-- Precio -->
                <div>
                    <x-input-label for="precio" :value="__('Precio')" />
                    <x-text-input id="precio" class="block mt-1 w-full" type="text" name="precio" :value="old('precio')" required autofocus autocomplete="precio" />
                    <x-input-error :messages="$errors->get('precio')" class="mt-2" />
                </div>

                <!-- Categoria -->
                <div>
                    <x-input-label for="categoria" :value="__('Categoria')" />
                    <x-text-input id="categoria" class="block mt-1 w-full" type="text" name="categoria" :value="old('categoria')" required autofocus autocomplete="categoria" />
                    <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
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

