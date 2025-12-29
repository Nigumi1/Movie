import { createRouter, createWebHistory } from 'vue-router';
// import LoginView from './views/LoginView.vue';
// import DashboardView from './views/DashboardView.vue';


const routes = [
//   { path: '/', redirect: '/login' },
//   { path: '/login', name: 'login', component: LoginView },
//   { path: '/dashboard', name: 'dashboard', component: DashboardView, meta: { auth: true } },
];


const router = createRouter({
  history: createWebHistory(),
  routes,
});


router.beforeEach((to) => {
  const token = localStorage.getItem('access_token');
  if (to.meta.auth && !token) return { name: 'login' };
  if (to.name === 'login' && token) return { name: 'dashboard' };
});


export default router;