import { createApp } from 'vue'
import App from './App.vue'
import router from '/Router.js'

// Импорт библиотеки с ресурсами
createApp(App).use(router).mount('#app')