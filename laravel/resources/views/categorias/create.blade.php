@extends('layouts.app')
@section('content')

    <div class="py-12">
        <div class="mx-1 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <form action="{{ route('categorias.store') }}" method="POST" class="space-y-8 divide-y divide-gray-200 dark:divide-gray-700">
                        @csrf

                        <div class="space-y-8 divide-y divide-gray-200 dark:divide-gray-700 sm:space-y-5">
                            <div class="space-y-6 sm:space-y-5">
                                <div>
                                    <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                                    <div class="mt-1">
                                        <input type="text" name="nombre" id="nombre" autocomplete="nombre" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-5">
                            <div class="flex justify-end space-x-4">
                                <a href="{{ route('categorias.index') }}" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
@endsection
