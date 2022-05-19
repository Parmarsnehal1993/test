@extends('layouts.app')
@section('content')
{{-- <style type="text/css">
    #user_list_processing{
        display: block !important;
    }
</style> --}}
    <!-- main content start --
    
        {{-- <div class="container"> --}}
            <!-- statistics start --
            <!-- statistics end -->
            <!-- /sidebar end -->
            <main class="main-content dmp-advisor">
                <div class="row mb-5">
                    <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                        <div class="row align-items-center">
                            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" id="content-type">
                                <h1>
                                
                                </h1>
                                <a href="javascript:void(0)" id="Go_Back"> back</a>
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

                        // alert($('#content-type'));
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
            $('#hour').val('');
            $('#minute').val('');
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


        //window.open('url','window.name','window setting');
        //return false;

        $('.statistics').click(function(){
            var form_data=$("#view-status-page").val();
            // alert(form_data);
            var form=$(".statistics").parent().find("form").submit();
                
        
        });
                 
    </script>
  
@endsection

