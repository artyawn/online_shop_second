<template>
<div class="card">
    <img class="card__img" src="../../images/img.png">
    <div class="card__name">{{ product.name }}</div>
    <div class="card__price">{{ product.price }} р.</div>
    <div class="card__actions">
        <button class="card__button" @click.prevent="addToCart()">В корзину</button>
        <router-link class="card__button-more" :to="getLink">Подробнее</router-link>
    </div>
</div>
</template>

<script>
import addToCartMixin from "../mixins/addToCartMixin";
export default {
    name: "Card",
    props: {
        product:{},
    },
    mixins: [addToCartMixin],

    computed: {
        getLink() {
            return `/paintings/${this.product.id}`
        },
    },
}
</script>

<style scoped>
.card{
    padding: 10px 20px;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    background-color: #FFFFFF;
}

.card__img {
    object-fit: contain;
    height: 300px;
}

.card__name{
    font-family: "PlayfairDisplay Regular", sans-serif;
    font-size: 15px;
    color: #4a5568;
}

.card__price{
    margin-top: 17px;
    font-family: "PlayfairDisplay Medium", sans-serif;
}

.card__actions {
    margin-top: 15px;
    display: flex;
    justify-content: space-between;
}

.card__button{
    width: 50%;
    font-family: "PlayfairDisplay Regular", sans-serif;
    border: #070707 solid 1px;
    color: #070707;
    padding: 5px 5px;
    text-align: center;
    justify-content: center;
    text-decoration: none;
    font-size: 14px;
    background: transparent;
    transition: 0.2s;
}

.card__button:hover {
    background: #070707;
    color: #FFFFFF;
}
.card__button-more {
   font-family: "PlayfairDisplay Medium", sans-serif;
   font-size: 14px;
   text-decoration: none;
   color: #4a5568;
    margin-top: 10px;
}



</style>
