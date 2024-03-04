<script setup>
import { ref } from 'vue'

const videoPlayer = ref(null)
const videoSrc = ref('')

let args = window.location.search.split("?")[1].split("=")

console.log(args)
POST("/getVideo", { id: args[1], tipo: args[0] }).then(res => {

    if (res.error) {
      alert("error," + res.error);
    } else {
      videoSrc.value = res.video
      videoPlayer.value.load()
      videoPlayer.value.currentTime = 10;
    }
    
})

</script>

<template>
  <div>
    <video ref="videoPlayer" muted controls preload="auto" width="640" height="360">
      <source :src="videoSrc" type="video/mp4">
    </video>
  </div>
</template>

<style scoped>
/* Estilos opcionales para el reproductor de video */
.video-js {
  /* Estilos personalizados aquí */
}
</style>
