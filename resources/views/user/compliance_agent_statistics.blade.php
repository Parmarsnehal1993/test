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
                                {{-- @if ($loginUser->user_type == 11)
                                <strong>{{ $loginUser->name }}'s jjjWorkflow</strong>
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
                                    DMP Compliance
                                </div>
                                <div class="card-body text-center">
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                        data-type="DMP Compliance">
                                        <h1>{{ $count['DMP_Compliance'] }}</h1>
                                    </a>
                                </div>
                            </div>
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
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="card section-height-auto height-auto">
                                <div class="card-title">
                                    IVA compliance
                                </div>
                                <div class="card-body text-center">
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                        data-type="IVA Compliance">
                                        <h1>{{ $count['Iva_Compliance'] }}</h1>
                                    </a>
                                </div>
                            </div>
                            <div class="card section-height-auto height-auto">
                                <div class="card-title">
                                    Failed Compliance
                                </div>
                                <div class="card-body text-center">
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                        data-type="Failed Compliance">
                                        <h1 class="text-danger">0</h1>
                                    </a>
                                </div>
                            </div>
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
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="card min-height-730" style="margin-left: -15px;margin-right: 10px;min-height:570px">
                                <div class="row m-0 mr-0">
                                    <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8 br-primary">
                                        <div class="card-title">
                                            <?php echo date('F'); ?> Top 5
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table text-primary">
                                                    <thead>
                                                        <tr>
                                                            <th>POS</th>
                                                            <th>Name</th>
                                                            <th>DMP</th>
                                                            <th>IVA</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8 br-primary">
                                        <div class="card-title">
                                            <?php echo date('F'); ?> Top 5
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table text-primary">
                                                    <thead>
                                                        <tr>
                                                            <th>POS</th>
                                                            <th>Name</th>
                                                            <th>DMP</th>
                                                            <th>IVA</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                        <div class="card-title">
                                            <?php echo date('F'); ?> overview
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table search-table text-right awaiating-table td-no-p">
                                                    <tr>
                                                        <td>Cases Sent:</td>
                                                    </tr>
                                                    <tr>
                                                        <td>DMP Sent:</td>
                                                    </tr>
                                                    <tr>
                                                        <td>IVA Sent:</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
