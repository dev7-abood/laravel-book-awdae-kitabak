import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

// const debug = process.env.NODE_ENV !== 'production'
import books from "./modules/books";



export const store = new Vuex.Store({
    modules: {
        books
    },
    strict: true
});
