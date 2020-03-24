<template>
    <div v-if="$route.path == '/home'" class="container">
        <br><br><br>
        <div class="row text-center d-flex justify-content-center flex-row-reverse">
            <div v-for="cat in category" :key="cat.id"  class="col-lg-5 bg-white mt-3" style="border-radius: 30px;margin: 0 20px 0 20px">
                <img :src="cat.img_url" class="mx-auto d-block p-2" height="300px" width="300px">
                <div class="text-center">
                    <strong> {{$t('categorie')}} {{cat.name}}</strong>
                    <div class="mt-1"><span>{{$t('number_of_books_available_for_reservation')}}<span style="font-size: 20px">&nbsp;&nbsp;<strong>{{number_of_books[cat.pivot.categorie_id]}}</strong></span></span></div>
                    <router-link :to="{ name : 'library' , params : { libraryId : cat.pivot.categorie_id}}" :class="`btn btn-${cat.btn_color} text-white mt-2 mb-3`">عرض الكتب المتاحة</router-link>
                </div>
            </div>
        </div>
        <br><br><br>
    </div>
</template>

<script>
    export default {
        name: "CategoryComponent",
        data(){
            return {
                category : [],
                number_of_books : []
            }
        },
        created() {
            this.getCategoryTypeStudent;
            this.numberOfBooks;
        },
        computed : {
            getCategoryTypeStudent()
            {
                axios.get('/category')
                .then(res => {
                    this.category = res.data;
                })
            },
            numberOfBooks()
            {
               axios.get('/total-number-of-category')
                    .then(res => this.number_of_books = res.data);

                setInterval(()=>{
                    axios.get('/total-number-of-category')
                        .then(res => this.number_of_books = res.data);
                },500);

            }
        },
    }
</script>

<style scoped>

</style>
