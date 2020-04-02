<template>
    <div class="container mt-5">
        <form>
            <div class="input-group d-flex justify-content-center">
                <input class="form-control col-6" autoComplete="on" list="data_list" :placeholder="$t('wcs')">
                <datalist id="data_list">
                    <option>سيرة</option>
                    <option>حديث</option>
                </datalist>
                <button type="button" class="btn btn-outline-info mr-2"><i class="fas fa-search"></i></button>
                <button @click="getLibrary()" type="button" class="btn btn-outline-info mr-2">{{$t('view_categories')}}</button>
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

<!--        <nav v-if="librarys.total >= librarys.per_page">-->
<!--            <ul class="pagination d-flex justify-content-center mt-3">-->
<!--                <li class="page-item">-->
<!--                    <button :title="$t('first')" @click="getLibrary(1)" class="page-link" aria-label="Previous">-->
<!--                        <span aria-hidden="true">&laquo;</span>-->
<!--                    </button>-->
<!--                </li>-->
<!--                <li v-if="librarys.current_page != 1" @click="getLibrary(librarys.current_page -1)" :title="$t('per')" class="page-item"><a class="page-link" href="#">&lt;</a></li>-->
<!--                <li v-for="(n , index) in librarys.last_page" :title="$t('number_of_page') + n" :class="{active : librarys.current_page == n}"  class="page-item" @click="getLibrary(n)"><button class="page-link">{{n}}</button></li>-->
<!--                <li v-if="librarys.current_page != librarys.last_page" @click="getLibrary(librarys.current_page + 1 )" :title="$t('next')" class="page-item"><a class="page-link" href="#">&gt;</a></li>-->
<!--                <li class="page-item">-->
<!--                    <button :title="$t('last')" @click="getLibrary(librarys.last_page)" class="page-link" aria-label="Next">-->
<!--                        <span aria-hidden="true">&raquo;</span>-->
<!--                    </button>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </nav>-->

        <pagination class="pagination d-flex justify-content-center mt-3" :limit="5" :data="librarys" v-on:pagination-change-page="getLibrary">
            <span slot="prev-nav">&lt;</span>
            <span slot="next-nav">&gt;</span>
        </pagination>


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
            getLibrary(page = 1) {
                this.$Progress.start();
                this.$store.dispatch('getLibrary' ,
                    `${this.$route.params.libraryId}?page=${page}` , this.$Progress.finish())
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
    input::-webkit-calendar-picker-indicator {
        display: none;
    }
</style>
