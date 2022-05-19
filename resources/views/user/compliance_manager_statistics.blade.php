@extends('layouts.app')
@section('content')
    @php
    $loginUserData = Auth::user();
    unset($loginUserData->password);

    $loginUser = $loginUserData;
    @endphp
    <main class="main-content dmp-advisor pt-0">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                <div class="row mt--80 mb-0" style="margin-top:-50px;">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-12  p-0">
                        <div class="main-title">
                            <h2 class="font-h1">
                                {{-- @if ($loginUser->user_type == 9)
                                    <strong>{{ $loginUser->name }}'s Workflow</strong>
                                @endif --}}
                            </h2>
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
                            <div class="card section-height-auto height-auto">
                                <div class="card-title">
                                    Submitted DMP
                                </div>
                                <div class="card-body text-center">
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                        data-type="submitted DMP">
                                        <h1>{{ $count['SUBMITED_DMP'] }}</h1>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="card section-height-auto height-auto">
                                <div class="card-title">
                                    Submitted IVA
                                </div>
                                <div class="card-body text-center">
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                        data-type="submitted IVA">
                                        <h1>{{ $count['SUBMITED_IVA'] }}</h1>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="card section-height-auto height-auto">
                                <div class="card-title" style="text-transform: capitalize;">
                                    To be invoiced
                                </div>
                                <div class="card-body text-center">
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="invoice">
                                        <h1>{{ $count['in_voice'] }}</h1>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="card section-height-auto height-auto">
                                <div class="card-title">
                                    DA Quality

                                </div>
                                <div class="card-body text-center">
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                        data-type="da_quality">
                                        <h1>{{ $count['DA_QUALITY'] }}</h1>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ml--30 mr-0">
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="card section-height-auto height-auto">
                                <div class="card-title">
                                    Fix Compliance
                                </div>
                                <div class="card-body text-center">
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                        data-type="Fixed Compliance">
                                        <h1>{{ $count['Fixed_Compliance'] }}</h1>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="card section-height-auto height-auto">
                                <div class="card-title">
                                    Failed Compliance

                                </div>
                                <div class="card-body text-center">

                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                        data-type="Failed Compliance">
                                        <h1 class="text-danger">
                                            {{ $count['Failed_Compliance'] }}</h1>

                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="card section-height-auto height-auto">
                                <div class="card-title">
                                    complaints
                                </div>
                                <div class="card-body text-center">
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                        data-type="complaints">
                                        <h1 class="text-danger">
                                            {{ $count['Complaints'] }}</h1>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="card section-height-auto height-auto">
                                <div class="card-title">
                                    Invoice Paid ?
                                </div>
                                <div class="card-body text-center">
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="Complete">
                                        <h1>{{ $count['COMPLETED_CASE'] }}</h1>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="card section-height-auto height-auto">
                                <div class="card-title">
                                    Deleted Case
                                </div>
                                <div class="card-body text-center">
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                        data-type="Deleted Case">
                                        <h1>{{ $count['DELETED_CASE'] }}</h1>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
