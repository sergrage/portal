<script>

export default {
  extends: VueChartJs.Line,
  data() {
    return {
      chartData: {
        // type: 'line',
        labels:[0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23],
        datasets: [
          {
            label: 'ПБР',
            borderColor: '#ff0500',
            backgroundColor: '#ff0500',
            data: this.$store.state.pbr 
          },
          {
            label: 'Генерация',
            borderColor: '#007bff',
            backgroundColor: '#007bff',
            data: this.$store.state.powerForDay
          }

        ]
      },
      chartOptions : {
        title: {
          display: true,
          text: 'Суточная генерация филиала',
        },
        responsive: true,
        maintainAspectRatio: false,
        elements: {
          line: {
            fill: false
          }        
        },
        scales: {
         x: {
            display: true,
            title: {
              display: true,
              text: 'Часы'
            }
          },
          y: {
            display: true,
            title: {
              display: true,
              text: 'Мощность, МВт'
            }
          },
        }
      }
    }
  },
  mounted () {
    this.renderChart(this.chartData, this.chartOptions)
    }
  }


</script>

