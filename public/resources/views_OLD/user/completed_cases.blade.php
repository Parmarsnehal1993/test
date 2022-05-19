@extends('layouts.app')

@section('content')
    <div class="main-content dmp-advisor pt-0">
    @php
                $dashboardLoginUserData = Auth::user();
                unset($dashboardLoginUserData->password);
                $dashboardLoginUser = $dashboardLoginUserData;
             @endphp
    
            @if($dashboardLoginUser->user_type == 1)
                @include('user.admin_completed_statistics')
            @elseif($dashboardLoginUser->user_type == 2)
                @include('user.agent_drafter_completed_statistics')
            @elseif($dashboardLoginUser->user_type == 3)
                @include('user.agent_advisor_completed_statistics')
            @endif
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6  p-0">
                        <form action="{{ route('completed_list') }}" class="mb-0 has-no-margin">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <input
                                        type="text"
                                        class="date_range_picker form-control"
                                         name="date_range" placeholder="Select Date:"   autocomplete="off"
                                        value="{{ request()->get('date_range') ?? '' }}"
                                        autocomplete="off"
                                        placeholder="Date">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 p-0">
                                    <div class="buttons">
                                        <input type="submit" name="submit" value="Search" class="btn btn-outline-info">
                                        &nbsp;
                                            <a href="{{ route('completed_list') }}" class="btn btn-outline-info">Clear</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 p-0">
                        <div class="form-group">
                            <input type="text" id="search" name="Search" placeholder="Search" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 p-0 mt-4">
                <div class="card card-secondary pt-0 pb-0">
                    <div class="table-responsive">
                        <table class="table search-table text-center" id="completedCasesList">
                            <thead class="table_css">
                                <tr>
                                    <th>case no.</th>
                                    <th>agent</th>
                                    <th>case status</th>
                                    <th>case type</th>
                                    <th>customer number</th>
                                    <th>date downloaded</th>
                                    <th>debt amount</th>
                                    <th>case option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $rowidCounter = 1;@endphp
                                @foreach ($completedCasesList as $userKey => $userValue)
                                <tr>
                                    <!--<td>
                                        <input type="checkbox" name="userId" id="row_id{{ $rowidCounter }}" value="{{ $userValue->user_id }}">
                                        <label for="row_id{{ $rowidCounter }}"></label>
                                    </td>-->
                                    <td>{{ $userValue->user_id }}</td>
                                    <td>
                                        @if(isset($userValue->user->name))
                                        {{ $userValue->user->name }}
                                        @else
                                        {{ '-' }}
                                        @endif
                                    </td>
                                    <td>{{ $userValue->zCaseType }}</td>
                                    <td>{{ $userValue->userCaseType }}</td>
                                    <td>{{ $userValue->name }}</td>
                                    <td>{{ date('d-F-Y', strtotime($userValue->userSignInDate)) }}</td>
                                    <td>{{ getDebtAmount($userValue->user_id) }}</td>
                                    <td>
                                        <div class="buttons">
                                            <a href="{{ route('viewUser', $userValue->user_id) }}" class="btn btn-bordered-primary">View Case</a>
                                            &nbsp;
                                            &nbsp;
                                            <a href="#" data-status="{{$userValue->user_id}}" class="solution btn btn-bordered-primary" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#solution_popup">Solution</a>
                                            &nbsp;
                                            &nbsp;
                                            <div id="solution_popup" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content card card-secondary">
                                                        <div class="modal-header">
                                                            <div class="card-title">Solution</div>
                                                            <button type="button" class="close alert_open" aria-label="Close">
                                                                <img src="{!! asset('images/icons/Cross_Icon@2x.png')!!}" alt="Close" class="img-fulid" width="40" height="40">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            
                                                                                <input type="hidden" id="userId" name="userId" value="{{ $userValue->user_id }}">
                                                                                <div class="form-group">
                                                                                    <div class="date-input">
                                                                                            @php
                                                                                                $IVA_selected = '';
                                                                                                $DMP_selected = '';
                                                                                                $ADMINISTRATION_ORDER_selected = '';
                                                                                                $TRUST_DEED_selected = '';
                                                                                                $BANKRIPTCY_selected = '';
                                                                                                $OTHER_selected = '';
                                                                                            @endphp
                                                                                                <select name="solution" id="solution" class="form-control"> 
                                                                                                    <option value="">Select Solution</option>
                                                                                                    <option value="IVA" data-status="IVA">IVA</option>
                                                                                                    <option value="DMP" data-status="DMP">DMP</option>
                                                                                                    <option value="Administration Order" data-status="Administration Order">Administration Order</option>
                                                                                                    <option value="TRUST DEED"data-status="TRUST DEED" >TRUST DEED</option>
                                                                                                    <option value="BANKRIPTCY" data-status="BANKRIPTCY">BANKRIPTCY</option>
                                                                                                    <option value="OTHER" data-status="OTHER">OTHER</option>
                                                                                                </select>
                                                                                    </div>
                                                                                </div>
                                                
                                                                                <div class="form-group">
                                                                                            <select name="insolvency" id="insolvency" class="form-control">
                                                                                                                    <option value="">Select Insolvency Practitioner:</option>
                                                                                                                    <option value="CREDIT FIX" data-status="CREDIT FIX">CREDIT FIX</option>
                                                                                                                    <option value="APERTURE" data-status="APERTURE">APERTURE</option>
                                                                                                                    <option value="DEBT CHAMPION" data-status="DEBT CHAMPION">DEBT CHAMPION</option>
                                                                                                                    <option value="DEBT ADVISOR" data-status="DEBT ADVISOR">DEBT ADVISOR</option>
                                                                                                                    <option value="FOREST KING" data-status="FOREST KING">FOREST KING</option>
                                                                                                                    <option value="HANOVER" data-status="HANOVER">HANOVER</option>
                                                                                                                    <option value="OTHER insolvency" data-status="OTHER insolvency">OTHER insolvency</option>
                                                                                                                    <option value="THE INSOLVENCY PRACTICE" data-status="THE INSOLVENCY PRACTICE">THE INSOLVENCY PRACTICE</option>
                                                                                                                    <option value="JOHNSON GEDDES" data-status="JOHNSON GEDDES">JOHNSON GEDDES</option>
                                                                                                                    <option value="ANCHORAGE CHAMBERS" data-status="ANCHORAGE CHAMBERS">ANCHORAGE CHAMBERS</option>
                                                                                                                     <option value="VANGUARD" data-status="VANGUARD">VANGUARD</option>
                                                                                                                    <option value="WCF" data-status="WCF">WCF</option>
                                                                                                                    <option value="DSS" data-status="DSS">DSS</option>
                                                                                            </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <input type="text" id="monthly_payment" class="form-control" placeholder="Monthly Payment:"/>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                    <input type="text" class="datepicker start_date form-control" placeholder="Start Date:">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                    <input type="text"  class="datepicker end_date form-control" placeholder="End Date:">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer mb-5">
                                                            <a href="javascipt:void(0)" id="solution_update" class="btn btn-outline-info float-right btn-large" data-dismiss="modal">Update</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <a href="#" class="calender_complted_case btn btn-bordered-primary">CALENDAR</a> --}}
                                            <form action="{{ route('user.delete_user') }}" method="POST" style="display:inline-block;">
                                                <input type="hidden" id="hiddenDeleteUserId" name="hiddenDeleteUserId" value="{{ $userValue->user_id }}">
                                                @csrf
                                                <button type="submit" class="btn btn-bordered-primary text-danger" onclick="return confirm('Are you sure to delete this record?')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @php $rowidCounter++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- solution_popup -->
    </div>
    <div id="appointment_model" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content card card-secondary">
            <div class="modal-header">
                <div class="card-title">
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
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <input type="hidden" id="userId" name="userId" value="@if(isset($userValue->user_id)){{ $userValue->user_id }} @else '' @endif">
                                        <input type="hidden" id="userName" name="userName" value="@if(isset($userValue->user->name)){{ $userValue->user->name }}  @else '' @endif"">
                                        <input type="hidden" id="caseStatus" name="caseStatus" value="@if(isset($userValue->zCaseType)){{ $userValue->zCaseType }} @else '' @endif">
                                        <input type="hidden" id="appointmentDate" name="appointmentDate">
                                        <div class="datepicker datetimepicker12"></div>
                                        <!--                                                    <div style="border: none;" id="calendar"></div>-->
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
<script type="text/javascript">
$(document).ready(function(){
    $( ".datepicker" ).datepicker(
        {
        changeMonth: true,
        changeYear: true,
        dateFormat: 'mm/dd/yy',
        beforeShow: function (input, inst) {
            var rect = input.getBoundingClientRect();
            setTimeout(function () {
                inst.dpDiv.css({ top: rect.top + 40, left: rect.left + 0 });
            }, 0);
        }
    });
});
</script>

<script type="text/javascript">
        $(document).ready(function(){
            var table=$('#completedCasesList').DataTable({
            "dom": '<"float-left"l><"float-right"f>rt<"row"<"col-sm-4"><"col-sm-4"><"col-sm-4"p>>',
            "lengthChange": true,
            "lengthMenu": [[10, -1], [10, "All"]],
            });
            $('#search').keyup(function(){
                table.search($(this).val()).draw() ;
            });
        });
   </script>
   <script type="text/javascript">
       $(function() {
    $("#datepicker").datepicker({
        dateFormat: "dd-mm-yy"
    }).datepicker("setDate", "0");
});
   </script>


    <script type="text/javascript">

    $(document).on('click','#solution_update',function(e){
        e.preventDefault();

       var userId = $('#userId').val();

       var solution_type = $('#solution').find(":selected").text();

       var insolvency = $('#insolvency').find(':selected').text();

        var monthly_payment = $('#monthly_payment').val();

        var start_date = $('.start_date').val();
    
        var end_date = $('.end_date').val();


           $.ajax({

           url:'{{ route('user.save_solution') }}',
           method:'post',
            data:{
                 _token:"{{ csrf_token() }}", 
                  userId:userId,
                  solution_type:solution_type,
                 insolvency:insolvency,
                  monthly_payment:monthly_payment,
                  start_date:start_date,
                 end_date:end_date   
              },
              dataType:'json',
              success:function(data)
              {
                    
                   var messageIcon = 'error';
                    if (data == 'success') {
                       var message = 'Solution saved successfully';
                           var messageIcon = 'success';
                     } else {
                        var message = 'something wrong please try again';
                     }
                       swal(message, {
                         icon: messageIcon,
                       }); 
                    
                }
        });
});

</script>
<script type="text/javascript">
$(document).on('click', '.calender_complted_case', function(){
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
</script>
<script type="text/javascript">
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
                    if (data == 'success') {
                        var message = ' appointment saved succesfully ';
                        var messageIcon = 'success';
                    } else {
                        var message = 'something wrong please try again';
                    }
                    swal(message, {
                      icon: messageIcon,
                    });
//                alert(data);  
            }
        
        });
    });
        
</script>

@endsection