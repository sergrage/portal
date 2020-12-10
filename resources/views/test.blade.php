<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chartisan example</title>
</head>
<body>
<h1>123</h1>
<!-- Chart's container -->
<div id="chart" style="height: 300px;"></div>
<!-- Charting library -->
{{--<script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>--}}
<!-- Chartisan -->
{{--<script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>--}}

<!-- Charting library -->
<script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
<!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

<!-- Your application script -->
<script>
    const chart = new Chartisan({
        el: '#chart',
        url: "@chart('power_chart')",
        hooks: new ChartisanHooks()
            .borderColors()
            .beginAtZero(true)
            .legend({ position: 'bottom'})
            .title('Генерация Кондопожской ГЭС')
            .datasets([{ type: 'line', fill: false }, { type: 'line', fill: false }])
    });
</script>
</body>
</html>
