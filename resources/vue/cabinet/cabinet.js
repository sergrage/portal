window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');

import 'es6-promise/auto';

import store from './store'

Vue.component('fuel-component', require('./components/FuelComponent.vue').default);


const app = new Vue({
    el: '#main',
    store,
    created() {

	},
    mounted(){

    }
});

