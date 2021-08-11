<template>
    <div class="" style="margin: 0px auto;">
        <div class="col-12">
        <ul class="nav nav-tabs pb-5" id="nav">
          <li class="nav-item">
            <a class="nav-link active" href="#" data-show="1" @click.prevent="show($event)">Гирвасское водохранилище</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-show="2" @click.prevent="show($event)">Сандальское водохранилище</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-show="3" @click.prevent="show($event)">Сегозарское Водохранилище</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-show="4" @click.prevent="show($event)">Выгозерское-Ондское водохранилище</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-show="5" @click.prevent="show($event)">Юшкозерское водохранилище</a>
          </li>
        </ul>
    </div>
    <div class="col-12 pb-5" v-if="chartToShow == 1">
        <girvaslinecont-chart></girvaslinecont-chart>
    </div>
    <div class="col-12 pb-5" v-if="chartToShow == 2">
        <sandallinecont-chart></sandallinecont-chart>
    </div>
    <div class="col-12 pb-5" v-if="chartToShow == 3">
        <segozerolinecont-chart></segozerolinecont-chart>
    </div>
    <div class="col-12 pb-5" v-if="chartToShow == 4">
         <vigozerolinecont-chart></vigozerolinecont-chart>
    </div>
    <div class="col-12 pb-5" v-if="chartToShow == 5">
        <ushkozerolinecont-chart></ushkozerolinecont-chart>
    </div>
    </div>

</template>

<script>
export default {
    computed: {
        chartToShow() {
            return this.$store.state.chartToShow; 
        }        
    },
    methods: {
        show(event) {
            console.log('Привет')
            console.log(this.chartToShow)
            var chart = event.target.getAttribute('data-show')
            var nav = document.getElementById('nav')

            for (var i = 0; i < nav.querySelectorAll('.nav-link').length; i++) {
                nav.querySelectorAll('.nav-link')[i].classList.remove('active');
            }
            // [].slice.call(  nav.querySelectorAll('.nav-link') ).forEach(function(tab) { 
            //     tab.classList.remove('active')
            // });

            // nav.querySelectorAll('.nav-link').forEach(tab => {
            //    tab.classList.remove('active')
            // })
            // Array.from(nav.querySelectorAll('.nav-link')).forEach(tab => {
            //    tab.classList.remove('active')
            // })
            event.target.classList.add('active')
            this.$store.commit('SET_CHART_TO_SHOW',chart)
        }
    }
}
</script>


<style scoped>

</style>