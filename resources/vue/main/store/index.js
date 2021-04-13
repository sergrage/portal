import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        power: 0,
        sumPower: 0,
        pbr: [],
        powerForDay: [],
        temperature: 0,
        generation: {},
        loaded: false
    },
    actions: {
        getDataFromServer(context, payload){
            axios.get('/api/generation').then((response) =>{
                context.commit('changePower', response.data['generation']);
                context.commit('changeTemperature', response.data['temperature']);
                context.commit('changeGeneration', response.data);
                context.commit('changeLoaded', true);
            }).catch((error)=>{
                console.log(error.response.data)
            });
        },
        getPower(context, payload){
            axios.get('/api/powerForDay').then((response) => {
                context.commit('changePowerForDay', response.data['result']);
            });
        },
        getPbr(context, payload){
            axios.get('/api/pbrForDay').then((response) => {
                context.commit('changePbr', response.data['result']);
            });
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
        changePbr(state, payload){
            state.pbr = payload;
        },
        changeLoaded(state, payload){
            state.loaded = payload;
        },
        changePowerForDay(state, payload){
            state.powerForDay = payload;
        },

    }
})

