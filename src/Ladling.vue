<template>
    <headerPage></headerPage>
    <listhouse></listhouse>
    <taxiorder></taxiorder>
    <infopanel></infopanel>
    <contacts></contacts>
    <review></review>
</template>

<script>
  import headerPage from './components/landing/headerPage.vue';
  import listhouse from './components/landing/listhouse.vue';
  import taxiorder from './components/landing/ordertaxi.vue';
  import infopanel from './components/landing/infopanel.vue';
  import contacts from './components/landing/contacts.vue';
  import review from './components/landing/review.vue';
  export default {
    components: {
      headerPage,
      listhouse,
      taxiorder,
      infopanel,
      contacts,
      review
    }
  }
</script>

<style scoped>
  /* Импорт шрифтов */
  @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

/* ЭТО БАЗА! */
* {
  font-family: 'Montserrat', sans-serif;
}
</style>