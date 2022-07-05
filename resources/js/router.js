import { createRouter, createWebHistory } from 'vue-router'

import Login from './components/auth/Login.vue';
import Register from './components/auth/Register.vue';
import Dashboard from './components/pages/Dashboard.vue';
import Profile from "./components/pages/Profile";

const routes = [
    {path: '/login', name: "login", component: Login},
    {path: '/register', name: "register", component: Register},
    {path: '/dashboard', name: "dashboard", component: Dashboard},
    {path: '/profile', name: "profile", component: Profile},
];

export default createRouter({
    history: createWebHistory(),
    routes
});
