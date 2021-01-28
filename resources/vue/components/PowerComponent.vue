<template>
    <table class="table table-striped table-sm table-bordered">
        <thead>
        <tr align="center">
            <th scope="col">Время</th>
            <th scope="col" colspan="3">ГЭС-1</th>
            <th scope="col" colspan="3">ГЭС-2</th>
            <th scope="col" colspan="3">ГЭС-3</th>
            <th scope="col" colspan="3">ГЭС-5</th>
            <th scope="col" colspan="3">ГЭС-6</th>
            <th scope="col" colspan="3">ГЭС-7</th>
            <th scope="col" colspan="3">ГЭС-9</th>
            <th scope="col" colspan="3">ГЭС-10</th>
            <th scope="col" colspan="3">ГЭС-14</th>
            <th scope="col" colspan="3">ГЭС-16</th>
            <th scope="col" colspan="3">ТЭЦ-13</th>
            <th scope="col" >МГЭС</th>
        </tr>
        </thead>
        <tbody class="text-center">
        <tr>
            <td></td>
            <td class="blue">ПБР</td>
            <td class="orange">ОИК</td>
            <td>КУ</td>
            <td class="blue">ПБР</td>
            <td class="orange">ОИК</td>
            <td>КУ</td>
            <td class="blue">ПБР</td>
            <td class="orange">ОИК</td>
            <td>КУ</td>
            <td class="blue">ПБР</td>
            <td class="orange" >ОИК</td>
            <td>КУ</td>
            <td class="blue">ПБР</td>
            <td class="orange">ОИК</td>
            <td>КУ</td>
            <td class="blue">ПБР</td>
            <td class="orange">ОИК</td>
            <td>КУ</td>
            <td class="blue">ПБР</td>
            <td class="orange">ОИК</td>
            <td>КУ</td>
            <td class="blue">ПБР</td>
            <td class="orange">ОИК</td>
            <td>КУ</td>
            <td class="blue">ПБР</td>
            <td class="orange">ОИК</td>
            <td>КУ</td>
            <td class="blue">ПБР</td>
            <td class="orange">ОИК</td>
            <td>КУ</td>
            <td class="blue">ПБР</td>
            <td class="orange">ОИК</td>
            <td>КУ</td>
            <td>КУ</td>
        </tr>
        <tr class="center" v-for="(p, index) in power">
            <th scope="row">{{ index }}:00</th>
            <td class="blue">{{ p[0].ges1 }}</td>
            <td class="orange">{{ p[1].ges1 }}</td>
            <td>{{ p[2].ges1 }}</td>
            <td class="blue">{{ p[0].ges2 }}</td>
            <td class="orange">{{ p[1].ges2 }}</td>
            <td>{{ p[2].ges2 }}</td>
            <td class="blue">{{ p[0].ges3 }}</td>
            <td class="orange">{{ p[1].ges3 }}</td>
            <td>{{ p[2].ges3 }}</td>
            <td class="blue">{{ p[0].ges5 }}</td>
            <td class="orange">{{ p[1].ges5 }}</td>
            <td>{{ p[2].ges5 }}</td>
            <td class="blue">{{ p[0].ges6 }}</td>
            <td class="orange">{{ p[1].ges6 }}</td>
            <td>{{ p[2].ges6 }}</td>
            <td class="blue">{{ p[0].ges7 }}</td>
            <td class="orange">{{ p[1].ges7 }}</td>
            <td>{{ p[2].ges7 }}</td>
            <td class="blue">{{ p[0].ges9 }}</td>
            <td class="orange">{{ p[1].ges9 }}</td>
            <td>{{ p[2].ges9 }}</td>
            <td class="blue">{{ p[0].ges10 }}</td>
            <td class="orange">{{ p[1].ges10 }}</td>
            <td>{{ p[2].ges10 }}</td>
            <td class="blue">{{ p[0].ges14 }}</td>
            <td class="orange">{{ p[1].ges14 }}</td>
            <td>{{ p[2].ges14 }}</td>
            <td class="blue">{{ p[0].ges16 }}</td>
            <td class="orange">{{ p[1].ges16 }}</td>
            <td>{{ p[2].ges16 }}</td>
            <td class="blue">{{ p[0].tec13 }}</td>
            <td class="orange">{{ p[1].tec13 }}</td>
            <td>{{ p[2].tec13 }}</td>
            <td>{{ p[2].mges }}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    computed: {
        power() {
            return this.$store.state.tableData;
        },
        date() {
            return this.$store.state.dateForRequest;
        }
    }
}
</script>
