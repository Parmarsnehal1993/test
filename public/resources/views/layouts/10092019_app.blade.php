<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
        <title>@if(isset($title) && !empty($title)){{ $title }} @else {{ 'FREEZE' }} @endif | Freeze CRM</title>
        {{-- <link rel="stylesheet" href="{!! asset('css/bootstrap-datetimepicker.min.css') !!}"> --}}
        <!-- bootstrap  css v 3-->
        <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}">
        <!-- Jquery ui css -->
        <link rel="stylesheet" href="{!! asset('css/jquery-ui.css') !!}" /> 
        <!-- bootstrap datarangepiker -->
        <link rel="stylesheet" href="{!! asset('bootstrap-daterangepicker/dist/css/daterangepicker.min.css') !!}">
        <!-- datatables css Jquery And Bootstrap -->
        <link type="text/css" rel="stylesheet"  href="{!! asset('css/jquery.dataTables.min.css') !!}">
        <link type="text/css" rel="stylesheet"  href="{!! asset('css/dataTables.bootstrap.css') !!}">
        <!-- main css -->
        <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
        <!-- bootstrap daterangepicker -->
        <script src="{!! asset('js/jquery-3.3.1.min.js') !!}"></script>
        <!-- below is jquery 1.11.1.min file -->
        {{-- <script src="{!! asset('js/jquery.min.js') !!}"></script> --}}
        <script type="text/javascript" src="{!! asset('js/general.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('js/jquery-ui.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('js/bootstrap.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('js/moment.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('js/bootstrap-datetimepicker.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('bootstrap-daterangepicker/dist/js/moment.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('bootstrap-daterangepicker/dist/js/daterangepicker.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('js/jquery.dataTables.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('js/dataTables.bootstrap.min.js') !!}"></script>
        
        <style>
            .hidden {
                display: none !important;
            }
        </style>
    </head>
    <body>
        <!-- header start -->
        <header>
            @auth
            <div class="container">
                @php
                    $loginUserData = Auth::user();
                    unset($loginUserData->password);
                    $loginUser = $loginUserData;
                @endphp
                <img src="{!! isset($loginUser->profile_image) ? $loginUser->profile_image : asset('images/ic-user-default.jpg') !!}" alt="John Doe" class="user-profile-pic" />
                <!-- main navigation start -->
                <ul class="main-navigation clearfix">
                    @if($loginUser->user_type != 4)
                        <li class="{{ (Route::currentRouteName() == 'listUser') ? 'active' : '' }}"><a href="{{ route('listUser') }}" title="Workflow">Workflow</a></li>
                        {{-- <li class="{{ (Route::currentRouteName() == 'addUser') ? 'active' : '' }}"><a href="{{ route('addUser') }}" title="Add Case">Add Case</a></li> --}}
                        <li class="{{ (Route::currentRouteName() == 'home') ? 'active' : '' }}"><a href="{{ route('home') }}" title="Profile">Profile</a></li>
                        <li class="{{ (Route::currentRouteName() == 'agent.callback_list') ? 'active' : '' }}"><a href="{{ route('agent.callback_list') }}" title="Callback List">Reminder List</a></li>
                        <li class="{{ (Route::currentRouteName() == 'agent.appointment_list') ? 'active' : '' }}"><a href="{{ route('agent.appointment_list') }}" title="Appointment List">Appointment List</a></li>
                        <li class="{{ (Route::currentRouteName() == 'completed_list') ? 'active' : '' }}"><a href="{{ route('completed_list') }}" title="Completed List">Completed List</a></li>
                        @if($loginUser->user_type == 1 || $loginUser->user_type == 3)
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" style="text-transform: capitalize" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                REPORTS <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if($loginUser->user_type == 1)
                                    <li>
                                        <a href="{{ route('report.new_account') }}" class="dropdown-item">New Account</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('report.invoice_report') }}" class="dropdown-item">Invoice Report</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('report.ip_report') }}" class="dropdown-item">IP report</a>
                                    </li>
                                    <li>    
                                        <a href="{{ route('report.solution_report') }}" class="dropdown-item">Solution Report</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('report.agent_report') }}" class="dropdown-item">Agent Report</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('report.case_status_report') }}" class="dropdown-item">Case Status Report</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('report.fees_report') }}" class="dropdown-item">Fees Report</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('report.cancel_report') }}" class="dropdown-item">Cancel Report</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('report.total_debt_written_off_report') }}" class="dropdown-item">Debt written off Report</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('report.total_debt_report') }}" class="dropdown-item">Debt Report</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('report.full_report') }}" class="dropdown-item">Full Report</a>
                                    </li>
                                @endif
                                @if($loginUser->user_type == 1 || $loginUser->user_type == 3)
                                    <li>
                                        <a href="{{ route('report.advisor_send_to_drafter_case_report') }}" class="dropdown-item">Advisor Send To Drafter Case report</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        @endif
                        <li class="{{ (Route::currentRouteName() == 'search_full_report') ? 'active' : '' }}"><a href="{{ route('search_full_report') }}" title="Search">Search</a></li>
                    @endif
                    <li class="{{ (Route::currentRouteName() == 'dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}" title="Dashboard">Dashboard</a></li>
                </ul>
                <!-- main navigation end -->
                <button type="button" class="nav-toggle">
                <span></span>
                <span></span>
                <span></span>
                </button>
                <ul class="main-navigation clearfix pull-right logout-menu">
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" style="background-color: transparent;border: none;color: white;display: block;color: #fff;font-size: 12px;line-height: 16px;text-transform: uppercase;padding: 18px;font-weight: 600;" title="Logout">LOGOUT</button>
                        </form>
                    </li>
                    <a href="#" class="brand"><img src="{!! asset('images/logo.png') !!}" alt="Freeze CRM"/></a>
                </ul>
            </div>
            @else
            @endauth
        </header>
        <div class="nav-backdrop"><a href="#" title="Close"></a></div>
        <!-- header end -->
        <!-- main content start -->
        <div id="app">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        
        <script type="text/javascript">
            $(document).ready(function(){
                setTimeout(function(){

                  $('.show-error').fadeOut();

                }, 3000);
                $('.date_range_picker').daterangepicker({
                    autoUpdateInput: false,
                    locale: {
                        cancelLabel: 'Clear'
                    }
                });
                $('.date_range_picker').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
                });
            });
        </script>
        
        <script>
            function isNumberKey(evt){
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
            }    
        </script>
        <script src="{!! asset('js/script.js') !!}"></script>
        
        @yield('page_specific_scripts')
    </body>
</html>

