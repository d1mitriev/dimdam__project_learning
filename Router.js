import { createRouter, createWebHistory } from 'vue-router';
import Ladling from '/src/Ladling.vue';
import Contacts from '/src/Contacts.vue';
import listingHouse from '/src/listingHouse.vue';

const routes = [
  { path: '/contact', component: Contacts },
  { path: '/listingHouse', component: listingHouse },
  { path: '/', component: Ladling }
  // Добавить другие маршруты по необходимости
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
