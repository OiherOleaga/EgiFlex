<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Serie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <form method="POST" action="{{ route('series.store') }}">
                        @csrf

                        <div class="mt-4">
                            <x-label for="titulo" :value="__('Título')" />

                            <x-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="director" :value="__('Director')" />

                            <x-input id="director" class="block mt-1 w-full" type="text" name="director" :value="old('director')" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="ano_lanzamiento" :value="__('Año de Lanzamiento')" />

                            <x-input id="ano_lanzamiento" class="block mt-1 w-full" type="text" name="ano_lanzamiento" :value="old('ano_lanzamiento')" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="sinopsis" :value="__('Sinopsis')" />

                            <textarea id="sinopsis" class="block mt-1 w-full" name="sinopsis" required>{{ old('sinopsis') }}</textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Crear Serie') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
