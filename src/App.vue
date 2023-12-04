<template> 
  <navbarPage></navbarPage>
  <router-view></router-view>
  <footerpage></footerpage>
</template>

<script>
  import navbarPage from './components/landing/navbarPage.vue'
  import footerpage from './components/landing/footerpage.vue'
  export default {
    components: {
      navbarPage,
      footerpage
    }
  }
</script>

<style scoped>
</style>