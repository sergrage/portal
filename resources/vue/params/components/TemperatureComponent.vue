<template>
    <table class="table table-striped table-sm table-bordered">
        <thead>
        <tr align="center">
            <th scope="col">Время</th>
            <th scope="col">ГЭС-1</th>
            <th scope="col">ГЭС-2</th>
            <th scope="col">ГЭС-3</th>
            <th scope="col">ГЭС-5</th>
            <th scope="col">ГЭС-6</th>
            <th scope="col">ГЭС-7</th>
            <th scope="col">ГЭС-9</th>
            <th scope="col">ГЭС-10</th>
            <th scope="col">ГЭС-14</th>
            <th scope="col">ГЭС-16</th>
            <th scope="col">ТЭЦ-13</th>
        </tr>
        </thead>
        <tbody class="text-center">
        <tr class="center" v-for="(t, index) in temperature">
            <th scope="row">{{index}}:00</th>
            <td :class="color(t.ges1)">{{round(t.ges1) }}</td>
            <td :class="color(t.ges2)">{{round(t.ges2) }}</td>
            <td :class="color(t.ges3)">{{round(t.ges3) }}</td>
            <td :class="color(t.ges5)">{{round(t.ges5) }}</td>
            <td :class="color(t.ges6)">{{round(t.ges6) }}</td>
            <td :class="color(t.ges7)">{{round(t.ges7) }}</td>
            <td :class="color(t.ges9)">{{round(t.ges9) }}</td>
            <td :class="color(t.ges10)">{{round(t.ges10) }}</td>
            <td :class="color(t.ges14)">{{round(t.ges14) }}</td>
            <td :class="color(t.ges16)">{{round(t.ges16) }}</td>
            <td :class="color(t.tec13)">{{round(t.tec13) }}</td>
        </tr>
        </tbody>
    </table>

</template>

<script>
export default {
    computed: {
        temperature() {
            return this.$store.state.tableData;
        },
        date() {
            return this.$store.state.dateForRequest;
        },
        

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