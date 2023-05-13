<template>
<div class="pagination">
<!--    <ul>-->
<!--        <li v-if="pagination.curent_page !== 1" class="previous">-->
<!--            <a></a>-->
<!--        </li>-->
<!--        <li v-for="links in pagination.links">-->
<!--            <a>{{ link.label}}</a>-->
<!--        </li>-->
<!--        <li v-if="">-->
<!--            <a>3</a>-->
<!--        </li>-->
<!--    </ul>-->
</div>
</template>

<script>
export default {
    name: "Pagination"
}
</script>

<style scoped>
pagination {
    margin: auto;
}
.pagination ul {
    display: flex;
    justify-content: center;
}
</style>
