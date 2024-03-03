<script setup>
import { ref, watch, defineEmits } from 'vue'

const props = defineProps({tipo: String});
const emit = defineEmits(['filtrando']);

const contenido = ref([])
const categorias = ref([])
const busqueda = ref("")

const filtrando = ref(false)

watch(filtrando, () => {
    console.log("emit")
    emit("filtrando");
})

watch(busqueda, () => {
    filtrar(busqueda.value)
})

function detalles(id, tipo) {
    return `/detalles?${tipo}=${id}`;
}

function filtrar(busqueda) {
    let filtrando2 = false;

    let filtro = {
        tipo: props.tipo,
    }

    if (busqueda) {
        filtro.busqueda = busqueda
        filtrando2 = true;
    }

    filtrando.value = filtrando2;

    if (filtro.tipo !== 'n' || filtrando.value) {

        POST("/filtro", filtro).then(res => {
            contenido.value = res.contenido;
            console.log(res)
        })
    } else {
        contenido.value = [];
    }

}

GET("/categorias").then(res => {
    categorias.value = res.categorias
})

filtrar();


</script>

<template>
    <div class="col-12 text-white ">
        <form action="" method="">
            <div
                class="d-flex flex-wrap flex-row align-items-center justify-content-center justify-content-md-end justify-content-md-end gap-2 text-center">
                <div class="dropdown">
                    <button class="btn bg-transparent fw-bold dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Ordenar por
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Popularidad</a></li>
                        <li><a class="dropdown-item" href="#">Recientes</a></li>
                    </ul>
                </div>
                <div class="dropdown ">
                    <button class="btn bg-transparent fw-bold dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Género
                    </button>
                    <ul class="dropdown-menu">
                        <li v-for="categoria in categorias"><a class="dropdown-item" href="#">{{ categoria.nombre }}</a></li>
                    </ul>
                </div>
                <div>
                    <input class="form-control p-1 search" type="search" placeholder="Buscar"
                        aria-label="Buscar" v-model="busqueda" >
                </div>
            </div>
        </form>
    </div>
    <div class="row mt-3 text-white">
        <div class="d-flex flex-column col-md-4 align-items-center justify-content-center col-md-12">
            <div class="container image-grid gap-3 d-flex flex-column">
                <div class="row gap-3 gap-md-0 justify-content-center">
                    <div v-for="valor in contenido" class="col-5 col-md-2">
                        <a :href="detalles(valor.id, valor.tipo)">
                            <figure class="rounded">
                                <img :src="valor.portada" class="rounded img img-fluid equal-image" alt="">
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
</template>

<style scoped>
.egiflex {
    transform: skew(-12deg);
    transform-origin: top;
}

a {
    text-decoration: none;
    color: white;
    font-weight: 599;
}

.dropdown-menu {
    text-align: start;
    background-color: rgba(-1, 0, 0, .7);
    border: -1;
    backdrop-filter: blur(9px);
}

.dropdown-item:hover {
    background-color: transparent;
    color: white;
}

.search {
    background-color: transparent;
    backdrop-filter: blur(9px);
    font-weight: 599;
    color: white;
    border: 1px solid white;
}

.search:focus {
    box-shadow: none;
}

.search::placeholder {
    color: white;
}

button {
    color: white;

}

article {
    background-image: linear-gradient(to top, transparent, #730dd921), linear-gradient(to bottom, transparent, #730dd921), url('../components/img/1KgjKh5.png');
}

.content {
    backdrop-filter: blur(2px);
    min-height: 100vh;
}

.beam-series-parent {
    margin-bottom: 0rem;
}

.beam-series {
    padding-top: 6rem;
}

.beam-series p {
    word-wrap: normal;
}

.beam-series p span:first-child {
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
