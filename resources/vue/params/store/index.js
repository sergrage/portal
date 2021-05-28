import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        tableData: [],
        chartsData: {},
        dateForRequest: '',
        url: '',
        selectYear: new Date().getFullYear(),
        selectReservoir: 'ReservoirGirvas',
        cgmsYears: [],
        loadedGirvas: false,
        reservoirs: {
            ReservoirGirvas: 'Гирвасское водохранилище',
            ReservoirSandal: 'Сандальское водохранилище',
            ReservoirSegozero: 'Сегозерское водохранилище',
            ReservoirUshkozero: 'Юшкозерское водохранилище',
            ReservoirVigozero: 'Выгозерское водохранилище',
        },
    },
    actions: {

        getDataForReservoirCharts(context, payload) {
                axios.get('/api/reservoirCharts').then((response) =>{
                context.commit('SET_CHARTS_DATA', response.data);
                // console.log(context.state.chartsData.avg);
                context.commit('SET_LOADED_GIRVAS', true)
            });

            
        },
        getDataFromServer(context, payload){
            console.log('payload', payload);
            axios.get(this.getters.apiLink, { params: {dateTo : payload.dateTo, reservoir: payload.reservoir}} ).then((response) =>{
                // console.log(response);
                context.commit('changeData', response.data.result);
                if(response.data.years) {
                    context.commit('SET_CGMSYEARS', response.data.years);
                }
            });
        },
        createPdfFile(context, payload){
            let config = {
                responseType: 'blob',
                params: { dateTo:payload }
            };
            axios.get('/power-pdf', config).then((response)=>{
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', 'генерация.pdf'); //or any other extension
                document.body.appendChild(link);
                link.click();
                $('.modal').modal('hide');
            }).catch((error)=>{
                console.log(error.response.data)
            });
        }
    },
    getters: {
        downloadLinkPdf(state) {
            return state.dateForRequest ? "/power-pdf/"+state.dateForRequest : "/power-pdf";
        },
        downloadLinkExcel(state){
            if(state.url == '/power') {
                return state.url + "-excel/" + state.dateForRequest;
            }
            if(state.url == '/cgms') {
                return state.url + "-excel/" + state.selectYear;
            }
            if(state.url == '/reservoir') {
                console.log(state.url + "-excel/" + state.selectYear + "/" + state.selectReservoir);
                return state.url + "-excel/" + state.selectYear+"/" + state.selectReservoir;
            }
            
        },
        apiLink(state) {
            return 'api'+ state.url + '-json';
        }
    },
    mutations: {
        changeData(state, payload){
            state.tableData = payload;
        },
        SET_CHARTS_DATA(state, payload){
            state.chartsData = payload;
        },
        changeTimeDate(state, payload){
            state.dateForRequest = payload;
        },
        setCurrentUrl(state, payload) {
            state.url = payload;
        },
        SET_CGMSYEARS(state, payload) {
            state.cgmsYears = payload;
        },
        SET_SELECT_YEAR(state, payload) {
            state.selectYear = payload;
        },
        SET_RESERVOIR(state, payload) {
            state.selectReservoir = payload;
        },
        SET_LOADED_GIRVAS(state, payload) {
            state.loadedGirvas = payload;
        },
    }
})

