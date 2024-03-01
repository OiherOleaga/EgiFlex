<script setup>
import { ref } from 'vue';

const detalles = ref();

// let args = window.location.search.split("?")[1].split("=")
// if (args[0] == 's') {
//     POST("/getDetallesSerie", { id: args[1] }).then(res => {
//         detalles.value = res.detalles
//     })
// } else if (args[0] == 'p') {
//     POST("/getDetallesPelicula", { id: args[1] }).then(res => {
//         detalles.value = res.detalles
//     })
// }

// POST("/get");

</script>
<template>
    <article class="w-100 min-vh-100">
        <section class="beam-portada-parent">
            <div class="container-fluid m-0 p-0 beam-portada">
                <div class="row">
                    <div class="col">
                        <div class="portada-container">
                            <img src="../components/img/cyberpunk-edgerunners-david-lucy-rebecca-art-4k-wallpaper-uhdpaper.com-644@1@i.jpg"
                                alt="Portada" class="portada-img" />
                            <div class="degradado"></div>
                        </div>
                    </div>
                </div>
                <div class="container beam-detalles-parent rounded p-2 p-md-4 my-2">
                    <div class="row">
                        <div class="col-12 col-md-3 beam-detalles text-sm-center text-md-start">
                            <figure>
                                <img src="../components/img/2148622.jpg" class="rounded img img-fluid equal-image" alt="">
                                <!-- <figcaption class="gap-2 d-flex my-2">
                                    <button class="rounded-pill btn w-50 text-white p-2">Descargar</button>
                                    <button class="rounded-pill btn w-50 text-white p-2">Ver ahora</button>
                                </figcaption> -->
                            </figure>
                            <div class="d-flex flex-column gap-0 border-1 border-top fw-semibold">
                                <p class="m-0 fs-5">Géneros:</p>
                                <p>Fantasia, Accion</p>
                            </div>
                            <div class="d-flex flex-column gap-0 border-1 border-top fw-semibold">
                                <p class="m-0 fs-5">Año de produccion:</p>
                                <p>2022</p>
                            </div>
                            <div class="d-flex flex-column gap-0 border-1 border-top fw-semibold">
                                <p class="m-0 fs-5">Temporadas:</p>
                                <p>1</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-9 text-start">
                            <p class="fw-semibold fs-2">Cyberpunk Edgerunners (2022)</p>
                            <p class="fw-semibold fs-5">Cyberpunk: Edgerunners es una historia independiente de 10 episodios
                                acerca de un chico que trata de sobrevivir en una ciudad futurista obsesionada con los
                                implantes tecnológicos y corporales. Al no tener nada que perder, decide convertirse en
                                edgerunner, un mercenario cyberpunk al margen de la ley.</p>
                            <p class="fw-semibold fs-2">Episodios
                            <div class="dropdown">
                                <button class="btn bg-transparent text-white fw-bold dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Temporada
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">1</a></li>
                                </ul>
                            </div>
                            </p>
                            <div class="episodios d-flex flex-column gap-2">
                                <div class="d-flex align-items-center justify-content-around gap-3">
                                    <p class="m-0 fw-semibold">1. No quiero decepcionarte</p>
                                    <div class="d-flex gap-2">
                                        <button class="rounded-pill btn text-white p-2">Descargar</button>
                                        <button class="rounded-pill btn text-white p-2">Ver ahora</button>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-around gap-3">
                                    <p class="m-0 fw-semibold">2. No quiero decepcionarte</p>
                                    <div class="d-flex gap-2">
                                        <button class="rounded-pill btn text-white p-2">Descargar</button>
                                        <button class="rounded-pill btn text-white p-2">Ver ahora</button>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-around gap-3">
                                    <p class="m-0 fw-semibold">3. No quiero decepcionarte</p>
                                    <div class="d-flex gap-2">
                                        <button class="rounded-pill btn text-white p-2">Descargar</button>
                                        <button class="rounded-pill btn text-white p-2">Ver ahora</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>
</template>
  
<style>
.portada-container {
    position: relative;
    overflow: hidden;
    height: 700px;
    z-index: -1;
}

.portada-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

.degradado {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(0, 0, 0, .2), rgba(0, 0, 0, 1));
}

.beam-detalles-parent {
    position: absolute;
    top: 60%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: #730DD9;
    background-color: #030328;
    box-shadow: 0 0 55px #730DD9;
    z-index: 1;
}

@media screen and (max-width: 767px) {
    .equal-image {
        object-fit: cover;
        aspect-ratio: 0.5;
    }

    .beam-detalles-parent {
        position: relative;
        transform: none;
        top: 0;
        left: 0;
    }
}

.equal-image {
    object-fit: cover;
    aspect-ratio: 0.7;
}

.btn {
    background-color: #730DD9;
}

.btn:hover {
    background-color: #730DD9;
}

.dropdown-menu {
    text-align: start;
    background-color: transparent;
    border: 0;
    backdrop-filter: blur(10px);
}

.dropdown-item{
    color: white;
}

.dropdown-item:hover {
    background-color: transparent;
    color: white;
}

</style>