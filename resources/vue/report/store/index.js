import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        dateForRequest: '',
        fileLinks: [],
        showLinks: false,
        message: 'За данную дату отчетов нет',
    },
    actions: {
        getDataFromServer(context, payload){
            axios.get('/api/dailyReport', { params: {dateTo : payload.dateTo}} ).then((response) =>{
               
               if(response.data.length != 0) {
                    context.commit('SET_FILE_LINKS', response.data);
                    context.commit('SET_SHOW_LINKS', true);
                } 
                    console.log(context.state.fileLinks);
                    console.log(context.state.showLinks);
            });
        },
    },
    getters: {

    },
    mutations: {
        SET_DATE_FOR_REQUEST(state, payload){
            state.dateForRequest = payload;
        },
        SET_FILE_LINKS(state, payload){
            state.fileLinks = payload;
        },
        SET_SHOW_LINKS(state, payload){
            state.showLinks = payload;
        },
    }
})

