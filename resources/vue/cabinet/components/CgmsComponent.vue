<template>
<div class="">

<h2>Температура в Петрозаводске по данным Карельского ЦГМС</h2>
<form @submit.prevent="submit_form()" v-if="!form_success">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCGMS">Ввод данных температуры Карельского ЦГМС</label>
            <input v-model="temperature" type="text" class="form-control" id="inputCGMS" placeholder="Температура ЦГМС">
            <div class="alert alert-danger" v-if="errors && errors.temperature">
                {{ errors.temperature[0] }}
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="inputCGMS">Поменять температуру за дату</label>
            <datepicker-component></datepicker-component>
        </div>
     </div>
    <button type="submit" :disabled="form_submit" class="btn btn-primary">Отправить</button>
</form>
<div class="alert alert-success" role="alert" v-else>
    {{ message }}
</div>

</div>
</template>

<script>
export default {
    props: ['userName'],
    data(){
        return {
            temperature: ''
        }
    },
    computed: {
        form_submit() {
            return this.$store.state.form_submit;
        },
        errors () {
            return this.$store.state.errors;
        },
        form_success() {
            return this.$store.state.success;
        },
        dateForRequest() {
            return this.$store.state.dateForRequest
        },
        message() {
            return this.$store.state.message.text
        }

    },
    methods: {
        submit_form() {
            this.$store.dispatch('postCgmsData', {temperature: this.temperature, userName: this.userName, date: this.dateForRequest})
        }
    }
}
</script>

<style>



</style>
