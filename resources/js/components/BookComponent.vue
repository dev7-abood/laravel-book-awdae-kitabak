<template>
<div>


    <div class="container mt-5">

        <div class="row d-flex justify-content-center">

            <div id="alert" class="alert alert-info font-weight-bold" style="font-size: 25px;display: none; ">يا احبيب لا يوجد كتب في هذا القسم!</div>

            <div v-for="book in getBooks.data" :key="book.id"  class="col-lg-3 mb-4">
                <div :id="book.id" class="col-lg-12 bg-white text-center rounded mt-1">
                    <a href="#" class="text-success d-flex align-items-start text-decoration-none pt-2 pr-1"
                       style="font-size: 30px;"><i class="far fa-star"></i></a>
                    <img :src="'/'+book.img_url" style="width: 85%;border-radius: 15% 0 10px 10px;" class="mt-2">
                    <div>
                        <strong class="mb-1 mt-1 d-block">{{book.name}}</strong>
                        <p v-if="book.status == 'e' ">{{$t('status')}} : <strong class="text-success">{{$t('excellent')}}</strong></p>
                        <p v-if="book.status == 'g' ">{{$t('status')}} : <strong class="text-success">{{$t('good')}}</strong></p>
                        <p v-if="book.status == 'b' ">{{$t('status')}} : <strong class="text-danger">{{$t('bade')}}</strong></p>

                        <button v-on:click="tHandedUserId(book.id)" class="btn btn-info mb-2 mt-2 w-100">حجز</button>
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
            this.$store.dispatch('getBooks', this.$route.params.booksId)
        },
        created() {
            Echo.channel('messages')
                .listen('MassageEvent', e => {
                    console.log(e)
                })
        },
        computed: {
            getBooks() {
                return this.$store.state.books.books
            }

        },

        methods: {
            tHandedUserId: function (id) {
                axios.post(`/user-temporary-reservation`, {
                    id: id
                }).then(res => {
                    if (res.data.success != undefined) {
                        this.$swal({
                            position: 'top-start',
                            icon: 'success',
                            title: res.data.success,
                            showConfirmButton: false,
                            timer: 3000})
                        document.getElementById(id).style.display = 'none'
                        if (Object.keys(this.getBooks.data).length - 1 === 0)
                        {
                            document.getElementById('alert').style.display = 'flex'
                            document.getElementById('alert').style.justifyContent = 'center'
                        }

                    } else {
                        if (res.data.rejected != undefined) {
                            this.$swal({
                                position: 'top-start',
                                icon: 'error',
                                title: res.data.rejected,
                                showConfirmButton: false,
                                timer: 3000}) } } }) }
        }
}
</script>

<style scoped>

</style>
