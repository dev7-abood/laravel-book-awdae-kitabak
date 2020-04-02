<template>
<div>
    <category-component></category-component>
    <navbar-component :info="info" :src_logo="src_logo" :src_add_book="src_add_book"/>
    <footer-component :info="info" :src_logo="src_logo"></footer-component>
    <router-view></router-view>
    <vue-progress-bar></vue-progress-bar>
</div>
</template>

<script>
    export default {
        props : ['src_logo','src_add_book' , 'info'],
        name: "app",
        created() {
            this.$Progress.start()
        },
        mounted() {
            setTimeout(()=>{
                this.$Progress.finish()
            }, 1500);
        }
    }
</script>

<style scoped>

</style>
