window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window._ = require('lodash');

window.Vue = require('vue');

import 'es6-promise/auto';

import store from './store'

Vue.component('main-component', require('./components/MainComponent.vue').default);
Vue.component('generation-component', require('./components/GenerationComponent.vue').default);
Vue.component('water-component', require('./components/WaterComponent.vue').default);
Vue.component('fuel-component', require('./components/FuelComponent.vue').default);


//  График Генерация/ПБР
Vue.component('powerlinecont-chart', require('./components/PowerLineChart.vue').default);
Vue.component('powerline-chart', require('./components/Chart.vue').default);


//  График Температуры
Vue.component('cgmslinecont-chart', require('./components/CgmsLineChart.vue').default);
Vue.component('cgmsline-chart', require('./components/ChartCgms.vue').default);
// Vue.component('linecont-chart', require('./components/ChartContainer.vue').default);


const app = new Vue({
    el: '#main',
    store,
    created() {
         this.$store.dispatch("getDataFromServer");
         this.$store.dispatch("getPbr");
         this.$store.dispatch("getPower");
         this.$store.dispatch("getFuel");
         this.$store.dispatch("getCgms");

         window.setInterval(() => {
            this.$store.dispatch("getDataFromServer");
        }, 10000);
	}
});

