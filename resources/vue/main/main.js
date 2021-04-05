window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');

import 'es6-promise/auto';
import store from './store'



Vue.component('main-component', require('./components/MainComponent.vue').default);
Vue.component('generation-component', require('./components/GenerationComponent.vue').default);
Vue.component('water-component', require('./components/WaterComponent.vue').default);
Vue.component('fuel-component', require('./components/FuelComponent.vue').default);

const app = new Vue({
    el: '#main',
    store,
    created() {
         this.$store.dispatch("getDataFromServer");
	},
    mounted(){
    	window.setInterval(() => {
		    this.$store.dispatch("getDataFromServer");
		}, 5000)
        
    }
});



// mounted: function () {
//   window.setInterval(() => {
//     this.getNotifications()
//   }, 30000)
// }