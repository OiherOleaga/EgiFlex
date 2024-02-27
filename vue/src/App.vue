<script setup>
import Header from './components/partials/HeaderPartial.vue';

</script>

<template class="">
  <Header v-if="!['login', 'register'].includes($route.name)"></Header>
  <main>
    <RouterView/>
  </main>

  <footer>

  </footer>
</template>

<style scoped>

</style>
