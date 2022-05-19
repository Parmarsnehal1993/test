@php
$loginUserData = Auth::user();
unset($loginUserData->password);
$loginUser = $loginUserData;
$userInfo = $loginUser;

@endphp
<nav class="navbar fixed-left  d-table">
    <h1 class="font-h1 d-table-cell">
        <strong>Case:</strong>
        <span class="font-light">{{ $userInfo->name ?? '' }}</span> &nbsp;|
    </h1>
    <h1 class="font-h1 d-table-cell transform" style="font-weight:100 !important">
        <span>
            <strong>timer &nbsp;</strong>
            <div id="countdown2" class="pull-right font-light"></div>
        </span>

    </h1>
</nav>
<nav class="navbar fixed-left  justify-content-center">
    <!-- .navbar-nav start -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link logout" href="javascript:void(0)" title="Logout" data-toggle="modal"
                data-backdrop="static" data-keyboard="false" data-keyboard="false" data-target="#logoff_modal">
                <img src="{!! asset('images/icons/Logout.png') !!}" alt="Logout">
            </a>
        </li>
    </ul>
    <ul class="clearfix list-unstyled navbar-nav expend-sidebar-link">
        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link" id="sidebar_open">
                <img src="{!! asset('images/icons/Expand_Side_Bar_Icon@2x.png') !!}" alt="Expand SideBar" class="por">
            </a>
        </li>
    </ul>
</nav>


<nav class="navbar fixed-left  justify-content-center">
    <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link profile" href="{{ route('view_case_status') }}" title="Profile">
                <img src="{!! asset('images/icons/Profile_Icon@2x.png') !!}" alt="profile">
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link profile" href="{{ route('view_debt') }}" title="Profile">
                <img src="{!! asset('images/icons/Appointment_Icon@2x.png') !!}" alt="profile">
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('view_asset') }}" title="permission">
                <img src="{!! asset('images/icons/Dashboard_Icon@2x.png') !!}" alt="permission">
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('view_general_group') }}" title="page permission">
                <img src="{!! asset('images/icons/Reports_Icon@2x.png') !!}" alt="page permission">
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('view_general_setting') }}" title="page permission">
                <img src="{!! asset('images/icons/Workflow_Icon@2x.png') !!}" alt="page permission">
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('view_income_outgoing') }}" title="page permission">
                <img src="{!! asset('images/icons/Completed_List_Icon@2x.png') !!}" alt="page permission">
            </a>
        </li>
    </ul>
</nav>

<nav class="navbar fixed-left side_menu_expend" id="side_menu">
    <ul class="clearfix list-unstyled expend-sidebar-link">
        <li class="nav-item">
            <a href="javascript:void(0)" title="Log Out" data-toggle="modal" data-backdrop="static"
                data-keyboard="false" data-keyboard="false" data-target="#logoff_modal" class="nav-link pl-0"
                style="color:#fff">
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
            document.getElementById('day').innerHTML = greeting;
        </script>
        <h1 class="d-block width-100">{{ $loginUser->name ?? '' }}</h1>
    </div>
    <ul class="navbar-nav">

    </ul>
    <div id="logoff_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered bd-example-modal-sm" role="document">
            <div class="modal-content card card-secondary">
                <div class="modal-header">
                    <h1 class="modal-title">
                        Log Off
                    </h1>
                    <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                        <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
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
                            <a href="javascript:void(0)" class="btn btn-outline-primary break logout_reason"
                                data-dismiss="modal" id="break_login">BREAK</a>
                            <a href="javascript:void(0)" class="btn btn-outline-primary lunch logout_reason"
                                data-dismiss="modal" id="lunch_login">LUNCH</a>
                            <a href="javascript:void(0)" class="btn btn-outline-primary home logout_reason"
                                data-dismiss="modal" id="home_login">HOME</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Logout Modal -->
</nav>
<script>
    $(document).ready(function() {
        $(document).on('click', '#break_login, #lunch_login, #home_login', function(e) {
            e.preventDefault();
            var logout_reason = $(this).text();
            $.ajax({
                url: '{{ route('logout') }}',
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "logout_reason": logout_reason
                },
                dataType: 'json',
                success: function(data) {
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
