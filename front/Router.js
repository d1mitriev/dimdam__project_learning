import { createRouter, createWebHistory } from 'vue-router';
import Ladling from '/src/Ladling.vue';
import Contacts from '/src/Contacts.vue';
import listingHouse from '/src/listingHouse.vue';
import Registration from './src/Registration.vue'
import Login from './src/Login.vue'
import Me from './src/Me.vue'
import Xml from './src/Xml.vue'

const routes = [
  { path: '/contact', component: Contacts },
  { path: '/listingHouse', component: listingHouse },
  { path: '/', component: Ladling },
  { path: '/register', component: Registration },
  { path: '/login', component: Login },
  { path: '/me', component: Me },
  { path: '/xml', component: Xml }
  // Добавить другие маршруты по необходимости
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
