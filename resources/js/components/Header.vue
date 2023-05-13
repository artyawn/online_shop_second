<template>
<div class="header-block">
    <div class="header-block__links">
    <router-link :to="{name:'paintings'}" class="header-block__link">КАРТИНЫ</router-link>
    <router-link :to="{name:'wear'}" class="header-block__link">ОДЕЖДА</router-link>
    <router-link :to="{name:'attributes'}" class="header-block__link">АТРИБУТЫ</router-link>
    </div>
    <div class="header-block__user_block">
    <router-link :to="{name:'user'}" class="header-block__user_link">
        <img src="../../images/user.svg">
    </router-link>
    <router-link :to="{name:'cart'}" class="header-block__user_link">
        <img src="../../images/cart.svg">
    </router-link>
    </div>
</div>
</template>

<script>
export default {
    name: "Header"
}
</script>

<style scoped>
.header-block {
    margin: auto;
    max-width: 1280px;
    display: flex;
    height: 100px;
    align-items: center;
}

.header-block__link {
    font-family: "PlayfairDisplay Regular", sans-serif;
    color: #FFFFFF;
    text-decoration: none;
}

.header-block__links{
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 70%;
}

.header-block__user_block {
    justify-content: flex-end;
    display: flex;
    align-items: center;
    width: 30%;
}

.header-block__user_block img{
    margin-left: 30px;
}
</style>
