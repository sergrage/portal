import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        power: 0,
        temperature: 0,
        generation: {},
    },
    actions: {
        getDataFromServer(context, payload){
            axios.get('/api/generation').then((response) =>{
                context.commit('changePower', response.data['generation']);
                context.commit('changeTemperature', response.data['temperature']);
                context.commit('changeGeneration', response.data);
            }).catch((error)=>{
                console.log(error.response.data)
            });
        },
        getPbr(context, payload){

        }
    },
    getters: {

    },
    mutations: {
        changeGeneration(state, payload){
            state.generation = payload;
        },
        changePower(state, payload){
            state.power = payload;
        },
        changeTemperature(state, payload){
            state.temperature = payload;
        },

    }
})

