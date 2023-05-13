<template>
<Header v-if="token"></Header>
<router-view></router-view>
</template>

<script>
import Header from "./Header.vue";

export default {
    name: "Main",
    components: {Header},
    data() {
        return {
            token:null,
        }
    },

    mounted() {
      this.getAccessToken()
    },

    updated() {
        this.getAccessToken()
    },

    methods:{
        getAccessToken(){
            this.token = localStorage.getItem('access_token')
        }
    }
}
</script>

<style scoped>

</style>
