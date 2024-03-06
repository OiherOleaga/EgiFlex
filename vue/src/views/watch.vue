<script setup>
import videoVue from '../components/video.vue'

</script>

<template>
  <section class="container-fluid w-100 min-vh-100">
    <div class="row ">
      <div class="col vh-100 d-flex align-items-center justify-content-center">
        <div class="container">
          <videoVue />
        </div>
      </div>
    </div>
  </section>
</template>

<style>
section {
  background-size: cover;
  background-position: center center;
  background-image: url(https://hbomax-images.warnermediacdn.com/2021-10/HBOMax%20price%20background%20V2.jpg?host=wme-hbomax-drupal-prod.s3.amazonaws.com&w=1920);
}

video {
  box-shadow: 0 0 50px #730DD9;
}

.vjs-poster img {
    object-fit: cover;
    filter: brightness(69%);
}

.video-js{
    border: 2px solid #730DD9;
    filter: drop-shadow(0 0 10px #730DD9);
}
</style>
