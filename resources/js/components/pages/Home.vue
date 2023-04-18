<template>
<div class="home">
    <card v-for="product in products"></card>
</div>
</template>

<script>
import Card from "../Card.vue";
import api from "../../api"
export default {
    components: {
        Card

    },

    name: "Home",
    data() {
        return {
            products: null
        }
    },

    mounted() {
        this.getProducts()
    },

    methods:{
        getProducts(){
            api.get('api/home', {
                headers: {
                    "authorization" : `Bearer ${localStorage.getItem('access_token')}`
                }
            })
                .then( res => {
                    this.products = res.data.data
                })
        }
    }
}
</script>

<style scoped>
.home{
    width: 60%;
    display: flex;
    margin: auto;
    flex-direction: column;
}
</style>
