@extends('layouts.app')

@section('content')
@php
    $loginUserData = Auth::user();
    unset($loginUserData->password);

    $loginUser = $loginUserData;
@endphp


            <!-- /sidebar end -->
            <!-- start .main-content -->
            <main class="main-content">
                <!-- header -->
                <div class="row mt--100 mb-3">
                    <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6  p-0">
                                <div class="main-title">
                                    <h1 class="font-h1">
                                        <strong>{{ $loginUser->name }}'s Reports</strong>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / header -->
                <section class="card-section reports-cards">
                    <!-- Report Card -->
                    @if($loginUser->user_type == 8)
                     <div class="row">
                    @else
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold">
                                <div class="card-title">
                                    New
                                    <br>
                                    Account
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.new_account')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD </h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold">
                                <div class="card-title">
                                    Agent
                                    <br>
                                    Reports
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.agent_report')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold">
                                <div class="card-title">
                                    Debts written
                                    <br>
                                    Off Reports
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.total_debt_written_off_report')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD </h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold">
                                <div class="card-title">
                                    Agent Case View
                                    <br>
                                    Status Report
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.agent_case_view_status_report')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ml--30">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold">
                                <div class="card-title">
                                    Invoice
                                    <br>
                                    Reports
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.invoice_report')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold">
                                <div class="card-title">
                                    Case Status
                                    <br>
                                    Reports
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.case_status_report')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold">
                                <div class="card-title">
                                    Debt
                                    <br>
                                    Reports
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.total_debt_report')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold">
                                <div class="card-title">
                                    Advisor sent to
                                    <br>
                                    Drafter Case Report
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.advisor_send_to_drafter_case_report')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ml--30">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold">
                                <div class="card-title">
                                    IP
                                    <br>
                                    Reports
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.ip_report')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold">
                                <div class="card-title">
                                    Fees
                                    <br>
                                    Reports
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.fees_report')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold">
                                <div class="card-title">
                                    Agent Login
                                    <br>
                                    Detailed Reports
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.agent_login_detail_report')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold">
                                <div class="card-title">
                                    Full
                                    <br>
                                    Reports
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.full_report')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ml--30">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold">
                                <div class="card-title">
                                    Solution
                                    <br>
                                    Reports
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.solution_report')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold">
                                <div class="card-title">
                                    Cancel
                                    <br>
                                    Reports
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.cancel_report')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold">
                                <div class="card-title">
                                    Agent Case View
                                    <br>
                                    Time Reports
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.agent_case_view_time_report')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold" style="min-height: 185px !important;">
                                <div class="card-title" >
                                    Da Case Report
                                    
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.Da_case_report')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold">
                                <div class="card-title">
                                    Da Agent quality Report
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.Da_agent_quality_report')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold">
                                <div class="card-title">
                                    Da Report Case Conversion
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.Da_report_conversion')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($loginUser->user_type == 1)
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold">
                                <div class="card-title">
                                   Today case download
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.today_case_worked')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold" style="min-height: 185px !important;">
                                <div class="card-title">
                                    Case Conversion IVA
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.case_conversion_iva')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold" style="min-height: 185px !important;">
                                <div class="card-title">
                                    Case Conversion DMP
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.case_conversion_dmp')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold" style="min-height: 185px !important;">
                                <div class="card-title">
                                    IVA Case Worked
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.iva_case_worked')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold" style="min-height: 185px !important;">
                                <div class="card-title">
                                    DMP Case Worked
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.dmp_case_worked')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold">
                                <div class="card-title">
                                    IVA Agent Quality Score Report
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.iva_quality_score')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold">
                                <div class="card-title">
                                    DMP Agent Quality Score Report
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.dmp_quality_score')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold">
                                <div class="card-title">
                                    IVA Agent Quality total Score Report
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.iva_quality_average_score')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold">
                                <div class="card-title">
                                    DMP Agent Quality total Score Report
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.dmp_quality_average_score')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card text-center height-auto font-weight-bold">
                                <div class="card-title">
                                    New case to submitted case report
                                </div>
                                <div class="card-body">
                                    <div class="d-inline-block mr-2">
                                        <a href="{{route('report.new_to_submitted_report')}}" class="no-underline"><i class="fa fa-file-pdf"></i>
                                        <h6>DOWNLOAD</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--/ Report Card -->

                </section>
            </main>
            <!-- /.main-content end -->
            
        

@endsection

