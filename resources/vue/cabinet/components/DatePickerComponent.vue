<script>
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';
import 'vue2-datepicker/locale/ru';

export default {
    components: { DatePicker },

    computed: {
        time1: {
            get() {
                return this.$store.state.dateForRequest
            },
            set(value){
                this.$store.commit('SET_DATE_FOR_REQUEST', value)
            }
        },
    }
};
</script>

<template>
    <div class="d-inline-block datepicker">
        <date-picker v-model="time1" valueType="format"></date-picker>
    </div>

</template>

<style scoped>
.datepicker {
    vertical-align: bottom;
    line-height: 40px;
    padding-left: 10px;
    margin-top: 29px;
}

</style>
