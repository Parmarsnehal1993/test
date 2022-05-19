@extends('layouts.app')
@section('content')
@php
// dd($data['userInfo']);
$loginUserData = Auth::user();
unset($loginUserData->password);
$loginUser = $loginUserData;
@endphp


<!-- case option css start here-->
<style type="text/css">
.case_option
{
    width:65% !important;
}
.tab_dmp,.tab_iva,.tab_da {
        display: none;
    }
    #button_compliance{
        display : block !important;
    }
    #button_iva_compliance{
        display : block !important;
    }
    #button_da{
        display : block !important;
    }
    .card-body h1 {
    font-size: 35px;
    
    margin-bottom: 0px !important;
    }
    .add_require:after{
        content:"*";
        color: red;
    }
</style>
<!-- case option css end here-->


<div class="main-content pt-0">
<div class="row mt--80">
        <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
            <div class="row bb-cr">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6  p-0 text-nowrap">
                    <div class="main-title">
                        <h1 class="font-h1 d-flex align-items-center">
                            <strong>Case:</strong>
                            <span class="font-light">
                                {{ !empty($userInfo->name) ? $userInfo->name : '' }} {{ !empty($userInfo->surname) ? ' '.$userInfo->surname : '' }}
                            </span>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <span>
                                <div id="countdown2" class="pull-right" style="color: #008DCC; font-size: 35px;"></div>
                            </span>
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
                    <span class="text-warning">{{$userInfo->zCaseType}}</span>
                </h4>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="row">
                        <div class="d-inline-block mr-2">
                            <h5 class="d-inline-block font-15">
                                <strong class="font">customer number:</strong>
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
                                <strong class="font">Debt leval:</strong>
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
                        <a  href="{{ route('viewUser',[$id]) }}" class="btn btn-outline-info ml-lg-auto ml-xl-auto ml-md-auto">View case</a>
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
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="card case_option">
                                <div class="card-title">
                                    Solution
                                </div>
                                <div class="card-body text-center">
                                    <h1 class="text-center">@if($solution_data) {{$solution_data->solutionType}} @else  N/A @endif</h1>
                                    <h6>
                                    <strong>
                                    Solution Type
                                    </strong>
                                    </h6>
                                    <h6>
                                    <strong>
                                     @if($solution_data) {{$solution_data->insolvency}} @else  N/A @endif
                                    </strong>
                                    </h6>
                                </div>
                                <div class="plus-sign" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#solution_popup">
                                    <img src="{!! asset('images/icons/Plus_Icon@2x.png')!!}" alt="Add" width="30">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="card case_option">
                                <div class="card-title">
                                    Accounts
                                </div>
                                <div class="card-body text-center">
                                    <h1 class="text-center">&#163;@if($account_data) {{ $account_data->fee }} @else 0  @endif</h1>
                                    <h6>
                                    <strong>
                                    Fee
                                    </strong>
                                    </h6>
                                </div>
                                 @if($userInfo->zCaseType == "invoiced")
                                @else 
                                <div class="plus-sign" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#account_popup">
                                    <img src="{!! asset('images/icons/Plus_Icon@2x.png')!!}" alt="Add" width="30">
                                </div>
                                 @endif
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="card case_option">
                                <div class="card-title">
                                    Compliance
                                </div>
                                {{-- code for DMP Compliance code start here --}}
                                @if($userInfo->zCaseType == 'submitted DMP' || $userInfo->zCaseType == 'invoice' || $userInfo->zCaseType == 'Failed Compliance')
                                    @if(!empty($compliance['allData_compliance']))
                                        @php
                                        $result_compliance = $compliance['introducation_compliance_result'] + $compliance['vulnerability_compliance_result'] + $compliance['fact_find_compliance_result'] + $compliance['ie_compliance_result'] + $compliance['dmp_compliance_result'] + $compliance['confirmation_compliance_result'];
                                        @endphp
                                    @else 
                                    @endif

                                    @if(!empty($compliance['allData_compliance']))
                                        @if($compliance['fail_introducation_compliance'] > 0 || $compliance['fail_vulnerability_compliance'] > 0 || $compliance['fail_fact_find_compliance'] > 0 || $compliance['fail_ie_compliance'] > 0 || $compliance['fail_compliance_dmp'] > 0 || $compliance['fail_confirmation_compliance'] > 0)  
                                        <div class="card-body text-center">
                                            <h1 class="text-center view_case_result_compliance">45%</h1>
                                                <h6>
                                                <strong class="text-danger view_pass_fail_compliance">
                                                Fail
                                                </strong>
                                                </h6>
                                        </div>
                                        @else 
                                            <div class="card-body text-center">
                                                <h1 class="text-center view_case_result_compliance">@if(isset($result_compliance)) {{ $result_compliance }}% @else @endif</h1>
                                                    <h6>
                                                    
                                                    @if(!empty($result_compliance))
                                                    @if($result_compliance <= 45 || $result_compliance == 45)
                                                        </strong class="view_pass_fail_compliance">Criticle Fail</strong>
                                                    @else
                                                        </strong class="view_pass_fail_compliance">PASS</strong> 
                                                    @endif
            
                                                    @endif
                                                    
                                                    </h6>
                                            </div>

                                        @endif
                                    @else 
                                    <div class="card-body text-center">
                                        <h1 class="text-center view_case_result_compliance"></h1>
                                            <h6>
                                                </strong class="text-danger view_pass_fail_compliance"></strong>
                                            </h6>
                                    </div>
                                    @endif
                                    
                                   
                                @endif
                                 {{-- code for DMP Compliance code end here --}}
                                 @if($userInfo->zCaseType == 'submitted IVA' || $userInfo->zCaseType == 'invoice' || $userInfo->zCaseType == 'Failed Compliance')
                                    @if(!empty($compliance['allData_iva_compliance']))
                                        @php
                                        $result_compliance = $compliance['introducation_iva_compliance_result'] + $compliance['vulnerability_iva_compliance_result'] + $compliance['fact_find_iva_compliance_result'] + $compliance['ie_iva_compliance_result'] + $compliance['iva_compliance_result'] + $compliance['confirmation_iva_compliance_result'];
                                        @endphp
                                    @else 
                                    @endif 
                                 @if(!empty($compliance['allData_iva_compliance']))
                                     @if($compliance['fail_introducation_iva_compliance'] > 0 || $compliance['fail_vulnerability_iva_compliance'] > 0 || $compliance['fail_fact_find_iva_compliance'] > 0 || $compliance['fail_ie_iva_compliance'] > 0 || $compliance['fail_compliance_iva'] > 0 || $compliance['fail_iva_confirmation_compliance'] > 0)  
                                     <div class="card-body text-center">
                                         <h1 class="text-center view_case_result_iva_compliance">45%</h1>
                                             <h6>
                                             <strong class="text-danger view_pass_fail_iva_compliance">
                                             Fail
                                             </strong>
                                             </h6>
                                     </div>
                                     @else 
                                            <div class="card-body text-center">
                                             <h1 class="text-center view_case_result_iva_compliance">@if(isset($result_compliance)) {{ $result_compliance }}% @else @endif</h1>
                                                 <h6>
                                                 
                                                 @if(!empty($result_compliance))
                                                 @if($result_compliance <= 45 || $result_compliance == 45)
                                                     </strong class="view_pass_fail_iva_compliance">Criticle Fail</strong>
                                                 @else
                                                     </strong class="view_pass_fail_iva_compliance">PASS</strong> 
                                                 @endif
         
                                                 @endif
                                                 
                                                 </h6>
                                            </div>

                                     @endif
                                    @else 
                                    <div class="card-body text-center">
                                        <h1 class="text-center "></h1>
                                            <h6>
                                                </strong class="text-danger"></strong>
                                            </h6>
                                    </div>
                                   
                                 @endif
                                 
                             @endif
                                  {{-- code for IVA Compliance code start here --}}


                                   {{-- code for IVA Compliance code start here --}}

                                @if($userInfo->zCaseType == 'submitted DMP' || $userInfo->zCaseType == 'Submitted DMP' || $userInfo->zCaseType == 'invoice' || $userInfo->zCaseType == 'Failed Compliance' || $loginUser->user_type == 11 || $loginUser->user_type == 9) 
                                    @if(!empty($compliance['allData_compliance']))
                                        <div class="plus-sign" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#compliance_data">
                                            <img src="{!! asset('images/icons/Plus_Icon@2x.png')!!}" alt="Add" width="30">
                                        </div>
                                    @endif
                                @endif
                                @if($userInfo->zCaseType == 'submitted IVA' || $userInfo->zCaseType == 'Submitted IVA'  || $userInfo->zCaseType == 'invoice' || $userInfo->zCaseType == 'Failed Compliance' || $loginUser->user_type == 11 || $loginUser->user_type == 9)
                                    @if(!empty($compliance['allData_iva_compliance']))
                                        <div class="plus-sign" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#compliance_iva_data">
                                            <img src="{!! asset('images/icons/Plus_Icon@2x.png')!!}" alt="Add" width="30">
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>

                          <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="card case_option">
                                <div class="card-title">
                                    DA Quality
                                </div>
                                @if(!empty($compliance['allData']))
                                    @php
                                    $result = $compliance['introduction_result'] + $compliance['vulnerability_result'] + $compliance['fact_find_result'] + $compliance['solution_result'] + $compliance['documentation_result'] + $compliance['confirmation_result'];
                                    @endphp
                                @else 
                                @endif
                                @if(!empty($compliance['allData']))
                                    @if($compliance['fail_introduction'] > 0 || $compliance['fail_vulnerability'] > 0 || $compliance['fail_fact_find'] > 0
                                    || $compliance['fail_solution'] > 0 || $compliance['fail_documentation'] > 0 || $compliance['fail_confirmation_sale'] > 0)
                                        <div class="card-body text-center">
                                            <h1 class="text-center view_case_result">45%</h1>
                                            <h6>
                                            <strong>
                                            FAIL
                                            </strong>
                                            </h6>
                                        </div>
                                    @else 
                                    <div class="card-body text-center">
                                    <h1 class="text-center view_case_result">@if(isset($result)) {{ $result }}% @else @endif</h1>
                                        <h6>
                                        
                                        @if(!empty($result))
                                           @if($result <= 45 || $result == 45)
                                            </strong class="text-danger view_pass_fail">Criticle Fail</strong>
                                           @else
                                            </strong class="text-success view_pass_fail">PASS</strong> 
                                           @endif

                                        @endif
                                        
                                        </h6>
                                    </div>
                                    @endif
                                @else 
                                    <div class="card-body text-center">
                                        <h1 class="text-center view_case_result"></h1>
                                        <h6>
                                        <strong class="view_pass_fail">
                                        
                                        </strong>
                                        </h6>
                                    </div>
                                @endif
                                <div class="plus-sign" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#D_A_quality">
                                    <img src="{!! asset('images/icons/Plus_Icon@2x.png')!!}" alt="Add" width="30">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ml--30" style="margin-top:350px;">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <form id="update_case_status_form" action="#" method="POST" class="display-ib">
                                            @csrf
                                        <input type="hidden" id="userId" name="userId" value="{{ $userInfo->user_id }}">
                                           
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"> 
                            <div class="buttons mt-4"> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="co-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    @include('user.right_sidebar_notes')
                </div>
                
            </div>
        </section>

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
                                            <div class="form-group">
                                                <div class="date-input">
                                                    <lable>Solution Type</lable>
                                                    @php
                                                    $IVA_selected = '';
                                                    $DMP_selected = '';
                                                    $ADMINISTRATION_ORDER_selected = '';
                                                    $TRUST_DEED_selected = '';
                                                    $BANKRIPTCY_selected = '';
                                                    $OTHER_selected = '';
                                                    @endphp
                                                    <select name="solution" id="solution" class="form-control" required>
                                                        @if($solution_data)
                                                        <option value="">{{$solution_data->solutionType}}</option>
                                                        @else
                                                        <option value="">Select Solution</option>
                                                        @endif
                                                        <option value="IVA" data-status="IVA">IVA</option>
                                                        <option value="DMP" data-status="DMP">DMP</option>
                                                        <option value="Administration Order" data-status="Administration Order">ADMINISTRATION ORDER</option>
                                                        <option value="TRUST DEED"data-status="TRUST DEED" >TRUST DEED</option>
                                                        <option value="BANKRIPTCY" data-status="BANKRIPTCY">BANKRIPTCY</option>
                                                        <option value="OTHER" data-status="OTHER">OTHER</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                 <lable>Insolvency</lable>
                                                <select name="insolvency" id="insolvency" class="form-control" required>
                                                     @if($solution_data)
                                                        <option value="">{{$solution_data->insolvency}}</option>
                                                        @else
                                                        <option value="">Select Insolvency Practitioner:</option>
                                                        @endif
                                                        <option value="ANCHORAGE CHAMBERS" data-status="ANCHORAGE CHAMBERS">ANCHORAGE CHAMBERS</option>
                                                        <option value="BENNETT JONES">BENNETT JONES</option>
                                                        <option value="CREDIT FIX" data-status="CREDIT FIX">CREDIT FIX</option>
                                                        <option value="WCF" data-status="CWF">CWF</option>
                                                        <option value="CARRINGTON DEAN">CARRINGTON DEAN</option>
                                                        <option value="DSS" data-status="DSS">DSS</option>
                                                        <option value="DEBT CHAMPION" data-status="DEBT CHAMPION">DEBT CHAMPION</option>
                                                        <option value="DEBT ADVISOR" data-status="DEBT ADVISOR">DEBT ADVISOR</option>
                                                        <option value="FOREST KING" data-status="FOREST KING">FOREST KING</option>
                                                        <option value="HANOVER" data-status="HANOVER">HANOVER</option>
                                                        <option value="JOHNSON GEDDES" data-status="JOHNSON GEDDES">JOHNSON GEDDES</option>
                                                        <option value="MCCAMBRIDGE DUFFY">MCCAMBRIDGE DUFFY</option>
                                                        <option value="OTHER insolvency" data-status="OTHER insolvency">OTHER INSOLVENCY</option>
                                                        <option value="REFRESH DEBT">REFRESH DEBT</option>
                                                        <option value="THE INSOLVENCY PRACTICE" data-status="THE INSOLVENCY PRACTICE">THE INSOLVENCY PRACTICE</option>
                                                        <option value="THE DEBT ADVICE SERVICE">THE DEBT ADVICE SERVICE</option>
                                                        <option value="THE IVA ADVISOR">THE IVA ADVISOR</option>
                                                        <option value="VANGUARD" data-status="VANGUARD">VANGUARD</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <lable>Monthly Payment</lable>
                                               <input type="text" id="monthly_payment"  value="@if($solution_data) {{$solution_data->payment}} @else '' @endif" class="form-control" placeholder="Monthly Payment:"/ required>
                                            </div>
                                            <div class="form-group">
                                                <lable>Start Date</lable>
                                                {{-- <div class="date-input" id="start_date"> --}}
                                                    <input class=" start_date form-control datepicker" type="text" id="start_date" value="{{ !empty($solution_data->startDate) ? date('d-m-Y', strtotime($solution_data->startDate)) : '' }}"  placeholder="Start Date:" required>
                                                {{-- </div> --}}
                                            </div>
                                            <div class="form-group">
                                                <lable>End Date</lable>
                                                {{-- <div class="date-input" id="end_date"> --}}
                                                    <input class="end_date form-control datepicker" type="text" id="end_date" value="{{ !empty($solution_data->endDate) ? date('d-m-Y', strtotime($solution_data->endDate)) : '' }}"  placeholder="End Date:" required>
                                                {{-- </div> --}}
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
        <!-- /solution_popup -->
        <!-- alert popup-->

        <!-- ./alert popup-->
        <!-- solution_popup -->
        <div
            id="account_popup"
            class="modal fade"
            tabindex="-1"
            role="dialog"
            aria-labelledby="my-modal-title"
            aria-hidden="true">
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
                                             <div class="form-group">
                                                 <lable>Solution Type</lable>
                                               <input type="text" id=""  class="form-control" value="@if($solution_data) {{$solution_data->solutionType}} @else @endif" readonly> 
                                            </div>
                                            <div class="form-group">
                                                <lable>Insolvency</lable>
                                                <input type="text" id="insolvency_data_account" class="form-control" value="@if($solution_data) {{$solution_data->insolvency}} @else @endif" readonly>
                                            </div>  
                                            <div class="form-group">
                                                <lable class="">Fee</lable>
                                                <div class="date-input">
                                                   <input  type="text" class="form-control" value="@if($account_data) {{$account_data->fee}} @else  @endif" id="fee" placeholder="Fee:" required="required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <lable class="add_require">Due Date</lable>
                                                {{-- <div class="date-input" id="due_date"> --}}
                                                   <input type="text" id="due_date" class="form-control datepicker" placeholder="Due Date:"/ value="{{ !empty($account_data->dueDate) ? date('d-m-Y', strtotime($account_data->dueDate)) : '' }}" required="required">
                                                {{-- </div> --}}
                                            </div>
                                            <div class="form-group">
                                                <lable>Clawback</lable>
                                                {{-- <div class="date-input" id="clawback"> --}}
                                                    <input type="text" id="clawback" class="form-control" placeholder="Claw Back:"  value="@if($account_data) {{$account_data->clawBack}} @else @endif" required="required">
                                                {{-- </div> --}}
                                            </div>
                                            <div class="form-group">
                                                <lable>Cancelled Date</lable>
                                                {{-- <div class="date-input" id="Cancelled_Date"> --}}
                                                     <input class="form-control datepicker" type="text" id="cancelled_date" placeholder="Cancelled Date:"  value="{{ !empty($account_data->cancelledDate) ? date('d-m-Y', strtotime($account_data->cancelledDate)) : '' }}" required="required">
                                                {{-- </div> --}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mb-5">
                       <a href="javascipt:void(0)" id="account_popup_submit" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#paid" class="btn btn-outline-success float-right btn-large">invoiced</a>
                    </div>
                </div>
            </div>
        </div>     


          {{-- compliance modal code start here --}}

          <div
          id="compliance_data"
          class="modal fade compliance_data D_A_quality"
          tabindex="-1"
          role="dialog"
          aria-hidden="true">
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
                                  <a class="nav-item nav-link" data-toggle="tab" href="#IE_compliance" role="tab">&nbsp;</a>
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
                                  @if(!empty($compliance['allData_compliance']))
                                        @php
                                        $result_compliance = $compliance['introducation_compliance_result'] + $compliance['vulnerability_compliance_result'] + $compliance['fact_find_compliance_result'] + $compliance['ie_compliance_result'] + $compliance['dmp_compliance_result'] + $compliance['confirmation_compliance_result'];
                                        @endphp
                                    @else 
                                    @endif
                                  <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                    @if(!empty($compliance['allData_compliance']))
                                    <div class="from-group">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="date_scored_get_compliance"
                                            value="@if(isset($result_compliance)) {{ $result_compliance }} % @else @endif"
                                            placeholder="Dade Scored:"
                                            name="Dade Scored">
                                    </div>
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
                                     {{-- {{ dd( $compliance['allData_compliance'] ) }} --}}
                              @if(!empty($compliance['allData_compliance']))
                                  @foreach($compliance['allData_compliance'] as $innerKey => $innerValue)
                                      @if($innerKey == 'introduction') 
                                          <div class="tab_dmp" id="{{$innerKey}}_compliance" style="display: block;">
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
                                                             
                                                              <select name="introducation" id="check{{ $notes_counter }}" class="form-control" required>
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
                                                                  id="note{{ $notes_counter }}_compliance"
                                                                  value = "{{ $innerDataValue->da_notes }}"
                                                                  name="{{ $innerDataValue->da_notes }}[]"
                                                                  class="form-control">
                                                          </td>
                                                      </tr>
                                                      @php $notes_counter++; @endphp
                                                      @endforeach
                                                  </table>
                                                    <h5 class="text-right">outcome for {{ $innerKey}}<span class="introducation_compliance_count"> {{   $compliance['introducation_compliance_count']  }}/ 100%</span>
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
                                                         
                                                          <td>{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                          
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
                                                                   value = "{{ $innerDataValue->da_notes }}"
                                                                  id="note{{ $notes_counter }}_compliance"
                                                                  name="{{ $innerDataValue->da_notes }}[]"
                                                                  class="form-control">
                                                          </td>
                                                      </tr>
                                                      @php $notes_counter++; @endphp
                                                      @endforeach
                                                  </table>
                                                  <h5 class="text-right">outcome for {{ $innerKey}}<span class="vulnerability_compliance_count">{{  $compliance['vulnerability_compliance_count']  }} % / 100%</span>
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
                                                            <td class="text-danger">
                                                            @if($innerDataValue->debt_details == "Minimum_debt_level_k_of_standard_debts_loans_credit_card_etc")
                                                                <!--manoj changes-->
                                                                <!--<td class="text-danger">-->
                                                                    Minimum debt level - £2k of standard debts (loans, credit card etc)
                                                                <!--</td>-->
                                                                <!--manoj changes-->
                                                            @endif  
                                                           
                                                            {{ str_replace('_','  ',$innerDataValue->debt_details) }}
                                                          @else 
                                                          </td>
                                                              <td>{{ str_replace('_','  ',$innerDataValue->debt_details) }}</td>
                                                          @endif
                                                          <td>
                                                              @php 
                                                                  $innerDataValue->debt_details = substr($innerDataValue->debt_details, 1, -1);
                                                              @endphp
                                                              <select name="fact_find" id="check{{ $notes_counter }}" class="form-control" required>
                                                                @if(isset($innerDataValue->is_passed))
                                                                    <option value="{{ $innerDataValue->is_passed }}">{{ $innerDataValue->is_passed }}</option>
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
                                                                   value = "{{ $innerDataValue->da_notes }}"
                                                                  id="note{{ $notes_counter }}_compliance"
                                                                  name="notes"
                                                                  class="form-control">
                                                          </td>
                                                      </tr>
                                                      @php $notes_counter++; @endphp
                                                      @endforeach
                                                  </table>
                                                  <h5 class="text-right">outcome for {{ $innerKey}}<span class="fact_find_compliance_count">{{  $compliance['fact_find_compliance_count']  }} % / 100%</span>
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
                                                                   value = "{{ $innerDataValue->da_notes }}"
                                                                  id="note{{ $notes_counter }}_compliance"
                                                                  name="{{ $innerDataValue->da_notes }}[]"
                                                                  class="form-control">
                                                          </td>
                                                      </tr>
                                                      @php $notes_counter++; @endphp
                                                      @endforeach
                                                  </table>
                                                  <h5 class="text-right">outcome for {{ $innerKey}}<span class="IE_compliance_count">{{  $compliance['ie_compliance_count']  }} % / 100%</span>
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
                                                                   value = "{{ $innerDataValue->da_notes }}"
                                                                  id="note{{ $notes_counter }}_compliance"
                                                                  name="{{ $innerDataValue->da_notes }}[]"
                                                                  class="form-control">
                                                          </td>
                                                      </tr>
                                                      @php $notes_counter++; @endphp
                                                      @endforeach
                                                  </table>
                                                  <h5 class="text-right">outcome for {{ $innerKey}}<span class="dmp_compliance_count">{{  $compliance['dmp_compliance_count']  }} % / 100%</span>
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
                                                                   value = "{{ $innerDataValue->da_notes }}"
                                                                  id="note{{ $notes_counter }}_compliance"
                                                                  name="{{ $innerDataValue->da_notes }}[]"
                                                                  class="form-control">
                                                          </td>
                                                      </tr>
                                                      @php $notes_counter++; @endphp
                                                      @endforeach
                                                  </table>
                                                  <h5 class="text-right">outcome for {{ $innerKey}}<span class="confirmation_compliance_count">{{  $compliance['confirmation_compliance_count']  }} % / 100%</span>
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
                                                  @foreach($compliance['introuduction_question'] as $key => $value) @foreach($value as
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
                                                  @foreach($compliance['vulnerability_question'] as $key => $value) @foreach($value as
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
                                                          <select name="{{ $key }}" id="check{{  $notes_counter }}" class="form-control" required>
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
                                                      
                                                  @foreach($compliance['fact_find_question'] as $key => $value) @foreach($value as
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
                                                                <h4 class="mb-0 text-danger">Minimum debt level - £2k of standard debts (loans, credit card etc)</h4>
                                                            @endif
                                                              <h4 class="mb-0 text-danger">{{ str_replace('_','  ',$key) }}</h4>
                                                          </td>
                                                          @else
                                                          <td>
                                                              <h4 class="mb-0">{{ str_replace('_','  ',$key) }}</h4>
                                                          </td>
                                                          @endif
                                                          <td>
                                                              <select name="{{ $key }}" id="check{{  $notes_counter }}" class="form-control" required>
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
                                                  @foreach($compliance['IE_question'] as $key => $value) @foreach($value as
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
                                                              <select name="{{ $key }}" id="check{{  $notes_counter }}" class="form-control" required>
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
                                  <div class="tab_dmp" id="DMP_compliance" >
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
                                                  @foreach($compliance['dmp_question'] as $key => $value) @foreach($value as
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
                                                             
                                                              <select name="{{ $key }}" id="check{{  $notes_counter }}" class="form-control" required>
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
                                                  @foreach($compliance['confirmation_question'] as $key => $value) @foreach($value as
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
                                                              <select name="{{ $key }}" id="check{{  $notes_counter }}" class="form-control" required>
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

                              @if(!empty($compliance['allData_compliance']))
                                  @php
                                      $result_compliance = $compliance['introducation_compliance_result'] + $compliance['vulnerability_compliance_result'] + $compliance['fact_find_compliance_result'] + $compliance['ie_compliance_result'] + $compliance['dmp_compliance_result'] + $compliance['confirmation_compliance_result'];
                                      
                                  @endphp
                               @else 

                              @endif
                              <div class="tab_dmp" id="score_compliance">
                                  <div class="row">
                                      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                          @if(!(empty($compliance['allData_compliance'])))
                                          <div class="row">
                                              <div class="col-6">
                                                  <h5>overall</h5>
                                                      @php
                                                          $fail = 45; 
                                                      @endphp
      
                                                      @if($compliance['fail_introducation_compliance'] > 0 || $compliance['fail_vulnerability_compliance'] > 0 || $compliance['fail_fact_find_compliance'] > 0 || $compliance['fail_ie_compliance'] > 0 || $compliance['fail_compliance_dmp'] > 0 || $compliance['fail_confirmation_compliance'] > 0)
      
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
                                                  @if($compliance['fail_introducation_compliance'] > 0 || $compliance['fail_vulnerability_compliance'] > 0|| $compliance['fail_fact_find_compliance'] > 0 || $compliance['fail_ie_compliance'] > 0 || $compliance['fail_compliance_dmp'] > 0 || $compliance['fail_confirmation_compliance'] > 0)
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
                                                 
                                                  <h1 class="view_case_result_compliance text-success"></h1>
                                                          
                                              </div>
                                              <div class="col-6">
                                                  
                                                  <h6>Result</h6>
                                                  <h5 class="view_pass_fail_compliance"></h5>
                                                           
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
                                              <textarea name="critical_fail_detail" id="critical_fail_detail_dmp" 
                                                value = ""
                                              placeholder="N/A" class="form-control critical_textarea">
                                                @if(isset($criticle_detail)) {{ $criticle_detail }} @else  @endif
                                              </textarea>
                                          </div>
                                      </div>
                                      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                          <div class="form-group">
                                          <h5 class="mb-3">Feedback declaration</h5>    
                                              <textarea name="feedback_dec" id="feedback_dec_dmp" 
                                                value=""
                                              placeholder="Notes:" class="form-control feedbacktextarea">
                                                  @if(isset($feedback)) {{ $feedback }} @else @endif
                                              </textarea>
                                          </div>
                                      </div>
                                  </div>
                              </div>
      
                              {{-- New code end here --}}
                               <div class="tab_dmp" id="button_compliance" style="display: block;">
                                  <div class="modal-footer mb-4 mt-4">
                                      <div class="buttons d-flex justify-content-end float-right">
                                          <button
                                          type="submit"
                                          id="prev_compliance_dmp"
                                          name="prev_da_compliance"
                                          class=" btn btn-bordered-primary run_compliance  bg-none"
                                          value="Prev"
                                          onclick="nextPrevDmp(-1); return false;">Prev
                                          </button>
                                          <button
                                          type="submit"
                                          id="next_compliance_dmp"
                                          name="next_da_compliance"
                                          class=" btn btn-bordered-primary run_compliance  bg-none"
                                          value="Next"
                                          onclick="nextPrevDmp(1); return false;">Next
                                         </button>
                                          <a href="" id="get_id_view_case" class="btn btn-bordered-primary">View Case</a>
                                      </div>
                                  </div>
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
                                      @if(!empty($compliance['allData_iva_compliance']))

                                        @php
                                        $result_iva_compliance = $compliance['introducation_iva_compliance_result'] + $compliance['vulnerability_iva_compliance_result'] + $compliance['fact_find_iva_compliance_result'] + $compliance['ie_iva_compliance_result'] + $compliance['iva_compliance_result'] + $compliance['confirmation_iva_compliance_result'];

                                        @endphp

                                        @else 

                                        @endif 
                                        
                                        <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                            @if(!empty($compliance['allData_iva_compliance']))
                                                @if($compliance['fail_introducation_iva_compliance'] > 0 || $compliance['fail_vulnerability_iva_compliance'] > 0 || $compliance['fail_fact_find_iva_compliance'] > 0 || $compliance['fail_ie_iva_compliance'] > 0 || $compliance['fail_compliance_iva'] > 0 || $compliance['fail_iva_confirmation_compliance'] > 0)
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
                              @if(!empty($compliance['allData_iva_compliance']))
                                  @foreach($compliance['allData_iva_compliance'] as $innerKey => $innerValue)
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
                                                              <select name="#" id="check_iva{{ $notes_counter }}" class="form-control" required>
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
                                                                   value = "{{ $innerDataValue->da_notes }}"
                                                                  id="note{{ $notes_counter }}_iva_compliance"
                                                                  name="[]"
                                                                  class="form-control">
                                                          </td>
                                                      </tr>
                                                      @php $notes_counter++; @endphp
                                                      @endforeach
                                                  </table>
                                                  <h5 class="text-right">outcome for {{ $innerKey}}<span class="introducation_iva_compliance_count">{{ $compliance['introducation_iva_compliance_count'] }} % / 100%</span>
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
                                                              <select name="#" id="check_iva{{ $notes_counter }}" class="form-control" required>
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
                                                                   value = "{{ $innerDataValue->da_notes }}"
                                                                  id="note{{ $notes_counter }}_iva_compliance"
                                                                  name="[]"
                                                                  class="form-control">
                                                          </td>
                                                      </tr>
                                                      @php $notes_counter++; @endphp
                                                      @endforeach
                                                  </table>
                                                  <h5 class="text-right">outcome for {{ $innerKey}}<span class="vulnerability_iva_compliance_count">{{ $compliance['vulnerability_iva_compliance_count'] }} % / 100%</span>
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
                                                              <select name="#" id="check_iva{{ $notes_counter }}" class="form-control" required>
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
                                                                   value = "{{ $innerDataValue->da_notes }}"
                                                                  id="note{{ $notes_counter }}_iva_compliance"
                                                                  name="[]"
                                                                  class="form-control">
                                                          </td>
                                                      </tr>
                                                      @php $notes_counter++; @endphp
                                                      @endforeach
                                                  </table>
                                                  <h5 class="text-right">outcome for {{ $innerKey}}<span class="fact_find_iva_compliance_count">{{ $compliance['fact_find_iva_compliance_count'] }} % / 100%</span>
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
                                                              <select name="#" id="check_iva{{ $notes_counter }}" class="form-control" required>
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
                                                                   value = "{{ $innerDataValue->da_notes }}"
                                                                  id="note{{ $notes_counter }}_iva_compliance"
                                                                  name="[]"
                                                                  class="form-control">
                                                          </td>
                                                      </tr>
                                                      @php $notes_counter++; @endphp
                                                      @endforeach
                                                  </table>
                                                  <h5 class="text-right">outcome for {{ $innerKey}}<span class="ie_iva_compliance_count">{{ $compliance['ie_iva_compliance_count'] }} % / 100%</span>
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
                                                              <select name="#" id="check_iva{{ $notes_counter }}" class="form-control" required>
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
                                                                   value = "{{ $innerDataValue->da_notes }}"
                                                                  id="note{{ $notes_counter }}_iva_compliance"
                                                                  name="[]"
                                                                  class="form-control">
                                                          </td>
                                                      </tr>
                                                      @php $notes_counter++; @endphp
                                                      @endforeach
                                                  </table>
                                                  <h5 class="text-right">outcome for {{ $innerKey}}<span class="iva_compliance_count">{{ $compliance['iva_compliance_count'] }} % / 100%</span>
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
                                                              <select name="#" id="check_iva{{ $notes_counter }}" class="form-control" required>
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
                                                                   value = "{{ $innerDataValue->da_notes }}"
                                                                  id="note{{ $notes_counter }}_iva_compliance"
                                                                  name="[]"
                                                                  class="form-control">
                                                          </td>
                                                      </tr>
                                                      @php $notes_counter++; @endphp
                                                      @endforeach
                                                  </table>
                                                  <h5 class="text-right">outcome for {{ $innerKey}}<span class="confirmation_iva_compliance_count">{{ $compliance['confirmation_iva_compliance_count'] }} % / 100%</span>
                                                  </h5>
                                              </div>
                                          </div>
                                      @endif

                                  @endforeach
                              @else
      
                                  <div class="tab_iva" id="introduction_iva_compliance">
                                      <div class="text-primary font-14">
                                          <div class="text-primary">
                                              <h5>
                                                  <strong>introduction</strong>
                                              </h5>
                                             
                                              <table class="table mb-0 text-left text-primary t-cell-middle">
                                                  <input type="hidden" name="debt_type" id="iva_compliance1" value="introduction">
                                                  @foreach($compliance['introuduction_compliance_question'] as $key => $value)
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
                                                  @foreach($compliance['vulnerability_compliance_question'] as $key => $value)
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
                                                  @foreach($compliance['fact_find_compliance_question'] as $key => $value)
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
                                                  @foreach($compliance['IE_compliance_question'] as $key => $value)
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
                                                  @foreach($compliance['iva_compliance_question'] as $key => $value)
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
                                                  @foreach($compliance['confirmation_compliance_question'] as $key => $value)
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
      
                              @if(!empty($compliance['allData_iva_compliance']))
                              @php
                                  $result_iva_compliance = $compliance['introducation_iva_compliance_result'] + $compliance['vulnerability_iva_compliance_result'] + $compliance['fact_find_iva_compliance_result'] + $compliance['ie_iva_compliance_result'] + $compliance['iva_compliance_result'] + $compliance['confirmation_iva_compliance_result'];
                                  
                              @endphp
                              @else 
      
                              @endif
                              <div class="tab_iva" id="score_iva_compliance">
                                  <div class="row">
                                      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                          @if(!(empty($compliance['allData_iva_compliance'])))
                                          <div class="row">
                                              <div class="col-6">
                                                  <h5>overall</h5>
                                                      @php
                                                          $fail = 45; 
                                                      @endphp
      
                                                      @if($compliance['fail_introducation_iva_compliance'] > 0 || $compliance['fail_vulnerability_iva_compliance'] > 0 || $compliance['fail_fact_find_iva_compliance'] > 0 || $compliance['fail_ie_iva_compliance'] > 0 || $compliance['fail_compliance_iva'] > 0 || $compliance['fail_iva_confirmation_compliance'] > 0)
      
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
                                                  @if($compliance['fail_introducation_iva_compliance'] > 0 || $compliance['fail_vulnerability_iva_compliance'] > 0 || $compliance['fail_fact_find_iva_compliance'] > 0 || $compliance['fail_ie_iva_compliance'] > 0 || $compliance['fail_compliance_iva'] > 0 || $compliance['fail_iva_confirmation_compliance'] > 0)
    
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
                                   <div class="tab_iva" id="button_iva_compliance" style="display: block;">
                                  <div class="modal-footer mb-4 mt-4">
                                      <div class="buttons d-flex justify-content-end float-right">
                                          <input type="submit" id="prev_compliance_iva" name="prev_da_compliance" class="btn btn-bordered-primary run_compliance_iva bg-none" value="Prev" onclick="nextPrevIva(-1); return false;">
                                            <input type="submit" id="next_compliance_iva" name="next_da_compliance" class="btn btn-bordered-primary run_compliance_iva bg-none" value="Next" onclick="nextPrevIva(1); return false;">
                                            <a href="" id="get_id_view_case" class="btn btn-bordered-primary">View Case</a>
                            
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
      

      {{-- iva compliance code end here --}}

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
                                @if(!empty($compliance['allData']))
                                    @php
                                    $result = $compliance['introduction_result'] + $compliance['vulnerability_result'] + $compliance['fact_find_result'] + $compliance['solution_result'] + $compliance['documentation_result'] + $compliance['confirmation_result'];
                                    @endphp
                                @else 
                                @endif
                                <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                    @if(!empty($compliance['allData']))
                                         @if($compliance['fail_introduction'] > 0 || $compliance['fail_vulnerability'] > 0 || $compliance['fail_fact_find'] > 0
                                        || $compliance['fail_solution'] > 0 || $compliance['fail_documentation'] > 0 || $compliance['fail_confirmation_sale'] > 0)
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
                            @if(!empty($compliance['allData']))
                                @foreach($compliance['allData'] as $innerKey => $innerValue)
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
                                                             value = "{{ $innerDataValue->da_notes }}"
                                                            id="note{{ $notes_counter }}"
                                                            name="{{ $innerDataValue->da_notes }}[]"
                                                            class="form-control">
                                                    </td>
                                                </tr>
                                                @php $notes_counter++; @endphp
                                                @endforeach
                                            </table>
                                            <h5 class="text-right">outcome for {{ $innerKey}}<span class="introducation_count">{{ $compliance['introduction_count'] }} % / 100%</span>
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
                                                             value = "{{ $innerDataValue->da_notes }}"
                                                            name="{{ $innerDataValue->da_notes }}[]"
                                                            class="form-control">
                                                    </td>
                                                </tr>
                                                @php $notes_counter++; @endphp
                                                @endforeach
                                            </table>
                                            <h5 class="text-right">outcome for {{ $innerKey}}<span class="vulnerability_count">{{ $compliance['vulnerability_count'] }} % / 100%</span>
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
                                                             value = "{{ $innerDataValue->da_notes }}"
                                                            name="{{ $innerDataValue->da_notes }}[]"
                                                            class="form-control">
                                                    </td>
                                                </tr>
                                                @php $notes_counter++; @endphp
                                                @endforeach
                                            </table>
                                            <h5 class="text-right">outcome for {{ $innerKey}}<span class="fact_find_count">{{ round($compliance['fact_find_count']) }} % / 100%</span>
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
                                                             value = "{{ $innerDataValue->da_notes }}"
                                                            name="{{ $innerDataValue->da_notes }}[]"
                                                            class="form-control">
                                                    </td>
                                                </tr>
                                                @php $notes_counter++; @endphp
                                                @endforeach
                                            </table>
                                            <h5 class="text-right">outcome for {{ $innerKey}}<span class="solution_count">{{ $compliance['solution_count'] }} % / 100%</span>
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
                                                             value = "{{ $innerDataValue->da_notes }}"
                                                            name="{{ $innerDataValue->da_notes }}[]"
                                                            class="form-control">
                                                    </td>
                                                </tr>
                                                @php $notes_counter++; @endphp
                                                @endforeach
                                            </table>
                                            <h5 class="text-right">outcome for {{ $innerKey}}<span class="documentation_count">{{ $compliance['documentation_total'] }} % / 100%</span>
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
                                                             value = "{{ $innerDataValue->da_notes }}"
                                                            id="note{{ $notes_counter }}"
                                                            name="{{ $innerDataValue->da_notes }}[]"
                                                            class="form-control">
                                                    </td>
                                                </tr>
                                                @php $notes_counter++; @endphp
                                                @endforeach
                                            </table>
                                            <h5 class="text-right">outcome for {{ $innerKey}}<span class="confirmation_count">{{ $compliance['confirmation_count'] }} % / 100%</span>
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
                                                @foreach($compliance['da_introducation'] as $key => $value) @foreach($value as
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
                                                @foreach($compliance['da_vulnerability'] as $key => $value) @foreach($value as
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
                                                @foreach($compliance['da_fact_find'] as $key => $value) @foreach($value as
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
                                                @foreach($compliance['da_solution'] as $key => $value) @foreach($value as
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
                                                @foreach($compliance['da_documentation'] as $key => $value) @foreach($value as
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
                                                @foreach($compliance['da_confirmation'] as $key => $value) @foreach($value as
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

                            @if(!(empty($compliance['allData'])))
                                @php
                                    $result = $compliance['introduction_result'] + $compliance['vulnerability_result'] + $compliance['fact_find_result'] + $compliance['solution_result'] + $compliance['documentation_result'] + $compliance['confirmation_result'];
                                @endphp
                            @else 
                            @endif
                            <div class="tab_da" id="score">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        @if(!(empty($compliance['allData'])))
                                        <div class="row">
                                            <div class="col-6">
                                                <h5>overall</h5>
                                                    @php
                                                        $fail = 45; 
                                                    @endphp
    
                                                        @if($compliance['fail_introduction'] > 0 || $compliance['fail_vulnerability'] > 0 || $compliance['fail_fact_find'] > 0
                                                            || $compliance['fail_solution'] > 0 || $compliance['fail_documentation'] > 0 || $compliance['fail_confirmation_sale'] > 0)
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
                                                @if($compliance['fail_introduction'] > 0 || $compliance['fail_vulnerability'] > 0 || $compliance['fail_fact_find'] > 0
                                                        || $compliance['fail_solution'] > 0 || $compliance['fail_documentation'] > 0 || $compliance['fail_confirmation_sale'] > 0)
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
                            <div class="tab_da" id="button_da" style="display:block;">
                            <div class="modal-footer mb-4 mt-4">
                                <div class="buttons d-flex justify-content-end float-right">
                                    <button
                                        type="submit"
                                        name="#"
                                        id="prev_da"
                                        class=" btn btn-bordered-primary run_da  bg-none"
                                        value="Prev"
                                        onclick="nextPrevDa(-1);return false;"
                                        >Prev
                                    </button>
                                    <button
                                        type="submit"
                                        name="#"
                                        id="next_da"
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
      
        
      
        <!-- /solution_popup -->
        <div id="Sent_To_DMP_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content card card-secondary">
                    <div class="modal-header">
                        <div class="card-title">send to DMP Provider</div>
                        {{-- <input type="hidden" name="send_to_ip" id="send_to_ip" value="Sent to IP">  --}}
                        <button type="button" class="close alert_open" aria-label="Close">
                            <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                        </button>
                    </div>
                    <div class="modal-body text-primary sent_dmp" style="padding:0px 20px;">
                        <p>Check Case is Eligible
                            <input type="checkbox" id="Eligible" class="selectall">
                            <label for="Eligible"></label>
                        </p>
                        <p>
                            Call And Transfer Customer
                            <input type="checkbox" id="Customer">
                            <label for="Customer"></label>
                        </p>
                        <p class="d-flex justify-content-between">
                           Send E-Mail
                            <span>
                                <input type="submit" name="submit" class="btn btn-outline-info" value="SEND MAIL" style="margin-right: 10px;margin-top: -8px;">
                                <input type="checkbox" id="email">
                                <label for="wage_slip"></label>
                            </span>
                        </p>
                        
                    </div>
                    <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
                        <a href="javascipt:void(0)" id="btn_hide" class=" send_dmp btn btn-outline-info" style="padding: 6px 30px;" data-dismiss="modal">Send</a>
                    </div>
                </div>
            </div>
        </div>

        
    {{-- compliance modal code start here --}}


    
    {{-- compliance modal code end here --}}
     

        <div id="Sent_To_IVA_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content card card-secondary">
                    <div class="modal-header">
                        <div class="card-title">IVA checklist</div>
                        {{-- <input type="hidden" name="send_to_ip" id="send_to_ip" value="Sent to IP">  --}}
                        <button type="button" class="close alert_open" aria-label="Close">
                            <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                        </button>
                    </div>
                    <div class="modal-body text-primary sent_iva" style="padding:0px 20px;">
                        <p>Personal Detail
                            <input type="checkbox" id="personal_detail" class="selectall">
                            <label for="personal_detail"></label>
                        </p>
                        <p>
                            Employed
                            <input type="checkbox" id="employed">
                            <label for="employed"></label>
                        </p>
                        <p>
                            Living Arrangments
                            <input type="checkbox" id="living_arrangments">
                            <label for="living_arrangments"></label>
                        </p>
                        <p>
                            Kids
                            <input type="checkbox" id="kids">
                            <label for="kids"></label>
                        </p>
                        <p>
                            Drive (Car Finance)
                            <input type="checkbox" id="car_finance">
                            <label for="car_finance"></label>
                        </p>
                        <p>
                            Income
                            <input type="checkbox" id="IVA_income">
                            <label for="IVA_income"></label>
                        </p>
                        <p>
                            Creditor Debts Higher Then &#163; 5,000
                            <input type="checkbox" id="IVA_benifits">
                            <label for="IVA_benifits"></label>
                        </p>
                        <p>
                            Evidence
                            <input type="checkbox" id="evidence">
                            <label for="evidence"></label>
                        </p>
                        <p>
                            Assets
                            <input type="checkbox" id="assets">
                            <label for="assets"></label>
                        </p>
                        <p>
                            Credit Search Detail
                            <input type="checkbox" id="IVA_Credit_search">
                            <label for="IVA_Credit_search"></label>
                        </p>
                        <p>
                           Customer Has Agreed To This Debts Solution
                            <input type="checkbox" id="IVA_customer">
                            <label for="IVA_customer"></label>
                        </p>
                    </div>
                    <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
                        <a href="javascipt:void(0)" id="btn_hide" class="send_iva btn btn-outline-info" style="padding: 6px 30px;" data-dismiss="modal">Send</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="Sent_To_DMP_team_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
           <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
               <div class="modal-content card card-secondary">
                   <div class="modal-header">
                       <div class="card-title">DMP Checklist</div>
                       <input type="hidden" name="send_dmp_team" value="Sent to DMP" id="send_dmp_team">
                       {{-- <input type="hidden" name="send_to_ip" id="send_to_ip" value="Sent to IP">  --}}
                       <button type="button" class="close alert_open" aria-label="Close">
                           <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                       </button>
                   </div>
                   <div class="modal-body text-primary sent_iva" style="padding:0px 20px;">
                       <p>Personal Detail
                           <input type="checkbox" id="DMP_team_personal_detail" class="selectall">
                           <label for="DMP_team_personal_detail"></label>
                       </p>
                       <p>
                           Employed
                           <input type="checkbox" id="DMP_team_employed">
                           <label for="DMP_team_employed"></label>
                       </p>
                       <p>
                           Living Arrangments
                           <input type="checkbox" id="DMP_team_living_arrangments">
                           <label for="DMP_team_living_arrangments"></label>
                       </p>
                       <p>
                           Kids
                           <input type="checkbox" id="DMP_team_kids">
                           <label for="DMP_team_kids"></label>
                       </p>
                       <p>
                           Drive (Car Finance)
                           <input type="checkbox" id="DMP_team_car_finance">
                           <label for="DMP_team_car_finance"></label>
                       </p>
                       <p>
                           Income &#163;800 or above
                           <input type="checkbox" id="DMP_team_income">
                           <label for="DMP_team_income"></label>
                       </p>
                       <p>
                           Creditor Debts Higher Then &#163; 2,000
                           <input type="checkbox" id="DMP_team_benifits">
                           <label for="DMP_team_benifits"></label>
                       </p>
                       <p>
                          Customer Has Agreed To This Debts Solution
                           <input type="checkbox" id="DMP_team_Customer">
                           <label for="DMP_team_Customer"></label>
                       </p>
                   </div>
                   <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
                       <a href="javascipt:void(0)" id="btn_hide" class="send_dmp_team btn btn-outline-info" style="padding: 6px 30px;" data-dismiss="modal">Send</a>
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
    dateFormat: 'dd-mm-yy',
    yearRange: '1950:2040', 
    beforeShow: function (input, inst) {
        var rect = input.getBoundingClientRect();
        setTimeout(function () {
            inst.dpDiv.css({ top: rect.top + 40, left: rect.left + 0 });
        }, 0);
    }
});
});
var checkboxes = $("#Sent_To_IVA_Modal input,#Sent_To_DMP_team_Modal input,#Sent_To_DMP_Modal input");
var button = $("#Sent_To_IVA_Modal .modal-footer .btn,#Sent_To_DMP_team_Modal .modal-footer .btn,#Sent_To_DMP_Modal .modal-footer .btn")
button.hide();
checkboxes.on("click", function () {
    button.attr("disabled", checkboxes.is(":not(:checked)"));
    if(checkboxes.is(":not(:checked)")){
        button.show()
    }
})


</script>

<script type="text/javascript">
    //update ZcaseType success message fade out code here
    $(document).ready(function(){
        setTimeout(function() {
        $('#successMessage').fadeOut('fast');
            }, 3000); 
    });

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
            document.getElementById('countdown2').innerHTML = timestamp.getHours() + 'h:' + timestamp.getMinutes() + 'm:' + timestamp.getSeconds() + 's';
        }, Math.abs(interval) * 1000);
    // Timer code end
</script>
<script>
            // $("#start_date input").datepicker({});
    $(".dropdown-menu li a").click(function () {
        var selText = $(this).text();
            $(this).parents('.date-input').find('input').attr("placeholder", selText);
            });
            $("#start_date input").datepicker();
            $("#end_date input").datepicker();
            $("#due_date input").datepicker();
            $("#Cancelled_Date input").datepicker();
 </script>

<script type="text/javascript">
    $(document).ready(function() {
       $(document).on('click','.case_status-change',function(e){
           e.preventDefault();
             var case_status_name=$(this).text();

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
</script>

<script type="text/javascript">
    $('.selectall').click(function() {
    if ($(this).is(':checked')) {
        $('.sent_ip input').attr('checked', true);
    } else {
        $('div input').attr('checked', false);
    }
});
</script>



<script type="text/javascript">
    $(document).on('click','.send_iva',function(e){
            e.preventDefault();

            var userId = $('#userId').val();
            
            var checkbox = [];
            $('.selectall').each(function(){
               if($(this).is(':checked'))
               {
                   checkbox.push($(this).val());
               }
            });
            var case_status = $('#SENT_TO_IVA').val();
            alert(case_status);

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
                                    var message = 'Data save succesfully';
                                     var messageIcon = 'success';
                                } else if(data == 'success case') {
                                    var message = 'Case Assing succesfully';
                                    var messageIcon = 'success';
                                    $('#Sent_To_IVA_Modal').modal('hide');
                                    $('#send_iva_modal').modal('show');
                                }
                                else{
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

    $(document).on('click','#soluton_form',function(e){
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
                       location.reload();

                    
                }
        });
});

</script>

<script type="text/javascript">
  
$(".dropdown-menu select option").click(function () {
    var selText = $(this).text();
    $(this).parents('.date-input').find('input').attr("placeholder", selText);
});


    $(document).on('click','#account_popup_submit',function(e){
        e.preventDefault();

        var userId = $('#userId').val();
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
                 if (data == 'RequiredDueDate') {
                    var message = 'Due date is required';
                } else if (data == 'success') {
                    var message = 'Data Save Successfully';
                    var messageIcon = 'success';
                    window.location = '{{ URL::to('/user') }}';
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

$('.save_appointment').click(function(){

    var userId = $('#calender_userId').val();
    var userName = $("#calender_userName").val();      
    var caseStatus = $('#case_status_reminder').val();  
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

</script>

<script type="text/javascript">
   $(document).on('click','.send_dmp_team',function(e){
   
                
           e.preventDefault();

          var userId = $('#calender_userId').val();
          alert(userId);
          var case_status = $('#send_dmp_team').val();
          alert(case_status);
          
           var checkbox = [];
            $('.dmp_team_selectall').each(function(){
               if($(this).is(':checked'))
               {
                   checkbox.push($(this).val());
               }
            });
         
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
                            if(data == 'success_case') {
                                      var message = 'something wrong please try again';
                                }
                                else{
                                    var message = 'Case Assing succesfully';
                                    var messageIcon = 'success';
                                  
                                }
                                swal(message, {
                                icon: messageIcon,
                                });
                  
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

        $('#data_of_call').val(output);

    });
</script>

    
<script>
    jQuery('body').on('click', '#nextpage', function () {
        var next = jQuery('.nav-tabs .nav-item.active').next('.nav-item');
        if (next.length) {
            next.trigger('click')
        }
    });
    jQuery('body').on('click', '#next_da', function () {
        var next = jQuery('.nav-tabs .nav-item.active').next('.nav-item');
        if (next.length) {
            next.trigger('click');
        }
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

<script type="text/javascript">
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

        if(is_passed16 == '' || is_passed16 == null){
            is_passed16 = null;
        }

        var critical_fail_detail = $('#critical_fail_detail_dmp').val();
        var feedback = $('#feedback_dec_dmp').val();

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
        console.log(currentActiveTab);
          var addClassForSubmit = document.getElementsByClassName('run_compliance');
            var nextClassSubmit = addClassForSubmit[1];
        
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
        // prev_compliance_iva
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
    

    {{-- add code for Da Qaulity code start here --}}

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
          
          // Exit the function if any field in the current tab is invalid:
          if (n == 1 && !validateFormDa()) return false;
          
          //add class for list slide form submit
            currentActiveTab = x[currentTab].attributes[1];
             var addClassForSubmit = document.getElementsByClassName('run_da');
                var nextClassSubmit = addClassForSubmit[1];
                console.log(nextClassSubmit);
            // prev_da
            if(currentActiveTab.value == `confirmation`) {
                
                // nextClassSubmit.addClass('submit_form_compliance');
                nextClassSubmit.classList.add('submit_form');
                document.getElementById("prev_da").style.display = "none";
                document.getElementById("next_da").style.display = "none";
            }else{
                nextClassSubmit.classList.remove('submit_form');
                document.getElementById("next_da").style.display = "block";
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

@endsection

