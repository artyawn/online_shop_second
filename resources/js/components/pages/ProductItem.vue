<template>
    <div class="product-item" v-if="product">
        <div class="product-item__name">{{ name }}</div>
        <div class="product-item__information-block">
            <div class="product-item__side-block">
                <img  class="product-item__image" src="../../../images/img.png">
            </div>
            <div class="product-item__side-block">
                <div class="product-item__description-title">Описание</div>
                <div class="product-item__description">{{ description }}</div>
                <div class="product-item__cart-block">
                    <div class="product-item__price">2222.2 р.</div>
                    <button class="product-item__button">В корзину</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import api from "../../api";

export default {
    name: "ProductItem",

    data() {
        return {
            name: 'WESKER Шапка теплая бини',
            description: 'Приобретением любого товара покупатель пытается решить определенную проблему. Возьмем, например, девушку. Она ищет вечернее платье. На следующей неделе торжественный прием/корпоратив/свидание. Времени искать, примерять в офлайн-магазине нет. Она вводит запрос в поисковой системе, идет на сайт интернет-магазина, надеясь найти платье мечты. Вы должны понимать это заранее. Потому перед написанием карточки товара, определите проблему представителей целевой аудитории за решением которой они приходят. \n' +
                '\n' +
                'Информация описания товара должна быть настолько объемной, чтобы у клиента не осталось дополнительных вопросов.',
            product: undefined
        }
    },

    mounted() {
        this.getProduct()
    },

    methods:{
        getProduct(){
            api.get(`products/${this.$route.params.id}`)
                .then( res => {
                    console.log(res);
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
    width: 70%;
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
    line-height: 1.5;
}

.product-item__cart-block{
    display: flex;
    justify-content: space-between;
    margin-top: 300px;
}
.product-item__price {
    //margin-right: 30px;
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
