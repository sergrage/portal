<template>
    <table class="table table-striped table-sm table-bordered">
        <thead>
        <tr align="center">
            <th scope="col">Дата</th>
            <th scope="col">январь</th>
            <th scope="col">февраль</th>
            <th scope="col">март</th>
            <th scope="col">апрель</th>
            <th scope="col">май</th>
            <th scope="col">июнь</th>
            <th scope="col">июль</th>
            <th scope="col">август</th>
            <th scope="col">сентябрь</th>
            <th scope="col">октябрь</th>
            <th scope="col">ноябрь</th>
            <th scope="col">декабрь</th>
        </tr>
        </thead>
        <tbody class="text-center">
            <tr class="center" v-for="(resRow,index) in reservoirs">
                <td>{{index+1}}</td>
                <td v-for="level in resRow" class="blue-color">{{ deleteEmpty(round(level,2))}}</td>
            </tr>
         </tbody>
    </table>

</template>

<script>
export default {
    computed: {
        reservoirs() {
            return this.$store.state.tableData; 
        }        
    },
    methods: {
        round(val, precision = 1) {
            if(typeof val == 'number') {
                return val.toFixed(precision);
            }
            return val;
        },
        color(val) {
            if(typeof val == 'number') {
                return (val > 0) ? 'red-color':'blue-color'
            }
        },
        deleteEmpty(val) {
            return (val == -100) ? '' : val; 
        }
    }
}
</script>


<style scoped>
    .red-color {
        color: red;
        font-weight: 700; 
    }

    .blue-color{
        color: blue;
        font-weight: 700; 
    }
</style>