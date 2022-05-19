@php
    
    $loginUserData = Auth::user();
    unset($loginUserData->password);

    $loginUser = $loginUserData;
@endphp

<main class="main-content admin-dashboard pt-0">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
            <div class="row mt--70 mb-3">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-12  p-0">
                    <div class="main-title">
                        <h1 class="font-h1">
                            <strong>{{ $loginUser->name }} Workflow</strong>
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
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-7">
                <div class="row ml--30 mr-0">
                    <div class="col-6 col-lg-6 col-md-6 col-sm-12 col-xl-6">
                        <div class="card height-auto">
                            <div class="card-title d-flex justify-content-between mb-0 align-items-center">
                                <h3>Review/completed</h3>
                                <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="NEW">
                                <div class="d-flex justify-content-between ct-space">
                                    <h1>{{ $allCasesCount['totalReviewCount'] }}</h1>
                                    <h1></h1>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6 col-md-6 col-sm-12 col-xl-6">
                        <div class="card height-auto">
                            <div class="card-title d-flex justify-content-between mb-0 align-items-center">
                                <h3> DMP Draft</h3>
                                <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="dmp draft">
                                <div class="d-flex justify-content-between ct-space">    
                                    <h1>{{(isset($columnCount['dmp draft']) && !empty($columnCount['dmp draft'])) ? $columnCount['dmp draft'] : 0 }}</h1>
                                    <h1></h1>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ml--30 mr-0">
                    <div class="col-6 col-lg-6 col-md-6 col-sm-12 col-xl-6">
                        <div class="card height-auto">
                            <div class="card-title d-flex justify-content-between mb-0 align-items-center">
                                <h3>complete case</h3>
                                <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="Complete">
                                <div class="d-flex justify-content-between ct-space">
                                    <h1>{{ $allCasesCount['caseCompletedCount'] ? $allCasesCount['caseCompletedCount'] : 0 }}</h1>
                                    <h1></h1>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6 col-md-6 col-sm-12 col-xl-6">
                        <div class="card height-auto">
                            <div class="card-title d-flex justify-content-between mb-0 align-items-center">
                                <h3>Sent To DMP</h3>
                                <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="Sent to DMP">
                                <div class="d-flex justify-content-between ct-space">
                                    <h1>{{ (isset($allCasesCount['totalSendToDmpCount']) && !empty($allCasesCount['totalSendToDmpCount'])) ? $allCasesCount['totalSendToDmpCount'] : 0 }}</h1>
                                    <h1></h1>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ml--30 mr-0">
                    <div class="col-6 col-lg-6 col-md-6 col-sm-12 col-xl-6">
                        <div class="card height-auto">
                            <div class="card-title d-flex justify-content-between mb-0 align-items-center">
                                <h3>Day 2</h3>  
                                <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="messageday1">
                                <div class="d-flex justify-content-between ct-space">  
                                    <h1>
                                        {{ $allCasesCount['totalMessageDay1Count'] }}
                                    </h1>
                                    <h1></h1>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6 col-md-6 col-sm-12 col-xl-6">
                        <div class="card height-auto">
                            <div class="card-title d-flex justify-content-between mb-0 align-items-center">
                                <h3>Paid On MOC</h3>
                                <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="Paid on MOC">
                                <div class="d-flex justify-content-between ct-space">
                                    <h1>{{ (isset($allCasesCount['totalPaidOnMocCount']) && !empty($allCasesCount['totalPaidOnMocCount'])) ? $allCasesCount['totalPaidOnMocCount'] : 0 }}</h1>
                                    <h1></h1>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ml--30 mr-0">
                    <div class="col-6 col-lg-6 col-md-6 col-sm-12 col-xl-6">
                        <div class="card height-auto">
                            <div class="card-title d-flex justify-content-between mb-0 align-items-center">
                                <h3>Day 3</h3>
                                <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="messageday2">
                                <div class="d-flex justify-content-between ct-space">
                                    <h1>
                                        {{ $allCasesCount['totalMessageDay2Count'] }}
                                    </h1>
                                    <h1></h1>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6 col-md-6 col-sm-12 col-xl-6">
                        <div class="card height-auto">
                            <div class="card-title d-flex justify-content-between mb-0 align-items-center">
                                <h3>Submitted</h3>
                                <div class="d-flex justify-content-between ct-space">
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="submitted">
                                    <h1>{{ (isset($allCasesCount['totalSubmittedCount']) && !empty($allCasesCount['totalSubmittedCount'])) ? $allCasesCount['totalSubmittedCount'] : 0 }}</h1>
                                    <h1></h1>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ml--30 mr-0">
                    <div class="col-6 col-lg-6 col-md-6 col-sm-12 col-xl-6">
                        <div class="card height-auto">
                            <div class="card-title d-flex justify-content-between mb-0 align-items-center">
                                <h3>Day 4</h3>
                                <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="messageday3">
                                <div class="d-flex justify-content-between ct-space">
                                    <h1>
                                        {{ $allCasesCount['totalMessageDay3Count'] }}
                                    </h1>
                                    <h1></h1>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6 col-md-6 col-sm-12 col-xl-6">
                        <div class="card height-auto">
                            <div class="card-title d-flex justify-content-between mb-0 align-items-center">
                                <h3>cancelled</h3>
                                <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="cancelled">
                                <div class="d-flex justify-content-between ct-space">
                                    <h1>{{ (isset($allCasesCount['totalCancelledCount']) && !empty($allCasesCount['totalCancelledCount'])) ? $allCasesCount['totalCancelledCount'] : 0 }}</h1>
                                    <h1></h1>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ml--30 mr-0">
                    <div class="col-6 col-lg-6 col-md-6 col-sm-12 col-xl-6">
                        <div class="card height-auto">
                            <div class="card-title d-flex justify-content-between mb-0 align-items-center">
                                <h3>In Process</h3>
                                @php
                                $getInprocessOverdue = getOverdueCount('In Process');
                                @endphp
                                
                                <div class="d-flex justify-content-between ct-space">
                                    <a href="javascript:void(0)" class="statistics columnAjax d-flex justify-content-between ct-space" data-type="In Process">
                                    <h1>{{ $allCasesCount['totalInProcessCount'] }}</h1>
                                    </a>
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block text-center" data-type="In Process-overdue">
                                        <h1 class="text-danger">
                                            {{ $getInprocessOverdue ? $getInprocessOverdue : 0 }}
                                        </h1>
                                    </a>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-6 col-lg-6 col-md-6 col-sm-12 col-xl-6">
                        <div class="card height-auto">
                            <div class="card-title d-flex justify-content-between mb-0 align-items-center">
                                <h3>Invoice</h3>
                                <div class="d-flex justify-content-between ct-space">
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="invoice">
                                        <h1>{{ $allCasesCount['totalInvoiceCount'] }}</h1>
                                    </a>
                                    <h1></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ml--30 mr-0">
                    <div class="col-6 col-lg-6 col-md-6 col-sm-12 col-xl-6">
                        <div class="card height-auto">
                            <div class="card-title d-flex justify-content-between mb-0 align-items-center">
                                <h3>Awaiting Docs</h3>
                                <div class="d-flex justify-content-between ct-space">
                                    <a href="javascript:void(0)" class="statistics columnAjax d-flex justify-content-between ct-space" data-type="Awaiting Docs">
                                    <h1>{{ $allCasesCount['totalAwaitingDocsCount'] }}</h1>
                                    </a>
                                    @php $awaitingDocsOverdue = getOverdueCount('Awaiting Docs'); @endphp
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block text-center" data-type="Awaiting Docs-overdue">
                                        <h1 class="text-danger">
                                            {{ $awaitingDocsOverdue ? $awaitingDocsOverdue : 0 }}
                                        </h1>
                                    </a>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-6 col-lg-6 col-md-6 col-sm-12 col-xl-6">
                        <div class="card height-auto">
                            <div class="card-title d-flex justify-content-between mb-0 align-items-center">
                                <h3>Failed Compliance</h3>
                                <div class="d-flex justify-content-between ct-space">
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block text-center" data-type="Failed Compliance">
                                        <h1 class="text-danger">{{ $allCasesCount['totalFailedComplianceCount'] }}</h1>
                                    </a>
                                    <h1></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ml--30 mr-0">
                    <div class="col-6 col-lg-6 col-md-6 col-sm-12 col-xl-6">
                        <div class="card height-auto">
                            <div class="card-title d-flex justify-content-between mb-0 align-items-center">
                                <h3>IVA Draft</h3>
                                <div class="d-flex justify-content-between ct-space">
                                    <a href="javascript:void(0)" class="statistics columnAjax d-flex justify-content-between ct-space" data-type="iva draft">
                                    <h1>{{ (isset($allCasesCount['totalIvaDraftCount']) && !empty($allCasesCount['totalIvaDraftCount'])) ? $allCasesCount['totalIvaDraftCount'] : 0 }}</h1>
                                    </a>
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block text-center" data-type="iva draft-overdue">
                                        @php
                                            $getIvaDraftOverdue = getOverdueCount('iva draft');
                                            $getIvaDraftOverdue = 0;
                                        @endphp
                                        <h1 class="text-danger">
                                            {{ $getIvaDraftOverdue ? $getIvaDraftOverdue : 0 }}
                                        </h1>
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6 col-md-6 col-sm-12 col-xl-6">
                        <div class="card height-auto">
                            <div class="card-title d-flex justify-content-between mb-0 align-items-center">
                                <h3>Fixed Compliance</h3>
                                <div class="d-flex justify-content-between ct-space">
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block text-center" data-type="Fixed Compliance">
                                        <h1 class="text-danger">{{ $allCasesCount['totalFixedComplianceCount'] }}</h1>
                                    </a>
                                    <h1></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ml--30 mr-0">
                    <div class="col-6 col-lg-6 col-md-6 col-sm-12 col-xl-6">
                        <div class="card height-auto">
                            <div class="card-title d-flex justify-content-between mb-0 align-items-center">
                                <h3>Sent To IP</h3>
                                <a href="javascript:void(0)" class="statistics columnAjax d-flex justify-content-between ct-space" data-type="SENT TO IP">
                                    <h1>{{ (isset($allCasesCount['totalSentToIpCount']) && !empty($allCasesCount['totalSentToIpCount'])) ? $allCasesCount['totalSentToIpCount'] : 0 }}</h1>
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block text-center" data-type="SENT TO IP-overdue">
                                        @php
                                            $getSentToIpOverdue = getOverdueCount('SENT TO IP');
                                            $getSentToIpOverdue = 0;
                                        @endphp
                                        <h1 class="text-danger">
                                            {{ $getSentToIpOverdue ? $getSentToIpOverdue  : 0  }}
                                        </h1>
                                    </a>
                                </a>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <!-- Right Column -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-5 p-md-0">
                <div class="card primary-radius">
                    <div class="card-title"> 
                        <h2><?php  echo date('F'); ?> Overview</h2>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-10 col-md-10 col-xl-10">
                            <div class="card-body">
                                <table class="table text-primary td-p-0">
                                    <tbody>
                                        <tr>
                                            <td>case sent</td>
                                            <td>{{ $admin_monthlyCases }}</td>
                                        </tr>
                                        <tr>
                                            <td>DMP sent</td>
                                            <td>{{ $admin_totalAgentDrafter  }}</td>
                                        </tr>
                                        <tr>
                                            <td>IVA sent</td>
                                            <td>{{ $admin_totalIvaSent }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // Right Column -->
        </div>
        <!--/ case view -->
    </section>
</main>