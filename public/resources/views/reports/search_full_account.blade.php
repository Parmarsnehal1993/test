 @extends('layouts.app')


@section('content')



    <!-- main content start -->

@php

    $reportLoginUserData = Auth::user();

    unset($reportLoginUserData->password);



    $reportLoginUser = $reportLoginUserData;

@endphp

<style>
.tab_da{
    display:none;
} 
#button{
    display:block !important;
}
</style>

            <div class="main-content pt-0">

                <div class="row">

                    <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9"></div>

                </div>

                <div class="row align-items-center mt--70 mb-5">

                    <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">

                        <h1>

                            Search

                        </h1>

                    </div>

                </div>

                <div class="row">

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                        <div class="row">

                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6  p-0">
                            
                            <form action="#" class="has-no-margin mb-0">

                                <div class="row">

                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                                        <div class="form-group mb-0">

                                            <input type="text" class="date_range_picker form-control"   id="date_range" name="date_range" placeholder="Select Date:"   autocomplete="off" value="{{ request()->get('date_range') ?? '' }}" autocomplete="off" placeholder="Date">

                                        </div>

                                    </div>

                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 p-0">
    
                                        <div class="buttons">

                                            <input type="submit" class="btn btn-outline-info" value="Search">&nbsp;
                                            {{-- <a href="{{ route('agent.callback_list') }}" class="btn btn-outline-info">Clear</a> --}}
                                            <a href="{{ route('search_full_report') }}" class="btn btn-outline-info">Clear</a>

                                        </div>

                                    </div>

                                </div>

                            </form>
                            
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pt-0 pl-0">

                            <div class="row m-0">
 
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0 pr-0 mt-md-3 mt-lg-0">
                                
                                

                                <!--<form action="{{ route('get_full_report') }}" method="post">-->
                                    <form action="#" method="post">

                                    @csrf

                                        <div class="form-group">

                                            <div class="date-input">

                                                <input id="search_value" type="text" name="search" class="form-control" placeholder="Search">

                                            </div>

                                        </div>
                                        
                                            @if($reportLoginUser->user_type == 1)
                                                <!--<input type="submit" name="submit" value="Download Excel" class="btn btn-outline-info btn-bordered-primary">-->
                                            @endif
                                </form>
                                
                               

                            </div>

                        </div>

                            </div>

                        </div>

                    </div>

                    @if($reportLoginUser->user_type == 1)

                    <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-12 pr-0">

                        <div class="buttons float-right small-buttons">

                            <!-- <a href="javascript:void(0)" class="btn btn-outline-info btn-bordered-primary">

                                <i class="fa fa-file-pdf"></i>

                                &nbsp; Export PDF</a> -->

                           {{--  <a href="{{ route('downloadReport.excel', 'search_full_account') }}" class="btn btn-outline-info btn-bordered-primary">

                                <i class="fa fa-file-excel"></i>

                                &nbsp; Export Excel</a> --}}

                        </div>

                    </div>

                    @endif

                </div>



                <div class="row">

                    <div class="col-12 col-sm-12 col-md-12 p-0 mt-4">

                        <div class="pl-3 pr-4 pt-0 pb-0">

                            <div class="table-responsive">

                                <table class="table search-table text-center data-table" id="full_report" data-ajax-url="{{ route('reports.listfullreportajax') }}">

                                    <thead>

                                        <tr>

                                            <th>User Signin Date</th>

                                            <th>Case No:</th>

                                            <th>Customer Name</th>

                                            <th>Number</th>

                                            <th>Email</th>

                                            <th>Debts Level</th>

                                            <th>Case Status</th>
                                            
                                            <th>Usercasetype</th>

                                            <th>

                                                Action

                                            </th>

                                        </tr>   

                                    </thead>

                                        

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


    <div id="appointment_model" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content card card-secondary">
            <div class="modal-header">
                <div class="card-title">
                    <span id="reminder_title"></span>
                    Reminder Date
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                        <div class="datepicker datetimepicker12" required></div>
                                        <!--                                                    <div style="border: none;" id="calendar"></div>-->
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 pl-5">
                                        <div class="row pl-5 pr-3">
                                            <label for="Reminder_time" class="d-block text-primary" style="width: 100%;">ReminderTime</label>
                                            <div class="form-group">
                                                            <select id="hour" class="form-control square-textbox fixed-size"  style="float:left;width:95px;" required>
                                                                <option value="" selected >HH</option>
                                                                <!-- <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option> -->
                                                                <option value="8">08 AM</option>
                                                                <option value="9">09 AM</option>
                                                                <option value="10">10 AM</option>
                                                                <option value="11">11 AM</option>
                                                                <option value="12">12 PM</option>
                                                                <option value="13">01 PM</option>
                                                                <option value="14">02 PM</option>
                                                                <option value="15">03 PM</option>
                                                                <option value="16">04 PM</option>
                                                                <option value="17">05 PM</option>
                                                                <option value="18">06 PM</option>
                                                                <option value="19">07 PM</option>
                                                                <option value="20">08 PM</option>
                                                                <!-- <option value="21">21</option>
                                                                <option value="22">22</option>
                                                                <option value="23">23</option>
                                                                <option value="24">24</option> -->
                                                            </select>
                                                            &nbsp;
                                                            <p class="fixed-size" style="float:left;margin:0px 10px 1rem">:</p>
                                                            &nbsp;
                                                            <select id="minute" class="form-control square-textbox fixed-size" style="float:left;width:95px;" required>
                                                            <option value="" selected>MM</option>
                                                                <option value="00">00</option>
                                                                <option value="15">15</option>
                                                                <option value="30">30</option>
                                                                <option value="45">45</option>
                                                                <!-- <option value="5">5</option>
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
                                                                <option value="60">60</option> -->
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
                                <div class="form-group" style="margin-top: 100px;margin-left:20px;">
                                    <input type="checkbox" class="form-control" style="opacity: 1;float: left;border: none;width: 20px;height: 20px;-webkit-appearance: checkbox;" name="check_value" id="check_value" value="1">Tick if you want to send to use phone
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


<!--view case,not intrested,dnc,dro popup code start here-->
<!--        Author : Raj Abhishek-->
<!--        Date : 18/2/2020-->

<div id="notintrested" class="modal fade show entercase" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document"
                style="height: auto;min-height: auto !important;">
                        <div class="modal-content card card-secondary">
                            <div class="modal-header">
                                <h1 class="modal-title">Are You Sure you want Change Status?</h1>
                            </div>
                            <div class="modal-footer justify-content-start" style="padding: 20px 20px 0px;">
                                <div class="buttons width-100 justify-content-between">
                                    <a href="" class="btn btn-outline-primary get-notintrested-route">Yes</a>
                                    <a href="javascript:void(0)" class="btn btn-outline-primary" data-dismiss="modal" id="modal_hide">No</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
                            <a href="javascipt:void(0)" id="btn_hide" class="send_iva btn btn-outline-info" style="padding: 6px 30px; display: none;" data-dismiss="modal">Send</a>
                        </div>
                </div>
            </div>

            {{-- case deleted popu start here --}}
                <div id="delete_case" class="modal fade show entercase" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
                    <input type="hidden" name="delete_case" id="deleted_userid" value="">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document"
                style="height: auto;min-height: auto !important;">
                        <div class="modal-content card card-secondary">
                            <div class="modal-header">
                                <h1 class="modal-title">Are You Sure you want Delete Case?</h1>
                            </div>
                            <div class="modal-footer justify-content-start" style="padding: 20px 20px 0px;">
                                <div class="buttons width-100 justify-content-between">
                                    <a href="" class="btn btn-outline-primary get_delete">Yes</a>
                                    <a href="javascript:void(0)" class="btn btn-outline-primary" data-dismiss="modal" id="modal_hide">No</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
                            <a href="javascipt:void(0)" id="btn_hide" class="send_iva btn btn-outline-info" style="padding: 6px 30px; display: none;" data-dismiss="modal">Send</a>
                        </div>
                </div>
            </div>
            {{-- case deleted popu end here --}}
            
            
            <div id="dnc" class="modal fade show entercase"  tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document"
                style="height: auto;min-height: auto !important;">
                        <div class="modal-content card card-secondary">
                            <div class="modal-header">
                                <h1 class="modal-title">Are You Sure you want Change Status?</h1>
                            </div>
                            <div class="modal-footer justify-content-start" style="padding: 20px 20px 0px;">
                                <div class="buttons width-100 justify-content-between">
                                    <a href="" class="btn btn-outline-primary get-dnc-route">Yes</a>
                                    <a href="javascript:void(0)" class="btn btn-outline-primary" data-dismiss="modal" id="modal_hide">No</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
                            <a href="javascipt:void(0)" id="btn_hide" class="send_iva btn btn-outline-info" style="padding: 6px 30px; display: none;" data-dismiss="modal">Send</a>
                        </div>
                </div>
            </div>
            
            
            <div id="dro" class="modal fade show entercase" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document"
                style="height: auto;min-height: auto !important;">
                        <div class="modal-content card card-secondary">
                            <div class="modal-header">
                                <h1 class="modal-title">Are You Sure you want Change Status?</h1>
                            </div>
                            <div class="modal-footer justify-content-start" style="padding: 20px 20px 0px;">
                                <div class="buttons width-100 justify-content-between">
                                    <a href="" class="btn btn-outline-primary get-dro-route">Yes</a>
                                    <a href="javascript:void(0)" class="btn btn-outline-primary" data-dismiss="modal" id="modal_hide">No</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
                            <a href="javascipt:void(0)" id="btn_hide" class="send_iva btn btn-outline-info" style="padding: 6px 30px; display: none;" data-dismiss="modal">Send</a>
                        </div>
                </div>
            </div>

                <div id="view" class="modal fade entercase"  tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document"
                style="height: auto;min-height: auto !important;">
                        <div class="modal-content card card-secondary">
                            <div class="modal-header">
                                <h1 class="modal-title">Are You Sure you want enter this case?</h1>
                            </div>
                            <div class="modal-footer justify-content-start" style="padding: 20px 20px 0px;">
                                <div class="buttons width-100 justify-content-between d-flex">
                                    <a href="" id="get_viewcase" class="btn btn-outline-primary">Yes</a>
                                    <a href="javascript:void(0)" class="btn btn-outline-primary" data-dismiss="modal" id="modal_hide">No</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
                            <a href="javascipt:void(0)" id="btn_hide" class="btn btn-outline-info" style="padding: 6px 30px; display: none;" data-dismiss="modal">Send</a>
                        </div>
                </div>
            </div>







                <div id="chnageday" class="modal fade show entercase" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document"
                style="height: auto;min-height: auto !important;">
                        <div class="modal-content card card-secondary">
                            <div class="modal-header">
                                <h1 class="modal-title">Are You Sure you want Change Status?</h1>
                            </div>
                            <div class="modal-footer justify-content-start" style="padding: 20px 20px 0px;">
                                <div class="buttons width-100 justify-content-between">
                                    <a href="" class="btn btn-outline-primary get_route">Yes</a>
                                    <a href="javascript:void(0)" class="btn btn-outline-primary" data-dismiss="modal" id="modal_hide">No</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
                            <a href="javascipt:void(0)" id="btn_hide" class="send_iva btn btn-outline-info" style="padding: 6px 30px; display: none;" data-dismiss="modal">Send</a>
                        </div>
                </div>
            </div>
            
            
            <div id="change_user_z_case_type_common_modal" class="modal fade show entercase" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="height: auto;min-height: auto !important;">
        <div class="modal-content card card-secondary">
            <div class="modal-header">
                <h1 class="modal-title">Are You Sure you want Change Status?</h1>
            </div>
            <div class="modal-footer justify-content-start" style="padding: 20px 20px 0px;">
                <div class="buttons width-100 justify-content-between">
                    <a id="change_user_z_case_type_common_modal_a_tag" href="" class="btn btn-outline-primary">Yes</a>
                    <a href="javascript:void(0)" class="btn btn-outline-primary" data-dismiss="modal" id="modal_hide">No</a>
                </div>
            </div>
        </div>
        <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
            <a href="javascipt:void(0)" id="btn_hide" class="send_iva btn btn-outline-info" style="padding: 6px 30px; display: none;" data-dismiss="modal">Send</a>
        </div>
    </div>
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


            {{-- view Evidance code start here --}}

            <div id="view_user_evidance_from_list" class="modal fade show" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
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
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="view_user_checklist_from_list_div">
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

            {{-- view Evidance code end here --}}
            

{{--  messageday1,2,3 awaitingdocsday1,2,3 inprocessday1,2,3 code end here--}}

<div id="solution_popup" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content card card-secondary">
                        <div class="modal-header">
                            <div class="card-title">
                                Solution
                            </div>
                            <button type="button" class="solution close alert_open" aria-label="Close">
                            <img
                            src="{!! asset('images/icons/Cross_Icon@2x.png')!!}"
                            alt="Close"
                            class="img-fulid"
                            width="40">
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <form action="#">
                                                <input type="hidden" name="solution_id" id="solution_id" value="">
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
                                                        <select name="solution" id="solution" required class="form-control">
                                                            
                                                            <option value="" id="solution_data">Select Solution</option>
                                                            
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
                                                    <select name="insolvency" id="insolvency" required class="form-control">
                                                         
                                                            <option value="" id="insolvency_data">Select Insolvency Practitioner:</option>
                                                           
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
                                                   <input type="text" id="monthly_payment" required value="" class="form-control" placeholder="Monthly Payment:"/>
                                                </div>
                                                <div class="form-group">
                                                    
                                                        <input class=" start_date form-control account_date" required type="text" id="start_date" value=""  placeholder="Start Date:">
                                                    
                                                </div>
                                                <div class="form-group">
                                                    
                                                        <input class="end_date form-control account_date" required type="text" id="end_date" value=""  placeholder="End Date:">
                                                    
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mb-5">
                            <a href="javascipt:void(0)" id="soluton_form" class="btn btn-outline-info float-right btn-large"
                            >Save & Exit</a>
                              <a href="javascipt:void(0)" data-toggle="modal" data-target="#account_popup" class="btn btn-outline-success float-right btn-large"
                            >Account</a>
                        </div>
                    </div>
                </div>
            </div>

<!--- solution code end here -->



<!-- Account modal for account  user
Author:Raj Abhishek
Date:08-02-2020
code start here
-->



<div id="account_popup" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content card card-secondary">
                    <div class="modal-header">
                        <div class="card-title">
                            Account
                        </div>
                        <button type="button" class="close alert_open" aria-label="Close">
                        <img
                        src="{!! asset('images/icons/Cross_Icon@2x.png')!!}"
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
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <form action="#">
                                            <input type="hidden" name="account_id" id="account_id" value="">
                                            <div class="form-group">
                                                <div class="date-input">
                                                   <input  type="text" class="form-control" required value="" id="fee" placeholder="Fee:">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {{-- <div class="date-input" id="due_date"> --}}
                                                   <input type="text" id="due_date" required class="form-control account_date" placeholder="Due Date:"/ value="">
                                                {{-- </div> --}}
                                            </div>
                                            <div class="form-group">
                                                {{-- <div class="date-input" id="clawback"> --}}
                                                    <input type="text" id="clawback" required class="form-control" placeholder="Claw Back:" value="">
                                                {{-- </div> --}}
                                            </div>
                                            <div class="form-group">
                                                {{-- <div class="date-input" id="Cancelled_Date"> --}}
                                                     <input class="form-control datepicker" required type="text" id="cancelled_date" placeholder="Cancelled Date:" value="">
                                                {{-- </div> --}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mb-5">
                        <a href="javascipt:void(0)" id="account_popup_submit" class="btn btn-outline-info float-right btn-large"
                        data-dismiss="modal">Save & Exit</a>
                        <a href="javascipt:void(0)" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#cancelled" class="btn btn-outline-danger float-right btn-large">Cancelled</a>
                        <a href="javascipt:void(0)" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#paid" class="case_status-change btn btn-outline-success float-right btn-large">paid</a>

                        
                    </div>
                </div>
            </div>
        </div>

    <!-- D_A quality modal start -->

    <div id="D_A_quality" class="modal fade compliance_data D_A_quality" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content card card-secondary">
                <div class="modal-header p-0">
                    <div class="card-title">
                        DA Quality
                    </div>
                    <button type="button" class="close alert_open" aria-label="Close">
                        <img
                            src="{!! asset('images/icons/Cross_Icon@2x.png')!!}"
                            alt="Close"
                            class="img-fulid"
                            width="40"
                            height="40">
                    </button>
                </div>
                <div class="modal-body mb-0 p-0">
                    <div class="tab-content">
                        <nav class="d-none">
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a
                                    class="nav-item nav-link active"
                                    data-toggle="tab"
                                    href="#introduction"
                                    role="tab">&nbsp;</a>
                                <a
                                    class="nav-item nav-link"
                                    data-toggle="tab"
                                    href="#vulnerability"
                                    role="tab">&nbsp;</a>
                                <a
                                    class="nav-item nav-link"
                                    data-toggle="tab"
                                    href="#fact_find"
                                    role="tab">&nbsp;</a>
                                <a class="nav-item nav-link" data-toggle="tab" href="#solution" role="tab">&nbsp;</a>
                                <a
                                    class="nav-item nav-link"
                                    data-toggle="tab"
                                    href="#documentation"
                                    role="tab">&nbsp;</a>
                                <a
                                    class="nav-item nav-link"
                                    data-toggle="tab"
                                    href="#confirmation"
                                    role="tab">&nbsp;</a>
                                <a
                                    class="nav-item nav-link"
                                    data-toggle="tab"
                                    href="#score"
                                    role="tab">&nbsp;</a>
                                <a
                                    class="nav-item nav-link"
                                    data-toggle="tab"
                                    href="#button"
                                    role="tab">&nbsp;</a>
                            </div>
                        </nav>
                        <form
                            class="da_submit tab-content"
                            method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" id="userId_da" value="">
                             <div id="load_da_ajax_data"></div>
                             <div id="get_da_data">
                            <div class="row mb-2">
                                <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                    <div class="from-group">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="data_of_call"
                                            placeholder="Date Of Call:"
                                            name="Date Of Call"
                                            readonly="readonly">
                                    </div>
                                </div>
                                
                                <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                    <div class="from-group">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="date_scored_get"
                                            placeholder="Dade Scored:"
                                            name="Dade Scored">
                                    </div>
                                </div>
                            </div> 
                            @php $notes_counter = 1; @endphp
                                {{-- New code start here --}}
                               
                                    <div class="tab_da" id="introduction">
                                        <div class="text-primary font-14">
                                            <div class="text-primary">
                                                <h5>
                                                    <strong>introduction</strong>
                                                </h5>
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    <input
                                                        type="hidden"
                                                        name="debt_type"
                                                        id="debt_type"
                                                        value="introduction">
                                                    @foreach($da_introducation as $key => $value) 
                                                    @foreach($value as $innerkey=>$innervalue)
                                                    <input
                                                        type="hidden"
                                                        name="{{ json_encode($key) }}"
                                                        id="weight{{ $notes_counter }}"
                                                        value="{{ json_encode($innervalue) }}">
                                                    <input
                                                        type="hidden"
                                                        name="question1"
                                                        id="question{{ $notes_counter }}"
                                                        value="{{ json_encode($key) }}">
                                                    <tbody>
                                                        <tr>
                                                            @if($key == 'Disclosure_Information')
                                                            <td>
                                                                <h4 class="mb-0 text-danger">{{ str_replace('_','  ',$key) }}
                                                                </h4>
                                                            </td>
                                                            @else
                                                            <td>
                                                                <h4 class="mb-0">{{ str_replace('_','  ',$key) }}
                                                                </h4>
                                                            </td>
                                                            @endif
                                                            <td>
                                                            <select name="{{ $key }}" id="da{{ $notes_counter }}" class="form-control" required>
                                                                <option value="">Select anyone</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                                <option value="N/A">N/A</option>
                                                            </select>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type="text"
                                                                    placeholder="Notes:"
                                                                    id="note{{ $notes_counter }}"
                                                                    name="{{ $key }}[]"
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                    </tbody>

                                                    @endforeach @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for Introducation :
                                                    <span class="introduction_count_total">
                                                        0% / 100%</span></h5>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="tab_da" id="vulnerability">
                                        <div class="text-primary font-14">
                                            <div class="text-primary">
                                                <h5>
                                                    <strong>vulnerability</strong>
                                                </h5>
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    <input
                                                        type="hidden"
                                                        name="debt_type"
                                                        id="debt_type_two"
                                                        value="vulnerability">
                                                    @foreach($da_vulnerability as $key => $value) @foreach($value as
                                                    $innerkey=>$innervalue)
                                                    <input
                                                        type="hidden"
                                                        name="{{ json_encode($key) }}"
                                                        id="weight{{ $notes_counter }}"
                                                        value="{{ json_encode($innervalue) }}">
                                                    <input
                                                        type="hidden"
                                                        name="question1"
                                                        id="question{{ $notes_counter }}"
                                                        value="{{ json_encode($key) }}">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h4 class="mb-0 text-danger">{{ str_replace('_','  ',$key) }}</h4>
                                                            </td>
                                                            <td>
                                                            <select name="{{ $key }}" id="da{{ $notes_counter }}" class="form-control" required>
                                                                <option value="">Select one</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                                <option value="N/A">N/A</option>
                                                            </select>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type="text"
                                                                    placeholder="Notes:"
                                                                    id="note{{ $notes_counter }}"
                                                                    name="{{ $key }}[]"
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                    </tbody>
                                                    @endforeach @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for Vulnerability :
                                                    <span class="vulnerability_count_total">
                                                        0% / 100%</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab_da" id="fact_find">
                                        <div class="text-primary font-14">
                                            <div class="text-primary">
                                                <h5>
                                                    <strong>fact find</strong>
                                                </h5>
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    <input
                                                        type="hidden"
                                                        name="debt_type"
                                                        id="debt_type_three"
                                                        value="fact_find">
                                                    @foreach($da_fact_find as $key => $value) @foreach($value as
                                                    $innerkey=>$innervalue)
                                                    <input
                                                        type="hidden"
                                                        name="{{ json_encode($key) }}"
                                                        id="weight{{ $notes_counter }}"
                                                        value="{{ json_encode($innervalue) }}">
                                                    <input
                                                        type="hidden"
                                                        name="question1"
                                                        id="question{{ $notes_counter }}"
                                                        value="{{ json_encode($key) }}">
                                                    <tbody>
                                                        <tr>
                                                            @if($key == 'Car_Finance' || $key =='Review_Debts')
                                                            <td>
                                                                <h4 class="mb-0 text-danger">{{ str_replace('_','  ',$key) }}</h4>
                                                            </td>
                                                            @else
                                                            <td>
                                                                <h4 class="mb-0">{{ str_replace('_','  ',$key) }}</h4>
                                                            </td>
                                                            @endif
                                                            <td>
                                                                <select name="{{ $key }}" id="da{{ $notes_counter }}" class="form-control" required>
                                                                <option value="">Select one</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                                <option value="N/A">N/A</option>
                                                            </select>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type="text"
                                                                    placeholder="Notes:"
                                                                    id="note{{ $notes_counter }}"
                                                                    name="{{ $key }}[]"
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                    </tbody>
                                                    @endforeach @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for Fact find :
                                                    <span class="fact_find_count">
                                                        0% / 100%</span></h5>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="tab_da" id="solution">
                                        <div class="text-primary font-14">
                                            <div class="text-primary">
                                                <h5>
                                                    <strong>Solution</strong>
                                                </h5>
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    <input type="hidden" name="debt_type" id="debt_type_four" value="solution">
                                                    @foreach($da_solution as $key => $value) @foreach($value as
                                                    $innerkey=>$innervalue)
                                                    <input
                                                        type="hidden"
                                                        name="{{ json_encode($key) }}"
                                                        id="weight{{ $notes_counter }}"
                                                        value="{{ json_encode($innervalue) }}">
                                                    <input
                                                        type="hidden"
                                                        name="question1"
                                                        id="question{{ $notes_counter }}"
                                                        value="{{ json_encode($key) }}">
                                                    <tbody>
                                                        <tr>
                                                            @if($key == 'Explain_All_solutions_effect_credit_rating')
                                                            <td>
                                                                <h4 class="mb-0 text-danger">{{ str_replace('_','  ',$key) }}</h4>
                                                            </td>
                                                            @else 
                                                            <td>
                                                                <h4 class="mb-0">{{ str_replace('_','  ',$key) }}</h4>
                                                            </td>
                                                            @endif
                                                            <td>
                                                                <select name="{{ $key }}" id="da{{ $notes_counter }}" class="form-control" required>
                                                                <option value="">Select one</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                                <option value="N/A">N/A</option>
                                                            </select>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type="text"
                                                                    placeholder="Notes:"
                                                                    id="note{{ $notes_counter }}"
                                                                    name="{{ $key }}[]"
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                    </tbody>
                                                    @endforeach @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for Solution :
                                                    <span class="solution_count">
                                                        0% / 100%</span></h5>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="tab_da" id="documentation">
                                        <div class="text-primary font-14">
                                            <div class="text-primary">
                                                <h5>
                                                    <strong>Documentation</strong>
                                                </h5>
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    <input
                                                        type="hidden"
                                                        name="debt_type"
                                                        id="debt_type_five"
                                                        value="documentation">
                                                    @foreach($da_documentation as $key => $value) @foreach($value as
                                                    $innerkey=>$innervalue)
                                                    <input
                                                        type="hidden"
                                                        name="{{ json_encode($key) }}"
                                                        id="weight{{ $notes_counter }}"
                                                        value="{{ json_encode($innervalue) }}">
                                                    <input
                                                        type="hidden"
                                                        name="question1"
                                                        id="question{{ $notes_counter }}"
                                                        value="{{ json_encode($key) }}">
                                                    <tbody>
                                                        <tr>
                                                            
                                                            <td>
                                                                <h4 class="mb-0 text-danger">{{ str_replace('_','  ',$key) }}</h4>
                                                            </td>
                                                            <td>
                                                                <select name="{{ $key }}" id="da{{ $notes_counter }}" class="form-control" required>
                                                                <option value="">Select one</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                                <option value="N/A">N/A</option>
                                                            </select>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type="text"
                                                                    placeholder="Notes:"
                                                                    id="note{{ $notes_counter }}"
                                                                    name="{{ $key }}[]"
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                    </tbody>
                                                    @endforeach @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for Documentation :
                                                    <span class="documention_count">
                                                        0% / 100%</span></h5>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="tab_da" id="confirmation">
                                        <div class="text-primary font-14">
                                            <div class="text-primary">
                                                <h5>
                                                    <strong>Confirmation</strong>
                                                </h5>
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    <input
                                                        type="hidden"
                                                        name="debt_type"
                                                        id="debt_type_six"
                                                        value="confirmation">
                                                    @foreach($da_confirmation as $key => $value) @foreach($value as
                                                    $innerkey=>$innervalue)
                                                    <input
                                                        type="hidden"
                                                        name="{{ json_encode($key) }}"
                                                        id="weight{{ $notes_counter }}"
                                                        value="{{ json_encode($innervalue) }}">
                                                    <input
                                                        type="hidden"
                                                        name="question1"
                                                        id="question{{ $notes_counter }}"
                                                        value="{{ json_encode($key) }}">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h4 class="mb-0 text-danger">{{ str_replace('_','  ',$key) }}</h4>
                                                            </td>
                                                            <td>
                                                                <select name="{{ $key }}" id="da{{ $notes_counter }}" class="form-control" required>
                                                                <option value="">Select one</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                                <option value="N/A">N/A</option>
                                                            </select>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type="text"
                                                                    placeholder="Notes:"
                                                                    id="note{{ $notes_counter }}"
                                                                    name="{{ $key }}[]"
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                    </tbody>
                                                    @endforeach @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for Confirmation :
                                                    <span class="confirmation_of_sale_count">
                                                        0% / 100%</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab_da" id="score">
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h5>overall</h5>
                                                        <h1 class="view_case_result text-danger"></h1>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5>Result</h5>
                                                        <h1 class="view_pass_fail_compliance"></h1>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <h5 class="mb-3">Critical fail Details:</h5>
                                                    <textarea
                                                        name="critical_fail_detail"
                                                        id="critical_fail_detail"
                                                        placeholder="N/A"
                                                        class="form-control critical_textarea"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                    <h5 class="mb-3">Feedback declaration</h5>
                                                    <textarea
                                                        style="min-height:315px !important;"
                                                        name="feedback_dec"
                                                        id="feedback_dec"
                                                        placeholder="Notes:"
                                                        class="form-control feedbacktextarea"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
    
                            {{-- New code end here --}}
                            <div class="tab_da" id="button" style="display: block;">
                                <div class="modal-footer mb-4 mt-4">
                                    <div class="buttons d-flex justify-content-end float-right">
                                        <button
                                            type="submit"
                                            name="prev_da"
                                            id="prev_da"
                                            class=" btn btn-bordered-primary run_da  bg-none"
                                            value="Prev"
                                            onclick="nextPrevDa(-1);return false;"
                                            >Prev
                                        </button>
                                        <button
                                            type="submit"
                                            name="next_da_compliance"
                                            id="next_da"
                                            class=" btn btn-bordered-primary run_da  bg-none"
                                            value="Next"
                                            onclick="nextPrevDa(1);return false;"
                                            >
                                            Next
                                        </button>
                                         <a href="" id="get_da_view_case" class="btn btn-bordered-primary">View Case</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- D_A quality modal end -->


<script>

   $('#search_value').keyup(function(e){
        $(document).on('keypress',function(e) {
            if(e.which == 13) {
                e.preventDefault();
                return false;
            }
        });
         
        var get_serach_value = $('#search_value').val();
        
        var ajax_url = $("#full_report").attr("data-ajax-url");

        var date_range = $('#date_range').val();
        var data = {};

        if(date_range != '')
            data['date_range'] = date_range;

            $.ajax({

                type: 'GET',

                url:ajax_url,

                async: true,

                 data: {get_serach_value : get_serach_value},

                contentType: "application/json; charset=utf-8",

                dataType: "json",

                success:function(data)

                {

                    if(data !== null && data.length > 0)

                    {

                        var tableData = [];

                        var user1 = [];



                        jQuery(data).each(function(i, item){

                            var userSignInDate=item.userSignInDate;

                            var user_id=item.user_id;

                            var name=item.name;

                            var tel=item.tel;

                            var email=item.email;

                            var debts_level = item.debtLevel;

                            var case_status = item.zCaseType;
                            
                            var userCaseType = item.userCaseType;

                             var enable_text=item.enable_text;



                             var user1 = {

                                'userSignInDate':userSignInDate,

                                'user_id':user_id,

                                'name':name,

                                'tel':tel,

                                'email':email,

                                'debts_level':debts_level,

                                'case_status':case_status,
                                
                                'userCaseType' : userCaseType,

                                'enable_text':enable_text

                                };

                                 tableData.push(user1);



                        });



                         var table=$("#full_report").DataTable({

                            "dom": '<"float-left"l><"float-right"f>rt<"row"<"col-sm-4"><"col-sm-4"><"col-sm-4"p>>',

                            "lengthChange": true, "lengthMenu": [[10, 20, 30, 40, -1], [10, 20, 30, 40, "All"]],

                            data: tableData, // this is to be based on your json structure
                            
                            "bDestroy": true,

                            columns: [

                            { data: "userSignInDate" },

                            { data: "user_id" },

                            { data: "name" },

                            { data: "tel"},

                            { data: "email"},

                            { data: "debts_level"},

                            { data:  "case_status"},
                            
                            { data : "userCaseType"},

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

                    }     

                }

            });

        

       



        });

        // $('#report_search').keyup(function(){

        //         table.search($(this).val()).draw();

        //  });



        // $(document).on("keyup", "#search", function(){

        //     table.ajax.reload();

        // });

    

</script>


<script type="text/javascript">
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
                yearRange: '1950:2040', 
                onSelect: function(dateText, inst) {
                        var date = $(this).val();
                        
                        $("#appointmentDate").val(date.toString());
                    }
        });
    });
</script>


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
     
    </script>



    <script type="text/javascript">
    $(document).on('click', '.viewUserEvidanceFromList', function(){
        var viewDebtsUserId = $(this).data('user_id');
        $.ajax({
            url:'{{ route('user.getChecklistData') }}',
            type:'post',
            data:{_token:'{{csrf_token()}}',userId:viewDebtsUserId},
            success:function(data)
            {
                $('#view_user_checklist_from_list_div').html('');
                $('#view_user_checklist_from_list_div').html(data);
                $('#view_user_evidance_from_list').show();
                
            }
        });
    });
    $("#view_user_evidance_from_list .close").click(function(){
        $("#view_user_evidance_from_list").hide();
    })
     
    </script>

<script type="text/javascript">
    $('.save_appointment').click(function(){
            var userId=$('#userId').val();
            var userName=$('#userName').val();
            var caseStatus=$('#caseStatus').val();
            var appointmentDate=$('#appointmentDate').val();
            var is_send;
            var hour=$('#hour').val();
            var minute=$('#minute').val();
            var message=$('#message').val();
            var check = $('#check_value');
            if (check.is(':checked')) {
                is_send = 1;
            } else {
                is_send = 0;
            }
        
        $.ajax({
            url:'{{ route('user.change_case_status_appointment') }}',
            type:'post',
            data:{_token:'{{csrf_token()}}',userId:userId,userName:userName,caseStatus:caseStatus,appointmentDate:appointmentDate,hour:hour,minute:minute,message:message,is_send:is_send},
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


<script type="text/javascript">
    
    //D.N.C popup code start here

    $(document).on('click','.check_dnc',function()
    {

        var userId = $(this).attr('data-userId');

        var case_status = $(this).attr('data-case-status');
        
        $('#dnc').modal('show');

         var dnc_route = '{{ URL::to('user/change-status/') }}/'+userId+'/'+case_status;

         $('.get-dnc-route').attr('href',dnc_route);

    });

    //D.N.C popup code end here


    // D.R.O popup code start here


    $(document).on('click','.check_dro',function()
    {
        var userId = $(this).attr('data-userId');

        var case_status = $(this).attr('data-case-status');
        
        $('#dro').modal('show');

        var dro_route = '{{ URL::to('user/change-status/') }}/'+userId+'/'+case_status;

        $('.get-dro-route').attr('href',dro_route);
    });


    // D.R.O popup code end here        


    // Not Intrested popup code start here


    $(document).on('click','.check_notintrested',function()
    {
        var userId = $(this).attr('data-userId');

        var case_status = $(this).attr('data-case-status');
        
        $('#notintrested').modal('show');

        var not_intrested_route = '{{ URL::to('user/change-status/') }}/'+userId+'/'+case_status;

        $('.get-notintrested-route').attr('href',not_intrested_route);
    });


    // Not Intrested popup code end here  


    //enter view case code start here         


    $(document).on('click','.view_case',function()
    {
        var userId = $(this).attr('data-userId');
        
        $('#view').modal('show');
        
        var view_case_route = '{{ URL::to('user/view/') }}/'+userId;
         
         $('#get_viewcase').attr('href',view_case_route);
    });


    //enter view case code end here


    //changeday code start here(messageday1,2,3 inprocessdat1,2,3 awaitingdocsday1,2,3) 

    $(document).on('click','.changeday',function()
    {
            // get_route

    var userId = $(this).attr('data-userId');
    var case_status = $(this).attr('data-status');

    $('#chnageday').modal('show');

    var changeday_route = '{{ URL::to('user/change-status-day/') }}/'+userId+'/'+case_status;

    $('.get_route').attr('href',changeday_route);


    });

    //changeday code end here(messageday1,2,3 inprocessdat1,2,3 awaitingdocsday1,2,3)


</script>


<!-------Solution and Account popupo for account user jqeury ajacx code 

Author:Raj Abhishek
Date:08-02-2020

----------->

<script type="text/javascript">
    $(document).on('click','.viewUserSolution',function()
    {
        var Solution_id = $(this).attr('data-user_id');

      
        $('#solution_id').val(Solution_id);

        $('#account_id').val(Solution_id);
        
       $('#solution_popup').modal('show');

       $.ajax({

            url:'{{route('user.UserSolutionData')}}',
            method:'get',
            data:{_token:'{{csrf_token()}}',Solution_id:Solution_id},
            success:function(data)
            {
               var data = JSON.parse(data);

                $('#solution_data').text(data.solutionType);

                $('#insolvency_data').text(data.insolvency);

                $('#monthly_payment').val(data.payment);

                $('#start_date').val(data.startDate);

                $('#end_date').val(data.endDate);

               
            }
       });


       $.ajax({

            url:'{{route('user.UserAccountData')}}',
            method:'get',
            data:{_token:'{{csrf_token()}}',account_id:Solution_id},
            success:function(data)
            {
                 var data = JSON.parse(data);

                $('#fee').val(data.fee);

                $('#due_date').val(data.dueDate);

                $('#clawback').val(data.clawBack);

                $('#cancelled_date').val(data.cancelledDate);

            }
       });

    });
</script>




<!-----------Code End for Solution and Account jqury ajac code here -------------->

<script type="text/javascript">

    $(document).on('click','#soluton_form',function(e){
        e.preventDefault();

       var userId = $('#solution_id').val();



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
                       location.reload();

                    
                }
        });
});

</script>

<script type="text/javascript">
    $(document).on('click','#account_popup_submit',function(e){
        e.preventDefault();

        

        var userId = $('#account_id').val();
        var fee = $('#fee').val();
        var due_date = $('#due_date').val();
        var clawback = $('#clawback').val();
        var cancelled_date = $('#cancelled_date').val();

        $.ajax({
            url:'{{route('user.save_account')}}',
            method:'post',
            data:{
                _token:"{{ csrf_token() }}",
                userId:userId,
                fee:fee,
                due_date:due_date,
                clawback:clawback,
                cancelled_date:cancelled_date
            },
            dataType:'json',
            success:function(data)
            {
                 var messageIcon = 'error';
                      if (data == 'success') {
                        
                         var message = 'Account saved successfully';
                         var messageIcon = 'success';
                     } else {
                        var message = 'something wrong please try again';
                    }
                     swal(message, {
                       icon: messageIcon,
                     });
                     location.reload();

                
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
       $(document).on('click','.case_status-change',function(e){
           e.preventDefault();
             var case_status_name=$(this).text();

           var userId=$('#solution_id').val();

              $.ajax({
    
                url:'{{ route('user.update_case_status') }}',
                method:'post',
                data:{_token: '{{csrf_token()}}',case_status_name:case_status_name,userId:userId},
                dataType:'json',
                success:function(data)
                {
                     var messageIcon = 'error';
                            if(data == 'success') {
                                    var message = 'case update successfully';
                                     var messageIcon = 'success';
                                } else {
                                    var message = 'something wrong please try again';
                                }
                                swal(message, {
                                icon: messageIcon,
                                });
                                window.location = '{{ URL::to('/user') }}';
                }
            });
       });
    });
</script>

<!-- Da Qaulity popup code start here -->

<script type="text/javascript">
    $(document).on('click','.da_quality_popup',function()
    {
        var userId = $(this).attr('data-userId');
        
        $('#userId_da').val(userId);
        $('#D_A_quality').modal('show');
    });
</script>

<script type="text/javascript">
    $(document).on('click','.case_deleted',function()
    {
        
        var userId = $(this).attr('data-userId');

        $('#deleted_userid').val(userId);
        
        $('#delete_case').modal('show');

        // var delete_route = '{{ URL::to('user/delete/') }}/'+userId;

         // $('.get_delete').attr('href',changeday_route);


    });
</script>

<script>
 $(document).on('change', '.change_user_zcase_type_by_class', function(){
    //   var js_selected_case_status = $('.change_user_zcase_type_by_class :selected').val();
        var js_selected_case_status = $(this).val();
        // alert(js_selected_case_status);
       var js_selected_case_status_user_id = $(this).attr('data-user_id');
       
        var js_status_url = '{{ route("change_case_status_by_selected_status", [":user_id", ":case_status"]) }}';
        js_status_url = js_status_url.replace(':user_id', js_selected_case_status_user_id);
        js_status_url = js_status_url.replace(':case_status', js_selected_case_status);
        
        $('#change_user_z_case_type_common_modal_a_tag').attr('href', '');
        $('#change_user_z_case_type_common_modal_a_tag').attr('href', js_status_url);
        $('#change_user_z_case_type_common_modal').modal('show');
        /*alert(' js_selected_case_status => ' + js_selected_case_status + ' js_selected_case_status_user_id => ' + js_selected_case_status_user_id + ' || js_status_url => ' + js_status_url);
        return false;*/
    });
</script>

<script type="text/javascript">
    $(document).on('click','.get_delete',function(e)
    {   
        e.preventDefault();
        var userId = $('#deleted_userid').val();

        $.ajax({
             headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '{{ route('user.delete_user') }}',
            method:'post',
            data : {userId : userId},
            datatype : 'json',
            success:function(data)
            {    
                    var message = 'Case Delete Successfully';
                    var messageIcon = 'success';
                    
                swal(message, {
                  icon: messageIcon,
                });

                location.reload();
            }

        })
    });
</script>


{{-- <script type="text/javascript">
    $(document).on('change','.search_record',function()
    {
        var value = $(this).val();

        $.ajax({
            url : '{{ route('get_full_report') }}',
            method : 'POST',
            data : {value : value},
            dataType : 'JSON',
            success : function(data)
            {
                alert(data);
            }
        });

    });
    
</script> --}}



  {{-- da next prev nextPrevDa --}}

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTabDa(currentTab); // Display the current tab
        
        function showTabDa(n) {
            
          // This function will display the specified tab of the form...
          var x = document.getElementsByClassName("tab_da");
          x[n].style.display = "block";
          
          if (n == 0) {
            document.getElementById("prev_da").style.display = "none";
          } else {
            document.getElementById("prev_da").style.display = "inline";
          }
          
        }
        function nextPrevDa(n) {
            // event.preventDefault(); 
          // This function will figure out which tab to display
          var x = document.getElementsByClassName("tab_da");
          
        //   document.getElementById('prev_da').disabled = false;
   
          
          // Exit the function if any field in the current tab is invalid:
          if (n == 1 && !validateFormDa()) return false;
          
          //add class for list slide form submit
                var addClassForSubmit = document.getElementsByClassName('run_da');
                var nextClassSubmit = addClassForSubmit[1];
            currentActiveTab = x[currentTab].attributes[1];
            if(currentActiveTab.value == `confirmation`) {
                
                console.log(nextClassSubmit);
                // nextClassSubmit.addClass('submit_form_compliance');
                nextClassSubmit.classList.add('submit_form');
                document.getElementById('prev_da').style.display = 'none';
                document.getElementById('next_da').style.display = 'none';
            }else{
                nextClassSubmit.classList.remove('submit_form');
                document.getElementById('next_da').style.display = 'block';
            }
          // Hide the current tab:
          x[currentTab].style.display = "none";
          currentTab = currentTab + n;
          
          showTabDa(currentTab);
        }
        function validateFormDa() {
          // This function deals with validation of the form fields
          var x, y, i, valid = true;
          x = document.getElementsByClassName("tab_da");   
          y = x[currentTab].getElementsByTagName("select");
          
          // A loop that checks every input field in the current tab:
          for (i = 0; i < y.length; i++) {
            if (y[i].value == "") {
              valid = false;
            }
          }
          return valid; // return the valid status
        }
        
        </script>

    
    {{-- Save Da Quality save code start here --}}

    <script>
        $(document).on('click','.submit_form',function(e)
        {
            e.preventDefault();

            var question = [];
            var is_passed = [];
            var notes = [];
            var weight = [];
            var debt_type = [];

            var userId = $('#userId_da').val();

            var data_of_call = $('#data_of_call').val();
            var date_scored_get = $('#date_scored').val();

            var debt_type1 = $('#debt_type').val();
            console.log(debt_type1);

            var question1 = $('#question1').val();
            question1 = question1.replace(/\d+/g, '');
            var is_passed1 = $('#da1 :selected').val();
            var notes1 = $('#note1').val();
            var weight1 = $('#weight1').val();

            if(is_passed1 == '' || is_passed1 == null){
                is_passed1 = null;
            }

            question.push(question1);
            is_passed.push(is_passed1);
            notes.push(notes1);
            weight.push(weight1);
            debt_type.push(debt_type1);

            var question2 = $('#question2').val();
            question2 = question2.replace(/\d+/g, '');
            var is_passed2 = $('#da2 :selected').val();
            var notes2 = $('#note2').val();
            var weight2 = $('#weight2').val();

            if(is_passed2 == '' || is_passed2 == null){
                is_passed2 = null;
            }

            question.push(question2);
            is_passed.push(is_passed2);
            notes.push(notes2);
            weight.push(weight2);
            debt_type.push(debt_type1);

            var question3 = $('#question3').val();
            question3 = question3.replace(/\d+/g, '');
            var is_passed3 = $('#da3 :selected').val();
            var notes3 = $('#note3').val();
            var weight3 = $('#weight3').val();

            if(is_passed3 == '' || is_passed3 == null){
                is_passed3 = null;
            }

            question.push(question3);
            is_passed.push(is_passed3);
            notes.push(notes3);
            weight.push(weight3);
            debt_type.push(debt_type1);

            

            var question4 = $('#question4').val();
            question4 = question4.replace(/\d+/g, '');
            var is_passed4 = $('#da4 :selected').val();
            var notes4 = $('#note4').val();
            var weight4 = $('#weight4').val();

            if(is_passed4 == '' || is_passed4 == null){
                is_passed4 = null;
            }

            question.push(question4);
            is_passed.push(is_passed4);
            notes.push(notes4);
            weight.push(weight4);
            debt_type.push(debt_type1);

            

            var question5 = $('#question5').val();
            question5 = question5.replace(/\d+/g, '');
            var is_passed5 = $('#da5 :selected').val();
            var notes5 = $('#note5').val();
            var weight5 = $('#weight5').val();

            if(is_passed5 == '' || is_passed5 == null){
                is_passed5 = null;
            }

            question.push(question5);
            is_passed.push(is_passed5);
            notes.push(notes5);
            weight.push(weight5);
            debt_type.push(debt_type1);

            var debt_type2 = $('#debt_type_two').val();

            var question6 = $('#question6').val();
            question6 = question6.replace(/\d+/g, '');
            var is_passed6 = $('#da6 :selected').val();
            var notes6 = $('#note6').val();
            var weight6 = $('#weight6').val();

            if(is_passed6 == '' || is_passed6 == null){
                is_passed6 = null;
            }

            question.push(question6);
            is_passed.push(is_passed6);
            notes.push(notes6);
            weight.push(weight6);
            debt_type.push(debt_type2);

            var debt_type3 = $('#debt_type_three').val();

            var question7 = $('#question7').val();
            question7 = question7.replace(/\d+/g, '');
            var is_passed7 = $('#da7 :selected').val();
            var notes7 = $('#note7').val();
            var weight7 = $('#weight7').val();

            if(is_passed7 == '' || is_passed7 == null){
                is_passed7 = null;
            }

            question.push(question7);
            is_passed.push(is_passed7);
            notes.push(notes7);
            weight.push(weight7);
            debt_type.push(debt_type3);

            var question8 = $('#question8').val();
            question8 = question8.replace(/\d+/g, '');
            var is_passed8 = $('#da8 :selected').val();
            var notes8 = $('#note8').val();
            var weight8 = $('#weight8').val();

            if(is_passed8 == '' || is_passed8 == null){
                is_passed8 = null;
            }

            question.push(question8);
            is_passed.push(is_passed8);
            notes.push(notes8);
            weight.push(weight8);
            debt_type.push(debt_type3);

            var question9 = $('#question9').val();
            question9 = question9.replace(/\d+/g, '');
            var is_passed9 = $('#da9 :selected').val();
            var notes9 = $('#note9').val();
            var weight9 = $('#weight9').val();

            if(is_passed9 == '' || is_passed9 == null){
                is_passed9 = null;
            }

            question.push(question9);
            is_passed.push(is_passed9);
            notes.push(notes9);
            weight.push(weight9);
            debt_type.push(debt_type3);

            var question10 = $('#question10').val();
            question10 = question10.replace(/\d+/g, '');
            var is_passed10 = $('#da10 :selected').val();
            var notes10 = $('#note10').val();
            var weight10 = $('#weight10').val();

            if(is_passed10 == '' || is_passed10 == null){
                is_passed10 = null;
            }

            question.push(question10);
            is_passed.push(is_passed10);
            notes.push(notes10);
            weight.push(weight10);
            debt_type.push(debt_type3);

            var question11 = $('#question11').val();
            question11 = question11.replace(/\d+/g, '');
            var is_passed11 = $('#da11 :selected').val();
            var notes11 = $('#note11').val();
            var weight11 = $('#weight11').val();

            if(is_passed11 == '' || is_passed11 == null){
                is_passed11 = null;
            }

            question.push(question11);
            is_passed.push(is_passed11);
            notes.push(notes11);
            weight.push(weight11);
            debt_type.push(debt_type3);

            var question12 = $('#question12').val();
            question12 = question12.replace(/\d+/g, '');
            var is_passed12 = $('#da12 :selected').val();
            var notes12 = $('#note12').val();
            var weight12 = $('#weight12').val();

            if(is_passed12 == '' || is_passed12 == null){
                is_passed12 = null;
            }

            question.push(question12);
            is_passed.push(is_passed12);
            notes.push(notes12);
            weight.push(weight12);
            debt_type.push(debt_type3);

            var question13 = $('#question13').val();
            question13 = question13.replace(/\d+/g, '');
            var is_passed13 = $('#da13 :selected').val();
            var notes13 = $('#note13').val();
            var weight13 = $('#weight13').val();

            if(is_passed13 == '' || is_passed13 == null){
                is_passed13 = null;
            }

            question.push(question13);
            is_passed.push(is_passed13);
            notes.push(notes13);
            weight.push(weight13);
            debt_type.push(debt_type3);

            var question14 = $('#question14').val();
            question14 = question14.replace(/\d+/g, '');
            var is_passed14 = $('#da14 :selected').val();
            var notes14 = $('#note14').val();
            var weight14 = $('#weight14').val();

            if(is_passed14 == '' || is_passed14 == null){
                is_passed14 = null;
            }

            question.push(question14);
            is_passed.push(is_passed14);
            notes.push(notes14);
            weight.push(weight14);
            debt_type.push(debt_type3);

            var question15 = $('#question15').val();
            question15 = question15.replace(/\d+/g, '');
            var is_passed15 = $('#da15 :selected').val();
            var notes15 = $('#note15').val();
            var weight15 = $('#weight15').val();

            if(is_passed15 == '' || is_passed15 == null){
                is_passed15 = null;
            }

            question.push(question15);
            is_passed.push(is_passed15);
            notes.push(notes15);
            weight.push(weight15);
            debt_type.push(debt_type3);

            var debt_type4 = $('#debt_type_four').val();

            var question16 = $('#question16').val();
            question16 = question16.replace(/\d+/g, '');
            var is_passed16 = $('#da16 :selected').val();
            var notes16 = $('#note16').val();
            var weight16 = $('#weight16').val();

            if(is_passed16 == '' || is_passed16 == null){
                is_passed16 = null;
            }

            question.push(question16);
            is_passed.push(is_passed16);
            notes.push(notes16);
            weight.push(weight16);
            debt_type.push(debt_type4);

            var question17 = $('#question17').val();
            question17 = question17.replace(/\d+/g, '');
            var is_passed17 = $('#da17 :selected').val();
            var notes17 = $('#note17').val();
            var weight17 = $('#weight17').val();

            if(is_passed17 == '' || is_passed17 == null){
                is_passed17 = null;
            }

            question.push(question17);
            is_passed.push(is_passed17);
            notes.push(notes17);
            weight.push(weight17);
            debt_type.push(debt_type4);

            var question18 = $('#question18').val();
            question18 = question18.replace(/\d+/g, '');
            var is_passed18 = $('#da18 :selected').val();
            var notes18 = $('#note18').val();
            var weight18 = $('#weight18').val();

            if(is_passed18 == '' || is_passed18 == null){
                is_passed18 = null;
            }

            question.push(question18);
            is_passed.push(is_passed18);
            notes.push(notes18);
            weight.push(weight18);
            debt_type.push(debt_type4);

            var question19 = $('#question19').val();
            question19 = question19.replace(/\d+/g, '');
            var is_passed19 = $('#da19 :selected').val();
            var notes19 = $('#note19').val();
            var weight19 = $('#weight19').val();

            if(is_passed19 == '' || is_passed19 == null){
                is_passed19 = null;
            }

            question.push(question19);
            is_passed.push(is_passed19);
            notes.push(notes19);
            weight.push(weight19);
            debt_type.push(debt_type4);

            var question20 = $('#question20').val();
            question20 = question20.replace(/\d+/g, '');
            var is_passed20 = $('#da20 :selected').val();
            var notes20 = $('#note20').val();
            var weight20 = $('#weight20').val();

            if(is_passed20 == '' || is_passed20 == null){
                is_passed20 = null;
            }

            question.push(question20);
            is_passed.push(is_passed20);
            notes.push(notes20);
            weight.push(weight20);
            debt_type.push(debt_type4);

            var debt_type5 = $('#debt_type_five').val();

            var question21 = $('#question21').val();
            question21 = question21.replace(/\d+/g, '');
            var is_passed21 = $('#da21 :selected').val();
            var notes21 = $('#note21').val();
            var weight21 = $('#weight21').val();

            if(is_passed21 == '' || is_passed21 == null){
                is_passed21 = null;
            }

            question.push(question21);
            is_passed.push(is_passed21);
            notes.push(notes21);
            weight.push(weight21);
            debt_type.push(debt_type5);

            var question22 = $('#question22').val();
            question22 = question22.replace(/\d+/g, '');
            var is_passed22 = $('#da22 :selected').val();
            var notes22 = $('#note22').val();
            var weight22 = $('#weight22').val();

            if(is_passed22 == '' || is_passed22 == null){
                is_passed22 = null;
            }

            question.push(question22);
            is_passed.push(is_passed22);
            notes.push(notes22);
            weight.push(weight22);
            debt_type.push(debt_type5);

            var question23 = $('#question23').val();
            question23 = question23.replace(/\d+/g, '');
            var is_passed23 = $('#da23 :selected').val();
            var notes23 = $('#note23').val();
            var weight23 = $('#weight23').val();

            if(is_passed23 == '' || is_passed23 == null){
                is_passed23 = null;
            }

            question.push(question23);
            is_passed.push(is_passed23);
            notes.push(notes23);
            weight.push(weight23);
            debt_type.push(debt_type5);

            var question24 = $('#question24').val();
            question24 = question24.replace(/\d+/g, '');
            var is_passed24 = $('#da24 :selected').val();
            var notes24 = $('#note24').val();
            var weight24 = $('#weight24').val();

            if(is_passed24 == '' || is_passed24 == null){
                is_passed24 = null;
            }

            question.push(question24);
            is_passed.push(is_passed24);
            notes.push(notes24);
            weight.push(weight24);
            debt_type.push(debt_type5);

            var question25 = $('#question25').val();
            question25 = question25.replace(/\d+/g, '');
            var is_passed25 = $('#da25 :selected').val();
            var notes25 = $('#note25').val();
            var weight25 = $('#weight25').val();

            if(is_passed25 == '' || is_passed25 == null){
                is_passed25 = null;
            }

            question.push(question25);
            is_passed.push(is_passed25);
            notes.push(notes25);
            weight.push(weight25);
            debt_type.push(debt_type5);

            var question26 = $('#question26').val();
            question26 = question26.replace(/\d+/g, '');
            var is_passed26 = $('#da26 :selected').val();
            var notes26 = $('#note26').val();
            var weight26 = $('#weight26').val();

            if(is_passed26 == '' || is_passed26 == null){
                is_passed26 = null;
            }

            question.push(question26);
            is_passed.push(is_passed26);
            notes.push(notes26);
            weight.push(weight26);
            debt_type.push(debt_type5);

            var question27 = $('#question27').val();
            question27 = question27.replace(/\d+/g, '');
            var is_passed27 = $('#da27 :selected').val();
            var notes27 = $('#note27').val();
            var weight27 = $('#weight27').val();

            if(is_passed27 == '' || is_passed27 == null){
                is_passed27 = null;
            }

            question.push(question27);
            is_passed.push(is_passed27);
            notes.push(notes27);
            weight.push(weight27);
            debt_type.push(debt_type5);

            var debt_type6 = $('#debt_type_six').val();

            var question28 = $('#question28').val();
            question28 = question28.replace(/\d+/g, '');
            var is_passed28 = $('#da28 :selected').val();
            var notes28 = $('#note28').val();
            var weight28 = $('#weight28').val();

            if(is_passed28 == '' || is_passed28 == null){
                is_passed28 = null;
            }

            question.push(question28);
            is_passed.push(is_passed28);
            notes.push(notes28);
            weight.push(weight28);
            debt_type.push(debt_type6);

            var question29 = $('#question29').val();
            question29 = question29.replace(/\d+/g, '');
            var is_passed29 = $('#da29 :selected').val();
            var notes29 = $('#note29').val();
            var weight29 = $('#weight29').val();

            if(is_passed29 == '' || is_passed29 == null){
                is_passed29 = null;
            }
            
             var critical_fail_detail = $('#critical_fail_detail').val();
            var feedback = $('#feedback_dec').val();

            question.push(question29);
            is_passed.push(is_passed29);
            notes.push(notes29);
            weight.push(weight29);
            debt_type.push(debt_type6);
            

            console.log(question);
            console.log(is_passed);
            console.log(notes);
            console.log(weight);
            console.log(debt_type);

            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },  
                url : '{{ route('get_da_quality') }}',
                method : 'post',
                data : {
                    userId : userId,
                    data_of_call : data_of_call,
                    date_scored_get : date_scored_get,
                    debt_type : debt_type,
                    question : question,
                    is_passed : is_passed,
                    notes : notes,
                    weight : weight,
                    critical_fail_detail : critical_fail_detail,
                    feedback : feedback
                    
                },
                dataType : 'json',
                success : function(data)
                {
                    var messageIcon = 'error';
                    if (data == 'success') {
                        var message = 'Data save successfully';
                        var messageIcon = 'success'; 
                    } else {
                        var message = 'something wrong please try again'; 
                    }
                    swal(message, {
                        icon: messageIcon,
                    });
                    $.ajax({
                        url : '{{ route('load_da_data') }}',
                        method : 'get',
                        data : {userId : userId},
                        dataType : 'json',
                        success : function(data)
                        {
                            
                            var total = 0;

                            var introduction_count = JSON.parse(data.introduction_count);
                            $('.introduction_count_total').text(introduction_count + '% / 100%');

                            var vulnerability_count = JSON.parse(data.vulnerability_count);
                            $('.vulnerability_count_total').text(vulnerability_count + '% / 100%');

                            var fact_find_count = JSON.parse(data.fact_find_count);
                            $('.fact_find_count').text(Math.round(fact_find_count) +  '% / 100%');

                            var solution_count = JSON.parse(data.solution_count);
                            $('.solution_count').text(solution_count +  '% / 100%');

                            var documentation_count = JSON.parse(data.documentation_count);
                            $('.documention_count').text(documentation_count +  '% / 100%');

                            var confirmation_count = JSON.parse(data.confirmation_count);
                            $('.confirmation_of_sale_count').text(confirmation_count +  '% / 100%'); 


                            var introducation_result = JSON.parse(data.introduction_result);
                            var vulnerability_result = JSON.parse(data.vulnerability_result);
                            var fact_find_result = JSON.parse(data.fact_find_result);
                            var solution_result = JSON.parse(data.solution_result);
                            var documentation_result = JSON.parse(data.documentation_result);
                            var confirmation_result = JSON.parse(data.confirmation_result);

                            var fail_introduction = JSON.parse(data.fail_introduction);
                            var fail_vulnerability = JSON.parse(data.fail_vulnerability); 
                            var fail_fact_find = JSON.parse(data.fail_fact_find);
                            var fail_solution = JSON.parse(data.fail_solution);
                            var fail_documentation = JSON.parse(data.fail_documentation);
                            var fail_confirmation_sale = JSON.parse(data.fail_confirmation_sale);

                            var total = introducation_result + vulnerability_result + fact_find_result + solution_result + documentation_result + confirmation_result;

                            if(fail_introduction > 0 || fail_vulnerability > 0 || fail_fact_find > 0 || fail_solution > 0 || fail_documentation > 0 || fail_confirmation_sale > 0)
                            {
                                     var fail = 45;
                                     
                                     $('#date_scored_get').val(fail + '%');
                                      $('.view_case_result').text(fail + '%');
                                      $('.view_case_result').addClass('text-danger');
                                      $('.view_pass_fail').text('Critical Fail');
                                      $('.view_pass_fail').addClass('text-danger');
                            }
                            else
                            {
                                if(total == 45 || total <= 45) 
                                {
                                    // console.log('Hey this part called failed');
                                    // $('.view_case_result').text(total + '%');
                                    // $('#date_scored_get').val(fail + '%');
                                    // $('.view_pass_fail').text('FAIL'); 
                                        $('.view_case_result').text(fail + '%');
                                        $('.view_case_result').addClass('text-danger');
                                        $('.view_pass_fail').text('Critical Fail');
                                        $('.view_pass_fail').addClass('text-danger');
                                        $('#date_scored_get').val(fail + '%');   
                                                                
                                }
                                   
                                    $('#date_scored_get').val(total + '%');
                                    $('.view_case_result').text(total + '%');
                                    $('.view_case_result').removeClass('text-danger');
                                    $('.view_case_result').addClass('text-success');
                                    $('.pass_text').text('PASS');
                                    $('.view_pass_fail').text('PASS');
                                    $('.view_pass_fail').removeClass('text-danger');
                                    $('.view_pass_fail').addClass('text-success');
                            }

                            
                        }
                    });
                }
            })
        });
    </script



@endsection