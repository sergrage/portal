<script>

export default {
  extends: VueChartJs.Line,
  data() {
    return {
      chartData: {
        // type: 'line',
        labels: this.$store.state.cgmsDates ,
        datasets: [
          {
            label: 'Ежесуточная температура',
            borderColor: '#a5a339',
            backgroundColor: '#a5a339',
            data: this.$store.state.cgms,
            fill: true
          },
          {
            label: 'Средняя температура - 8' + String.fromCharCode(176) ,
            borderColor: '#393ba5',
            backgroundColor: '#393ba5',
            data: [8, 8,8, 8,8, 8,8, 8,8, 8,8, 8,8, 8, 8],
            fill: false 
          }

        ]
      },
      chartOptions : {
        title: {
          display: true,
          text: 'Температура в Петрозаводске по данным Карельского ЦГМС',
        },
        responsive: true,
        maintainAspectRatio: false,
        elements: {
          line: {
            
          }        
        },
        scales: {
          xAxes: [{
             scaleLabel: {
               display: true,
                labelString: 'Дата'
             }
           }],
        yAxes: [{
             scaleLabel: {
               display: true,
                labelString: 'Температура, C' + String.fromCharCode(176)
             },
           ticks: {

                    suggestedMax: 40
                }
           }],
        }
      }
    }
  },
  mounted () {
    this.renderChart(this.chartData, this.chartOptions)
    }
  }


</script>

