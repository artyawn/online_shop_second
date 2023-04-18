<template>
    <div class="register">
    <input v-model="name" type="text" class="input_form" placeholder="name">
    <input v-model="email" type="email" class="input_form" placeholder="email">
    <input v-model="password" type="password" class="input_form" placeholder="password">
    <input v-model="confirm_password" type="password" class="input_form" placeholder="confirm password">
    <input @click.prevent="store" type="submit" class="button_form">
    </div>
</template>

<script>
export default {
    name: "Register",

    data() {
        return {
            name: null,
            email: null,
            password: null,
            confirm_password: null,
        }
    },

    methods: {
        store() {
            axios.post('api/register',
                {name: this.name, email: this.email, password: this.password, confirm_password: this.confirm_password})
                .then(res =>
                    localStorage.setItem('access_token', res.data.token));
        }
    }
}
</script>

<style >
.register {
    margin: auto;
    display: flex;
    flex-direction: column;
    width: 90vw;
    height: 90vh;
    align-items: center;
    justify-content: center;
}

.input_form {
    margin: 7px;
}

.button_form {
    padding: 7px;
}

</style>
