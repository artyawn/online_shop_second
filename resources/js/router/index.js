import {createRouter, createWebHistory } from "vue-router";
import Login from "../components/pages/Login.vue";
import Register from "../components/pages/Register.vue";
import Home from "../components/pages/Home.vue";
import Wear from "../components/pages/Wear.vue";
import Paintings from "../components/pages/Paintings.vue";
import Attributes from "../components/pages/Attributes.vue";
import User from "../components/pages/User.vue";
import Cart from "../components/pages/Cart.vue";
import ErrorPage from "../components/pages/ErrorPage.vue";
import ProductItem from "../components/pages/ProductItem.vue";

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
        path: "/",
        name: "home",
        component: Home,
    },

    {
        path: "/wear",
        name: "wear",
        component: Wear,
    },

    {
        path: "/paintings",
        name: "paintings",
        component: Paintings,
    },

    {
        path: "/attributes",
        name: "attributes",
        component: Attributes,
    },

    {
        path: "/user",
        name: "user",
        component: User,
    },

    {
        path: "/cart",
        name: "cart",
        component: Cart,
    },

    {
        path: '/paintings/:id',
        name: 'productItem',
        component: ProductItem
    },

    {
        path: '/:pathMatch(.*)*',
        name: "404",
        component: ErrorPage,
    }
    ]


const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});


router.beforeEach((to, from, next )=> {
    const token = localStorage.getItem('access_token')

    if (!token) {
        return (to.name === 'login' || to.name === 'register') ?  next() :  next('login');
    }

    if (to.name === 'login' || to.name === 'register' && token) {
        return next({
            name:'user'
        })
    }

    next();
})

export default router;
