<template>
<div>
    <navbar-component :info="info" :src_logo="src_logo" :src_add_book="src_add_book"/>
    <footer-component :info="info" :src_logo="src_logo"></footer-component>

</div>
</template>

<script>
    export default {
        props : ['src_logo','src_add_book' , 'info'],
        name: "app"
    }
</script>

<style scoped>

</style>
