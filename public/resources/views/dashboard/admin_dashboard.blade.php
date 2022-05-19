@extends('layouts.app')

@section('content')
<style>
    .main-content {
        padding: 50px 0;
    }
</style>
<!-- main content start -->
<section class="main-content theme-dark">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <ul class="nav nav-pills chart-tabs">
                    <li class="active">
                        <a href="#day" id="show_day" data-toggle="tab">DAY</a>
                    </li>
                    <li>
                        <a href="#week" id="show_week" data-toggle="tab">WEEK</a>
                    </li>
                    <li>
                        <a href="#month" id="show_month" data-toggle="tab">MONTH</a>
                    </li>
                    <li>
                        <a href="#all_time" id="show_all_time" data-toggle="tab">ALL TIME</a>
                    </li>
                    <li>
                        <span class="search_dashboard_data">
                            <i class="fa fa-calendar"></i>
                            &nbsp;&nbsp;&nbsp; SEARCH
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="chart-tools">
                    <ul class="text-uppercase clearfix">
                        <li class="border-yellow">
                            <h4>{{ $adminDashboardData['totalRegisterUsers'] }}</h4>
                            <p>number of total registers
                            </p>
                            <hr size="4" style="max-width: 200px;border-top: 2px solid #ffc71a;">
                        </li>
                        <li class="border-white">
                            <h4>{{ $adminDashboardData['totalIosAppUsers'] }}</h4>
                            <p>number of total apple registers
                            </p>
                            <hr size="4" style="max-width: 200px;border-top: 2px solid #fff;">
                        </li>
                        <li class="border-green">
                            <h4>{{ $adminDashboardData['totalAndroidAppUsers'] }}</h4>
                            <p>number of total android registers
                            </p>
                            <hr size="4" style="max-width: 200px;border-top: 2px solid #77be48;">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row table table-striped text-uppercase m-0" id="days">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 has-border">
                <div id="show_all_tabs">
                    <div class="tab-content clearfix">
                        <div class="tab-pane active" id="day">
                            <canvas
                                width="100%"
                                style="max-width:100%;width:100%;"
                                id="canvas_day"></canvas>
                        </div>
                        <div class="tab-pane" id="week">
                            <canvas
                                width="100%"
                                style="max-width:100%;width:100%;"
                                id="canvas_week"></canvas>
                        </div>
                        <div class="tab-pane" id="month">
                            <canvas
                                width="100%"
                                style="max-width:100%;width:100%;"
                                id="canvas_month"></canvas>
                        </div>
                        <div class="tab-pane" id="all_time">
                            <canvas
                                width="100%"
                                style="max-width:100%;width:100%;"
                                id="canvas_all_time"></canvas>
                        </div>
                    </div>
                </div>
                <div id="show_searched_tab"></div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 dashboard-sidebar">
                <h5>
                    type of solution provided
                </h5>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <h1>{{ $adminDashboardData['ivaTrustDeedCount'] }}</h1>
                        <p class="text-uppercase has-border">
                            iva / trust deed
                        </p>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <h1>{{ $adminDashboardData['dmpCount'] }}</h1>
                        <p class="text-uppercase has-border">
                            dmp
                        </p>
                    </div>
                </div>
                <div class="row" style="padding-top:10px;border-bottom:1px solid #fff;">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <h1>
                            {{ $adminDashboardData['ivaTrustDeedCountPercentage'] }}%
                        </h1>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <h1>
                            {{ $adminDashboardData['dmpCountPercentage'] }}%
                        </h1>
                    </div>
                </div>
                <div class="row" style="padding-top: 15px;">
                    <div class="col-md-12" style="margin-bottom: 25px;">
                        AMOUNT OF DEBT ‘FROZEN’
                    </div>
                </div>
                <div class="row pt-10">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <h1 class="has-border">£ {{ $adminDashboardData['totalDebtAmount'] }}</h1>
                        <p class="text-uppercase">
                            total debts
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <h1 class="has-border">£ {{ $adminDashboardData['averageDebtAmount'] }}</h1>
                        <p class="text-uppercase">
                            debt average
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- main content end -->
@endsection

@section('page_specific_scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
            $("body").on("click", "a[href='#']", function(e) {
                e.preventDefault();
            });
            //nav toggle
            $("body").on("click", ".nav-toggle,.nav-backdrop>a", function() {
                $("body,html").toggleClass('nav-open');
            });
        });
    </script>
    <script src="{!! asset('js/general.js') !!}"></script>
    <script src="{!! asset('js/utils.js') !!}"></script>
    <script src="{!! asset('js/Chart.min.js') !!}"></script>

    <script>

        $(document).on('click', '#show_day, #show_week, #show_month, #show_all_time', function(){
            $('#show_all_tabs').show();
            $('#show_searched_tab').hide();
        });
        $(document).ready(function(){
            $('#show_all_tabs').show();
            $('#show_searched_tab').hide();

            $('.search_dashboard_data').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            }, cb);

            function ajaxCallForSearchedData(searched_date)
            {
                //console.log(searched_date);
                $.ajax({
                    type: 'POST',
                    url: '{{ route('agent.get_searched_admin_dashboard_data') }}',
                    data: {
                        'date_range': searched_date,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (result) {
                        console.log('result' + result);
                        $('#show_all_tabs').hide();
                        $('#show_searched_tab').html(result);
                        $('#show_searched_tab').show();
                        $('#searched_all_time').show();
                    }
                });
            }

            function cb(start, end) {
                var searched_date =  start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY');
                ajaxCallForSearchedData(searched_date);
            }
        });
        var DATE = [ @php print_r($adminDashboardData['totalDates']) @endphp ];
        var dailyConfig = {
            type: 'line',
            data: {
                labels: [@php print_r($adminDashboardData['currentDate']) @endphp],
                datasets: [
                    {
                        fill:false,
                        label: 'Total Daily Register',
                        borderColor: '#ffc71a',
                        data: [@php print_r($adminDashboardData['dailyTotalRegisterUsers']) @endphp]
                    }, {
                        fill:false,
                        label: 'Total Daily IOS App Register',
                        borderColor: '#fff',
                        data: [@php print_r($adminDashboardData['dailyTotalRegisterIosUsers']) @endphp]
                    }, {
                        fill:false,
                        label: 'Total Daily Android App Register',
                        borderColor: '#6B9E4D',
                        data: [@php print_r($adminDashboardData['dailyTotalRegisterAndroidUsers']) @endphp]
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
                            },
                            gridLines: {
                                color: "rgba(0, 0, 0, 0)",
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

                            },
                            gridLines: {
                                color: "rgba(0, 0, 0, 0)",
                            }

                        }

                    ]

                }

            }

        };

        var weeklyConfig = {

            type: 'line',

            data: {

                labels: [@php print_r($adminDashboardData['currentWeekDates']) @endphp],

                datasets: [

                    {
                        fill:false,
                        label: 'Total Weekly Register',

                        borderColor: '#ffc71a',

                        data: [@php print_r($adminDashboardData['currentWeekTotalRegisterUserString']) @endphp]

                    }, {
                        fill:false,
                        label: 'Total Weekly IOS App Register',

                        borderColor: '#fff',

                        data: [@php print_r($adminDashboardData['currentWeekTotalIosRegisterUserString']) @endphp]

                    }, {
                        fill:false,
                        label: 'Total Weekly Android App Register',

                        borderColor: '#6B9E4D',

                        data: [@php print_r($adminDashboardData['currentWeekTotalAndroidRegisterUserString']) @endphp]

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

                            },
                            gridLines: {
                                color: "rgba(0, 0, 0, 0)",
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

                            },
                            gridLines: {
                                color: "rgba(0, 0, 0, 0)",
                            }

                        }

                    ]

                }

            }

        };

        var monthlyConfig = {

            type: 'line',

            data: {

                labels: [@php print_r($adminDashboardData['currentMonthDates']) @endphp],

                datasets: [

                    {
                        fill:false,
                        label: 'Total Monthly Register',

                        borderColor: '#ffc71a',

                        data: [@php print_r($adminDashboardData['currentMonthTotalRegisterUserString']) @endphp]

                    }, {
                        fill:false,
                        label: 'Total Monthly IOS App Register',

                        borderColor: '#fff',

                        data: [@php print_r($adminDashboardData['currentMonthTotalIosRegisterUserString']) @endphp]

                    }, {
                        fill:false,
                        label: 'Total Monthly Android App Register',

                        borderColor: '#6B9E4D',

                        data: [@php print_r($adminDashboardData['currentMonthTotalAndroidRegisterUserString']) @endphp]

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

                            },
                            gridLines: {
                                color: "rgba(0, 0, 0, 0)",
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

                            },
                            gridLines: {
                                color: "rgba(0, 0, 0, 0)",
                            }

                        }

                    ]

                }

            }

        };

        var allTimeConfig = {

            type: 'line',

            data: {

                labels: [@php print_r($adminDashboardData['totalDates']) @endphp],

                datasets: [

                    {
                        fill:false,
                        label: 'Total Register',

                        borderColor: '#ffc71a',

                        data: [@php print_r($adminDashboardData['totalRegisterCountsString']) @endphp]

                    }, {
                        fill:false,
                        label: 'Total IOS App Register',

                        borderColor: '#fff',

                        data: [@php print_r($adminDashboardData['iosAppCountsString']) @endphp]

                    }, {
                        fill:false,
                        label: 'Total Android App Register',

                        borderColor: '#6B9E4D',

                        data: [@php print_r($adminDashboardData['androidAppCountsString']) @endphp]

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

                            },
                            gridLines: {
                color: "rgba(0, 0, 0, 0)",
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

                            },
                            gridLines: {
                color: "rgba(0, 0, 0, 0)",
            }

                        }

                    ]

                }

            }
        };

        window.onload = function () {
            // daily chart weekly chart mothly chart all time chart
            var Daily_Chart = document
                .getElementById('canvas_day')
                .getContext('2d');
            var Weekly_Chart = document
                .getElementById('canvas_week')
                .getContext('2d');
            var Monthly_Chart = document
                .getElementById('canvas_month')
                .getContext('2d');
            var All_Time_Chart = document
                .getElementById('canvas_all_time')
                .getContext('2d');
            window.myLine = new Chart(Daily_Chart, dailyConfig);
            window.myLine = new Chart(Weekly_Chart, weeklyConfig);
            window.myLine = new Chart(Monthly_Chart, monthlyConfig);
            window.myLine = new Chart(All_Time_Chart, allTimeConfig);
        };
    </script>
@endsection