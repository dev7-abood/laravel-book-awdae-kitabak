require('./bootstrap');

import Vue from 'vue';
import Vuex from 'vuex'
import VueRouter from "vue-router";

import { store } from './store/index';
import { routes } from './routes';
import {i18n} from "./lang/localization";


Vue.use(Vuex);

Vue.use(VueRouter);

const router = new VueRouter({
    routes,
});


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('navbar-component', require('./components/NavbarComponent.vue').default);
Vue.component('footer-component', require('./components/FooterComponent.vue').default);
Vue.component('app-component', require('./pages/app.vue').default);


const app = new Vue({
    el: '#app',
    i18n,
    store,
    router
});
