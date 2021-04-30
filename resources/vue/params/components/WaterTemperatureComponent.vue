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
        </tr>
        </thead>
        <tbody class="text-center">
        <tr class="center" v-for="(t, index) in waterTemperature">
            <th scope="row">{{index}}:00</th>
            <td :class="color(t.wges1)">{{round(t.wges1) }}</td>
            <td :class="color(t.wges2)">{{round(t.wges2) }}</td>
            <td :class="color(t.wges3)">{{round(t.wges3) }}</td>
            <td :class="color(t.wges5)">{{round(t.wges5) }}</td>
            <td :class="color(t.wges6)">{{round(t.wges6) }}</td>
            <td :class="color(t.wges7)">{{round(t.wges7) }}</td>
            <td :class="color(t.wges9)">{{round(t.wges9) }}</td>
            <td :class="color(t.wges10)">{{round(t.wges10) }}</td>
            <td :class="color(t.wges14)">{{round(t.wges14) }}</td>
            <td :class="color(t.wges16)">{{round(t.wges16) }}</td>
        </tr>
        </tbody>
    </table>

</template>

<script>
export default {
    computed: {
        waterTemperature() {
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