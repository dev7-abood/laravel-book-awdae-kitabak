import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';


Vue.use(Vuex , axios);


// const debug = process.env.NODE_ENV !== 'production'


export const store = new Vuex.Store({
    state : {
        count : 0

    },
    modules: {

    },
    actions : {

    },
    mutations : {
        increment(state , data){
            return state.count +=data
        }
    },
    getters : {

    },
    strict: true
});
