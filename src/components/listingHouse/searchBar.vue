<template>
    <div class="container">
        <div class="search__holder">
            <div class="holder__rent_house">
                <div class="rent_house__title">Орендовати будинок</div>
                <div class="rent_house__opener"><svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" clip-rule="evenodd" d="M10 1.2L5 6L0 1.2L1.25 0L5 3.6L8.75 0L10 1.2Z" fill="black"/></svg></div>
            </div>
            <div class="holder__number_room">
                <div class="number_room__title">Кімнати</div>
                <div class="number_room__opener"><svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" clip-rule="evenodd" d="M10 1.2L5 6L0 1.2L1.25 0L5 3.6L8.75 0L10 1.2Z" fill="black"/></svg></div>
            </div>
            <div class="holder__area_room">
                <div class="area_room__title">Площа</div>
                <div class="area_room__opener"><svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" clip-rule="evenodd" d="M10 1.2L5 6L0 1.2L1.25 0L5 3.6L8.75 0L10 1.2Z" fill="black"/> </svg></div>
            </div>
            <div class="holder__floor_house">
                <div class="floor_house__title">Житловий поверх</div>
                <div class="floor_house__opener"> <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" clip-rule="evenodd" d="M10 1.2L5 6L0 1.2L1.25 0L5 3.6L8.75 0L10 1.2Z" fill="black"/></svg></div>
            </div>
            <div class="holder__search">
                <div class="search__icon"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M13.125 2.5C11.4308 2.50014 9.76109 2.90546 8.25533 3.68212C6.74957 4.45878 5.45138 5.58427 4.46906 6.96469C3.48674 8.34511 2.84877 9.94043 2.6084 11.6176C2.36802 13.2947 2.5322 15.005 3.08723 16.6057C3.64227 18.2065 4.57207 19.6513 5.79906 20.8197C7.02605 21.988 8.51464 22.846 10.1407 23.322C11.7667 23.798 13.4829 23.8783 15.1463 23.5561C16.8096 23.234 18.3718 22.5187 19.7025 21.47L24.2675 26.035C24.5033 26.2627 24.819 26.3887 25.1468 26.3858C25.4745 26.383 25.788 26.2515 26.0198 26.0198C26.2515 25.788 26.383 25.4745 26.3859 25.1468C26.3887 24.819 26.2627 24.5033 26.035 24.2675L21.47 19.7025C22.705 18.1358 23.474 16.253 23.6889 14.2697C23.9038 12.2863 23.556 10.2825 22.6853 8.48762C21.8146 6.69271 20.4561 5.1792 18.7654 4.12029C17.0747 3.06138 15.12 2.49987 13.125 2.5ZM5.00001 13.125C5.00001 10.9701 5.85604 8.90349 7.37977 7.37976C8.9035 5.85602 10.9701 5 13.125 5C15.2799 5 17.3465 5.85602 18.8703 7.37976C20.394 8.90349 21.25 10.9701 21.25 13.125C21.25 15.2799 20.394 17.3465 18.8703 18.8702C17.3465 20.394 15.2799 21.25 13.125 21.25C10.9701 21.25 8.9035 20.394 7.37977 18.8702C5.85604 17.3465 5.00001 15.2799 5.00001 13.125Z" fill="black"/></svg></div>
                <div class="search__input"><input type="text" placeholder="Поиск по тегам..."></div>
            </div>
            <button class="holder__btn"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.585 5.64471L6.63497 1.69471C6.45281 1.50611 6.35201 1.25351 6.35429 0.991311C6.35657 0.729114 6.46174 0.478301 6.64715 0.292893C6.83255 0.107485 7.08337 0.00231622 7.34556 3.78026e-05C7.60776 -0.00224062 7.86036 0.0985537 8.04897 0.280712L13.706 5.93771C13.7992 6.03037 13.8731 6.14053 13.9236 6.26186C13.974 6.38319 14 6.5133 14 6.64471C14 6.77612 13.974 6.90623 13.9236 7.02757C13.8731 7.1489 13.7992 7.25906 13.706 7.35171L8.04897 13.0087C7.85951 13.1864 7.60838 13.2833 7.3487 13.2791C7.08901 13.2749 6.84116 13.1698 6.65757 12.9861C6.47399 12.8024 6.36908 12.5545 6.36505 12.2948C6.36102 12.0351 6.45818 11.784 6.63596 11.5947L10.586 7.64471L0.999965 7.64471C0.734748 7.64471 0.480394 7.53935 0.292858 7.35182C0.105322 7.16428 -3.52859e-05 6.90993 -3.52859e-05 6.64471C-3.52859e-05 6.3795 0.105322 6.12514 0.292858 5.93761C0.480394 5.75007 0.734748 5.64471 0.999965 5.64471L10.585 5.64471Z" fill="black"/></svg></button>
        </div>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style scoped>
    .container {
        margin-top: 50px;
        width: 100%;
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .search__holder {
        display: flex;
        flex-direction: row;
        border-radius: 10px;
        background: #F6F6F6;
        padding: 15px 20px;
        gap: 20px;
        align-items: center;
    }
    
    .holder__rent_house {
        display: flex;
        justify-content: space-between;
        padding: 15px;
        gap: 15px;
        border-radius: 10px;
        background: #D9D9D9;
    }

    .rent_house__title {
        color: #000;
        font-family: Montserrat;
        font-size: 20px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        opacity: 0.5;
    }

    .holder__floor_house {
        display: flex;
        justify-content: space-between;
        padding: 15px;
        gap: 15px;
        border-radius: 10px;
        background: #D9D9D9;
    }

    .floor_house__title {
        color: #000;
        font-family: Montserrat;
        font-size: 20px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        opacity: 0.5;
    }

    .holder__number_room {
        display: flex;
        justify-content: space-between;
        padding: 15px;
        gap: 15px;
        border-radius: 10px;
        background: #D9D9D9;
    }

    .number_room__title {
        color: #000;
        font-family: Montserrat;
        font-size: 20px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        opacity: 0.5;
    }

    .holder__area_room {
        display: flex;
        justify-content: space-between;
        padding: 15px;
        gap: 15px;
        border-radius: 10px;
        background: #D9D9D9;
    }

    .area_room__title {
        color: #000;
        font-family: Montserrat;
        font-size: 20px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        opacity: 0.5;
    }

    .holder__search {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .search__icon {
        border-radius: 10px 0px 0px 10px;
        background: #D9D9D9;
        padding: 11px 12px;
    }

    input {
        color: #000;
        font-family: Montserrat;
        font-size: 20px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        border: #F6F6F6 solid 0px;

    }

    input:active {
        color: #000;
        font-family: Montserrat;
        font-size: 20px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        border: none;
        outline: none;
    }

    input:focus {
        color: #000;
        font-family: Montserrat;
        font-size: 20px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        border: none;
        outline: none;
    }

    .search__input {
        padding: 15px;
        background: #FFF;
        border-radius: 0px 10px 10px 0px;
    }

    .holder__btn {
        border-radius: 10px;
        background: #D9D9D9;
        padding: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        outline: none;
    }

</style>