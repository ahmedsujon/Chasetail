<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lost dog chart</title>
</head>

<body>

    <div class="chart-container"></div>

    <script src="{{ asset('assets/admin/js/highcharts.js') }}"></script>

    <script>
        var datas = <?php echo json_encode($datas); ?>;
        Highcharts.chart('chart-container', {
            title: {
                text: 'New User Growth, 2024'
            },
            subtitle: {
                text: 'Lost Dog'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Number of dogs'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'New Dog',
                data: datas
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom',
                        }
                    }
                }]
            }
        });
    </script>

</body>

</html>
