<style>
.card-body p{
    font-size:14px;
}
.ft20{
    font-size : 20px;
}
@media(min-width : 1700px){
  .ft20{
        font-size : 25px;
    }
}
</style>


    <div id="app">
        <main class="py-4 text-capitalize" style="padding-top: 0px !important;">
            <main class="main-content manager-dashboard">
                <!-- header -->
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                        <div class="row mt--100">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6  p-0">
                                <div class="main-title">
                                    <h1 class="font-h1">
                                             @php $loginUserData = Auth::user();
                                                unset($loginUserData->password);
                                                $loginUser = $loginUserData;
                                                @endphp
                                                 @if($loginUser->user_type == 8)
                                    <strong>{{ $loginUser->name }}'s Workflow</strong>
                                        @endif
                                        
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / header -->
                <section class="card-section">
                    <!-- case view -->
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="row ml--30 mr-0">
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-5" style="padding-right: 75px;">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="card section-height-auto height-auto">
                                                <div class="card-title text-center ft20">
                                                    Completed App
                                                </div>
                                                <div class="card-body text-center">
                                                                @php
                                                    //$data = ReviewCompletedData();
                                                    $totalCompletedCount = (isset($allCasesCount['totalCompletedCount']) && !empty($allCasesCount['totalCompletedCount'])) ? $allCasesCount['totalCompletedCount'] : 0;
                                                    
                                                    @endphp
                                                    <a
                                                        href="javascript:void(0)"
                                                        class="statistics columnAjax  d-block"
                                                        data-type="COMPLETED APPLICATION">
                                                        <h1 class="text-center height-auto line-height-auto">
                                                            {{ $totalCompletedCount }}
                                                        </h1>
                                                    </a>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="card section-height-auto height-auto">
                                                <div class="card-title text-center ft20">
                                                    Registered
                                                </div>
                                                <div class="card-body text-center">
                                                                @php
                                                    //$data = ReviewCompletedData();
                                                    $totalRegisterCount = (isset($allCasesCount['totalRegisterCount']) && !empty($allCasesCount['totalRegisterCount'])) ? $allCasesCount['totalRegisterCount'] : 0;
                                                    @endphp
                                                    <a
                                                        href="javascript:void(0)"
                                                        class="statistics columnAjax  d-block"
                                                        data-type="QUICK REVIEW">
                                                        <h1 class="text-center height-auto line-height-auto">
                                                            {{ $totalRegisterCount }}
                                                        </h1>
                                                    </a>
                                                    <button class="download btn btn-outline-info" data-toggle="modal" data-target="#download_modal" data-backdrop="static" data-keyboard="false">
                                                        Send SMS  
                                                    </button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-4">
                                            <div class="card section-height-auto height-auto">
                                                <div class="card-title text-center">
                                                    Day 1
                                                </div>
                                                <div class="card-body text-center">
                                                    <a
                                                        href="javascript:void(0)"
                                                        class="statistics columnAjax d-block"
                                                        data-type="messageday1">
                                                        <h1 class="text-center height-auto line-height-auto">
                                                            {{ (isset($allCasesCount['totalMessageDay1Count']) && !empty($allCasesCount['totalMessageDay1Count'])) ? $allCasesCount['totalMessageDay1Count'] : 0 }}
                                                        </h1>
                                                    </a>
                                                     <button class="download btn btn-outline-info" data-toggle="modal" data-target="#download_modal" data-backdrop="static" data-keyboard="false">
                                                        Send SMS  
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3" style="margin-left: -65px;">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="card section-height-auto height-auto">
                                                <div class="card-title text-center">
                                                    Day 2
                                                </div>
                                                <div class="card-body text-center">
                                                    <a
                                                        href="javascript:void(0)"
                                                        class="statistics columnAjax  d-block"
                                                        data-type="messageday2">
                                                         <h1 class="text-center">
                                             {{ (isset($allCasesCount['totalMessageDay2Count']) && !empty($allCasesCount['totalMessageDay2Count'])) ? $allCasesCount['totalMessageDay2Count'] : 0 }}
                                         </h1>
                                                    </a>
                                                     <button class="download btn btn-outline-info" data-toggle="modal" data-target="#download_modal" data-backdrop="static" data-keyboard="false">
                                                        Next
                                                    </button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card section-height-auto height-auto">
                                                <div class="card-title text-center">
                                                    Day 3
                                                </div>
                                                <div class="card-body text-center">
                                                    <a
                                                        href="javascript:void(0)"
                                                        class="statistics columnAjax d-block"
                                                        data-type="messageday3">
                                                        <h1 class="text-center">
                                                                    {{ (isset($allCasesCount['totalMessageDay3Count']) && !empty($allCasesCount['totalMessageDay3Count'])) ? $allCasesCount['totalMessageDay3Count'] : 0 }}
                                                                </h1>
                                                    </a>
                                                     <button class="download btn btn-outline-info" data-toggle="modal" data-target="#download_modal" data-backdrop="static" data-keyboard="false">
                                                        Send SMS 
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-4" style="flex: 0 0 37%; max-width: 37%;">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div
                                                class="card section-height-auto height-auto"
                                                style="min-height: 208px !important;">
                                                <div class="card-title text-center">
                                                    Da Quality
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                                                 @php
                                                                 $data = da_quality();
                                                    
                                                                    @endphp
                                                            <a
                                                                href="javascript:void(0)"
                                                                class="statistics columnAjax d-block"
                                                                data-type="da_quality">
                                                                
                                                                <h1>{{ $data ? $data : 0}}</h1>
                                                            </a>
                                                            <p class="text-primary">
                                                                Total
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                                            <div
                                                class="card section-height-auto height-auto"
                                                style="min-height: 208px !important;">
                                                <div class="card-title text-center">
                                                    Da Quality AVG
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                                            <a
                                                                href="javascript:void(0)"
                                                                class="statistics columnAjax d-block"
                                                                data-type="In Process">
                                                                    <h1>{{ $allCasesCount['totalAverage'] ? $allCasesCount['totalAverage'] : 0  }}%</h1>
                                                            </a>
                                                            <p class="text-primary">
                                                                Total
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row  ml--30 mr-0">
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="card section-height-auto height-auto">
                                                <div class="card-title text-center">
                                                    new
                                                </div>
                                                <div class="card-body text-center">
                                                    <a
                                                        href="javascript:void(0)"
                                                        class="statistics columnAjax  d-block"
                                                        data-type="new_count">
                                                        <h1 class="text-center height-auto line-height-auto">
                                                    {{ (isset($allCasesCount['totalNewCount']) && !empty($allCasesCount['totalNewCount'])) ? $allCasesCount['totalNewCount'] : 0 }}
                                                            </h1>
                                                    </a>
                                                    <button class="download btn btn-outline-info" data-toggle="modal" data-target="#download_modal" data-backdrop="static" data-keyboard="false">
                                                Send SMS
                                            </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card section-height-auto height-auto">
                                                <div class="card-title text-center">
                                                    ND 1
                                                </div>
                                                <div class="card-body text-center">
                                                    <a
                                                        href="javascript:void(0)"
                                                        class="statistics columnAjax d-block"
                                                        data-type="ND1">
                                                        <h1 class="text-center height-auto line-height-auto">
                                                    {{ (isset($allCasesCount['totalND1Count']) && !empty($allCasesCount['totalND1Count'])) ? $allCasesCount['totalND1Count'] : 0 }}
                                                </h1>
                                                    </a>
                                                     <button class="download btn btn-outline-info" data-toggle="modal" data-target="#download_modal" data-backdrop="static" data-keyboard="false">
                                                Next 
                                            </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="card section-height-auto height-auto">
                                                <div class="card-title text-center">
                                                    ND 2
                                                </div>
                                                <div class="card-body text-center">
                                                    <a
                                                        href="javascript:void(0)"
                                                        class="statistics columnAjax d-block"
                                                        data-type="ND2">
                                                         <h1 class="text-center height-auto line-height-auto">
                                                    {{ (isset($allCasesCount['totalND2Count']) && !empty($allCasesCount['totalND2Count'])) ? $allCasesCount['totalND2Count'] : 0 }}
                                                </h1>
                                                    </a>
                                                    <button class="download btn btn-outline-info" data-toggle="modal" data-target="#download_modal" data-backdrop="static" data-keyboard="false">
                                                Send SMS
                                            </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card section-height-auto height-auto">
                                                <div class="card-title text-center">
                                                    ND 3
                                                </div>
                                                <div class="card-body text-center">
                                                    <a
                                                        href="javascript:void(0)"
                                                        class="statistics columnAjax d-block"
                                                        data-type="ND3">
                                                        <h1 class="text-center height-auto line-height-auto">
                                                    {{ (isset($allCasesCount['totalND3Count']) && !empty($allCasesCount['totalND3Count'])) ? $allCasesCount['totalND3Count'] : 0 }}
                                                </h1>
                                                    </a>
                                                    <button class="download btn btn-outline-info" data-toggle="modal" data-target="#download_modal" data-backdrop="static" data-keyboard="false">
                                                Send SMS 
                                            </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div
                                                class="card section-height-auto height-auto card-radius"
                                                style="min-height: 460px !important;">
                                                <div class="card-title" style="font-size: 35px;text-align: center;">
                                                    DA perfomance
                                                </div>
                                                <div class="card-body" style="margin-top: 60px;">
                                                    <div class="row mb-5">
                                                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                                                            <p class="text-primary">IVA sent today</p>
                                                            <a
                                                                href="javascript:void(0)"
                                                                class="statistics d-block"
                                                                data-type="#">
                                                                <h1>{{ $allCasesCount['totalIvaTodayCount'] ? $allCasesCount['totalIvaTodayCount'] : 0 }}</h1>
                                                            </a>
                                                        </div>
                                                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                                                            <p class="text-primary">IVA sent this week</p>
                                                            <a
                                                                href="javascript:void(0)"
                                                                class="statistics d-block"
                                                                data-type="#">
                                                                <h1>{{ $allCasesCount['totalIvaWeekCount'] ? $allCasesCount['totalIvaWeekCount'] : 0 }}</h1>
                                                            </a>
                                                        </div>
                                                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                                                            <p class="text-primary">IVA sent month</p>
                                                            <a
                                                                href="javascript:void(0)"
                                                                class="statistics  d-block"
                                                                data-type="#">
                                                                <h1>{{ $allCasesCount['totalIvaCurrentMonth'] ? $allCasesCount['totalIvaCurrentMonth'] : 0 }} </h1>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                                                            <p class="text-primary">DMP sent today</p>
                                                            <a
                                                                href="javascript:void(0)"
                                                                class="statistics  d-block"
                                                                data-type="#">
                                                                <h1>{{ $allCasesCount['totalDmpTodayCount'] ? $allCasesCount['totalDmpTodayCount'] : 0 }} </h1>
                                                            </a>
                                                        </div>
                                                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                                                            <p class="text-primary">DMP sent this week</p>
                                                            <a
                                                                href="javascript:void(0)"
                                                                class="statistics d-block"
                                                                data-type="">
                                                                <h1>{{ $allCasesCount['totalDmpWeekCount'] ? $allCasesCount['totalDmpWeekCount'] : 0 }}</h1>
                                                            </a>
                                                        </div>
                                                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                                                            <p class="text-primary">DMP sent month</p>
                                                            <a
                                                                href="javascript:void(0)"
                                                                class="statistics d-block"
                                                                data-type="In Process">
                                                                <h1>{{ $allCasesCount['totalDmpCurrentMonth'] ? $allCasesCount['totalDmpCurrentMonth'] : 0 }}</h1>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ case view -->
                    <!-- proceess -->
                    <div class="row" style="margin-top:-250px;">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="row ml--30 mr-0">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div
                                        class="card section-height-auto height-auto"
                                        style="min-height: 234px !important;">
                                        <div class="card-title">
                                            in process
                                            @php
                                            //$getInProcess = getDataCaseAll('In Process');
                                            @endphp
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                                    <a
                                                        href="javascript:void(0)"
                                                        class="statistics columnAjax d-block"
                                                        data-type="In Process">
                                                        <h1>{{ $allCasesCount['totalInProcessCount'] ? $allCasesCount['totalInProcessCount'] : 0 }}
                                                        </h1>
                                                    </a>
                                                    <p class="text-primary">
                                                        Total
                                                    </p>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                                         @php 
                                                            $InProcessOverdue = getOverdueCount('In Process');
                                                        @endphp
                                                    <a
                                                        href="javascript:void(0)"
                                                        class="statistics columnAjax d-block"
                                                        data-type="In Process-overdue">
                                                         <h1 class="text-danger">{{  $InProcessOverdue ? $InProcessOverdue : 0 }}
                                                         </h1>
                                                    </a>
                                                    <p class="text-danger">
                                                        overdue
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div
                                        class="card section-height-auto height-auto"
                                        style="min-height: 234px !important;">
                                        <div class="card-title">
                                            awaiting docs
                                            @php
                                            $getAwaitingOverude = getOverdueCount('Awaiting Docs');
                                            @endphp
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                                     <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="Awaiting Docs">
                                                    <h1>{{ $allCasesCount['totalAwaitingDocsCount'] ? $allCasesCount['totalAwaitingDocsCount'] : 0 }}</h1>
                                                            </a>
                                                    <p class="text-primary">
                                                        Total
                                                    </p>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                                        
                                                    <a
                                                        href="javascript:void(0)"
                                                        class="statistics columnAjax d-block"
                                                        data-type="Awaiting Docs-overdue">
                                                        <h1 class="text-danger">{{ $getAwaitingOverude ? $getAwaitingOverude : 0 }}</h1>
                                                    </a>
                                                    <p class="text-danger">
                                                        overdue
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // proceess -->
                    
                </section>
            </main>
        </main>
    </div>
{{-- </div> --}}

<div id="download_modal" class="modal fade entercase" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="height: auto;min-height: auto !important;">
        <div class="modal-content card card-secondary">
            <div class="modal-header">
                <h1 class="modal-title">Are You Sure?</h1>
            </div>
            <div class="modal-body pb-0">
            <p class="mb-0" id="message"></p>
            </div>
            <div class="modal-footer justify-content-start pb-0">
                <div class="buttons width-100 justify-content-between">
                <a id="download_report" class="case_change btn btn-outline-primary" data-case_status="" data-dismiss="modal">Yes</a>
                    <a class="btn btn-outline-primary" data-dismiss="modal" id="modal_hide">back</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

$(document).on('click','.download',function()
{
        var case_status_name = $(this).prev().attr('data-type');
        var case_available = $(this).prev().text();
        if(case_status_name == 'new_count'){
            case_status_name = "NEW";
        }
        if(case_available > 0) {
            if(case_status_name == 'NEW') {
                $('.no_data').text('Are You Sure?');
                var message = 'All'+' '+case_status_name+' '+'will be moved into ND1';
            } else if(case_status_name == 'QUICK REVIEW') {
                $('.no_data').text('Are You Sure?');
                var message = 'All'+' '+case_status_name+' '+'will be moved into messageday1';
            } else if(case_status_name == 'ND1') {
                $('.no_data').text('Are You Sure?');
                var message = 'All'+' '+case_status_name+' '+'will be moved into ND2';
            } else if(case_status_name == 'ND2') {
                $('.no_data').text('Are You Sure?');
                var message = 'All'+' '+case_status_name+' '+'will be moved into ND3';
            } else if(case_status_name == 'ND3') {
                $('.no_data').text('Are You Sure?');
                var message = 'All'+' '+case_status_name+' '+'will be moved into ND4';
            } else if(case_status_name == 'messageday1') {
                $('.no_data').text('Are You Sure?');
                var message = 'All'+' '+case_status_name+' '+'will be moved into messageday2';
            } else if(case_status_name == 'messageday2') {
                $('.no_data').text('Are You Sure?');
                var message = 'All'+' '+case_status_name+' '+'will be moved into messageday3';
            } else if(case_status_name == 'messageday3') {
                 $('.no_data').text('Are You Sure?');
                 var message = 'All'+' '+case_status_name+' '+'will be moved into messageday4';
            }
            $('#message').text(message);
            //window.location ='{{ URL::to('download/excel_case') }}/'+case_status_name;

            $(document).on('click','.case_change',function(){
                $.ajax({
                    url:'{{ route('User.changeCaseStatusNd') }}',
                    method:'get',
                    data:{case_status:case_status_name},
                    success:function(data)
                    {
                        console.log('data => ', data);
                        var messageIcon = 'error';
                        if (data == 'success') {
                            var message = 'something wrong please try again';
                        } else {
                            var message = 'Data Save Successfully';
                            var messageIcon = 'success';
                        }
                        swal(message, {
                        icon: messageIcon,
                        });
                    }
                });
            });
        } else {
            var message = 'No Data Available';
            $('.no_data').text('');
            $('#message').text(message);
        }
    });
</script>
