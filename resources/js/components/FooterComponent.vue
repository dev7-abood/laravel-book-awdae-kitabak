<template>
    <footer class="card-footer footer">
    <div class="d-flex justify-content-between align-self-center">
        <img :src="src_logo" class="text-end align-self-center mr-5" style="height: 60px">
        <div>
            <div class="mb-3 ml-5">
                <a class="text-white h4 m-2" href="#"><i class="fab fa-facebook"></i></a>
                <a class="text-white h4 m-2" href="#"><i class="fab fa-whatsapp"></i></a>
                <a class="text-white h4 m-2" href="#"><i class="fas fa-globe-africa"></i></a>
            </div>
            {{$t('footer_copyrights')}} {{$year-1}} - {{$year}}
        </div>
    </div>
</footer>
</template>

<script>
    export default {
        props : ['src_logo'],
        name: "FooterComponent"
    }
</script>

<style scoped>

</style>
