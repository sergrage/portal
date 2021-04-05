require('./bootstrap');
window.Vue = require('vue');

import 'es6-promise/auto';
import store from './store'

// import VueHtml2pdf from 'vue-html2pdf'
// Vue.use(VueHtml2pdf)


Vue.component('safepdf-component', require('./components/SaveAsPdfComponent.vue').default);
Vue.component('safeexcel-component', require('./components/SaveAsExcelComponent.vue').default);
Vue.component('power-component', require('./components/PowerComponent.vue').default);
Vue.component('temperature-component', require('./components/TemperatureComponent.vue').default);
Vue.component('datepicker-component', require('./components/DatePickerComponent.vue').default);
// Vue.component('pdf-component', require('./components/SaveAsPdfVueComponent').default);


const app = new Vue({
    el: '#app',
    store,
    created(){
        this.$store.commit('setCurrentUrl', window.location.pathname)
        this.$store.dispatch("getDataFromServer", null);
    }
});
