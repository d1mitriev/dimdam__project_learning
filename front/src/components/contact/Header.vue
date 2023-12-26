<template>
    <div class="container">
  <div class="contact__banner">
    <div class="banner__info">
        <div class="info__title">
          Мы команда проекта <a class="edit_color">Dimdam</a>
        </div>
        <div class="info__description">
          Эти люди обеспечивают безперерывную работу сервиса
        </div>
    </div>
    <div class="card__container">
        <div class="banner__card">
          <div class="card__template" v-for="(item, index) in card" :key="index">
            <div class="template__img" :style="{ background: 'url(' + item.img + ') center center no-repeat', backgroundSize: 'cover' }"></div>
            <a class="template_title" > {{ item.title }}</a>
            <a class="template__description" > {{ item.description }}</a>
            <a class="template__info" > {{ item.info }} </a>
          </div>
        </div>
    </div>
  </div>
</div>
</template>

<script>
    export default {
        data(){
            return {
                card: [
                    {
                        img: 'contactCard2.jpg',
                        title: 'Дарья Красна',
                        description: 'Project Manager',
                        info: 'Организация процессов внутри компании, Управление проектом',
                    },
                    {
                        img: 'contactCard1.jpg',
                        title: 'Димитрий Гончар',
                        description: 'Fullstack developer',
                        info: 'Разработчик сайта, техническая поддержка, Отдел разработки',
                    },
                    {
                        img: 'contactCard3.jpg',
                        title: 'Владислав Ровно',
                        description: 'Client Manager',
                        info: 'Менеджер по работе с клиентами, Обратная связь, Отдел продаж',
                    },
                    {
                        img: 'contactCard4.jpg',
                        title: 'Александ Демеев ',
                        description: 'Chief Rieltor',
                        info: 'Подбор жилья, Проверка жилья, Юрист, Отдел проверки качества',
                    }
                ]
            }
        },
        computed: {
            
        }
        
    }
</script>

<style scoped>
    .container {
        padding-top: 250px;
        height: 100%;
        width: 100%;
        background-color: #262626;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .contact__banner {
        display: flex;
        flex-direction: column;
        row-gap: 50px;
    }

    .info__title {
        white-space: nowrap;
        color: #FFF;
        text-align: center;
        font-family: Montserrat;
        font-size: 48px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;

    }
    a.edit_color {
        color: #FFBC57;
        font-family: Montserrat;
        font-size: 48px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }

    .info__description {
        color: #FFF;
        text-align: center;
        font-family: Montserrat;
        font-size: 24px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        opacity: 0.5;
    }

    .banner__card {
        display: flex;
        flex-direction: row;
        gap: 50px;
        padding-bottom: 100px;
    }

    .card__container {
        width: 100%;
    }

    .card__template {
        border-radius: 15px;
        background: #232323;
        display: flex;
        flex-direction: column;
        row-gap: 15px;
        align-items: flex-start;
        padding: 25px;
        width: 316px;
        transition: all 0.3s;
    }

    .card__template:hover {
        transform: scale(1.01);    
    }

    a.template_title {
        color: #FFF;
        font-family: Montserrat;
        font-size: 32px;
        font-weight: 600;
        width: 318px;
        display: inline-block;
        align-items: flex-start;
    }


    a.template__description {
        color: #FFF;
        font-family: Montserrat;
        font-size: 20px;
        font-weight: 500;
        width: 318px;
        display: inline-block;
        align-items: flex-start;
    }

    a.template__info {
        color: #FFF;
        font-family: Montserrat;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        width: 318px;
        opacity: 0.5;
        
    }

    .template__img {
        background-size: cover;
	    background-repeat: no-repeat;
        width: 320px;
        height: 320px;
        flex-shrink: 0;
        border-radius: 25px;
    }

    @media screen and (max-width: 414px) {
        .container {
        padding-top: 100px;
        height: 100%;
        width: 100%;
        background-color: #262626;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .contact__banner {
        display: flex;
        flex-direction: column;
        row-gap: 50px;
    }

    .info__title {
        white-space: nowrap;
        color: #FFF;
        text-align: center;
        font-family: Montserrat;
        font-size: 24px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;

    }
    a.edit_color {
        color: #FFBC57;
        font-family: Montserrat;
        font-size: 24px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }

    .info__description {
        color: #FFF;
        text-align: center;
        font-family: Montserrat;
        font-size: 13px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        opacity: 0.5;
    }

    .banner__card {
        display: flex;
        flex-direction: column;
        gap: 50px;
        padding-bottom: 100px;
    }

    .card__container {
        width: 100%;
    }

    .card__template {
        border-radius: 15px;
        background: #232323;
        display: flex;
        flex-direction: column;
        row-gap: 15px;
        align-items: flex-start;
        padding: 25px;
        width: 316px;
        transition: all 0.3s;
    }

    .card__template:hover {
        transform: scale(1.01);    
    }

    a.template_title {
        color: #FFF;
        font-family: Montserrat;
        font-size: 32px;
        font-weight: 600;
        width: 318px;
        display: inline-block;
        align-items: flex-start;
    }


    a.template__description {
        color: #FFF;
        font-family: Montserrat;
        font-size: 20px;
        font-weight: 500;
        width: 318px;
        display: inline-block;
        align-items: flex-start;
    }

    a.template__info {
        color: #FFF;
        font-family: Montserrat;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        width: 318px;
        opacity: 0.5;
        
    }

    .template__img {
        background-size: cover;
	    background-repeat: no-repeat;
        width: 320px;
        height: 320px;
        flex-shrink: 0;
        border-radius: 25px;
    }
    }
</style>