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
            <div  v-for="lib in librarys.data" :key="lib.id" class="col-md-4 mt-lg-2 px-md-2 mt-2">
                <div class="p-4 bg-white text-center" style="border-radius: 10px">
                    <strong class="mb-2" style="border-bottom: 2px solid green">{{lib.name}}</strong>
                    <p v-if="numberOfAvailableBooks[lib.pivot.library_id] !== 0" class="mt-3 text-success font-weight-bold">{{$t('number_of_books_available')}} {{numberOfAvailableBooks[lib.pivot.library_id]}}</p>
                    <P v-else style="color: #b2bec3">{{$t('sorry_no_books_available')}}</P>
                    <p v-if="numberOfNotAvailableBooks[lib.pivot.library_id] !== 0" class="text-secondary font-weight-bold">{{$t('number_of_not_books_available')}} {{numberOfNotAvailableBooks[lib.pivot.library_id]}}</p>
                    <P v-else style="color: #b2bec3" class="font-weight-bold">{{$t('there_are_no_books_reserved')}}</P>
                    <a href="" class="d-block text-danger mt-1">{{$t('show_books')}}</a>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "LibraryComponent",
        data() {
            return {

            }
        },
        created() {
            this.getLibrary();
        },
        mounted(){
            this.$store.dispatch('numberOfAvailableBooks');
            this.$store.dispatch('numberOfNotAvailableBooks');
        },
        methods: {
            getLibrary() {
                this.$store.dispatch('getLibrary' , this.$route.params.libraryId)
            },
        },
        computed : {
            librarys(){
                return this.$store.state.library.librarys;
            },
            numberOfAvailableBooks(){
                return this.$store.state.books.numberOfAvailableBooks;
            },
            numberOfNotAvailableBooks(){
                return this.$store.state.books.numberOfNotAvailableBooks;
            }
        },
    }
</script>

<style scoped>

</style>
