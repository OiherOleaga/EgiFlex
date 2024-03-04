<script setup>
import { ref } from 'vue'

const videoPlayer = ref(null)
const videoSrc = ref('')

let args = window.location.search.split("?")[1].split("=")

POST("/getVideo", { id: args[1], tipo: args[0] }).then(res => {
  if (res.error) {
    alert("error," + res.error);
  } else {
    videoSrc.value = res.video.archivo
    videoPlayer.value.load()
    videoPlayer.value.currentTime = res.video.tiempo
  }
})
</script>

<template>
  <section class="container-fluid w-100 min-vh-100">
    <div class="row ">
      <div class="col vh-100 d-flex align-items-center justify-content-center">
        <div class="container">
          <video ref="videoPlayer" controls preload="auto" width="100%">
            <source :src="videoSrc" type="video/mp4">
          </video>
        </div>
      </div>
    </div>
  </section>
</template>




<style scoped>
section {
  background-size: cover;
  background-position: center center;
  background-image: url(https://hbomax-images.warnermediacdn.com/2021-10/HBOMax%20price%20background%20V2.jpg?host=wme-hbomax-drupal-prod.s3.amazonaws.com&w=1920);
}

video {
  box-shadow: 0 0 50px #730DD9;
}
</style>
