<template>
<div class="user">
    <div class="user__links"></div>
    <div class="user-info">
        <input type="text" v-model="user.name">
        <input type="text" v-model="user.email">
    </div>
    <button @click.prevent="updateUser(user.id)">Изменить</button>
    <button @click.prevent="logout" type="submit" class="button_logout">Выйти</button>
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
            api.post('api/logout')
                .then(res => {
                    localStorage.removeItem('access_token');
                    router.push({name:'login'})
                })
        },

        getUser() {
            api.get('api/me')
                .then(res => {
                    this.user = res.data.data
                })
        },

        updateUser(id){
            api.put(`api/user/${id}`,{ name:this.user.name, email:this.user.email })
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

.user-info {
    display: flex;
    flex-direction: column;
    width: 40%;
    margin: auto;
}

.user-info input{
    margin: 7px;
}
</style>
