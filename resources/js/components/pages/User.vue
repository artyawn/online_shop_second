<template>
<div class="user">
    <div class="user__info">
        <div class="user__title">Личная информация</div>
        <input type="text" v-model="user.name">
        <input type="text" v-model="user.email">
        <button @click.prevent="updateUser(user.id)" class="user__btn-change">Изменить</button>
    </div>
    <button @click.prevent="logout" type="submit" class="user__btn-logout">Выйти</button>
</div>
</template>

<script>
import router from "../../router";
import api from "../../api";

export default {
    name: "User",

    data() {
        return {
            user: {}
        }
    },

    mounted() {
        this.getUser()
    },

    methods: {
        logout() {
            api.post('logout')
                .then(res => {
                    localStorage.removeItem('access_token');
                    router.push({name:'login'})
                })
        },

        getUser() {
            api.get('me')
                .then(res => {
                    this.user = res.data.data
                })
        },

        updateUser(id){
            api.put(`user/${id}`,{ name:this.user.name, email:this.user.email })
                .then(res => {
                    console.log(res)
                })
        }
    }
}
</script>

<style scoped>
.user {
    max-width: 1280px;
    margin: auto;
    display: flex;
    justify-content: space-between;
}

.user__title {
    font-family: "PlayfairDisplay Medium", sans-serif;
    font-size: 50px;
    margin-bottom: 60px;
    color: #FFFFFF;
}
.user__links{
    display: flex;
}
.user__links_link {
    color: #FFFFFF;
    font-family: "PlayfairDisplay Regular", sans-serif;
    font-size: 16px;
    margin-right: 15px;
}

.user__info {
    display: flex;
    flex-direction: column;
    width: 40%;
}

.user__info input{
    margin-top: 10px;
    font-family: "PlayfairDisplay Medium", sans-serif;
    color: #FFFFFF;
    font-size: 20px;
    background: transparent;
    border: none;
    border-bottom: 1px solid white;
    outline: none;
}

.user__btn-change {
    width: 200px;
    font-family: "PlayfairDisplay Regular", sans-serif;
    border: #FFFFFF solid 1px;
    color: #FFFFFF;
    padding: 5px 5px;
    text-align: center;
    justify-content: center;
    text-decoration: none;
    font-size: 18px;
    background: transparent;
    transition: 0.2s;
    margin-top: 50px;
}

.user__btn-change:hover {
    background: #FFFFFF;
    color: #070707;
}

.user__btn-logout {
    width: 100px;
    height: 50px;
    font-family: "PlayfairDisplay Regular", sans-serif;
    border: #FFFFFF solid 1px;
    color: #FFFFFF;
    padding: 5px 5px;
    text-align: center;
    justify-content: center;
    text-decoration: none;
    font-size: 18px;
    background: transparent;
    transition: 0.2s;
}

.user__btn-logout:hover {
    background: #E62E34;
    border: #E62E34 solid 1px;
}
</style>
