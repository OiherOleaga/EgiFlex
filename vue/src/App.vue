<script setup>
import { RouterLink, RouterView } from 'vue-router'
import { ref } from 'vue';
import Header from './components/partials/HeaderPartial.vue';
import Footer from './components/partials/FooterPartial.vue';

/**
* ! Hacer que el Header se cambie cuando este logeado
*/
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
  background-color: rgb(88, 31, 133);
  border-radius: 1rem;
}

::-webkit-scrollbar-thumb:active{
  background-color: rgba(89, 31, 133, 0.736);
}

body{
  background: #030328;
}

</style>
