<script setup>
import { ref } from 'vue';

const detalles = ref();

console.log(window.location.search.split("?")[1])
if (args.get('s')) {
    POST("/getDetallesSerie", { id: args.get('s') }).then(res => {
        detalles.value = res.detalles  
    })
} else if (args.get('p')) {
    POST("/getDetallesPelicula", { id: args.get('p') }).then(res => {
        detalles.value = res.detalles  
    })
}

POST("/get");

</script>

<template>
    <h1>detalles</h1>

</template>