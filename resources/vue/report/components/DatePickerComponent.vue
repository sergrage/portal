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
        showList() {
            return this.$store.state.showLinks;
        },
        fileList() {
            return this.$store.state.fileLinks;
        },
        emptyMessage() {
            return this.$store.state.message;
        }
    },
    methods: {
        change() {
            this.$store.commit('SET_SHOW_LINKS', false)
            this.$store.dispatch("getDataFromServer", { dateTo :  this.time1 })
        },
        download() {
             this.$store.commit('SET_SHOW_LINKS', false)
        }
    }
};
</script>

<template>
    <div class="">
        <div class="datepicker">
            <date-picker v-model="time1" valueType="format" placeholder="Ежедневный отчет" @change="change()"></date-picker>
        </div>
        <div class="messageBox" v-if="showList">
            <ul class="list-group" v-if="showList">
                <li v-for="(link, name) in fileList" class="list-group-item">
                    <a :href="link" target="_blank" @click="download()">{{name}}</a>
                </li>
            </ul>
            <span v-else> {{emptyMessage}} </span>
        </div>
    </div>
</template>


<style scoped>
.datepicker {
    vertical-align: bottom;
    line-height: 40px;
    padding-left: 10px;
}

.messageBox {
    position: absolute;
    border:  1px solid black;
    background: #ffffff;
}

</style>
