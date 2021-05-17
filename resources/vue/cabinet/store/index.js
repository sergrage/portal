import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
    	form_submit: false,
    	errors: {},
   		success : false,
        message : {
            status: false,
            text: '' 
        },
        cgmsTemperature: 0,
        dateForRequest: '',
    },
    actions: {
    	postFuelData(context, payload) {
    		console.log('Поля', payload);
    		axios.post('/api/fuel', payload).then(response => {
    			context.commit('SET_FORM_SUBMIT', false);
    			context.commit('SET_FORM_SUCCESS', true);
    		}).catch( error => {
    			if(error.response.status === 422) {
                    context.commit('SET_ERRORS', error.response.data.errors);
                }
                context.commit('SET_FORM_SUBMIT', false);
            });
    	},
        postCgmsData(context, payload) {
            console.log('Поля', payload);
            axios.post('/api/cgms', { temperature:  payload.temperature, userName:  payload.userName, date:  payload.date }).then(response => {
                if(response.data.status) {
                    context.commit('SET_FORM_SUBMIT', false);
                    context.commit('SET_FORM_SUCCESS', true);
                }

                context.commit('SET_MESSAGE_TEXT', response.data.message);
                
                console.log(response.data);
            }).catch( error => {
                if(error.response.status === 422) {
                    context.commit('SET_ERRORS', error.response.data.errors);
                }
                context.commit('SET_FORM_SUBMIT', false);
            });
        },
    },
    getters: {

    },
    mutations: {
    	SET_FORM_SUBMIT(state, payload) {
    		state.form_submit = payload;
    	},
    	SET_ERRORS(state, payload) {
    		state.errors = payload;
    	},
    	SET_FORM_SUCCESS(state, payload) {
    		state.success = payload;
    	},
        SET_CGMS_TEMPERATURE(state, payload) {
            state.cgmsTemperature = payload;
        },
        SET_DATE_FOR_REQUEST(state, payload){
            state.dateForRequest = payload;
        },
        SET_MESSAGE_STATUS(state, payload){
            state.message.status = payload;
        },
        SET_MESSAGE_TEXT(state, payload){
            state.message.text = payload;
        },

    }
})

