@extends('layouts.app')
@section('content')
    <section class="items-center mt-5 flex-col flex bg-white dark:bg-gray-900 rounded">
        <div class="text-center">
            <h1
                class="text-gray-900 mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl lg:text-7xl dark:text-white">
                Gestión de EgiFlex</h1>

            <h3 class=" h3 mb-2 text-gray-900 dark:text-white lg:text-xl sm:px-16">
                Bienvenid@ a la gran base de datos oficial de EgiFlex.
            </h3>
        </div>
        <img width="230px" src="{{ asset('egiflex/logoEgiFlex.png.') }}" alt="Descripción de la imagen">
        <div class="container mx-auto px-5 py-2 lg:px-32">
            <div class="-m-1 flex flex-wrap md:-m-2">
                <div class="flex w-1/2 flex-wrap">
                    <div class="w-1/2 p-1 md:p-2">
                        <a href="{{ asset('media/portadas/cyberpunk.jpg') }}" data-fancybox>
                            <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                                src="{{ asset('media/portadas/cyberpunk.jpg') }}" />
                        </a>
                    </div>
                    <div class="w-1/2 p-1 md:p-2">
                        <a href="{{ asset('media/portadas/barbie.jpg') }}" data-fancybox>
                            <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                                src="{{ asset('media/portadas/barbie.jpg') }}" />
                        </a>
                    </div>
                    <div class="w-full p-1 md:p-2">
                        <a href="{{ asset('media/portadas/bleach.jpg') }}" data-fancybox>
                            <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                                src="{{ asset('media/portadas/bleach.jpg') }}" />
                        </a>
                    </div>
                </div>
                <div class="flex w-1/2 flex-wrap">
                    <div class="w-full p-1 md:p-2">
                        <a href="{{ asset('media/portadas/interstellar.jpg') }}" data-fancybox>
                            <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                                src="{{ asset('media/portadas/interstellar.jpg') }}" />
                        </a>
                    </div>
                    <div class="w-1/2 p-1 md:p-2">
                        <a href="{{ asset('media/portadas/friends.jpg') }}" data-fancybox>
                            <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                                src="{{ asset('media/portadas/friends.jpg') }}" />
                        </a>
                    </div>
                    <div class="w-1/2 p-1 md:p-2">
                        <a href="{{ asset('media/portadas/it.jpg') }}" data-fancybox>
                            <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                                src="{{ asset('media/portadas/it.jpg') }}" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
