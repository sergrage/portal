require('./bootstrap');
window.Vue = require('vue');

import 'es6-promise/auto';
import store from './store'

// import VueHtml2pdf from 'vue-html2pdf'
// Vue.use(VueHtml2pdf)


Vue.component('safepdf-component', require('./components/SaveAsPdfComponent.vue').default);
Vue.component('safeexcel-component', require('./components/SaveAsExcelComponent.vue').default);

Vue.component('power-component', require('./components/PowerComponent.vue').default);
Vue.component('level-component', require('./components/LevelComponent.vue').default);
Vue.component('temperature-component', require('./components/TemperatureComponent.vue').default);
Vue.component('watertemperature-component', require('./components/WaterTemperatureComponent.vue').default);
Vue.component('cgms-component', require('./components/CgmsComponent.vue').default);
Vue.component('reservoirs-component', require('./components/ReservoirsComponent.vue').default);

Vue.component('yearselect-component', require('./components/YearSelectComponent.vue').default);
Vue.component('datepicker-component', require('./components/DatePickerComponent.vue').default);
Vue.component('reservoirselect-component', require('./components/ReservoirsSelectComponent.vue').default);


Vue.component('reservoirscharts-component', require('./components/Charts/ReservoirsChartTabsComponent.vue').default);


//  График уровней ВДХ Гирвас
Vue.component('girvaslinecont-chart', require('./components/Charts/GirvasChartContainer.vue').default);
Vue.component('girvasline-chart', require('./components/Charts/GirvasChart.vue').default);
//  График уровней ВДХ Сандал
Vue.component('sandallinecont-chart', require('./components/Charts/SandalChartContainer.vue').default);
Vue.component('sandalline-chart', require('./components/Charts/SandalChart.vue').default);
//  График уровней ВДХ Чегозеро
Vue.component('segozerolinecont-chart', require('./components/Charts/SegozeroChartContainer.vue').default);
Vue.component('segozeroline-chart', require('./components/Charts/SegozeroChart.vue').default);
//  График уровней ВДХ Выгозеро
Vue.component('vigozerolinecont-chart', require('./components/Charts/VigozeroChartContainer.vue').default);
Vue.component('vigozeroline-chart', require('./components/Charts/VigozeroChart.vue').default);
//  График уровней ВДХ Юшкозеро
Vue.component('ushkozerolinecont-chart', require('./components/Charts/UshkozeroChartContainer.vue').default);
Vue.component('ushkozeroline-chart', require('./components/Charts/UshkozeroChart.vue').default);

// Vue.component('pdf-component', require('./components/SaveAsPdfVueComponent').default);


const app = new Vue({
    el: '#app',
    store,
    created(){
    	let year = new Date().getFullYear()
        this.$store.commit('setCurrentUrl', window.location.pathname)
        

        if(window.location.pathname == '/reservoirCharts') {

        	this.$store.dispatch("getDataForReservoirCharts")
            this.$store.dispatch("getReservoirVolume", this.$store.state.selectReservoir)

        } else if(window.location.pathname == '/levels'){
            this.$store.dispatch("getWatersData")
        } else {
        	this.$store.dispatch("getDataFromServer", { dateTo : null, reservoir: null })
        }
    }
});
