@extends('layouts.app')
@section('content')
    <style>
        @media (min-width:1000px) and (max-width:1400px) {
            .dmp-advisor .card-body h1 {
                font-size: 50px;
            }

            .dmp-advisor .card-title {
                font-size: 16px;
            }
        }

        @media (min-width:1400px) and (max-width:1539px) {

            .dmp-advisor .card-title {
                font-size: 18px;
            }
        }

        .row .col-6 {
            text-align: center;
        }

    </style>
    <main class="main-content dmp-advisor">
        <!-- header agent-->
        <div class="row">
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                <div class="row mt--100">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">
                        <div class="main-title">
                            <h1 class="font-h1">
                                @php
                                    $loginUserData = Auth::user();
                                    unset($loginUserData->password);

                                    $loginUser = $loginUserData;
                                @endphp
                                {{-- <strong> {{ dd($loginUser->type) }} </strong> --}}
                                {{-- <strong>{{ $loginUser->name }}'s Workflow</strong> --}}
                                {{-- @php$loginUserData = Auth::user();
                                                                                                                                                                                  echo($loginUser->user_type);                                                                                    unset($loginUserData->password);
                                                                                                                                                                                                                                                                        $loginUser = $loginUserData;
                                                                                                                                                                                                                                        @endphp ?> ?> ?> ?> ?> ?> ?> --}}
                                @if ($loginUser->user_type == 3)
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
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card height-auto" style="min-height: 200px !important;">
                                <div class="card-title mb-0">
                                    IVA
                                </div>
                                <div class="card-body height-auto">
                                    @php
                                        $totalIvaCount = isset($allCasesCount['totalIvaCount']) && !empty($allCasesCount['totalIvaCount']) ? $allCasesCount['totalIvaCount'] : 0;
                                    @endphp
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                        data-type="iva_complete">
                                        <h1 class="text-center height-auto line-height-auto mb-4 mt-4">
                                            {{-- {{ $totalIvaCount ? $totalIvaCount : 0 }}</h1> --}}
                                            {{ $count['iva_complete'] }}</h1>
                                    </a>
                                </div>
                            </div>

                            <div class="card height-auto" style="min-height: 200px !important;">
                                <div class="card-title mb-0">
                                    Trust Deed
                                </div>
                                <div class="card-body height-auto">
                                    @php
                                        $totalTrustDeedCount = isset($allCasesCount['totalTrustDeedCount']) && !empty($allCasesCount['totalTrustDeedCount']) ? $allCasesCount['totalTrustDeedCount'] : 0;
                                    @endphp
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                        data-type="trust_deed_complete">
                                        <h1 class="text-center height-auto line-height-auto mb-4 mt-4">
                                            {{-- {{ $totalTrustDeedCount ? $totalTrustDeedCount : 0 }}</h1> --}}
                                            {{ $count['trust_deed_complete'] }}</h1>
                                    </a>
                                </div>
                            </div>



                            <div class="card height-auto" style="min-height: 200px !important;">
                                <div class="card-title mb-0">
                                    DAS
                                </div>
                                <div class="card-body height-auto">
                                    @php
                                        $totalDasCompleteCount = isset($allCasesCount['totalDasCompleteCount']) && !empty($allCasesCount['totalDasCompleteCount']) ? $allCasesCount['totalDasCompleteCount'] : 0;
                                    @endphp
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                        data-type="das_complete">
                                        <h1 class="text-center height-auto line-height-auto mb-4 mt-4">
                                            {{-- {{ $totalDasCompleteCount ? $totalDasCompleteCount : 0 }}</h1> --}}
                                            {{ $count['das_complete'] }}</h1>
                                    </a>
                                </div>
                            </div>



                            <div class="card height-auto" style="min-height: 200px !important;">
                                <div class="card-title mb-0">
                                    Registered
                                </div>
                                <div class="card-body height-auto">
                                    @php
                                        $totalQuickReviewCount = isset($allCasesCount['totalQuickReviewCount']) && !empty($allCasesCount['totalQuickReviewCount']) ? $allCasesCount['totalQuickReviewCount'] : 0;
                                    @endphp
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                        data-type="QUICK REVIEW">
                                        <h1 class="text-center height-auto line-height-auto mb-4 mt-4">
                                            {{-- {{ $totalQuickReviewCount ? $totalQuickReviewCount : 0 }}</h1> --}}
                                            {{ $count['REVIEW'] }}</h1>
                                    </a>
                                </div>
                            </div>

                            <div class="card height-auto" style="min-height: 200px !important;">
                                <div class="card-title mb-0">
                                    Web
                                </div>
                                <div class="card-body height-auto">
                                    @php
                                        $totalWebCount = isset($allCasesCount['totalWebCount']) && !empty($allCasesCount['totalWebCount']) ? $allCasesCount['totalWebCount'] : 0;
                                    @endphp
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="web">
                                        <h1 class="text-center height-auto line-height-auto mb-4 mt-4">
                                            {{-- {{ $totalWebCount ? $totalWebCount : 0 }}</h1> --}}
                                            {{ $count['web'] }}</h1>
                                    </a>
                                </div>
                            </div>



                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card height-auto" style="min-height: 195px !important;">
                                <div class="card-title mb-0">
                                    Deleted Case
                                </div>
                                <div class="card-body height-auto">

                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                        data-type="Deleted Case">
                                        <h1 class="text-center height-auto line-height-auto mb-4 mt-4">
                                            {{-- {{ isset($allCasesCount['totalDeletedCaseCount']) && !empty($allCasesCount['totalDeletedCaseCount']) ? $allCasesCount['totalDeletedCaseCount'] : 0 }} --}}
                                            <h1>{{ $count['DELETED_CASE'] }}</h1>
                                        </h1>
                                    </a>
                                </div>
                            </div>

                            <div class="card height-auto" style="min-height: 200px !important;">
                                <div class="card-title mb-0">
                                    DMP
                                </div>
                                <div class="card-body height-auto">
                                    @php
                                        $totalDmpCompleteCount = isset($allCasesCount['totalDmpCompleteCount']) && !empty($allCasesCount['totalDmpCompleteCount']) ? $allCasesCount['totalDmpCompleteCount'] : 0;
                                    @endphp
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                        data-type="dmp_complete">
                                        <h1 class="text-center height-auto line-height-auto mb-4 mt-4">
                                            {{-- {{ $totalDmpCompleteCount ? $totalDmpCompleteCount : 0 }}</h1> --}}
                                            <h1>{{ $count['dmp_complete'] }}</h1>
                                    </a>
                                </div>
                            </div>
                            <div class="card height-auto" style="min-height: 195px !important;">
                                <div class="card-title mb-0">
                                    Other
                                </div>
                                <div class="card-body height-auto">
                                    @php
                                        $totalOtherZcaseTypeCount = isset($allCasesCount['totalOtherZcaseTypeCount']) && !empty($allCasesCount['totalOtherZcaseTypeCount']) ? $allCasesCount['totalOtherZcaseTypeCount'] : 0;
                                    @endphp
                                    <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                        data-type="other_zcase_type">
                                        <h1 class="text-center height-auto line-height-auto mb-4 mt-4">
                                            {{-- {{ $totalOtherZcaseTypeCount ? $totalOtherZcaseTypeCount : 0 }}</h1> --}}
                                            {{ $count['other_zcase_type'] }}</h1>
                                    </a>
                                </div>
                            </div>
                            <div class="card section-height-auto height-auto" style="min-height: 200px !important;">
                                <div class="card-title">
                                    In Process

                                    @php
                                        $totalInProcess = isset($allCasesCount['totalInProcessCount']) && !empty($allCasesCount['totalInProcessCount']) ? $allCasesCount['totalInProcessCount'] : 0;
                                    @endphp

                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                                data-type="In Process">
                                                <h1>{{ $totalInProcess ? $totalInProcess : 0 }}</h1>
                                                {{-- <h1>{{ $count['IN_PROCESS'] }}</h1> --}}
                                            </a>
                                            <p class="text-primary">
                                                Total
                                            </p>
                                        </div>
                                        @php
                                            // $getInprocess = getOverdueCount('In Process');
                                        @endphp
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            <a href="javascript:void(0)" class="statistics columnAjax d-block text-center"
                                                data-type="In Process-overdue">
                                                {{-- <h1 class="text-danger">{{ $getInprocess ? $getInprocess : 0 }}</h1> --}}
                                            </a>
                                            <p class="text-danger">
                                                overdue
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card section-height-auto height-auto" style="min-height: 200px !important;">
                                <div class="card-title">
                                    Awaiting Docs
                                    @php
                                        // $totalInAwatingDocs = isset($allCasesCount['totalAwaitingDocsCount']) && !empty($allCasesCount['totalAwaitingDocsCount']) ? $allCasesCount['totalAwaitingDocsCount'] : 0;
                                    @endphp

                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            <a href="javascript:void(0)" class="statistics columnAjax d-block"
                                                data-type="Awaiting Docs">
                                                {{-- <h1>{{ $totalInAwatingDocs ? $totalInAwatingDocs : 0 }}</h1> --}}
                                                <h1>{{ $count['AWAITINGDOCS1'] }}</h1>
                                            </a>

                                            <p class="text-primary">
                                                Total
                                            </p>

                                        </div>
                                        @php
                                            // $getAwaitingDocsoverdue = getOverdueCount('Awaiting Docs');
                                        @endphp
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            <a href="javascript:void(0)" class="statistics columnAjax d-block text-center"
                                                data-type="Awaiting Docs-overdue">
                                                <h1 class="text-danger">
                                                    {{-- {{ $getAwaitingDocsoverdue ? $getAwaitingDocsoverdue : 0 }}</h1> --}}
                                            </a>
                                            <p class="text-danger">
                                                overdue
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="card" style="margin-left: -15px;margin-right: 10px;">
                                <div class="row m-0 mr-0">
                                    @if (isset($topMonthAgent['finalTopArr']) && !empty($topMonthAgent['finalTopArr']))
                                        <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8">
                                            <div class="card-title">
                                                {{ date('F') }} Top 5
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table search-table text-left awaiating-table">
                                                        <thead>
                                                            <tr>
                                                                <th>POS</th>
                                                                <th>Name</th>
                                                                <th>DMP</th>
                                                                <th>IVA</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php $topCounter = 1; @endphp
                                                            @foreach ($topMonthAgent['finalTopArr'] as $topMonthAgentKey => $topMonthAgentValue)
                                                                <tr>
                                                                    <td>{{ $topCounter }}</td>
                                                                    <td>{{ isset($topMonthAgent['userArray']) && isset($topMonthAgent['userArray'][$topMonthAgentKey]) ? $topMonthAgent['userArray'][$topMonthAgentKey] : '-' }}
                                                                    </td>
                                                                    <td>{{ isset($topMonthAgentValue['dmp']) ? $topMonthAgentValue['dmp'] : 0 }}
                                                                    </td>
                                                                    <td>{{ isset($topMonthAgentValue['iva']) ? $topMonthAgentValue['iva'] : 0 }}
                                                                    </td>
                                                                </tr>
                                                                @php $topCounter++; @endphp
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8">
                                            <div class="card-title">
                                                {{ date('F') }} Top 5
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table search-table text-left awaiating-table">
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
                                    @endif
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                        <div class="card-title">
                                            <?php echo date('F'); ?> Overview
                                            &nbsp;
                                        </div>
                                        <table class="table text-primary">
                                            <tbody>
                                                <tr>
                                                    <td>case sent</td>
                                                    {{-- <td>{{ $monthlyCases }}</td> --}}
                                                </tr>
                                                <tr>
                                                    <td>DMP sent</td>
                                                    {{-- <td>{{ $totalAgentDrafter }}</td> --}}
                                                </tr>
                                                <tr>
                                                    <td>IVA sent</td>
                                                    {{-- <td>{{ $totalIvaSent }}</td> --}}
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mt-2 mr-0">
                                    @if (!empty($allData))

                                        <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8">
                                            <div class="card-title">
                                                DA perfomence
                                            </div>
                                            <div class="card-body">
                                                <canvas id="perfomance_chart" width="300" height="300"></canvas>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                            <div class="card-title">
                                                <select class="btn btn-outline-primary btn-large" id="filter_da">
                                                    <option value="">Date</option>
                                                    <option value="Last Week">Last Week</option>
                                                    <option value="Last Month">Last Month</option>
                                                    <option value="This Week">This Week</option>
                                                    <option value="This Month">This Month</option>
                                                    <option value="All Time">All Time</option>
                                                </select>
                                            </div>
                                            <table class="table text-primary">
                                                <tbody>
                                                    <tr>
                                                        <td>Introduction</td>
                                                        <td id="introduction_count_get">
                                                            {{-- {{ $agent_advisor_graph['introduction_count'] }}%</td> --}}
                                                    </tr>
                                                    <tr>
                                                        <td>Vulnerability</td>
                                                        <td id="vulnerability_count_get">
                                                            {{-- {{ $agent_advisor_graph['vulnerability_count'] }}%</td> --}}
                                                    </tr>
                                                    <tr>
                                                        <td>Fact find</td>
                                                        <td id="fact_find_count_get">
                                                            {{-- {{ round($agent_advisor_graph['fact_find_count']) }} %</td> --}}
                                                    </tr>
                                                    <tr>
                                                        <td>Solution</td>
                                                        <td id="solution_count_get">
                                                            {{-- {{ $agent_advisor_graph['solution_count'] }} %</td> --}}
                                                    </tr>
                                                    <tr>
                                                        <td>Documentation</td>
                                                        <td id="documentation_count_get">
                                                            {{-- {{ $agent_advisor_graph['documentation_total'] }} %</td> --}}
                                                    </tr>
                                                    <tr>
                                                        <td>Confirmation of sale</td>
                                                        <td id="confirmation_count_get">
                                                            {{-- {{ $agent_advisor_graph['confirmation_total'] }} %</td> --}}
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="card-title">
                                                Total Score
                                            </div>
                                            <div class="card-body p-0">
                                                @php
                                                    $result = $agent_advisor_graph['introduction_result'] + $agent_advisor_graph['vulnerability_result'] + $agent_advisor_graph['fact_find_result'] + $agent_advisor_graph['solution_result'] + $agent_advisor_graph['documentation_result'] + $agent_advisor_graph['confirmation_result'];
                                                @endphp
                                                <h1 class="text-center height-auto line-height-auto"
                                                    id="get_total_da_result">{{ $result }}%</h1>
                                            </div>
                                            <form>
                                                <input type="hidden" name="introduction_get_graph_data"
                                                    id="introduction_get_graph_data" value="">
                                                <input type="hidden" name="vulnerability_get_graph_data"
                                                    id="vulnerability_get_graph_data" value="">
                                                <input type="hidden" name="fact_find_get_graph_data"
                                                    id="fact_find_get_graph_data" value="">
                                                <input type="hidden" name="solution_get_graph_data"
                                                    id="solution_get_graph_data" value="">
                                                <input type="hidden" name="documentation_get_graph_data"
                                                    id="documentation_get_graph_data" value="">
                                                <input type="hidden" name="confirmation_get_graph_data"
                                                    id="confirmation_get_graph_data" value="">
                                            </form>
                                        </div>
                                    @else
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--/ case view -->
            <!-- proceess -->

            <!-- // proceess -->
        </section>
    </main>

    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on('click', '.columnAjax', function() {

                var data_text = $(this).data('type');

                // alert(data_text);

                window.location = '{{ URL::to('list/data') }}/' + data_text;

                // window.location ='{{ URL::to('inprocess/awaiting_docs/data') }}/'+data;

            })

        });
    </script>
@endsection
@if (!empty($allData))
    <script>
        var introduction_data = $('#introduction_get_graph_data').val();
        var vulnerability_data = $('#vulnerability_get_graph_data').val();
        var fact_find_data = $('#fact_find_get_graph_data').val();
        var solution_get_graph_data = $('#solution_get_graph_data').val();
        var documentation_get_graph_data = $('#documentation_get_graph_data').val();
        var confirmation_get_graph_data = $('#confirmation_get_graph_data').val();

        var ctx = document
            .getElementById('perfomance_chart')
            .getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'radar',
            fill: false,
            // The data for our dataset
            data: {
                labels: [
                    'Introduction',
                    'Vulnerability',
                    'Fact find',
                    'Solution',
                    'Documention',
                    'Confirmation of sale'
                ],
                datasets: [{
                    borderColor: '#008dcc',
                    fill: false,
                    borderWidth: 0,
                    data: [
                        <?php echo $agent_advisor_graph['introduction_count']; ?>,
                        <?php echo $agent_advisor_graph['vulnerability_count']; ?>,
                        <?php echo round($agent_advisor_graph['fact_find_count']); ?>,
                        <?php echo $agent_advisor_graph['solution_count']; ?>,
                        <?php echo $agent_advisor_graph['documentation_total']; ?>,
                        <?php echo $agent_advisor_graph['confirmation_total']; ?>
                    ]
                }]
            },

            // Configuration options go here
            options: {
                legend: false,
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.yLabel;
                        }
                    }
                },
                angleLines: {
                    display: false
                },

                scale: {
                    ticks: {
                        beginAtZero: true,
                        max: 100,
                        min: 1
                    }
                },
                scaleOverride: false,
                scaleSteps: 10,
                scaleStepWidth: 20,
                scaleStartValue: 100,
            }
        });
    </script>
@else

@endif


<script type="text/javascript">
    $(document).on('change', '#filter_da', function() {
        var filter_text = $('option:selected', this).text();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{ route('filter_data') }}',

            method: 'post',
            data: {
                filter_text: filter_text
            },
            dataType: 'json',
            success: function(data) {
                var total = 0;

                var introduction_count = JSON.parse(data.introduction_count);
                $('.introduction_count_total').text(introduction_count + '% / 100%');

                var vulnerability_count = JSON.parse(data.vulnerability_count);
                $('.vulnerability_count_total').text(vulnerability_count + '% / 100%');

                var fact_find_count = JSON.parse(data.fact_find_count);
                $('.fact_find_count').text(Math.round(fact_find_count) + '% / 100%');

                var solution_count = JSON.parse(data.solution_count);
                $('.solution_count').text(solution_count + '% / 100%');

                var documentation_count = JSON.parse(data.documentation_count);
                $('.documention_count').text(documentation_count + '% / 100%');

                var confirmation_count = JSON.parse(data.confirmation_count);
                $('.confirmation_of_sale_count').text(confirmation_count + '% / 100%');

                var fail_introduction = JSON.parse(data.fail_introduction);
                var fail_vulnerability = JSON.parse(data.fail_vulnerability);
                var fail_fact_find = JSON.parse(data.fail_fact_find);
                var fail_solution = JSON.parse(data.fail_solution);
                var fail_documentation = JSON.parse(data.fail_documentation);
                var fail_confirmation_sale = JSON.parse(data.fail_confirmation_sale);

                var total = JSON.parse(data.total_result);

                $('#introduction_count_get').text(introduction_count + '%');
                $('#vulnerability_count_get').text(vulnerability_count + '%');
                $('#fact_find_count_get').text(Math.round(fact_find_count) + '%');
                $('#solution_count_get').text(solution_count + '%');
                $('#documentation_count_get').text(documentation_count + '%');
                $('#confirmation_count_get').text(fail_confirmation_sale + '%');
                $('#get_total_da_result').text(total + '%');

                $('#introduction_get_graph_data').val(introduction_count);
                $('#vulnerability_get_graph_data').val(vulnerability_count);
                $('#fact_find_get_graph_data').val(fact_find_count);
                $('#solution_get_graph_data').val(solution_count);
                $('#documentation_get_graph_data').val(documentation_count);
                $('#confirmation_get_graph_data').val(fail_confirmation_sale);

            }
        })

    });
</script>
