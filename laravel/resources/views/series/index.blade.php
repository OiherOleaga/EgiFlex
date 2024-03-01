<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Series') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <form action="{{ route('series.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Buscar serie..." class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600">
                    <button type="submit" class="mt-2 px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 focus:bg-indigo-700">Filtrar</button>
                </form>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            @if ($series->isEmpty())
                                <p class="mt-4">No se encontraron resultados para los criterios de búsqueda especificados.</p>
                            @else
                                {{ $series->links() }}
                            @endif
                        </div>
                    </div>
                    <div class="mb-4">
                        <a href="{{ route('series.create') }}" class="inline-block px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:bg-green-700">Crear Serie</a>
                    </div>
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">¡Éxito!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @elseif (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">¡Error!</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Portada
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Poster
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Título
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Director
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Año de Lanzamiento
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Sinopsis
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Categoría
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($series as $serie)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">
                                    @if ($serie->portada)
                                        <a href="{{ asset($serie->portada) }}" data-fancybox>
                                            <img src="{{ asset($serie->portada) }}" alt="Portada actual" class="mt-2 rounded-md" style="max-width: 50px; max-height: 50px;">
                                        </a>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">
                                    @if ($serie->poster)
                                        <a href="{{ asset($serie->poster) }}" data-fancybox>
                                            <img src="{{ asset($serie->poster) }}" alt="poster actual" class="mt-2 rounded-md" style="max-width: 50px; max-height: 50px;">
                                        </a>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">
                                    {{ $serie->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">
                                    {{ $serie->titulo }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">
                                    {{ $serie->director }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">
                                    {{ $serie->ano_lanzamiento }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">
                                    {{ $serie->sinopsis }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">
                                    @foreach($serie->categorias as $categoria)
                                        {{ $categoria->nombre }}
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('series.edit', $serie->id) }}" class="inline-block px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 focus:bg-indigo-700">Editar</a>
                                    <form action="{{ route('series.destroy', $serie->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-block px-4 py-2 bg-red-500 text-white rounded-lg ml-2 hover:bg-red-600 focus:bg-red-700">Eliminar</button>
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
</x-app-layout>
