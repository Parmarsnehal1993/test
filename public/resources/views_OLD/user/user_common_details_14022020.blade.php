@extends('layouts.app')
@section('content')
        
@php
    $loginUserData = Auth::user();
    unset($loginUserData->password);

    $loginUser = $loginUserData;
@endphp

@php
    //$awaitingdocsarr = array('A.W.N.C Day1', 'A.W.N.C Day2', 'A.W.N.C Day3', 'A.W.N.C Day4');
    //$inprocessdaysarr = array('I.P.N.C Day1', 'I.P.N.C Day2', 'I.P.N.C Day3', 'I.P.N.C Day4');
    $awaitingdocsarr = array('awaitingdocsday1', 'awaitingdocsday2', 'awaitingdocsday3', 'awaitingdocsday4');
    $inprocessdaysarr = array('inprocessday1', 'inprocessday2', 'inprocessday3', 'inprocessday4');
    $messagedayarr = array('messageday1', 'messageday2', 'messageday3', 'messageday4');
@endphp
<style type="text/css">
    .case_status-change {
        cursor: pointer;
    }
    .changeday {
        cursor: pointer;
    }
</style>
<div id="successMessage">
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
</div>
<div class="main-content pt-0">
    <div class="row mt--80">
        <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
            <div class="row bb-cr">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6  p-0">
                    <div class="main-title">
                        <h1 class="font-h1 d-flex align-items-center">
                            <strong>Case:</strong>
                            <span class="font-light">
                                {{ !empty($userInfo->name) ? $userInfo->name : '' }} {{ !empty($userInfo->surname) ? ' '.$userInfo->surname : '' }}
                            </span>
                            <!-- <span>
                                <div id="countdown2" class="pull-right"></div>
                            </span> -->
                        </h1>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6  p-0">
                    <div class="d-flex justify-content-end align-items-center nav-list mt-2">
                        <span class="item">Debts
                            <span class="dot dot-success"></span>
                        </span>
                        <span class="item">Income
                            <span class="dot dot-warning"></span>
                        </span>
                        <span class="item">Out goings
                            <span class="dot dot-danger"></span>
                        </span>
                        <span class="item">Evidence
                            <span class="dot dot-danger"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 15px;">
                <h4>
                    <strong class="font">Case Status:</strong>
                    <span class="text-warning">
                            @if(!empty($userInfo->zCaseType) && in_array($userInfo->zCaseType, $inprocessdaysarr))
                                @switch($userInfo->zCaseType)
                                    @case('inprocessday1')
                                        {{ "I.P.N.C Day1" }}
                                        @break

                                    @case('inprocessday2')
                                        {{ "I.P.N.C Day2" }}
                                        @break

                                    @case('inprocessday3')
                                        {{ "I.P.N.C Day3" }}
                                        @break

                                    @case('inprocessday4')
                                        {{ "I.P.N.C Day4" }}
                                        @break
                                @endswitch
                            @elseif(!empty($userInfo->zCaseType) && in_array($userInfo->zCaseType, $awaitingdocsarr))
                                @switch($userInfo->zCaseType)
                                    @case('awaitingdocsday1')
                                        {{ "A.W.N.C Day1" }}
                                        @break

                                    @case('awaitingdocsday2')
                                        {{ "A.W.N.C Day2" }}
                                        @break

                                    @case('awaitingdocsday3')
                                        {{ "A.W.N.C Day3" }}
                                        @break

                                    @case('awaitingdocsday4')
                                        {{ "A.W.N.C Day4" }}
                                        @break

                                    @default
                                        {{ "Awaiting Docs" }}
                                @endswitch
                            @else
                                @if(isset($userInfo->zCaseType)) {{$userInfo->zCaseType}} @else '' @endif</span>
                            @endif
                </h4>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="row">
                        <div class="d-inline-block mr-2">
                            <h5 class="d-inline-block font-15">
                                <strong class="font">customer no:</strong>
                                <span>{{ !empty($userInfo->user_id) ? $userInfo->user_id : '' }}</span>
                            </h5>
                        </div>
                        <div class="d-inline-block mr-2">
                            <h5 class="d-inline-block font-15">
                                <strong class="font">tel:</strong>
                                <span>{{ !empty($userInfo->tel) ? $userInfo->tel : '' }}</span>
                            </h5>
                        </div>
                        <div class="d-inline-block mr-2">
                            <h5 class="d-inline-block font-15">
                                <strong class="font">Debts level:</strong>
                                <span>£{{ getDebtAmount($userInfo->user_id) }}</span>
                            </h5>
                        </div>
                        <div class="d-inline-block mr-2">
                            <h5 class="d-inline-block font-15">
                                <strong class="font">Case Type:</strong>
                                <span>{{ $userInfo->userCaseType }}</span>
                            </h5>
                        </div>
                        <div class="d-inline-block mr-2">
                            <h5 class="d-inline-block font-15">
                                <strong class="font">Disposable</strong>
                                <span>£{{ getTotalDisposable($userInfo->user_id) }}</span>
                            </h5>
                        </div>
                    </div>
            </div>
        </div>
    </div>
       
        <section class="card-section">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                            <div class="row ml--30">
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="card height-315">
                                        <div class="card-title">
                                            Personal details
                                        </div>
                                            @include('user.userInfo')
                                    </div>
                                    <div class="card min-height-420" style="min-height: 240px;">
                                        <div class="card-title">
                                            Check list
                                        </div>
                                        @include('user.checklist')
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                    <div class="card height-auto">
                                        <div class="card-title">
                                            Debts
                                        </div>
                                            @include('user.debts')
                                    </div>
                                    <div class="card height-auto">
                                        <div class="card-title">
                                            Income
                                        </div>
                                            @include('user.income')
                                    </div>
                                    <div class="card height-auto">
                                        <div class="card-title">
                                            Expenditure
                                        </div>
                                            @include('user.outgoing')
                                    </div>
                                    <div class="card height-auto">
                                        <div class="card-title">
                                            Asset
                                        </div>
                                            @include('user.assets')
                                    </div>
                                    <div class="card height-auto">
                                        <div class="card-title">
                                            Review
                                        </div>
                                            @include('user.review')
                                    </div>
                                </div>
                            </div>
                            <hr style="background-color:#008dcc;height:1.5px" class="mt-0">
                            <div class="row m-0">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <form id="update_case_status_form" action="#" method="POST" class="display-ib">
                                            @csrf
                                        <input type="hidden" id="userId" name="userId" value="{{ $userInfo->user_id }}">
                                            <!-- <ul class="navbar-nav footer-link">
                                                @php $i = 1; @endphp
                                                @foreach($case_status as $data)
                                                    <li class="nav-item">
                                                        <a href="javascipt:void(0)" data-status="{{$data->id}}" class="case_status-change nav-link">
                                                            <strong id="case_id">{{$data->name}}</strong>
                                                        </a>
                                                    </li>
                                                    @php $i++; @endphp
                                                @endforeach
                                            </ul> -->
                                        <ul class="navbar-nav footer-link">
                                            <li class="nav-item">
                                                <a
                                                    data-status="{{$data->id}}"
                                                    data-zcasestatus="not interested"
                                                    class="nav-link text-danger case_status-change">
                                                    <strong class="zcase_change">not interested</strong>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a
                                                    data-status="{{$data->id}}"
                                                    data-zcasestatus="Do Not Contact"
                                                    class="nav-link text-danger case_status-change">
                                                    <strong class="zcase_change">Do Not Contact</strong>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a
                                                    data-status="{{$data->id}}"
                                                    data-zcasestatus="DRO"
                                                    class="nav-link text-danger case_status-change">
                                                    <strong class="zcase_change">DRO</strong>
                                                </a>
                                            </li>
                                            
                                            <li class="nav-item">
                                                <a 
                                                    data-status="In Process"  
                                                    class="chnage_reminder changeday nav-link text-warning" data-change_case_status_name="{{ 'In Process' }}">
                                                    <strong class="day">{{ "In Process" }}</strong>
                                                </a>
                                            </li>
                                            @if(!empty($userInfo->zCaseType) && (in_array($userInfo->zCaseType, $inprocessdaysarr) || $userInfo->zCaseType == 'In Process'))
                                                <li class="nav-item"> 
                                                    <a 
                                                        data-status="In Process"
                                                        class="chnage_reminder changeday nav-link text-warning" data-change_case_status_name="@if ($currentCaseStatusDay == 'In Process' ||$currentCaseStatusDay ==  "") {{ 'inprocessday1' }} @else  {{ $currentCaseStatusDay }} @endif">
                                                        <strong class="day">
                                                            @switch($userInfo->zCaseType)
                                                                @case('In Process')
                                                                    {{ "I.P.N.C Day1" }}
                                                                    @break

                                                                @case('inprocessday1')
                                                                    {{ "I.P.N.C Day2" }}
                                                                    @break

                                                                @case('inprocessday2')
                                                                    {{ "I.P.N.C Day3" }}
                                                                    @break

                                                                @case('inprocessday3')
                                                                    {{ "I.P.N.C Day4" }}
                                                                    @break
                                                            @endswitch
                                                        </strong>
                                                    </a>
                                                </li>
                                            @endif
                                            <li class="nav-item">
                                                <a
                                                    class="chnage_reminder changeday nav-link text-warning"
                                                    data-status="Awaiting Docs"
                                                    data-change_case_status_name="{{ 'Awaiting Docs' }}">
                                                    <strong class="day">{{ "Awaiting Docs" }}</strong>
                                                </a>
                                            </li>
                                            @if(!empty($userInfo->zCaseType) && (in_array($userInfo->zCaseType, $awaitingdocsarr) || $userInfo->zCaseType == 'Awaiting Docs'))
                                                <li class="nav-item"> 
                                                    <a
                                                        class="chnage_reminder changeday nav-link text-warning"
                                                        data-status="Awaiting Docs"
                                                        data-change_case_status_name="@if ($currentCaseStatusDay == 'Awaiting Docs' || $currentCaseStatusDay ==  '') {{ 'awaitingdocsday1' }} @else  {{ $currentCaseStatusDay }} @endif">
                                                        <strong class="day">
                                                            @switch($userInfo->zCaseType)
                                                                @case('Awaiting Docs')
                                                                    {{ "A.W.N.C Day1" }}
                                                                    @break

                                                                @case('awaitingdocsday1')
                                                                    {{ "A.W.N.C Day2" }}
                                                                    @break

                                                                @case('awaitingdocsday2')
                                                                    {{ "A.W.N.C Day3" }}
                                                                    @break

                                                                @case('awaitingdocsday3')
                                                                    {{ "A.W.N.C Day4" }}
                                                                    @break

                                                            @endswitch
                                                        </strong>
                                                    </a>
                                                </li>
                                            @endif
                        
                                            @php
                                                // 'COMPLETED APPLICATION'
                                                $checkMessageDayDisplayArr = array('QUICK REVIEW', 'COMPLETED APPLICATION');
                                            @endphp
                                            
                                            @if(in_array(strtolower($currentCaseStatusDay), $checkMessageDayDisplayArr)|| $userInfo->zCaseType == 'QUICK REVIEW' || $userInfo->zCaseType == 'COMPLETED APPLICATION' || in_array($currentCaseStatusDay, $messagedayarr))
                                                <li class="nav-item">
                                                    <a    
                                                        href="javascript:void(0)"
                                                        data-status="{{$data->id}}"
                                                        class="changeday nav-link text-warning"
                                                        data-change_case_status_name="{{ (!empty($currentCaseStatusDay ) && in_array($currentCaseStatusDay , $messagedayarr)) ? $currentCaseStatusDay  : 'messageday1' }}">
                                                        <strong class="day">{{ (!empty($currentCaseStatusDay ) && in_array($currentCaseStatusDay , $messagedayarr)) ? $currentCaseStatusDay  : 'messageday1' }}</strong>
                                                       
                                                    </a>
                                                </li>
                                            @endif
                                           
                                            
                                        </ul>
                                    </form>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="buttons mt-2">
                                        @php
                                            $loginUserData = Auth::user();
                                            unset($loginUserData->password);
                                            $loginUser = $loginUserData;
                                        @endphp
                                       
                                       <!-- Debt advisor code start -->
                                        @if($loginUser->user_type == 3)
                                            <button class="btn btn-outline-info send_iva_team" data-user_id="{{ $userInfo->user_id }}" data-title="IVA checklist" data-case_status="iva draft"> 
                                            Send IVA Team
                                            </button>
                                            <button class="btn btn-outline-info send_team_dmp" data-user_id="{{ $userInfo->user_id }}" data-title="DMP Checklist" data-case_status="dmp draft">
                                                Send DMP Team
                                            </button>
                                        @endif
                                        <!-- Debt advisor code end -->

                                        <!-- DMP advisor code start -->
                                        @if($loginUser->user_type == 5)
                                            {{-- <button class="btn btn-outline-info send_iva_team" data-target="#Sent_To_IVA_Modal" data-user_id="{{ $userInfo->user_id }}" data-case_status="iva draft"> --}}
                                            <!-- #Sent_To_IVA_Modal -->
                                            {{-- Send IVA
                                            </button> --}}
                                            <button class="btn btn-outline-info send_iva_team" data-user_id="{{ $userInfo->user_id }}" data-title="IVA checklist" data-case_status="iva draft"> 
                                            Send IVA
                                            </button>
                                            
                                            <!-- open model sent_to_DMP_Model -->
                                            <button class="btn btn-outline-info send_dmp_provider_data" data-user_id="{{ $userInfo->user_id }}" data-case_status="SEND TO DMP PROVIDER" data-title="Send to DMP Provider">
                                                Send DMP Provider
                                            </button>
                                        @endif
                                        <!-- DMP advisor code end -->
                                        
                                        <!-- IVA advisor code start -->
                                        @if($loginUser->user_type == 6)
                                            <button class="btn btn-outline-info send_ip_data" data-user_id="{{ $userInfo->user_id }}" data-title="SENT TO IP" data-case_status="SENT TO IP">
                                            Send IP
                                            </button>
                                            
                                            <!-- open model Sent_to_DMP_Modal -->
                                            <button class="btn btn-outline-info send_team_dmp" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#Sent_To_DMP_team_Modal" data-user_id="{{ $userInfo->user_id }}" data-case_status="dmp draft">
                                                Send DMP Team
                                            </button>
                                        @endif
                                        <!-- IVA advisor code end -->

                                        @if($loginUser->user_type == 1)
                                            <button class="btn btn-outline-info send_team_dmp" data-user_id="{{ $userInfo->user_id }}" data-title="DMP Checklist" data-case_status="dmp draft">
                                                Send DMP Team
                                            </button>
                                            <button class="btn btn-outline-info send_dmp_provider_data" data-user_id="{{ $userInfo->user_id }}" data-case_status="SEND TO DMP PROVIDER" data-title="Send to DMP Provider">
                                                Send DMP Provider
                                            </button>
                                            <button class="btn btn-outline-info float-right send_ip_data" data-user_id="{{ $userInfo->user_id }}" data-title="SENT TO IP" data-case_status="SENT TO IP">
                                                Send to IP
                                            </button>
                                            <button class="btn btn-outline-info ml-auto" id="case_option">
                                                Case Option
                                            </button>
                                        @endif

                                        <!-- Account user code start -->
                                        @if($loginUser->user_type == 7)
                                            <button class="btn btn-outline-info send_iva_team" data-user_id="{{ $userInfo->user_id }}" data-title="IVA checklist" data-case_status="iva draft">Send IVA Team</button>

                                            <button class="btn btn-outline-info send_team_dmp" data-user_id="{{ $userInfo->user_id }}" data-title="DMP Checklist" data-case_status="dmp draft">Send DMP Team</button>

                                            <button class="btn btn-outline-info case_status_change_paid" data-zcasestatus="Paid" >Paid</button>

                                            <button class="btn btn-outline-info case_status_change_cancelled" data-zcasestatus="Cancelled">Cancelled</button>

                                            <button class="btn btn-outline-info case_status_change_missed_payment" data-zcasestatus="Missed Payment">Missed Payment</button>

                                            <button class="btn btn-outline-info" id="case_option">Case Option</button>
                                        @endif
                                        <!-- Account user code end -->

                                        @if($loginUser->user_type == 8)
                                            <button class="btn btn-outline-info" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#Sent_To_IVA_Modal">Send IVA Team</button>

                                            <button class="btn btn-outline-info" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#Sent_To_DMP_team_Modal">Send DMP Team</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            @include('user.right_sidebar_notes')
                        </div>
                    </div>
        </section>
        
        
    </div>


    <!-- reminder model pop up code start yogendrasinh -->
        <div id="reminder_calender_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content card card-secondary">
                    <div class="modal-header">
                        <div class="card-title">Reminder Date</div>
                        <button type="button" class="close alert_open" aria-label="Close">
                            <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <form action="{{ route('user.update_case_change_reminder') }}" method="POST" class="d-block input-sm" style="width: 100%;">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <input type="hidden" name="reminderUserId" value="{{ $userInfo->user_id }}">
                                                <input type="hidden" name="reminderUserName" value="{{ $userInfo->name }}">
                                                <input type="hidden" id="update_case_status_reminder" name="updateCaseStatus" value="">
                                                <input type="text" id="update_reminder_date" name="updateReminderDate" class="form-control datepicker" placeholder="Due Date:"/ value="">
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 pl-5">
                                                <div class="row pl-5 pr-3">
                                                    <label for="Reminder_time" class="d-block text-primary" style="width: 100%;">ReminderTime</label>
                                                    <div class="form-group">
                                                     <select id="hour" class="form-control square-textbox fixed-size" name="update_reminder_hour" required style="float:left;width:95px;">
                                                                <option value="mm" selected >HH</option>
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
                                                            <select id="minute" class="form-control square-textbox fixed-size" name="update_reminder_minute" required style="float:left;width:95px;">
                                                            <option value="MM" selected>MM</option>
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
                                                    <div class="form-group" style="width: 100%;">
                                                        <textarea name="updateReminderMessage" id="updateReminderMessage" class=" form-control b-grey" value="" style="resize: none;border-radius: 10px;height: 250px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mb-5">
                        <input type="submit" class="btn btn-outline-info float-right btn-large " value="Save Appointment">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- reminder model pop up code end yogendrasinh -->

        <!-- iva advisor code start -->
        <div id="Sent_To_Ip_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content card card-secondary">
                    <div class="modal-header">
                        <div class="card-title">Sent to IP</div>
                        <button type="button" class="close alert_open" aria-label="Close">
                            <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                        </button>
                    </div>
                    <div class="modal-body text-primary sent_ip" style="padding:0px 20px;">
                        <input type="hidden" id="userId" name="userId" value="{{ $userInfo->user_id }}">
                        <input type="hidden" name="send_to_ip" id="send_to_ip" value="SENT TO IP"> 
                        <div id="showAddedSentToIpData"></div>
                    </div>
                    <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
                        {{-- <a href="javascipt:void(0)" id="btn_hide" class="send_ip btn btn-outline-info" style="padding: 6px 30px;" data-dismiss="modal">Send</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- iva advisor code end -->

        <!-- for DMP Advisor -->
        <div id="Sent_To_DMP_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content card card-secondary">
                    <div class="modal-header">
                        <div class="card-title">Send to DMP Provider</div>
                        <button type="button" class="close alert_open" aria-label="Close">
                            <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                        </button>
                    </div>
                    <div class="modal-body text-primary sent_dmp" style="padding:0px 20px;">
                        <input type="hidden" id="userId" name="userId" value="{{ $userInfo->user_id }}">
                        <input type="hidden" id="dmp_provider" name="case_status" value="SEND TO DMP PROVIDER">

                        <div id="showAddedDmpProviderData"></div>
                    </div>
                     <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
                        {{-- <a href="javascipt:void(0)" id="btn_hide" class=" send_dmp btn btn-outline-info" style="padding: 6px 30px;" data-dismiss="modal">Send</a> --}}
                    </div>
                </div>
            </div>
        </div>


        <!-- common model pop up code start -->
            <div id="common_model_pop_up" class="modal show fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content card card-secondary">
                        <div class="modal-header">
                            <div class="card-title" id="common_model_pop_up_title"></div>
                            <button type="button" class="close alert_open" aria-label="Close">
                                <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                            </button>
                        </div>
                        <div class="modal-body text-primary" style="padding:0px 20px;">
                            <input type="hidden" id="userId" name="userId" value="{{ $userInfo->user_id }}">
                            <input type="hidden" id="common_model_pop_up_case_status" name="case_status" value="">

                            <div id="showAddedCommonModelData"></div>
                            {{-- <p class="text-center">
                                 <a href="javascipt:void(0)" class="send_iva btn btn-outline-info">Send</a>
                            </p> --}}
                        </div>
                        <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
                        </div>
                    </div>
                </div>
            </div>
        <!-- common model pop up code end -->
    

        <div id="Sent_To_IVA_Modal" class="modal show fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content card card-secondary">
                    <div class="modal-header">
                        <div class="card-title">IVA checklist</div>
                        <button type="button" class="close alert_open" aria-label="Close">
                            <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                        </button>
                    </div>
                    <div class="modal-body text-primary sent_iva" style="padding:0px 20px;">
                        <input type="hidden" id="userId" name="userId" value="{{ $userInfo->user_id }}">
                        <input type="hidden" id="iva_draft" name="case_status" value="iva draft">

                        <div id="showAddedIvaData"></div>
                        {{-- <p class="text-center">
                             <a href="javascipt:void(0)" class="send_iva btn btn-outline-info">Send</a>
                        </p> --}}
                    </div>
                    <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
                    </div>
                </div>
            </div>
        </div>

        <div id="Sent_To_DMP_team_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
           <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
               <div class="modal-content card card-secondary">
                   <div class="modal-header">
                       <div class="card-title">DMP Checklist</div>
                       <button type="button" class="close alert_open" aria-label="Close">
                           <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                       </button>
                   </div>
                   <div class="modal-body text-primary sent_iva" style="padding:0px 20px;">
                       <input type="hidden" name="userId" value="{{ $userInfo->user_id }}">
                       <input type="hidden" name="send_dmp_team" value="SEND TO DMP PROVIDER">

                       <div id="showAddedDmpTeamData"></div>
                   </div>
                   <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
                       {{-- <a href="javascipt:void(0)" id="btn_hide" class="send_dmp_team btn btn-outline-info" style="padding: 6px 30px;" data-dismiss="modal">Send</a>  --}}
                   </div>
               </div>
           </div>
       </div>
       
       <!---  chnage case status confirm popup start here  author:Raj Abhishek Date:8/2/2020--->
       <div id="alert_modal" class="modal fade show" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered bd-example-modal-sm" role="document">
                    <div class="modal-content card card-secondary">
                        <div class="modal-header">
                            <h1 class="modal-title">Are You Sure ?</h1>
                        </div>
                    <div class="modal-body">
                            <p style="font-size: 14px;color: #333;">
                                Are you sure you want change status
                            </p>
                            <input type="hidden" id="view_bottom_z_case_type" name="view_bottom_z_case_type" value="">
                    </div>
                    <div class="modal-footer justify-content-start">
                        <div class="buttons">
                            <a class="zcasetype_change btn btn-outline-danger" data-dismiss="modal" id="modal_remove">yes</a>
                            <a class="btn btn-outline-primary" id="back">Back</a>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
      <!-------- chnage case status confirm popup end here --------------->
      
      <!-- Account User popup start-->


         <div id="paid" class="modal fade show entercase" style="display:none" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document"
                style="height: auto;min-height: auto !important;">
                        <div class="modal-content card card-secondary">
                            <div class="modal-header">
                                <h1 class="modal-title">Mark as paid?</h1>
                            </div>
                            <div class="modal-body justify-content-start" style="padding: 20px 20px 0px;">
                                <h5>Are you sure you would like to make as invoiced</h5>
                                <input type="hidden" id="view_bottom_z_case_type_paid" name="view_bottom_z_case_type_paid" value="">
                            </div>
                            <div class="modal-footer justify-content-start">
                                    <div class="buttons width-100 justify-content-between">
                                    <a class="zcasetype_change_paid btn btn-outline-danger" style="padding: 10px 30px;">Paid</a>
                                    <a class="btn btn-outline-primary" data-dismiss="modal" id="modal_hide">No</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>


    
            <div id="cancelled" class="modal fade show entercase" style="display:none" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document"
                style="height: auto;min-height: auto !important;">
                        <div class="modal-content card card-secondary">
                            <div class="modal-header">
                                <h1 class="modal-title">case cancelled?</h1>
                            </div>
                            <div class="modal-body justify-content-start" style="padding: 20px 20px 0px;">
                                <h5>Are you sure you would like to cancel this case.</h5>
                                <input type="hidden" id="view_bottom_z_case_type_cancelled" name="view_bottom_z_case_type_cancelled" value="">
                            </div>
                            <div class="modal-footer justify-content-start">
                                    <div class="buttons width-100 justify-content-between">
                                    <a class="zcasetype_change_cancelled btn btn-outline-danger" style="padding: 10px 30px;">Cancelled</a>
                                    <a class="btn btn-outline-primary" data-dismiss="modal" id="modal_hide">No</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>



            <div id="miss_payments" class="modal fade show entercase" style="display:none" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document"
                style="height: auto;min-height: auto !important;">
                        <div class="modal-content card card-secondary">
                            <div class="modal-header">
                                <h1 class="modal-title">Payment missed?</h1>
                            </div>
                            <div class="modal-body justify-content-start" style="padding: 20px 20px 0px;">
                                <h5>payment has been missed on this account</h5>
                                <input type="hidden" id="view_bottom_z_case_type_miss_payments" name="view_bottom_z_case_type_miss_payments" value="">
                            </div>
                            <div class="modal-footer justify-content-start">
                                    <div class="buttons width-100 justify-content-between">
                                     <a class="zcasetype_change_missed_payment btn btn-outline-danger" style="padding: 10px 30px;">Missed Payment</a>
                                    <a class="btn btn-outline-primary" data-dismiss="modal" id="modal_hide">No</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            <!-- Account User popup end-->
    

       <div id="fix_compliance" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content card card-secondary">
                    <div class="modal-header">
                        <div class="card-title">fix compliance</div>
                        {{-- <input type="hidden" name="send_to_ip" id="send_to_ip" value="Sent to IP">  --}}
                        <button type="button" class="close alert_open" aria-label="Close">
                            <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                        </button>
                    </div>
                    <div class="modal-body text-primary sent_dmp" style="padding:0px 20px;">
                        <form>
                            <p>compliance issues corrected
                                <input type="checkbox" required id="Eligible" class="selectall">
                                <label for="Eligible"></label>
                            </p>
                            <p class="text-center">
                                <input type="submit" value="Re-submit case" id="btn_hide" class="send_dmp btn btn-outline-info" style="padding: 6px 30px;" data-dismiss="modal">
                            </p>
                        </form>
                    </div>
                    
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

<script>
$(document).ready(function () {
    /*$("#alert_open").click(function () {
        $("#alert_modal").show();
        $("body").addClass("alert_open");
    })*/
    $("#back").click(function () {
        $("#alert_modal").hide();
        $("body").removeClass("alert_open");
    })
    /*$("#modal_remove").click(function () {
        $(".modal:not('#calender_modal')").hide();
    })*/
})
</script>

<!-- chart script -->
<script type="text/javascript">
    //update ZcaseType success message fade out code here
    $(document).ready(function(){
        setTimeout(function() {
        $('#successMessage').fadeOut('fast');
            }, 3000); 
    });
    // Timer code start

        // remove below currenthours, currentminutes and currentseconds line after removing comment of above code
        var currentdate = new Date();
        var currentHours = currentdate.getHours();
        var currentMinutes = currentdate.getMinutes();
        var currentSeconds = currentdate.getSeconds();

        var input = {
            hours: currentHours,
            minutes: currentMinutes,
            seconds: currentSeconds
        };

        var timestamp = new Date(input.hours, input.minutes, input.seconds);

        var interval = 1;

        setInterval(function () {
            timestamp = new Date(timestamp.getTime() + interval * 1000);
            $("#countdown2").html(timestamp.getHours() + 'h:' + timestamp.getMinutes() + 'm:' + timestamp.getSeconds() + 's');
            // document.getElementById('countdown2').innerHTML = ;
        }, Math.abs(interval) * 1000);
    // Timer code end
</script>

<!-- To change the case status on click of view case bottom case link code start -->
<script type="text/javascript">
    $(document).on('click', '.case_status-change', function(){
        $('#view_bottom_z_case_type').val('');
        var z_case_status_value = $(this).data('zcasestatus');
        $('#view_bottom_z_case_type').val(z_case_status_value);
        $('#alert_modal').modal('show');
    })
    $(document).on('click','.zcasetype_change', function () {
        var change_case_status_value = $('#view_bottom_z_case_type').val();
        //var case_status_name = $(this).text();
        var userId=$('#userId').val();

        $.ajax({
            url:'{{ route('user.update_case_status') }}',
            method:'post',
            data:{_token: '{{csrf_token()}}',case_status_name:change_case_status_value,userId:userId},
            dataType:'json',
            cache: false,
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
</script>
<!-- To change the case status on click of view case bottom case link code end -->

<!-- To change the paid case status on click of view case bottom case link code start -->
    <script type="text/javascript">
        $(document).on('click', '.case_status_change_paid', function(){
            $('#view_bottom_z_case_type_paid').val('');
            var z_case_status_value = $(this).data('zcasestatus');
            $('#view_bottom_z_case_type_paid').val(z_case_status_value);
            $('#paid').modal('show');
        });
        $(document).on('click','.zcasetype_change_paid', function () {
            var change_case_status_paid_value = $('#view_bottom_z_case_type_paid').val();
            //var case_status_name = $(this).text();
            var userId = $('#userId').val();

            $.ajax({
                url:'{{ route('user.update_case_status') }}',
                method:'post',
                data:{_token: '{{csrf_token()}}',case_status_name:change_case_status_paid_value,userId:userId},
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
    </script>
<!-- To change the paid case status on click of view case bottom case link code end -->

<!-- To change the cancelled case status on click of view case bottom case link code start -->
    <script type="text/javascript">
        $(document).on('click', '.case_status_change_cancelled', function(){
            $('#view_bottom_z_case_type_cancelled').val('');
            var z_case_status_cancelled_value = $(this).data('zcasestatus');
            $('#view_bottom_z_case_type_cancelled').val(z_case_status_cancelled_value);
            $('#cancelled').modal('show');
        });
        $(document).on('click','.zcasetype_change_cancelled', function () {
            var change_case_status_cancelled_value = $('#view_bottom_z_case_type_cancelled').val();
            //var case_status_name = $(this).text();
            var userId = $('#userId').val();

            $.ajax({
                url:'{{ route('user.update_case_status') }}',
                method:'post',
                data:{_token: '{{csrf_token()}}',case_status_name:change_case_status_cancelled_value,userId:userId},
                dataType:'json',
                cache: false,
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
    </script>
<!-- To change the cancelled case status on click of view case bottom case link code end -->

<!-- To change the missed payment case status on click of view case bottom case link code start -->
    <script type="text/javascript">
        $(document).on('click', '.case_status_change_missed_payment', function(){
            $('#view_bottom_z_case_type_miss_payments').val('');
            var z_case_status_missed_payment_value = $(this).data('zcasestatus');
            $('#view_bottom_z_case_type_miss_payments').val(z_case_status_missed_payment_value);
            $('#miss_payments').modal('show');
        });
        $(document).on('click','.zcasetype_change_missed_payment', function () {
            var change_case_status_cancelled_value = $('#view_bottom_z_case_type_miss_payments').val();
            //var case_status_name = $(this).text();
            var userId = $('#userId').val();

            $.ajax({
                url:'{{ route('user.update_case_status') }}',
                method:'post',
                data:{_token: '{{csrf_token()}}',case_status_name:change_case_status_cancelled_value,userId:userId},
                dataType:'json',
                cache: false,
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
    </script>
<!-- To change the missed payment case status on click of view case bottom case link code end -->

<!-- code start for Iva Draft -->
    <script type="text/javascript">
        $(document).on('click','.send_iva_team',function(e)
        {
            e.preventDefault();
            var user_id = $(this).data('user_id');
            var case_status = $(this).data('case_status');
            
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'{{ route('user.getUserDetails') }}',
                method:'post',
                data:{user_id:user_id,case_status:case_status},
                datatype:'json',
                cache: false,
                success:function(data)
                {
                    $('#showAddedIvaData').html(data);
                    $('#showAddedIvaData').show();
                    //$('#showDefaultIvaData').remove();
                    $('#Sent_To_IVA_Modal').modal('show');
                }
            });
        });
    </script>
<!-- code end for Iva Draft -->
<!-- to insert the one by one value of send to iva checkbox code start-->
    <script type="text/javascript">
        $(document).on('click', '.select_iva', function(){
            var chckbx_checked = false;
            if($(this).is(":checked")){
                chckbx_checked = true;
            }
            
            var userId = $('#userId').val();
            var case_status = 'iva draft';
            var checkbox = $(this).val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'{{ route('user.update_case_assigned_to_checkbox') }}',
                method:'post',
                cache: false,
                data:{ 
                    userId: userId,
                    checkbox: checkbox,
                    chckbx_checked: chckbx_checked,
                    case_status: case_status
                },
                //dataType:'json',
                success:function(data)
                {
                    if(data == 'allChecked') {
                        // open reminder popup
                        var message = 'Data save succesfully';
                        $('#Sent_To_IVA_Modal').modal('hide');
                        $('#reminder_calender_modal').modal('show');
                    } else {
                        var messageIcon = 'error';
                        if(data == 'success') {
                            var message = 'Data save succesfully';
                            var messageIcon = 'success';
                        }
                        else{
                            var message = 'something wrong please try again';
                            swal(message, {
                                icon: messageIcon,
                            });
                        }
                    }
                }
            });

            //alert('chckbx_checked => ' + chckbx_checked + ' val => ' + $(this).val());
            //return false;
        })
    </script>
<!-- to insert the one by one value of send to iva checkbox code end-->

<!-- Code start for send dmp team -->
    <script type="text/javascript">
        $(document).on('click','.send_team_dmp',function(e)
        {
            e.preventDefault();
            var user_id = $(this).data('user_id');
            var case_status = $(this).data('case_status');
            

            /*alert('user_id => ' + user_id + ' | case_status => ' + case_status);
            return false;*/

            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'{{ route('user.getUserDetails') }}',
                method:'post',
                data:{user_id:user_id,case_status:case_status},
                datatype:'json',
                cache: false,
                success:function(data)
                {
                    $('#showAddedDmpTeamData').html(data);
                    $('#showAddedDmpTeamData').show();
                    $('#showDefaultDmpTeamData').remove();
                    $('#Sent_To_DMP_team_Modal').modal('show');
                }
            });
        });
    </script>
<!-- Code end for send dmp team -->
<!-- to insert the one by one value of send to send dmp team code start-->
    <script type="text/javascript">
        $(document).on('click', '.select_send_dmp_team', function(){
            var chckbx_checked = false;
            if($(this).is(":checked")){
                chckbx_checked = true;
            }
            
            var userId = $('#userId').val();
            var case_status = 'dmp draft';
            var checkbox = $(this).val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'{{ route('user.update_send_to_dmp_case_assigned_to_checkbox') }}',
                method:'post',
                cache: false,
                data:{ 
                    userId: userId,
                    checkbox: checkbox,
                    chckbx_checked: chckbx_checked,
                    case_status: case_status
                },
                success:function(data)
                {
                    if(data == 'allChecked') {
                        // open reminder popup
                        var message = 'Data save succesfully';
                        $('#update_case_status_reminder').val('Sent to DMP');
                        $('#Sent_To_DMP_team_Modal').modal('hide');
                        $('#reminder_calender_modal').modal('show');
                    } else {
                        var messageIcon = 'error';
                        if(data == 'success') {
                            var message = 'Data save succesfully';
                            var messageIcon = 'success';
                        }
                        else{
                            var message = 'something wrong please try again';
                            swal(message, {
                                icon: messageIcon,
                            });
                        }
                    }
                }
            });
        })
    </script>
<!-- to insert the one by one value of send to send dmp team code end-->

<!-- Code start for send to DMP Provider -->
    <script type="text/javascript">
        $(document).on('click','.send_dmp_provider_data',function(e)
        {
            e.preventDefault();
            var user_id = $(this).data('user_id');
            var case_status = $(this).data('case_status');
        
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'{{ route('user.getUserDetails') }}',
                method:'post',
                data:{user_id:user_id,case_status:case_status},
                datatype:'json',
                cache: false,
                success:function(data)
                {
                    $('#showAddedDmpProviderData').html(data);
                    $('#showAddedDmpProviderData').show();
                    //$('#showDefaultDmpProviderData').remove();
                    $('#Sent_To_DMP_Modal').modal('show');
                }
            });
        });
    </script>
<!-- Code end for send to DMP Provider -->
<!-- to insert the one by one value of send to send dmp to provider code start-->
    <script type="text/javascript">
        $(document).on('click', '.select_dmp_provider', function(){
            var chckbx_checked = false;
            if($(this).is(":checked")){
                chckbx_checked = true;
            }
            
            var userId = $('#userId').val();
            var case_status = 'SEND TO DMP PROVIDER';
            var checkbox = $(this).val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                url:'{{ route('user.update_send_to_dmp_provider_case_assigned_to_checkbox') }}',
                method:'post',
                cache: false,
                data:{ 
                    userId: userId,
                    checkbox: checkbox,
                    chckbx_checked: chckbx_checked,
                    case_status: case_status
                },
                success:function(data)
                {
                    if(data == 'allChecked') {
                        // open reminder popup
                        var message = 'Data save succesfully';
                        // set this input type for case_option value in user details table
                        $('#update_case_status_reminder').val('SEND TO DMP PROVIDER');
                        $('#Sent_To_DMP_Modal').modal('hide');
                        $('#reminder_calender_modal').modal('show');
                    } else {
                        var messageIcon = 'error';
                        if(data == 'success') {
                            var message = 'Data save succesfully';
                            var messageIcon = 'success';
                        }
                        else{
                            var message = 'something wrong please try again';
                            swal(message, {
                                icon: messageIcon,
                            });
                        }
                    }
                }
            });
        })
    </script>
<!-- to insert the one by one value of send to send to provider code end-->

<!-- Code start for send to iva advisor -->
    <script type="text/javascript">
        $(document).on('click','.send_ip_data',function(e)
        {
            e.preventDefault();
            var user_id = $(this).data('user_id');
            var case_status = $(this).data('case_status');
        
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'{{ route('user.getUserDetails') }}',
                method:'post',
                data:{user_id:user_id,case_status:case_status},
                datatype:'json',
                cache: false,
                success:function(data)
                {
                    $('#showAddedSentToIpData').html(data);
                    $('#showAddedSentToIpData').show();
                    //$('#showDefaulIpData').remove();
                    $('#Sent_To_Ip_Modal').modal('show');
                }
            });
        });
    </script>
<!-- Code end for send to iva advisor -->
<!-- to insert the one by one value of send to send dmp to provider code start-->
    <script type="text/javascript">
        $(document).on('click', '.select_iva_advisor', function(){
            var chckbx_checked = false;
            if($(this).is(":checked")){
                chckbx_checked = true;
            }
            
            var userId = $('#userId').val();
            var case_status = 'SENT TO IP';
            var checkbox = $(this).val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                url:'{{ route('user.update_send_to_iva_advisor_case_assigned_to_checkbox') }}',
                method:'post',
                cache: false,
                data:{ 
                    userId: userId,
                    checkbox: checkbox,
                    chckbx_checked: chckbx_checked,
                    case_status: case_status
                },
                success:function(data)
                {
                    if(data == 'allChecked') {
                        // open reminder popup
                        var message = 'Data save succesfully';
                        // set this input type for case_option value in user details table
                        $('#update_case_status_reminder').val('SENT TO IP');
                        $('#Sent_To_Ip_Modal').modal('hide');
                        $('#reminder_calender_modal').modal('show');
                    } else {
                        var messageIcon = 'error';
                        if(data == 'success') {
                            var message = 'Data save succesfully';
                            var messageIcon = 'success';
                        }
                        else{
                            var message = 'something wrong please try again';
                            swal(message, {
                                icon: messageIcon,
                            });
                        }
                    }
                }
            });
        })
    </script>
<!-- to insert the one by one value of send to send to provider code end-->

<script type="text/javascript">
    $(document).on('click','#case_option',function(){
        var userId = $('#userId').val();
        location.href = '{{url('user/view/case_option')}}/'+userId;
    });
</script>

<script type="text/javascript">
    $(document).on('click','.changeday',function(e)
    {
        e.preventDefault();
        var userId = $('#userId').val();
        //var changeday = 'messageday1';
        var changeday = $(this).data('change_case_status_name');

        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'{{route('changeUserDay')}}',
            method:'post',
            data:{userId:userId,changeday:changeday},
            datatype:'json',
            cache: false,
            success:function(data)
            {
                 var messageIcon = 'error';
                   if(data != 'success') {
                        if(changeday == 'In Process' || changeday == 'Awaiting Docs')
                        {
                            $('.changeday').attr('disable',true);
                            $('#update_case_status_reminder').val(changeday);
                            
                            $('#reminder_calender_modal').modal('show');
                        }
                        else
                        {
                        var message = 'Case Assing succesfully';
                        var messageIcon = 'success';
                       window.location = '{{ URL::to('/user') }}';
                        }

                   } else {
                       alert(data);
                       var message = 'something wrong please try again';
                   }
                   swal(message, {
                   icon: messageIcon,
                   });
                   
                   
            }
        })
    });
</script>
<script>
    
    $("#modal_hide").click(function () {
        $(".modal").hide();
        //alert("error")
        $("#appointment_model").removeClass("show");
        $("body").removeClass("modal-open");
        // $('#appointment_model').show();
        $("body").removeClass("alert_open");
    });
</script>
@endsection