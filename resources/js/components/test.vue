<template>
<div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <button type="button" @click="increment()">increment </button>
</div>
</template>

<script>
    export default {
        name: "test",
        methods : {
            increment(){
                this.$store.commit('increment')
                console.log(this.$store.state.count)
            }
        }
    }
</script>

<style scoped>

</style>
