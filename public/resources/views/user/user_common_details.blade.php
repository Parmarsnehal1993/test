@extends('layouts.app')
@section('content')
        
@php
    $loginUserData = Auth::user();
    unset($loginUserData->password);
    $redirect_uri = route('user.truelayer_redirect');
        $state = $userInfo->user_id;

        $client_secret = "d841a342-0b6d-4352-ac2f-1c25a5a2ce85";
        $client_id = "sandbox-freezedebt-ec5d22";
        $scope = "info%20accounts%20balance%20cards%20transactions%20direct_debits%20standing_orders%20offline_access";

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
    .table-review-list td{
        color:#00b0ff;
    }
    @media (min-width:1000px) and (max-width:1400px){
        .dataTables_wrapper .buttons {
            min-width: 500px;
        }
    }
    .result {
        text-align: left;
        display: block;
        align-items: center;
        padding-right: 5px;
        
        margin-right: 5px;
        margin-top:0px;
}
.result:last-child{
    border-color:transparent;
}
.result h1, .result h2 {
    margin: 0;
    font-family: "bebas";
    margin: 0;
    font-family: "bebas";
    display: inline-block;
}
.result h1 {
    font-size: 25px;
}

.font{
    font-weight : bolder !important;
}
.inactiveLink {
   pointer-events: none;
   cursor: default;
}
</style>
@if($loginUser->user_type == 5 || $loginUser->user_type == 6)
@else
<style>
.tab_dmp,.tab_iva, .tab_da{
    display:none;
}
@media (max-width:767px){
    .buttons.mt-2 .btn{
        margin-bottom:5px;
    }    
}

 #button_iva_compliance{
        display : block !important;
    }
#button_compliance{
        display : block !important;
    }
#button_da{
        display : block !important;
    }
    .score-header span {
        
        font-family: "avenir_light";
    }
    .darker{
        font-weight : bolder !important;
    }
</style> 
@endif

<div id="successMessage">
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
</div>
<div class="main-content pt-0">
    <div class="row mt--80">
        <div class="col-12 col-sm-12 col-md-12 col-lg-0 col-xl-9">
            <div class="row bb-cr">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6  p-0">
                    <div class="main-title">
                        <h1 class="font-h1 d-flex align-items-center">
                            <strong>Case:</strong>
                            <span class="font-light">
                                {{ !empty($userInfo->name) ? $userInfo->name : '' }} {{ !empty($userInfo->surname) ? ' '.$userInfo->surname : '' }}
                            </span>
                            
                        </h1>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6  p-0">
                    <div class="d-flex justify-content-end align-items-center justify-content-md-start justify-content-lg-start justify-content-xl-end nav-list mt-2">
                            @php
                                
                                $debts = hasDebts($userInfo->user_id);
                                
                            @endphp
                        @if($deleted_case == "yes")
                            <a class="Motu btn btn-primary btn btn-outline-info mr-0" href="{{ route('user.restore_case',[$userInfo->user_id]) }}" style="margin-left: 11px;width: 120px;">Restore</a>
                        @endif
                        
                        <span class="item">Debts
                            @if($debts > 0 || !empty($debts))
                                @if($debts > 0)
                                    <span class="dot dot-success"></span>
                                @else
                                    <span class="dot dot-danger"></span>
                                @endif
                            @else
                                <span class="dot dot-danger"></span>
                            @endif
                        </span>
                        <span class="item">Income
                            @php
                            $income = hasIncome($userInfo->user_id);
                            @endphp
                            @if($income  == 0)
                                <span class="dot dot-danger"></span>
                            @elseif($income != 0 && $income<3)
                                <span class="dot dot-warning"></span>
                            @elseif($income == 3)
                                <span class="dot dot-success"></span>
                            @endif
                        </span>
                        <span class="item">Expenditure
                            @php
                            $outgoing = hasOutg($userInfo->user_id);
                            @endphp
                            @if($outgoing == 0)
                                <span class="dot dot-danger"></span>
                            @elseif($outgoing != 0 && $outgoing < 12)
                                <span class="dot dot-warning"></span>
                            @elseif($outgoing == 12)
                                <span class="dot dot-success"></span>
                            @endif
                        </span>
                        <span class="item">Evidence
                            @php
                            $Evidence = hasEvidence($userInfo->user_id);
                            @endphp
                            @if($Evidence > 0)
                                <span class="dot dot-success"></span>
                            @else
                                <span class="dot dot-danger"></span>
                            @endif
                        </span>
                        
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 15px;">
                <div class="col-md-4 p-0">
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
                <div class="col-md-8 p-0">
                    @if($deleted_case == "yes")
                        <div style="padding-left: 57%;color:red;font-size:20px;">this case is deleted</div>
                    @endif
                    
                    @if(!empty($userInfo->campaign) && isset($userInfo->campaign))
                             <div class="d-inline-block p-0" style="margin-right:50px;">
                                <h4 class="d-inline-block font-15">
                                    <strong class="font">Campaign:</strong>
                                         @if(isset($userInfo->campaign) && !empty($userInfo->campaign))
                                            <span style="font-size:15px;font-family: avenir_light;">{{ $userInfo->campaign }}</span>
                                        @endif
                                    
                                </h4>
                            </div>    
                    @endif
                    @if(!empty($userInfo->media_source) && isset($userInfo->media_source))
                             <div class="d-inline-block p-0">
                                <h4 class="d-inline-block font-15">
                                    <strong class="font">Media Source:</strong>
                                         @if(isset($userInfo->media_source) && !empty($userInfo->media_source))
                                            <span style="font-size:15px;font-family: avenir_light;">{{ $userInfo->media_source }}</span>
                                        @endif
                                    
                                </h4>
                            </div>    
                    @endif
                </div>
                
            </div>
            <div class="row w-100 score-header m-0">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">
                    <div class="row">
                        <div class="d-inline-block mr-2">
                            <h5 class="d-inline-block font-15">
                                <strong class="darker" style="font-weight: bold;">customer no:</strong>
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
                
                
                
              @php 
                    $class =  "";
                    $classValue = 0;
                    if(!empty($allData_compliance)){
                        $classValue += 1;
                    }
                    if(!empty($allData_iva_compliance)){
                        $classValue += 1;
                    }
                    if(!empty($allData)){
                        $classValue += 1;
                    }
                    if(!empty($userSolution)){
                        $classValue += 1;
                    }
                    if(!empty($userListSignupQuestions[0]->where_did_you_hear_about_us)){
                        $classValue += 1;
                    }
                   
                    if($classValue == 5){
                        $class = "col-md-2";
                    }
                    if($classValue == 4){
                        $class = "col-md-3";
                    }
                    if($classValue == 3){
                        $class = "col-md-4";
                    }
                    if($classValue == 2){
                        $class = "col-md-6";
                    }
                    if($classValue == 1){
                        $class = "col-md-12";
                    }
                    
                @endphp
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-start p-0">
                    <div class="row w-100 score-header">
                        @if(!(empty($allData_compliance)))
                        <div class="d-inline-block {{ $class }} p-0">
                            
                            <h4 class="d-inline-block font-10">
                                
                                    @php
                                       $result = $introducation_compliance_result + $vulnerability_compliance_result + $fact_find_compliance_result + $ie_compliance_result + $dmp_compliance_result + $confirmation_compliance_result;
                                        $fail = 45;
                                    @endphp
                                    <strong class="font">DMP Compliance:</strong>
                                   @if($fail_introducation_compliance > 0 || $fail_vulnerability_compliance > 0 || $fail_fact_find_compliance > 0 || $fail_ie_compliance > 0 || $fail_compliance_dmp > 0 || $fail_confirmation_compliance > 0)
                                         <span>FAIL</span>
                                    @else 
                                        @if($result == 45 || $result <= 45 )   
                                            <span>FAIL</span>
                                        @else
                                            <span>PASS</span>
                                        @endif
                                    @endif
                                   @if($fail_introducation_compliance > 0 || $fail_vulnerability_compliance > 0 || $fail_fact_find_compliance > 0 || $fail_ie_compliance > 0 || $fail_compliance_dmp > 0 || $fail_confirmation_compliance > 0)
                                        <span>{{ $fail }} %</span>
                                    @else 
                                        <span>{{ $result }} %</span>
                                    @endif
                            </h4>                
                             
                        </div>
                        @endif
                        
                        @if(!(empty($allData_iva_compliance)))
                        <div class="d-inline-block {{$class}} p-0">
                            
                            <h4 class="d-inline-block font-10">
                                
                                    @php
                                        $result = $introducation_iva_compliance_result + $vulnerability_iva_compliance_result + $fact_find_iva_compliance_result + $ie_iva_compliance_result + $iva_compliance_result + $confirmation_iva_compliance_result;
                                         $fail = 45; 
                                    @endphp
                                    <strong class="font">IVA Compliance:</strong>
                                   @if($fail_introducation_iva_compliance > 0 || $fail_vulnerability_iva_compliance > 0 || $fail_fact_find_iva_compliance > 0 || $fail_ie_iva_compliance > 0 || $fail_compliance_iva > 0 || $fail_iva_confirmation_compliance > 0)
                                         <span>FAIL</span>
                                    @else 
                                        @if($result == 45 || $result <= 45 )   
                                            <span>FAIL</span>
                                        @else
                                            <span>PASS</span>
                                        @endif
                                    @endif
                                   @if($fail_introducation_iva_compliance > 0 || $fail_vulnerability_iva_compliance > 0 || $fail_fact_find_iva_compliance > 0 || $fail_ie_iva_compliance > 0 || $fail_compliance_iva > 0 || $fail_iva_confirmation_compliance > 0)
                                        <span>{{ $fail }} %</span>
                                    @else 
                                        <span>{{ $result }} %</span>
                                    @endif
                            </h4>         
                            
                        </div>
                        @endif
                    
                        @if(!(empty($allData)))
                        <div class="d-inline-block {{ $class }} p-0">
                             
                            <h4 class="d-inline-block font-10">
                                    @php
                                        $result = $introduction_result + $vulnerability_result + $fact_find_result + $solution_result + $documentation_result + $confirmation_result;
                                        $fail = 45; 
                                    @endphp
                                    <strong class="font">Da Quality:</strong>
                                    @if($fail_introduction > 0 || $fail_vulnerability > 0 || $fail_fact_find > 0
                                    || $fail_solution > 0 || $fail_documentation > 0 || $fail_confirmation_sale > 0)
                                         <span>FAIL</span>
                                    @else 
                                        @if($result == 45 || $result <= 45 )   
                                            <span>FAIL</span>
                                        @else
                                            <span>PASS</span>
                                        @endif
                                    @endif
                                    @if($fail_introduction > 0 || $fail_vulnerability > 0 || $fail_fact_find > 0
                                    || $fail_solution > 0 || $fail_documentation > 0 || $fail_confirmation_sale > 0)
                                        <span>{{ $fail }} %</span>
                                    @else 
                                        <span>{{ $result }} %</span>
                                    @endif
                            </h4>         
                           
                        </div>
                        @endif
                        
                        @if(isset($userSolution))
                        <div class="d-inline-block {{$class}} p-0">
                            <h4 class="d-inline-block font-15">
                                <strong class="font">Provider:</strong>
                                     @if(isset($userSolution->insolvency) && !empty($userSolution->insolvency))
                                        <span style="font-size:15px;">{{ $userSolution->insolvency }}</span>
                                    @endif
                                
                            </h4>
                        </div>
                        @endif
                        @if(isset($is_gambler))
                        <div class="d-inline-block {{$class}} p-0">
                            <h4 class="d-inline-block font-15">
                                @if(isset($is_gambler) && !empty($is_gambler))
                                @if($gamblerCount > 100) 
                                    @php
                                        $dangerClass = "text-danger";
                                    @endphp
                                @endif
                                <span style="font-size:15px;" class="{{ $dangerClass }}">GAMBLER</span>
                                @endif
                            </h4>
                        </div>
                        @endif
                        
                       
                        
                    </div>
                   
                     
                     </div>
   
                    
                   
                    
            </div>
            </div>
            
        </div>
       <style>
    .min-height-279{
        min-height: 279px;
    }
</style>
        <section class="card-section">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9">
                            <div class="row ml--30">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                    <div class="card  min-height-279">
                                        <div class="card-title">
                                            Personal details
                                        </div>
                                            @include('user.userInfo')
                                    </div>
                                    <div class="card min-height-279">
                                        <div class="card-title">
                                            Check list
                                        </div>
                                        @include('user.checklist')
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-8">
                                    <div class="card height-auto">
                                        <div class="card-title">
                                            Debts
                                        </div>
                                            @include('user.debts')
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="row ml--30">
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="card height-auto">
                                                        <div class="card-title">
                                                            Income
                                                        </div>
                                                            @include('user.income')
                                                    </div>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="card height-auto" style="max-width:94%;">
                                                        <div class="card-title">
                                                            Expenditure
                                                        </div>
                                                            @include('user.outgoing')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="card height-auto">
                                        <div class="card-title">
                                            Transaction Analysis
                                        </div>
                                            @include('user.transaction_analysis')
                                    </div>
                                    <div class="card height-auto">
                                        <div class="card-title">
                                            Asset
                                        </div>
                                            @include('user.assets')
                                    </div>
                                    <div class="card height-auto">
                                        <div class="card-title">
                                            Solutions
                                        </div>
                                            @include('user.review')
                                    </div>
                                </div>
                            </div>
                            <hr style="background-color:#008dcc;height:1.5px" class="mt-0">
                            <div class="row m-0">
                                 @php
                                    $loginUserData = Auth::user();
                                    unset($loginUserData->password);
                                    $loginUser = $loginUserData;
                                @endphp

                                @if($loginUser->user_type == 10)

                                @else
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <form id="update_case_status_form" action="#" method="POST" class="display-ib">
                                            @csrf
                                        <input type="hidden" id="userId" name="userId" value="{{ $userInfo->user_id }}">
                                           
                                        <ul class="navbar-nav footer-link">
                                           
                                            <li class="nav-item">
                                                <a href="javascript:void(0)"  data-zcasestatus="not interested" value="not interested" class="nav-link text-danger case_status-change">
                                                    <strong class="zcase_change">not interested</strong>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)"  data-zcasestatus="Do Not Contact" value="Do Not Contact" class="nav-link text-danger case_status-change">
                                                    <strong class="zcase_change">Do Not Contact</strong>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)"  data-zcasestatus="debt_relief_order_complete" value="debt_relief_order_complete" class="nav-link text-danger case_status-change">
                                                    <strong class="zcase_change">DRO</strong>
                                                </a>
                                            </li>
                                            
                                            @if($loginUser->user_type == 5 || $loginUser->user_type == 6)
                                            
                                            @else
                                            
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" data-status="In Process" class="chnage_reminder changeday nav-link text-warning" data-change_case_status_name="{{ 'In Process' }}">
                                                    <strong class="day">{{ "In Process" }}</strong>
                                                </a>
                                            </li>
                                            
                                            @if(!empty($userInfo->zCaseType) && (in_array($userInfo->zCaseType, $inprocessdaysarr) || $userInfo->zCaseType == 'In Process'))
                                                <li class="nav-item"> 
                                                    <a  href="javascript:void(0)" data-status="In Process"
                                                        class="chnage_reminder changeday nav-link text-warning" data-change_case_status_name="@if ($userInfo->zCaseType == 'In Process' || $currentCaseStatusDay ==  "") {{ 'inprocessday1' }} @else  {{ $currentCaseStatusDay }} @endif">
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
                                            
                                            @endif
                                            
                                            @if($loginUser->user_type == 5 || $loginUser->user_type == 6)
                                            
                                            @else
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" class="chnage_reminder changeday nav-link text-warning" data-status="Awaiting Docs" data-change_case_status_name="{{ 'Awaiting Docs' }}">
                                                    <strong class="day">{{ "Awaiting Docs" }}</strong>
                                                </a>
                                            </li>
                                            
                                            @if(!empty($userInfo->zCaseType) && (in_array($userInfo->zCaseType, $awaitingdocsarr) || $userInfo->zCaseType == 'Awaiting Docs'))
                                                <li class="nav-item"> 
                                                    <a href="javascript:void(0)" class="chnage_reminder changeday nav-link text-warning" data-status="Awaiting Docs"
                                                        data-change_case_status_name="@if ($userInfo->zCaseType == 'Awaiting Docs' || $currentCaseStatusDay ==  '') {{ 'awaitingdocsday1' }} @else  {{ $currentCaseStatusDay }} @endif">
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
                                            
                                            @endif
                        
                                            @php
                                                // 'COMPLETED APPLICATION'
                                                $checkMessageDayDisplayArr = array('QUICK REVIEW', 'COMPLETED APPLICATION');
                                            @endphp
                                            
                                            @if(in_array(strtolower($currentCaseStatusDay), $checkMessageDayDisplayArr)|| $userInfo->zCaseType == 'QUICK REVIEW' || $userInfo->zCaseType == 'COMPLETED APPLICATION' || in_array($currentCaseStatusDay, $messagedayarr))
                                                <li class="nav-item">
                                                    <a href="javascript:void(0)" data-status="" class="changeday nav-link text-warning"
                                                        data-change_case_status_name="{{ (!empty($currentCaseStatusDay ) && in_array($currentCaseStatusDay , $messagedayarr)) ? $currentCaseStatusDay  : 'messageday1' }}">
                                                        <strong class="day">{{ (!empty($currentCaseStatusDay ) && in_array($currentCaseStatusDay , $messagedayarr)) ? $currentCaseStatusDay  : 'messageday1' }}</strong>
                                                       
                                                    </a>
                                                </li>
                                            @endif
                                            
                                            @php
                                                $loginUserData = Auth::user();
                                                unset($loginUserData->password);
                                                $loginUser = $loginUserData;
                                                
                                            @endphp
                                            
                                            @if($loginUser->user_type == 5 || $loginUser->user_type == 6)
                                               @if($userInfo->zCaseType == "Failed Compliance")
                                                @if( isset($allData_iva_compliance) && isset($allData_compliance) )
                                                    <li class="nav-item">
                                                        <a href="javascript:void(0)" data-status="" data-zcasestatus="Fixed Compliance" class="nav-link text-danger Failed_compliance"> 
                                                            <strong class="zcase_change text-success">Fixed Compliance</strong>
                                                        </a>
                                                    </li>
                                                @endif
                                                @endif
                                               
                                            
                                       
                                             @if($userInfo->zCaseType == "Failed Compliance" && $loginUser->user_type == 6)
                                              <li class="nav-item">
                                                <a href="javascript:void(0)" data-status="" data-zcasestatus="paid on MOC" value="paid on MOC" class="nav-link text-danger case_status-change">
                                                    <strong class="zcase_change">paid on MOC</strong>
                                                </a>
                                            </li>
                                            @endif
                                            @endif
                                           
                                            
                                        </ul>
                                    </form>
                                </div>
                                @endif
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
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
                                            @if(!empty($allData_compliance))
                                            <button class="btn btn-outline-info" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#compliance_data">Compliance</button>
                                            @else
                                            @endif
                                            
                                            
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
                                             @if(!empty($allData_iva_compliance))
                                            <button class="btn btn-outline-info" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#compliance_iva_data">Compliance</button>
                                             @else 
                                             @endif
                                           
                                            
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
                                            
                                            <!--<button class="btn btn-outline-info ml-lg-auto ml-xl-auto ml-md-auto" id="case_option">-->
                                            <!--    Case Option-->
                                            <!--</button>-->
                                        @endif

                                        <!-- Account user code start -->
                                        @if($loginUser->user_type == 7)
                                            <button class="btn btn-outline-info" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#D_A_quality">DA Qaulity</button>

                                            <button class="btn btn-outline-info" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#">Compliance</button>

                                            {{-- <button class="btn btn-outline-info" id="case_option">Case Option</button>  --}}
                                        @endif
                                        <!-- Account user code end -->

                                        @if($loginUser->user_type == 8 || $loginUser->user_type == 10)
                                          
                                          <button class="btn btn-outline-info send_iva_team" data-user_id="{{ $userInfo->user_id }}" data-title="IVA checklist" data-case_status="iva draft">Send IVA</button>

                                            <button class="btn btn-outline-info send_team_dmp" data-user_id="{{ $userInfo->user_id }}" data-title="DMP Checklist" data-case_status="dmp draft">Send DMP Team</button>
                                            <!-- Debts advsior manager code end-->
                                            <button class="btn btn-outline-info" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#D_A_quality">DA Qaulity</button> 

                                        @endif
                                        
                                        
                                        @if($loginUser->user_type == 9 || $loginUser->user_type == 11)

                                            <button class="btn btn-outline-info" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#D_A_quality">DA Qaulity</button>

                                            @if($userInfo->zCaseType == 'submitted DMP' || $userInfo->zCaseType == 'Submitted DMP')

                                            <button class="btn btn-outline-info" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#compliance_data">Compliance</button>

                                            @elseif($userInfo->zCaseType == 'submitted IVA' || $userInfo->zCaseType == 'Submitted IVA')

                                            <button class="btn btn-outline-info" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#compliance_iva_data">Compliance</button>

                                            @endif

                                            {{-- <button class="btn btn-outline-info ml-lg-auto ml-xl-auto ml-md-auto" id="case_option">Case Option</button>  --}}
                                            
                                        @endif
                                        
                                        @if($userInfo->zCaseType == 'Fixed Compliance')
                                            @if(!empty($allData_iva_compliance))
                                                <button class="btn btn-outline-info" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#compliance_iva_data">Compliance</button>
                                            @endif
                                             @if(!empty($allData_compliance))
                                                <button class="btn btn-outline-info" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#compliance_data">Compliance</button>
                                            @endif
                                        @endif
                                        <a class="btn btn-outline-info" href="{{ URL::to('i-and-e-pdf-export/'.$userInfo->user_id) }}">
                                                    I&E Download
                                        </a>
                                        <button class="btn btn-outline-info" id="truelayer_bank" data-toggle="modal" data-backdrop="static" 
                                        data-keyboard="false" data-target="#truelayer_bank_modal">Truelayer Bank</button>

                                    </div>
                                    <div class="space-up" style="z-index:0;">
                                        <div class="buttons mt-2 justify-content-start justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mt-40">
                                            <button class="btn btn-outline-info ml-lg-auto ml-xl-auto ml-md-auto mr-0" id="case_option" style="position: relative;">
                                                Case Option
                                            </button>
                                        </div>
                                    
                                        <div class="buttons mt-2 justify-content-start justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mt-40">
                                            
                                            <button class="btn btn-outline-info" id="send_sms_to_single_user" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#custom_sms_message_modal">Send SMS</button>
                                            			 
                                            <a class="Motu btn btn-primary btn btn-outline-info mr-0" href="{{ route('listUser') }}">Exit Case</a>
                                            
                                            
                                            
                                           
			
				                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-3 mt-md-5 mt-lg-0 mt-xl-0 px-md-30 pr-lg-5 pr-xl-5">
                            @include('user.right_sidebar_notes')
                        </div>
                    </div>
        </section>
        
        
    </div>
    
      <!-- added send to dmp advisor calendar slot model code start -->
        <div id="calendar_slot_model_from_send_to_dmp" style="display: none;"></div>
    <!-- added send to dmp advisor calendar slot model code end -->

    <!-- added send to iva advisor calendar slot model code start -->
        <div id="calendar_slot_model_from_send_to_iva" style="display: none;"></div>
    <!-- added send to iva advisor calendar slot model code end -->


    <!-- reminder model pop up code start yogendrasinh -->
        <div id="reminder_calender_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content card card-secondary">
                    <div class="modal-header">
                        <div class="card-title">Reminder Date</div>
                        <button type="button" class="close alert_open close_reminder_popup">
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
                                                <input type="hidden" name="is_case_status" id="is_case_status" value="0">
                                                <input type="text" id="update_reminder_date" name="updateReminderDate" class="form-control datepicker" placeholder="Due Date:"/ value="" required>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 pl-5">
                                                <div class="row pl-5 pr-3">
                                                    <label for="Reminder_time" class="d-block text-primary" style="width: 100%;">ReminderTime</label>
                                                    <div class="form-group">
                                                     <select id="hour" class="form-control square-textbox fixed-size"  name="update_reminder_hour" style="float:left;width:95px;" required>
                                                                <option value="" selected>HH</option>
                                                               
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
                                                                
                                                            </select>
                                                            &nbsp;
                                                            <p class="fixed-size" style="float:left;margin:0px 10px 1rem">:</p>
                                                            &nbsp;
                                                            <select id="minute" class="form-control square-textbox fixed-size" name="update_reminder_minute" style="float:left;width:95px;" required>
                                                            <option value="" selected>MM</option>
                                                                <option value="00">00</option>
                                                                <option value="15">15</option>
                                                                <option value="30">30</option>
                                                                <option value="45">45</option>
                                                            </select>

                                                </div>
                                                    <label for="Reminder_notes" class="d-block text-primary" style="width: 100%;">Reminder Notes</label>
                                                    <div class="form-group" style="width: 100%;">
                                                        <textarea name="updateReminderMessage" id="updateReminderMessage" required class=" form-control b-grey" value="" style="resize: none;border-radius: 10px;height: 145px;"></textarea>
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
                     <div class="form-group" style="margin-top: 100px;margin-left:20px;">
                        <input type="checkbox" class="form-control" style="opacity: 1;float: left;border: none;width: 20px;height: 20px;-webkit-appearance: checkbox;" name="check_value" id="check_value" value="1">Tick if you want to send to use phone
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- reminder model pop up code end yogendrasinh -->
    
    <!-- Fixed compliance aleer page refresh popup code start here -->

    <div id="refresh_alert" class="modal fade  alert_modal">
        <div class="modal-dialog modal-dialog-centered bd-example-modal-sm" role="document">
            <div class="modal-content card card-secondary">
                <div class="modal-header">
                   
                </div>
                <div class="modal-body text-primary">
                    <p>
                        Please Run compliance Score before refreshing page!!
                    </p>
                </div>
                <div class="modal-footer justify-content-center">
                    <div class="buttons justify-content-center">
                        <a class="btn btn-outline-primary close" data-dismiss="modal" href="javascript:void(0)">Ok</a>
                    </div>
                </div>
            </div>
        </div>
     </div>
    
    <!-- Fixed compliance aleer page refresh popup code end here -->


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
                        
                    </div>
                    <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
                    </div>
                </div>
            </div>
        </div>
        
        
        <div id="fix_compliance" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content card card-secondary">
                    <div class="modal-header">
                        <div class="card-title">fix compliance</div>
                            <button type="button" class="close alert_open" aria-label="Close">
                                <img
                                    src="{!! asset('images/icons/Cross_Icon@2x.png') !!}"
                                    alt="Close"
                                    class="img-fulid"
                                    width="40"
                                    height="40">
                            </button>
                    </div>
                    <div class="modal-body text-muted sent_dmp flex-0 pt-0 pb-0">
                        <p style="font-size:16px">Have You fixed all compliance errors from your notes?</p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-outline-info case_fix_compliance" value="Fixed Compliance" aria-label="Close">
                        send to compliance
                    </button>
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
      
      <!--truelayer bank popup code start here-->
      
        <div id="truelayer_bank_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content card card-secondary">
                    <div class="modal-header">
                        <div class="card-title">Truelayer link</div>
                        <button type="button" class="close alert_open close_reminder_popup">
                            <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <input type="text" name="truelayer_link" id="truelayer_link" style="width: 100%;" value="https://auth.truelayer-sandbox.com/?response_type=code&client_id={{$client_id}}&scope={{ $scope }}&redirect_uri={{ $redirect_uri }}&providers=uk-ob-all%20uk-oauth-all%20uk-cs-mock&state={{ $state }}" class="btn btn-outline-info float-right btn-large">
                                    <button onclick="copyText()" class="btn btn-outline-info" style="position: relative;top: 10px;">Copy text</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
      
      <!---- truelayer bank popup code end here --- !>
      
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
                        <button type="button" class="close alert_open" aria-label="Close">
                            <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                        </button>
                    </div>
                    <div class="modal-body text-primary sent_dmp" style="padding:0px 20px;">
                        <h2>Have You fixed all compliance errors from your notes?</h2>
                    </div>
                    <button type="button" class="btn btn-primary" aria-label="Close">
                            send to compliance
                    </button>
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
                                        href="#button_da"
                                        role="tab">&nbsp;</a>
                                </div>
                            </nav>
                            <form
                                class="da_submit tab-content"
                                method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" id="compliance_user_id" value="">
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
                                    @if(!empty($allData))
                                        @php
                                        $result = $introduction_result + $vulnerability_result + $fact_find_result + $solution_result + $documentation_result + $confirmation_result;
                                        @endphp
                                    @else 
                                    @endif
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                        @if(!empty($allData))
                                             @if($fail_introduction > 0 || $fail_vulnerability > 0 || $fail_fact_find > 0
                                            || $fail_solution > 0 || $fail_documentation > 0 || $fail_confirmation_sale > 0)
                                                <div class="from-group">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="date_scored_get"
                                                        value="45%"
                                                        placeholder="Dade Scored:"
                                                        name="Dade Scored">
                                                </div>
                                            @else 
                                                <div class="from-group">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="date_scored_get"
                                                        value="@if(isset($result)) {{ $result }} % @else @endif"
                                                        placeholder="Dade Scored:"
                                                        name="Dade Scored">
                                                </div>
                                            @endif
                                        @else 
                                        <div class="from-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="date_scored_get"
                                                value=""
                                                placeholder="Dade Scored:"
                                                name="Dade Scored">
                                        </div>
                                        @endif 
                                    </div>
                                </div> 
                                @php $notes_counter = 1; @endphp
                                @if(!empty($allData))
                                    @foreach($allData as $innerKey => $innerValue)
                                        @if($innerKey == 'introduction')
                                        <div class="tab_da" id="{{$innerKey}}">
                                            <div class="mt-4 mb-0 text-primary font-14">
                                                <h5><strong>{{ $innerKey }}</strong></h5> 
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    @foreach($innerValue as $innerDataKey => $innerDataValue)
                                                    <input type="hidden" name="debt_type" id="debt_type" value="introduction">
                                                    <input type="hidden" name="weight" id="weight{{ $notes_counter }}" value="{{ $innerDataValue->da_weight }}">
                                                    <input type="hidden" name="question1" id="question{{ $notes_counter }}" value="{{ $innerDataValue->debt_details }}">
                                                    <tr>
                                                         @php
                                                          $innerDataValue->debt_details = str_replace('"', '', $innerDataValue->debt_details);
                                                          @endphp
                                                        @if($innerDataValue->debt_details == "Disclosure_Information")
                                                        <td class="text-danger">{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                        @else 
                                                        <td>{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                        @endif
                                                        <td> 
                                                            @php 
                                                                $innerDataValue->debt_details = substr($innerDataValue->debt_details, 1, -1);
                                                            @endphp
                                                            <select name="introduction" id="da{{ $notes_counter }}" class="form-control" required>
                                                                @if(isset($innerDataValue->is_passed))
                                                                <option value="{{$innerDataValue->is_passed}}">{{ $innerDataValue->is_passed }}</option>
                                                            @else
                                                                <option value="">Select one</option>
                                                            @endif
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
                                                                value="{{ $innerDataValue->da_notes }}"
                                                                name="{{ $innerDataValue->da_notes }}[]"
                                                                class="form-control">
                                                        </td>
                                                    </tr>
                                                    @php $notes_counter++; @endphp
                                                    @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for {{ $innerKey}}<span class="introducation_count">{{ $introduction_count }} % / 100%</span>
                                                </h5>
                                            </div>
                                        </div>
                                        @elseif($innerKey == 'vulnerability')
                                        <div class="tab_da" id="{{$innerKey}}">
                                            <div class="mt-4 mb-0 text-primary font-14">
                                                <h5><strong>{{ $innerKey }}</strong></h5> 
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    @foreach($innerValue as $innerDataKey => $innerDataValue)
                                                    <input type="hidden" name="debt_type" id="debt_type_two" value="vulnerability">
                                                    <input type="hidden" name="weight" id="weight{{ $notes_counter }}" value="{{ $innerDataValue->da_weight }}">
                                                    <input type="hidden" name="question1" id="question{{ $notes_counter }}" value="{{ $innerDataValue->debt_details }}">
                                                    <tr>
                                                        <td class="text-danger">{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                        <td> 
                                                            @php 
                                                                $innerDataValue->debt_details = substr($innerDataValue->debt_details, 1, -1);
                                                            @endphp
                                                            <select name="introduction" id="da{{ $notes_counter }}" class="form-control" required>
                                                                @if(isset($innerDataValue->is_passed))
                                                                <option value="{{$innerDataValue->is_passed}}">{{ $innerDataValue->is_passed }}</option>
                                                            @else
                                                                <option value="">Select one</option>
                                                            @endif
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
                                                                 value="{{ $innerDataValue->da_notes }}"
                                                                name="{{ $innerDataValue->da_notes }}[]"
                                                                class="form-control">
                                                        </td>
                                                    </tr>
                                                    @php $notes_counter++; @endphp
                                                    @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for {{ $innerKey}}<span class="vulnerability_count">{{ $vulnerability_count }} % / 100%</span>
                                                </h5>
                                            </div>
                                        </div>
                                        @elseif($innerKey == 'fact_find')
                                        <div class="tab_da" id="{{$innerKey}}">
                                            <div class="mt-4 mb-0 text-primary font-14">
                                                <h5><strong>{{ $innerKey }}</strong></h5> 
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    @foreach($innerValue as $innerDataKey => $innerDataValue)
                                                    <input type="hidden" name="debt_type" id="debt_type_three" value="fact_find">
                                                    <input type="hidden" name="weight" id="weight{{ $notes_counter }}" value="{{ $innerDataValue->da_weight }}">
                                                    <input type="hidden" name="question1" id="question{{ $notes_counter }}" value="{{ $innerDataValue->debt_details }}">
                                                    <tr>
                                                         @php
                                                          $innerDataValue->debt_details = str_replace('"', '', $innerDataValue->debt_details);
                                                          @endphp
                                                        @if($innerDataValue->debt_details == "Car_Finance" || $innerDataValue->debt_details == "Review_Debts")
                                                        <td class="text-danger">{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                        @else 
                                                        <td>{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                        @endif
                                                        <td> 
                                                            @php 
                                                                $innerDataValue->debt_details = substr($innerDataValue->debt_details, 1, -1);
                                                            @endphp
                                                            <select name="introduction" id="da{{ $notes_counter }}" class="form-control" required>
                                                                @if(isset($innerDataValue->is_passed))
                                                                <option value="{{$innerDataValue->is_passed}}">{{ $innerDataValue->is_passed }}</option>
                                                            @else
                                                                <option value="">Select one</option>
                                                            @endif
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
                                                                 value="{{ $innerDataValue->da_notes }}"
                                                                name="{{ $innerDataValue->da_notes }}[]"
                                                                class="form-control">
                                                        </td>
                                                    </tr>
                                                    @php $notes_counter++; @endphp
                                                    @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for {{ $innerKey}}<span class="fact_find_count">{{ round($fact_find_count) }} % / 100%</span>
                                                </h5>
                                            </div>
                                        </div>
                                        @elseif($innerKey == 'solution')
                                        <div class="tab_da" id="{{$innerKey}}">
                                            <div class="mt-4 mb-0 text-primary font-14">
                                                <h5><strong>{{ $innerKey }}</strong></h5> 
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    @foreach($innerValue as $innerDataKey => $innerDataValue)
                                                    <input type="hidden" name="debt_type" id="debt_type_four" value="solution">
                                                    <input type="hidden" name="weight" id="weight{{ $notes_counter }}" value="{{ $innerDataValue->da_weight }}">
                                                    <input type="hidden" name="question1" id="question{{ $notes_counter }}" value="{{ $innerDataValue->debt_details }}">
                                                    <tr>
                                                         @php
                                                          $innerDataValue->debt_details = str_replace('"', '', $innerDataValue->debt_details);
                                                          @endphp
                                                        @if($innerDataValue->debt_details == "Explain_All_solutions_effect_credit_rating")
                                                        <td class="text-danger">{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                        @else 
                                                        <td>{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                        @endif
                                                        <td> 
                                                            @php 
                                                                $innerDataValue->debt_details = substr($innerDataValue->debt_details, 1, -1);
                                                            @endphp
                                                            <select name="introduction" id="da{{ $notes_counter }}" class="form-control" required>
                                                                @if(isset($innerDataValue->is_passed))
                                                                <option value="{{$innerDataValue->is_passed}}">{{ $innerDataValue->is_passed }}</option>
                                                            @else
                                                                <option value="">Select one</option>
                                                            @endif
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
                                                                 value="{{ $innerDataValue->da_notes }}"
                                                                name="{{ $innerDataValue->da_notes }}[]"
                                                                class="form-control">
                                                        </td>
                                                    </tr>
                                                    @php $notes_counter++; @endphp
                                                    @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for {{ $innerKey}}<span class="solution_count">{{ $solution_count }} % / 100%</span>
                                                </h5>
                                            </div>
                                        </div>
                                        @elseif($innerKey == 'documentation')
                                        <div class="tab_da" id="{{$innerKey}}">
                                            <div class="mt-4 mb-0 text-primary font-14">
                                                <h5><strong>{{ $innerKey }}</strong></h5> 
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    @foreach($innerValue as $innerDataKey => $innerDataValue)
                                                    <input type="hidden" name="debt_type" id="debt_type_five" value="documentation">
                                                    <input type="hidden" name="weight" id="weight{{ $notes_counter }}" value="{{ $innerDataValue->da_weight }}">
                                                    <input type="hidden" name="question1" id="question{{ $notes_counter }}" value="{{ $innerDataValue->debt_details }}">
                                                    <tr>
                                                        
                                                        <td class="text-danger">{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                        <td> 
                                                            @php 
                                                                $innerDataValue->debt_details = substr($innerDataValue->debt_details, 1, -1);
                                                            @endphp
                                                            <select name="introduction" id="da{{ $notes_counter }}" class="form-control" required>
                                                                @if(isset($innerDataValue->is_passed))
                                                                <option value="{{$innerDataValue->is_passed}}">{{ $innerDataValue->is_passed }}</option>
                                                            @else
                                                                <option value="">Select one</option>
                                                            @endif
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
                                                                 value="{{ $innerDataValue->da_notes }}"
                                                                name="{{ $innerDataValue->da_notes }}[]"
                                                                class="form-control">
                                                        </td>
                                                    </tr>
                                                    @php $notes_counter++; @endphp
                                                    @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for {{ $innerKey}}<span class="documentation_count">{{ $documentation_total }} % / 100%</span>
                                                </h5>
                                            </div>
                                        </div>
                                        @elseif($innerKey == 'confirmation')
                                        <div class="tab_da" id="{{$innerKey}}">
                                            <div class="mt-4 mb-0 text-primary font-14">
                                                <h5><strong>{{ $innerKey }}</strong></h5> 
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    @foreach($innerValue as $innerDataKey => $innerDataValue)
                                                    <input type="hidden" name="debt_type" id="debt_type_six" value="confirmation">
                                                    <input type="hidden" name="weight" id="weight{{ $notes_counter }}" value="{{ $innerDataValue->da_weight }}">
                                                    <input type="hidden" name="question1" id="question{{ $notes_counter }}" value="{{ $innerDataValue->debt_details }}">
                                                    <tr>
                                                        
                                                        <td class="text-danger">{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                        
                                                        <td> 
                                                            @php 
                                                                $innerDataValue->debt_details = substr($innerDataValue->debt_details, 1, -1);
                                                            @endphp
                                                            <select name="introduction" id="da{{ $notes_counter }}" class="form-control" required>
                                                                @if(isset($innerDataValue->is_passed))
                                                                <option value="{{$innerDataValue->is_passed}}">{{ $innerDataValue->is_passed }}</option>
                                                            @else
                                                                <option value="">Select one</option>
                                                            @endif
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
                                                                 value="{{ $innerDataValue->da_notes }}"
                                                                name="{{ $innerDataValue->da_notes }}[]"
                                                                class="form-control">
                                                        </td>
                                                    </tr>
                                                    @php $notes_counter++; @endphp
                                                    @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for {{ $innerKey}}<span class="confirmation_count">{{ $confirmation_count }} % / 100%</span>
                                                </h5>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                @else 
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
                                                    @foreach($da_introducation as $key => $value) @foreach($value as
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
                                @endif

                                @if(!(empty($allData)))
                                    @php
                                        $result = $introduction_result + $vulnerability_result + $fact_find_result + $solution_result + $documentation_result + $confirmation_result;
                                    @endphp
                                @else 
                                @endif
                                <div class="tab_da" id="score">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            @if(!(empty($allData)))
                                            <div class="row">
                                                <div class="col-6">
                                                    <h5>overall</h5>
                                                        @php
                                                            $fail = 45; 
                                                        @endphp
        
                                                            @if($fail_introduction > 0 || $fail_vulnerability > 0 || $fail_fact_find > 0
                                                                || $fail_solution > 0 || $fail_documentation > 0 || $fail_confirmation_sale > 0)
                                                        <h1 class="view_case_result text-danger"> {{ $fail }} %</h1>
        
                                                        @else
                                                            @if($result == 45 || $result <= 45)   
                                                                <h1 class="text-danger view_case_result">{{ $result }}%</h1>
                                                             @else  
                                                                <h1 class="text-success view_case_result">{{ $result }}%</h1>
                                                            @endif
         
                                                        @endif    
                                                </div>
                                                <div class="col-6">
                                                    <h5>Result</h5>
                                                    @if($fail_introduction > 0 || $fail_vulnerability > 0 || $fail_fact_find > 0
                                                            || $fail_solution > 0 || $fail_documentation > 0 || $fail_confirmation_sale > 0)
                                                    <h1 class="text-danger view_pass_fail">Critical Fail</h1> 
                                                    @else
                                                        @if($result == 45 || $result <= 45)
                                                            <h1 class="text-danger view_pass_fail">Critical Fail</h1>
                                                        @else
                                                        <h1 class="text-success view_pass_fail">PASS</h1>
                                                        @endif
                                                    @endif
                                                              
                                                </div>
                                            </div>
        
                                            @else
                                            <div class="row">
                                                <div class="col-6">
                                                    <h5>overall</h5>
                                                    
                                                    <h1 class="view_case_result text-danger"></h1>
                                                            
                                                </div>
                                                <div class="col-6">
                                                    <h5>Result</h5>
                                                    <h1 class="view_pass_fail"></h1>
                                                             
                                                </div>
                                            </div>
                                            @endif
                                             @if(!empty($compliance['allData']))
                                            @foreach($compliance['allData'] as $innerKey => $innerValue)
                                                @php 
                                                    $criticle_detail = $innerValue[0]->critical_fail_details;
                                                    $feedback = $innerValue[0]->feedback;
                                                @endphp
                                            @endforeach
                                          @endif
                                            <div class="form-group">
                                                <h5 class="mb-3">Critical fail Details:</h5>    
                                                <textarea name="critical_fail_detail" id="critical_fail_detail" placeholder="N/A" class="form-control critical_textarea">
                                                    @if(isset($criticle_detail)) {{ $criticle_detail }} @else @endif
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                            <h5 class="mb-3">Feedback declaration</h5>    
                                                <textarea name="feedback_dec" id="feedback_dec" placeholder="Notes:" class="form-control feedbacktextarea">
                                                     @if(isset($feedback)) {{ $feedback }} @else @endif
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                {{-- New code end here --}}
                                <div class="tab_da" id="button_da">
                                <div class="modal-footer mb-4 mt-4">
                                    
                                    <div class="buttons d-flex justify-content-end float-right">
                                        <!--<button type="button" class="solution close alert_open" aria-label="Close">-->
                                        <button
                                            type="submit"
                                            name="#"
                                            id="da_prev"
                                            class=" btn btn-bordered-primary run_da  bg-none"
                                            value="Prev"
                                            onclick="nextPrevDa(-1);return false;"
                                            >Prev
                                        </button>
                                        <button
                                            type="submit"
                                            name="#"
                                            id="da_next"
                                            class=" btn btn-bordered-primary run_da  bg-none"
                                            value="Next"
                                            onclick="nextPrevDa(1);return false;"
                                            >
                                            Next
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
        
        <!-- D_A quality modal end -->  
             
        {{-- compliance modal code start here --}}

        <div id="compliance_data" class="modal fade compliance_data D_A_quality" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content card card-secondary">
                    <div class="modal-header p-0">
                        <div class="card-title">
                            DMP compliance
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
                                        href="#introduction_compliance"
                                        role="tab">&nbsp;</a>
                                    <a
                                        class="nav-item nav-link"
                                        data-toggle="tab"
                                        href="#vulnerability_compliance"
                                        role="tab">&nbsp;</a>
                                    <a
                                        class="nav-item nav-link"
                                        data-toggle="tab"
                                        href="#fact_find_compliance"
                                        role="tab">&nbsp;</a>
                                    <a 
                                        class="nav-item nav-link" 
                                        data-toggle="tab" href="#IE_compliance"
                                        role="tab">&nbsp;</a>
                                    <a
                                        class="nav-item nav-link"
                                        data-toggle="tab"
                                        href="#DMP_compliance"
                                        role="tab">&nbsp;</a>
                                    <a
                                        class="nav-item nav-link"
                                        data-toggle="tab"
                                        href="#confirmation_compliance"
                                        role="tab">&nbsp;</a>
                                    <a
                                        class="nav-item nav-link"
                                        data-toggle="tab"
                                        href="#score_compliance"
                                        role="tab">&nbsp;</a>
                                    <a
                                        class="nav-item nav-link"
                                        data-toggle="tab"
                                        href="#button_compliance"
                                        role="tab">&nbsp;</a>
                                </div>
                            </nav>
                            <form
                                class="compliance_submit tab-content"
                                method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" id="compliance_user_id" value="">
                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                        <div class="from-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="data_of_call_compliance"
                                                placeholder="Date Of Call:"
                                                name="Date Of Call"
                                                readonly="readonly">
                                        </div>
                                    </div>
                                    @if(!empty($allData_compliance))
                                        @php
                                        $result_compliance = $introducation_compliance_result + $vulnerability_compliance_result + $fact_find_compliance_result + $ie_compliance_result + $dmp_compliance_result + $confirmation_compliance_result;
                                        @endphp
                                    @else 
                                    @endif
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                        @if(!empty($allData_compliance))
                                            @if($fail_introducation_compliance > 0 || $fail_vulnerability_compliance > 0 || $fail_fact_find_compliance > 0
                                            || $fail_ie_compliance > 0 || $fail_compliance_dmp > 0 || $fail_confirmation_compliance > 0)
                                                <div class="from-group">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="date_scored_get_compliance"
                                                        value="45%"
                                                        placeholder="Dade Scored:"
                                                        name="Dade Scored">
                                                </div>
                                            @else 
                                                <div class="from-group">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="date_scored_get_compliance"
                                                        value="@if(isset($result)) {{ $result }} % @else @endif"
                                                        placeholder="Dade Scored:"
                                                        name="Dade Scored">
                                                </div>
                                            @endif
                                        @else 
                                        <div class="from-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="date_scored_get_compliance"
                                                value=""
                                                placeholder="Dade Scored:"
                                                name="Dade Scored">
                                        </div>
                                        @endif 
                                    </div>
                                </div>
                                @php $notes_counter = 1; @endphp
                                    {{-- New code start here --}}

                                @if(!empty($allData_compliance))
                                    @foreach($allData_compliance as $innerKey => $innerValue)
                                        @if($innerKey == 'introduction')
                                            <div class="tab_dmp" id="{{$innerKey}}_compliance">
                                                <div class="mt-4 mb-0 text-primary font-14">
                                                    <h5><strong>{{ $innerKey }}</strong></h5> 
                                                    <table class="table mb-0 text-left text-primary t-cell-middle">
                                                        @foreach($innerValue as $innerDataKey => $innerDataValue)
                                                        <input type="hidden" name="debt_type" id="debt_type_compliance" value="introduction">
                                                        <input type="hidden" name="weight" id="weight{{ $notes_counter }}_compliance" value="{{ $innerDataValue->da_weight }}">
                                                        <input type="hidden" name="question1" id="question{{ $notes_counter }}_compliance" value="{{ $innerDataValue->debt_details }}">
                                                        <tr>
                                                             @php
                                                                 $innerDataValue->debt_details = str_replace('"', '', $innerDataValue->debt_details);
                                                            @endphp
                                                            @if($innerDataValue->debt_details == "Did_the_advisor_explain_the_purpose_and_next_steps")
                                                            <td class="text-danger">{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                            @else 
                                                            <td>{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                            @endif
                                                            <td> 
                                                                @php 
                                                                    $innerDataValue->debt_details = substr($innerDataValue->debt_details, 1, -1);
                                                                @endphp
                                                                <select name="introduction" id="check{{ $notes_counter }}" class="form-control" required>
                                                                    @if(isset($innerDataValue->is_passed))
                                                                    <option value="{{$innerDataValue->is_passed}}">{{ $innerDataValue->is_passed }}</option>
                                                                @else
                                                                    <option value="">Select one</option>
                                                                @endif
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                    <option value="N/A">N/A</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type="text"
                                                                    placeholder="Notes:"
                                                                     value="{{ $innerDataValue->da_notes }}"
                                                                    id="note{{ $notes_counter }}_compliance"
                                                                    name="{{ $innerDataValue->da_notes }}[]"
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                        @endforeach
                                                    </table>
                                                    <h5 class="text-right">outcome for {{ $innerKey}}<span class="introducation_compliance_count">{{ $introducation_compliance_count }} % / 100%</span>
                                                    </h5>
                                                </div>
                                            </div>
                                        @elseif($innerKey == 'vulnerability')
                                            <div class="tab_dmp" id="{{$innerKey}}_compliance">
                                                <div class="mt-4 mb-0 text-primary font-14">
                                                    <h5><strong>{{ $innerKey }}</strong></h5> 
                                                    <table class="table mb-0 text-left text-primary t-cell-middle">
                                                        @foreach($innerValue as $innerDataKey => $innerDataValue)
                                                        <input type="hidden" name="debt_type" id="debt_type_compliance_two" value="vulnerability">
                                                        <input type="hidden" name="weight" id="weight{{ $notes_counter }}_compliance" value="{{ $innerDataValue->da_weight }}">
                                                        <input type="hidden" name="question1" id="question{{ $notes_counter }}_compliance" value="{{ $innerDataValue->debt_details }}">
                                                        <tr>
                                                           
                                                            <td class="text-danger">{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                            
                                                            <td>
                                                                @php 
                                                                    $innerDataValue->debt_details = substr($innerDataValue->debt_details, 1, -1);
                                                                @endphp
                                                                <select name="vulnerability" id="check{{ $notes_counter }}" class="form-control" required>
                                                                    @if(isset($innerDataValue->is_passed))
                                                                    <option value="{{$innerDataValue->is_passed}}">{{ $innerDataValue->is_passed }}</option>
                                                                @else
                                                                    <option value="">Select one</option>
                                                                @endif
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                    <option value="N/A">N/A</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type="text"
                                                                    placeholder="Notes:"
                                                                     value="{{ $innerDataValue->da_notes }}"
                                                                    id="note{{ $notes_counter }}_compliance"
                                                                    name="{{ $innerDataValue->da_notes }}[]"
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                        @endforeach
                                                    </table>
                                                    <h5 class="text-right">outcome for {{ $innerKey}}<span class="vulnerability_compliance_count">{{ $vulnerability_compliance_count }} % / 100%</span>
                                                    </h5>
                                                </div>
                                            </div>
                                        @elseif($innerKey == 'fact_find')
                                            <div class="tab_dmp" id="{{$innerKey}}_compliance">
                                                <div class="mt-4 mb-0 text-primary font-14">
                                                    <h5><strong>{{ $innerKey }}</strong></h5> 
                                                    <table class="table mb-0 text-left text-primary t-cell-middle">
                                                        @foreach($innerValue as $innerDataKey => $innerDataValue)
                                                        <input type="hidden" name="debt_type" id="debt_type_compliance_three" value="fact_find">
                                                        <input type="hidden" name="weight" id="weight{{ $notes_counter }}_compliance" value="{{ $innerDataValue->da_weight }}">
                                                        <input type="hidden" name="question1" id="question{{ $notes_counter }}_compliance" value="{{ $innerDataValue->debt_details }}">
                                                        <tr>
                                                             @php
                                                                $innerDataValue->debt_details = str_replace('"', '', $innerDataValue->debt_details);
                                                            @endphp
                                                            @if($innerDataValue->debt_details == "Minimum_debt_level_k_of_standard_debts_loans_credit_card_etc" || $innerDataValue->debt_details == "If_Council_Tax_Bailiffs_Rent_Arrears_and_or_HMRC_make_up_more_than_of_the_total_debt_either_on_their_own_or_as_a_combination_we_can_take_the_lead")
                                                                @if($innerDataValue->debt_details == "Minimum_debt_level_k_of_standard_debts_loans_credit_card_etc")
                                                                    <td class="text-danger">Minimum debt level - £2k of standard debts (loans, credit card etc)</td>
                                                                @endif    
                                                            <td class="text-danger">{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                            @else 
                                                                <td>{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                            @endif
                                                            <td>
                                                                @php 
                                                                    $innerDataValue->debt_details = substr($innerDataValue->debt_details, 1, -1);
                                                                @endphp
                                                                <select name="fact_find" id="check{{ $notes_counter }}" class="form-control" required>
                                                                    @if(isset($innerDataValue->is_passed))
                                                                    <option value="{{$innerDataValue->is_passed}}">{{ $innerDataValue->is_passed }}</option>
                                                                @else
                                                                    <option value="">Select one</option>
                                                                @endif
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                    <option value="N/A">N/A</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type="text"
                                                                    placeholder="Notes:"
                                                                     value="{{ $innerDataValue->da_notes }}"
                                                                    id="note{{ $notes_counter }}_compliance"
                                                                    name="{{ $innerDataValue->da_notes }}[]"
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                        @endforeach
                                                    </table>
                                                    <h5 class="text-right">outcome for {{ $innerKey}}<span class="fact_find_compliance_count">{{ $fact_find_compliance_count }} % / 100%</span>
                                                    </h5>
                                                </div>
                                            </div>
                                        @elseif($innerKey == 'IE')
                                            <div class="tab_dmp" id="{{$innerKey}}_compliance">
                                                <div class="mt-4 mb-0 text-primary font-14">
                                                    <h5><strong>{{ $innerKey }}</strong></h5> 
                                                    <table class="table mb-0 text-left text-primary t-cell-middle">
                                                        @foreach($innerValue as $innerDataKey => $innerDataValue)
                                                        <input type="hidden" name="debt_type" id="debt_type_compliance_four" value="IE">
                                                        <input type="hidden" name="weight" id="weight{{ $notes_counter }}_compliance" value="{{ $innerDataValue->da_weight }}">
                                                        <input type="hidden" name="question1" id="question{{ $notes_counter }}_compliance" value="{{ $innerDataValue->debt_details }}">
                                                        <tr>
                                                            
                                                            <td class="text-danger">Min Income - £800pm – Can accept benefits only for DM as long as Housing Ben is not included in income</td>
                                                           
                                                            <td>
                                                                @php 
                                                                    $innerDataValue->debt_details = substr($innerDataValue->debt_details, 1, -1);
                                                                @endphp
                                                                <select name="IE" id="check{{ $notes_counter }}" class="form-control" required>
                                                                    @if(isset($innerDataValue->is_passed))
                                                                    <option value="{{$innerDataValue->is_passed}}">{{ $innerDataValue->is_passed }}</option>
                                                                @else
                                                                    <option value="">Select one</option>
                                                                @endif
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                    <option value="N/A">N/A</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type="text"
                                                                    placeholder="Notes:"
                                                                     value="{{ $innerDataValue->da_notes }}"
                                                                    id="note{{ $notes_counter }}_compliance"
                                                                    name="{{ $innerDataValue->da_notes }}[]"
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                        @endforeach
                                                    </table>
                                                    <h5 class="text-right">outcome for {{ $innerKey}}<span class="IE_compliance_count">{{ $ie_compliance_count }} % / 100%</span>
                                                    </h5>
                                                </div>
                                            </div>
                                        @elseif($innerKey == 'DMP')
                                            <div class="tab_dmp" id="{{$innerKey}}_compliance">
                                                <div class="mt-4 mb-0 text-primary font-14">
                                                    <h5><strong>{{ $innerKey }}</strong></h5> 
                                                    <table class="table mb-0 text-left text-primary t-cell-middle">
                                                        @foreach($innerValue as $innerDataKey => $innerDataValue)
                                                        <input type="hidden" name="debt_type" id="debt_type_compliance_five" value="DMP">
                                                        <input type="hidden" name="weight" id="weight{{ $notes_counter }}_compliance" value="{{ $innerDataValue->da_weight }}">
                                                        <input type="hidden" name="question1" id="question{{ $notes_counter }}_compliance" value="{{ $innerDataValue->debt_details }}">
                                                        <tr>
                                                             @php
                                                                $innerDataValue->debt_details = str_replace('"', '', $innerDataValue->debt_details);
                                                          @endphp
                                                            @if($innerDataValue->debt_details == "Explain_risks_of_a_dmp")
                                                                 <td class="text-danger">{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                            @else 
                                                                <td>{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                            @endif

                                                            <td>
                                                                @php 
                                                                    $innerDataValue->debt_details = substr($innerDataValue->debt_details, 1, -1);
                                                                @endphp
                                                                <select name="DMP" id="check{{ $notes_counter }}" class="form-control" required>
                                                                    @if(isset($innerDataValue->is_passed))
                                                                    <option value="{{$innerDataValue->is_passed}}">{{ $innerDataValue->is_passed }}</option>
                                                                @else
                                                                    <option value="">Select one</option>
                                                                @endif
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                    <option value="N/A">N/A</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type="text"
                                                                    placeholder="Notes:"
                                                                     value="{{ $innerDataValue->da_notes }}"
                                                                    id="note{{ $notes_counter }}_compliance"
                                                                    name="{{ $innerDataValue->da_notes }}[]"
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                        @endforeach
                                                    </table>
                                                    <h5 class="text-right">outcome for {{ $innerKey}}<span class="dmp_compliance_count">{{ $dmp_compliance_count }} % / 100%</span>
                                                    </h5>
                                                </div>
                                            </div> 
                                        @elseif($innerKey == 'confirmation') 
                                            <div class="tab_dmp" id="{{$innerKey}}_compliance">
                                                <div class="mt-4 mb-0 text-primary font-14">
                                                    <h5><strong>{{ $innerKey }}</strong></h5> 
                                                    <table class="table mb-0 text-left text-primary t-cell-middle">
                                                        @foreach($innerValue as $innerDataKey => $innerDataValue)
                                                        <input type="hidden" name="debt_type" id="debt_type_compliance_six" value="confirmation">
                                                        <input type="hidden" name="weight" id="weight{{ $notes_counter }}_compliance" value="{{ $innerDataValue->da_weight }}">
                                                        <input type="hidden" name="question1" id="question{{ $notes_counter }}_compliance" value="{{ $innerDataValue->debt_details }}">
                                                        <tr>
                                                            <td class="text-danger">{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                            <td>
                                                                @php 
                                                                    $innerDataValue->debt_details = substr($innerDataValue->debt_details, 1, -1);
                                                                @endphp
                                                                <select name="confirmation" id="check{{ $notes_counter }}" class="form-control" required>
                                                                    @if(isset($innerDataValue->is_passed))
                                                                    <option value="{{$innerDataValue->is_passed}}">{{ $innerDataValue->is_passed }}</option>
                                                                @else
                                                                    <option value="">Select one</option>
                                                                @endif
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                    <option value="N/A">N/A</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type="text"
                                                                    placeholder="Notes:"
                                                                     value="{{ $innerDataValue->da_notes }}"
                                                                    id="note{{ $notes_counter }}_compliance"
                                                                    name="{{$innerDataValue->da_notes }}[]"
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                        @endforeach
                                                    </table>
                                                    <h5 class="text-right">outcome for {{ $innerKey}}<span class="confirmation_compliance_count">{{ $confirmation_compliance_count }} % / 100%</span>
                                                    </h5>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach

                                @else
                                    <div class="tab_dmp" id="introduction_compliance">
                                        <div class="text-primary font-14">
                                            <div class="text-primary">
                                                <h5>
                                                    <strong>introduction</strong>
                                                </h5>
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    <input
                                                        type="hidden"
                                                        name="debt_type"
                                                        id="debt_type_compliance"
                                                        value="introduction">
                                                    @foreach($introuduction_question as $key => $value) @foreach($value as
                                                    $innerkey=>$innervalue)
                                                    <input
                                                        type="hidden"
                                                        name="{{ json_encode($key) }}"
                                                        id="weight{{ $notes_counter }}_compliance"
                                                        value="{{ json_encode($innervalue) }}">
                                                    <input
                                                        type="hidden"
                                                        name="question1"
                                                        id="question{{ $notes_counter }}_compliance"
                                                        value="{{ json_encode($key) }}">
                                                    <tbody>
                                                        <tr>
                                                            @if($key == 'Did_the_advisor_explain_the_purpose_and_next_steps')
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
                                                            <select name="{{ $key }}" id="check{{ $notes_counter }}" class="form-control" required>
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
                                                                    id="note{{ $notes_counter }}_compliance"
                                                                    
                                                                    name="{{ $key }}[]"
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                    </tbody>

                                                    @endforeach @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for Introducation :
                                                    <span class="introducation_compliance_count">
                                                        0% / 100%</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab_dmp" id="vulnerability_compliance">
                                        <div class="text-primary font-14">
                                            <div class="text-primary">
                                                <h5>
                                                    <strong>vulnerability</strong>
                                                </h5>
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    <input
                                                        type="hidden"
                                                        name="debt_type"
                                                        id="debt_type_compliance_two"
                                                        value="vulnerability">
                                                    @foreach($vulnerability_question as $key => $value) @foreach($value as
                                                    $innerkey=>$innervalue)
                                                    <input
                                                        type="hidden"
                                                        name="{{ json_encode($key) }}"
                                                        id="weight{{ $notes_counter }}_compliance"
                                                        value="{{ json_encode($innervalue) }}">
                                                    <input
                                                        type="hidden"
                                                        name="question1"
                                                        id="question{{ $notes_counter }}_compliance"
                                                        value="{{ json_encode($key) }}">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h4 class="mb-0 text-danger">{{ str_replace('_','  ',$key) }}</h4>
                                                            </td>
                                                            <td>
                                                            <select name="{{ $key }}" id="check{{ $notes_counter }}" class="form-control" required>
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
                                                                     
                                                                    id="note{{ $notes_counter }}_compliance"
                                                                    name="{{ $key }}[]"
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                    </tbody>
                                                    @endforeach @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for Vulnerability :
                                                    <span class="vulnerability_compliance_count">
                                                        0% / 100%</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab_dmp" id="fact_find_compliance">
                                        <div class="text-primary font-14">
                                            <div class="text-primary">
                                                <h5>
                                                    <strong>fact find</strong>
                                                </h5>
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    <input
                                                        type="hidden"
                                                        name="debt_type"
                                                        id="debt_type_compliance_three"
                                                        value="fact_find">
                                                    @foreach($fact_find_question as $key => $value) @foreach($value as
                                                    $innerkey=>$innervalue)
                                                    <input
                                                        type="hidden"
                                                        name="{{ json_encode($key) }}"
                                                        id="weight{{ $notes_counter }}_compliance"
                                                        value="{{ json_encode($innervalue) }}">
                                                    <input
                                                        type="hidden"
                                                        name="question1"
                                                        id="question{{ $notes_counter }}_compliance"
                                                        value="{{ json_encode($key) }}">
                                                    <tbody>
                                                        <tr>
                                                            @if($key == 'Minimum_debt_level_k_of_standard_debts_loans_credit_card_etc' ||
                                                            $key ==
                                                            'If_Council_Tax_Bailiffs_Rent_Arrears_and_or_HMRC_make_up_more_than_of_the_total_debt_either_on_their_own_or_as_a_combination_we_can_take_the_lead')
                                                            
                                                            <td>
                                                                @if($key == 'Minimum_debt_level_k_of_standard_debts_loans_credit_card_etc')
                                                                <h4 class="mb-0 text-danger">Minimum debt level - £2k of standard debts (loans, credit card etc)<h4>
                                                                
                                                                @endif
                                                                <h4 class="mb-0 text-danger">{{ str_replace('_','  ',$key) }}</h4>
                                                            </td>
                                                            @else
                                                            <td>
                                                                <h4 class="mb-0">{{ str_replace('_','  ',$key) }}</h4>
                                                            </td>
                                                            @endif
                                                            <td>
                                                                
                                                                <select name="{{ $key }}" id="check{{ $notes_counter }}" class="form-control" required>
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
                                                                    id="note{{ $notes_counter }}_compliance"
                                                                    name="{{ $key }}[]"
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                    </tbody>
                                                    @endforeach @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for Fact find :
                                                    <span class="fact_find_compliance_count">
                                                        0% / 100%</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab_dmp" id="IE_compliance">
                                        <div class="text-primary font-14">
                                            <div class="text-primary">
                                                <h5>
                                                    <strong>IE</strong>
                                                </h5>
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    <input type="hidden" name="debt_type" id="debt_type_compliance_four" value="IE">
                                                    @foreach($IE_question as $key => $value) @foreach($value as
                                                    $innerkey=>$innervalue)
                                                    <input
                                                        type="hidden"
                                                        name="{{ json_encode($key) }}"
                                                        id="weight{{ $notes_counter }}_compliance"
                                                        value="{{ json_encode($innervalue) }}">
                                                    <input
                                                        type="hidden"
                                                        name="question1"
                                                        id="question{{ $notes_counter }}_compliance"
                                                        value="{{ json_encode($key) }}">
                                                    <tbody>
                                                        <tr>
                                                            
                                                            <td>
                                                                <h4 class="mb-0 text-danger">Min Income - £800pm – Can accept benefits only for DM as long as Housing Ben is not included in income</h4>
                                                            </td>
                                                            <td>
                                                                
                                                                <select name="{{ $key }}" id="check{{ $notes_counter }}" class="form-control" required>
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
                                                                    id="note{{ $notes_counter }}_compliance"
                                                                    name="{{ $key }}[]"
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                    </tbody>
                                                    @endforeach @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for IE :
                                                    <span class="ie_compliance_count">
                                                        0% / 100%</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab_dmp" id="DMP_compliance">
                                        <div class="text-primary font-14">
                                            <div class="text-primary">
                                                <h5>
                                                    <strong>DMP</strong>
                                                </h5>
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    <input
                                                        type="hidden"
                                                        name="debt_type"
                                                        id="debt_type_compliance_five"
                                                        value="dmp">
                                                    @foreach($dmp_question as $key => $value) @foreach($value as
                                                    $innerkey=>$innervalue)
                                                    <input
                                                        type="hidden"
                                                        name="{{ json_encode($key) }}"
                                                        id="weight{{ $notes_counter }}_compliance"
                                                        value="{{ json_encode($innervalue) }}">
                                                    <input
                                                        type="hidden"
                                                        name="question1"
                                                        id="question{{ $notes_counter }}_compliance"
                                                        value="{{ json_encode($key) }}">
                                                    <tbody>
                                                        <tr>
                                                            @if($key == 'Explain_risks_of_a_dmp')
                                                            <td>
                                                                <h4 class="mb-0">{{ str_replace('_','  ',$key) }}</h4>
                                                            </td>
                                                            @else
                                                            <td>
                                                                <h4 class="mb-0 text-danger">{{ str_replace('_','  ',$key) }}</h4>
                                                            </td>
                                                            @endif
                                                            <td>
                                                                
                                                                <select name="{{ $key }}" id="check{{ $notes_counter }}" class="form-control" required>
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
                                                                    id="note{{ $notes_counter }}_compliance"
                                                                    name="{{ $key }}[]"
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                    </tbody>
                                                    @endforeach @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for IE :
                                                    <span class="dmp_compliance_count">
                                                        0% / 100%</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab_dmp" id="confirmation_compliance">
                                        <div class="text-primary font-14">
                                            <div class="text-primary">
                                                <h5>
                                                    <strong>Confirmation</strong>
                                                </h5>
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    <input
                                                        type="hidden"
                                                        name="debt_type"
                                                        id="debt_type_compliance_six"
                                                        value="confirmation">
                                                    @foreach($confirmation_question as $key => $value) @foreach($value as
                                                    $innerkey=>$innervalue)
                                                    <input
                                                        type="hidden"
                                                        name="{{ json_encode($key) }}"
                                                        id="weight{{ $notes_counter }}_compliance"
                                                        value="{{ json_encode($innervalue) }}">
                                                    <input
                                                        type="hidden"
                                                        name="question1"
                                                        id="question{{ $notes_counter }}_compliance"
                                                        value="{{ json_encode($key) }}">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h4 class="mb-0 text-danger">{{ str_replace('_','  ',$key) }}</h4>
                                                            </td>
                                                            <td>
                                                                
                                                                <select name="{{ $key }}" id="check{{ $notes_counter }}" class="form-control" required>
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
                                                                    id="note{{ $notes_counter }}_compliance"
                                                                    name="{{ $key }}[]"
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                    </tbody>
                                                    @endforeach @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for IE :
                                                    <span class="confirmation_compliance_count">
                                                        0% / 100%</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if(!empty($allData_compliance))
                                    @php
                                        $result_compliance = $introducation_compliance_result + $vulnerability_compliance_result + $fact_find_compliance_result + $ie_compliance_result + $dmp_compliance_result + $confirmation_compliance_result;
                                        
                                    @endphp
                                 @else 

                                @endif
                                <div class="tab_dmp" id="score_compliance">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            @if(!(empty($allData_compliance)))
                                            <div class="row">
                                                <div class="col-6">
                                                    <h5>overall</h5>
                                                        @php
                                                            $fail = 45; 
                                                        @endphp
        
                                                        @if($fail_introducation_compliance > 0 || $fail_vulnerability_compliance > 0 || $fail_fact_find_compliance > 0 || $fail_ie_compliance > 0 || $fail_compliance_dmp > 0 || $fail_confirmation_compliance > 0)
        
                                                        <h1 class="view_case_result_compliance text-danger"> {{ $fail }} %</h1>
        
                                                        @else
                                                            @if($result_compliance == 45 || $result_compliance <= 45)   
                                                                <h1 class="text-danger view_case_result_compliance">{{ $result_compliance }}%</h1>
                                                             @else  
                                                                <h1 class="text-success view_case_result_compliance">{{ $result_compliance }}%</h1>
                                                            @endif
         
                                                        @endif    
                                                </div>
                                                <div class="col-6">
                                                    <h5>Result</h5>
                                                    @if($fail_introducation_compliance > 0 || $fail_vulnerability_compliance > 0|| $fail_fact_find_compliance > 0 || $fail_ie_compliance > 0 || $fail_compliance_dmp > 0 || $fail_confirmation_compliance > 0)
                                                      <h1 class="text-danger view_pass_fail_compliance">Critical Fail</h1> 
                                                    @else
                                                        @if($result_compliance == 45 || $result_compliance <= 45)
                                                            <h1 class="text-danger view_pass_fail_compliance">Critical Fail</h1>
                                                        @else
                                                        <h1 class="text-success view_pass_fail_compliance">PASS</h1>
                                                        @endif
                                                    @endif
                                                              
                                                </div>
                                            </div>
        
                                            @else
                                            <div class="row">
                                                <div class="col-6">
                                                    <h5>overall</h5>
                                                    
                                                    <h1 class="view_case_result_compliance text-danger"></h1>
                                                            
                                                </div>
                                                <div class="col-6">
                                                    <h5>Result</h5>
                                                    <h1 class="view_pass_fail_compliance"></h1>
                                                             
                                                </div>
                                            </div>
                                            @endif
                                             @if(!empty($compliance['allData_compliance']))
                                            @foreach($compliance['allData_compliance'] as $innerKey => $innerValue)
                                                @php 
                                                    $criticle_detail = $innerValue[0]->critical_fail_details;
                                                    $feedback = $innerValue[0]->feedback;
                                                @endphp
                                            @endforeach
                                          @endif
                                          
                                            <div class="form-group">
                                                <h5 class="mb-3">Critical fail Details:</h5>    
                                                <textarea name="critical_fail_detail" id="critical_fail_detail_dmp" placeholder="N/A" class="form-control critical_textarea">
                                                     @if(isset($criticle_detail)) {{ $criticle_detail }} @else '' @endif
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                            <h5 class="mb-3">Feedback declaration</h5>    
                                                <textarea name="feedback_dec" id="feedback_dec_dmp" placeholder="Notes:" class="form-control feedbacktextarea">
                                                     @if(isset($feedback)) {{ $feedback }} @else @endif
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                {{-- New code end here --}}
                                @php
                                            $loginUserData = Auth::user();
                                            unset($loginUserData->password);
                                            $loginUser = $loginUserData;
                                @endphp
                               
                                <div class="tab_dmp" id="button_compliance">
                                   @if($loginUser->user_type == 5)
                                   <a href="#" class="btn btn-bordered-primary text-right" data-dismiss="modal">close</a>
                                    @else    
                                <div class="modal-footer mb-4 mt-4">
                                    <div class="buttons d-flex justify-content-end float-right add_submit_class">
                                        
                                        <button
                                            type="submit"
                                            name="prev_da_compliance"
                                            id="prev_compliance_dmp"
                                            class=" btn btn-bordered-primary run_compliance  bg-none"
                                            value="Prev"
                                            onclick="nextPrevDmp(-1); return false;"
                                            >Prev
                                        </button>
                                        <button
                                            type="submit"
                                            id="next_compliance_dmp"
                                            name="next_da_compliance"
                                            class=" btn btn-bordered-primary run_compliance  bg-none"
                                            value="Next"
                                            onclick="nextPrevDmp(1); return false;">Next
                                        </button>
                                    </div>
                                </div>
                                @endif
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- compliance modal code end here --}}
        
        
         {{-- iva compliance code start here --}}

        <div id="compliance_iva_data" class="modal fade compliance_data D_A_quality" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content card card-secondary">
                    <div>
                        <div class="modal-header p-0"> 
                            <div class="card-title">
                                IVA Advisior  compliance
                            </div>
                            <button type="button" class="close alert_open" aria-label="Close">
                                <img src="{!! asset('images/icons/Cross_Icon@2x.png')!!}" alt="Close" class="img-fulid" width="40" height="40">
                            </button>
                        </div>
                        <div class="modal-body mb-0 p-0">
                            <div class="tab-content">
                                <nav class="d-none">
                                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" data-toggle="tab" href="#introduction_iva_compliance" role="tab">&nbsp;</a>
                                        <a class="nav-item nav-link" data-toggle="tab" href="#vulnerability_iva_compliance" role="tab">&nbsp;</a>
                                        <a class="nav-item nav-link" data-toggle="tab" href="#fact_find_iva_compliance" role="tab">&nbsp;</a>
                                        <a class="nav-item nav-link" data-toggle="tab" href="#IE_iva_compliance" role="tab">&nbsp;</a>
                                        <a class="nav-item nav-link" data-toggle="tab" href="#IVA_iva_compliance" role="tab">&nbsp;</a>
                                        <a class="nav-item nav-link" data-toggle="tab" href="#confirmation_iva_compliance" role="tab">&nbsp;</a>
                                        <a class="nav-item nav-link" data-toggle="tab" href="#score_iva_compliance" role="tab">&nbsp;</a>
                                        <a class="nav-item nav-link" data-toggle="tab" href="#button_iva_compliance" role="tab">&nbsp;</a>
                                    </div>
                                </nav>
        
                                <form class="compliance_submit_iva tab-content" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-2">
                                        <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                            <div class="from-group">
                                                <input type="text" class="form-control" id="data_of_call_iva_compliance" placeholder="Date Of Call:" name="Date Of Call" readonly>
                                            </div>
                                        </div>
                                        @if(!empty($allData_iva_compliance))

                                        @php
                                        $result_iva_compliance = $introducation_iva_compliance_result + $vulnerability_iva_compliance_result + $fact_find_iva_compliance_result + $ie_iva_compliance_result + $iva_compliance_result + $confirmation_iva_compliance_result;

                                        @endphp

                                        @else 

                                        @endif 
                                        
                                        <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                            @if(!empty($allData_iva_compliance))
                                                @if($fail_introducation_iva_compliance > 0 || $fail_vulnerability_iva_compliance > 0 || $fail_fact_find_iva_compliance > 0 || $fail_ie_iva_compliance > 0 || $fail_compliance_iva > 0 || $fail_iva_confirmation_compliance > 0)
                                                <div class="from-group">
                                                        <input type="text" class="form-control" id="date_scored_get_iva_compliance" value="45%" placeholder="Dade Scored:" name="Dade Scored">
                                                </div>
                                                @else 
                                                <div class="from-group">
                                                <input type="text" class="form-control" id="date_scored_get_iva_compliance" value="@if(isset($result_iva_compliance)) {{ $result_iva_compliance }}%  @else @endif " placeholder="Dade Scored:" name="Dade Scored">
                                                </div>
                                                @endif
                                            @else 
                                                <div class="from-group">
                                                    <input type="text" class="form-control" id="date_scored_get_iva_compliance" value="" placeholder="Dade Scored:" name="Dade Scored">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                
                                    @php 
                                        $notes_counter = 1;
                                    @endphp 
                                    {{-- New code start here --}}
                                    
                                @if(!empty($allData_iva_compliance))
                                    @foreach($allData_iva_compliance as $innerKey => $innerValue)
                                        @if($innerKey == 'introduction')
                                            <div class="tab_iva" id="{{$innerKey}}_iva_compliance">
                                                <div class="mt-4 mb-0 text-primary font-14">
                                                    <h5><strong>{{ $innerKey }}</strong></h5> 
                                                    <table class="table mb-0 text-left text-primary t-cell-middle">
                                                        @foreach($innerValue as $innerDataKey => $innerDataValue) 
                                                        <input type="hidden" name="debt_type" id="iva_compliance1" value="introduction">
                                                        <input type="hidden" name="weight" id="weight{{ $notes_counter }}_iva_compliance" value="{{ $innerDataValue->da_weight }}">
                                                        <input type="hidden" name="question1" id="question{{ $notes_counter }}_iva_compliance" value="{{ $innerDataValue->debt_details }}">
                                                        <tr>
                                                             @php
                                                                $innerDataValue->debt_details = str_replace('"', '', $innerDataValue->debt_details);
                                                          @endphp
                                                            @if($innerDataValue->debt_details == "Did_the_advisor_explain_the_purpose_and_next_steps")
                                                            <td class="text-danger">{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                            @else 
                                                            <td>{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                            @endif
                                                            <td>
                                                                @php 
                                                                    $innerDataValue->debt_details = substr($innerDataValue->debt_details, 1, -1);
                                                                @endphp
                                                                <select name="" id="check_iva{{ $notes_counter }}" class="form-control" required>
                                                                    @if(isset($innerDataValue->is_passed))
                                                                    <option value="{{$innerDataValue->is_passed}}">{{ $innerDataValue->is_passed }}</option>
                                                                    @else
                                                                    <option value="">Select one</option>
                                                                    @endif
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                    <option value="N/A">N/A</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type="text"
                                                                    placeholder="Notes:"
                                                                    id="note{{ $notes_counter }}_iva_compliance"
                                                                    name=""
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                        @endforeach
                                                    </table>
                                                    <h5 class="text-right">outcome for {{ $innerKey}}<span class="introducation_iva_compliance_count">{{ $introducation_iva_compliance_count }} % / 100%</span>
                                                    </h5>
                                                </div>
                                            </div>
                                        @elseif($innerKey == 'vulnerability')
                                            <div class="tab_iva" id="{{$innerKey}}_iva_compliance">
                                                <div class="mt-4 mb-0 text-primary font-14">
                                                    <h5><strong>{{ $innerKey }}</strong></h5> 
                                                    <table class="table mb-0 text-left text-primary t-cell-middle">
                                                        @foreach($innerValue as $innerDataKey => $innerDataValue)
                                                        <input type="hidden" name="debt_type" id="iva_compliance2" value="vulnerability">
                                                        <input type="hidden" name="weight" id="weight{{ $notes_counter }}_iva_compliance" value="{{ $innerDataValue->da_weight }}">
                                                        <input type="hidden" name="question1" id="question{{ $notes_counter }}_iva_compliance" value="{{ $innerDataValue->debt_details }}">
                                                        <tr>
                                                           
                                                            <td class="text-danger">{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                           
                                                            <td>
                                                                @php 
                                                                    $innerDataValue->debt_details = substr($innerDataValue->debt_details, 1, -1);
                                                                @endphp
                                                                <select name="" id="check_iva{{ $notes_counter }}" class="form-control" required>
                                                                    @if(isset($innerDataValue->is_passed))
                                                                    <option value="{{$innerDataValue->is_passed}}">{{ $innerDataValue->is_passed }}</option>
                                                                    @else
                                                                    <option value="">Select one</option>
                                                                    @endif
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                    <option value="N/A">N/A</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type="text"
                                                                    placeholder="Notes:"
                                                                    value="{{  $innerDataValue->da_notes }}"
                                                                    id="note{{ $notes_counter }}_iva_compliance"
                                                                    name=""
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                        @endforeach
                                                    </table>
                                                    <h5 class="text-right">outcome for {{ $innerKey}}<span class="vulnerability_iva_compliance_count">{{ $vulnerability_iva_compliance_count }} % / 100%</span>
                                                    </h5>
                                                </div>
                                            </div>
                                        @elseif($innerKey == 'fact_find')
                                            <div class="tab_iva" id="{{$innerKey}}_iva_compliance">
                                                <div class="mt-4 mb-0 text-primary font-14">
                                                    <h5><strong>{{ $innerKey }}</strong></h5> 
                                                    <table class="table mb-0 text-left text-primary t-cell-middle">
                                                        @foreach($innerValue as $innerDataKey => $innerDataValue)
                                                        <input type="hidden" name="debt_type" id="iva_compliance3" value="fact_find">
                                                        <input type="hidden" name="weight" id="weight{{ $notes_counter }}_iva_compliance" value="{{ $innerDataValue->da_weight }}">
                                                        <input type="hidden" name="question1" id="question{{ $notes_counter }}_iva_compliance" value="{{ $innerDataValue->debt_details }}">
                                                        <tr>
                                                             @php
                                                                $innerDataValue->debt_details = str_replace('"', '', $innerDataValue->debt_details);
                                                          @endphp
                                                            @if($innerDataValue->debt_details == "Did_the_advisor_obtain_consent_to_run_a_full_credit_search_Do_you_authorise_me_to_search_one_or_more_credit_reference_agencies_to_locate_any_credit_agreements_for_the_purpose_of_assisting_in_the_preparation_of_and_administration_of_an_IVA_The_search_will_be_recorded_on_your_credit_file_but_will_not_be_visible_to_lenders_and_will_not_affect_your_credit_rating_Do_you_wish_to_continue")
                                                            <td>
                                                                <h4 class="mb-0 text-danger">{{ str_replace('_','  ',$innerDataValue->debt_details) }}</h4>
                                                            </td>
                                                            @else
                                                            <td>
                                                                <h4 class="mb-0">{{ str_replace('_','  ',$innerDataValue->debt_details    ) }}</h4>
                                                            </td> 
                                                            @endif

                                                            <td>
                                                                @php 
                                                                    $innerDataValue->debt_details = substr($innerDataValue->debt_details, 1, -1);
                                                                @endphp
                                                                <select name="" id="check_iva{{ $notes_counter }}" class="form-control" required>
                                                                    @if(isset($innerDataValue->is_passed))
                                                                    <option value="{{$innerDataValue->is_passed}}">{{ $innerDataValue->is_passed }}</option>
                                                                    @else
                                                                    <option value="">Select one</option>
                                                                    @endif
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                    <option value="N/A">N/A</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type="text"
                                                                    placeholder="Notes:"
                                                                    value="{{  $innerDataValue->da_notes }}"
                                                                    id="note{{ $notes_counter }}_iva_compliance"
                                                                    name=""
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                        @endforeach
                                                    </table>
                                                    <h5 class="text-right">outcome for {{ $innerKey}}<span class="fact_find_iva_compliance_count">{{ $fact_find_iva_compliance_count }} % / 100%</span>
                                                    </h5>
                                                </div>
                                            </div>
                                        @elseif($innerKey == 'IE')
                                            <div class="tab_iva" id="{{$innerKey}}_iva_compliance">
                                                <div class="mt-4 mb-0 text-primary font-14">
                                                    <h5><strong>{{ $innerKey }}</strong></h5> 
                                                    <table class="table mb-0 text-left text-primary t-cell-middle">
                                                        @foreach($innerValue as $innerDataKey => $innerDataValue)
                                                        <input type="hidden" name="debt_type" id="iva_compliance4" value="IE">
                                                        <input type="hidden" name="weight" id="weight{{ $notes_counter }}_iva_compliance" value="{{ $innerDataValue->da_weight }}">
                                                        <input type="hidden" name="question1" id="question{{ $notes_counter }}_iva_compliance" value="{{ $innerDataValue->debt_details }}">
                                                        <tr>
                                                             @php
                                                                $innerDataValue->debt_details = str_replace('"', '', $innerDataValue->debt_details);
                                                          @endphp
                                                            @if($innerDataValue->debt_details == "Did_the_advisor_discuss_the_income_check_if_debtor_is_working_receiving_benefits_etc" || $innerDataValue->debt_details =="Did_the_advisor_check_if_the_debtor_had_any_assets_that_may_impact_the_options_available_Car_property_savings_investments_etc")
                                                                <td class="text-danger">{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                                @else 
                                                                <td>{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                            @endif  

                                                            <td>
                                                                @php 
                                                                    $innerDataValue->debt_details = substr($innerDataValue->debt_details, 1, -1);
                                                                @endphp
                                                                <select name="" id="check_iva{{ $notes_counter }}" class="form-control" required>
                                                                    @if(isset($innerDataValue->is_passed))
                                                                    <option value="{{$innerDataValue->is_passed}}">{{ $innerDataValue->is_passed }}</option>
                                                                    @else
                                                                    <option value="">Select one</option>
                                                                    @endif
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                    <option value="N/A">N/A</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type="text"
                                                                    placeholder="Notes:"
                                                                    value="{{  $innerDataValue->da_notes }}"
                                                                    id="note{{ $notes_counter }}_iva_compliance"
                                                                    name=""
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                        @endforeach
                                                    </table>
                                                    <h5 class="text-right">outcome for {{ $innerKey}}<span class="ie_iva_compliance_count">{{ $ie_iva_compliance_count }} % / 100%</span>
                                                    </h5>
                                                </div>
                                            </div>
                                        @elseif($innerKey == 'IVA')
                                            <div class="tab_iva" id="{{$innerKey}}_iva_compliance">
                                                <div class="mt-4 mb-0 text-primary font-14">
                                                    <h5><strong>{{ $innerKey }}</strong></h5> 
                                                    <table class="table mb-0 text-left text-primary t-cell-middle">
                                                        @foreach($innerValue as $innerDataKey => $innerDataValue)
                                                        <input type="hidden" name="debt_type" id="iva_compliance5" value="iva">
                                                        <input type="hidden" name="weight" id="weight{{ $notes_counter }}_iva_compliance" value="{{ $innerDataValue->da_weight }}">
                                                        <input type="hidden" name="question1" id="question{{ $notes_counter }}_iva_compliance" value="{{ $innerDataValue->debt_details }}">
                                                        <tr>
                                                             @php
                                                                $innerDataValue->debt_details = str_replace('"', '', $innerDataValue->debt_details);
                                                          @endphp
                                                            @if($innerDataValue->debt_details == "If_the_advisor_has_recommended_an_IVA_did_they_explain_the_implications_if_a_homeowner")
                                                                <td class="text-danger">{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                                @else 
                                                                <td>{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                                @endif
                                                            <td>
                                                                @php 
                                                                    $innerDataValue->debt_details = substr($innerDataValue->debt_details, 1, -1);
                                                                @endphp
                                                                <select name="" id="check_iva{{ $notes_counter }}" class="form-control" required>
                                                                    @if(isset($innerDataValue->is_passed))
                                                                    <option value="{{$innerDataValue->is_passed}}">{{ $innerDataValue->is_passed }}</option>
                                                                    @else
                                                                    <option value="">Select one</option>
                                                                    @endif
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                    <option value="N/A">N/A</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type="text"
                                                                    placeholder="Notes:"
                                                                    value="{{  $innerDataValue->da_notes }}"
                                                                    id="note{{ $notes_counter }}_iva_compliance"
                                                                    name=""
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                        @endforeach
                                                    </table>
                                                    <h5 class="text-right">outcome for {{ $innerKey}}<span class="iva_compliance_count">{{ $iva_compliance_count }} % / 100%</span>
                                                    </h5>
                                                </div>
                                            </div>
                                        @elseif($innerKey == 'confirmation')
                                            <div class="tab_iva" id="{{$innerKey}}_iva_compliance">
                                                <div class="mt-4 mb-0 text-primary font-14">
                                                    <h5><strong>{{ $innerKey }}</strong></h5> 
                                                    <table class="table mb-0 text-left text-primary t-cell-middle">
                                                        @foreach($innerValue as $innerDataKey => $innerDataValue)
                                                        <input type="hidden" name="debt_type" id="iva_compliance6" value="confirmation">
                                                        <input type="hidden" name="weight" id="weight{{ $notes_counter }}_iva_compliance" value="{{ $innerDataValue->da_weight }}">
                                                        <input type="hidden" name="question1" id="question{{ $notes_counter }}_iva_compliance" value="{{ $innerDataValue->debt_details }}">
                                                        <tr>
                                                           
                                                            <td class="text-danger">{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                           
                                                            <td>
                                                                @php 
                                                                    $innerDataValue->debt_details = substr($innerDataValue->debt_details, 1, -1);
                                                                @endphp
                                                                <select name="" id="check_iva{{ $notes_counter }}" class="form-control" required>
                                                                    @if(isset($innerDataValue->is_passed))
                                                                    <option value="{{$innerDataValue->is_passed}}">{{ $innerDataValue->is_passed }}</option>
                                                                    @else
                                                                    <option value="">Select one</option>
                                                                    @endif
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                    <option value="N/A">N/A</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type="text"
                                                                    placeholder="Notes:"
                                                                    value="{{  $innerDataValue->da_notes }}"
                                                                    id="note{{ $notes_counter }}_iva_compliance"
                                                                    name=""
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        @php $notes_counter++; @endphp
                                                        @endforeach
                                                    </table>
                                                    <h5 class="text-right">outcome for {{ $innerKey}}<span class="confirmation_iva_compliance_count">{{ $confirmation_iva_compliance_count }} % / 100%</span>
                                                    </h5>
                                                </div>
                                            </div>
                                        @endif

                                    @endforeach
                                @else
        
                                    <div class="tab_iva" id="introduction_iva_compliance" style="display: block;">
                                        <div class="text-primary font-14">
                                            <div class="text-primary">
                                                <h5>
                                                    <strong>introduction</strong>
                                                </h5>
                                                
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    <input type="hidden" name="debt_type" id="iva_compliance1" value="introduction">
                                                    @foreach($introuduction_compliance_question as $key => $value)
                                                         @foreach($value as $innerkey=>$innervalue)
                                                            <input type="hidden" name="{{ json_encode($key) }}" id="weight{{ $notes_counter }}_iva_compliance" value="{{ json_encode($innervalue) }}">
                                                            <input type="hidden" name="question1" id="question{{ $notes_counter }}_iva_compliance" value="{{ json_encode($key) }}">
                                                            <tbody>
                                                                <tr> 
                                                                    @if($key == 'Did_the_advisor_explain_the_purpose_and_next_steps')
                                                                    <td>
                                                                        <h4 class="mb-0 text-danger">{{ str_replace('_','  ',$key) }} </h4>
                                                                    </td>
                                                                    @else
                                                                    <td>
                                                                        <h4 class="mb-0">{{ str_replace('_','  ',$key) }} </h4>
                                                                    </td> 
                                                                    @endif 
                                                                    <td>
                                                                        <select name="{{ $key }}" id="check_iva{{ $notes_counter }}" class="form-control" required>
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
                                                                            id="note{{ $notes_counter }}_iva_compliance"
                                                                            name="{{ $key }}[]"
                                                                            class="form-control">
                                                                    </td>
                                                                </tr>
                                                                @php
                                                                    $notes_counter++;
                                                                @endphp
                                                            </tbody>
                                                        @endforeach
                                                      @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for Introducation : <span class="introducation_iva_compliance_count"> 0% / 100%</span></h5>  
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="tab_iva" id="vulnerability_iva_compliance">
                                        <div class="text-primary font-14">
                                            <div class="text-primary">
                                                <h5>
                                                    <strong>vulnerability</strong>
                                                </h5>
                                                
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    <input type="hidden" name="debt_type" id="iva_compliance2" value="vulnerability">
                                                    @foreach($vulnerability_compliance_question as $key => $value)
                                                         @foreach($value as $innerkey=>$innervalue)
                                                                
                                                            <input type="hidden" name="{{ json_encode($key) }}" id="weight{{ $notes_counter }}_iva_compliance" value="{{ json_encode($innervalue) }}">
                                                            <input type="hidden" name="question1" id="question{{ $notes_counter }}_iva_compliance" value="{{ json_encode($key) }}">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <h4 class="text-danger mb-0">{{ str_replace('_','  ',$key) }}</h4>
                                                                    </td>
                                                                    <td>
                                                                        <select name="{{ $key }}" id="check_iva{{ $notes_counter }}" class="form-control" required>
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
                                                                            id="note{{ $notes_counter }}_iva_compliance"
                                                                            name="{{ $key }}[]"
                                                                            class="form-control">
                                                                    </td>
                                                                </tr>
                                                                @php
                                                                    $notes_counter++;
                                                                @endphp
                                                            </tbody>
                                                        @endforeach
                                                      @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for Vulnerability : <span class="vulnerability_iva_compliance_count"> 0% / 100%</span></h5>  
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="tab_iva" id="fact_find_iva_compliance">
                                        <div class="text-primary font-14">
                                            <div class="text-primary">
                                                <h5>
                                                    <strong>fact find</strong>
                                                </h5>
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    <input type="hidden" name="debt_type" id="iva_compliance3" value="fact_find">
                                                    @foreach($fact_find_compliance_question as $key => $value)
                                                         @foreach($value as $innerkey=>$innervalue)
                                                            <input type="hidden" name="{{ json_encode($key) }}" id="weight{{ $notes_counter }}_iva_compliance" value="{{ json_encode($innervalue) }}">
                                                            <input type="hidden" name="question1" id="question{{ $notes_counter }}_iva_compliance" value="{{ json_encode($key) }}">
                                                            <tbody>
                                                                <tr>
                                                                    @if($key == 'Did_the_advisor_obtain_consent_to_run_a_full_credit_search_Do_you_authorise_me_to_search_one_or_more_credit_reference_agencies_to_locate_any_credit_agreements_for_the_purpose_of_assisting_in_the_preparation_of_and_administration_of_an_IVA_The_search_will_be_recorded_on_your_credit_file_but_will_not_be_visible_to_lenders_and_will_not_affect_your_credit_rating_Do_you_wish_to_continue')
                                                                    <td>
                                                                        <h4 class="mb-0 text-danger">{{ str_replace('_','  ',$key) }}</h4>
                                                                    </td>
                                                                    @else
                                                                    <td>
                                                                        <h4 class="mb-0">{{ str_replace('_','  ',$key) }}</h4>
                                                                    </td> 
                                                                    @endif
                                                                    <td>
                                                                        <select name="{{ $key }}" id="check_iva{{ $notes_counter }}" class="form-control" required>
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
                                                                            id="note{{ $notes_counter }}_iva_compliance"
                                                                            name="{{ $key }}[]"
                                                                            class="form-control">
                                                                    </td>
                                                                </tr>
                                                                @php
                                                                    $notes_counter++;
                                                                @endphp
                                                            </tbody>
                                                        @endforeach
                                                      @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for Fact find : <span class="fact_find_iva_compliance_count"> 0% / 100%</span></h5>  
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="tab_iva" id="IE_iva_compliance">
                                        <div class="text-primary font-14">
                                            <div class="text-primary">  
                                                <h5>
                                                    <strong>IE</strong>
                                                </h5>
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    <input type="hidden" name="debt_type" id="iva_compliance4" value="IE">
                                                    @foreach($IE_compliance_question as $key => $value)
                                                         @foreach($value as $innerkey=>$innervalue)
                                                            <input type="hidden" name="{{ json_encode($key) }}" id="weight{{ $notes_counter }}_iva_compliance" value="{{ json_encode($innervalue) }}">
                                                            <input type="hidden" name="question1" id="question{{ $notes_counter }}_iva_compliance" value="{{ json_encode($key) }}">
                                                            <tbody>
                                                                <tr>
                                                                    @if($key == 'Did_the_advisor_discuss_the_income_check_if_debtor_is_working_receiving_benefits_etc' || $key =='Did_the_advisor_check_if_the_debtor_had_any_assets_that_may_impact_the_options_available_Car_property_savings_investments_etc')
                                                                    <td>
                                                                        <h4 class="mb-0 text-danger">{{ str_replace('_','  ',$key) }}</h4>
                                                                    </td>
                                                                    @else
                                                                    <td>
                                                                        <h4 class="mb-0">{{ str_replace('_','  ',$key) }}</h4>
                                                                    </td> 
                                                                    @endif
                                                                    <td>
                                                                        <select name="{{ $key }}" id="check_iva{{ $notes_counter }}" class="form-control" required>
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
                                                                            id="note{{ $notes_counter }}_iva_compliance"
                                                                            name="{{ $key }}[]"
                                                                            class="form-control">
                                                                    </td>
                                                                </tr>
                                                                @php
                                                                    $notes_counter++;
                                                                @endphp
                                                            </tbody>
                                                        @endforeach
                                                      @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for IE : <span class="ie__iva_compliance_count"> 0% / 100%</span></h5>  
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="tab_iva" id="IVA_iva_compliance">
                                        <div class="text-primary font-14">
                                            <div class="text-primary">
                                                <h5>
                                                    <strong>IVA</strong>
                                                </h5>
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    <input type="hidden" name="debt_type" id="iva_compliance5" value="iva">
                                                    @foreach($iva_compliance_question as $key => $value)
                                                         @foreach($value as $innerkey=>$innervalue)
                                                            <input type="hidden" name="{{ json_encode($key) }}" id="weight{{ $notes_counter }}_iva_compliance" value="{{ json_encode($innervalue) }}">
                                                            <input type="hidden" name="question1" id="question{{ $notes_counter }}_iva_compliance" value="{{ json_encode($key) }}">
                                                            <tbody>
                                                                <tr>
                                                                    @if($key == 'Did_the_advisor_request_the_following_information_from_the_debtor')
                                                                    <td>
                                                                        <h4 class="mb-0">
                                                                            Did the advisor request the following information from the debtor; 
                                                                            • 3 months’ wage slips/proof of income 
                                                                            • 3 months’ bank statements – If client unable to provide 3 months we can take 1 full month
                                                                            • Proof of debt not shown on credit report if applicable
                                                                            • Tenancy Agreement
                                                                            • Hire Purchase agreement if applicable
                                                                            • Evidence of any excessive expenditure if applicable
                                                                        </h4>
                                                                    </td>
                                                                    @else
                                                                    @if($key == 'If_the_advisor_has_recommended_an_IVA_did_they_explain_the_implications_if_a_homeowner')
                                                                    <td>
                                                                        <h4 class="mb-0 text-danger">{{ str_replace('_','  ',$key) }}</h4>
                                                                    </td>
                                                                    @else
                                                                    <td>
                                                                        <h4 class="mb-0">{{ str_replace('_','  ',$key) }}</h4>
                                                                    </td> 
                                                                    @endif
                                                                    @endif
                                                                    <td>
                                                                        <select name="{{ $key }}" id="check_iva{{ $notes_counter }}" class="form-control" required>
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
                                                                            id="note{{ $notes_counter }}_iva_compliance"
                                                                            name="{{ $key }}[]"
                                                                            class="form-control">
                                                                    </td>
                                                                </tr>
                                                                @php
                                                                    $notes_counter++;
                                                                @endphp
                                                            </tbody>
                                                        @endforeach
                                                      @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for IVA : <span class="iva_compliance_count"> 0% / 100%</span></h5>  
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="tab_iva" id="confirmation_iva_compliance">
                                        <div class="text-primary font-14">
                                            <div class="text-primary">
                                                <h5>
                                                    <strong>Confirmation</strong>
                                                </h5>
                                                <table class="table mb-0 text-left text-primary t-cell-middle">
                                                    <input type="hidden" name="debt_type" id="iva_compliance6" value="confirmation">
                                                    @foreach($confirmation_compliance_question as $key => $value)
                                                         @foreach($value as $innerkey=>$innervalue)
                                                            <input type="hidden" name="{{ json_encode($key) }}" id="weight{{ $notes_counter }}_iva_compliance" value="{{ json_encode($innervalue) }}">
                                                            <input type="hidden" name="question1" id="question{{ $notes_counter }}_iva_compliance" value="{{ json_encode($key) }}">
                                                            <tbody>
                                                                <tr>
                                
                                                                    <td>
                                                                        <h4 class="mb-0 text-danger">{{ str_replace('_','  ',$key) }}</h4>
                                                                    </td>
                                                                    <td>
                                                                        <select name="{{ $key }}" id="check_iva{{ $notes_counter }}" class="form-control" required>
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
                                                                            id="note{{ $notes_counter }}_iva_compliance"
                                                                            name="{{ $key }}[]"
                                                                            class="form-control">
                                                                    </td>
                                                                </tr>
                                                                @php
                                                                    $notes_counter++;
                                                                @endphp
                                                            </tbody>
                                                        @endforeach
                                                      @endforeach
                                                </table>
                                                <h5 class="text-right">outcome for IE : <span class="confirmation_iva_compliance_count"> 0% / 100%</span></h5>  
                                            </div>
                                        </div>
                                    </div>

                                @endif
        
                                @if(!empty($allData_iva_compliance))
                                @php
                                    $result_iva_compliance = $introducation_iva_compliance_result + $vulnerability_iva_compliance_result + $fact_find_iva_compliance_result + $ie_iva_compliance_result + $iva_compliance_result + $confirmation_iva_compliance_result;
                                    
                                @endphp
                                @else 
        
                                @endif
                                <div class="tab_iva" id="score_iva_compliance">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            @if(!(empty($allData_iva_compliance)))
                                            <div class="row">
                                                <div class="col-6">
                                                    <h5>overall</h5>
                                                        @php
                                                            $fail = 45; 
                                                        @endphp
        
                                                        @if($fail_introducation_iva_compliance > 0 || $fail_vulnerability_iva_compliance > 0 || $fail_fact_find_iva_compliance > 0 || $fail_ie_iva_compliance > 0 || $fail_compliance_iva > 0 || $fail_iva_confirmation_compliance > 0)
        
                                                        <h1 class="view_case_result_iva_compliance text-danger"> {{ $fail }} %</h1>
        
                                                        @else
                                                            @if($result_iva_compliance == 45 || $result_iva_compliance <= 45)   
                                                                <h1 class="text-danger view_case_result_iva_compliance">{{ $result_iva_compliance }}%</h1>
                                                             @else  
                                                                <h1 class="text-success view_case_result_iva_compliance">{{ $result_iva_compliance }}%</h1>
                                                            @endif
         
                                                        @endif    
                                                </div>
                                                <div class="col-6">
                                                    <h5>Result</h5>
                                                    @if($fail_introducation_iva_compliance > 0 || $fail_vulnerability_iva_compliance > 0|| $fail_fact_find_iva_compliance > 0 || $fail_ie_iva_compliance > 0 || $fail_compliance_iva > 0 || $fail_iva_confirmation_compliance > 0)
                                                      <h1 class="text-danger view_pass_fail_iva_compliance">Critical Fail</h1> 
                                                    @else
                                                        @if($result_iva_compliance == 45 || $result_iva_compliance <= 45)
                                                            <h1 class="text-danger view_pass_fail_iva_compliance">Critical Fail</h1>
                                                        @else
                                                        <h1 class="text-success view_pass_fail_iva_compliance">PASS</h1>
                                                        @endif
                                                    @endif
                                                              
                                                </div>
                                            </div>
        
                                            @else
                                            <div class="row">
                                                <div class="col-6">
                                                    <h5>overall</h5>
                                                    
                                                    <h1 class="view_case_result_iva_compliance"></h1>
                                                   
                                                    {{-- <h1 class="view_case_result_iva_compliance text-success"></h1> --}}
                                                            
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="view_pass_fail_iva_compliance">Result</h5>
                                                             
                                                </div>
                                            </div>
                                            @endif
                                             @if(!empty($compliance['allData_iva_compliance']))
                                            @foreach($compliance['allData_iva_compliance'] as $innerKey => $innerValue)
                                                @php 
                                                    $criticle_detail = $innerValue[0]->critical_fail_details;
                                                    $feedback = $innerValue[0]->feedback;
                                                @endphp
                                            @endforeach
                                          @endif
                                            <div class="form-group">
                                                <h5 class="mb-3">Critical fail Details:</h5>    
                                                <textarea name="critical_fail_detail" id="critical_fail_detail_iva" placeholder="N/A" class="form-control critical_textarea">
                                                     @if(isset($criticle_detail)) {{ $criticle_detail }} @else @endif
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                            <h5 class="mb-3">Feedback declaration</h5>    
                                                <textarea name="feedback_dec" id="feedback_dec_iva" placeholder="Notes:" class="form-control feedbacktextarea">
                                                     @if(isset($feedback)) {{ $feedback }} @else @endif
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    {{-- New code end here --}}
                                    
                                     @php
                                            $loginUserData = Auth::user();
                                            unset($loginUserData->password);
                                            $loginUser = $loginUserData;
                                @endphp
                               
                                    <div class="tab_iva" id="button_iva_compliance">
                                         @if($loginUser->user_type == 6)
                                         <a href="#" class="btn btn-bordered-primary text-right" data-dismiss="modal">close</a>
                                         @else
                                        
                                        <div class="modal-footer mb-4 mt-4">
                                            <div class="buttons d-flex justify-content-end float-right">
                                               <!--<button type="button" class="solution close alert_open" aria-label="Close">-->
                                                <input type="submit" name="prev_da_compliance" id="prev_compliance_iva" class="btn btn-bordered-primary run_compliance_iva bg-none" value="Prev" onclick="nextPrevIva(-1); return false;">
                                                <input type="submit" name="next_da_compliance" id="next_compliance_iva" class="btn btn-bordered-primary run_compliance_iva bg-none" value="Next" onclick="nextPrevIva(1); return false;">
                                                <a href="" id="get_id_view_case" class="btn btn-bordered-primary">View Case</a>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                
        
                                </form>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
        

        {{-- iva compliance code end here --}}

 
        
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
        
        <div id="custom_sms_message_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content card card-secondary">
                    <div class="modal-header">
                        <div class="card-title">Custom SMS</div>
                        <button type="button" class="close alert_open close_reminder_popup">
                            <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <form action="{{ route('sms.send_custom_sms') }}" method="POST" class="d-block input-sm" style="width: 100%;">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <input type="hidden" name="custom_sms_user_id" value="{{ $userInfo->user_id }}">
                                                <div class="form-group"></div>
                                                <!--<label for="custom_sms" class="d-block text-primary" style="width: 100%;">SMS</label>-->
                                                @if($userInfo->login_with != 'mobile')
                                                    <div class="from-group">
                                                        <labe>Tel. Number</labe>
                                                        <input type="number" style="border-radius: 10px;" class="form-control" id="user_tel_number" pattern="[0-9]{11}" placeholder="07875359918" name="user_tel_number" required>
                                                    </div>
                                                    <div class="form-group"></div>
                                                @endif
                                                <div class="form-group" style="width: 100%;">
                                                    <label>Message</label>
                                                    <textarea name="custom_sms" id="custom_sms" required class=" form-control b-grey" value="" style="resize: none;border-radius: 10px;height: 145px;" required></textarea>
                                                </div>
                                                <br/>
                                                <h2>WhatsApp link : www.vsms.co/4k9C</h2><br/>
                                                <h2>Opt out link :www.vsms.co/GB</h2>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="modal-footer mb-5">
                        <input type="submit" class="btn btn-outline-info float-right btn-large " value="Send SMS">
                    </div>
                    </form>
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
    dateFormat: 'dd/mm/yy',
    yearRange: '1950:2040', 
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
   
    $("#back").click(function () {
        //$("#alert_modal").hide();
        $('#alert_modal').modal('hide');
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
    $(document).on('click','.case_status-change', function(e){
        e.preventDefault();
        $('#view_bottom_z_case_type').val('');
        var z_case_status_value = $(this).data('zcasestatus');
        
        $('#view_bottom_z_case_type').val(z_case_status_value);
        $('#alert_modal').modal('show');
    })
</script>
<script>
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
                    var checked_iva_ticks = 0;
                    $(".select_iva").each(function() {
                        var js_iva_id = $(this).attr('id');
                        //console.log('js_iva_id => '+ js_iva_id, $('#' + js_iva_id).is(":checked"))
                        if($('#' + js_iva_id).is(":checked")) {
                            checked_iva_ticks = checked_iva_ticks+1;
                        }
                    });
                    //console.log('checked_iva_ticks => '+checked_iva_ticks)

                    if(checked_iva_ticks == 11) {
                        // To show the calendar slot model code start
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url:'{{ route('user.get_calendar_data_for_send_to_iva') }}',
                                method:'post',
                                cache: false,
                                data:{ 
                                    userId: user_id
                                },
                                success:function(data)
                                {
                                    $('#calendar_slot_model_from_send_to_iva').html(data);
                                    $('#calendar_slot_model_from_send_to_iva').show();
                                    $('#slot_book_for_iva_advisor').modal('show');
                                    $('#Sent_To_IVA_Modal').css('display','none');
                                }
                            });
                        // To show the calendar slot model code end
                    } else {
                        $('#showAddedIvaData').show();
                        $('#Sent_To_IVA_Modal').modal('show');
                        $('#Sent_To_IVA_Modal').css('display', 'block');
                    }
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
                    console.log(data);
                    if(data == 'allChecked') {
                        // open reminder popup
                        var message = 'Data save succesfully';
                        $('#Sent_To_IVA_Modal').modal('hide');
                        //$('#reminder_calender_modal').modal('show');
                        $('#Sent_To_IVA_Modal').css('display', 'block');

                        // To show the calendar slot model code start
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url:'{{ route('user.get_calendar_data_for_send_to_iva') }}',
                                method:'post',
                                cache: false,
                                data:{ 
                                    userId: userId
                                },
                                success:function(data)
                                {
                                    $('#calendar_slot_model_from_send_to_iva').html(data);
                                    $('#calendar_slot_model_from_send_to_iva').show();
                                    $('#slot_book_for_iva_advisor').modal('show');
                                    $('#Sent_To_IVA_Modal').css('display','none');
                                }
                            });
                        // To show the calendar slot model code end
                    } else {
                        var messageIcon = 'error';
                        if(data == 'missingPersonalDetails') {
                            var message = 'Data save succesfully. Please fill up Personal Details.';
                            var messageIcon = 'success';
                        } else if(data == 'success') {
                            var message = 'Data save succesfully';
                            var messageIcon = 'success';
                        }
                        else{
                            var message = 'something wrong please try again';
                        }
                        swal(message, {
                            icon: messageIcon,
                        });
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

                    var checked_dmp_ticks = 0;
                    $(".select_send_dmp_team").each(function() {
                    //$(document).on('each', '.select_send_dmp_team', function(){
                        var js_id = $(this).attr('id');
                        //console.log('js_id => '+ js_id, $('#' + js_id).is(":checked"))
                        if($('#' + js_id).is(":checked")) {
                            checked_dmp_ticks = checked_dmp_ticks+1;
                        }
                    });
                    //console.log('checked_dmp_ticks => '+checked_dmp_ticks)

                    if(checked_dmp_ticks == 8) {
                        //console.log('reached here');
                        // To show the calendar slot model code start
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url:'{{ route('user.get_calendar_data_for_send_to_dmp') }}',
                                method:'post',
                                cache: false,
                                data:{ 
                                    userId: user_id
                                },
                                success:function(data)
                                {
                                    $('#calendar_slot_model_from_send_to_dmp').html(data);
                                    $('#calendar_slot_model_from_send_to_dmp').show();
                                    $('#slot_book_for_dmp_advisor').modal('show');
                                    $('#Sent_To_DMP_team_Modal').css('display','none');
                                }
                            });
                        // To show the calendar slot model code end
                    } else {
                        $('#showAddedDmpTeamData').show();
                        $('#showDefaultDmpTeamData').remove();
                        $('#Sent_To_DMP_team_Modal').modal('show');
                        $('#Sent_To_DMP_team_Modal').css('display','block');
                    }
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
                        $('#update_case_status_reminder').val('dmp draft');
                        $('#Sent_To_DMP_team_Modal').modal('hide');
                        //$('#reminder_calender_modal').modal('show');
                        $('#Sent_To_DMP_team_Modal').css('display','block');
                        // To show the calendar slot model code start
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url:'{{ route('user.get_calendar_data_for_send_to_dmp') }}',
                                method:'post',
                                cache: false,
                                data:{ 
                                    userId: userId
                                },
                                success:function(data)
                                {
                                    $('#calendar_slot_model_from_send_to_dmp').html(data);
                                    $('#calendar_slot_model_from_send_to_dmp').show();
                                    $('#slot_book_for_dmp_advisor').modal('show');
                                    $('#Sent_To_DMP_team_Modal').css('display','none');
                                }
                            });
                        // To show the calendar slot model code end
                    } else {
                        var messageIcon = 'error';
                        if(data == 'missingPersonalDetails') {
                            var message = 'Data save succesfully. Please fill up Personal Details.';
                            var messageIcon = 'success';
                        } else if(data == 'success') {
                            var message = 'Data save succesfully';
                            var messageIcon = 'success';
                        } else{
                            var message = 'something wrong please try again';
                        }
                        swal(message, {
                            icon: messageIcon,
                        });
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
                    $('#Sent_To_DMP_Modal').css('display','block');
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
                        $('#Sent_To_DMP_Modal').modal('hide');
                        $('#reminder_calender_modal').modal('show');
                        $('#Sent_To_DMP_Modal').css('display','block');
                        //$('#reminder_calender_modal').modal('show');
                        //$('#Sent_To_DMP_Modal').css('display','block');
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
                    $('#Sent_To_Ip_Modal').css('display','block');
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
                        // To show the calendar slot model code start
                        $('#reminder_calender_modal').modal('show');
                        $('#Sent_To_Ip_Modal').css('display','block');
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

    // This code is to show the are you sure modal
    $(document).on('click', '.close_reminder_popup', function(e){
        e.preventDefault();
        $('#exit_modal').modal('show');
    });

    // This code is to close the are you sure modal as well as reminder modal
    $(document).on('click', '.close_current_popup', function(e){
        e.preventDefault();
        $(this).closest('.close_exit_modal_div').modal('hide');
        $('#reminder_calender_modal').modal('hide');
    });

    // This code is to close the are you sure modal
    $(document).on('click', '.close_current_exit_modal', function(e){
        e.preventDefault();
        $(this).closest('.close_exit_modal_div').modal('hide');
    });
</script>

<script type="text/javascript">
    
    $(document).on('click','.changeday',function(e)
    {
        e.preventDefault();
        var userId = $('#userId').val();
        var changeday = $(this).data('change_case_status_name');

        if(changeday == 'In Process' || changeday == 'Awaiting Docs')
        {
            $('.changeday').attr('disable',true);
            $('#update_case_status_reminder').val(changeday);
            
            $('#reminder_calender_modal').modal('show');
        } else {
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
                            var message = 'Case assign succesfully';
                            var messageIcon = 'success';
                            window.location = '{{ URL::to('/user') }}';
                       } else {
                           alert(data);
                           var message = 'something wrong please try again';
                       }
                       swal(message, {
                       icon: messageIcon,
                       });
                       
                    
                }
            })
        }
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

<script>
    /*$(document).on('click','#exit_alert',function()
    {
       location.reload(); 
    });*/
</script>



<script>
    jQuery('body').on('click', '#next_da', function () {
        var next = jQuery('.nav-tabs .nav-item.active').next('.nav-item');
        next.trigger('click');
        // if (next.length) {
        //     next.trigger('click');
        // } 
    });

    jQuery('body').on('click', '#prev_da', function () {
        var prev = jQuery('.nav-tabs .nav-item.active').prev('.nav-item');
        prev.trigger('click');
        // if (prev.length) {
        //     prev.trigger('click');
        // }
        
        
    });
   
</script>


<script type="text/javascript">
    $(document).ready(function()
    {
        var d = new Date();

        var month = d.getMonth()+1;
        var day = d.getDate();

        var output =
            ((''+day).length<2 ? '0' : '') + day + '-'+ 
            ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();

        $('#data_of_call').val(output);

    });
</script>

<script type="text/javascript">

   $(document).on('click', '.select_agent_for_dmp_calendar', function(){

        var userId = $('#userId').val();
        var case_status = 'dmp draft';

        var agent_id = $(this).data('agent_id');
        var time_slot = $(this).data('time_slot');
        var slot_date = $(this).data('slot_date');
         var slot_time = $(this).data('slot_time');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'{{ route('user.assign_case_calendar_data_to_dmp') }}',
            method:'post',
            cache: false,
            data:{ 
                userId: userId,
                case_status: case_status,
                agent_id: agent_id,
                time_slot: time_slot,
                slot_date: slot_date,
                slot_time : slot_time
            },
            success:function(data)
            {
                console.log('result => ', data);
                $('#calendar_slot_model_from_send_to_dmp').html('');
                $('#slot_book_for_dmp_advisor').modal('hide');
                $('#calendar_slot_model_from_send_to_dmp').hide();
                var messageIcon = 'error';
                if(data == 'success') {
                    var message = 'Data save succesfully';
                    var messageIcon = 'success';
                }
                else{
                    var message = 'something wrong please try again';
                }
                swal(message, {
                    icon: messageIcon,
                });
                if(data == 'success') {
                    window.location = '{{ URL::to('/user') }}';
                }
            }
        });
    });

    $(document).on('click', '.select_agent_for_iva_calendar', function(){
        var userId = $('#userId').val();
        var case_status = 'iva draft';

        var agent_id = $(this).data('agent_id');
        var time_slot = $(this).data('time_slot');
        var slot_date = $(this).data('slot_date');
        var slot_time = $(this).data('slot_time');
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'{{ route('user.assign_case_calendar_data_to_dmp') }}',
            method:'post',
            cache: false,
            data:{ 
                userId: userId,
                case_status: case_status,
                agent_id: agent_id,
                time_slot: time_slot,
                slot_date: slot_date,
                slot_time : slot_time
            },
            success:function(data)
            {
                console.log('result => ', data);
                $('#calendar_slot_model_from_send_to_iva').html('');
                $('#slot_book_for_iva_advisor').modal('hide');
                $('#calendar_slot_model_from_send_to_iva').hide();
                var messageIcon = 'error';
                if(data == 'success') {
                    var message = 'Data save succesfully';
                    var messageIcon = 'success';
                } else if(data == 'alreadyAssignedToAgent') {
                    var message = 'Case is already assigned.';
                }
                else{
                    var message = 'something wrong please try again';
                }
                swal(message, {
                    icon: messageIcon,
                });
                if(data == 'success') {
                    window.location = '{{ URL::to('/user') }}';
                }
            }
        });
    });

</script>

<script>
    $(document).on('click','.Failed_compliance',function()
    {
        $('#fix_compliance').modal('show');
    });
</script>

<script>
    $(document).on('click','.case_fix_compliance',function()
    {
        var userId = $('#userId').val();
        var case_status = $(this).val();
        
         $.ajax({
            url:'{{ route('user.update_case_status') }}',
            method:'post',
            data:{_token: '{{csrf_token()}}',case_status_name:case_status,userId:userId},
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

<script type="text/javascript">
    $(document).ready(function()
    {
        var d = new Date();

        var month = d.getMonth()+1;
        var day = d.getDate();

        var output =
            ((''+day).length<2 ? '0' : '') + day + '-'+ 
            ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();

        $('#data_of_call_compliance').val(output);

    });
</script>

<script>
    // data_of_call_iva_compliance
     $(document).ready(function()
    {
        var d = new Date();

        var month = d.getMonth()+1;
        var day = d.getDate();

        var output =
            ((''+day).length<2 ? '0' : '') + day + '-'+ 
            ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();

        $('#data_of_call_iva_compliance').val(output);

    });
</script>


<script>
    jQuery('body').on('click', '#next_da_compliance', function () {
        var next = jQuery('.nav-tabs .nav-item.active').next('.nav-item');
        next.trigger('click');
        // if (next.length) {
        //     next.trigger('click');
        // } 
    });

    jQuery('body').on('click', '#prev_da_compliance', function () {
        var prev = jQuery('.nav-tabs .nav-item.active').prev('.nav-item');
        prev.trigger('click');
        // if (prev.length) {
        //     prev.trigger('click');
        // }
        
        
    });
   
</script>

<script>
    jQuery('body').on('click', '#prev_da_iva_compliance', function () {
        var next = jQuery('.nav-tabs .nav-item.active').next('.nav-item');
        next.trigger('click');
        // if (next.length) {
        //     next.trigger('click');
        // } 
    });

    jQuery('body').on('click', '#prev_da_iva_compliance', function () {
        var prev = jQuery('.nav-tabs .nav-item.active').prev('.nav-item');
        prev.trigger('click');
        // if (prev.length) {
        //     prev.trigger('click');
        // }
        
        
    });
   
</script>

<script>

    $(document).on('click','.submit_form_compliance',function(e){

        e.preventDefault();

    
        var userId = $('#userId').val();
        var data_of_call_compliance = $('#data_of_call_compliance').val();

        var question = [];
        var is_passed = [];
        var notes = [];
        var weight = [];
        var debt_type = [];

        var date_scored_get = $('#date_scored_get_compliance').val();

        var debt_type1 = $('#debt_type_compliance').val();

        var question1 = $('#question1_compliance').val();
        question1 = question1.replace(/\d+/g, '');
        var is_passed1 = $('#check1 :selected').text();
        var notes1 = $('#note1_compliance').val();
        var weight1 = $('#weight1_compliance').val();

        
        if(is_passed1 == '' || is_passed1 == null){
            is_passed1 = null;
        }
       
        question.push(question1);
        is_passed.push(is_passed1);
        notes.push(notes1);
        weight.push(weight1);
        debt_type.push(debt_type1);

        var question2 = $('#question2_compliance').val();
        question2 = question2.replace(/\d+/g, '');
        var is_passed2 = $('#check2 :selected').text();
        var notes2 = $('#note2_compliance').val();
        var weight2 = $('#weight2_compliance').val();

        if(is_passed2 == '' || is_passed2 == null){
            is_passed2 = null;
        }
        

        question.push(question2);
        is_passed.push(is_passed2);
        notes.push(notes2);
        weight.push(weight2);
        debt_type.push(debt_type1);

        var question3 = $('#question3_compliance').val();
        question3 = question3.replace(/\d+/g, '');
        var is_passed3 = $('#check3 :selected').text();
        var notes3 = $('#note3_compliance').val();
        var weight3 = $('#weight3_compliance').val();

        if(is_passed3 == '' || is_passed3 == null){
            is_passed3 = null;
        }

        question.push(question3);
        is_passed.push(is_passed3);
        notes.push(notes3);
        weight.push(weight3);
        debt_type.push(debt_type1);

        var debt_type2 = $('#debt_type_compliance_two').val();

        var question4 = $('#question4_compliance').val();
        question4 = question4.replace(/\d+/g, '');
        var is_passed4 = $('#check4 :selected').text();
        var notes4 = $('#note4_compliance').val();
        var weight4 = $('#weight4_compliance').val();

        if(is_passed4 == '' || is_passed4 == null){
            is_passed4 = null;
        }

        question.push(question4);
        is_passed.push(is_passed4);
        notes.push(notes4);
        weight.push(weight4);
        debt_type.push(debt_type2);

        var question5 = $('#question5_compliance').val();
        question5 = question5.replace(/\d+/g, '');
        var is_passed5 = $('#check5 :selected').text();
        var notes5 = $('#note5_compliance').val();
        var weight5 = $('#weight5_compliance').val();

        if(is_passed5 == '' || is_passed5 == null){
            is_passed5 = null;
        }

        question.push(question5);
        is_passed.push(is_passed5);
        notes.push(notes5);
        weight.push(weight5);
        debt_type.push(debt_type2);

        var question6 = $('#question6_compliance').val();
        question6 = question6.replace(/\d+/g, '');
        var is_passed6 = $('#check6 :selected').text();
        var notes6 = $('#note6_compliance').val();
        var weight6 = $('#weight6_compliance').val();

        if(is_passed6 == '' || is_passed6 == null){
            is_passed6 = null;
        }

        question.push(question6);
        is_passed.push(is_passed6);
        notes.push(notes6);
        weight.push(weight6);
        debt_type.push(debt_type2);

        var debt_type3 = $('#debt_type_compliance_three').val();
    
        var question7 = $('#question7_compliance').val();
        question7 = question7.replace(/\d+/g, '');
        var is_passed7 = $('#check7 :selected').text();
        var notes7 = $('#note7_compliance').val();
        var weight7 = $('#weight7_compliance').val();

        if(is_passed7 == '' || is_passed7 == null){
            is_passed7 = null;
        }

        question.push(question7);
        is_passed.push(is_passed7);
        notes.push(notes7);
        weight.push(weight7);
        debt_type.push(debt_type3);
        
        var question8 = $('#question8_compliance').val();
        question8 = question8.replace(/\d+/g, '');
        var is_passed8 = $('#check8 :selected').text();
        var notes8 = $('#note8_compliance').val();
        var weight8 = $('#weight8_compliance').val();

        if(is_passed8 == '' || is_passed8 == null){
            is_passed8 = null;
        }

        question.push(question8);
        is_passed.push(is_passed8); 
        notes.push(notes8);
        weight.push(weight8);
        debt_type.push(debt_type3);

        
        var question9 = $('#question9_compliance').val();
        question9 = question9.replace(/\d+/g, '');
        var is_passed9 = $('#check9 :selected').text();
        var notes9 = $('#note9_compliance').val();
        var weight9 = $('#weight9_compliance').val();

        if(is_passed9 == '' || is_passed9 == null){
            is_passed9 = null;
        }

        question.push(question9);
        is_passed.push(is_passed9);
        notes.push(notes9);
        weight.push(weight9);
        debt_type.push(debt_type3);

        var debt_type4 = $('#debt_type_compliance_four').val();
        
        var question10 = $('#question10_compliance').val();
        question10 = question10.replace(/\d+/g, '');
        var is_passed10 = $('#check10 :selected').text();
        var notes10 = $('#note10_compliance').val();
        var weight10 = $('#weight10_compliance').val();

        if(is_passed10 == '' || is_passed10 == null){
            is_passed10 = null;
        }

        question.push(question10);
        is_passed.push(is_passed10);
        notes.push(notes10);
        weight.push(weight10);
        debt_type.push(debt_type4);

        var debt_type5 = $('#debt_type_compliance_five').val(); 

        var question11 = $('#question11_compliance').val();
        question11 = question11.replace(/\d+/g, '');
        var is_passed11 = $('#check11 :selected').text();
        var notes11 = $('#note11_compliance').val();
        var weight11 = $('#weight11_compliance').val();

        if(is_passed11 == '' || is_passed11 == null){
            is_passed11 = null;
        }

        question.push(question11);
        is_passed.push(is_passed11);
        notes.push(notes11);
        weight.push(weight11);
        debt_type.push(debt_type5);

        var question12 = $('#question12_compliance').val();
        question12 = question12.replace(/\d+/g, '');
        var is_passed12 = $('#check12 :selected').text();
        var notes12 = $('#note12_compliance').val();
        var weight12 = $('#weight12_compliance').val();

        if(is_passed12 == '' || is_passed12 == null){
            is_passed12 = null;
        }

        question.push(question12);
        is_passed.push(is_passed12);
        notes.push(notes12);
        weight.push(weight12);
        debt_type.push(debt_type5);

        var debt_type6 = $('#debt_type_compliance_six').val(); 

        var question13 = $('#question13_compliance').val();
        question13 = question13.replace(/\d+/g, '');
        var is_passed13 = $('#check13 :selected').text();
        var notes13 = $('#note13_compliance').val();
        var weight13 = $('#weight13_compliance').val();

        if(is_passed13 == '' || is_passed13 == null){
            is_passed13 = null;
        }

        question.push(question13);
        is_passed.push(is_passed13);
        notes.push(notes13);
        weight.push(weight13);
        debt_type.push(debt_type6);

        var question14 = $('#question14_compliance').val();
        question14 = question14.replace(/\d+/g, '');
        var is_passed14 = $('#check14 :selected').text();
        var notes14 = $('#note14_compliance').val();
        var weight14 = $('#weight14_compliance').val();

        if(is_passed14 == '' || is_passed14 == null){
            is_passed14 = null;
        }

        question.push(question14);
        is_passed.push(is_passed14);
        notes.push(notes14);
        weight.push(weight14);
        debt_type.push(debt_type6);


        var question15 = $('#question15_compliance').val();
        question15 = question15.replace(/\d+/g, '');
        var is_passed15 = $('#check15 :selected').text();
        var notes15 = $('#note15_compliance').val();
        var weight15 = $('#weight15_compliance').val();

        if(is_passed15 == '' || is_passed15 == null){
            is_passed15 = null;
        }

        question.push(question15);
        is_passed.push(is_passed15);
        notes.push(notes15);
        weight.push(weight15);
        debt_type.push(debt_type6);

        var question16 = $('#question16_compliance').val();
        question1 = question16.replace(/\d+/g, '');
        var is_passed16 = $('#check16 :selected').text();
        var notes16 = $('#note16_compliance').val();
        var weight16 = $('#weight16_compliance').val();
        
        var critical_fail_detail = $('#critical_fail_detail_dmp').val();
        var feedback = $('#feedback_dec_dmp').val();

        if(is_passed16 == '' || is_passed16 == null){
            is_passed16 = null;
        }

        question.push(question16);
        is_passed.push(is_passed16);
        notes.push(notes16);
        weight.push(weight16);
        debt_type.push(debt_type6);

        console.log(question);
        console.log(is_passed);
        console.log(notes);
        console.log(weight);


        $.ajax({ 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '{{ route('Save_compliance') }}',
            method : 'post',
            data : {
                    userId : userId,
                    data_of_call_compliance : data_of_call_compliance,
                    date_scored_get : date_scored_get,
                    debt_type : debt_type,
                    question : question,
                    is_passed : is_passed,
                    notes : notes,
                    weight : weight,
                    critical_fail_detail : critical_fail_detail,
                    feedback : feedback
            },
            datatype : 'json',
            success : function(data)
            {
                var messageIcon = 'error';
                    if (data == 'success') {
                        var message = 'something wrong please try again';  
                    } else {
                        var message = 'Data save successfully';
                        var messageIcon = 'success'; 
                    }
                    swal(message, {
                        icon: messageIcon,
                    });

               $.ajax({
                    url : '{{ route('get_compliance_data') }}',
                    method : 'get',
                    data : { userId : userId },
                    dataType : 'json',
                    success : function(data)
                    {
                        var total = 0;

                        console.log(data);

                        var introducation_compliance_count = JSON.parse(data.introducation_compliance_count);
                        $('.introducation_compliance_count').text(introducation_compliance_count + '% / 100%');

                        var vulnerability_compliance_count = JSON.parse(data.vulnerability_compliance_count);
                        $('.vulnerability_compliance_count').text(vulnerability_compliance_count + '% / 100%');

                        var fact_find_compliance_count = JSON.parse(data.fact_find_compliance_count);
                        $('.fact_find_compliance_count').text(fact_find_compliance_count + '% / 100%');

                        var ie_compliance_count = JSON.parse(data.ie_compliance_count);
                        $('.ie_compliance_count').text(ie_compliance_count + '% / 100%');

                        var dmp_compliance_count = JSON.parse(data.dmp_compliance_count);
                        $('.dmp_compliance_count').text(dmp_compliance_count + '% / 100%');

                        var confirmation_compliance_count = JSON.parse(data.confirmation_compliance_count);
                        $('.confirmation_compliance_count').text(confirmation_compliance_count + '% / 100%');

                        var fail_introducation_compliance = JSON.parse(data.fail_introducation_compliance);
                        var fail_vulnerability_compliance = JSON.parse(data.fail_vulnerability_compliance);
                        var fail_fact_find_compliance = JSON.parse(data.fail_fact_find_compliance);
                        var fail_ie_compliance = JSON.parse(data.fail_ie_compliance);
                        var fail_compliance_dmp = JSON.parse(data.fail_compliance_dmp);
                        var fail_confirmation_compliance = JSON.parse(data.fail_confirmation_compliance);

                        var total = JSON.parse(data.total_result_compliance);

                        

                        if(fail_introducation_compliance > 0 || fail_vulnerability_compliance > 0 || fail_fact_find_compliance > 0 || fail_ie_compliance > 0 || fail_compliance_dmp > 0 || fail_confirmation_compliance > 0)
                        {
                                     var fail = 45;
                                     
                                      $('.view_case_result_compliance').text(fail + '%');
                                      $('.view_case_result_compliance').addClass('text-danger');
                                      $('.view_pass_fail_compliance').text('Critical Fail');
                                      $('.view_pass_fail_compliance').addClass('text-danger');
                                      $('#date_scored_get_compliance').val(fail + '%');
                        }
                        else
                        {
                                    if(total <= 45 || total == 45)
                                    {
                                        $('.view_case_result_compliance').text(fail + '%');
                                        $('.view_case_result_compliance').addClass('text-danger');
                                        $('.view_pass_fail_compliance').text('Critical Fail');
                                        $('.view_pass_fail_compliance').addClass('text-danger');
                                        $('#date_scored_get_compliance').val(fail + '%');
                                    }

                                    $('#date_scored_get_compliance').val(total + '%');
                                    $('.view_case_result_compliance').text(total + '%');
                                    $('.view_case_result_compliance').removeClass('text-danger');
                                    $('.view_case_result_compliance').addClass('text-success');
                                    $('.pass_text').text('PASS');
                                    $('.view_pass_fail_compliance').text('PASS');
                                    $('.view_pass_fail_compliance').removeClass('text-danger');
                                    $('.view_pass_fail_compliance').addClass('text-success');
                        }
                        
                        $('#compliance_data').modal('hide');
                        

                    }
               });
            }
         });
    });

</script>

<script>

    $(document).on('click','.submit_form_iva_compliance',function(e){

        e.preventDefault();

        var question = [];
        var is_passed = [];
        var notes = [];
        var weight = [];
        var debt_type = [];

        var userId = $('#userId').val();

        var data_of_call = $('#data_of_call_iva_compliance').val();
        var date_scored_get = $('#date_scored_get_iva_compliance').val();

        var debt_type1 = $('#iva_compliance1').val();
        console.log(debt_type1);

        var question1 = $('#question1_iva_compliance').val();
        question1 = question1.replace(/\d+/g, '');
        var is_passed1 = $('#check_iva1 :selected').val();
        var notes1 = $('#note1_iva_compliance').val();
        var weight1 = $('#weight1_iva_compliance').val();

        if(is_passed1 == '' || is_passed1 == null){
            is_passed1 = null;
        }

        question.push(question1);
        is_passed.push(is_passed1);
        notes.push(notes1);
        weight.push(weight1);
        debt_type.push(debt_type1);

        var question2 = $('#question2_iva_compliance').val();
        question2 = question2.replace(/\d+/g, '');
        var is_passed2 = $('#check_iva2 :selected').val();
        var notes2 = $('#note2_iva_compliance').val();
        var weight2 = $('#weight2_iva_compliance').val();

        if(is_passed2 == '' || is_passed2 == null){
            is_passed2 = null;
        }

        // console.log(is_passed1);
       
        question.push(question2);
        is_passed.push(is_passed2);
        notes.push(notes2);
        weight.push(weight2);
        debt_type.push(debt_type1);

        
        var question3 = $('#question3_iva_compliance').val();
        question3 = question3.replace(/\d+/g, '');
        var is_passed3 = $('#check_iva3 :selected').val();
        var notes3 = $('#note3_iva_compliance').val();
        var weight3 = $('#weight3_iva_compliance').val();

        if(is_passed3 == '' || is_passed3 == null){
            is_passed3 = null;
        }

        question.push(question3);
        is_passed.push(is_passed3);
        notes.push(notes3);
        weight.push(weight3);
        debt_type.push(debt_type1);

        
        var debt_type2 = $('#iva_compliance2').val();

        var question4 = $('#question4_iva_compliance').val();
        question4 = question4.replace(/\d+/g, '');
        var is_passed4 = $('#check_iva4 :selected').val();
        var notes4 = $('#note4_iva_compliance').val();
        var weight4 = $('#weight4_iva_compliance').val();

        
        if(is_passed4 == '' || is_passed4 == null){
            is_passed4 = null;
        }

        question.push(question4);
        is_passed.push(is_passed4);
        notes.push(notes4);
        weight.push(weight4);
        debt_type.push(debt_type2);

        
        var question5 = $('#question5_iva_compliance').val();
        question5 = question5.replace(/\d+/g, '');
        var is_passed5 = $('#check_iva5 :selected').val();
        var notes5 = $('#note5_iva_compliance').val();
        var weight5 = $('#weight5_iva_compliance').val();

        if(is_passed5 == '' || is_passed5 == null){
            is_passed5 = null;
        }

        question.push(question5);
        is_passed.push(is_passed5);
        notes.push(notes5);
        weight.push(weight5);
        debt_type.push(debt_type2);

        
        var question6 = $('#question6_iva_compliance').val();
        question6 = question6.replace(/\d+/g, '');
        var is_passed6 = $('#check_iva6 :selected').val();
        var notes6 = $('#note6_iva_compliance').val();
        var weight6 = $('#weight6_iva_compliance').val();

        if(is_passed6 == '' || is_passed6 == null){
            is_passed6 = null;
        }

        question.push(question6);
        is_passed.push(is_passed6);
        notes.push(notes6);
        weight.push(weight6);
        debt_type.push(debt_type2);

        
        var debt_type3 = $('#iva_compliance3').val();

        var question7 = $('#question7_iva_compliance').val();
        question7 = question7.replace(/\d+/g, '');
        var is_passed7 = $('#check_iva7 :selected').val();
        var notes7 = $('#note7_iva_compliance').val();
        var weight7 = $('#weight7_iva_compliance').val();

        if(is_passed7 == '' || is_passed7 == null){
            is_passed7 = null;
        }

        question.push(question7);
        is_passed.push(is_passed7);
        notes.push(notes7);
        weight.push(weight7);
        debt_type.push(debt_type3);

        var question8 = $('#question8_iva_compliance').val();
        question8 = question8.replace(/\d+/g, '');
        var is_passed8 = $('#check_iva8 :selected').val();
        var notes8 = $('#note8_iva_compliance').val();
        var weight8 = $('#weight8_iva_compliance').val();

        if(is_passed8 == '' || is_passed8 == null){
            is_passed8 = null;
        }

        question.push(question8);
        is_passed.push(is_passed8);
        notes.push(notes8);
        weight.push(weight8);
        debt_type.push(debt_type3);
       
        var question9 = $('#question9_iva_compliance').val();
        question9 = question9.replace(/\d+/g, '');
        var is_passed9 = $('#check_iva9 :selected').val();
        var notes9 = $('#note9_iva_compliance').val();
        var weight9 = $('#weight9_iva_compliance').val();

        if(is_passed9 == '' || is_passed9 == null){
            is_passed9 = null;
        }

        question.push(question9);
        is_passed.push(is_passed9);
        notes.push(notes9);
        weight.push(weight9);
        debt_type.push(debt_type3);
        
        var debt_type4 = $('#iva_compliance4').val();

        var question10 = $('#question10_iva_compliance').val();
        question10 = question10.replace(/\d+/g, '');
        var is_passed10 = $('#check_iva10 :selected').val();
        var notes10 = $('#note10_iva_compliance').val();
        var weight10 = $('#weight10_iva_compliance').val();

        if(is_passed10 == '' || is_passed10 == null){
            is_passed10 = null;
        }

        question.push(question10);
        is_passed.push(is_passed10);
        notes.push(notes10);
        weight.push(weight10);
        debt_type.push(debt_type4);

        
        var question11 = $('#question11_iva_compliance').val();
        question11 = question11.replace(/\d+/g, '');
        var is_passed11 = $('#check_iva11 :selected').val();
        var notes11 = $('#note11_iva_compliance').val();
        var weight11 = $('#weight11_iva_compliance').val();

        if(is_passed11 == '' || is_passed11 == null){
            is_passed11 = null;
        }

        question.push(question11);
        is_passed.push(is_passed11);
        notes.push(notes11);
        weight.push(weight11);
        debt_type.push(debt_type4);

        var question12 = $('#question12_iva_compliance').val();
        question12 = question12.replace(/\d+/g, '');
        var is_passed12 = $('#check_iva12 :selected').val();
        var notes12 = $('#note12_iva_compliance').val();
        var weight12 = $('#weight12_iva_compliance').val();

        if(is_passed12 == '' || is_passed12 == null){
            is_passed12 = null;
        }

        question.push(question12);
        is_passed.push(is_passed12);
        notes.push(notes12);
        weight.push(weight12);
        debt_type.push(debt_type4);

        var question13 = $('#question13_iva_compliance').val();
        question13 = question13.replace(/\d+/g, '');
        var is_passed13 = $('#check_iva13 :selected').val();
        var notes13 = $('#note13_iva_compliance').val();
        var weight13 = $('#weight13_iva_compliance').val();

        if(is_passed13 == '' || is_passed13 == null){
            is_passed13 = null;
        }

        question.push(question13);
        is_passed.push(is_passed13);
        notes.push(notes13);
        weight.push(weight13);
        debt_type.push(debt_type4);
        
    
        var debt_type5 = $('#iva_compliance5').val();

        var question14 = $('#question14_iva_compliance').val();
        question14 = question14.replace(/\d+/g, '');
        var is_passed14 = $('#check_iva14 :selected').val();
        var notes14 = $('#note14_iva_compliance').val();
        var weight14 = $('#weight14_iva_compliance').val();

        if(is_passed14 == '' || is_passed14 == null){
            is_passed14 = null;
        }

        question.push(question14);
        is_passed.push(is_passed14);
        notes.push(notes14);
        weight.push(weight14);
        debt_type.push(debt_type5);

        var question15 = $('#question15_iva_compliance').val();
        question15 = question15.replace(/\d+/g, '');
        var is_passed15 = $('#check_iva15 :selected').val();
        var notes15 = $('#note15_iva_compliance').val();
        var weight15 = $('#weight15_iva_compliance').val();

        if(is_passed15 == '' || is_passed15 == null){
            is_passed15 = null;
        }

        question.push(question15);
        is_passed.push(is_passed15);
        notes.push(notes15);
        weight.push(weight15);
        debt_type.push(debt_type5);
        

        var question16 = $('#question16_iva_compliance').val();
        question16 = question16.replace(/\d+/g, '');
        var is_passed16 = $('#check_iva16 :selected').val();
        var notes16 = $('#note16_iva_compliance').val();
        var weight16 = $('#weight16_iva_compliance').val();

        if(is_passed16 == '' || is_passed16 == null){
            is_passed16 = null;
        }

        question.push(question16);
        is_passed.push(is_passed16);
        notes.push(notes16);
        weight.push(weight16);
        debt_type.push(debt_type5);

        var question17 = $('#question17_iva_compliance').val();
        question17 = question17.replace(/\d+/g, '');
        var is_passed17 = $('#check_iva17 :selected').val();
        var notes17 = $('#note17_iva_compliance').val();
        var weight17 = $('#weight17_iva_compliance').val();

        if(is_passed17 == '' || is_passed17 == null){
            is_passed17 = null;
        }

        question.push(question17);
        is_passed.push(is_passed17);
        notes.push(notes17);
        weight.push(weight17);
        debt_type.push(debt_type5);

        var question18 = $('#question18_iva_compliance').val();
        question18 = question18.replace(/\d+/g, '');
        var is_passed18 = $('#check_iva18 :selected').val();
        var notes18 = $('#note18_iva_compliance').val();
        var weight18 = $('#weight18_iva_compliance').val();

        if(is_passed18 == '' || is_passed18 == null){
            is_passed18 = null;
        }

        question.push(question18);
        is_passed.push(is_passed18);
        notes.push(notes18);
        weight.push(weight18);
        debt_type.push(debt_type5);

       

        var question19 = $('#question19_iva_compliance').val();
        question19 = question19.replace(/\d+/g, '');
        var is_passed19 = $('#check_iva19 :selected').val();
        var notes19 = $('#note19_iva_compliance').val();
        var weight19 = $('#weight19_iva_compliance').val();

        if(is_passed19 == '' || is_passed19 == null){
            is_passed19 = null;
        }

        question.push(question19);
        is_passed.push(is_passed19);
        notes.push(notes19);
        weight.push(weight19);
        debt_type.push(debt_type5);

        var question20 = $('#question20_iva_compliance').val();
        question20 = question20.replace(/\d+/g, '');
        var is_passed20 = $('#check_iva20 :selected').val();
        var notes20 = $('#note20_iva_compliance').val();
        var weight20 = $('#weight20_iva_compliance').val();

        if(is_passed20 == '' || is_passed20 == null){
            is_passed20 = null;
        }

        question.push(question20);
        is_passed.push(is_passed20);
        notes.push(notes20);
        weight.push(weight20);
        debt_type.push(debt_type5);

        var question21 = $('#question21_iva_compliance').val();
        question21 = question21.replace(/\d+/g, '');
        var is_passed21 = $('#check_iva21 :selected').val();
        var notes21 = $('#note21_iva_compliance').val();
        var weight21 = $('#weight21_iva_compliance').val();

        if(is_passed21 == '' || is_passed21 == null){
            is_passed21 = null;
        }

        question.push(question21);
        is_passed.push(is_passed21);
        notes.push(notes21);
        weight.push(weight21);
        debt_type.push(debt_type5);

        var debt_type6 = $('#iva_compliance6').val();

        var question22 = $('#question22_iva_compliance').val();
        question22 = question22.replace(/\d+/g, '');
        var is_passed22 = $('#check_iva22 :selected').val();
        var notes22 = $('#note22_iva_compliance').val();
        var weight22 = $('#weight22_iva_compliance').val();

        if(is_passed22 == '' || is_passed22 == null){
            is_passed22 = null;
        }

        question.push(question22);
        is_passed.push(is_passed22);
        notes.push(notes22);
        weight.push(weight22);
        debt_type.push(debt_type6);

        console.log(question);

        var question23 = $('#question23_iva_compliance').val();
        question23 = question23.replace(/\d+/g, '');
        var is_passed23 = $('#check_iva23 :selected').val();
        var notes23 = $('#note23_iva_compliance').val();
        var weight23 = $('#weight23_iva_compliance').val();

        if(is_passed23 == '' || is_passed23 == null){
            is_passed23 = null;
        }

        question.push(question23);
        is_passed.push(is_passed23);
        notes.push(notes23);
        weight.push(weight23);
        debt_type.push(debt_type6);

        var question24 = $('#question24_iva_compliance').val();
        question24 = question24.replace(/\d+/g, '');
        var is_passed24 = $('#check_iva24 :selected').val();
        var notes24 = $('#note24_iva_compliance').val();
        var weight24 = $('#weight24_iva_compliance').val();

        if(is_passed24 == '' || is_passed24 == null){
            is_passed24 = null;
        }

        question.push(question24);
        is_passed.push(is_passed24);
        notes.push(notes24);
        weight.push(weight24);
        debt_type.push(debt_type6);

        var question25 = $('#question25_iva_compliance').val();
        question25 = question25.replace(/\d+/g, '');
        var is_passed25 = $('#check_iva25 :selected').val();
        var notes25 = $('#note25_iva_compliance').val();
        var weight25 = $('#weight25_iva_compliance').val();

        if(is_passed25 == '' || is_passed25 == null){
            is_passed25 = null;
        }

        question.push(question25);
        is_passed.push(is_passed25);
        notes.push(notes25);
        weight.push(weight25);
        debt_type.push(debt_type6);

        var question26 = $('#question26_iva_compliance').val();
        question26 = question26.replace(/\d+/g, '');
        var is_passed26 = $('#check_iva26 :selected').val();
        var notes26 = $('#note26_iva_compliance').val();
        var weight26 = $('#weight26_iva_compliance').val();

        if(is_passed26 == '' || is_passed26 == null){
            is_passed26 = null;
        }
        
        var critical_fail_detail = $('#critical_fail_detail_iva').val();
        var feedback = $('#feedback_dec_iva').val();

        question.push(question26);
        is_passed.push(is_passed26);
        notes.push(notes26);
        weight.push(weight26);
        debt_type.push(debt_type6);

        console.log(debt_type);

        $.ajax({ 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '{{ route('Save_iva_compliance') }}',
            method : 'POST',
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
            datatype : 'json',
            success : function(data)
            {
                    var messageIcon = 'error';
                    if (data == 'success') {
                        var message = 'something wrong please try again'; 
                    } else {
                       
                         var message = 'Data save successfully';
                        var messageIcon = 'success';
                    }
                    swal(message, {
                        icon: messageIcon,
                    });

                    //get data start here
                    $.ajax({
                    url : '{{ route('get_iva_compliance_data') }}',
                    method : 'get',
                    data : { userId : userId },
                    dataType : 'json',
                    success : function(data)
                    {
                        var total = 0;

                        console.log(data);

                        var introducation_iva_compliance_count = JSON.parse(data.introducation_iva_compliance_count);
                        $('.introducation_iva_compliance_count').text(introducation_iva_compliance_count + '% / 100%');

                        var vulnerability_iva_compliance_count = JSON.parse(data.vulnerability_iva_compliance_count);
                        $('.vulnerability_iva_compliance_count').text(vulnerability_iva_compliance_count + '% / 100%');

                        var fact_find_iva_compliance_count = JSON.parse(data.fact_find_iva_compliance_count);
                        $('.fact_find_iva_compliance_count').text(fact_find_iva_compliance_count + '% / 100%');

                        var ie_iva_compliance_count = JSON.parse(data.ie_iva_compliance_count);
                        $('.ie_iva_compliance_count').text(ie_iva_compliance_count + '% / 100%');

                        var iva_compliance_count = JSON.parse(data.iva_compliance_count);
                        $('.iva_compliance_count').text(iva_compliance_count + '% / 100%');

                        var confirmation_iva_compliance_count = JSON.parse(data.confirmation_iva_compliance_count);
                        $('.confirmation_iva_compliance_count').text(confirmation_iva_compliance_count + '% / 100%');

                        var fail_introducation_iva_compliance = JSON.parse(data.fail_introducation_iva_compliance);
                        var fail_vulnerability_iva_compliance = JSON.parse(data.fail_vulnerability_iva_compliance);
                        var fail_fact_find_iva_compliance = JSON.parse(data.fail_fact_find_iva_compliance);
                        var fail_ie_iva_compliance = JSON.parse(data.fail_ie_iva_compliance);
                        var fail_compliance_iva = JSON.parse(data.fail_compliance_iva);
                        var fail_iva_confirmation_compliance = JSON.parse(data.fail_iva_confirmation_compliance);

                        var total = JSON.parse(data.total_result_compliance);

                        // $('#date_scored_get_iva_compliance').val(total + '%');

                        if(fail_introducation_iva_compliance > 0 || fail_vulnerability_iva_compliance > 0 || fail_fact_find_iva_compliance > 0 || fail_ie_iva_compliance > 0 || fail_compliance_iva > 0 || fail_iva_confirmation_compliance > 0)
                        {
                                    var fail = 45;
                                    
                                    $('.view_case_result_iva_compliance').text(fail + '%');
                                    $('.view_case_result_iva_compliance').addClass('text-danger');
                                    $('.view_pass_fail_iva_compliance').text('Critical Fail');
                                    $('.view_pass_fail_iva_compliance').addClass('text-danger');
                                    $('#date_scored_get_iva_compliance').val(fail + '%');
                        }
                        else
                        {
                                    if(total <= 45 || total == 45)
                                    {
                                        $('.view_case_result_iva_compliance').text(fail + '%');
                                        $('.view_case_result_iva_compliance').addClass('text-danger');
                                        $('.view_pass_fail_iva_compliance').text('Critical Fail');
                                        $('.view_pass_fail_iva_compliance').addClass('text-danger');
                                        $('#date_scored_get_iva_compliance').val(fail + '%');
                                    }
                                    $('.view_case_result_iva_compliance').text(total + '%');
                                    $('#date_scored_get_iva_compliance').val(total + '%');
                                    $('.view_case_result_iva_compliance').removeClass('text-danger');
                                    $('.view_case_result_iva_compliance').addClass('text-success');
                                    $('.pass_text').text('PASS');
                                    $('.view_pass_fail_iva_compliance').text('PASS');
                                    $('.view_pass_fail_iva_compliance').removeClass('text-danger');
                                    $('.view_pass_fail_iva_compliance').addClass('text-success');
                                    
                        }
                        
                        $('#compliance_iva_data').modal('hide');
                        



                    }

                });
                        
                    //get data end here
   
            }
        });

    });

</script>

<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTabDmp(currentTab); // Display the current tab
    
    function showTabDmp(n) {

        
        
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab_dmp");
      
      if(x[n].style.display = "block"){
          console.log('Yes');
      }
      if (n == 0) {
        document.getElementById("prev_compliance_dmp").style.display = "none";
      } else {
        document.getElementById("prev_compliance_dmp").style.display = "inline";
      }
      
    }
    function nextPrevDmp(n) {
        
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab_dmp");
      
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateFormDmp()) return false;
      
      //add class for list slide form submit
        currentActiveTab = x[currentTab].attributes[1];
         
         var addClassForSubmit = document.getElementsByClassName('run_compliance');
            var nextClassSubmit = addClassForSubmit[1];
        console.log(currentActiveTab);
        if(currentActiveTab.value == `confirmation_compliance`) {
            // console.log(nextClassSubmit);
            // nextClassSubmit.addClass('submit_form_compliance');
            nextClassSubmit.classList.add('submit_form_compliance');
            document.getElementById('prev_compliance_dmp').style.display = 'none';
            document.getElementById('next_compliance_dmp').style.display = 'none';
        }else{
            nextClassSubmit.classList.remove('submit_form_compliance');
            document.getElementById('next_compliance_dmp').style.display = 'block';
        }
      // Hide the current tab:
      x[currentTab].style.display = "none";
      currentTab = currentTab + n;
      
      showTabDmp(currentTab);
    }
    function validateFormDmp() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab_dmp");   
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

{{-- iva compliance code start here --}}

{{-- nextPrevIva --}}

<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTabIva(currentTab); // Display the current tab
    
    function showTabIva(n) {
        
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab_iva");
      x[n].style.display = "block";
      
      if (n == 0) {
        document.getElementById("prev_compliance_iva").style.display = "none";
      } else {
        document.getElementById("prev_compliance_iva").style.display = "inline";
      }
      
    }
    function nextPrevIva(n) {
        // event.preventDefault(); 
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab_iva");
      
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateFormIva()) return false;
      
      //add class for list slide form submit
        currentActiveTab = x[currentTab].attributes[1];
          var addClassForSubmit = document.getElementsByClassName('run_compliance_iva');
            var nextClassSubmit = addClassForSubmit[1];
            console.log(nextClassSubmit);
        // 
        if(currentActiveTab.value == `confirmation_iva_compliance`) {
           
            // nextClassSubmit.addClass('submit_form_compliance');
            nextClassSubmit.classList.add('submit_form_iva_compliance');
            document.getElementById('prev_compliance_iva').style.display = 'none';
            document.getElementById('next_compliance_iva').style.display = 'none';
        }else{
             nextClassSubmit.classList.remove('submit_form_iva_compliance');
             document.getElementById('next_compliance_iva').style.display = 'block';
        }
      // Hide the current tab:
      x[currentTab].style.display = "none";
      currentTab = currentTab + n;
      
      showTabIva(currentTab);
    }
    function validateFormIva() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab_iva");   
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
    
     {{-- da next prev nextPrevDa --}}

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTabDa(currentTab); // Display the current tab
        
        function showTabDa(n) {
            
          // This function will display the specified tab of the form...
          var x = document.getElementsByClassName("tab_da");
          x[n].style.display = "block";
          if (n == 0) {
            document.getElementById("da_prev").style.display = "none";
          } else {
            document.getElementById("da_prev").style.display = "inline";
          }
          
        }
        function nextPrevDa(n) {
            // event.preventDefault(); 
          // This function will figure out which tab to display
          var x = document.getElementsByClassName("tab_da");
          
          // Exit the function if any field in the current tab is invalid:
          if (n == 1 && !validateFormDa()) return false;
          
          //add class for list slide form submit
            currentActiveTab = x[currentTab].attributes[1];
            var addClassForSubmit = document.getElementsByClassName('run_da');
                var nextClassSubmit = addClassForSubmit[1];
                console.log(nextClassSubmit);
            
            // da_prev
            if(currentActiveTab.value == `confirmation`) {
                
                // nextClassSubmit.addClass('submit_form_compliance');
                nextClassSubmit.classList.add('submit_form');
                document.getElementById("da_prev").style.display = "none";
                document.getElementById("da_next").style.display = "none";
            }else{
                nextClassSubmit.classList.remove('submit_form');
                document.getElementById("da_next").style.display = "block";
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

            var userId = $('#userId').val();

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
                            var fact_find_result = JSON.parse(Math.round(data.fact_find_result));
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
                            $('#D_A_quality').modal('hide');
                        }
                    })
                }
            })
        });
    </script>
    
    <script>
    $(document).ready(function(){
        var current_case_status = '<?php echo $userInfo->zCaseType; ?>';
        
        if(current_case_status == 'Fixed Compliance'){
        $('#refresh_alert').modal('show');
         $(window).keydown(function(event){
      if(event.keyCode == 116) {
        event.preventDefault();
        return false;
      }
    });
        }
    });
</script>


<script>
history.pushState(null, null, location.href);
    history.back();
    history.forward();
    window.onpopstate = function () { history.go(1); };
</script>


@if(\Session::has('custome_message_success'))
<script type="text/javascript">
        var custome_message = "{{ \Session::get('custome_message_success') }}";
        var messageIcon = 'success';
            swal(custome_message, {
                  icon: messageIcon,
            });
</script>
@endif

@if($errors->any())
<script type="text/javascript">
        var custome_error_message = "{{ $errors->first() }}";
        var messageIcon = 'error';
            swal(custome_error_message, {
                  icon: messageIcon,
            });
</script>
@endif

<script type="text/javascript">
    $(document).on('change', '#solution_display_by_option', function(){
        var userId = $('#userId').val();
        var solutionByOption = $(this).val();

         $.ajax({
            url:'{{ route('user.get_calculated_user_solution') }}',
            method:'post',
            data:{_token: '{{csrf_token()}}',userId:userId,solutionByOption:solutionByOption},
            cache: false,
            success:function(response)
            {
                $('#show_calculated_solution_div').html(response);
            }
        });
    });
</script>
<script>
    function copyText()
    {
    var copyText = document.getElementById("truelayer_link");
    copyText.select();
    copyText.setSelectionRange(0, 99999)
    document.execCommand("copy");
    
    }

</script>
@endsection