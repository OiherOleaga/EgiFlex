<script setup>
import { RouterLink, RouterView } from 'vue-router'
import { ref } from 'vue';
import Header from './components/partials/HeaderPartial.vue';
import Footer from './components/partials/FooterPartial.vue';

</script>

<template class="">
  <Header v-if="!['login', 'registro'].includes($route.name)"></Header>
  <main>
    <RouterView />
  </main>
  <Footer v-if="!['login', 'registro'].includes($route.name)"></Footer>
</template>

<style>
::-webkit-scrollbar{
  width: .75rem;
  background-color: black;
}

::-webkit-scrollbar-thumb {
  background-color: rgb(128, 128, 128);
  border-radius: 1rem;
}

::-webkit-scrollbar-thumb:active{
  background-color: rgb(171, 171, 171);
}

</style>
