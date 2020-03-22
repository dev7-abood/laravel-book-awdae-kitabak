<template>
<div>

    <br>
    <button type="button" @click="increment(5)">increment </button>
</div>
</template>

<script>
    export default {
        name: "test",
        methods : {
            increment(data){
                this.$store.commit('increment' , data)
                console.log(this.$store.state.count)
            }
        }
    }
</script>

<style scoped>

</style>
