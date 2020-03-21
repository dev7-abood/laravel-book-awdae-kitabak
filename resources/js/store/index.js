import Vue from 'vue';
import Vuex from 'vuex';


Vue.use(Vuex);


const debug = process.env.NODE_ENV !== 'production';


export const store = new Vuex.Store({
    state : {
        go : 'hell'
    },
    modules: {

    },
    actions : {

    },
    getters : {

    },
    mutations : {

    },
    strict: debug,
})
