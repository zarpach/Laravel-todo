import { createMemoryHistory, createRouter } from 'vue-router'

import HomeView from './App.vue'

const routes = [
    { path: '/tasks', component: HomeView },
]

const router = createRouter({
    history: createMemoryHistory(),
    routes,
})
export default router;