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

                        <a href="#day" id="show-day" data-toggle="tab">DAY</a>

                    </li>

                    <li>

                        <a href="#week" id="show-week" data-toggle="tab">WEEK</a>

                    </li>

                    <li>

                        <a href="#month" id="show-month" data-toggle="tab">MONTH</a>

                    </li>

                    <li>

                        <a href="#all_time" id="show-all_time" data-toggle="tab">ALL TIME</a>

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

        <div id="all_fees_data">

            @include('dashboard.admin_daily_total_dashboard_data')

            @include('dashboard.admin_weekly_total_dashboard_data')

            @include('dashboard.admin_monhtly_total_dashboard_data')

            @include('dashboard.admin_total_dashboard_data')

        </div>

        <div id="searched_fees_data">

            {{-- @include('dashboard.admin_searched_dashboard_data') --}}

        </div>

    </div>

</section>

<!-- main content end -->

@endsection



@section('page_specific_scripts')

<script src="{!! asset('js/general.js') !!}"></script>
<script>
     $(document).ready(function(){
        $("body").on("click", "a[href='#']", function(e) {
            e.preventDefault();
        });
        //nav toggle
        $("body").on("click", ".nav-toggle,.nav-backdrop>a", function() {
            $("body,html").toggleClass('nav-open');
        });
    });
</script>
<!-- <script src="{!! asset('js/bootstrap.min.js') !!}"></script> -->

<script type="text/javascript">

    $(document).ready(function(){

        $('#day').show();

        $('#week').hide();

        $('#month').hide();

        $('#all_time').hide();

        $('#searched_fees_data').hide();



        $(document).on('click', '#show-day', function(){

            $('#day').show();

            $('#week').hide();

            $('#month').hide();

            $('#all_time').hide();

            $('#all_fees_data').show();

            $('#searched_fees_data').hide();

        });



        $(document).on('click', '#show-week', function(){

            $('#week').show();

            $('#day').hide();

            $('#month').hide();

            $('#all_time').hide();

            $('#all_fees_data').show();

            $('#searched_fees_data').hide();

        });



        $(document).on('click', '#show-month', function(){

            $('#month').show();

            $('#day').hide();

            $('#week').hide();

            $('#all_time').hide();

            $('#all_fees_data').show();

            $('#searched_fees_data').hide();

        });



        $(document).on('click', '#show-all_time', function(){

            $('#all_time').show();

            $('#day').hide();

            $('#week').hide();

            $('#month').hide();

            $('#all_fees_data').show();

            $('#searched_fees_data').hide();

        });



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
                url: '{{ route('agent.get_searched_dashboard_data') }}',
                data: {
                    'date_range': searched_date,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (result) {
                    console.log('result' + result);
                    $('#all_fees_data').hide();
                    $('#searched_fees_data').html(result);
                    $('#all_time').hide();
                    $('#day').hide();
                    $('#week').hide();
                    $('#month').hide();
                    $('#searched_fees_data').show();
                }
            });
        }

        function cb(start, end) {
            var searched_date =  start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY');
            ajaxCallForSearchedData(searched_date);
        }

    });

</script>

@endsection