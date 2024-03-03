<script setup>
import { ref } from 'vue'

const div = ref(null)

let args = window.location.search.split("?")[1].split("=")

console.log(args)
POST("/getVideo", { id: args[1], tipo: args[0] }).then(res => {

    if (res.error) {
        alert("error," + res.error);
    } else {
        console.log(res)
        div.value.innerHTML = `
        <video controls preload="auto" start="10" width="640" height="360">
          <source src="${ res.video }" type="video/mp4">
        </video>
        `
    }
    
})

</script>

<template>
  <div ref="div">
  </div>
</template>

<style scoped>
/* Estilos opcionales para el reproductor de video */
.video-js {
  /* Estilos personalizados aquí */
}
</style>
