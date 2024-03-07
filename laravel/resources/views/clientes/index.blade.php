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
                                    <a href="/clientes"
                                        class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Clientes</a>
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
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Todos los clientes
                    </h1>
                </div>
            <div class="mb-4">
                <form action="{{ route('clientes.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Buscar cliente..."
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600">
                    <button type="submit"
                        class="mt-2 px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 focus:bg-indigo-700">Filtrar</button>

                    <div id="dropdownRadio"
                        class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                        data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"
                        style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownRadioButton">
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-1" type="radio" name="estado" value="en cola"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-example-1"
                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">En
                                        cola</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-2" type="radio" name="estado" value="aceptado"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-example-2"
                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Aceptado</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
            <div class="bg-white overflow-x-auto dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row mb-4">
                    <div class="col-md-12">
                        @if ($clientes->isEmpty())
                        <p class="mt-4 text-red-600">No se encontraron resultados para los criterios de búsqueda especificados.</p>
                        @else
                            {{ $clientes->links() }}
                        @endif
                    </div>
                </div>

            </div>
            <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                <div class="mb-4">
                    <a href="{{ route('clientes.create') }}"
                        class="inline-block px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:bg-green-700">Crear
                        Cliente</a>
                </div>
                @if (session('success'))
                    <div class="bg-green-100 border my-1 border-green-400 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
                        <strong class="font-bold">¡Éxito!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @elseif (session('error'))
                    <div class="bg-red-100 border my-1 border-red-400 text-red-700 px-4 py-3 rounded relative"
                        role="alert">
                        <strong class="font-bold">¡Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 overflow-x-auto">
                    <thead
                        class="text-xs text-gray-700 uppercase text-center bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Codigo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Estado
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Accion
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($clientes as $cliente)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $cliente->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $cliente->nombre }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $cliente->correo }}
                                </td>
                                <td class="px-6 py-4">
                                    .........
                                </td>
                                <td class="px-6 py-4">
                                    {{ $cliente->estado }}
                                </td>
                                <td class="px-6 py-4 flex items-center justify-center">
                                    @if ($cliente->estado == 'inactivo')
                                        {{-- <form id="aceptarClienteForm{{ $cliente->id }}"
                                    action="{{ route('clientes.aceptar', $cliente->id) }}" method="POST"> --}}
                                        @csrf
                                        <a href="/aceptar/{{$cliente->id}}/cliente">
                                        <button type="submit" 
                                            class="px-5 py-2.5 hover:bg-green-500 hover:text-green-900 text-green-500 rounded-lg text-sm font-semibold">
                                            Aceptar Cliente
                                        </button>
                                        </a>
                                        </form>
                                    @endif
                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-5 py-2.5 hover:bg-red-500 hover:text-red-900 text-red-500 rounded-lg text-sm font-semibold">
                                            Borrar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.querySelector('input[name="search"]');

                searchInput.focus();
            });
        </script>
    @endsection
