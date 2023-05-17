<template>
 <div class="orders">
     <div class="orders-title">Ваши заказы</div>
    <div class="orders-table__item" v-for="order in orders">
        <div class="orders-table__item-header">
            <div class="orders-table__item-header__left">
                <div class="orders-table__item-number">Номер заказа: {{ order.id }} </div>
                <div class="orders-table__item-date">Дата заказа: {{order.date}} </div>
            </div>
            <div class="orders-table__item-header__right">
                <div class="orders-table__item-status"> Статус: {{order.status}}</div>
            </div>
        </div>
        <div class="orders-table__item-track_number" v-if="order.track_number">Отслежтвание товара: {{ order.track_number }}</div>
         <div class="orders-table__item-product" v-for="product in order.products">
             <div>{{ product.name }}</div>
             <div>x {{ product.qty }}</div>
         </div>
         <div class="orders-table__item-sum">
             <div>{{ order.sum }} р.</div>
         </div>
     </div>
 </div>
</template>

<script>
import api from "../../api";

export default {
    name: "User",

    data() {
        return {
            orders: {}
        }
    },

    mounted() {
      this.getOrders()
    },
    methods: {
        getOrders(){
            api.get('orders')
                .then( res => {
                    this.orders = res.data.data
                    console.log(res)
                }
            )
        }
    }
}
</script>

<style scoped>
.orders {
    max-width: 1280px;
    margin: auto;
}
.orders-title {
    font-family: "PlayfairDisplay Medium", sans-serif;
    font-size: 50px;
    margin-bottom: 60px;
    color: #FFFFFF;
}

.orders-table__item {
    display:flex;
    background: #FFFFFF;
    flex-direction: column;
    margin-top: 15px;
}

.orders-table__item-header {
    display: flex;
    margin-bottom: 20px;
    padding: 15px;
    background: #a0aec0;
}
.orders-table__item-header__left {
    width: 30%;
    font-size: 18px;
    font-family: "PlayfairDisplay Regular", sans-serif;
    color: #FFFFFF;
}
.orders-table__item-header__right {
    width: 70%;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    font-family: "PlayfairDisplay Medium", sans-serif;
    font-size: 20px;
}

.orders-table__item-product {
    padding: 5px 20px;
    display: flex;
    justify-content: space-between;
    font-family: "PlayfairDisplay Regular", sans-serif;
    font-size: 18px;
}

.orders-table__item-sum {
    display: flex;
    justify-content: flex-end;
    margin-top: 20px;
    padding: 20px;
    font-family: "PlayfairDisplay Medium", sans-serif;
    font-size: 20px;
}
</style>
