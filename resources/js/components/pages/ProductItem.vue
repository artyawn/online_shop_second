<template>
<div class="product-item">

</div>
</template>

<script>
import api from "../../api";
export default {
    name: "ProductItem",
    data() {
        return {
            product: {}
        }
    },

    mounted() {
      this.getProduct()
    },

    methods:{
        getProduct(){
            api.get(`api/products/${this.$route.params.id}`)
                .then(res => {
                    console.log(res)
                })
        }
    }
}
</script>

<style scoped>
.body {
    background: #FFFFFF;
}
.product-item {
    max-width: 1280px;
}
</style>
