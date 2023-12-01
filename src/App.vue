<template> 
  <navbarPage></navbarPage>
  <router-view></router-view>
</template>

<script>
  import navbarPage from './components/navbarPage.vue';
  export default {
    components: {
      navbarPage,
    }
  }
</script>

<style scoped>
</style>