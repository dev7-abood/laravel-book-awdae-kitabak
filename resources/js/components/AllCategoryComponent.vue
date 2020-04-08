<template>
    <div class="container">
        <br>
        <div class="row">
            <div v-for="cat in getAllCategory" class="col-md-4 mt-md-2 px-md-2 mt-2">
                <div class="p-3 bg-white text-center" style="border-radius: 10px">
                    <img :src="cat.img_url" class="img-fluid"
                         style="width: 80%">
                    <p class="mt-3 font-weight-bold">{{$t('courses')}} {{cat.name}}</p>
                    <p class="mt-1">عدد الكتب المتاحة 302</p>
                    <router-link :to="{ name : 'library' , params : { libraryId : cat.id}}">{{$t('show_books')}}</router-link>

                </div>
            </div>
        </div>

        <pagination class="pagination d-flex justify-content-center mt-3" :limit="5"
                    :data="getAllCategoryPagination" v-on:pagination-change-page="getCategory">
            <span slot="prev-nav">&lt;</span>
            <span slot="next-nav">&gt;</span>
        </pagination>

        <br><br><br>
        <br><br>
    </div>
</template>

<script>
    export default {
        name: "AllCategoryComponent",
        created(){
            this.$Progress.start();
            this.$store.dispatch('getCategories' , this.$Progress.finish())
        },
        methods: {
            getCategory(page = 1){
                this.$Progress.start();
                this.$store.dispatch('getCategories' , page , this.$Progress.finish())
            }
        },
        computed: {
            getAllCategory(){
                return this.$store.state.categories.listOfCategories.data;
            },
            getAllCategoryPagination(){
                return this.$store.state.categories.listOfCategories;
            }
        }
    }
</script>

<style scoped>

</style>
