<template>
    <div class="container mt-5">
        <form>
            <div class="input-group d-flex justify-content-center">
                <input class="form-control col-6" placeholder="ابحث عن التصنيف">
                <button type="submit" class="btn btn-outline-info mr-2"><i class="fas fa-search"></i></button>
                <a href="#" class="btn btn-outline-info mr-2">عرض التصنيفات</a>
            </div>
        </form>

        <div class="row mx-md-n4">
            <div  v-for="lib in librarys.data" :key="lib.id" class="col-md-4 mt-lg-2 px-md-2 mt-2">
                <div class="p-4 bg-white text-center" style="border-radius: 10px">
                    <strong class="mb-2" style="border-bottom: 2px solid green">{{lib.name}}</strong>
                    <p v-if="numberOfAvailableBooks[lib.pivot.library_id] !== 0" class="mt-3 text-success font-weight-bold">{{$t('number_of_books_available')}} {{numberOfAvailableBooks[lib.pivot.library_id]}}</p>
                    <P v-else style="color: #b2bec3">{{$t('sorry_no_books_available')}}</P>
                    <p v-if="numberOfNotAvailableBooks[lib.pivot.library_id] !== 0" class="text-primary font-weight-bold">{{$t('number_of_not_books_available')}} {{numberOfNotAvailableBooks[lib.pivot.library_id]}}</p>
                    <P v-else  class="text-dark">{{$t('there_are_no_books_reserved')}}</P>
                    <a href="" class="d-block text-danger mt-1">{{$t('show_books')}}</a>
                </div>
            </div>
        </div>

        <nav>
            <ul class="pagination d-flex justify-content-center mt-3">
                <li class="page-item">
                    <button :title="$t('first')" @click="getLibrary(1)" class="page-link"  aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </button>
                </li>
                <li v-if="librarys.current_page != 1" @click="getLibrary(librarys.current_page -1 )" :title="$t('per')" class="page-item"><a class="page-link" href="#">&lt;</a></li>
                <li v-for="(n , index) in librarys.last_page" :key="index" @click="getLibrary(n)" :title="$t('number_of_page') + n" :class="{active : librarys.current_page == n}" class="page-item"><button class="page-link">{{n}}</button></li>
                <li v-if="librarys.current_page != librarys.last_page" @click="getLibrary(librarys.current_page + 1 )" :title="$t('next')" class="page-item"><a class="page-link" href="#">&gt;</a></li>
                <li class="page-item">
                    <button :title="$t('last')" @click="getLibrary(librarys.last_page)" class="page-link" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </button>
                </li>
            </ul>
        </nav>
        <br><br><br><br><br>
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
            getLibrary(page) {
                page = page || 1;
                this.$store.dispatch('getLibrary' , `${this.$route.params.libraryId}?page=${page}`)
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
