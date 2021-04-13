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
            <td>{{round(t.ges1, 1) }}</td>
            <td>{{round(t.ges2, 1) }}</td>
            <td>{{round(t.ges3, 1) }}</td>
            <td>{{round(t.ges5, 1) }}</td>
            <td>{{round(t.ges6, 1) }}</td>
            <td>{{round(t.ges7, 1) }}</td>
            <td>{{round(t.ges9, 1) }}</td>
            <td>{{round(t.ges10, 1) }}</td>
            <td>{{round(t.ges14, 1) }}</td>
            <td>{{round(t.ges16, 1) }}</td>
            <td>{{round(t.tec13, 1) }}</td>
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
        round(val, precision) {
            if(typeof val == 'number') {
                return val.toFixed(precision);
            }
            return val;
        }
    }
}
</script>
