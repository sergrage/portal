<template>
  <div class="container">
    <line-chart
      v-if="loaded"
      :chartdata="chartdata"
      />
  </div>
</template>

<script>
import LineChart from './Chart.vue'

export default {
  name: 'LineChartContainer',
  components: { LineChart },
  data: () => ({
    loaded: false,
    chartdata: null
  }),
  async mounted () {
    this.loaded = false
    try {
      this.chartdata = this.$store.state.pbr
      this.loaded = true
    } catch (e) {
      console.error(e)
    }
  }
}
</script>