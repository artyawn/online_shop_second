<template>
<div class="cart">
    <div class="cart-button">
        <button  class="cart-button__remove" @click.prevent="clearCart">очистить корзину</button>
    </div>
    <div class="cart-position">
    <div class="cart-position__item" v-for="item in productsInCart">
        <div class="cart-position__item_name">
            <div class="cart-position__item_text">{{item.product.name}}</div>
        </div>
        <div class="cart-position__item_qty">
            <img class="minus" src="../../../images/minus.svg" @click.prevent="minusQty(item.product.id)">
            <div class="cart-position__item_text">{{item.qty}}</div>
            <img class="plus" src="../../../images/plus.svg" @click.prevent="plusQty(item.product.id)">
        </div>
        <div class="cart-position__item_price">
            <div class="cart-position__item_text">{{item.product.price}} р.</div>
        </div>
        <div class="cart-position__item_remove">
            <img src="../../../images/remove.svg" @click.prevent="removeItem(item.product.id)">
        </div>
    </div>
    </div>
    <div class="cart-footer">
        <button  class="cart__button" @click.prevent="storeOrder(productsInCart)">Оформить заказ</button>
        <div class="sum">Сумма заказа:  {{sum}} р.</div>
    </div>
</div>
</template>

<script>
import api from "../../api";

export default {
    name: "Cart",
    data() {
        return {
            productsInCart: [],
            errors: {},
            orders: {},
            sum: null
        }
    },

    mounted() {
        this.getCart()
        console.log(this.productsInCart)
    },

    methods: {

        getCart() {
            this.productsInCart = JSON.parse(localStorage.getItem('cart'))
            this.getSum()
        },

        getSum(){
            this.sum = 0
            this.productsInCart.forEach(item => {
                this.sum+=item.product.price * item.qty
            })
        },

        clearCart() {
            this.productsInCart = {}
            localStorage.removeItem('cart');
            this.sum = 0
        },


        plusQty(id) {
            this.productsInCart.forEach(item => {
                if(item.product.id === id){
                    item.qty = Number(item.qty) + 1
                }
            })
            localStorage.setItem('cart', JSON.stringify(this.productsInCart))
            this.getSum()
        },

        minusQty(id) {
            this.productsInCart.forEach(item => {
                if(item.product.id === id && item.qty >=2){
                    item.qty =  Number(item.qty) - 1
                }
            })
            localStorage.setItem('cart', JSON.stringify(this.productsInCart))
            this.getSum()
        },

        removeItem(id) {
            this.productsInCart.forEach(item => {
                if(item.product.id === id){
                    this.productsInCart.splice()
                }
            })
        },

        storeOrder(cart) {
            if(cart) {
                let products = []
                let sum = 0
                cart.forEach(item => {
                    products.push({
                        'name': item.product.name,
                        'qty': item.qty,
                        'product_id': item.product.id
                    })
                    sum += item.product.price * item.qty
                })

                api.post('api/order', {sum: sum, products: products}).then(res => {
                    console.log(res)
                })
                //     .catch(error => {
                // if (error.response.status === 422) {
                //     this.errors = error.response.data.errors;
                //     console.log('типо ошибка')
                // }
            // });
            }
            else {
                console.log('товаров нет')
            }
        },

        // getOrders() {
        //     api.get('api/orders')
        //         .then(res => {
        //             console.log(res)
        //         })
        // },
    }
}

</script>

<style scoped>
.cart {
    margin: auto;
    max-width: 1280px;
    display: flex;
    flex-direction: column;
}

.cart-footer {
    display: flex;
    justify-content: space-between;
}

.sum{
    margin-top: 30px;
    color: #FFFFFF;
    font-family: "PlayfairDisplay Regular", sans-serif;
    font-size: 18px;
}
.cart__header {
    display: flex;
    justify-content: space-between;
}

.cart-header__item {
    color: #a0aec0;
    font-family: "PlayfairDisplay Regular", sans-serif;
    font-size: 14px;
}

.plus{
    margin-left: 20px;
}

.minus{
    margin-right: 20px ;
}

.cart-button__remove{
    width: 200px;
    font-family: "PlayfairDisplay Regular", sans-serif;
    border: #FFFFFF solid 1px;
    color: #FFFFFF;
    padding: 5px 5px;
    text-align: center;
    justify-content: center;
    text-decoration: none;
    font-size: 14px;
    background: transparent;
    transition: 0.2s;
}

.cart-button__remove:hover {
    background: #E62E34;
    border: #E62E34 solid 1px;
}



.cart-position{
    margin-top: 20px;
}

.cart-button{
    display: flex;
    justify-content: flex-end;
}
.cart-position__item {
    background-color: #FFFFFF;
    padding: 15px;
    margin-top: 15px;
    color: #FFFFFF;
    display: flex;
}

.cart-position__item_text {
    font-family: "PlayfairDisplay Medium", sans-serif;
    font-size: 18px;
    color: #070707;
}

.cart-position__item_name {
    width: 40%;
}

.cart-position__item_price {
    width: 20%;
    display: flex;
    justify-content: flex-end;
}

.cart-position__item_qty {
    width: 20%;
    display: flex;
    justify-content: center;
}

.cart-position__item_remove{
    display: flex;
    width: 20%;
    justify-content: flex-end;
    align-items: center;
}



.cart__button{
    margin-top: 30px;
    width: 200px;
    font-family: "PlayfairDisplay Regular", sans-serif;
    border: #FFFFFF solid 1px;
    color: #FFFFFF;
    padding: 5px 5px;
    text-align: center;
    justify-content: center;
    text-decoration: none;
    font-size: 14px;
    background: transparent;
    transition: 0.2s;
}

.cart__button:hover {
    background: #FFFFFF;
    color: #070707;
}
</style>
