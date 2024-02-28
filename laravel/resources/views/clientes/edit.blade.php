<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" class="space-y-8 divide-y divide-gray-200 dark:divide-gray-700">
                        @csrf
                        @method('PUT')

                        <div class="space-y-8 divide-y divide-gray-200 dark:divide-gray-700 sm:space-y-5">
                            <div class="space-y-6 sm:space-y-5">
                                <div>
                                    <label for="correo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Correo</label>
                                    <div class="mt-1">
                                        <input type="email" name="correo" id="correo" autocomplete="correo" value="{{ $cliente->correo }}" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                                    </div>
                                </div>

                                <div>
                                    <label for="contrasena" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contraseña</label>
                                    <div class="mt-1">
                                        <input type="text" name="contrasena" id="contrasena" autocomplete="contrasena" value="{{ $cliente->contrasena }}" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                                    </div>
                                </div>

                                <div>
                                    <label for="estado" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estado</label>
                                    <div class="mt-1">
                                        <select name="estado" id="estado" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                                            <option value="activo" {{ $cliente->estado === 'activo' ? 'selected' : '' }}>Activo</option>
                                            <option value="inactivo" {{ $cliente->estado === 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <label for="codigo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Código</label>
                                    <div class="mt-1">
                                        <input type="text" name="codigo" id="codigo" autocomplete="codigo" value="{{ $cliente->codigo }}" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-5">
                            <div class="flex justify-end space-x-4">
                                <a href="{{ route('clientes.index') }}" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Cancelar
                                </a>
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
