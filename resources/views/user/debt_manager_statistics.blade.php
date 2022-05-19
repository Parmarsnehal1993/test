@extends('layouts.app')
@section('content')
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
                                        @php
                                            $loginUserData = Auth::user();
                                            unset($loginUserData->password);

                                            $loginUser = $loginUserData;
                                        @endphp
                                        {{-- <strong>{{ $loginUser->name }}'s Workflow</strong> --}}
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="card-section">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="row ml--30 mr-0">
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="card section-height-auto height-auto">
                                                <div class="card-title text-center">
                                                    Iva Draft
                                                </div>
                                                <div class="card-body text-center">
                                                    <a href="javascript:void(0)" class="statistics columnAjax  d-block"
                                                        data-type="iva draft">
                                                        <h1 class="text-center height-auto line-height-auto">
                                                            {{ $count['IVA_DRAFT'] }}</h1>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card section-height-auto height-auto">
                                                <div class="card-title text-center">
                                                    Sent to Ip
                                                </div>
                                                <div class="card-body text-center">
                                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                                        data-type="SENT TO IP">
                                                        <h1 class="text-center height-auto line-height-auto">
                                                            {{ $count['SENT_TO_IP'] }}</h1>
                                                    </a>
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
                                                    Pass back IVA
                                                </div>
                                                <div class="card-body text-center">
                                                    <a href="javascript:void(0)" class="statistics columnAjax  d-block"
                                                        data-type="Pass Back IVA">
                                                        <h1 class="text-center">
                                                            {{ $count['PassBackIva'] }}</h1>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card section-height-auto height-auto">
                                                <div class="card-title text-center">
                                                    No Answer IVA
                                                </div>
                                                <div class="card-body text-center">
                                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                                        data-type="No Answer IVA">
                                                        <h1 class="text-center">
                                                            {{ $count['NoAnswerIva'] }}</h1>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="card section-height-auto height-auto"
                                                style="min-height: 208px !important;">
                                                <div class="card-title text-center">
                                                    IVA Quality AVG
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div
                                                            class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">

                                                            <h1>
                                                                %
                                                            </h1>

                                                            <p class="text-primary">
                                                                Total
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                                            <div class="card section-height-auto height-auto"
                                                style="min-height: 208px !important;">
                                                <div class="card-title text-center">
                                                    DMP Quality AVG
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div
                                                            class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">

                                                            <h1>
                                                                %</h1>

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
                                                    Dmp draft
                                                </div>
                                                <div class="card-body text-center">
                                                    <a href="javascript:void(0)" class="statistics columnAjax  d-block"
                                                        data-type="dmp draft">
                                                        <h1 class="text-center height-auto line-height-auto">
                                                            {{ $count['DMP_DRAFT'] }}</h1>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card section-height-auto height-auto">
                                                <div class="card-title text-center">
                                                    SEND TO DMP PROVIDER
                                                </div>
                                                <div class="card-body text-center">
                                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                                        data-type="SEND TO DMP PROVIDER">
                                                        <h1 class="text-center height-auto line-height-auto">
                                                            {{ $count['SendToDmpProvider'] }}</h1>
                                                    </a>
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
                                                    PASS BACK DMP
                                                </div>
                                                <div class="card-body text-center">
                                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                                        data-type="Pass Back DMP">
                                                        <h1 class="text-center height-auto line-height-auto">
                                                            {{ $count['PassBackDmp'] }}</h1>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card section-height-auto height-auto">
                                                <div class="card-title text-center">
                                                    NO ANSWER DMP
                                                </div>
                                                <div class="card-body text-center">
                                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                                        data-type="No Answer DMP">
                                                        <h1 class="text-center height-auto line-height-auto">
                                                            {{ $count['NoAnswerDmp'] }}</h1>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card section-height-auto height-auto card-radius"
                                                style="min-height: 460px !important;">
                                                <div class="card-title">
                                                    DMP & IVA performance
                                                </div>
                                                <div class="card-body" style="margin-top:60px;">
                                                    <div class="row">
                                                        <div
                                                            class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                                                            <p class="text-muted">Sent to IP</p>
                                                            {{ $count['SENT_TO_IP'] }}</h1>
                                                        </div>
                                                        <div
                                                            class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                                                            <p class="text-muted">Sub IVA</p>
                                                            {{ $count['SUBMITED_IVA'] }}</h1>
                                                        </div>

                                                        <div
                                                            class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                                                            <p class="text-muted">Conversion</p>

                                                            {{-- @if (!empty($allCasesCount['totalSentToIp']) && !empty($allCasesCount['getSubmittedIva'])) --}}
                                                            {{-- <h1>{{ round($allCasesCount['getSubmittedIva'] / $allCasesCount['totalSentToIp']) }}% --}}
                                                            </h1>
                                                            {{-- @else --}}
                                                            <h1>0%</h1>
                                                            {{-- @e/ndif --}}

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div
                                                            class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                                                            <p class="text-muted">Sent to DMP</p>
                                                            {{ $count['Sent_to_DMP'] }}</h1>
                                                        </div>
                                                        <div
                                                            class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                                                            <p class="text-muted">Sub DMP</p>
                                                            {{ $count['SUBMITED_DMP'] }}</h1>
                                                        </div>
                                                        <div
                                                            class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                                                            <p class="text-muted">Conversion</p>

                                                            {{-- @if (!empty($allCasesCount['totaldmpcount']) && !empty($allCasesCount['getSubmittedDmp'])) --}}
                                                            {{-- <h1>{{ round($allCasesCount['getSubmittedDmp'] / $allCasesCount['totaldmpcount']) }}% --}}
                                                            </h1>
                                                            {{-- @else --}}
                                                            <h1>0%</h1>
                                                            {{-- @endif --}}


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
                            <div class="row ml--30 mr-0" style="margin-top:10px">
                                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 text-center">
                                    <div class="card section-height-auto height-auto"
                                        style="min-height: 234px !important;">
                                        <div class="card-title">
                                            Paid on MOC
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                                        data-type="paid on MOC">
                                                        {{ $count['PAID_ON_MOC'] }}</h1>
                                                    </a>
                                                    <p class="text-primary">
                                                        Total
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 text-center">
                                    <div class="card section-height-auto height-auto"
                                        style="min-height: 234px !important;">
                                        <div class="card-title">
                                            Failed IVA Compliance
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                                    @php
                                                        // $data = ComplianceCount('Failed_iva_compliance');
                                                    @endphp
                                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                                        data-type="Failed IVA Compliance">
                                                        {{-- <h1>{{ $data ? $data : 0 }}</h1> --}}
                                                    </a>
                                                    <p class="text-primary">
                                                        Total
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 text-center">
                                    <div class="card section-height-auto height-auto"
                                        style="min-height: 234px !important;">
                                        <div class="card-title">
                                            Failed DMP Compliance
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                @php
                                                    // $data = ComplianceCount('Failed_dmp_compliance');
                                                @endphp
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                                        data-type="Failed DMP Compliance">
                                                        {{-- <h1>{{ $data ? $data : 0 }}</h1> --}}
                                                    </a>
                                                    <p class="text-primary">
                                                        Total
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 text-center">
                                    <div class="card section-height-auto height-auto"
                                        style="min-height: 234px !important;">
                                        <div class="card-title">
                                            Deleted Case
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                                        data-type="Deleted Case">
                                                        {{ $count['DELETED_CASE'] }}</h1>
                                                    </a>
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
    </div>


    </body>

    </html>
@endsection
