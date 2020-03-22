<template>
<div>
    <library-type-component></library-type-component>
    <navbar-component :info="info" :src_logo="src_logo" :src_add_book="src_add_book"/>
    <footer-component :info="info" :src_logo="src_logo"></footer-component>
    <test-component></test-component>
    <router-view></router-view>

</div>
</template>

<script>
    import LibraryTypeComponent from "../components/LibraryTypeComponent";
    export default {
        components: {LibraryTypeComponent},
        props : ['src_logo','src_add_book' , 'info'],
        name: "app"
    }
</script>

<style scoped>

</style>
