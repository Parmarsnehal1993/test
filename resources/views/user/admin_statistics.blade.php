@extends('layouts.app')
@section('content')
    @php

    $loginUserData = Auth::user();
    unset($loginUserData->password);

    $loginUser = $loginUserData;

    @endphp
    {{-- {{ dd($loginUserData->name) }} --}}
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
        <section class="card-section">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-7">
                    <div class="row ml--30 mr-0">
                        <div class="col-6 col-lg-6 col-md-6 col-sm-12 col-xl-6">
                            <div class="card height-auto">
                                <div class="card-title d-flex justify-content-between mb-0 align-items-center">
                                    <h3>Review</h3>
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="NEW">
                                        <div class="d-flex justify-content-between ct-space">
                                            <h1>{{ $count['REVIEW'] }}</h1>
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

                                        <h1>{{ $count['DMP_DRAFT'] }}</h1>
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

                                    <h1>{{ $count['COMPLETED_CASE'] }}</h1>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-6 col-md-6 col-sm-12 col-xl-6">
                <div class="card height-auto">
                    <div class="card-title d-flex justify-content-between mb-0 align-items-center">
                        <h3>Deleted Case</h3>
                        <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="Deleted Case">
                            <div class="d-flex justify-content-between ct-space">

                                <h1>{{ $count['DELETED_CASE'] }}</h1>

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
                            <h3>Message Day 1</h3>
                            <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="messageday1">
                                <div class="d-flex justify-content-between ct-space">

                                    <h1>{{ $count['MESSAGEDAY1'] }}</h1>
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

                                <h1>{{ $count['PAID_ON_MOC'] }}</h1>
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
                            <h3>Message Day 2</h3>
                            <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="messageday2">
                                <div class="d-flex justify-content-between ct-space">

                                    <h1>{{ $count['MESSAGEDAY2'] }}</h1>
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

                                <h1>{{ $count['SUBMITTED'] }}</h1>
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
                            <h3>Message Day 3</h3>
                            <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="messageday3">
                                <div class="d-flex justify-content-between ct-space">

                                    <h1>{{ $count['MESSAGEDAY3'] }}</h1>
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

                                <h1>{{ $count['CANCELED'] }}</h1>
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


                            <div class="d-flex justify-content-between ct-space">
                                <a href="javascript:void(0)"
                                    class="statistics columnAjax d-flex justify-content-between ct-space"
                                    data-type="In Process">

                                    <h1>{{ $count['INPROCESSDAY1'] }}</h1>
                                </a>
                                <a href="javascript:void(0)" class="statistics columnAjax d-block text-center"
                                    data-type="In Process-overdue">
                                    <h1 class="text-danger">

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

                                </a>
                                <h1>{{ $count['in_voice'] }}</h1>
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
                                <a href="javascript:void(0)"
                                    class="statistics columnAjax d-flex justify-content-between ct-space"
                                    data-type="Awaiting Docs">

                                    <h1>{{ $count['AWAITINGDOCS1'] }}</h1>
                                </a>

                                <a href="javascript:void(0)" class="statistics columnAjax d-block text-center"
                                    data-type="Awaiting Docs-overdue">
                                    <h1 class="text-danger">

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
                                <a href="javascript:void(0)" class="statistics columnAjax d-block text-center"
                                    data-type="Failed Compliance">


                                </a>
                                <h1>{{ $count['Failed_Compliance'] }}</h1>
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
                                <a href="javascript:void(0)"
                                    class="statistics columnAjax d-flex justify-content-between ct-space"
                                    data-type="iva draft">
                                    <h1>{{ $count['IVA_DRAFT'] }}</h1>
                                </a>
                                <a href="javascript:void(0)" class="statistics columnAjax d-block text-center"
                                    data-type="iva draft-overdue">

                                    <h1 class="text-danger">

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
                                <a href="javascript:void(0)" class="statistics columnAjax d-block text-center"
                                    data-type="Fixed Compliance">


                                </a>
                                <h1>{{ $count['Fixed_Compliance'] }}</h1>
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
                            <a href="javascript:void(0)"
                                class="statistics columnAjax d-flex justify-content-between ct-space"
                                data-type="SENT TO IP">

                                <h1>{{ $count['SENT_TO_IP'] }}</h1>
                                </h1>
                                <a href="javascript:void(0)" class="statistics columnAjax d-block text-center"
                                    data-type="SENT TO IP-overdue">

                                    <h1 class="text-danger">

                                    </h1>
                                </a>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-6 col-md-6 col-sm-12 col-xl-6">
                    <div class="card height-auto">
                        <div class="card-title d-flex justify-content-between mb-0 align-items-center">
                            <h3>Sent To DMP</h3>
                            <div class="d-flex justify-content-between ct-space">
                                <a href="javascript:void(0)" class="statistics columnAjax d-block text-center"
                                    data-type="Sent to DMP">

                                    </h1>
                                </a>
                                <h1></h1>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-5 p-md-0">
                <div class="card primary-radius">
                    <div class="card-title">
                        <h2><?php echo date('F'); ?> Overview</h2>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-10 col-md-10 col-xl-10">
                            <div class="card-body">
                                <table class="table text-primary td-p-0">
                                    <tbody>
                                        <tr>
                                            <td>case sent</td>

                                        </tr>
                                        <tr>
                                            <td>DMP sent</td>

                                        </tr>
                                        <tr>
                                            <td>IVA sent</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>

        </section>
    </main>
@endsection
