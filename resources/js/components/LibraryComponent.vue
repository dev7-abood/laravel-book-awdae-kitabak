<template>
    <div class="container mt-5">
        <div>
            <div class="input-group d-flex justify-content-center">
                <input  v-model="inputSearch" v-on:keyup="autoCompleteLibrarySearch" @keyup.enter.prevent="getLibrarySearch" class="form-control col-6"
                       autoComplete="on" list="data_list" :placeholder="$t('wcs')">
                <datalist id="data_list">
                    <option v-for="d in LibraryDatalist">{{d.name}}</option>
                </datalist>
                <button @click="getLibrarySearch" type="button" class="btn btn-outline-info mr-2"><i
                    class="fas fa-search"></i></button>
                <button @click="getLibrary()" type="button" class="btn btn-outline-info mr-2">
                    {{$t('view_categories')}}
                </button>
            </div>
        </div>

        <div class="row mx-md-n4">
            <div v-for="lib in SearchDataOrMainLibraryData" :key="lib.id" class="col-md-4 mt-lg-2 px-md-2 mt-2">
                <div class="p-4 bg-white text-center" style="border-radius: 10px">
                    <strong class="mb-2" style="border-bottom: 2px solid green">{{lib.name}}</strong>
                    <p v-if="numberOfAvailableBooks[lib.pivot.library_id] !== 0 && numberOfAvailableBooks.hasOwnProperty(lib.pivot.library_id)"
                       class="mt-3 text-success font-weight-bold">{{$t('number_of_books_available')}}
                        {{numberOfAvailableBooks[lib.pivot.library_id]}}</p>
                    <P v-else class="mt-3 font-weight-bold text-dark">{{$t('sorry_no_books_available')}}</P>
                    <p v-if="numberOfNotAvailableBooks[lib.pivot.library_id] !== 0 && numberOfNotAvailableBooks.hasOwnProperty(lib.pivot.library_id)"
                       class="text-primary font-weight-bold">{{$t('number_of_not_books_available')}}
                        {{numberOfNotAvailableBooks[lib.pivot.library_id]}}</p>
                    <P v-else style="color: #b2bec3">{{$t('there_are_no_books_reserved')}}</P>
                    <router-link
                        v-if="numberOfAvailableBooks[lib.pivot.library_id] !== 0 && numberOfAvailableBooks.hasOwnProperty(lib.pivot.library_id)"
                        to="/" class="btn btn-link text-danger">{{$t('show_books')}}
                    </router-link>
                    <router-link v-else to="/" class="btn btn-link text-danger disabled">{{$t('show_books')}}
                    </router-link>
                </div>
            </div>
        </div>

        <pagination class="pagination d-flex justify-content-center mt-3" :limit="5"
                    :data="PaginationSearchDataOrMainLibraryData" v-on:pagination-change-page="getLibrary">
            <span slot="prev-nav">&lt;</span>
            <span slot="next-nav">&gt;</span>
        </pagination>

        <div v-if="LibrarySearchData.data == ''" v-html="$t('category_you_are_looking_for_does_not_exist')"
             class="d-flex justify-content-center h4">
        </div>

        <br><br><br><br><br>
    </div>
</template>

<script>
    export default {
        name: "LibraryComponent",
        data() {
            return {
                libraryMainActive: true,
                libraryExternalActive: false,
                LibraryDatalist: {},
                LibrarySearchData: {},
                inputSearch: ''
            }
        },
        created() {
            this.getLibrary();
        },
        mounted() {
            this.$store.dispatch('numberOfAvailableBooks');
            this.$store.dispatch('numberOfNotAvailableBooks');
        },
        methods: {
            getLibrary(page = 1) {
                this.LibrarySearchData = {};
                this.inputSearch = '';
                this.libraryMainActive = true;
                this.libraryExternalActive = false;
                this.$Progress.start();
                this.$store.dispatch('getLibrary',
                    `${this.$route.params.libraryId}?page=${page}`, this.$Progress.finish())
            },
            autoCompleteLibrarySearch() {
                axios.post(`/search-input-library/${this.$route.params.libraryId}`, {
                    name: this.inputSearch
                }).then(res => this.LibraryDatalist = res.data)
            },
            getLibrarySearch() {
                if (this.inputSearch == '') {
                    this.$Progress.start();
                    this.$Progress.fail()

                } else {
                    this.$Progress.start();
                    this.libraryMainActive = false;
                    this.libraryExternalActive = true;
                    axios.post(`/search-type-library/${this.$route.params.libraryId}`, {
                        name: this.inputSearch
                    }).then(res => {
                        this.LibrarySearchData = res.data;
                        this.$Progress.finish()
                    })
                }
            },
        },
        computed: {
            librarys() {
                return this.$store.state.library.librarys;
            },
            numberOfAvailableBooks() {
                return this.$store.state.books.numberOfAvailableBooks;
            },
            numberOfNotAvailableBooks() {
                return this.$store.state.books.numberOfNotAvailableBooks;
            },
            SearchDataOrMainLibraryData(){
                if (this.libraryMainActive)
                {
                    return this.librarys.data
                }
                else if (this.libraryExternalActive)
                {
                    return this.LibrarySearchData.data
                }
            },
            PaginationSearchDataOrMainLibraryData()
            {
                if (this.libraryMainActive)
                {
                    return this.librarys
                }
                else if (this.libraryExternalActive)
                {
                    return this.LibrarySearchData
                }
            }
        },
    }
</script>

<style scoped>
    input::-webkit-calendar-picker-indicator {
        display: none;
    }
</style>
