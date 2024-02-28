<script setup>
import { RouterLink, RouterView } from 'vue-router'
import { ref } from 'vue';
import Header from './components/partials/HeaderPartial.vue';
// import Footer from './components/partials/FooterPartial.vue';

</script>

<template class="">
  <Header v-if="!['login', 'registro'].includes($route.name)"></Header>
  <main>
    <RouterView />
  </main>
  <footer>
  </footer>
</template>

<style></style>
