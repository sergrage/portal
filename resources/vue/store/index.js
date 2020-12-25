import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        powerData: [],
        dateForRequest: ''
    },
    actions: {
        getDataFromServer(context, payload){
            axios.get('api/power-json', { params: { dateTo:payload }}).then((response) =>{
                context.commit('changePowerData', response.data.result);
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
        }
    },
    mutations: {
        changePowerData(state, payload){
            state.powerData = payload;
        },
        changeTimeDate(state, payload){
            state.dateForRequest = payload;
        },
    }
})

