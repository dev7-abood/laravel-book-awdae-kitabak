<template>
<div>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div v-for="book in getBooks.data" :key="book.id"  class="col-lg-3 mb-4">
                <div class="col-lg-12 bg-white text-center rounded mt-1">
                    <a href="#" class="text-success d-flex align-items-start text-decoration-none pt-2 pr-1"
                       style="font-size: 30px;"><i class="far fa-star"></i></a>
                    <img :src="'/'+book.img_url" style="width: 85%;border-radius: 15% 0 10px 10px;" class="mt-2">
                    <div>
                        <strong class="mb-1 mt-1 d-block">{{book.name}}</strong>
                        <p v-if="book.status == 'e' ">{{$t('status')}} : <strong class="text-success">{{$t('excellent')}}</strong></p>
                        <p v-if="book.status == 'g' ">{{$t('status')}} : <strong class="text-success">{{$t('good')}}</strong></p>
                        <p v-if="book.status == 'b' ">{{$t('status')}} : <strong class="text-danger">{{$t('bade')}}</strong></p>

                        <button class="btn btn-info mb-2 mt-2 w-100">حجز</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        name: "BookComponent",
        mounted() {
            this.$store.dispatch('getBooks' , this.$route.params.booksId)
        },
        created(){
            Echo.channel('messages')
                .listen('MassageEvent' , e => {
                    console.log(e)
                })
        },
        computed: {
            getBooks(){
                return this.$store.state.books.books
            }
        },

    }
</script>

<style scoped>

</style>
