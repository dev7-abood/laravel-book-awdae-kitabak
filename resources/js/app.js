require('./bootstrap');

import Vue from 'vue';
import Vuex from 'vuex'
import VueRouter from "vue-router";

import store from './store/index';
import {routes} from './routes';
import {i18n} from "./lang/localization";
import VueProgressBar from 'vue-progressbar'

const options = {
    color: '#00cec9',
    failedColor: '#d63031',
    thickness: '4px',
    transition: {
        speed: '0.3s',
        opacity: '0.2s',
        termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
};
Vue.use(VueProgressBar, options);


Vue.use(Vuex);

Vue.use(VueRouter);

const router = new VueRouter({
    routes,
    mode: 'history',

});


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('navbar-component', require('./components/layouts/NavbarComponent.vue').default);
Vue.component('footer-component', require('./components/layouts/FooterComponent.vue').default);
Vue.component('category-component', require('./components/CategoryComponent.vue').default);

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('app-component', require('./App/app.vue').default);


const app = new Vue({
    el: '#app',
    i18n,
    store,
    router
});
