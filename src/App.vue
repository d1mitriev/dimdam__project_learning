<template> 
  <navbarPage></navbarPage>
  <router-view></router-view>
  <footerpage></footerpage>
</template>

<script>
  import navbarPage from './components/navbarPage.vue';
  import footerpage from './components/footerpage.vue';
  export default {
    components: {
      navbarPage,
      footerpage,
    }
  }
</script>

<style scoped>
</style>