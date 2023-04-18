<template>
<router-link :to="{name:'login'}">Login</router-link>
<router-link :to="{name:'register'}">Registration</router-link>
<router-link :to="{name:'home'}">Home</router-link>
<router-view></router-view>
</template>

<script>
export default {
    name: "Main"
}
</script>

<style scoped>

</style>
