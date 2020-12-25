<template>
    <table class="table table-striped table-sm table-bordered">
        <thead>
        <tr align="center">
            <th scope="col">Время</th>
            <th scope="col" colspan="2">ГЭС-1</th>
            <th scope="col" colspan="2">ГЭС-2</th>
            <th scope="col" colspan="2">ГЭС-3</th>
            <th scope="col" colspan="2">ГЭС-5</th>
            <th scope="col" colspan="2">ГЭС-6</th>
            <th scope="col" colspan="2">ГЭС-7</th>
            <th scope="col" colspan="2">ГЭС-9</th>
            <th scope="col" colspan="2">ГЭС-10</th>
            <th scope="col" colspan="2">ГЭС-14</th>
            <th scope="col" colspan="2">ГЭС-16</th>
            <th scope="col" colspan="2">ТЭЦ-13</th>
        </tr>
        </thead>
        <tbody class="text-center">
        <tr>
            <td></td>
            <td class="blue">ПБР</td>
            <td class="orange">ОИК</td>
            <td class="blue">ПБР</td>
            <td class="orange">ОИК</td>
            <td class="blue">ПБР</td>
            <td class="orange">ОИК</td>
            <td class="blue">ПБР</td>
            <td class="orange" >ОИК</td>
            <td class="blue">ПБР</td>
            <td class="orange">ОИК</td>
            <td class="blue">ПБР</td>
            <td class="orange">ОИК</td>
            <td class="blue">ПБР</td>
            <td class="orange">ОИК</td>
            <td class="blue">ПБР</td>
            <td class="orange">ОИК</td>
            <td class="blue">ПБР</td>
            <td class="orange">ОИК</td>
            <td class="blue">ПБР</td>
            <td class="orange">ОИК</td>
            <td class="blue">ПБР</td>
            <td class="orange">ОИК</td>
        </tr>
        <tr class="center" v-for="(p, index) in power">

            <th scope="row">{{ index }}:00</th>
            <td class="blue">{{ p[0].ges1 }}</td>
            <td class="orange">{{ p[1].ges1 }}</td>
            <td class="blue">{{ p[0].ges2 }}</td>
            <td class="orange">{{ p[1].ges2 }}</td>
            <td class="blue">{{ p[0].ges3 }}</td>
            <td class="orange">{{ p[1].ges3 }}</td>
            <td class="blue">{{ p[0].ges5 }}</td>
            <td class="orange">{{ p[1].ges5 }}</td>
            <td class="blue">{{ p[0].ges6 }}</td>
            <td class="orange">{{ p[1].ges6 }}</td>
            <td class="blue">{{ p[0].ges7 }}</td>
            <td class="orange">{{ p[1].ges7 }}</td>
            <td class="blue">{{ p[0].ges9 }}</td>
            <td class="orange">{{ p[1].ges9 }}</td>
            <td class="blue">{{ p[0].ges10 }}</td>
            <td class="orange">{{ p[1].ges10 }}</td>
            <td class="blue">{{ p[0].ges14 }}</td>
            <td class="orange">{{ p[1].ges14 }}</td>
            <td class="blue">{{ p[0].ges16 }}</td>
            <td class="orange">{{ p[1].ges16 }}</td>
            <td class="blue">{{ p[0].tec13 }}</td>
            <td class="orange">{{ p[1].tec13 }}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    computed: {
        power() {
            return this.$store.state.powerData;
        },
        date() {
            return this.$store.state.dateForRequest;
        }
    }
}
</script>
