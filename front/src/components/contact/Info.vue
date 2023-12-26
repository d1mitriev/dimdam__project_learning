<template>
    <div class="container">
        <div class="container__info">
            <div class="info__image"></div>
            <div class="info__description">
                <div class="description__title">Про наше агентство</div>
                <div class="description__description">Dimdam - агентство недвижимости. <br>Наше агентство стремится сделать процесс покупки, продажи или аренды недвижимости невероятно комфортным и простым.</div>
            </div>
        </div>
        <GoogleMap api-key="AIzaSyCp2Rz4SBVQBkIm_D0zg3rs3tjma_m3HT8" class="googlemap" :center="center" :zoom="15">
        <Marker :options="{ position: center }" />
        </GoogleMap>
    </div>
</template>

<script>
    import { defineComponent } from "vue";
import { GoogleMap, Marker } from "vue3-google-map";

export default defineComponent({
  components: { GoogleMap, Marker },
  setup() {
    const center = { lat: 48.464717, lng: 35.046183 };

    return { center };
  },
});
</script>

<style scoped>
    .container {
        margin-top: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 50px;
    }

    .container__info {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;

    }

    .info__image {
        background-image: url(@/assets/contact__info.svg);
        background-size: cover;
	    background-repeat: no-repeat;
        width: 750px;
        height: 497px;

    }

    .info__description {
        display: flex;
        flex-direction: column;
        gap: 40px;
        

    }

    .description__title {
        color: #000;
        font-family: Montserrat;
        font-size: 40px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        text-transform: uppercase;
        padding: 10px;
        background-color: #f0eeee;
        border-radius: 10px;
    }

    .description__description {
        width: 767px;
        color: #000;
        font-family: Montserrat;
        font-size: 30px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        opacity: 0.5;
        padding: 10px;
        background-color: #f0eeee;
        border-radius: 10px;
        
    }

    .googlemap {
        width: 1500px; 
        height: 500px; display: flex; 
        justify-content: center;
    }

    @media screen and (max-width: 414px) {
        .container {
        margin-top: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 50px;
    }

    .container__info {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;

    }

    .info__image {
        display: none;
        background-size: cover;
	    background-repeat: no-repeat;
        width: 750px;
        height: 497px;

    }

    .info__description {
        display: flex;
        flex-direction: column;
        gap: 40px;
        

    }

    .description__title {
        text-align: center;
        color: #000;
        font-family: Montserrat;
        font-size: 24px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        text-transform: uppercase;
        padding: 10px;
        background-color: #f0eeee;
        border-radius: 10px;
    }

    .description__description {
        width: 400px;
        color: #000;
        font-family: Montserrat;
        font-size: 15px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        opacity: 0.5;
        padding: 10px;
        background-color: #f0eeee;
        border-radius: 10px;
        
    }

    .googlemap {
        width: 400px; 
        height: 500px; display: flex; 
        justify-content: center;
    }
    }

</style>