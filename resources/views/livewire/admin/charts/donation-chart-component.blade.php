<div>
    <div class="row">
        <div class="col-md-12" style="margin-top: 100px;">
            <div class="card">
                <div class="card-body">
                    <div class="card-header bg-white">
                        <h4 class="card-title" style="float: left;">Donation Graph Report</h4>
                        <div class="btn-group" style="float: right;">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">Report Filter By Date <i
                                    class="mdi mdi-chevron-down"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Today's Report</a>
                                <a class="dropdown-item" href="#">Monthly Report</a>
                                <a class="dropdown-item" href="#">Yealy Report</a>
                            </div>
                        </div>
                    </div>
                    <canvas id="myChart" height="150" style="padding: 0px 50px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // setInterval(() => Livewire.emit('liveChange'), 3000);
        var chartData = JSON.parse(`<?php echo $donations; ?>`)
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'Jun', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ],
                datasets: [{
                    label: '# Donation Report',
                    data: chartData.data,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Livewire.on('liveupdateData', event => {
        //     var chartData = JSON.parse(event.data);
        //     console.log(chartData);
        //     myChart.data.labels = chartData.label;
        //     myChart.data.datasets.forEach((dataset) => {
        //         dataset.data = chartData.data;
        //     });
        //     myChart.update();
        // })
    </script>
</div>
