<script setup>
import { ref, onMounted } from 'vue'

const div = ref(null)
const loading = ref(true)

let args = window.location.search.split("?")[1].split("=")

onMounted(async () => {
  try {
    const res = await POST("/getVideo", { id: args[1], tipo: args[0] });

    if (res.error) {
      console.error("Error:", res.error);
      // Puedes manejar el error mostrando un mensaje en lugar de una alerta
      loading.value = false;
    } else {
      console.log(res)
      // Asegúrate de que div.value se haya inicializado antes de acceder a innerHTML
      if (div.value) {
        div.value.innerHTML = `
            <video controls preload="auto" start="10" class="video-js rounded" width="100%">
              <source src="${res.video}" type="video/mp4">
            </video>
        `;
        loading.value = false;
      } else {
        console.error("Error: la referencia 'div' no está inicializada correctamente.");
      }
    }
  } catch (error) {
    console.error("Error:", error);
    loading.value = false;
  }
});
</script>

<template>
  <section class="container-fluid w-100 min-vh-100 overflow-x-hidden">
    <div class="row">
      <div class="col vh-100 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-light" v-if="loading" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
        <div ref="div"></div>
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

video{
  box-shadow: 0 0 50px #730DD9;
}
</style>
