<template>
    <div class="container mt-5">
        <form>
            <div class="input-group d-flex justify-content-center">
                <input class="form-control col-6" placeholder="ابحث عن التصنيف">
                <button type="submit" class="btn btn-outline-info mr-2"><i class="fas fa-search"></i></button>
                <a href="#" class="btn btn-outline-info mr-2">عرض التصنيفات</a>
            </div>
        </form>
        <!--        <div class="d-flex justify-content-center mt-3">{{ $library->links() }}</div>-->

        <div class="row mx-md-n4">

            <div class="col-md-4 mt-lg-2 px-md-2 mt-2">
                <div class="p-4 bg-white text-center" style="border-radius: 10px">
                    <strong class="mb-2" style="border-bottom: 2px solid green">الفقه المنهجي</strong>
                    <p class="mt-3">عدد الكتب المتاحة 302</p>
                    <p class="text-danger">عدد الكتب المحجوزة 30</p>
                    <a href="" class="d-block mt-2">عرض الكتب المتاحة</a>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "LibraryComponent",
        data(){
            return {
                lib : [],
                number_of_books : [],
                id : '',
                hell : "hell"
            }
        },
        created() {
            this.library
            // this.number_of_books
            this.number_book
        },
        computed : {
            // numberOfBooks(){
            //     axios.get(`/number-of-books/${this.id}`)
            //     .then(res => console.log(res.data))
            // },
            library(){
                axios.get(`/library/${this.$route.params.libraryId}`)
                    .then(res => console.log(res.data))
                .catch(err => {
                    if (err.response.status === 404){
                        console.log("back")
                    }
                })
            },
            number_book(){
                this.$store.dispatch('numberOfBooks' , this.$route.params.libraryId);
                console.log(this.$store.state.number_books_d)
            }
        }

    }
</script>

<style scoped>

</style>
