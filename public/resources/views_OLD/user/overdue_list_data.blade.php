@extends('layouts.app')
@section('content')
{{-- <style type="text/css">
#user_list_processing{
display: block !important;
}
</style> --}}
{{-- main content start -- --}}

    <!-- statistics start --
    <!-- statistics end
    <!-- /sidebar end -->
    <main class="main-content dmp-advisor pt-0">
        <div class="row mb-5 mt--100">
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                <input type="hidden" name="data_text" id="data_text" value="{{$data_text}}">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" id="content-type" style="margin-top: 60px;">
                        <h1>
                        {{$data_text}}
                        </h1>
                    </div>
                    <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
                        <div class="row mt-4 mt-md-0 mt-lg-0 mt-xl-0">
                            <div class="col-md-4"></div>
                            <div class="col-md-4 col-6">
                                <div class="text-center text-primary">
                                    <h4>Today</h4> 
                                    <div class="counter"> 
                                        {{$today_count}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="text-center text-primary">
                                    <h4>Total</h4> 
                                    <div class="counter">
                                        {{$total_count}}
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
                       <form action="" class="has-no-margin">
                            <div class="row">
                                <div class="col-6 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <input type="text" class="form-control"  name="date_range" placeholder="Select Date:"   autocomplete="off">
                                </div>
                                <div class="col-6 col-sm-12 col-md-6 col-lg-6 col-xl-6 p-md-0 plg-0 p-xl-0">
                                    <div class="buttons">
                                        <button class="btn btn-outline-info">
                                        Search
                                        </button>
    &nbsp;
                                        <button class="btn btn-outline-info">
                                        Clear
                                        </button>
                                    </div>
                                </div>
                            </div>
                       </form>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 p-0">
                        <div class="row m-0">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">
                                <form class="has-no-margin" method="GET">
                                    <div class="row">
                                        <div class="col-6 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                            <div class="form-group">
                                                <input id="search" type="text" name="Date" class="form-control" placeholder="Search">
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm 12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="buttons">
                                                <button class="btn btn-outline-info" id="Search_Data">
                                                Search
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 p-0 mt-4">
                <div class="pl-3 pr-4 pt-0 pb-0">
                    <div class="table-responsive">
                        <table id="user_list"
                            class="table search-table text-left awaiating-table"> 
                            <thead>
                                <tr>
                                    @if($data_text == 'In Process' || $data_text == 'Awaiting Docs' || $data_text == 'inprocessday1' || $data_text == 'inprocessday2' || $data_text == 'inprocessday3' || $data_text == 'inprocessday4'
                                    || $data_text == 'awatingdocs1' || $data_text == 'awatingdocs2' || $data_text == 'awatingdocs3' || $data_text == 'awatingdocs4'  ) 
                                    <th>Reminder</th>
                                    @else
                                    <th>Download Date</th>
                                    @endif
                                    <th>Status</th>
                                    <th>Case</th>
                                    <th>Username</th>
                                    <th>Agent</th>
                                    <th>Debtlevel</th>
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
<div id="view_user_debt_from_list" class="modal fade show" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content card card-secondary">
            <div class="modal-header">
                <div class="card-title debts-total-amount">
                </div>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="view_user_debt_from_list_div">
                            </div>
                            <!--<ul class="table-header align-items-center flex-wrap">
                                <li>SR</li>
                                <li>Amount Owned</li>
                                <li>Lender</li>
                                <li>Type</li>
                                <li>Priority</li>
                                <li>Monthly Payment</li>
                                <li>Image</li>
                                <li></li>
                            </ul>
                            <div id="view_user_debt_from_list_div"></div>-->
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
            <!--<div class="modal-footer mt-5 mb-4">
                <a href="javascipt:void(0)" class="btn btn-outline-info float-right btn-large d-none" data-dismiss="modal">Update</a>
            </div>-->
        </div>
    </div>
</div>
<div id="appointment_model" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content card card-secondary">
            <div class="modal-header">
                <div class="card-title">
                <span id="reminder_title"></span>
                    Reminder Date
                </div>
                <button type="button" class="close alert_open" aria-label="Close">
                <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <form action="#" class="d-block input-sm" style="width: 100%;">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <input type="hidden" id="userId" name="userId">
                                        <input type="hidden" id="userName" name="userName">
                                        <input type="hidden" id="caseStatus" name="caseStatus">
                                        <input type="hidden" id="appointmentDate" name="appointmentDate">
                                        <div class="datepicker datetimepicker12"></div>
                                        <!--                                                    <div style="border: none;" id="calendar"></div>-->
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 pl-5">
                                        <div class="row pl-5 pr-3">
                                            <label for="Reminder_time" class="d-block text-primary" style="width: 100%;">ReminderTime</label>
                                            <div class="form-group">
                                                <select id="hour" class="form-control square-textbox fixed-size" required style="float:left;width:95px;">
                                                    <option value="mm" selected >HH</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                </select>
                                                &nbsp;
                                                <p class="fixed-size" style="float:left;margin:0px 10px 1rem">:</p>
                                                &nbsp;
                                                <select id="minute" class="form-control square-textbox fixed-size" required style="float:left;width:95px;">
                                                   <option value="MM" selected>MM</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                    <option value="32">32</option>
                                                    <option value="33">33</option>
                                                    <option value="34">34</option>
                                                    <option value="35">35</option>
                                                    <option value="36">36</option>
                                                    <option value="37">37</option>
                                                    <option value="38">38</option>
                                                    <option value="39">39</option>
                                                    <option value="40">40</option>
                                                    <option value="41">41</option>
                                                    <option value="42">42</option>
                                                    <option value="43">43</option>
                                                    <option value="44">44</option>
                                                    <option value="45">45</option>
                                                    <option value="46">46</option>
                                                    <option value="47">47</option>
                                                    <option value="48">48</option>
                                                    <option value="49">49</option>
                                                    <option value="50">50</option>
                                                    <option value="51">51</option>
                                                    <option value="52">52</option>
                                                    <option value="53">53</option>
                                                    <option value="54">54</option>
                                                    <option value="55">55</option>
                                                    <option value="56">56</option>
                                                    <option value="57">57</option>
                                                    <option value="58">58</option>
                                                    <option value="59">59</option>
                                                    <option value="60">60</option>
                                                </select>

                                            </div>
                                            <label for="Reminder_notes" class="d-block text-primary" style="width: 100%;">Reminder Notes</label>
                                            <div
                                                class="form-group"
                                                style="
                                                width: 100%;">
                                                <textarea name="message" id="message" class="form-control b-grey" style="resize: none;border-radius: 10px;height: 250px;"></textarea>
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
                // $('#myModal').modal('show');
            </script>
    @endif
        @php
            session()->pull('callbacks');
            session()->pull('appointments');
        @endphp

<!-- main content end -->
<script type="text/javascript">
    $(document).on('click', '.viewUserDebtsFromList', function(){
        var viewDebtsUserId = $(this).data('user_id');
        $.ajax({
            url:'{{ route('user.getUserDebtsData') }}',
            type:'post',
            data:{_token:'{{csrf_token()}}',userId:viewDebtsUserId},
            success:function(data)
            {
                $('#view_user_debt_from_list_div').html('');
                $('#view_user_debt_from_list_div').html(data);
                $('#view_user_debt_from_list').show();
                
            }
        });
    });
    $("#view_user_debt_from_list .close").click(function(){
        $("#view_user_debt_from_list").hide();
    })
     $(document).on("keyup", "#search", function(){
        $("#user_list").ajax.reload();
    });
    // $("#Search_Data").on('click' , function () {
    //     $("#user_list").search($(this).val()).draw();
    // })
    $(document).ready( function () {
        var columnType = $('#data_text').val();

            $.ajax({
                type: 'GET',
                url: '{{route('user.getStatusWiseListData')}}',
                async: true,
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                data: {
                    columnType: columnType
                },
                success: function (data) {
                    // $('#content-type h1').text(columnType);
                            // alert($('#content-type'));
                    if (data !== null && data.length > 0) {
                        var tableData = [];
                        var user1 = [];
                        jQuery(data).each(function(i, item){
                            var userSignInDate=item.userSignInDate;
                            var userSignInDate1=item.userSignInDate1;
                            var zCaseType=item.zCaseType;
                            var user_id=item.user_id;
                            var name=item.name;
                            var userType=item.userType;
                            var enable_text=item.enable_text;
                            var Debtlevel = item.Debtlevel;
                           
                                var user1 = {
                                'userSignInDate':userSignInDate,
                                'zCaseType':zCaseType,
                                'user_id':user_id,
                                'name':name,
                                'userType':userType,
                                'Debtlevel':Debtlevel,
                                'enable_text':enable_text
                                };
                            tableData.push(user1);
                        });
                        // $("#user_list").empty();
                        var table=$("#user_list").DataTable({
                            "dom": '<"float-left"l><"float-right"f>rt<"row"<"col-sm-4"><"col-sm-4"><"col-sm-4"p>>',
                            "lengthChange": true, "lengthMenu": [[10, 20, 30, 40, -1], [10, 20, 30, 40, "All"]],
                            data: tableData, // this is to be based on your json structure
                            columns: [
                            { data: "userSignInDate" },
                            { data: "zCaseType" },
                            { data: "user_id" },
                            { data: "name"},
                            { data: "userType"},
                            { data: "Debtlevel"},
                            { data: "enable_text"}
                            ],
                            select: {
                                style: 'os',
                                selector: 'td:first-child'
                            }
                        });
                        $('#search').keyup(function(){
                                 table.search($(this).val()).draw();
                        });
                    } else {
                        swal('No Data Available', {
                          icon: 'error',
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
        //manoj --  Popup title as per  button
        var button_text =  $(this).attr('data-status');
        $("#reminder_title").text(button_text);
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
                var messageIcon = 'error';
           if (data == 'Requiredappointment') {
                var message = 'Appointment is required';
            } else if (data == 'Requiredhour') {
                var message = 'Hour is required';
            } else if (data == 'Requiredminute') {
                var message = 'Minute is required';
            } else if (data == 'Requiredmessage') {
                var message = 'Message is required';
            } else if (data == 'success') {
                var message = ' appointment saved succesfully ';
                var messageIcon = 'success';
            } else {
                var message = 'something wrong please try again';
            }
            swal(message, {
              icon: messageIcon,
            });
                //alert(data);  
            }
        
        });
    });
        
</script>
@endsection