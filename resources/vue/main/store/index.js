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
        loaded: false,
        fuels: {}
    },
    actions: {
        getDataFromServer(context, payload){
            axios.get('/api/generation').then((response) =>{
                context.commit('SET_POWER', response.data['generation']);
                context.commit('SET_TEMPERATURE', response.data['temperature']);
                context.commit('SET_GENERATION', response.data);
                context.commit('SET_LOADED', true);
            }).catch((error)=>{
                console.log(error.response.data)
            });
        },
        getPower(context, payload){
            axios.get('/api/powerForDay').then((response) => {
                context.commit('SET_POWER_FOR_DAY', response.data['result']);
            });
        },
        getPbr(context, payload){
            axios.get('/api/pbrForDay').then((response) => {
                context.commit('SET_PBR', response.data['result']);
            });
        },
        getFuel(context, payload){
            axios.get('/api/getFuel').then((response) => {
                context.commit('SET_FUEL', response.data['result']);
                console.log(response.data['result']);
            });
        },
    },
    getters: {

    },
    mutations: {
        SET_GENERATION(state, payload){
            state.generation = payload;
        },
        SET_POWER(state, payload){
            state.power = payload;
        },
        SET_TEMPERATURE(state, payload){
            state.temperature = payload;
        },
        SET_PBR(state, payload){
            state.pbr = payload;
        },
        SET_LOADED(state, payload){
            state.loaded = payload;
        },
        SET_POWER_FOR_DAY(state, payload){
            state.powerForDay = payload;
        },
        SET_FUEL(state, payload){
            state.fuels = payload;
        },

    }
})

