@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="mx-1 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Estadísticas</h1>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 bg-white border-b border-gray-200">
                    {!! $chart1->container() !!}
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 bg-white border-b border-gray-200">
                    {!! $chart2->container() !!}
                </div>
            </div>
        </div>
    </div>
    {!! $chart1->script() !!}
    {!! $chart2->script() !!}

@endsection
