<script setup>
import { ref } from 'vue';
import filtro from '../components/filtro.vue'

const datosAleatorios = ref([]);
const Pelis = ref([]);
const Series = ref([]);
const filtrando = ref(false);

function cambioFiltro() {
    filtrando.value = !filtrando.value 
}

GET('/contenido/popular').then(function (response) {
        datosAleatorios.value = response.datosRandom;
})
.catch(function (error) {
    console.error('Error al cargar datos aleatorios:', error);
});

GET('/pelis/popular').then(function (response) {
    Pelis.value = response.pelis;
})
.catch(function (error) {
    console.error('Error al cargar datos de las peliculas:', error);
});

GET('/series/popular').then(function (response) {
    Series.value = response.series;
})
.catch(function (error) {
    console.error('Error al cargar datos de las peliculas:', error);
});

function detalles(id, tipo) {
    return `/detalles?${tipo}=${id}`;
}
</script>

<template>
    <article class="w-100 min-vh-100">
        <div class="container-fluid beam-populares">
            <div class="row">
                <filtro :tipo="'n'" @filtrando="cambioFiltro" />
            </div>
            
        </div>
        <div v-if="!filtrando" class="content">
            <section class="beam-populares-parent">
                <div class="container-fluid beam-populares">
                    <div class="row">
                        <div class="col-12 text-white">
                            <div class="d-flex flex-column align-items-center gap-2 text-center">
                                <img src="../components/img/generatedtext (2).png" class="img egiflex img-fluid"
                                    alt="egiflex">
                                <p class="fs-2 fw-semibold">
                                    Las <span class="rounded p-1 fs-3">descargas más populares</span> entre los alumnos
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 text-white">
                        <div class="d-flex flex-column col-md-4 align-items-center justify-content-center col-md-12">
                            <div class="container image-grid gap-3 d-flex flex-column">
                                <div class="row gap-3 gap-md-0 justify-content-center">
                                    <div v-for="item in datosAleatorios" :key="item.id"
                                        class="col-5 col-md-3 image-container">
                                        <a :href="detalles(item.id, item.tipo)">
                                            <figure class="rounded">
                                                <img :src="item.portada" class="rounded img img-fluid equal-image"
                                                    :alt="item.titulo">
                                                <figcaption class="d-none d-md-block text-center">
                                                    <span class="button-green-download2-big">Ver detalles</span>
                                                </figcaption>
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="beam-films-parent mt-4">
                <div class="container beam-films">
                    <div class="row">
                        <div class="col-12 text-white">
                            <div
                                class="d-flex flex-wrap flex-row align-items-center text-center justify-content-center gap-2">
                                <p class="fs-2 fw-semibold">
                                    Las <span class="rounded p-1 fs-3">peliculas más populares</span> entre los alumnos
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 text-white">
                        <div class="d-flex flex-column col-md-4 align-items-center justify-content-center col-md-12">
                            <div class="container image-grid gap-3 d-flex flex-column">
                                <div class="row gap-3 gap-md-0 justify-content-center">
                                    <div v-for="item in Pelis" :key="item.id" class="col-5 col-md-3 image-container">
                                        <a :href="detalles(item.id, item.tipo)">
                                            <figure class="rounded">
                                                <img :src="item.portada" class="rounded img img-fluid equal-image"
                                                    :alt="item.titulo">
                                                <figcaption class="d-none d-md-block text-center">
                                                    <span class="button-green-download2-big">Ver detalles</span>
                                                </figcaption>
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="/peliculas" class="rounded-pill btn btn-md px-4 fw-bold text-white">Ver todas las
                                peliculas</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="beam-series-parent mt-4">
                <div class="container beam-films">
                    <div class="row">
                        <div class="col-12 text-white">
                            <div
                                class="d-flex flex-wrap flex-row align-items-center text-center justify-content-center gap-2">
                                <p class="fs-2 fw-semibold">
                                    Las <span class="rounded p-1 fs-3">series más populares</span> entre los alumnos
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 text-white">
                        <div class="d-flex mb-2 flex-column col-md-4 align-items-center justify-content-center col-md-12">
                            <div class="container image-grid gap-3 d-flex flex-column">
                                <div class="row gap-3 gap-md-0 justify-content-center">

                                    <div v-for="item in Series" :key="item.id" class="col-5 col-md-3 image-container">
                                        <a :href="detalles(item.id, item.tipo)">
                                            <figure class="rounded">
                                                <img :src="item.portada" class="rounded img img-fluid equal-image"
                                                    :alt="item.titulo">
                                                <figcaption class="d-none d-md-block text-center">
                                                    <span class="button-green-download2-big">Ver detalles</span>
                                                </figcaption>
                                            </figure>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <a href="/series" class="rounded-pill btn btn-md px-4 fw-bold text-white">Ver todas las
                                series</a>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </article>
</template>

<style scoped>
.egiflex {
    transform: skew(-12deg);
    transform-origin: top;
}

a {
    text-decoration: none;
    color: transparent;
}

article {
    background-image: linear-gradient(to top, transparent, #730dd921), linear-gradient(to bottom, transparent, #730dd921), url('../components/img/1KgjKh5.png');
}

.content {
    backdrop-filter: blur(2px);
    min-height: 100vh;
}

.content a {
    background-color: #730DD9;
}

.beam-populares-parent {
    margin-bottom: 0rem;
}

.beam-populares {
    padding-top: 6rem;
}

.beam-populares p {
    word-wrap: normal;
}

.beam-populares p span:first-child,
.beam-films p span:first-child {
    background-color: #730DD9;
    font-weight: 700;
    text-transform: uppercase;
    white-space: nowrap;
}

@media screen and (max-width: 767px) {
    .equal-image {
        object-fit: cover;
        aspect-ratio: 0.5;
    }
}

.equal-image {
    object-fit: cover;
    aspect-ratio: 0.7;
}

figure {
    position: relative;
    transition: border 200ms ease-in-out;
}

figure:hover {
    border: 5px solid #730DD9;
}

figcaption {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: opacity 300ms ease;
}

.button-green-download2-big {
    background: #730DD9;
    border-radius: 3px;
    display: block;
    font-weight: 700;
    color: #fff;
    font-size: 16px;
    position: absolute;
    width: 130px;
    padding: 7px 0;
    margin: 0 auto;
    opacity: 0;
    z-index: 2;
    bottom: -30px;
    left: 50%;
    transform: translateX(-50%);
    transition: opacity 300ms ease, transform 300ms ease;
}

figure:hover figcaption,
figure:hover .button-green-download2-big {
    opacity: 1;
}

figure img {
    filter: blur(0);
    transition: all 300ms ease;
}

figure:hover img {
    filter: blur(2px);
}

figure span {
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    opacity: 0;
    transition: opacity 300ms ease, transform 300ms ease;
}

figure:hover span {
    opacity: 1;
    transform: translate(-50%, -50%);
}
</style>
