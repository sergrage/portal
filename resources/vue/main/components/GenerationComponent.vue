<template>
                <table class="table table-sm table-bordered">
                    <thead>
                    <tr style="background: #007bff;color: #fff;">
                        <th scope="col">Электростанция</th>
                        <th scope="col">Факт, МВт</th>
                        <th scope="col">ПБР, МВт</th>
                        <th scope="col">Отклонение</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr style="background: #ffebcd;">
                        <th>Каскад Сунских ГЭС</th>
                        <td>{{ ksges }}</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th>Кондопожская ГЭС</th>
                        <td>{{ generation.ges1 }}</td>
                        <td>{{ generation.ges1Pbr}}</td>
                        <td>{{ delta( generation.ges1, generation.ges1Pbr)}}</td>
                    </tr>
<!--                      <tr>
                        <td>Генератор №1</d>
                        <td>63,7 МВт</td>
                        <td>63,7</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>Генератор №2</td>
                        <td>63,7 МВт</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Генератор №3</td>
                        <td>63,7 МВт</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>  -->
                    <tr>
                        <th>Пальеозерская ГЭС</th>
                        <td>{{ generation.ges2 }}</td>
                        <td>{{ generation.ges2Pbr}}</td>
                        <td>{{ delta( generation.ges2, generation.ges2Pbr)}}</td>
                    </tr>
<!--                      <tr>
                        <td>Генератор №1</d>
                        <td>63,7 МВт</td>
                        <td>63,7</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>Генератор №2</td>
                        <td>63,7 МВт</td>
                        <td>-</td>
                        <td>-</td>
                    </tr> --> 
                    <tr style="background: #ffebcd;">
                        <th>Каскад Выгских ГЭС</th>
                        <td>{{ kvges }}</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th>Маткожненская ГЭС</th>
                        <td>{{ generation.ges3 }}</td>
                        <td>{{ generation.ges3Pbr}}</td>
                        <td>{{ delta( generation.ges3, generation.ges3Pbr) }}</td>
                    </tr>
<!--                      <tr>
                        <td>Генератор №1</d>
                        <td>63,7 МВт</td>
                        <td>63,7</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>Генератор №2</td>
                        <td>63,7 МВт</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Генератор №3</td>
                        <td>63,7 МВт</td>
                        <td>-</td>
                        <td>-</td>
                    </tr> --> 
                    <tr>
                        <th>Выгостровская ГЭС</th>
                        <td>{{ generation.ges5 }}</td>
                        <td>{{ generation.ges5Pbr}}</td>
                        <td>{{ delta( generation.ges5, generation.ges5Pbr) }}</td>
                    </tr>
<!--                      <tr>
                        <td>Генератор №1</d>
                        <td>63,7 МВт</td>
                        <td>63,7</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>Генератор №2</td>
                        <td>63,7 МВт</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>  -->
                    <tr>
                        <th>Беломорская ГЭС</th>
                        <td>{{ generation.ges6 }}</td>
                        <td>{{ generation.ges6Pbr}}</td>
                        <td>{{ delta( generation.ges6, generation.ges6Pbr) }}</td>
                    </tr>
<!--                      <tr>
                        <td>Генератор №1</d>
                        <td>63,7 МВт</td>
                        <td>63,7</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>Генератор №2</td>
                        <td>63,7 МВт</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Генератор №3</td>
                        <td>63,7 МВт</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>  -->
                    <tr>
                        <th>Палакоргская ГЭС</th>
                        <td>{{ generation.ges7 }}</td>
                        <td>{{ generation.ges7Pbr}}</td>
                        <td>{{ delta( generation.ges7, generation.ges7Pbr) }}</td>
                    </tr>
<!--                     <tr>
                        <td>Генератор №1</d>
                        <td>63,7 МВт</td>
                        <td>63,7</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>Генератор №2</td>
                        <td>63,7 МВт</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Генератор №3</td>
                        <td>63,7 МВт</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>  -->
                    <tr style="background: #ffebcd;">
                        <th>Каскад Кемских ГЭС</th>
                        <td>{{ kkges }}</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th>Путкинская ГЭС</th>
                        <td>{{ generation.ges9 }}</td>
                        <td>{{ generation.ges9Pbr}}</td>
                        <td>{{ delta( generation.ges9, generation.ges9Pbr) }}</td>
                    </tr>
<!--                      <tr>
                        <td>Генератор №1</d>
                        <td>63,7 МВт</td>
                        <td>63,7</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>Генератор №2</td>
                        <td>63,7 МВт</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Генератор №3</td>
                        <td>63,7 МВт</td>
                        <td>-</td>
                        <td>-</td>
                    </tr> -->
                    <tr>
                        <th>Подужемская ГЭС</th>
                        <td>{{ generation.ges10 }}</td>
                        <td>{{ generation.ges10Pbr}}</td>
                        <td>{{ delta( generation.ges10, generation.ges10Pbr) }}</td>
                    </tr>
<!--                      <tr>
                        <td>Генератор №1</d>
                        <td>63,7 МВт</td>
                        <td>63,7</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>Генератор №2</td>
                        <td>63,7 МВт</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>  -->
                    <tr>
                        <th>Кривопорожская ГЭС</th>
                        <td>{{ generation.ges14 }}</td>
                        <td>{{ generation.ges14Pbr}}</td>
                        <td>{{ delta( generation.ges14, generation.ges14Pbr)}}</td>
                    </tr>
<!--                      <tr>
                        <td>Генератор №1</d>
                        <td>63,7 МВт</td>
                        <td>63,7</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>Генератор №2</td>
                        <td>63,7 МВт</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Генератор №3</td>
                        <td>63,7 МВт</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Генератор №4</td>
                        <td>63,7 МВт</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>  -->
                    <tr>
                        <th>Юшкозерская ГЭС</th>
                        <td>{{ generation.ges16 }}</td>
                        <td>{{ generation.ges16Pbr}}</td>
                        <td>{{ delta( generation.ges16, generation.ges16Pbr)}}</td>
                    </tr>
<!--                   <tr>
                        <td>Генератор №1</d>
                        <td>63,7 МВт</td>
                        <td>63,7</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>Генератор №2</td>
                        <td>63,7 МВт</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>  -->
                    <tr style="background: #ffebcd;">
                        <th> Петрозаводская ТЭЦ</th>
                        <td>{{ generation.tec13 }}</td>
                        <td>{{ generation.tec13Pbr}}</td>
                        <td>{{ delta(generation.tec13, generation.tec13Pbr)}}</td>
                    </tr>
<!--                    <tr>
                        <td>Генератор №1</d>
                        <td>63,7 МВт</td>
                        <td>63,7</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>Генератор №2</td>
                        <td>63,7 МВт</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Генератор №3</td>
                        <td>63,7 МВт</td>
                        <td>-</td>
                        <td>-</td>
                    </tr> -->
                    </tbody>
                </table>
</template>

<script>
export default {
    computed: {
    	generation() {
    		return this.$store.state.generation;
    	},
    	ksges() {
    		return this.generation.ges1 + this.generation.ges1;
    	},
    	kvges() {
    		return this.generation.ges3 + this.generation.ges5 + this.generation.ges6 + this.generation.ges7;
    	},
   	  	kkges() {
    		return this.generation.ges9 + this.generation.ges10 + this.generation.ges14 + this.generation.ges16;
    	}, 
    },
    methods: {
    	delta(power, pbr) {
    		return (power - pbr).toFixed(1);
    	}
    }
}
</script>

<style>



</style>
