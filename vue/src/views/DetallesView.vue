<script setup>
import { ref } from 'vue';
import videoVue from '../components/video.vue'
import router from '@/router';

const detalles = ref();

let args = window.location.search.split("?")[1].split("=")
if (args[0] == 's') {
    POST("/getDetallesSerie", { id: args[1] }).then(res => {
        if (res.error) {
            alert(res.error);
            return;
        }
        detalles.value = res.detalles

        if (detalles.value.temporadas) {
            detalles.value.temporadas = detalles.value.temporadas.split(',')
            getEpisodios(res.detalles.temporadas[res.detalles.temporada - 1])
        } else {
            detalles.value.temporadas = []
            detalles.value.episodios = []
        }
    })
} else if (args[0] == 'p') {
    POST("/getDetallesPelicula", { id: args[1] }).then(res => {
        detalles.value = res.detalles
    })
}

function cambioTemporada(index, id) {
    detalles.value.temporada = index + 1
    getEpisodios(id)
}

function getEpisodios(id) {
    POST("/episodios", { id: id }).then(res => {
        if (res.error) {
            alert(res.error);
            return;
        }
        detalles.value.episodios = res.episodios;
    })
}

function watch(tipo, id) {
    router.push(`/watch?${tipo}=${id}`);
}

function addLista() {
    POST("/addLista", { tipo: args[0], id: args[1] }).then(res => {
        if (res.error) {
            alert(res.error)
        } else if (res.ok) {
            detalles.value.lista = true
        }
    })
}

function rmLista() {
    POST("/rmLista", { tipo: args[0], id: args[1] }).then(res => {
        if (res.error) {
            alert(res.error)
        } else if (res.ok) {
            detalles.value.lista = false
        }
    })
}

function descargar(url) {
    fetch(url,)
        .then(res => res.blob())
        .then(file => {
            let tempUrl = URL.createObjectURL(file);
            const aTag = document.createElement("a");
            aTag.href = tempUrl;
            aTag.download = url.replace(/^.*[\\\/]/, '');
            document.body.appendChild(aTag);
            aTag.click();
            URL.revokeObjectURL(tempUrl);
            aTag.remove();
        })
        .catch(() => {
            alert("Failed to download file!");
        });
}



</script>

<template>
    <article class="w-100 min-vh-100 overflow-x-hidden">
        <section v-if="detalles" class="container-fluid">
            <div class="container-fluid m-0 p-0 beam-portada">
                <div class="row">
                    <div class="col-12 m-0 p-0">
                        <div class="portada-container">
                            <img :src="detalles.poster" alt="Portada" class="portada-img" />
                            <a v-if="args[0] == 'p'" href="#play"> <img
                                    src="https://cdn-icons-png.flaticon.com/512/7036/7036894.png" alt="" width="90px"
                                    class="play-button"></a>
                            <a @click="watch('s', args[1])" v-else> <img
                                    src="https://cdn-icons-png.flaticon.com/512/7036/7036894.png" alt="" width="90px"
                                    class="play-button"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container beam-detalles-parent rounded p-2 p-md-4 my-5">
                <div class="row ">
                    <div class="col-12 col-md-3 beam-detalles text-sm-center text-md-start">
                        <figure>
                            <img :src="detalles.portada" class="rounded img img-fluid equal-image" alt="">
                            <div class="gap-2 d-flex align-items-center justify-content-center my-2">
                                <!-- <button v-if="args[0] == 'p'" class="rounded-pill btn w-100 text-white p-2"
                                    @click="descargar(detalles.archivo)">Descargar</button> -->
                                <button v-if="!detalles.lista" class="rounded-pill btn w-100 text-white p-2"
                                    @click="addLista">+ Lista</button>
                                <button v-else class="rounded-pill btn w-100 text-white p-2" @click="rmLista">-
                                    Lista</button>
                            </div>
                        </figure>
                        <div class="d-flex flex-column gap-0 border-1 border-top fw-semibold">
                            <p class="m-0 fs-5">Géneros:</p>
                            <p> {{ detalles.generos }}</p>
                        </div>
                        <div class="d-flex flex-column gap-0 border-1 border-top fw-semibold">
                            <p class="m-0 fs-5">Fecha de lanzamiento:</p>
                            <p>{{ detalles.ano_lanzamiento }}</p>
                        </div>
                        <div class="d-flex flex-column gap-0 border-1 border-top fw-semibold">
                            <p class="m-0 fs-5">Director:</p>
                            <p>{{ detalles.director }}</p>
                        </div>
                        <div v-if="args[0] == 's'" class="d-flex flex-column gap-0 border-1 border-top fw-semibold">
                            <p class="m-0 fs-5">Temporadas:</p>
                            <p>{{ detalles.temporadas.length }}</p>
                        </div>
                    </div>
                    <div id="play" class="col-12 col-md-9 text-start">
                        <p class="fw-semibold fs-2">{{ detalles.titulo }} ({{ detalles.ano_lanzamiento.split("-")[0] }})
                        </p>
                        <p class="fw-semibold fs-5">{{ detalles.sinopsis }}</p>
                        <div v-if="args[0] == 'p'"
                            class=" ratio ratio-16x9 d-flex align-items-center justify-content-center">
                            <videoVue />
                        </div>
                        <div v-if="args[0] == 's'">
                            <p class="fw-semibold fs-2">Episodios
                            <div class="dropdown">
                                <button class="btn bg-transparent text-white fw-bold dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Temporada {{ detalles.temporada }}
                                </button>
                                <ul class="dropdown-menu">
                                    <li v-for="(temporada, index) in detalles.temporadas" :key="index"
                                        @click="cambioTemporada(index, temporada)" class="dropdown-item">{{ index + 1 }}
                                    </li>
                                </ul>
                            </div>
                            </p>
                            <div class="episodios overflow-y-scroll overflow-x-auto mx-1 d-flex flex-column gap-5">
                                <div v-for="episodio in detalles.episodios"
                                    class=" col-12 d-flex align-items-center justify-content-between gap-4">
                                    <img :src="episodio.portada" with="50" height="50"></img>
                                    <div class="col-6 text-center align-items-center justify-content-center">
                                        <p class="m-0 fw-semibold">{{ episodio.numero_episodio }}. {{ episodio.titulo }}
                                        </p>
                                        <p class="m-0 fw-semibold">{{ episodio.sinopsis }}</p>
                                    </div>
                                    <div class="d-flex col-auto gap-2 me-1">
                                        <button class="rounded-pill btn text-white p-2"
                                            @click="descargar(episodio.archivo)">Descargar</button>
                                        <button class="rounded-pill btn text-white p-2 flex-shrink-0"
                                            @click="watch('e', episodio.id)">Ver
                                            ahora</button>
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
article {
    background-size: cover;
    background-position: center center;
    background-image: linear-gradient(rgba(0, 0, 0, 1) 45%, transparent 60%), url(https://hbomax-images.warnermediacdn.com/2021-07/hbo_max_background_faded.png?host=wme-hbomax-drupal-prod.s3.amazonaws.com&w=1920);
}

.portada-container {
    position: relative;
    overflow: hidden;
    height: 700px;
    z-index: 0;
}

.portada-container::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 1));
    z-index: 0;
}


.play-button {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1;
    cursor: pointer;
}

.portada-img {
    width: 100%;
    height: 130%;
    object-fit: cover;
    object-position: center;
}

.beam-detalles-parent {
    position: relative;
    text-align: center;
    color: #730DD9;
    background-color: #030328;
    box-shadow: 0 0 55px #730DD9;
    z-index: 1;
}

@media screen and (max-width: 767px) {
    .equal-image {
        object-fit: cover;
        width: 80%;
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

.btn,
.btn:hover {
    background-color: #730DD9;
}

.dropdown-menu {
    text-align: start;
    background-color: transparent;
    border: 0;
    backdrop-filter: blur(10px);
}

.dropdown-item {
    color: white;
}

.dropdown-item:hover {
    background-color: rgba(0, 0, 0, 0.4);
    color: white;
    cursor: pointer;
}

.episodios {
    height: 450px;
}

.episodios::-webkit-scrollbar {
    background-color: transparent;
}
</style>
