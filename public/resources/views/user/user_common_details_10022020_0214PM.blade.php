@extends('layouts.app')
@section('content')
        
@php
    $loginUserData = Auth::user();
    unset($loginUserData->password);

    $loginUser = $loginUserData;
@endphp

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
                    <span class="text-warning">@if(isset($userInfo->zCaseType)) {{$userInfo->zCaseType}} @else '' @endif</span>
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
        <div id="successMessage">
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}" style="font-size:16px;margin-left: -10px;margin-right: 5px;">{{ Session::get('message') }}</p>
    @endif
</div>
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
                                                    href="javascipt:void(0)"
                                                    data-status="{{$data->id}}"
                                                    class="nav-link text-danger case_status-change">
                                                    <strong class="zcase_change">not interested</strong>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a
                                                    href="javascipt:void(0)"
                                                    data-status="{{$data->id}}"
                                                    class="nav-link text-danger case_status-change">
                                                    <strong class="zcase_change">Do Not Contact</strong>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a
                                                    href="javascipt:void(0)"
                                                    data-status="{{$data->id}}"
                                                    class="nav-link text-danger case_status-change">
                                                    <strong class="zcase_change">DRO</strong>
                                                </a>
                                            </li>
                                            @php
                                                $awaitingdocsarr = array('A.W.N.C Day1', 'A.W.N.C Day2', 'A.W.N.C Day3', 'A.W.N.C Day4');
                                                $inprocessdaysarr = array('I.P.N.C Day1', 'I.P.N.C Day2', 'I.P.N.C Day3', 'I.P.N.C Day4');
                                                $messagedayarr = array('messageday1', 'messageday2', 'messageday3', 'messageday4');
                                            @endphp
                                            
                                           
                                            <li class="nav-item">
                                                <a 
                                                    href="javascipt:void(0)"
                                                    
                                                    data-status="In Process" data-toggle="modal" data-target="#calender_modal"
                                                    class="chnage_reminder changeday nav-link text-warning" data-change_case_status_name="{{ (!empty($currentCaseStatusDay) && in_array($currentCaseStatusDay, $inprocessdaysarr))? $currentCaseStatusDay : 'In process' }}">
                                                    <strong class="day">{{ (!empty($currentCaseStatusDay) && in_array($currentCaseStatusDay, $inprocessdaysarr))? $currentCaseStatusDay : 'In process' }}</strong>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a
                                                    href="javascipt:void(0)"
                                                   
                                                    class="chnage_reminder changeday nav-link text-warning"
                                                    data-status="In Process" data-toggle="modal" data-target="#calender_modal"
                                                    data-change_case_status_name="{{ (!empty($currentCaseStatusDay) && in_array($currentCaseStatusDay, $awaitingdocsarr)) ? $currentCaseStatusDay : 'Awaiting Docs' }}">
                                                    <strong class="day">{{ (!empty($currentCaseStatusDay) && in_array($currentCaseStatusDay, $awaitingdocsarr)) ? $currentCaseStatusDay : 'Awaiting Docs' }}</strong>
                                                </a>
                                            </li>
                                            @php
                                                // 'COMPLETED APPLICATION'
                                                $checkMessageDayDisplayArr = array('new', 'quick review', 'completed application');
                                            @endphp
                                            @if(in_array(strtolower($currentCaseStatusDay), $checkMessageDayDisplayArr) || in_array($currentCaseStatusDay, $messagedayarr))
                                                <li class="nav-item">
                                                    <a
                                                        href="javascript:void(0)"
                                                        data-status="{{$data->id}}"
                                                        class="changeday nav-link text-warning"
                                                        data-change_case_status_name="{{ (!empty($currentCaseStatusDay) && in_array($currentCaseStatusDay, $messagedayarr)) ? $currentCaseStatusDay : 'messageday1' }}">
                                                        <strong class="day">{{ (!empty($currentCaseStatusDay) && in_array($currentCaseStatusDay, $messagedayarr)) ? $currentCaseStatusDay : 'messageday1' }}</strong>
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
                                       
                                        @if($loginUser->user_type == 3)
                                            <button class="btn btn-outline-info send_iva_team" data-user_id="{{ $userInfo->user_id }}" data-case_status="iva draft"> 
                                            Send IVA Team
                                            </button>
                                            <button class="btn btn-outline-info send_team_dmp" data-user_id="{{ $userInfo->user_id }}" data-case_status="Sent to DMP">
                                                Send DMP Team
                                            </button>
                                        @endif
                                        @if($loginUser->user_type == 5)
                                            <button class="btn btn-outline-info send_iva_team" data-target="#Sent_To_IVA_Modal" data-user_id="{{ $userInfo->user_id }}" data-case_status="iva draft">
                                            <!-- #Sent_To_IVA_Modal -->
                                            Send IVA
                                            </button>
                                            
                                            <button class="btn btn-outline-info send_dmp_team_data" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#Sent_To_DMP_Modal" data-user_id="{{ $userInfo->user_id }}" data-case_status="SEND TO DMP PROVIDER">
                                                Send DMP Provider
                                            </button>
                                        @endif
                                        
                                        @if($loginUser->user_type == 6)
                                            <button class="btn btn-outline-info send_ip_data" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#Sent_To_Ip_Modal" data-user_id="{{ $userInfo->user_id }}" data-case_status="SENT TO IP">

                                            Send IP
                                            </button>
                                            
                                            <button class="btn btn-outline-info send_team_dmp" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#Sent_To_DMP_team_Modal" data-user_id="{{ $userInfo->user_id }}" data-case_status="Sent to DMP">
                                                Send DMP Team
                                            </button>
                                        @endif

                                        @if($loginUser->user_type == 1)
                                            <button class="btn btn-outline-info" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#Sent_To_DMP_team_Modal">
                                                Send DMP Team
                                            </button>
                                            <button class="btn btn-outline-info" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#Sent_To_DMP_Modal">
                                                Send DMP Provider
                                            </button>
                                            <button class="btn btn-outline-info float-right" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#Sent_To_Ip_Modal">
                                                Send to IP
                                            </button>
                                            <button class="btn btn-outline-info ml-auto" id="case_option">
                                                Case Option
                                            </button>
                                        @endif

                                        @if($loginUser->user_type == 7)
                                            <button class="btn btn-outline-info" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#Sent_To_IVA_Modal">Send IVA Team</button>

                                            <button class="btn btn-outline-info" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#Sent_To_DMP_team_Modal">Send DMP Team</button>

                                            <button class="btn btn-outline-info" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#paid">Paid</button>

                                            <button class="btn btn-outline-info" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#cancelled">Cancelled</button>

                                            <button class="btn btn-outline-info" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#miss_payments">Missed Payment</button>

                                            <button class="btn btn-outline-info" id="case_option">Case Option</button>
                                        @endif

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


    <!-- reminder model pop up code start -->
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
                                                    <select class="form-control square-textbox fixed-size" required style="float:left;width:95px;" name="update_reminder_hour">
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
                                                    <select class="form-control square-textbox fixed-size" required style="float:left;width:95px;" name="update_reminder_minute">
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
    <!-- reminder model pop up code end -->
    <div id="calender_modal" class="modal fade calender_modal" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
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
                                <form action="#" class="d-block input-sm" style="width: 100%;">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <input type="hidden" id="calender_userId" name="userId" value="{{ $userInfo->user_id }}">
                                            <input type="hidden" id="calender_userName" name="userName" value="{{ $userInfo->name }}">
                                            <input type="hidden" id="case_status_reminder" name="caseStatus" value="">
                                            <input type="text" id="reminder_date" class="form-control datepicker" placeholder="Due Date:"/ value="">
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 pl-5">
                                            <div class="row pl-5 pr-3">
                                                <label for="Reminder_time" class="d-block text-primary" style="width: 100%;">ReminderTime</label>
                                                <div class="form-group">
                                                <select class="form-control square-textbox fixed-size" required style="float:left;width:95px;">
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
                                                <select class="form-control square-textbox fixed-size" required style="float:left;width:95px;">
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
                                                <div class="form-group" style="width: 100%;">
                                                    <textarea name="message" id="message" class=" form-control b-grey" value="" style="resize: none;border-radius: 10px;height: 250px;"></textarea>
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
                    <input type="submit" class="save_appointment btn btn-outline-info float-right btn-large " data-dismiss="modal" value="Save Appointment">
                </div>
            </div>
        </div>
    </div>
    
    
    
    
        <div id="Sent_To_Ip_Modal" class="modal fade Sent_To_Ip_Modal" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content card card-secondary">
                    <div class="modal-header">
                        <div class="card-title">Sent to IP</div>
                        <input type="hidden" id="userId" name="userId" value="{{ $userInfo->user_id }}">
                        <input type="hidden" name="send_to_ip" id="send_to_ip" value="SENT TO IP"> 
                        <button type="button" class="close alert_open" aria-label="Close">
                            <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                        </button>
                    </div>
                    <div class="modal-body text-primary sent_ip" style="padding:0px 20px;">
                        <p>Bank Statement For All Accounts
                            <input type="checkbox" required id="Bank_Statenment" name="sent_ip_checkbox"  value="Bank_statement_for_all_accounts" class="Ip_selectall">
                            <label for="Bank_Statenment"></label>
                            (Check For Rent , Income And Spending Habits Last 30 Days )
                        </p>
                        <p>
                            Check For Gambling
                            <input type="checkbox" required id="Gambling"  name="sent_ip_checkbox" value="Check_for_gambling" class="Ip_selectall">
                            <label for="Gambling"></label>
                        </p>
                        <p>
                            Wages Slip / Tax Return - Deduction Checked
                            <input type="checkbox" required id="wage_slip"  name="sent_ip_checkbox" value="Wages_slip/Tax_return_-_deduction_checked" class="Ip_selectall">
                            <label for="wage_slip"></label>
                        </p>
                        <p>
                            Proof Of Rent - Borad Letter,Standing Order Tenancy Arrangement
                            <input type="checkbox" required id="rent"  name="sent_ip_checkbox"  value="Proof_of_rent_-_borad_letter,standing_order_tenancy_arrangement" class="Ip_selectall">
                            <label for="rent"></label>
                        </p>
                        <p>
                            Morgage Statement if Applicable
                            <input type="checkbox" required id="Morgage"  name="sent_ip_checkbox" value="Morgage_statement_if_applicable" class="Ip_selectall">
                            <label for="Morgage"></label>
                        </p>
                        <p>
                            Photo Id
                            <input type="checkbox" required id="photid"  name="sent_ip_checkbox" value="Photo_id" class="Ip_selectall">
                            <label for="photid"></label>
                        </p>
                        <p>
                            Proof Of benifits (Evidence Of Bank And Universal Credit Full Breakdown)
                            <input type="checkbox" required id="benifits"  name="sent_ip_checkbox" value="Proof_Of_benifits_(Evidence_Of_bank_and_universal_credit_full_breakdown)" class="Ip_selectall">
                            <label for="benifits"></label>
                        </p>
                        <p>
                            Proof Of Debts - Make Sure Dated Within The 3 Months
                            <input type="checkbox" required id="debts"  name="sent_ip_checkbox" value="Proof_of_debts-make_sure_dated_within_the_3_months" class="Ip_selectall">
                            <label for="debts"></label>
                        </p>
                        <p>
                            Hp proof (Okay if on Creadit Search) Work out The Step Payment
                            <input type="checkbox" required id="hp_proof" name="sent_ip_checkbox" value="Hp_proof_(Okay_if_on_creadit_search)_work_out_The_step_payment" class="Ip_selectall">
                            <label for="hp_proof"></label>
                        </p>
                        <p>
                            Credit Searched
                            <input type="checkbox" required id="Credit_search" name="sent_ip_checkbox" value="credit_searched" class="Ip_selectall">
                            <label for="Credit_search"></label>
                        </p>
                        <p>
                            income And Expenses Completed Under Guidnelines
                            <input type="checkbox" required id="income_ex" name="sent_ip_checkbox" value="income_and_expenses_completed_under_guidnelines" class="Ip_selectall">
                            <label for="income_ex"></label>
                        </p>
                        <p>
                            Case Noted  Up On Relevant Portal 
                            <input type="checkbox" required id="case_note" name="sent_ip_checkbox" value="Case_noted_up_on_relevant_portal" class="Ip_selectall">
                            <label for="case_note"></label>
                        </p>
                        <p>
                            Click Most Approprite iP  To Send Case to 
                            <input type="checkbox" required id="Approprite" name="sent_ip_checkbox" value="click_most_approprite_iP_To_send_case_to " class="Ip_selectall">
                            <label for="Approprite"></label>
                        </p>
                        <p>
                            Client Blocked In For Slip3 , Client Is Aware
                            <input type="checkbox" required id="Slip" name="sent_ip_checkbox" value=" Client_blocked_in_for_Slip3_client_is_Aware" class="Ip_selectall">
                            <label for="Slip"></label>
                        </p>
                        <p>
                            Prep Call 15 Minitues Before Slip3 Call
                            <input type="checkbox" required id="Prep" name="sent_ip_checkbox" value="Prep_call_15_minitues_before_slip3_call" class="Ip_selectall">
                            <label for="Prep"></label>
                        </p>
                        <p>
                            Ask For Review
                            <input type="checkbox" required id="Review" name="sent_ip_checkbox" value="ask_for_review" class="Ip_selectall">
                            <label for="Review"></label>
                        </p>
                    </div>
                    <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
                        <a href="javascipt:void(0)" id="btn_hide" class="send_ip btn btn-outline-info" style="padding: 6px 30px;" data-dismiss="modal">Send</a>
                    </div>
                </div>
            </div>
        </div>
        
         

         <div id="Sent_To_DMP_Modal" class="modal fade Sent_To_DMP_Modal" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content card card-secondary">
                    <div class="modal-header">
                        <div class="card-title">send to DMP Provider</div>
                        <button type="button" class="close alert_open" aria-label="Close">
                            <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                        </button>
                    </div>
                    <div class="modal-body text-primary sent_dmp" style="padding:0px 20px;">
                        <form action="#" method="post">
                            @csrf
                            <input type="hidden" id="calender_userId" name="userId" value="{{ $userInfo->user_id }}">
                            <input type="hidden" id="dmp_provider" name="casestatus" value="SEND TO DMP PROVIDER">
                            <p>Check Case is Eligible
                                <input type="checkbox" required name="send_to_dmp_checkbox" value="Check_case_is_eligible" id="Eligible" class="dmp_selectall">
                                <label for="Eligible"></label>
                            </p>
                            <p>
                                Call And Transfer Customer
                                <input type="checkbox" name="send_to_dmp_checkbox" value="Call_and_transfer_customer" required id="Customer" class="dmp_selectall">
                                <label for="Customer"></label>
                            </p>
                            <p class="d-flex justify-content-between">
                               Send E-Mail
                                <span>
                                    <input type="submit" name="submit" class="btn btn-outline-info" value="SEND MAIL" style="margin-right: 10px;margin-top: -8px;">
                                    <input type="checkbox" name="send_to_dmp_checkbox" value="Send_e_mail" required id="send_email" class="dmp_selectall">
                                    <label for="send_email"></label>
                                </span>
                            </p>
                            <p class="text-center">
                                <!--<input type="submit" value="CASE SENT" id="btn_hide" class="team btn btn-outline-info" style="padding: 6px 30px;">-->
                            </p>
                        </form>
                    </div>
                     <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
                        <a href="javascipt:void(0)" id="btn_hide" class=" send_dmp btn btn-outline-info" style="padding: 6px 30px;" data-dismiss="modal">Send</a>
                    </div>
                </div>
            </div>
        </div>
    

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
                       {{-- <form action="#" method="post"> --}}
                        {{-- @csrf --}}
                             
                            <input type="hidden" id="userId" name="userId" value="{{ $userInfo->user_id }}">
                            <input type="hidden" id="iva_draft" name="case_status" value="iva draft">

                            <div id="showAddedIvaData"></div>
                            
                            {{-- <div id="showDefaultIvaData">
                                <p>Personal Detail
                                    <input type="checkbox"   name="Iva_checklist[]" value="Personal_detail" id="personal_detail1" class="selectall">
                                    <label for="personal_detail1"></label>
                                </p>
                                <p>
                                    Employed
                                    <input type="checkbox" required name="Iva_checklist[]" value="Employed" id="employed1" class="selectall">
                                    <label for="employed1"></label>
                                </p>
                                <p>
                                    Living Arrangments
                                    <input type="checkbox" required name="Iva_checklist[]" value="Living_arrangments" id="living_arrangments1" class="selectall">
                                    <label for="living_arrangments1"></label>
                                </p>
                                <p>
                                    Kids
                                    <input type="checkbox" required name="Iva_checklist[]" value="Kids" id="kids1" class="selectall">
                                    <label for="kids1"></label>
                                </p>
                                <p>
                                    Drive (Car Finance)
                                    <input type="checkbox" required  name="Iva_checklist[]" value="Drive(Car Finance)"  id="car_finance1" class="selectall">
                                    <label for="car_finance1"></label>
                                </p>
                                <p>
                                    Income
                                    <input type="checkbox" required name="Iva_checklist[]" value="Income" id="IVA_income1" class="selectall">
                                    <label for="IVA_income1"></label>
                                </p>
                                <p>
                                    Creditor Debts Higher Then &#163; 5,000
                                    <input type="checkbox" required name="Iva_checklist[]" value="Creditor_debts_higher_then_5,000" id="IVA_benifits1" class="selectall">
                                    <label for="IVA_benifits1"></label>
                                </p>
                                <p>
                                    Evidence
                                    <input type="checkbox" required name="Iva_checklist[]" value="Evidence" id="evidence1" class="selectall">
                                    <label for="evidence1"></label>
                                </p>
                                <p>
                                    Assets
                                    <input type="checkbox" required name="Iva_checklist[]" value="Assets" id="assets1" class="selectall">
                                    <label for="assets1"></label>
                                </p>
                                <p>
                                    Credit Search Detail
                                    <input type="checkbox" required name="Iva_checklist[]" value="Credit_search_detail" id="IVA_Credit_search1" class="selectall">
                                    <label for="IVA_Credit_search1"></label>
                                </p>
                                <p>
                                   Customer Has Agreed To This Debts Solution
                                    <input type="checkbox" required name="Iva_checklist[]" value="Customer_has_agreed_to_this_debts_solution" id="IVA_customer1" class="selectall">
                                    <label for="IVA_customer1"></label>
                                </p>
                            </div> --}}
                            {{-- <p class="text-center">
                                 <a href="javascipt:void(0)" class="send_iva btn btn-outline-info">Send</a>
                            </p> --}}
                       {{-- </form> --}}
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
                       <input type="hidden" name="send_dmp_team" value="dmp draft" id="send_dmp_team">
                       <input type="hidden" id="calender_userId" name="userId" value="{{ $userInfo->user_id }}">
                       <button type="button" class="close alert_open" aria-label="Close">
                           <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                       </button>
                   </div>
                   <div class="modal-body text-primary sent_iva" style="padding:0px 20px;">
                       <form action="#" method="">
                            
                           <p>Personal Detail
                               <input type="checkbox" required id="DMP_team_personal_detail" value="Personal_detail" class="dmp_team_selectall">
                               <label for="DMP_team_personal_detail"></label>
                           </p>
                           <p>
                               Employed
                               <input type="checkbox" required id="DMP_team_employed" value="Employed" class="dmp_team_selectall">
                               <label for="DMP_team_employed"></label>
                           </p>
                           <p>
                               Living Arrangments
                               <input type="checkbox" required id="DMP_team_living_arrangments" value="Living_arrangments" class="dmp_team_selectall">
                               <label for="DMP_team_living_arrangments"></label>
                           </p>
                           <p>
                               Kids
                               <input type="checkbox" required id="DMP_team_kids"  value="Kids" class="dmp_team_selectall">
                               <label for="DMP_team_kids"></label>
                           </p>
                           <p>
                               Drive (Car Finance)
                               <input type="checkbox" required id="DMP_team_car_finance" value="Drive(Car_Finance)" class="dmp_team_selectall">
                               <label for="DMP_team_car_finance"></label>
                           </p>
                           <p>
                               Income &#163;800 or above
                               <input type="checkbox" required id="DMP_team_income" value="Income_&#163;_800_or_above" class="dmp_team_selectall">
                               <label for="DMP_team_income"></label>
                           </p>
                           <p>
                               Creditor Debts Higher Then &#163; 2,000
                               <input type="checkbox" required id="DMP_team_benifits"  value="creditor_debts_higher_then_&#163;_2,000" class="dmp_team_selectall">
                               <label for="DMP_team_benifits"></label>
                           </p>
                           <p>
                              Customer Has Agreed To This Debts Solution
                               <input type="checkbox" required id="DMP_team_Customer" value="Customer_has_agreed_to_this_debts_solution" class="dmp_team_selectall">
                               <label for="DMP_team_Customer"></label>
                           </p>
                           <p class="text-center">
                           </p>
                       </form>
                   </div>
                   <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
                       <a href="javascipt:void(0)" id="btn_hide" class="send_dmp_team btn btn-outline-info" style="padding: 6px 30px;" data-dismiss="modal">Send</a> 
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
                        </div>
                        <div class="modal-footer justify-content-start">
                            <div class="buttons">
                                <a href="javascript:void(0)" class="zcasetype_change btn btn-outline-danger" data-dismiss="modal" id="modal_remove">yes</a>
                                <a href="javascript:void(0)" class="btn btn-outline-primary" id="back">Back</a>
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
                                
                            </div>
                            <div class="modal-footer justify-content-start">
                                    <div class="buttons width-100 justify-content-between">
                                    <a href="javascript:void(0)" class="case_status-change btn btn-outline-danger" style="padding: 10px 30px;">Paid</a>
                                    <a href="javascript:void(0)" class="btn btn-outline-primary" data-dismiss="modal" id="modal_hide">No</a>
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
                                
                            </div>
                            <div class="modal-footer justify-content-start">
                                    <div class="buttons width-100 justify-content-between">
                                    <a href="javascript:void(0)" class="case_status-change btn btn-outline-danger" style="padding: 10px 30px;">Cancelled</a>
                                    <a href="javascript:void(0)" class="btn btn-outline-primary" data-dismiss="modal" id="modal_hide">No</a>
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
                                
                            </div>
                            <div class="modal-footer justify-content-start">
                                    <div class="buttons width-100 justify-content-between">
                                     <a href="javascript:void(0)" class="case_status-change btn btn-outline-danger" style="padding: 10px 30px;">Missed Payment</a>
                                    <a href="javascript:void(0)" class="btn btn-outline-primary" data-dismiss="modal" id="modal_hide">No</a>
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
    $("#alert_open").click(function () {
        $("#alert_modal").show();
        $("body").addClass("alert_open");
    })
    $("#back").click(function () {
        $("#alert_modal").hide();
        $("body").removeClass("alert_open");
    })
    $("#modal_remove").click(function () {
        $(".modal:not('#calender_modal')").hide();
    })
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

<script type="text/javascript">
    $(document).ready(function() {
       $(document).on('click','.case_status-change',function(e){
           e.preventDefault();
        //   are you sure modal close its not in this button - manoj 08-02
            // $('#alert_modal').modal('show');
            
            
            
            $('#alert_modal').on('click','.zcasetype_change', function () {
                
                
                $('.zcase_change').click(function()
                {
                    
                 var case_status_name=$(this).text();
             
                alert(case_status_name);

           var userId=$('#userId').val();

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
       });
    });
</script>

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
            data:{ 
                userId: userId,
                checkbox: checkbox,
                chckbx_checked: chckbx_checked,
                case_status: case_status
            },
            //dataType:'json',
            success:function(data)
            {
                console.log('data1616', data);
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
                        //$('#Sent_To_IVA_Modal').modal('hide');
                        //$('#calender_modal').modal('show');
                        //$('#case_status_reminder').val(case_status);
                    }
                    else{
                        var message = 'something wrong please try again';
                    }
                }
                
                swal(message, {
                    icon: messageIcon,
                });
            }
        });

        //alert('chckbx_checked => ' + chckbx_checked + ' val => ' + $(this).val());
        //return false;
    })
</script>
<!-- to insert the one by one value of send to iva checkbox code end-->

 <script type="text/javascript">
    /*$(document).on('click','.selectall:checked',function(e){
            // e.preventDefault();

            

            var checkbox = $(this).val();

            var userId = $('#userId').val();
            
            var case_status = $('#iva_draft').val();
            // alert(case_status);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:'{{ route('user.update_case_assigned_to') }}',
                    method:'post',
                    data:{ 
                        userId:userId,
                        checkbox:checkbox,
                        case_status:case_status
                        
                    },
                    dataType:'json',
                    
                    success:function(data)
                    {
                        
                         var messageIcon = 'error';
                            if(data == 'success') {
                                    var message = 'Case Assing succesfully';
                                    var messageIcon = 'success';
                                    $('#Sent_To_IVA_Modal').modal('hide');
                                    $('#calender_modal').modal('show');
                                    $('#case_status_reminder').val(case_status);

                                } 
                                else{
                                    var message = 'something wrong please try again';
                                }
                                swal(message, {
                                icon: messageIcon,
                                });
                                
                                }

                });



    });*/
</script>



<script>   
$(document).ready(function(){
    $(document).on('click','.dmp_selectall:checked',function(){
            var userId = $('#userId').val();
            
            var case_status = $('#dmp_provider').val();
            
            var checkbox = $(this).val();

            
            
            $.ajax({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'{{route('user.update_case_dmp_advisor')}}',
                method:'post',
                data:{
                    userId:userId,
                    checkbox:checkbox,
                    case_status:case_status
                    
                },
                dataType:'json',
                success:function(data)
                {
                    var messageIcon = 'error';
                            if(data == 'success') {
                                    var message = 'Data save succesfully';
                                     var messageIcon = 'success';
                                } else if(data == 'success_case') {
                                    var message = 'Case Assing succesfully';
                                    var messageIcon = 'success';
                                    $('#Sent_To_DMP_Modal').modal('hide');
                                    $('#calender_modal').modal('show');
                                    $('#case_status_reminder').val(case_status);
                                }
                                else{
                                    var message = 'something wrong please try again';
                                }
                                swal(message, {
                                icon: messageIcon,
                                });
                }
            })
    });
});

</script>

<script type="text/javascript">

$('.save_appointment').click(function(){

    var userId = $('#calender_userId').val();
    var userName = $("#calender_userName").val();      
    var caseStatus = $('.case_status_reminder').val();  
    
    alert(caseStatus);

    var appointmentDate = $('.datepicker').val();
    
    var hour = $('#hour').val();
    var minute = $('#minute').val();
    var message = $('#message').val();


    $.ajax({
        url:'{{ route('user.change_case_status_appointment') }}',
        type:'post',
        data:{_token:'{{csrf_token()}}',userId:userId,userName:userName,caseStatus:caseStatus,appointmentDate:appointmentDate,hour:hour,minute:minute,message:message},
        dataType:'json',
        success:function(data)
        {
            alert(data);
            var messageIcon = 'error';
            if (data == 'success') {
                var message = 'Appointment Saved Succesfully for the user';
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

// var Cheked = $("#Sent_To_Ip_Modal input:checked");


$("#Sent_To_Ip_Modal .modal-footer #btn_hide").hide();

$('body').on('click','#Sent_To_Ip_Modal input',function(){
    $("#Sent_To_Ip_Modal .modal-footer #btn_hide").show();
});
    
$(".dropdown-menu select option").click(function () {
    var selText = $(this).text();
    $(this).parents('.date-input').find('input').attr("placeholder", selText);
});


// var Cheked = $("#Sent_To_DMP_Modal input:checked");

$("#Sent_To_DMP_Modal .modal-footer #btn_hide").hide();

$('body').on('click','#Sent_To_DMP_Modal input',function(){
    $("#Sent_To_DMP_Modal .modal-footer #btn_hide").show();
});
    
$(".dropdown-menu select option").click(function () {
    var selText = $(this).text();
    $(this).parents('.date-input').find('input').attr("placeholder", selText);
});


// var Cheked = $("#Sent_To_IVA_Modal input:checked");


$("#Sent_To_IVA_Modal .modal-footer #btn_hide").hide();

$('body').on('click','#Sent_To_IVA_Modal input',function(){
    $("#Sent_To_IVA_Modal .modal-footer #btn_hide").show();
});
    
$(".dropdown-menu select option").click(function () {
    var selText = $(this).text();
    $(this).parents('.date-input').find('input').attr("placeholder", selText);
});


</script>

<script type="text/javascript">
    $(document).on('click','.Ip_selectall:checked',function(){
           
           var userId = $('#userId').val();
               
            var checkbox = $(this).val();
            var case_status = $('#send_to_ip').val();
            
           $.ajax({
                url:'{{route('user.send_to_ip')}}',
                method:'get',
                data:{
                    userId:userId,
                    checkbox:checkbox,      
                    case_status:case_status
                },
                datatype:'json',
                success:function(data)
                {   

                    var messageIcon = 'error';
                            if(data == 'success') {  
                             var message = 'Data save succesfully';
                            var messageIcon = 'success';    
                            } else if(data == 16) {
                                    var message = 'Case Assing succesfully';
                                    var messageIcon = 'success';
                                    $('#Sent_To_Ip_Modal').modal('hide');
                                    $('#calender_modal').modal('show');
                                    $('#case_status_reminder').val(case_status);
                                }
                                
                                swal(message, {
                                icon: messageIcon,
                                });
                   
                }
           });

    }); 
</script>

<script type="text/javascript">
    $(document).on('click','#case_option',function(){

        var userId = $('#userId').val();

        location.href = '{{url('user/view/case_option')}}/'+userId;


    });
</script>

 <script type="text/javascript">
   $(document).on('click','.dmp_team_selectall:checked',function(){
   

          var userId = $('#calender_userId').val();
         
          var case_status = $('#send_dmp_team').val();
          
          var checkbox = $(this).val();
          
                    
          $.ajax({
                 headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
               url:'{{route('user.send_dmp_team')}}',
               method:'post',
               data:{
                   userId:userId,
                   case_status:case_status,
                   checkbox:checkbox
               },
               datatype:'json',
               success:function(data)
               {  
                var messageIcon = 'error';
                             if(data == 8) {
                                    var message = 'Case Assing succesfully';
                                    var messageIcon = 'success';
                                    $('#Sent_To_Ip_Modal').modal('hide');
                                    $('#calender_modal').modal('show');
                                    
                                }
                                else
                                {
                                    var message = 'something went wrong';
                                }
                                
                                swal(message, {
                                icon: messageIcon,
                                });
                            $('#case_status_reminder').val(case_status);
                }
          });

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
            success:function(data)
            {
                 var messageIcon = 'error';
                   if(data != 'success') {

                       var message = 'Case Assing succesfully';
                       var messageIcon = 'success';
                   } else {
                       alert(data);
                       var message = 'something wrong please try again';
                   }
                   swal(message, {
                   icon: messageIcon,
                   });
                   $('.changeday').attr('disable',true);
            }
        })
    });

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
            success:function(data)
            {
                
                $('#showAddedIvaData').html(data);
                $('#showAddedIvaData').show();
                $('#showDefaultIvaData').remove();
                $('#Sent_To_IVA_Modal').modal('show'); 
                console.log(data);
                return false;
                 /*var messageIcon = 'error';
                   if(data != 'success') {

                       var message = 'Case Assing succesfully';
                       var messageIcon = 'success';
                   } else {
                       alert(data);
                       var message = 'something wrong please try again';
                   }
                   swal(message, {
                   icon: messageIcon,
                   });
                   $('.changeday').attr('disable',true);*/
            }
        });
    });
    
    $(document).on('click','.send_dmp_team_data',function(e)
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
            success:function(data)
            {
                $('#showAddedDmpProviderData').html(data);
                $('#showAddedDmpProviderData').show();
                $('#showDefaultDmpProviderData').remove();
                $('#Sent_To_DMP_Modal').modal('show'); 
                console.log(data);
                return false;
                 /*var messageIcon = 'error';
                   if(data != 'success') {

                       var message = 'Case Assing succesfully';
                       var messageIcon = 'success';
                   } else {
                       alert(data);
                       var message = 'something wrong please try again';
                   }
                   swal(message, {
                   icon: messageIcon,
                   });
                   $('.changeday').attr('disable',true);*/
            }
        });
    });
    
    //send_ip_data
    
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
            success:function(data)
            {
                $('#showAddedIpData').html(data);
                $('#showAddedIpData').show();
                $('#showDefaulIpData').remove();
                $('#Sent_To_Ip_Modal').modal('show'); 
                console.log(data);
                return false;
                 /*var messageIcon = 'error';
                   if(data != 'success') {

                       var message = 'Case Assing succesfully';
                       var messageIcon = 'success';
                   } else {
                       alert(data);
                       var message = 'something wrong please try again';
                   }
                   swal(message, {
                   icon: messageIcon,
                   });
                   $('.changeday').attr('disable',true);*/
            }
        });
    });
    
    //send_dmp_team
    
    $(document).on('click','.send_team_dmp',function(e)
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
            success:function(data)
            {
                $('#showAddedDmpTeamData').html(data);
                $('#showAddedDmpTeamData').show();
                $('#showDefaultDmpTeamData').remove();
                $('#Sent_To_DMP_team_Modal').modal('show'); 
                console.log(data);
                return false;
                 /*var messageIcon = 'error';
                   if(data != 'success') {

                       var message = 'Case Assing succesfully';
                       var messageIcon = 'success';
                   } else {
                       alert(data);
                       var message = 'something wrong please try again';
                   }
                   swal(message, {
                   icon: messageIcon,
                   });
                   $('.changeday').attr('disable',true);*/
            }
        });
    });
     
</script>
<script>
    
    $("#modal_hide").click(function () {
                    $(".modal").hide();
                    
                    $("#appointment_model").removeClass("show");
                    $("body").removeClass("modal-open");
                    // $('#appointment_model').show();
                    $("body").removeClass("alert_open");
                });
</script>
@endsection