<script>

export default {
  extends: VueChartJs.Line,
  data() {
    return {
      chartData: {
        // type: 'line',
        labels: this.$store.state.chartsData.date,
        interaction: {
      intersect: false,
    },
        datasets: [
          {
            label: 'Годовое',
            borderColor: 'rgb(255, 0, 0)',
            backgroundColor: 'rgba(255, 0, 0, 0.2)',
            pointRadius: 1,
            borderWidth: 2,
            data: this.$store.state.chartsData.lastVigozero,
          },
          {
            label: 'УМО',
            borderColor: 'rgb(112, 48, 160)',
            backgroundColor: 'rgb(0, 0, 0)',
            borderDash: [5, 5],
            data: this.$store.state.chartsData.umoVigozero,
            pointRadius: 0,
            borderWidth: 1,
          },
          {
            label: 'НПУ',
            borderColor: 'rgb(0, 176, 240)',
            backgroundColor: 'rgb(0, 176, 240)',
            borderDash: [5, 5],
            data: this.$store.state.chartsData.npuVigozero,
            pointRadius: 0,
            borderWidth: 1,
          },
          {
            label: 'ФПУ',
            borderColor: 'rgb(250, 0, 0)',
            backgroundColor: 'rgb(250, 192, 144)',
            borderDash: [5, 5],
            data: this.$store.state.chartsData.fpuVigozero,
            pointRadius: 0,
            borderWidth: 1,
          },
          {
            label: 'Минимальное',
            borderColor: 'rgb(112, 48, 160)',
            backgroundColor: 'rgb(255, 255, 255)',
            data: this.$store.state.chartsData.minVigozero,
            pointRadius: 0,
            fill: true,
            borderWidth: 0.5,
          },
          {
            label: 'Среднее',
            borderColor: 'rgb(0, 176, 240)',
            backgroundColor: 'rgb(0, 176, 240)',
            data: this.$store.state.chartsData.avgVigozero,
            pointRadius: 0, 
            borderWidth: 0.5,
          },
          {
            label: 'Максимальное',
            borderColor: 'rgb(250, 0, 0)',
            backgroundColor: '#def2fa',
            data: this.$store.state.chartsData.maxVigozero,
            pointRadius: 0,
            borderWidth: 0.5,
            fill: true,
          },
        ]
      },
      chartOptions : {
        title: {
          display: true,
          text: 'График ежедневных уровней воды на Выгозерско-Ондском водохранилище '+new Date().getFullYear() +' год',
          fontSize: 16
        },
        responsive: true,
        maintainAspectRatio: false,
        elements: {
          line: {
            fill: false
          }        
        },
        scales: {
          xAxes: [
          {
             scaleLabel: {
               display: true,
                labelString: 'Даты'
             },
             ticks: {
                stepSize: 1 
              }
           }
        ],
        yAxes: [
          {
             scaleLabel: {
               display: true,
                labelString: 'Уровень воды, м БС'
             },
             ticks: {
                suggestedMin: 88.2, 
                suggestedMax: 90.0,
              }
           }
        ],
        }
      }
    }
  },
  mounted () {
    console.log(this.$store.state.chartsData)
    console.log(this.$store.state.loadedGirvas)
    this.renderChart(this.chartData, this.chartOptions)
    }
  }


</script>

