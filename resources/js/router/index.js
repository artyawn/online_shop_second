import {createRouter, createWebHistory } from "vue-router";
import Login from "../components/pages/Login.vue";
import Register from "../components/pages/Register.vue";
import Home from "../components/pages/Home.vue";

const routes = [
    {
        path: "/login",
        name: "login",
        component: Login,
    },
    {
        path: "/register",
        name: "register",
        component: Register,
    },
    
    {
        path: "/home",
        name: "home",
        component: Home,
    }]


const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});

export default router;
