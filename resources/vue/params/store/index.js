import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        tableData: [],
        dateForRequest: '',
        url: '',
        cgmsYear: new Date().getFullYear(),
        cgmsYears: []
    },
    actions: {
        getDataFromServer(context, payload){
            console.log(payload);
            axios.get(this.getters.apiLink, { params:  {dateTo:payload } }).then((response) =>{
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
            return state.dateForRequest ? "/power-excel/"+state.dateForRequest : "/power-excel";
        },
        apiLink(state) {
            return 'api'+ state.url + '-json';
        }
    },
    mutations: {
        changeData(state, payload){
            state.tableData = payload;
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
        SET_CGMSYEAR(state, payload) {
            state.cgmsYear = payload;
        },
    }
})

