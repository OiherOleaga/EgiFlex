<template>
  <div>
    <video ref="videoPlayer" class="video-js" controls preload="auto" width="640" height="360">
      <source :src="videoSource" type="video/mp4">
      Tu navegador no soporta la reproducción de video.
    </video>
  </div>
</template>

<script setup>
import { ref } from 'vue';

// Definir la ruta del video
const videoSource = ref('../../../laravel/public/media/episodios/DragoiBola01.mp4');
</script>

<style scoped>
/* Estilos opcionales para el reproductor de video */
.video-js {
  /* Estilos personalizados aquí */
}
</style>
