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
            <td>{{t.ges1}}</td>
            <td>{{t.ges2}}</td>
            <td>{{t.ges3}}</td>
            <td>{{t.ges5}}</td>
            <td>{{t.ges6}}</td>
            <td>{{t.ges7}}</td>
            <td>{{t.ges9}}</td>
            <td>{{t.ges10}}</td>
            <td>{{t.ges14}}</td>
            <td>{{t.ges16}}</td>
            <td>{{t.tec13}}</td>
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
        }
    }
}
</script>
