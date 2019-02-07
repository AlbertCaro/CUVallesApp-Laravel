/*eslint-disable not-new*/
window.$ = window.jQuery = require('jquery');
window.chart = require('chart.js');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
Vue.prototype.$axios = window.axios;
require('./argon');
require('bootstrap');
require('bootstrap-datepicker');
require('clipboard');
require('anchor-js');
require('headroom.js');
require('holderjs');
require('jquery.scrollbar');
require('jquery-scroll-lock');
require('nouislider');
require('onscreen');
require('prismjs');
require('@fortawesome/fontawesome-free');

import Vue from 'vue';
import VueRouter from 'vue-router';
import VueSweetalert2 from 'vue-sweetalert2';
import VeeValidate, { Validator } from 'vee-validate';
import esLocale from 'vee-validate/dist/locale/es';

Vue.use(VueRouter);
Vue.use(VueSweetalert2);
Vue.use(VeeValidate);
Validator.localize('es', esLocale);

const App = Vue.component('main-component', require('./components/app/Main'));
const placeIndex= Vue.component('place-index', require('./components/place/Index'));
const placeCreate= Vue.component('place-create', require('./components/place/Create'));
const placeEdit= Vue.component('place-edit', require('./components/place/Edit'));

const routes = [
    {
        name: 'place-index',
        path: '/place',
        component: placeIndex
    },
    {
        name: 'place-create',
        path: '/place/create',
        component: placeCreate
    },
    {
        name: 'place-edit',
        path: '/place/:id/edit',
        component: placeEdit
    },
];

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

new Vue({
    router
}).$mount('#app');
