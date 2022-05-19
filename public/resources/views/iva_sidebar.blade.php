@php
    $loginUserData = Auth::user();
    unset($loginUserData->password);

    $loginUser = $loginUserData;
@endphp



<nav class="navbar fixed-left  d-table">
    <h1 class="font-h1 d-table-cell">
        <strong>Case:</strong>
        <span class="font-light">{{$userInfo->name}}</span> &nbsp;|
    </h1>
    <h1 class="font-h1 d-table-cell transform" style="font-weight:100 !important">
    <span>
        <strong>timer &nbsp;</strong>
        <div id="countdown2" class="pull-right font-light" ></div>
    </span>
        <!-- <strong>Agent Name:</strong>
        <span class="font-light"> @if(isset($userInfo->user->name)) {{$userInfo->user->name}} @else  &nbsp; @endif</span> -->
    </h1>
</nav>
            <nav class="navbar fixed-left  justify-content-center">
                <!-- .navbar-nav start -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link logout" href="javascript:void(0)" title="Logout" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-keyboard="false" data-target="#logoff_modal">
                            <img src="{!! asset('images/icons/Logout.png') !!}" alt="Logout">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link profile" href="{{route('home')}}" title="Profile">                    
                            <img src="{!! asset('images/icons/Profile_Icon@2x.png') !!}" alt="Profile">
                            <!-- <i class="far fa-user"></i> -->
                        </a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('listUser')}}" title="Workflow">
                            <img src="{!! asset('images/icons/Workflow_Icon@2x.png') !!}" alt="Workflow">
                        </a>
                    </li>
                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link" href="{{ route('agent.callback_list') }}" title="Reminder List">-->
                    <!--        <img src="{!! asset('images/icons/Reminders_List_Icon@2x.png') !!}" alt="Reminder List">-->
                    <!--    </a>-->
                    <!--</li>-->
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('search_full_report')}}" title="Search">
                            <img src="{!! asset('images/icons/Search_Icon@2x.png') !!}" alt="Search">
                        </a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('agent.appointment_list')}}" title="Appointment List">
                            <img src="{!! asset('images/icons/Appointment_Icon@2x.png') !!}" alt="Appointment List">
                        </a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('listUser')}}" title="Dashboard">
                            <img src="{!! asset('images/icons/Dashboard_Icon@2x.png') !!}" alt="Dashboard" width="40" style="position:relative;right:5px;width:40px;">
                        </a>
                    </li>
                   
                </ul>
                <!-- /.navbar-nav end -->
                <ul class="clearfix list-unstyled navbar-nav expend-sidebar-link">
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link" id="sidebar_open">
                            <img src="{!! asset('images/icons/Expand_Side_Bar_Icon@2x.png') !!}" alt="Expand SideBar" class="por">
                        </a>
                    </li>
                </ul>
            </nav>


<nav class="navbar fixed-left side_menu_expend" id="side_menu">
<ul class="clearfix list-unstyled expend-sidebar-link">
         <li class="nav-item">
            <a href="javascript:void(0)" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-keyboard="false" data-target="#logoff_modal" class="nav-link pl-0" style="color:#fff">
            <img src="{!! asset('images/icons/Logout.png') !!}" alt="Logout" width="30">
            Logout</a>
        </li>
    </ul>
    <div class="user-greeting">
        <h2 id="day">Good Morning</h2>
        <script>
        var time = new Date().getHours();
                if (time < 12) {
                        greeting = "Good morning";
                    } else if (time < 18) {
                        greeting = "Good afrernoon";
                    } else {
                        greeting = "Good evening";
                }
            document.getElementById('day').innerHTML=greeting;
        </script>
        <h1 class="d-block width-100">{{$loginUser->name}}</h1>
    </div>
    <ul class="navbar-nav">
        <li class="{{ (Route::currentRouteName() == 'home') ? 'active' : '' }} nav-item">
            <a class="nav-link profile" href="{{ route('home') }}" title="Profile">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('listUser')}}" title="Workflow">
                Workflow
            </a>
        </li>
        <!--<li class="{{ (Route::currentRouteName() == 'agent.callback_list') ? 'active' : '' }} nav-item">-->
        <!--    <a class="nav-link" href="{{ route('agent.callback_list') }}" title="Reminder List">Reminder List</a>-->
        <!--</li>-->
        <li class="{{ (Route::currentRouteName() == 'agent.appointment_list') ? 'active' : '' }} nav-item">
            <a class="nav-link" href="{{route('search_full_report')}}" title="Search">search</a>
        </li>
        @if($loginUser->user_type == 6)
        <li class="{{ (Route::currentRouteName() == 'agent.appointment_list') ? 'active' : '' }} nav-item">
            <a class="nav-link" href="{{ route('agent.appointment_list') }}" title="Appointment List">Appointment List</a>
        </li>
        @endif
        
        <!-- <li class="{{ (Route::currentRouteName() == 'agent.appointment_list') ? 'active' : '' }} nav-item">
            <a class="nav-link" href="{{ route('agent.appointment_list') }}" title="Appointment List">Appointment List</a>
        </li>
        <li class="{{ (Route::currentRouteName() == 'completed_list') ? 'active' : '' }} nav-item">
            <a class="nav-link" href="{{ route('completed_list') }}" title="Completed List">Complete</a>
        </li> -->
        @if($loginUser->user_type == 1)
        <li class="{{ (Route::currentRouteName() == 'agent.appointment_list') ? 'active' : '' }} nav-item">
            <a class="nav-link" href="{{ route('agent.appointment_list') }}" title="Appointment List">Appointment List</a>
        </li>
        <li class="{{ (Route::currentRouteName() == 'completed_list') ? 'active' : '' }} nav-item">
            <a class="nav-link" href="{{ route('completed_list') }}" title="Completed List">Complete</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('report_list')}}">
                Reports
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('listUser')}}" title="Workflow">
                Dashboard
            </a>
        </li>
        @endif
       
    </ul>
    <ul class="clearfix list-unstyled expend-sidebar-link close-sidebar">
        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link p-0" id="sidebar_close">
                <img src="{!! asset('images/icons/Expand_Side_Bar_Icon@2x.png') !!}" alt="Expand SideBar" width="30">
            </a>
        </li>
    </ul>
    <!-- /.navbar-nav end -->
    <ul class="clearfix list-unstyled expend-sidebar-link">
        @if($loginUser->user_type == 1)
        <li class="nav-item">
            <a href="javascript:void(0)" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-keyboard="false" data-target="#logoff_modal" class="nav-link btn btn-outline-info border-white ">Logout</a>
        </li>
        @else
         
        @endif
    </ul>
    <div id="logoff_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered bd-example-modal-sm" role="document">
            <div class="modal-content card card-secondary">
                <div class="modal-header">
                    <h1 class="modal-title">
                        Log Off
                    </h1>
                    <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                        <img src="{!! asset('images/icons/Cross_Icon@2x.png')!!}" alt="Close" class="img-fulid" width="40" height="40">
                    </button>
                </div>
                <div class="modal-body">
                    <h4>
                        Reason For logging off
                    </h4>
                </div>
                <div class="modal-footer justify-content-start">
                     <div class="buttons width-100">
                        <form action="#" method="post" class="d-flex justify-content-between">
                            @csrf
                            <a href="javascript:void(0)" class="btn btn-outline-primary break logout_reason"  data-dismiss="modal" id="break_login">BREAK</a>
                            <a href="javascript:void(0)" class="btn btn-outline-primary lunch logout_reason"  data-dismiss="modal" id="lunch_login">LUNCH</a>
                            <a href="javascript:void(0)" class="btn btn-outline-primary home logout_reason"  data-dismiss="modal" id="home_login">HOME</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Logout Modal -->
</nav>
<script>
$(document).ready(function(){
    $(document).on('click','#break_login, #lunch_login, #home_login', function(e){
        e.preventDefault();
        var logout_reason = $(this).text();
        $.ajax({
            url:'{{ route('logout') }}',
            method:'post',
            data:{ "_token": "{{ csrf_token() }}", "logout_reason" : logout_reason},
            dataType:'json',
            success:function(data)
            {
                var successMessage = 'Logout Successfully';
                //swal(successMessage, "success");
                swal(successMessage, {
                  icon: "success",
                })
                .then((value) => {
                    window.location.href = "{{ url('/') }}";
                });
            }
        });
    });
});

</script>