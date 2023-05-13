<template>
<div class="card">
    <img class="card__img" src="../../images/img.png">
    <div class="card__name">{{ product.name }}</div>
    <div class="card__price">{{ product.price }} р.</div>
    <button class="card__button" @click.prevent="addToCart(product.id)">В корзину</button>
</div>
</template>

<script>
export default {
    name: "Card",
    props: {
        product:{}
    },

    methods: {
        addToCart(id){
            let cart = localStorage.getItem('cart')
            let newProduct = [
                {
                    'id': id,
                    'qty': 1
                }
            ]
            if(!cart) {
                localStorage.setItem('cart', JSON.stringify(newProduct));
            } else {
                cart = JSON.parse(cart)
                cart.forEach(productInCart => {
                    if(productInCart.id === id) {
                        productInCart.qty = Number(productInCart.qty) + 1
                        newProduct = null
                    }

                })
                Array.prototype.push.apply(cart, newProduct)
                localStorage.setItem('cart', JSON.stringify(cart))
            }
        }
    }

}
</script>

<style scoped>
.card{
    padding: 25px 20px;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    background-color: #FFFFFF;
}

.card__img {
    object-fit: contain;
    height: 200px;
    margin-top: 20px;
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

.card__button{
    margin-top: 15px;
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
.button-form {
    display: flex;
    font-family: "Roboto Light", sans-serif;
    border: #FFA943 solid 1px;
    color: white;
    padding: 12px 30px;
    text-align: center;
    justify-content: center;
    text-decoration: none;
    font-size: 14px;
    background: transparent;
    transition: 0.2s;
    width: 143px;
    margin-top: 15px;
}



</style>
