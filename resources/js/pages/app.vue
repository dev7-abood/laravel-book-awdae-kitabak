<template>
<div>
    <navbar-component :src_logo="src_logo" :src_add_book="src_add_book"/>
    <footer-component :src_logo="src_logo"></footer-component>

</div>
</template>

<script>
    export default {
        props : ['src_logo','src_add_book'],
        name: "app"
    }
</script>

<style scoped>

</style>
