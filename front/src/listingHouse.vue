<template>
    <div>
        <navBackground/>
        <searchBar />
        <bannerInfo />
        <listHouse />
    </div>
</template>

<script>

import navBackground from './components/listingHouse/navbackground.vue'
import searchBar from './components/listingHouse/searchbar.vue'
import bannerInfo from './components/listingHouse/bannerInfo.vue'
import listHouse from './components/listingHouse/listHouse.vue'

    export default {
        components: {
            navBackground,
            searchBar,
            bannerInfo,
            listHouse
        },       
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