import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
    	fuel : {
    		form_submit: false,
    		errors: {

    		},
    		success : false
    	}
    },
    actions: {
    	postFuelData(context, payload) {
    		console.log('Поля', payload);
    		axios.post('/api/fuel', payload).then(response => {
    			context.commit('SET_FUEL_FORM_SUBMIT', false);
    			context.commit('SET_FORM_SUCCESS', true);
    		}).catch( error => {
    			if(error.response.status === 422) {
                    context.commit('SET_FUEL_ERRORS', error.response.data.errors);
                }
                context.commit('SET_FUEL_FORM_SUBMIT', false);
            });
    	}
    },
    getters: {

    },
    mutations: {
    	SET_FUEL_FORM_SUBMIT(state, payload) {
    		state.fuel.form_submit = payload;
    	},
    	SET_FUEL_ERRORS(state, payload) {
    		state.fuel.errors = payload;
    	},
    	SET_FORM_SUCCESS(state, payload) {
    		state.fuel.success = payload;
    	},

    }
})

