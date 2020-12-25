require('./bootstrap');
window.Vue = require('vue');

import 'es6-promise/auto';
import store from './store'

Vue.component('safepdf-component', require('./components/SaveAsPdfComponent.vue').default);
Vue.component('safeexcel-component', require('./components/SaveAsExcelComponent.vue').default);
Vue.component('power-component', require('./components/PowerComponent.vue').default);
Vue.component('datepicker-component', require('./components/DatePickerComponent.vue').default);


const app = new Vue({
    el: '#app',
    store,
    mounted(){
        this.$store.dispatch("getDataFromServer", null);
    }
});
