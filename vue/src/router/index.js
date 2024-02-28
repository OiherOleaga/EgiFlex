import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/:pathMatch(.*)*',
      component: () => import('../views/NotFound.vue')
    },
    {
      path: '/',
      component: () => import('../views/HomeView.vue')
    },
    {
      path: '/watch',
      component: () => import('../views/watch.vue')
    },
    {
      path: '/peliculas',
      component: () => import('../views/peliculas.vue')
    },
    {
      path: '/series',
      component: () => import('../views/series.vue')
    }
  ]
})

export default router
