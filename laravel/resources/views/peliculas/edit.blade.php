@extends('layouts.app')
@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <form action="{{ route('peliculas.update', $pelicula->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8 divide-y divide-gray-200 dark:divide-gray-700">
                        @csrf
                        @method('PUT')

                        <div class="space-y-8 divide-y divide-gray-200 dark:divide-gray-700 sm:space-y-5">
                            <div class="space-y-6 sm:space-y-5">
                                <div>
                                    <label for="titulo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Título</label>
                                    <div class="mt-1">
                                        <input type="text" name="titulo" id="titulo" autocomplete="titulo" value="{{ $pelicula->titulo }}" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                                    </div>
                                </div>

                                <div>
                                    <label for="director" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Director</label>
                                    <div class="mt-1">
                                        <input type="text" name="director" id="director" autocomplete="director" value="{{ $pelicula->director }}" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                                    </div>
                                </div>

                                <div>
                                    <label for="ano_lanzamiento" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha de Lanzamiento</label>
                                    <div class="mt-1">
                                        <input type="date" name="ano_lanzamiento" id="ano_lanzamiento" autocomplete="ano_lanzamiento" value="{{ $pelicula->ano_lanzamiento }}" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                                    </div>
                                </div>

                                <div>
                                    <label for="sinopsis" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sinopsis</label>
                                    <div class="mt-1">
                                        <textarea name="sinopsis" id="sinopsis" autocomplete="sinopsis" rows="3" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">{{ $pelicula->sinopsis }}</textarea>
                                    </div>
                                </div>

                                <div>
                                    <label for="duracion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Duración</label>
                                    <div class="mt-1">
                                        <input type="number" name="duracion" id="duracion" autocomplete="duracion" min="1" value="{{ $pelicula->duracion }}" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                                    </div>
                                </div>

                                <div>
                                    <label for="categoria" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categoría</label>
                                    <div class="mt-1">
                                        <select name="categoria" id="categoria" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                                            @foreach($categorias as $categoria)
                                                <option value="{{ $categoria->id }}" {{ $pelicula->categorias->contains('id', $categoria->id) ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <label for="archivo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Archivo</label>
                                    <div class="mt-1">
                                        <input type="file" name="archivo" id="archivo" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                                    </div>
                                </div>

                                <div>
                                    <label for="portada" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Portada</label>
                                    <div class="mt-1">
                                        <input type="file" name="portada" id="portada" accept="image/*" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                                    </div>
                                </div>

                                <div>
                                    <label for="poster" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Poster</label>
                                    <div class="mt-1">
                                        <input type="file" name="poster" id="poster" accept="image/*" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-5">
                            <div class="flex justify-end space-x-4">
                                <a href="{{ route('peliculas.index') }}" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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