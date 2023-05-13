<template>
    <div class="products">
        <card  v-for="product in products" :product="product"></card>
    </div>
    <pagination></pagination>
</template>

<script>
import api from "../../api";
import Card from "../Card.vue";
import Pagination from "../Pagination.vue";

export default {
    name: "Paintings",
    components: {Pagination, Card},
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
            api.get('api/paintings')
                .then( res => {
                    this.products = res.data.data
                })
        }
    }
}
</script>

<style scoped>
.products {
    max-width: 1280px;
    display: grid;
    grid-template-columns: repeat(auto-fit,minmax(200px, 1fr));
    margin: auto;
    grid-gap: 45px;
    width: 80%;
}
</style>
