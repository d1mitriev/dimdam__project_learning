import { createApp } from 'vue'
import App from './App.vue'
import router from '/Router.js'

import 'v-calendar/style.css';
import VCalendar from 'v-calendar';

// Импорт библиотеки с ресурсами
createApp(App).use(VCalendar, {}).use(router).mount('#app')