<script setup>
import { ref } from 'vue';

const detalles = ref();

let args = window.location.search.split("?")[1].split("=")
if (args[0] == 's') {
    POST("/getDetallesSerie", { id: args[1] }).then(res => {
        detalles.value = res.detalles  
    })
} else if (args[0] == 'p') {
    POST("/getDetallesPelicula", { id: args[1] }).then(res => {
        detalles.value = res.detalles  
    })
}

POST("/get");

</script>

<template>
    <h1>detalles</h1>

</template>
