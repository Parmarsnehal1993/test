<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <title>@if (isset($title) && !empty($title)){{ $title }} @else {{ 'FREEZE' }} @endif | Freeze CRM</title>
    {{-- <link rel="stylesheet" href="{!! asset('css/bootstrap-datetimepicker.min.css') !!}"> --}}
    <!-- bootstrap  css v 3-->
    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Font awosem css-->
    <link rel="stylesheet" href="{!! asset('css/fontawesome.min.css') !!}">

    <!-- Jquery ui css -->
    <link rel="stylesheet" href="{!! asset('css/jquery-ui.css') !!}" />
    <!-- bootstrap datarangepiker -->
    <link rel="stylesheet" href="{!! asset('bootstrap-daterangepicker/dist/css/daterangepicker.min.css') !!}">

    <link rel="stylesheet" type="text/css" href="{!! asset('css/jquery-ui.min.css') !!}">
    <!--        <link rel="stylesheet" type="text/css" href="{!! asset('css/sweetalert.css') !!}">-->

    <!-- datatables css Jquery And Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{!! asset('css/jquery.dataTables.min.css') !!}">

    {{-- <link type="text/css" rel="stylesheet" href="{!! asset('css/dataTables.bootstrap.css') !!}"> --}}

    <link type="text/css" rel="stylesheet" href="{!! asset('css/font-awesome.min.css') !!}">

    {{-- <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"> --}}
    {{-- <link type="text/css" rel="stylesheet"  href="{!! asset('css/jquery-editable-select.min.css') !!}"> --}}


    <!-- main css -->
    <link rel="stylesheet" href="{!! asset('css/Freeze_2.0.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/my.css') !!}">


    <script type="text/javascript" src="{!! asset('js/jquery-3.3.1.min.js') !!}"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script> --}}

    <script type="text/javascript" src="{!! asset('js/popper.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/Chart.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/jquery-ui.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/bootstrap.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/main.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/general.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/sweetalert.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/moment.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/bootstrap-datetimepicker.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('bootstrap-daterangepicker/dist/js/moment.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('bootstrap-daterangepicker/dist/js/daterangepicker.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/jquery.dataTables.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/dataTables.bootstrap.min.js') !!}"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script> --}}

    {{-- <script type="text/javascript" src="{!! asset('js/jquery-editable-select.min.js') !!}"></script> --}}
    <style>
        .hidden {
            display: none !important;
        }

        input.sub_chk {
            padding-right: initial;
            margin-bottom: auto;
            /* size: a3; */
            padding: inherit;
        }

    </style>

</head>

<body class="text-capitalize">
    <div id="sidenav-overlay"></div>
    <div class="wrapper">
        @php
            $loginUserData = Auth::user();
            unset($loginUserData->password);

            $loginUser = $loginUserData;
        @endphp


        @include('sidebar')

        @yield('sidebar')
        <div class="main-content" style="padding-top:30px;">
            @include('header')
            @yield('header')
        </div>

        <div id="app">
            <main class="py-4 text-capitalize" style="padding-top: 0px !important;">
                @yield('content')
            </main>
        </div>
        <!-- exit modal -->
        <div id="exit_modal" class="modal fade show alert_modal close_exit_modal_div" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered bd-example-modal-sm" role="document">
                <div class="modal-content card card-secondary">
                    <div class="modal-header">
                        <h1 class="modal-title">Are You Sure ?</h1>
                    </div>
                    <div class="modal-body">
                        <p style="font-size: 14px;color: #333;">
                            if you exit now your changes will not be saved
                        </p>
                    </div>
                    <div class="modal-footer justify-content-start">
                        <div class="buttons">
                            {{-- <a href="javascript:void(0)" class="btn btn-outline-danger" data-dismiss="modal" id="exit_alert">Exit</a> --}}
                            {{-- <a href="javascript:void(0)" class="btn btn-outline-primary" id="back">Back</a> --}}
                            <a class="btn btn-outline-danger" id="exit_alert">Exit</a>
                            <a class="btn btn-outline-primary" id="back">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /exit modal -->
        <!-- <div id="EnterCase" class="modal fade show" style="display:block" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document"
                style="height: auto;min-height: auto !important;">
                        <div class="modal-content card card-secondary">
                            <div class="modal-header">
                                <h1 class="modal-title">Are You Sure you want Change Status?</h1>
                            </div>
                            <div class="modal-footer justify-content-start" style="padding: 20px 20px 0px;">
                                <div class="buttons width-100 justify-content-between">
                                    <a href="javascript:void(0)" class="btn btn-outline-primary">Yes</a>
                                    <a href="javascript:void(0)" class="btn btn-outline-primary" data-dismiss="modal" id="modal_remove">No</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
                            <a href="javascipt:void(0)" id="btn_hide" class="send_iva btn btn-outline-info" style="padding: 6px 30px; display: none;" data-dismiss="modal">Send</a>
                        </div>
                </div>
            </div> -->



    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".alert_open").click(function() {
                $("#exit_modal").show();
                $("#exit_modal").addClass('show');
                $("body").addClass("alert_open");
            });
            $("#back").click(function() {
                $("#exit_modal").hide();
                $('#exit_modal').modal('hide');
                $("body").removeClass("alert_open");
            })
            $("#exit_alert").click(function() {
                $(".modal").hide();
                $('.modal').modal('hide');
                $(".modal").removeClass('show');
                //$("#exit_modal").hide();
                $('#exit_modal').modal('hide');
                $("#exit_modal").addClass('show');
                $("body").removeClass("alert_open modal-open");
            })
            var img = $('img[alt = "Plus"]');
            // img.attr('src' , '{!! asset('images/icons/Cross_Icon@2x.png') !!}');
        });

        // This code is to close the are you sure modal as well as reminder modal
        $(document).on('click', '.close_current_popup', function(e) {
            e.preventDefault();
            $(this).closest('.close_exit_modal_div').modal('hide');
            $('#reminder_calender_modal').modal('hide');
            $('.modal').each(function() {
                $(this).hide();
            })
        });

        // This code is to close the are you sure modal
        $(document).on('click', '.close_current_exit_modal', function(e) {
            e.preventDefault();
            $(this).closest('.close_exit_modal_div').modal('hide');
        });

        $(document).on('click', '.alert_open', function(e) {
            e.preventDefault();
            $("#exit_modal").show();
            //$("body").addClass("alert_open");
        });

        /*$(document).on('click', '#back', function(){
            $("#exit_modal").hide();
            $("body").removeClass("alert_open");
        });*/

        /*$(document).on('click', '#exit_alert', function(){
            $(".modal").hide();
            $("#exit_modal").hide();
            $("body").removeClass("alert_open modal-open");
        });*/

        function ReplaceNumberWithCommas(yourNumber) {
            //Seperates the components of the number
            var components = yourNumber.toString().split(".");
            //Comma-fies the first part
            components[0] = components[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");

            //Combines the two sections
            return components.join(".");
        }

        function formatNumber(number) {
            return parseFloat(number).toFixed(2);
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('input[name="date_range"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    format: 'DD/MM/YYYY',
                    cancelLabel: 'Clear'
                }
            });
            var Select_File = $("input[type='file']");
            $(Select_File).change(function(e) {
                var fileName = e.target.files[0].name;
                $("label[for='Choose_File']").parent().append("Selected File:" + fileName);
            });
            $('input[name="date_range"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format(
                    'DD/MM/YYYY'));
            });
            $('input[name="date_range"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        });
    </script>
</body>

</html>
<div id="view_pros_and_cons_list" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content card card-secondary">
            <div class="modal-header">
                <button type="button" class="close alert_open close_reminder_popup">
                    <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                </button>
            </div>
            <div class="modal-body" id="load_pros_and_cons_data">

            </div>

            <div class="modal-footer mb-5">

            </div>

        </div>
    </div>
</div>

<div id="data" class="collapse">

</div>


</div>
<div id="compair_solution_open" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content card card-secondary solution_view">
            <div class="modal-header">
                <button type="button" class="close alert_open close_reminder_popup">
                    <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                </button>
            </div>
            <div class="modal-body" id="load_compair_data">

            </div>

            <div class="modal-footer mb-5">

            </div>

        </div>
    </div>
</div>
