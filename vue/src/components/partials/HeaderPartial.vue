<!-- HeaderPartial.vue -->

<script setup>
import router from "@/router";
import { Collapse, Ripple, initMDB } from "mdb-ui-kit";
import { ref } from 'vue'

initMDB({ Collapse, Ripple });

const inicioSesion = ref(localStorage.getItem("sessionId") !== null)

function cerrarSession() {
    localStorage.removeItem("sessionId")
    inicioSesion.value = false;
}

</script>

<template>
    <header class="fixed-top">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid m-0 p-0 d-flex align-items-center">
                <div class="region region-nav-branding d-flex align-items-center">
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <div class="navbar-brand d-flex align-items-center">
                        <div v-if="inicioSesion">
                            <a href="/content">
                                <img src="../img/generatedtext (2).png" alt="egiflex">
                            </a>
                        </div>
                        <div v-else>
                            <a href="/">
                                <img src="../img/generatedtext (2).png" alt="egiflex">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse justify-content-md-start">
                    <div class="region region-nav-main w-100">
                        <div class="block block-tb-megamenu block-tb-megamenu-menu-blockmain">
                            <ul v-if="inicioSesion" class="tb-megamenu-nav nav level-1 items-6">
                                <li class="tb-megamenu-item level-2 mega px-2">
                                    <a href="/series">Series</a>
                                </li>
                                <li class="tb-megamenu-item level-2 mega px-2">
                                    <a href="/peliculas">Peliculas</a>
                                </li>
                                <li class="tb-megamenu-item level-2 mega px-2">
                                    <a href="/lista">Mi lista</a>
                                </li>
                                <li class=" ms-auto">
                                    <a href="/" @click="cerrarSession">Cerrar sesion</a>
                                </li>
                            </ul>
                            <ul v-else class="tb-megamenu-nav nav level-1 items-6">
                                
                                <li class="tb-megamenu-item level-2 mega px-2">
                                    <a href="#important">Imprescindibles</a>
                                </li>
                                <li class="tb-megamenu-item level-2 mega px-2">
                                    <a href="#series">Series</a>
                                </li>
                                <li class="tb-megamenu-item level-2 mega px-2">
                                    <a href="#faq">Preguntas Frecuentes</a>
                                </li>
                                <li class="tb-megamenu-item level-2 mega px-2">
                                    <a href="#sponsors">Nuestros Patrocinadores</a>
                                </li>
                                <li class="tb-megamenu-item level-2 mega px-2 ms-auto">
                                    <a href="/login">Iniciar sesion</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="collapse" id="navbarSupportedContent">
            <div class="pb-3">
                <ul v-if="inicioSesion" class="tb-megamenu-nav nav level-1 items-6 ga-2 d-flex flex-column">
                    <li class="tb-megamenu-item level-2 mega px-2">
                        <a href="/series">Series</a>
                    </li>
                    <li class="tb-megamenu-item level-2 mega px-2">
                        <a href="/peliculas">Peliculas</a>
                    </li>
                    <li class="tb-megamenu-item level-2 mega px-2">
                        <a href="/lista">Mi lista</a>
                    </li>
                    <li class=" tb-megamenu-item level-2 mega px-2">
                        <a href="/" @click="cerrarSession">Cerrar sesion</a>
                    </li>
                </ul>
                <ul v-else class="tb-megamenu-nav nav level-1 items-6 d-flex flex-column">
                    <li class="tb-megamenu-item level-2 mega px-2">
                        <a href="#important">Imprescindibles</a>
                    </li>
                    <li class="tb-megamenu-item level-2 mega px-2">
                        <a href="#series">Series</a>
                    </li>
                    <li class="tb-megamenu-item level-2 mega px-2">
                        <a href="#faq">Preguntas Frecuentes</a>
                    </li>
                    <li class="tb-megamenu-item level-2 mega px-2">
                        <a href="#sponsors">Nuestros Patrocinadores</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
</template>

<style scoped>
header {
    z-index: 500;
    font-size: 20px;
    padding: 0 1rem;
    background: rgba(8, 8, 8, 0.7);
    backdrop-filter: blur(20px);
}

@media all and (min-width: 992px) {
    .nav-item:hover .dropdown-menu {
        display: block;
    }

    .dropdown-menu,
    .dropdown-item {
        padding: .4rem;
        background-color: #212226;
    }

    .dropdown-item {
        margin: .3rem 0;
    }
}

.nav-link {
    color: #730DD9;
}

form {
    height: 30px;
}

form input {
    background-color: #212226;
    border: 0;
    color: #730DD9;
    padding: .5rem;
}

form input:focus {
    background-color: #212226;
    color: #730DD9;
    border: none;
}

form input::placeholder {
    text-align: start;
}

.navbar-brand img {
    height: 40px;
    margin: 0 1rem 0 0;
    width: auto
}

a,
input::placeholder {
    text-decoration: none;
    text-transform: uppercase;
    font-weight: 700;
    font-size: 1rem;
    background-color: transparent;
    color: #730DD9;
}

ul a {
    box-shadow: inset 0 0 0 0 #730DD9;
    margin: 0 -.25rem;
    padding: 0 .25rem;
    padding: .4rem;
    border-radius: 5px;
    transition: color .3s ease-in-out, box-shadow .3s ease-in-out;
}

ul a:hover {
    box-shadow: inset 300px 0 0 0 #730DD9;
    color: white;
}

button {
    border: 0;
}

@media (max-width: 991.98px) {
    .navbar-toggler span:not(:last-child) {
        margin-bottom: 5px;
    }
}

@media (max-width: 991.98px) {
    .navbar-toggler span {
        display: block;
        position: relative;
        width: 25px;
        height: 2px;
        background: #730DD9;
        opacity: 1;
        transition: all 0.25s;
    }
}

@media (min-width: 992px) {
    .navbar-brand img {
        height: 40px;
    }
}
</style>
