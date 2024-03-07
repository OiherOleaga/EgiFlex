@extends('layouts.app')
@section('content')
    <div class="py-12">
        <div class="mx-1 sm:px-6 lg:px-8">
            <div class="w-full mb-1">
                <div class="mb-4">
                    <nav class="flex mb-5" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                            <li class="inline-flex items-center">
                                <a href="/"
                                    class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                                    <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                        </path>
                                    </svg>
                                    Inicio
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <a href="/temporadas"
                                        class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Temporadas</a>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">Lista</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Todas las temporadas
                    </h1>
                </div>
            <div class="mb-4">
                <form action="{{ route('temporadas.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Buscar temporada..."
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600">
                    <button type="submit"
                        class="mt-2 px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 focus:bg-indigo-700">Filtrar</button>
                </form>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            @if ($temporadas->isEmpty())
                                <p class="mt-4 text-red-600">No se encontraron resultados para los criterios de búsqueda especificados.
                                </p>
                            @else
                                {{ $temporadas->links() }}
                            @endif
                        </div>
                    </div>
                    <div class="mb-4">
                        <a href="{{ route('temporadas.create') }}"
                            class="inline-block px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:bg-green-700">Crear
                            Temporada</a>
                    </div>
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">¡Éxito!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @elseif (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">¡Error!</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
                    <table
                        class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400 overflow-x-auto">
                        <thead
                            class="text-xs text-gray-700 uppercase text-center bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">

                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">

                                    Serie
                                </th>
                                <th scope="col" class="px-6 py-3">

                                    Número de Temporada
                                </th>
                                <th scope="col" class="px-6 py-3">

                                    Número de Episodios
                                </th>
                                <th scope="col" class="px-6 py-3">

                                    Fecha de Estreno
                                </th>
                                <th scope="col" class="px-6 py-3">

                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($temporadas as $temporada)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-center">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">
                                        {{ $temporada->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">
                                        {{ $temporada->serie->titulo }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">
                                        {{ $temporada->numero_temporada }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">
                                        {{ $temporada->numero_episodios }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">
                                        {{ $temporada->fecha_estreno }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('temporadas.edit', $temporada->id) }}"
                                            class="inline-block px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 focus:bg-indigo-700">Editar</a>
                                        <form action="{{ route('temporadas.destroy', $temporada->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-block px-4 py-2 bg-red-500 text-white rounded-lg ml-2 hover:bg-red-600 focus:bg-red-700">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('input[name="search"]');

            searchInput.focus();
        });
    </script>
@endsection
