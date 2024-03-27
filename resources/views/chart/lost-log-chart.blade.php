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

    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script>
        var datas = <?php echo json_encode($datas) ?>
        Hightcharts.chart('chart-container', {
            title:{
                text:'New User Grouth, 2024'
            }
        })
    </script>

</body>

</html>
