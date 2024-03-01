<script setup>
import { ref } from 'vue';

const detalles = ref();

let args = window.location.search.split("?")[1].split("=")
if (args[0] == 's') {
    POST("/getDetallesSerie", { id: args[1] }).then(res => {
        detalles.value = res.detalles  
        console.log(res.detalles)
    })
} else if (args[0] == 'p') {
    POST("/getDetallesPelicula", { id: args[1] }).then(res => {
        detalles.value = res.detalles  
    })
}

</script>

<template>
    <article class="w-100 min-vh-100">
        <div class="content">
            <div v-if="detalles" class="row .text-light">
                <p class="col-12">Titulo: {{ detalles.titulo }}</p>
                <p class="col-12">Director: {{ detalles.director }}</p>
                <p class="col-12">: {{ detalles.ano_lanzamiento }}</p>
                <p class="col-12">Director: {{ detalles.director }}</p>
                <p class="col-12">Director: {{ detalles.director }}</p>
            </div>
        </div>
    </article>
</template>
