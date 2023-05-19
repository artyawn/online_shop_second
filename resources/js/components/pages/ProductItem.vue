<template>
    <div class="product-item" v-if="product">
        <div class="product-item__name">{{ product.name }}</div>
        <div class="product-item__information-block">
            <div class="product-item__side-block">
                <img  class="product-item__image" :src="`http://localhost:5173/storage/app/public/photos/${product.id}/${product.photo}`">
            </div>
            <div class="product-item__side-block">
                <div class="product-item__description-title">Описание</div>
                <div class="product-item__description">{{ product.description }}</div>
                <div class="product-item__cart-block">
                    <div class="product-item__price">{{ product.price }} р.</div>
                    <button class="product-item__button" @click.prevent="addToCart">В корзину</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import api from "../../api";
import addToCartMixin from "../../mixins/addToCartMixin";

export default {
    name: "ProductItem",

    data() {
        return {
            product: {}
        }
    },
    mixins:[addToCartMixin],

    mounted() {
        this.getProduct()
    },

    methods:{
        getProduct(){
            api.get(`products/${this.$route.params.id}`)
                .then( res => {
                    this.product = res.data.data;
                })
        }
    }
}
</script>

<style scoped>
.product-item {
    max-width: 1280px;
    margin: auto;
    display: flex;
    flex-direction: column;
}


.product-item__name {
    font-family: "PlayfairDisplay Medium", sans-serif;
    font-size: 40px;
    color: #FFFFFF;
}

.product-item__information-block {
    display: flex;
    margin-top: 30px;
}

.product-item__side-block {
    display: flex;
    flex-direction: column;
    width: 50%;
}

.product-item__image {
    width: 60%;
}

.product-item__description-title {
    font-family: "PlayfairDisplay Medium", sans-serif;
    font-size: 18px;
    color: #4a5568;
}
.product-item__description {
    font-family: "PlayfairDisplay Regular", sans-serif;
    font-size: 18px;
    margin-top: 20px;
    color: #FFFFFF;
    min-height: 400px;
    line-height: 1.5;
}

.product-item__cart-block{
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
}
.product-item__price {
    margin-right: 30px;
    font-size: 40px;
    color: #FFFFFF;
    font-family: "PlayfairDisplay Medium",sans-serif;
}

.product-item__button {
    width: 50%;
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

.product-item__button:hover {
        background: #FFFFFF;
        color: #070707;
    }


</style>
