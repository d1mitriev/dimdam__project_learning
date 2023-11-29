import { createRouter, createWebHistory } from 'vue-router';
import Ladling from '/src/Ladling.vue';

const routes = [
  { path: '/', component: Ladling }
  // Добавьте другие маршруты по необходимости
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
