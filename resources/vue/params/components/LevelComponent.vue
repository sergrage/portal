<template>
    <table class="table table-striped table-sm table-bordered">
        <thead>
        <tr align="center">
            <th scope="col" rowspan="3" style="vertical-align: middle;">Час</th>
            <th scope="col" colspan="6">КСГЭС</th>
            <th scope="col" colspan="13">КВГЭС</th>
            <th scope="col" colspan="11">ККГЭС</th>
        </tr>
        <tr align="center">
            <th scope="col" rowspan="2">Гирвас</th>
            <th scope="col" colspan="2">ГЭС-2</th>
            <th scope="col" rowspan="2">Х/В старое русло</th>
            <th scope="col" colspan="2">ГЭС-1</th>
            <th scope="col" rowspan="2">Сегозеро</th>
            <th scope="col" rowspan="2">пл. 21</th>
            <th scope="col" colspan="3">ГЭС-7</th>
            <th scope="col" rowspan="2">пл. 25</th>
            <th scope="col" colspan="2">ГЭС-3</th>
            <th scope="col" rowspan="2">пл. 27</th>
            <th scope="col" colspan="2">ГЭС-5</th>
            <th scope="col" colspan="2">ГЭС-6</th>
            <th scope="col" colspan="2">ГЭС-16</th>
            <th scope="col" colspan="3">ГЭС-14</th>
            <th scope="col" colspan="3">ГЭС-10</th>
            <th scope="col" colspan="3">ГЭС-9</th>
        </tr>
        <tr align="center">
            <th scope="col">Вдх.</th>
            <th scope="col">Х/В</th>
            <th scope="col">ВБ</th>
            <th scope="col">Х/В</th>
            <th scope="col">р/в</th>
            <th scope="col">ВБ</th>
            <th scope="col">Д/В</th>
            <th scope="col">р/в</th>
            <th scope="col">ВБ</th>
            <th scope="col">ВБ</th>
            <th scope="col">Х/В</th>
            <th scope="col">ВБ</th>
            <th scope="col">Х/В</th>
            <th scope="col">ВБ</th>
            <th scope="col">Х/В</th>
            <th scope="col">р/в</th>
            <th scope="col">ВБ</th>
            <th scope="col">Х/В</th>
            <th scope="col">р/в</th>
            <th scope="col">ВБ</th>
            <th scope="col">Х/В</th>
            <th scope="col">р/в</th>
            <th scope="col">Вдх.</th>
            <th scope="col">Х/В</th>
        </tr>
        <tr align="center">
            <th></th>
            <th></th>
            <th></th>
            <th scope="col">м<sup>3</sup>/с</th>
            <th scope="col">м<sup>3</sup>/с</th>
            <th scope="col"></th>
            <th scope="col">м<sup>3</sup>/с</th>
            <th scope="col">м<sup>3</sup>/с</th>
            <th scope="col">м<sup>3</sup>/с</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">м<sup>3</sup>/с</th>
            <th scope="col">м<sup>3</sup>/с</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">м<sup>3</sup>/с</th>
            <th scope="col"></th>
            <th scope="col">м<sup>3</sup>/с</th>
            <th scope="col"></th>
            <th scope="col">м<sup>3</sup>/с</th>
            <th scope="col"></th>
            <th scope="col">м<sup>3</sup>/с</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">м<sup>3</sup>/с</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">м<sup>3</sup>/с</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">м<sup>3</sup>/с</th>
        </tr>
        </thead>
        <tbody class="text-center">
            <tr class="center" v-for="(w, index) in waters">
            <th scope="row">{{index}}:00</th>
            <td>-</td>
            <td>{{round(w.ges2Reservoir) }}</td>
            <td>{{round(w.idleGes2) }}</td>
            <td>{{round(w.oldBed) }}</td>
            <td>-</td>
            <td>{{round(w.idleGes1) }}</td>
            <td>{{round(w.segozero) }}</td>
            <td>{{round(w.pl21) }}</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>{{round(w.pl25) }}</td>
            <td>-</td>
            <td>-</td>
            <td>{{round(w.pl27) }}</td>
            <td>-</td>
            <td>{{round(w.idleGes5) }}</td>
            <td>-</td>
            <td>{{round(w.idleGes6) }}</td>
            <td>-</td>
            <td>{{round(w.idleGes16) }}</td>
            <td>-</td>
            <td>-</td>
            <td>{{round(w.idleGes14) }}</td>
            <td>-</td>
            <td>-</td>
            <td>{{round(w.idleGes10) }}</td>
            <td>-</td>
            <td>-</td>
            <td>{{round(w.idleGes9) }}</td>

        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    computed: {
        waters() {
            return this.$store.state.waters;
        },
    },
    methods: {
          round(val, precision = 1) {
            if(typeof val == 'number') {
                return val.toFixed(precision);
            }
            return val;
        },
    }
}
</script>

<style scoped>
    .blue-color{
        color: blue;
        font-weight: 700; 
    }
</style>