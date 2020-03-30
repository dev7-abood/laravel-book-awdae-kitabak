import  Vue from 'vue';
import  Vuex from 'vuex';
import  books from "./modules/books";
import library from "./modules/library";

Vue.use(Vuex);

// const debug = process.env.NODE_ENV !== 'production';



export default new Vuex.Store({
    modules: {
        books,
        library
    },
    strict: true
});
