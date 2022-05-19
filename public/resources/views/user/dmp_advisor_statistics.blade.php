
@extends('layouts.app')
@section('content')

{{-- <section class="main-content">
    <div class="container"> --}}
            @php
                $dashboardLoginUserData = Auth::user();
                unset($dashboardLoginUserData->password);
                $dashboardLoginUser = $dashboardLoginUserData;
            @endphp
            
            <!-- commmon error message display section start -->
            @include('layouts.message')

@php
    $loginUserData = Auth::user();
    unset($loginUserData->password);

    $loginUser = $loginUserData;

@endphp
    <!-- /sidebar end -->
    <!-- start .main-content -->
    <main class="main-content dmp-advisor pt-0">
        <!-- header -->
        <div class="row">
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                <div class="row mt--80 mb-0">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6  p-0">
                        <div class="main-title">
                            <h1 class="font-h1">
                                @if($loginUser->user_type == 5)
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
            <!--/ case view -->
            <!-- proceess -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="row ml--30 mr-0">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="card section-height-auto height-auto">
                                <div class="card-title">
                                    DMP draft       
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="dmp draft">
                                                
                                                    <h1>{{ (isset($allCasesCount['totalDmpDraftCount']) && !empty($allCasesCount['totalDmpDraftCount'])) ? $allCasesCount['totalDmpDraftCount'] : 0 }} </h1>
                                            
                                                    
                                            </a>
                                            <p class="text-primary">
                                                Total
                                            </p>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            @php
                                                $data = getOverdueCount('dmp draft');
                                                $data = 0;
                                            @endphp
                                            <a href="javascript:void(0)" class="statistics columnAjax d-block text-center" data-type="dmp draft-overdue">
                                            <h1 class="text-danger"> {{ $data ? $data : 0 }}</h1></a>
                                            <p class="text-danger">
                                                overdue
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="card section-height-auto height-auto">
                                <div class="card-title">
                                    Sent to DMP Provider  
                                </div>                     
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="SEND TO DMP PROVIDER">
                                                <h1>{{ (isset($allCasesCount['totalSendToDmpProviderCount']) && !empty($allCasesCount['totalSendToDmpProviderCount'])) ? $allCasesCount['totalSendToDmpProviderCount'] : 0 }}</h1>
                                            </a>
                                            <p class="text-primary">
                                                Total
                                            </p>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            @php
                                               $data = getOverdueCount('SEND TO DMP PROVIDER');
                                               $data =  0;
                                            @endphp
                                            <a href="javascript:void(0)" class="statistics columnAjax d-block text-center" data-type="SEND TO DMP PROVIDER-overdue">
                                            <h1 class="text-danger">{{ $data ? $data : 0}}</h1></a>
                                            <p class="text-danger">
                                                overdue
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <div class="card section-height-auto height-auto">
                                <div class="card-title">
                                    Failed Compliance
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @php $data = getCountFunc('Failed Compliance'); @endphp
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            <a
                                                href="javascript:void(0)"
                                                class="statistics columnAjax d-block"
                                                data-type="Failed Compliance">
                                                <h1 class="text-danger">{{ $data ? $data : 0 }}</h1>
                                            </a>
                                            <p class="text-primary">
                                                Total
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <div class="card section-height-auto height-auto">
                                <div class="card-title">
                                    Chase Pack   
                                    @php 
                                    $data = getCountFunc('Chase Pack')
                                    @endphp               
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="Chase Pack">
                                                <h1 class="">{{ $data ? $data : 0 }}</h1>
                                            </a>
                                                
                            
                                            <p class="text-primary">
                                                Total
                                            </p>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            @php
                                                $data = getOverdueCount('Chase Pack');
                                                $data = 0;
                                            @endphp
                                            <a href="javascript:void(0)" class="statistics columnAjax d-block text-center" data-type="Chase Pack-overdue">
                                            <h1 class="text-danger"> {{ $data ? $data : 0 }}</h1></a>
                                            <p class="text-danger">
                                                overdue
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <div class="card section-height-auto height-auto">
                                <div class="card-title">
                                    No Answer DMP 
                                    @php 
                                    $data = getCountFunc('No Answer DMP')
                                    @endphp                   
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="No Answer DMP">
                                                <h1 class="text-danger">{{ $data ? $data : 0 }}</h1>
                                            </a>
                                                
                            
                                            <p class="text-primary">
                                                Total
                                            </p>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            @php
                                                $data = getOverdueCount('No Answer DMP');
                                                $data = 0;
                                            @endphp
                                            <a href="javascript:void(0)" class="statistics columnAjax d-block text-center" data-type="No Answer DMP-overdue">
                                            <h1 class="text-danger"> {{ $data ? $data : 0 }}</h1></a>
                                            <p class="text-danger">
                                                overdue
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @foreach($topMonthAgent['finalTopArr'] as $topMonthAgentKey => $topMonthAgentValue)
                                    @php
                                        
                                        $sent = 0;
                                        $sub = 0;
                                        if(empty($topMonthAgentValue)){
                                            $sent = 0;
                                            $sub = 0;
                                        }else{
                                            $sent = isset($topMonthAgentValue['dmp']) ? $topMonthAgentValue['dmp'] : 0;
                                            $sub  =isset($topMonthAgentValue['iva']) ? $topMonthAgentValue['iva'] : 0;
                                        }
                                    @endphp
                            @endforeach
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"">
                            <div class="card section-height-auto height-auto">
                                <div class="card-title">
                                    cases
                                                        
                                </div>
                                <div class="card-body">
                                <div class="row">
                                        
                                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                                            <h1 class="text-success">{{ $sent }}</h1>
                                            <p class="text-success">sent</p>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                                            <h1 class="text-success">{{ $sub  }}</h1>
                                             <p class="text-success">sub</p>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                                            <h1 class="text-success">
                                             @if($sent == 0 || $sub == 0)
                                                {{ 0 }}
                                            @else 
                                               {{ round($sent/$sub) }}
                                            @endif
                                            </h1>
                                            <p class="text-success">%</p>
                                        </div>
                                        
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="card" style="margin-left: -15px;margin-right: 10px;min-height:403px;">
                        <div class="row m-0 mr-0">
                            {{-- current month --}}
                            <div class="col-12 col-sm-6 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-title float-left">
                                    <?php  echo date('F'); ?> Top 5 
                                </div>
                               
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table search-table text-center awaiating-table">
                                            <thead>
                                                
                                                <tr>
                                                    <th>POS</th>
                                                    <th>Name</th>
                                                    <th class="text-center">Sent To DMP Provider</th>
                                                    <th>submitted</th>
                                                    <th class="text-center">%</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $topCounter = 1; @endphp
                                                @foreach($topMonthAgentMonth['finalTopArr'] as $topMonthAgentKey => $topMonthAgentValue)
                                                    <tr>
                                                        @if(empty($topMonthAgentValue))
                                                        @else
                                                        <td>{{ $topCounter }}</td>
                                                        <td>{{ $topMonthAgentMonth['userArray'][$topMonthAgentKey] }}</td>
                                                        <td>{{ isset($topMonthAgentValue['dmp']) ? $topMonthAgentValue['dmp'] : 0 }}</td>
                                                        <td>{{ isset($topMonthAgentValue['iva']) ? $topMonthAgentValue['iva'] : 0 }}</td>
                                                        <td>
                                                            @if(isset($topMonthAgentValue['dmp']) && isset($topMonthAgentValue['iva']) )
                                                            {{ @round($topMonthAgentValue['iva'] / $topMonthAgentValue['dmp']) }}
                                                            @else
                                                            {{ 0 }}
                                                            @endif
                                                        </td>
                                                        @endif
                                                    </tr>
                                                @php $topCounter++; @endphp
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- previous month --}}
                             <div class="col-12 col-sm-6 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-title float-left">
                                    @php 
                                    $currentMonth = date('F');
                                    echo Date('F', strtotime($currentMonth . " last month"));
                                    @endphp Top 5
                                </div>
                               
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table search-table text-center awaiating-table">
                                            <thead>
                                                
                                                <tr>
                                                    <th>POS</th>
                                                    <th>Name</th>
                                                    <th class="text-center">Sent To DMP Provider</th>
                                                    <th>submitted</th>
                                                    <th class="text-center">%</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $topCounter = 1;  @endphp
                                                @foreach($topPrevMonthAgent['finalTopPrevMonthArr'] as $topMonthAgentKey => $topMonthAgentValue)
                                                    <tr>

                                                        @if(empty($topMonthAgentValue))
                                                        @else
                                                        <td>{{ $topCounter }}</td>
                                                        <td>{{  $topPrevMonthAgent['userPrevMonthArray'][$topMonthAgentKey] }}</td>
                                                        <td>{{ isset($topMonthAgentValue['dmp']) ? $topMonthAgentValue['dmp'] : 0 }}</td>
                                                        <td>{{ isset($topMonthAgentValue['iva']) ? $topMonthAgentValue['iva'] : 0 }}</td>
                                                        <td>
                                                            @if(isset($topMonthAgentValue['dmp']) && isset($topMonthAgentValue['iva']) )
                                                            {{ @round($topMonthAgentValue['iva'] / $topMonthAgentValue['dmp']) }}
                                                            @else
                                                            {{ 0 }}
                                                            @endif
                                                        </td>
                                                        @endif
                                                    </tr>
                                                @php $topCounter++; @endphp
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                <div class="card-body">
                                </div>
                            </div>
                                                <div class="row mt-2 mr-0">
                                                    @if(!empty($allData_compliance))
    
                                                        <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8">
                                                            <div class="card-title">
                                                                DMP Compliace perfomence
                                                            </div>
                                                            <div class="card-body">
                                                                <canvas id="perfomance_chart_DMP" width="300" height="300"></canvas>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                                            <div class="card-title">
                                                                <select class="btn btn-outline-primary btn-large" id="filter_dmp">
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
                                                                        <td id="introduction_compliance_get">{{ $dmp_advisor_compliance_graph['introducation_compliance_count'] ? $dmp_advisor_compliance_graph['introducation_compliance_count'] : 0 }}%</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Vulnerability</td>
                                                                        <td id="vulnerability_compliance_get">{{ $dmp_advisor_compliance_graph['vulnerability_compliance_count'] ? $dmp_advisor_compliance_graph['vulnerability_compliance_count'] : 0 }}%</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Fact find</td>
                                                                        <td id="fact_find_compliance_get">{{ round($dmp_advisor_compliance_graph['fact_find_compliance_count'],2,PHP_ROUND_HALF_DOWN) ? round($dmp_advisor_compliance_graph['fact_find_compliance_count'],2,PHP_ROUND_HALF_DOWN) : 0 }} %</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>IE</td>
                                                                        <td id="ie_compliace_get">{{ $dmp_advisor_compliance_graph['ie_compliance_count'] ? $dmp_advisor_compliance_graph['ie_compliance_count'] : 0 }} %</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>DMP</td>
                                                                        <td id="dmp_compliace_get">{{ $dmp_advisor_compliance_graph['dmp_compliance_count']  ?  $dmp_advisor_compliance_graph['dmp_compliance_count'] : 0 }} %</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Confirmation of sale</td>
                                                                        <td id="confirmation_compliance_get">{{ $dmp_advisor_compliance_graph['confirmation_compliance_count'] ? $dmp_advisor_compliance_graph['confirmation_compliance_count'] : 0 }} %</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <div class="card-title">
                                                                Total Score
                                                            </div>
                                                            <div class="card-body p-0">
                                                                 @php
                                                                        $result = $dmp_advisor_compliance_graph['introducation_compliance_result'] + $dmp_advisor_compliance_graph['vulnerability_compliance_result'] + $dmp_advisor_compliance_graph['fact_find_compliance_result'] + $dmp_advisor_compliance_graph['ie_compliance_result'] + $dmp_advisor_compliance_graph['dmp_compliance_result'] + $dmp_advisor_compliance_graph['confirmation_compliance_result'];
                                                                @endphp
                                                                @if($dmp_advisor_compliance_graph['fail_introducation_compliance'] > 0 || $dmp_advisor_compliance_graph['fail_vulnerability_compliance'] > 0 || $dmp_advisor_compliance_graph['fail_fact_find_compliance'] > 0 || $dmp_advisor_compliance_graph['fail_ie_compliance'] > 0 || $dmp_advisor_compliance_graph['fail_compliance_dmp'] > 0 || $dmp_advisor_compliance_graph['fail_confirmation_compliance'] > 0)
                                                                <h1 class="text-center height-auto line-height-auto" id="get_total_da_result">45%</h1>
                                                                @else
                                                                <h1 class="text-center height-auto line-height-auto" id="get_total_da_result">{{ $result }}%</h1>
                                                                @endif
                                                            </div>
                                                            <form>
                                                                <input type="hidden" name="introduction_get_graph_data" id="introduction_get_compliance_data" value="">
                                                                <input type="hidden" name="vulnerability_get_graph_data" id="vulnerability_get_compliance_data" value="">
                                                                <input type="hidden" name="fact_find_get_graph_data" id="fact_find_get_compliance_data" value="">
                                                                <input type="hidden" name="solution_get_graph_data" id="ie_get_compliance_data" value="">
                                                                <input type="hidden" name="documentation_get_graph_data" id="dmp_get_compliance_data" value="">
                                                                <input type="hidden" name="confirmation_get_graph_data" id="confirmation_get_compliance_data" value="">
                                                            </form>
                                                        </div>
                                                        @else
                                                        @endif
                                                    </div>
                                                
                        </div>
                    </div>
                </div>
                <!-- // Right Column -->
            </div>
                </div>
                <!-- Right Column -->
                    
            <!-- // proceess -->
        </section>
    </main>


 
<script type="text/javascript">
    
    $('.columnAjax').on('click', function () {
    
             var data_text = $(this).data('type');
             
                if(data_text == 'In Process' || data_text == 'Awaiting Docs') {
                    window.location ='{{ URL::to('list/data/inProcee/awaitingDocs') }}/'+data_text;
                } else {
                    window.location ='{{ URL::to('list/data') }}/'+data_text;
                }    

            
        });
</script>   

<script>
$(document).on('click','.logout_temp',function(){
    var logout_reason ='break';
        $.ajax({
            url:'{{ route('logout') }}',
            method:'post',
            data:{ "_token": "{{ csrf_token() }}", "logout_reason" : logout_reason},
            dataType:'json',
            success:function(data)
            {
                var successMessage = 'Logout Successfully';
                //swal(successMessage, "success");
                swal(successMessage, {
                  icon: "success",
                }) 
                .then((value) => {
                    window.location.href = "{{ url('/') }}";
                });
            }
        });
});
</script>


@if(!empty($allData_compliance))

 <script>

                var introduction_compliance_data = $('#introduction_get_compliance_data').val();
                var vulnerability_compliance_data = $('#vulnerability_get_compliance_data').val();
                var fact_find_compliace_data = $('#fact_find_get_compliance_data').val();
                var ie_get_compliance_data = $('#ie_get_compliance_data').val();
                var dmp_compliance_data = $('#dmp_get_compliance_data').val();
                var confirmation_compliance_data = $('#confirmation_get_compliance_data').val();

            var ctx = document
                .getElementById('perfomance_chart_DMP')
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
                        'IE',
                        'DMP',
                        'Confirmation'
                    ],
                    datasets: [
                        {
                            borderColor: '#008dcc',
                            fill:false,
                            borderWidth:0,
                            data: [
                                  <?php echo $dmp_advisor_compliance_graph['introducation_compliance_count']; ?>,
                                   <?php echo $dmp_advisor_compliance_graph['vulnerability_compliance_count']; ?>,
                                   <?php echo $dmp_advisor_compliance_graph['fact_find_compliance_count']; ?>,
                                   <?php echo $dmp_advisor_compliance_graph['ie_compliance_count']; ?>,
                                   <?php echo $dmp_advisor_compliance_graph['dmp_compliance_count']; ?>,
                                   <?php echo $dmp_advisor_compliance_graph['confirmation_compliance_count']; ?>
                            ]
                        }
                    ]
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

<script>
    $(document).on('change','#filter_dmp',function(e)
    {   
        e.preventDefault();
        var filter_text = $('option:selected', this).text();
        
        $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
            url : '{{ route('filter_dmp_compliance_data') }}',
            method: 'get',
            data : {filter_text : filter_text},
            dataType : 'json',
            success : function(data)
            {
                var total = 0;

                var introduction_compliance_count = JSON.parse(data.introducation_compliance_count);
                $('.introduction_compliance_count_total').text(introduction_compliance_count + '% / 100%');

                var vulnerability_compliance_count = JSON.parse(data.vulnerability_compliance_count);
                $('.vulnerability_compliance_count_total').text(vulnerability_compliance_count + '% / 100%');
                
                var fact_find_compliance_count = JSON.parse(data.fact_find_compliance_count);
                $('.fact_find_compliance_count_total').text(fact_find_compliance_count + '% / 100%');

                var ie_compliance_count = JSON.parse(data.ie_compliance_count);
                $('.ie_iva_compliance_count_total').text(ie_compliance_count + '% / 100%');

                var dmp_compliance_count = JSON.parse(data.dmp_compliance_count);
                $('.dmp_count_total').text(iva_compliance_count + '% / 100%');

                var confirmation_compliance_count = JSON.parse(data.confirmation_compliance_count);
                $('.confirmation_compliance_count_total').text(confirmation_iva_count + '% / 100%');

                var total_compliance = JSON.parse(data.total_result_compliance);
                

                $('#introduction_compliance_get').text(introduction_iva_count + '%');
                $('#vulnerability_compliance_get').text(vulnerability_iva_count + '%');
                $('#fact_find_compliance_get').text(fact_find_iva_count + '%');
                $('#ie_compliace_get').text(ie_iva_count + '%');
                $('#dmp_compliace_get').text(iva_compliance_count + '%');
                $('#confirmation_compliance_get').text(confirmation_iva_count + '%');

                $('#introduction_get_compliance_data').val(introduction_iva_count + '%');
                $('#vulnerability_get_compliance_data').val(vulnerability_iva_count + '%');
                $('#fact_find_get_compliance_data').val(fact_find_iva_count + '%');
                $('#ie_get_compliance_data').val(ie_iva_count + '%');
                $('#dmp_get_compliance_data').val(iva_compliance_count + '%');
                $('#confirmation_get_compliance_data').val(confirmation_iva_count + '%');


            }
    });

});

</script>



@endsection
















