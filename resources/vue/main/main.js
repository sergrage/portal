window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');

import 'es6-promise/auto';

import store from './store'

Vue.component('main-component', require('./components/MainComponent.vue').default);
Vue.component('generation-component', require('./components/GenerationComponent.vue').default);
Vue.component('water-component', require('./components/WaterComponent.vue').default);
Vue.component('fuel-component', require('./components/FuelComponent.vue').default);



Vue.component('linecont-chart', require('./components/PowerLineChart.vue').default);
Vue.component('line-chart', require('./components/Chart.vue').default);
// Vue.component('linecont-chart', require('./components/ChartContainer.vue').default);


const app = new Vue({
    el: '#main',
    store,
    created() {
         this.$store.dispatch("getDataFromServer");
         this.$store.dispatch("getPbr");
         this.$store.dispatch("getPower");
	},
    mounted(){
    	window.setInterval(() => {
		    this.$store.dispatch("getDataFromServer");
		}, 10000)
        
    }
});

