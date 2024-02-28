<script setup>
import { useMethods } from '@/stores/methods';
import { ref } from 'vue';
const methods = useMethods();

const peliculas = ref([])

methods.GET("/peliculas").then((res) => {
    peliculas.value = res.peliculas;
})

</script>

<template>

</template>