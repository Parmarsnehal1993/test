<main class="main-content dmp-advisor">
    <!-- header  --> 
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
                            <strong>{{ $loginUser->name }}'s Workflow</strong>
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
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="card height-auto">
                            <div class="card-title mb-0">
                                Submitted
                            </div>
                            <div class="card-body height-auto">
                            <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="submitted">
                                    <h1 class="text-center height-auto line-height-auto mb-4 mt-4">{{ (isset($allCasesCount['totalSubmittedCount']) && !empty($allCasesCount['totalSubmittedCount'])) ? $allCasesCount['totalSubmittedCount'] : 0 }}</h1>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="card height-auto">
                            <div class="card-title mb-0">
                                Cancelled
                            </div>
                            <div class="card-body height-auto">
                                <a href="javascript:void(0)" class="statistics columnAjax d-block text-center" data-type="cancelled">
                                        <h1 class="text-center text-danger height-auto line-height-auto mb-4 mt-4">{{ (isset($allCasesCount['totalCancelledCount']) && !empty($allCasesCount['totalCancelledCount'])) ? $allCasesCount['totalCancelledCount'] : 0 }}</h1>
                                </a>
                            </div>
                        </div>
                        <div class="card height-auto">
                            <div class="card-title mb-0">
                                Failed
                            </div>
                            <div class="card-body height-auto">
                                <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="failed">
                                    <h1 class="text-center text-danger height-auto line-height-auto mb-4 mt-4">{{ (isset($allCasesCount['totalFailedCount']) && !empty($allCasesCount['totalFailedCount'])) ? $allCasesCount['totalFailedCount'] : 0 }}</h1>
                                </a>
                            </div>
                        </div>
                    </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="card" style="margin-left: -15px;margin-right: 10px;">
                    <div class="row m-0 mr-0">
                        <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8 br-primary">
                            <table class="table text-primary">
                                <tbody>
                                    <tr>
                                        <td>case sent</td>
                                        <td>{{ $monthlyCases }}</td>
                                    </tr>
                                    <tr>
                                        <td>DMP sent</td>
                                        <td>{{ $totalAgentDrafter }}</td>
                                    </tr>
                                    <tr>
                                        <td>IVA sent</td>
                                        <td>{{ $totalIvaSent }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="card-title">
                                <?php  echo date('F'); ?> Top 5
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table search-table text-center awaiating-table">
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
                                                @foreach($topMonthAgent['finalTopArr'] as $topMonthAgentKey => $topMonthAgentValue)
                                                    <tr>
                                                        <td>{{ $topCounter }}</td>
                                                        <td>{{ $topMonthAgent['userArray'][$topMonthAgentKey] }}</td>
                                                        <td>{{ isset($topMonthAgentValue['dmp']) ? $topMonthAgentValue['dmp'] : 0 }}</td>
                                                        <td>{{ isset($topMonthAgentValue['iva']) ? $topMonthAgentValue['iva'] : 0 }}</td>
                                                    </tr>
                                                    @php $topCounter++; @endphp
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
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