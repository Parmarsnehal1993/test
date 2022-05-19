<div class="tab-content clearfix">
    <div class="tab-pane" id="searched_all_time">
        <canvas
            width="100%"
            style="max-width:100%;width:100%;"
            id="canvas_searched_all_time"></canvas>
    </div>
</div>

<script src="{!! asset('js/general.js') !!}"></script>
<script src="{!! asset('js/utils.js') !!}"></script>
<script src="{!! asset('js/Chart.min.js') !!}"></script>

<script type="text/javascript">
    var DATE = [ @php print_r($drafterDashboardData['totalDates']) @endphp ];

    var allSearchedTimeConfig = {
            type: 'line',
            data: {
                labels: [@php print_r($drafterDashboardData['totalDates']) @endphp],
                datasets: [
                    {
                        fill:false,
                        label: 'All Time Completed Cases ',
                        borderColor: '#ffc71a',
                        data: [@php print_r($drafterDashboardData['finalCompletedCasesUserString']) @endphp]
                    }
                ]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [
                        {
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Date',
                                fontColor: "#fff",
                                fontSize: 16
                            },
                            ticks: {
                                fontColor: "white",
                                fontSize: 14
                            }
                        }

                    ],
                    yAxes: [
                        {
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: '',
                                fontColor: "white"
                            },
                            ticks: {
                                fontColor: "white",
                                fontSize: 14
                            }
                        }
                    ]
                }
            }
        };

        var Searched_All_Time_Chart = document
                .getElementById('canvas_searched_all_time')
                .getContext('2d');
        window.myLine = new Chart(Searched_All_Time_Chart, allSearchedTimeConfig);
</script>