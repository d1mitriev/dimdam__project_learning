<template>
  <div class="modal" v-if="isModalVisible">
    <div class="modal-content">
        <p class="modal-content__tittle ">Информація про замовлення</p>
        <div class="modal-content__row ">
          <div class="modal-content__data">
            <div class="modal-content__check-in">
              <p class="modal-content__p-tittle ">Заїзд:</p> <p class="modal-content__p-description">{{ formatDate(modalData.childInput1) }}</p>
            </div>
            <div class="modal-content__check-out">
              <p class="modal-content__p-tittle ">Від`їзд:</p> <p class="modal-content__p-description">{{ formatDate(modalData.childInput2) }}</p>
            </div>
          </div>
          <div class="modal-content__people">
            <div class="modal-content__man">
              <p class="modal-content__p-tittle ">Дорослих:</p> <p class="modal-content__p-description">{{ modalData.input1 }}</p>
            </div>
              <div class="modal-content__kids">
                <p class="modal-content__p-tittle ">Дітей:</p> <p class="modal-content__p-description">{{ modalData.input2 }}</p>
              </div>
          </div>
        </div>
        <div class="modal-content__city">
          <p class="modal-content__p-tittle">Місто або регіон:</p> <p class="modal-content__p-description"> {{ modalData.input3 }}</p>
        </div>
        <div class="modal-content__additional">
          <p class="modal-content__p-tittle">Додаткові послуги:</p>
          <div class="additional__description">
            <input type="checkbox"/> <p class="modal-content__p-description">Замовити таксі</p>
            <svg width="2" height="18" viewBox="0 0 2 18" fill="none" xmlns="http://www.w3.org/2000/svg"><line x1="0.75" y1="0.75" x2="0.75" y2="17.25" stroke="#6D6D6D" stroke-width="1.5" stroke-linecap="round"/></svg>
            <input type="checkbox"/> <p class="modal-content__p-description">Замовити їжу</p>
          </div>
        </div>
      <div class="modal-content__buttons">
        <button @click="submitModal" class="buttons__succesfull">Подтвердить заказ</button>
        <a class="buttons__close" @click="closeModal"><svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg"><path id="Vector" opacity="0.2" d="M30.375 3.62125L27.3788 0.625L15.5 12.5038L3.62125 0.625L0.625 3.62125L12.5038 15.5L0.625 27.3788L3.62125 30.375L15.5 18.4963L27.3788 30.375L30.375 27.3788L18.4963 15.5L30.375 3.62125Z" fill="black"/></svg></a>
      </div>
    </div>
  </div>
  </template>
  
  <script>
  import {toast} from 'vue3-toastify';
  import 'vue3-toastify/dist/index.css';
  import { initializeApp } from 'firebase/app';
  import { getFirestore, collection, addDoc } from 'firebase/firestore/lite';
  import 'firebase/database';
  import { format } from 'date-fns';
  import { ref } from 'vue';
  export default {
    data() {
      return {
      }
    },

    props: {
      modalData: Object,
      isModalVisible: Boolean
    },
    methods: {
      closeModal() {
        this.$emit('close');
      },
      submitModal() {
      this.$emit('submit');
        
      toast.success('Заказ успешно подтвержден', {position: toast.POSITION.TOP_CENTER, autoClose: 4000, className: 'custom-toast',});

  try {
    const ordersCollection = collection(db, 'Заказы');
    addDoc(ordersCollection, {
      dateIn: this.formatDate(this.modalData.childInput1),
      dateOut: this.formatDate(this.modalData.childInput2),
      man: this.modalData.input1,
      children: this.modalData.input2,
      city: this.modalData.input3,
      additionalServices: {
        taxi: true, // Доделать логику
        food: true // Доделать логику
      }
    });

    console.log('Данные успешно отправлены в базу данных Firestore!');
  } catch (error) {
    console.error('Ошибка при отправке данных в базу данных Firestore:', error);
  } finally {
    this.isModalVisible = false;
  }
},
      formatDate(value) {
      		const date = new Date(value);
      		return format(date, 'dd.MM.yyyy');
    	},
      
    },
  };

  const firebaseConfig = {
    apiKey: "AIzaSyBCgLCf_64LVdEhHbUk7XYccg2VttRQBHw",
    authDomain: "dimdam-c25df.firebaseapp.com",
    databaseURL: "https://dimdam-c25df-default-rtdb.firebaseio.com",
    projectId: "dimdam-c25df",
    storageBucket: "dimdam-c25df.appspot.com",
    messagingSenderId: "841110788079",
    appId: "1:841110788079:web:3b2bc9aab2f5cab31ac81a",
    measurementId: "G-Z3TXMH1RD7"
  };

  initializeApp(firebaseConfig);

  const app = initializeApp(firebaseConfig);
  const db = getFirestore(app);

  </script>
  
  <style scoped>
  .custom-toast {
  font-family: 'Montserrat', sans-serif;
  color: #333;
  }
  /* Стили для модального окна */
  .modal { 
    position: fixed; 
    width: 100%; 
    height: 100%; 
    left: 0; 
    top: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgb(0, 0, 0, 0.50);
  }

  .modal-content {
    background-color: aliceblue;
    padding-right: 50px;
    padding-left: 50px;
    padding-top: 30px;
    padding-bottom: 30px;
    display: flex;
    flex-direction: column;
    gap: 30px;
    border-radius: 15px;
  }

  p.modal-content__tittle {
    color: #000;
    text-align: center;
    font-family: Montserrat;
    font-size: 24px;
    font-style: normal;
    font-weight: 500;
    line-height: normal;
    padding-top: 15px;
    padding-bottom: 15px;
    padding-right: 38px;
    padding-left: 38px;
    border-radius: 5px;
    background: #D9D9D9;
  }

  /* .margin-bottom {
    margin-bottom: 30px;
  } */

  .modal-content__row {
    display: flex;
    flex-direction: row;
    gap: 30px;
  }

  .modal-content__data {
    display: flex;
    flex-direction: column;
    column-gap: 10px;
    padding: 15px 20px;
    background: #D9D9D9;
    border-radius: 5px;
    width: 100%;
  }

  .modal-content__people {
    display: flex;
    flex-direction: column;
    column-gap: 10px;
    padding: 15px 20px;
    background: #D9D9D9;
    border-radius: 5px;
    width: auto;
  }

  .modal-content__man {
    display: flex;
    flex-direction: row;
    gap: 10px;
  }

  .modal-content__kids {
    display: flex;
    flex-direction: row;
    gap: 10px;
  }

  .modal-content__check-in {
    display: flex;
    flex-direction: row;
    gap: 10px;
  }

  .modal-content__check-out {
    display: flex;
    flex-direction: row;
    gap: 10px;
  }

  .modal-content__city {
    display: flex;
    flex-direction: column;
    column-gap: 10px;
    padding: 15px 20px;
    background: #D9D9D9;
    border-radius: 5px;
    width: auto;
  }

  .modal-content__additional {
    display: flex;
    flex-direction: column;
    column-gap: 10px;
    padding: 15px 20px;
    background: #D9D9D9;
    border-radius: 5px;
    width: auto;
  }

  .additional__description {
    display: flex;
    flex-direction: row;
    gap: 15px;
    align-items: center;

  }

  .modal-content__buttons {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    gap: 30px
  }

  .buttons__succesfull {
    padding: 25px 50px;
    border-radius: 15px;
    background: #FFBC57;
    border: 0 solid;
    font-size: 24px;
    font-style: normal;
    font-weight: 600;
    color:#ffffff;
    opacity: 0.9;
  }
  .buttons__close {
    opacity: 0.9;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 25px 28px;
    background-color: #FFBC57;
  }

  .modal-content__p-description {
    color: #000;
    font-family: Montserrat;
    font-size: 20px;
    font-style: normal;
    font-weight: 500;
    line-height: normal;
  }

  .modal-content__p-tittle {
    color: #000;
    font-family: Montserrat;
    font-size: 20px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    justify-content: flex-start;
  }

  @media screen and (max-width: 414px) {
    .modal { 
    position: absolute; 
    width: 100%; 
    height: 100%;
    left: 0; 
    top: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgb(0, 0, 0, 0.50);
  }

  .modal-content {
    background-color: aliceblue;
    padding-right: 1px;
    padding-left: 1px;
    padding-top: 20px;
    padding-bottom: 20px;
    display: flex;
    flex-direction: column;
    gap: 15px;
    border-radius: 10px;
  }

  p.modal-content__tittle {
    color: #000;
    text-align: center;
    font-family: Montserrat;
    font-size: 20px;
    font-style: normal;
    font-weight: 500;
    line-height: normal;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-right: 20px;
    padding-left: 20px;
    border-radius: 0px;
    background: #D9D9D9;
  }

  /* .margin-bottom {
    margin-bottom: 30px;
  } */

  .modal-content__row {
    display: flex;
    flex-direction: row;
    gap: 15px;
  }

  .modal-content__data {
    display: flex;
    flex-direction: column;
    column-gap: 10px;
    padding: 10px 15px;
    background: #D9D9D9;
    border-radius: 5px;
    width: 100%;
  }

  .modal-content__people {
    display: flex;
    flex-direction: column;
    column-gap: 10px;
    padding: 10px 15px;
    background: #D9D9D9;
    border-radius: 5px;
    width: auto;
  }

  .modal-content__man {
    display: flex;
    flex-direction: row;
    gap: 5px;
  }

  .modal-content__kids {
    display: flex;
    flex-direction: row;
    gap: 5px;
  }

  .modal-content__check-in {
    display: flex;
    flex-direction: row;
    gap: 5px;
  }

  .modal-content__check-out {
    display: flex;
    flex-direction: row;
    gap: 5px;
  }

  .modal-content__city {
    display: flex;
    flex-direction: column;
    column-gap: 10px;
    padding: 15px 20px;
    background: #D9D9D9;
    border-radius: 5px;
    width: auto;
  }

  .modal-content__additional {
    display: flex;
    flex-direction: column;
    column-gap: 5px;
    padding: 15px 20px;
    background: #D9D9D9;
    border-radius: 5px;
    width: auto;
  }

  .additional__description {
    display: flex;
    flex-direction: row;
    gap: 10px;
    align-items: center;

  }

  .modal-content__buttons {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    gap: 30px
  }

  .buttons__succesfull {
    padding: 25px 50px;
    border-radius: 10px;
    background: #FFBC57;
    border: 0 solid;
    font-size: 20px;
    white-space: nowrap;
    font-style: normal;
    font-weight: 600;
    color:#ffffff;
    opacity: 0.9;
  }
  .buttons__close {
    opacity: 0.9;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 25px 28px;
    background-color: #FFBC57;
  }

  .modal-content__p-description {
    color: #000;
    font-family: Montserrat;
    font-size: 17px;
    font-style: normal;
    font-weight: 500;
    line-height: normal;
    display: flex;
    align-items: center;
    align-content: center;
  }

  .modal-content__p-tittle {
    color: #000;
    font-family: Montserrat;
    font-size: 20px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    justify-content: flex-start;
  }
  }
  </style>