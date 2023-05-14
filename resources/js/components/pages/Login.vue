<template>
<div class="login">
    <input v-model="email" type="email" class="input_form" placeholder="email">
    <input v-model="password" type="password" class="input_form" placeholder="password">
    <input @click.prevent="login" type="submit" class="button_form" placeholder="confirm password">
    <div class="register-ref">
        Нет аккаунта?
        <router-link :to="{name:'register'}">Зарегистрируйтесь</router-link>
    </div>
</div>
</template>

<script>
import router from "../../router";

export default {
    name: "Login",

    data() {
        return {
            password: null,
            email: null,
        }
    },
    methods: {
        login() {
            axios.post('api/login', {password: this.password, email: this.email})
                .then(res => {
                    localStorage.setItem('access_token', res.data.token)
                    router.push({name: 'paintings'})
                })
        }
    }
}
</script>

<style scoped>
.login {
    margin: auto;
    display: flex;
    flex-direction: column;
    width: 90vw;
    height: 90vh;
    align-items: center;
    justify-content: center;
}

.register-ref {
    font-family: "PlayfairDisplay Regular", sans-serif;
    color: #FFFFFF;
    font-size: 14px;
    margin: 10px;
}
</style>
