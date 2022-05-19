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
    <main class="main-content dmp-advisor">
        <!-- header -->
        <div class="row mt--100">
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6  p-0">
                        <div class="main-title">
                            <h1 class="font-h1">
                                @if($loginUser->user_type == 6)
                                <strong>{{ $loginUser->name }} Workflow</strong>
                                @endif
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / header -->
        <section class="card-section">
            <!-- proceess -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="row ml--30 mr-0">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="card section-height-auto height-auto">
                                <div class="card-title">
                                    IVA Draft      
                                </div> 
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="iva draft">
                                                  <h1>  {{ (isset($allCasesCount['totalIvaDraftCount']) && !empty($allCasesCount['totalIvaDraftCount'])) ? $allCasesCount['totalIvaDraftCount'] : 0 }} </h1>   
                                            </a>
                                            <p class="text-primary">
                                                Total
                                            </p>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            <a href="javascript:void(0)" class="statistics columnAjax d-block text-center" data-type="iva draft overdue">
                                                @php
                                                    $data = getOverdueCount('iva draft');
                                                    $data = 0;
                                                @endphp
                                            <h1 class="text-danger">{{ $data ? $data : 0 }}</h1></a>
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
                                    sent to IP          
                                </div>
                                <div class="card-body">
                                    <div class="row">  
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="SENT TO IP">
                                                <h1>{{ (isset($allCasesCount['totalSentToIpCount']) && !empty($allCasesCount['totalSentToIpCount'])) ? $allCasesCount['totalSentToIpCount'] : 0 }}</h1>
                                            </a>
                                            <p class="text-primary">
                                                Total
                                            </p>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            @php
                                              $data = getOverdueCount('SENT TO IP');
                                              $data = 0;
                                            @endphp
                                            <a href="javascript:void(0)" class="statistics columnAjax d-block text-center" data-type="SENT TO IP overdue">
                                            <h1 class="text-danger">{{ $data ? $data : 0}}</h1></a>
                                            <p class="text-danger">
                                                overdue
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ml--30 mr-0">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="card section-height-auto height-auto">
                                <div class="card-title">
                                    paid on MOC                   
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                           <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="Paid on MOC">
                                                <h1>{{ (isset($allCasesCount['totalPaidOnMocCount']) && !empty($allCasesCount['totalPaidOnMocCount'])) ? $allCasesCount['totalPaidOnMocCount'] : 0 }} </h1>
                                            </a>
                                               

                                            <p class="text-primary">
                                                Total
                                            </p>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            @php
                                              $data = getOverdueCount('Paid on MOC');
                                              $data = 0;
                                            @endphp
                                            <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="PAID ON MOC overdue">
                                            <h1 class="text-danger">{{$data ? $data : 0}}</h1></a>
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
                                    Failed compliance                  
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @php
                                        $data = getCountFunc('Failed Compliance');
                                        
                                        @endphp
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                           <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="Failed Compliance">
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
                                    Pass Back IVA   
                                    @php 
                                    $data = getCountFunc('Pass Back IVA')
                                    @endphp               
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="Pass Back IVA">
                                                <h1 class="">{{ $data ? $data : 0 }}</h1>
                                            </a>
                                                
                            
                                            <p class="text-primary">
                                                Total
                                            </p>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            @php
                                                $data = getOverdueCount('Pass Back IVA');
                                                $data = 0;
                                            @endphp
                                            <a href="javascript:void(0)" class="statistics columnAjax d-block text-center" data-type="Pass Back IVA-overdue">
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
                                    No Answer IVA 
                                    @php 
                                    $data = getCountFunc('No Answer IVA')
                                    @endphp                   
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="No Answer IVA">
                                                <h1 class="text-primary">{{ $data ? $data : 0 }}</h1>
                                            </a>
                                                
                            
                                            <p class="text-primary">
                                                Total
                                            </p>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            @php
                                                $data = getOverdueCount('No Answer IVA');
                                                $data = 0;
                                            @endphp
                                            <a href="javascript:void(0)" class="statistics columnAjax d-block text-center" data-type="No Answer IVA-overdue">
                                            <h1 class="text-"> {{ $data ? $data : 0 }}</h1></a>
                                            <p class="text-">
                                                overdue
                                            </p>
                                        </div>
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
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card section-height-auto height-auto">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="card-title d-flex col-12 col-sm-12 pl-5 col-md-5 col-lg-5 col-xl-5 align-items-center">
                                           <h2 class="text-primary">Cases:</h2> 
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center">
                                            <h1 class="text-success">{{ $sent }}</h1>
                                            <p class="text-success">sent</p>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center">
                                                <h1 class="text-success">{{ $sub }}</h1>
                                                <p class="text-success">sub</p>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center">
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
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                
                <!-- Right Column -->
                
                    <div class="card min-height-730" style="margin-left: -15px;margin-right: 10px;min-height:660px">
                        <div class="row m-0 mr-0">
                            <div class="col-12 col-sm-6 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-title">
                                    <?php  echo date('F'); ?> Top 5 
                                </div>
                                <div class="card-body">
                                    <table class="table search-table text-center awaiating-table">
                                        <thead>
                                            
                                            <tr>
                                                <th class="text-center">POS</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Sent To Ip</th>
                                                <th class="text-center">Submitted</th>
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
                            

                                                
                                                {{-- compliance graph code start her --}}

                                            <div class="row mt-2 mr-0">
                                                @if(!empty($iva_advisor_compliance_graph))
                                                <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8">
                                                    <div class="card-title">
                                                        IVA Compliance Graph
                                                    </div>
                                                    <div class="card-body">
                                                        <canvas id="perfomance_chart_IVA" width="300" height="300"></canvas>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="card-title">
                                                        <select class="btn btn-outline-primary btn-large" id="filter_iva_compliance">
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
                                                                <td id="introduction_iva_count_get">{{ $iva_advisor_compliance_graph['introducation_iva_compliance_count'] }}%</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Vulnerability</td>
                                                                <td id="vulnerability_iva_count_get">{{ $iva_advisor_compliance_graph['vulnerability_iva_compliance_count'] }}%</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Fact Find</td>
                                                                <td id="fact_find_iva_count_get">{{ round($iva_advisor_compliance_graph['fact_find_iva_compliance_count'],2,PHP_ROUND_HALF_DOWN) }} %</td>
                                                            </tr>
                                                            <tr>
                                                                <td>IE</td>
                                                                <td id="ie_iva_count_get">{{ $iva_advisor_compliance_graph['ie_iva_compliance_count'] }} %</td>
                                                            </tr>
                                                            <tr>
                                                                <td>IVA</td>
                                                                <td id="iva_count_get">{{ $iva_advisor_compliance_graph['iva_compliance_count'] }} %</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Confirmation</td>
                                                                <td id="confirmation_iva_count_get">{{ $iva_advisor_compliance_graph['confirmation_iva_compliance_count'] }} %</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="card-title">
                                                        Total Score
                                                    </div>
                                                    <div class="card-body p-0">
                                                         @php
                                                                $result = $iva_advisor_compliance_graph['introducation_iva_compliance_result'] + $iva_advisor_compliance_graph['vulnerability_iva_compliance_result'] + $iva_advisor_compliance_graph['fact_find_iva_compliance_result'] + $iva_advisor_compliance_graph['ie_iva_compliance_result'] + $iva_advisor_compliance_graph['iva_compliance_result'] + $iva_advisor_compliance_graph['confirmation_iva_compliance_result'];
                                                         @endphp
                                                                @if($iva_advisor_compliance_graph['fail_introducation_iva_compliance'] > 0 || $iva_advisor_compliance_graph['fail_vulnerability_iva_compliance'] > 0 || $iva_advisor_compliance_graph['fail_fact_find_iva_compliance'] > 0 || $iva_advisor_compliance_graph['fail_ie_iva_compliance'] > 0 || $iva_advisor_compliance_graph['fail_compliance_iva'] > 0 || $iva_advisor_compliance_graph['fail_iva_confirmation_compliance'] > 0)
                                                                <h1 class="text-center height-auto line-height-auto" id="get_total_da_result">45%</h1>
                                                                @else
                                                                <h1 class="text-center height-auto line-height-auto" id="get_total_da_result">{{ $result }}%</h1>
                                                                @endif
                                                    </div>
                                                    <form>
                                                        <input type="hidden" name="introduction_get_iva_compliance_graph_data" id="introduction_get_iva_compliance_graph_data" value="">
                                                        <input type="hidden" name="vulnerability_get_iva_compliance_graph_data" id="vulnerability_get_iva_compliance_graph_data" value="">
                                                        <input type="hidden" name="fact_find_get_iva_compliance_graph_data" id="fact_find_get_iva_compliance_graph_data" value="">
                                                        <input type="hidden" name="ie_get_iva_compliance_graph_data" id="ie_get_iva_compliance_graph_data" value="">
                                                        <input type="hidden" name="iva_get_iva_compliance_graph_data" id="iva_get_iva_compliance_graph_data" value="">
                                                        <input type="hidden" name="confirmation_get_iva_compliance_graph_data" id="confirmation_get_iva_compliance_graph_data" value="">
                                                    </form>
                                                </div>
                                                @else
                                                @endif
                                            </div>
                                            
                        </div>
                    </div>
                    </div>
                </div>
                <!-- // Right Column -->
            </div>
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

@if(!empty($iva_advisor_compliance_graph))

<script>
    
                var introduction_iva_compliance_data = $('#introduction_get_iva_compliance_graph_data').val();
                var vulnerability_iva_compliance_data = $('#vulnerability_get_iva_compliance_graph_data').val();
                var fact_find_iva_compliance_data = $('#fact_find_get_iva_compliance_graph_data').val();
                var ie_get_iva_compliance_data = $('#ie_get_iva_compliance_graph_data').val();
                var iva_compliance_data = $('#iva_get_iva_compliance_graph_data').val();
                var confirmation_iva_compliance_data = $('#confirmation_get_iva_compliance_graph_data').val();

                var ctx = document
                .getElementById('perfomance_chart_IVA')
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
                        'IVA',
                        'Confirmation'
                    ],
                    datasets: [
                        {
                            borderColor: '#008dcc',
                            fill:false,
                            borderWidth:0,
                            data: [
                                   <?php echo $iva_advisor_compliance_graph['introducation_iva_compliance_count'] ?>,
                                   <?php echo $iva_advisor_compliance_graph['vulnerability_iva_compliance_count'] ?>,
                                   <?php echo $iva_advisor_compliance_graph['fact_find_iva_compliance_count'] ?>,
                                   <?php echo $iva_advisor_compliance_graph['ie_iva_compliance_count'] ?>,
                                   <?php echo $iva_advisor_compliance_graph['iva_compliance_count'] ?>,
                                   <?php echo $iva_advisor_compliance_graph['confirmation_iva_compliance_count'] ?>,
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

    $(document).on('change','#filter_iva_compliance',function()
    {   
        var filter_text = $('option:selected', this).text();
       
        
        $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
            url : '{{ route('filter_iva_compliance_data') }}',
            method: 'post',
            data : {filter_text : filter_text},
            dataType : 'json',
            success : function(data)
            {
                var total = 0;

                var introduction_iva_count = JSON.parse(data.introducation_iva_compliance_count);
                $('.introduction_iva_count_total').text(introduction_iva_count + '% / 100%');

                var vulnerability_iva_count = JSON.parse(data.vulnerability_iva_compliance_count);
                $('.vulnerability_iva_count_total').text(vulnerability_iva_count + '% / 100%');
                
                var fact_find_iva_count = JSON.parse(data.fact_find_iva_compliance_count);
                $('.fact_find_iva_count_total').text(fact_find_iva_count + '% / 100%');

                var ie_iva_count = JSON.parse(data.ie_iva_compliance_count);
                $('.ie_iva_count_total').text(ie_iva_count + '% / 100%');

                var iva_compliance_count = JSON.parse(data.iva_compliance_count);
                $('.introduction_count_total').text(iva_compliance_count + '% / 100%');

                var confirmation_iva_count = JSON.parse(data.confirmation_iva_compliance_count);
                $('.confirmation_iva_count_total').text(confirmation_iva_count + '% / 100%');

                var total = JSON.parse(data.total_result_iva_compliance);
                

                $('#introduction_iva_count_get').text(introduction_iva_count + '%');
                $('#vulnerability_iva_count_get').text(vulnerability_iva_count + '%');
                $('#fact_find_iva_count_get').text(fact_find_iva_count + '%');
                $('#ie_iva_count_get').text(ie_iva_count + '%');
                $('#iva_count_get').text(iva_compliance_count + '%');
                $('#confirmation_iva_count_get').text(confirmation_iva_count + '%');


                $('#introduction_get_iva_compliance_graph_data').val(introduction_iva_count + '%');
                $('#vulnerability_get_iva_compliance_graph_data').val(vulnerability_iva_count + '%');
                $('#fact_find_get_iva_compliance_graph_data').val(fact_find_iva_count + '%');
                $('#ie_get_iva_compliance_graph_data').val(ie_iva_count + '%');
                $('#iva_get_iva_compliance_graph_data').val(iva_compliance_count + '%');
                $('#confirmation_get_iva_compliance_graph_data').val(confirmation_iva_count + '%');


            }
    });

});
    
    
    
</script>


@endsection
