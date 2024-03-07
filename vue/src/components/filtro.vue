<script setup>
import { ref, watch, defineEmits } from 'vue'
import mostrarContenido from './mostrarContenido.vue';

const props = defineProps({ tipo: String });
const emit = defineEmits(['filtrando']);

const contenido = ref([])
const categorias = ref([])
const categoriasElegidas = new Set()
const orden = ref([])
const busqueda = ref("")

const filtrando = ref(false)

watch(filtrando, () => {
    emit("filtrando");
})

watch(busqueda, () => {
    filtrar()
})

function cambioElegidoCategoria(index) {
    categorias.value[index].elegido = !categorias.value[index].elegido;

    if (categorias.value[index].elegido) {
        categoriasElegidas.add(categorias.value[index].id)
    } else {
        categoriasElegidas.delete(categorias.value[index].id)
    }

    filtrar()
}

function estilosElegidos(elegido) {
    if (elegido) {
        return "bg-info";
    }
}

function borrarElegidos() {
    categoriasElegidas.clear();
    for (let cat of categorias.value) {
        cat.elegido = false
    }

    filtrar()
}

function orderby(tipo) {
    if (tipo == 'n') {
        orden.value = []
    } else {
        let index = orden.value.indexOf(tipo);
        if (index == -1) {
            orden.value.push(tipo)
        } else {
            orden.value.splice(index, 1)
        }
    }

    filtrar()
}

function filtrar() {
    let filtrando2 = false;

    let filtro = {
        tipo: props.tipo,
    }

    if (categoriasElegidas.size !== 0) {
        filtrando2 = true
        filtro.categorias = Array.from(categoriasElegidas)
    }

    if (busqueda.value) {
        filtro.busqueda = busqueda.value
        filtrando2 = true;
    }

    if (orden.value.length !== 0) {
        filtro.orden = orden.value
        filtrando2 = true;
    }

    filtrando.value = filtrando2;

    if (filtro.tipo !== 'n' || filtrando.value) {

        POST("/filtro", filtro).then(res => {
            console.log(res)
            contenido.value = res.contenido;
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
                    <button class="btn bg-transparent fw-bold dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Ordenar por
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item bg-danger" href="#" @click="orderby('n')">Nada</a></li>
                        <li :class="estilosElegidos(orden[0] == 'p' || orden[1] == 'p')"><a class="dropdown-item"
                                @click="orderby('p')">Popularidad</a></li>
                        <li :class="estilosElegidos(orden[0] == 'r' || orden[1] == 'r')"><a class="dropdown-item"
                                @click="orderby('r')">Recientes</a></li>
                    </ul>
                </div>
                <div class="dropdown ">
                    <button class="btn bg-transparent fw-bold dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Género
                    </button>
                    <ul class="dropdown-menu">
                        <li @click="borrarElegidos" class="bg-danger"><a class="dropdown-item"> Sin
                                categorias </a>
                        </li>
                        <li v-for="(categoria, index) in categorias" :key="index" @click="cambioElegidoCategoria(index)"
                            :class="estilosElegidos(categoria.elegido)"><a class="dropdown-item">{{ categoria.nombre
                                }}</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <input class="form-control p-1 search" type="search" placeholder="Buscar" aria-label="Buscar"
                        v-model="busqueda">
                </div>
            </div>
        </form>
    </div>
    <mostrarContenido :contenido="contenido" />
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
    background-color: rgba(-1, 0, 0, 0.75);
    border: -1;
    backdrop-filter: blur(10px);
}

.dropdown-item:hover {
    background-color: transparent;
    color: white;
    cursor: pointer;
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
