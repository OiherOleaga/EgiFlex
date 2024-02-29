<script setup>
import { ref } from 'vue';

const peliculas = ref([])

GET("/peliculas").then((res) => {
    peliculas.value = res.peliculas;
})

</script>

<template>

</template>