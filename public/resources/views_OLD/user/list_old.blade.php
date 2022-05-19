@extends('layouts.app')

@section('content')
    {{-- <style type="text/css">
        #user_list_processing{
            display: block !important;
        }
    </style> --}}
    <!-- main content start -->
    {{-- <div class="container"> --}}
    @php
        $dashboardLoginUserData = Auth::user();
        unset($dashboardLoginUserData->password);
        $dashboardLoginUser = $dashboardLoginUserData;
    @endphp
    
    <!-- commmon error message display section start -->
    @include('layouts.message')
    <!-- commmon error message display section end -->
    
    @if($dashboardLoginUser->user_type == 1)
        @include('user.admin_statistics')
    @elseif($dashboardLoginUser->user_type == 2)
        @include('user.agent_drafter_statistics')
    @elseif($dashboardLoginUser->user_type == 3)
        @include('user.agent_advisor_statistics')
    @elseif($dashboardLoginUser->user_type == 5)
        @include('user.dmp_advisor_statistics')
    @endif
    <!-- statistics start -->
    <!-- statistics end -->
    <!-- /sidebar end -->
        
    <main class="main-content dmp-advisor">
        <div class="row mb-5">
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                <div class="row align-items-center">
                    <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" id="content-type">
                        <h1>
                        
                        </h1>
                        <a href="javascript:void(0)" id="Go_Back">< back</a>
                    </div>
                    <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="text-center text-primary">
                                    Today
                                    <div class="counter">
                                        1
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center text-primary">
                                    Total
                                    <div class="counter">
                                        349
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6  p-0">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 p-0">
                                <div class="buttons">
                                    <button class="btn btn-outline-info">
                                        Search
                                    </button>
                                    <button class="btn btn-outline-info">
                                        Clear
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 p-0">
                        <div class="row m-0">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">
                                <div class="form-group">
                                    <div class="date-input">
                                        <input id="search" type="text" name="Date" class="form-control" placeholder="Search">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 p-0 mt-4">
                <div class="card card-secondary pt-0 pb-0">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <div class="entrie-input">
                                    <span style="padding: 8px;font-size: 14px;color: #008dcc;">
                                        Show Entries
                                    </span>
                                    <button>
                                        10>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="user_list"
                        class="table search-table text-left awaiating-table">
                            <thead>
                                <tr>
                                    <th>Download Date</th>
                                    <th>Status</th>
                                    <th>Case</th>
                                    <th>Username</th>
                                    <th>Agent</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
     <div id="appointment_model" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content card card-secondary">
                <div class="modal-header">
                    <div class="card-title">
                        Reminder Date
                    </div>
                    <button type="button" class="close alert_open" aria-label="Close">
                        <img
                            src="{!! asset('images/icons/Cross_Icon@2x.png') !!}"
                            alt="Close"
                            class="img-fulid"
                            width="40"
                            height="40">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <form action="#" class="d-block input-sm" style="width: 100%;">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <input type="hidden" id="userId" name="userId">
                                            <input type="hidden" id="userName" name="userName">
                                            <input type="hidden" id="caseStatus" name="caseStatus">
                                            <input type="hidden" id="appointmentDate" name="appointmentDate">
                                            <div class="datepicker datetimepicker12"></div>
                                            <!-- <div style="border: none;" id="calendar"></div>-->
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="row pl-5 pr-3">
                                                <label for="Reminder_time" class="d-block text-primary" style="width: 100%;">ReminderTime</label>
                                                <div class="form-group">
                                                    <input id="hour" name="hour" type="text" class="form-control square-textbox fixed-size" style="float:left;" placeholder="HH"  required />
                                                        <p class="fixed-size" style="float:left;">:</p>
                                                        <input id="minute" name="minute" type="text" class="form-control square-textbox fixed-size" style="float:left;" placeholder="MM" required/>
                                                </div>
                                                <label for="Reminder_notes" class="d-block text-primary" style="width: 100%;">Reminder Notes</label>
                                                <div
                                                    class="form-group"
                                                    style="
                                                width: 100%;">
                                                    <textarea
                                                        name="message"
                                                        id="message"
                                                        class="form-control b-grey"
                                                        style="resize: none;border-radius: 10px;height: 250px;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mb-5">
                    <input type="submit" class="btn btn-outline-info float-right btn-large save_appointment" data-dismiss="modal" value="Save Appointment">
                </div>
            </div>
        </div>
     </div>
     @if(session()->has('callbacks') || session()->has('appointments'))
         <script>
            $('#myModal').modal('show');
        </script>
    @endif
    @php
        session()->pull('callbacks');
        session()->pull('appointments');
    @endphp

    <!-- main content end -->
    <script type="text/javascript">
        $(document).ready(function(){
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                type: "GET",
                url: "{{route('user.getData')}}",
                async: true,
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function (data) {
                    if (data !== null && data.length > 0) {
                        var tableData = [];
                        var user=[];
                        jQuery(data).each(function(i, item){
                            var userSignInDate=item.userSignInDate;
                            var zCaseType=item.zCaseType;
                            var user_id=item.user_id;
                            var name=item.name;
                            var userType=item.userType;
                            var enable_text=item.enable_text;

                            var user={
                                'userSignInDate':userSignInDate,
                                'zCaseType':zCaseType,
                                'user_id':user_id,
                                'name':name,
                                'userType':userType,
                                'enable_text':enable_text
                            };
                            console.log(user);
                            tableData.push(user);
                        });
                        var table=$("#user_list").DataTable({
                            "serverSide": false,
                            'processing': true,
                            data: tableData, // this is to be based on your json structure 
                            columns: [
                                { data: "userSignInDate" },
                                { data: "zCaseType" },
                                { data: "user_id" },
                                { data: "name"},
                                { data: "userType"},
                                { data: "enable_text"}
                             ],
                             rowReorder: {
                                 dataSrc: 'DT_Rowid'
                             },
                             select: {
                                 style: 'os',
                                 selector: 'td:first-child'
                             }
                         });
                        $('#search').keyup(function(){
                            table.search($(this).val()).draw();
                        });
                    }
                },
                error: function Error(result, error) {
                    alert("error " + result.status + " " + result.statusText);
                }
            });
        });

        $(document).on("keyup", "#search", function(){
            table.ajax.reload();
        });
        
       $('.columnAjax').on('click', function () {
            var columnType = $(this).data('type');
            $.ajax({
                type: 'GET',
                url: '{{route('user.getData')}}',
                async: true,
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                data: {
                    columnType: columnType
                },
                success: function (data) {
                    $('#content-type h1').text(columnType);
                    if (data !== null && data.length > 0) {
                        var tableData = [];
                        var user1 = [];
                        jQuery(data).each(function(i, item){
                            var userSignInDate=item.userSignInDate;
                            var zCaseType=item.zCaseType;
                            var user_id=item.user_id;
                            var name=item.name;
                            var userType=item.userType;
                            var enable_text=item.enable_text;

                            var user1 = {
                                'userSignInDate':userSignInDate,
                                'zCaseType':zCaseType,
                                'user_id':user_id,
                                'name':name,
                                'userType':userType,                        
                                'enable_text':enable_text
                            };
                            //console.log('user');
                            tableData.push(user1);
                        });

                        $("#user_list").empty();

                        var table=$("#user_list").DataTable({
                            "destroy": true,
                            "serverSide": false,
                            'processing': true,
                            data: tableData, // this is to be based on your json structure 
                            columns: [
                                { data: "userSignInDate" },
                                { data: "zCaseType" },
                                { data: "user_id" },
                                { data: "name"},
                                { data: "userType"},
                                { data: "enable_text"}
                            ],
                            rowReorder: {
                                dataSrc: 'DT_Rowid'
                            },
                            select: {
                                style: 'os',
                                selector: 'td:first-child'
                            }
                        });
                    }
                }
            });
        });


        $(document).on('change', '#dashboard_case_assigned_to', function () {
            if ($(this).val() !== '') {
                var jsActiveSelectedIds = [];
                $("input:checkbox[name=userId]:checked").each(function () {
                    jsActiveSelectedIds.push($(this).val());
                });
                $('#selectedIds').val(jsActiveSelectedIds.toString());
                $('#dashboard_case_assigned_to_agent').submit();
            }
        });

        $(document).on('click', '.case_status_assign', function(){
            $('#caseStatus').val('');
            $('#appointmentDate').val('');
            
            $('#message').val('');

            $('#caseStatus').val($(this).attr('data-status'));
            $('#userId').val($(this).attr('data-userId'));
            $('#userName').val($(this).attr('data-userName'));
            $(".datepicker").datepicker('setDate', null);
            $(".datepicker").datepicker({
                inline:true,
                changeMonth: true,
                changeYear: true,
                onSelect: function(dateText, inst) {
                    var date = $(this).val();
                    $("#appointmentDate").val(date.toString());
                }
            });
            
            $('#appointment_model').modal('show');
        });
        
        $('.save_appointment').click(function(){
            var userId=$('#userId').val();
            var userName=$('#userName').val();
            var caseStatus=$('#caseStatus').val();
            var appointmentDate=$('#appointmentDate').val();
            var hour=$('#hour').val();
            var minute=$('#minute').val();
            var message=$('#message').val();
            $.ajax({
                url:'{{ route('user.change_case_status_appointment') }}',
                type:'post',
                data:{_token:'{{csrf_token()}}',userId:userId,userName:userName,caseStatus:caseStatus,appointmentDate:appointmentDate,hour:hour,minute:minute,message:message},
                dataType:'json',
                success:function(data)
                {
                   swal(data,"success");
                }
            });
        });
    </script>
@endsection