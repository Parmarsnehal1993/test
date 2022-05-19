 
    @php
        $totalIncome = 0;
        $totalOutgoings = 0;
        $totalPriorityDebtsPayment = 0;
        $totalUnsecuredDebtsPayment = 0;
        $totalPriorityDebtsPaymentOwned = 0;
        $totalUnsecuredDebtsPaymentOwned = 0;
        $totalDisposable = 0;
        $totalMonthlyUnsecuredDebts = 0;
        $totalYearlyUnsecuredDebts = 0;
        $totalMonthlyPriorityDebts = 0;
        $totalYearlyPriorityDebts = 0;
        $getTotalDebtsforReview = 0;
            
            $totalPriorityDebtsPayment = getPriorityDebtsPayment($userInfo->user_id);
            $totalIncome = getTotalIncome($userInfo->user_id);
            $totalOutgoings = getTotalOutcome($userInfo->user_id);
            $totalDisposable = $totalIncome - ($totalOutgoings + $totalPriorityDebtsPayment);
            $totalUnsecuredDebtsPayment = getNotPriorityDebtsPayment($userInfo->user_id);
        
            $totalPriorityDebtsPaymentOwned =getPriorityDebtsPaymentOwned($userInfo->user_id);
            $totalUnsecuredDebtsPaymentOwned =getNotPriorityDebtsPaymentOwned($userInfo->user_id);
            
            $res_user_debts = getTotalDebtAmountByUserId($userInfo->user_id);

        if(empty($totalIncome) && empty($totalOutgoings)) {
            $tempIncomeOutgoingData = getIncomeOutgoingDataFromQuickTable($userInfo->user_id);
            
            if(!empty($tempIncomeOutgoingData)) {
                if($tempIncomeOutgoingData->monthlyIncome == "" || $tempIncomeOutgoingData->monthlyIncome == null){
                    $totalIncome = 0;
                }else{
                $totalIncome = $tempIncomeOutgoingData->monthlyIncome;
                }
                
                if($tempIncomeOutgoingData->monthlySend == "" || $tempIncomeOutgoingData->monthlySend == null){
                    $totalOutgoings = 0;
                }else{
                    $totalOutgoings = $tempIncomeOutgoingData->monthlySend;
                }
                
                $totalDisposable = $totalIncome - ($totalOutgoings + $totalPriorityDebtsPayment);
                
                if(empty($res_user_debts)) {
                    $totalUnsecuredDebtsPayment = $tempIncomeOutgoingData->totalDebts;
                    $totalUnsecuredDebtsPaymentOwned = $tempIncomeOutgoingData->totalDebts;
                }
            }
            $totalPriorityDebtsPaymentOwned = getPriorityDebtsPaymentOwned($userInfo->user_id);
        }

        if ($totalDisposable > 0) {
            $totalMonthlyUnsecuredDebts = $totalUnsecuredDebtsPaymentOwned / $totalDisposable;
            $totalYearlyUnsecuredDebts = $totalMonthlyUnsecuredDebts / 12;
        }

        if ($totalPriorityDebtsPayment > 0) {
            $totalMonthlyPriorityDebts = $totalPriorityDebtsPaymentOwned / $totalPriorityDebtsPayment;

            $totalYearlyPriorityDebts = $totalMonthlyPriorityDebts / 12;
        }
         $getTotalDebtsforReview = getTotalDebts($userInfo->user_id);
         
    @endphp
    
    @if($loginUser->user_type == 3 || $loginUser->user_type == 1 || $loginUser->user_type == 5 || $loginUser->user_type == 6 || $loginUser->user_type == 7 || $loginUser->user_type == 8 || $loginUser->user_type == 9 || $loginUser->user_type == 10 || $loginUser->user_type == 11)
    <div class="row">

        <div class="col-6"></div>
        <div class="col-6">
            <div class="card-body">
                @php  $getSolutionCount = 0; @endphp
                @foreach($allAvailableSolutionsForReviewPage as $countSolutionKey => $countSolutionValue)
                    @if($countSolutionValue['enable'] == true)
                        @php $getSolutionCount++ @endphp
                    @endif
                @endforeach
                <h1 class="text-center text-success line-height-auto height-auto" style="text-transform: lowercase;">{{ $getSolutionCount }} Availble</h1>
            </div>
        </div>
    </div>
    @else
    <div class="card-body text-center">
        <h1 class="text-center">&#163;{{ number_format($totalDisposable) }}</h1>
        <h6>
            <strong>Disposable</strong>
        </h6>
    </div>
    @endif
    <div class="plus-sign" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#review">
        <img src="{!! asset('images/icons/Plus_Icon@2x.png')!!}" alt="Add" width="30">
    </div>
    <div id="review" class="modal fade review" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content card card-secondary">
                <div class="modal-header">
                    <div class="card-title">Reviews</div>
                    <button type="button" class="close alert_open">
                    <img src="{!! asset('images/icons/Cross_Icon@2x.png')!!}" alt="Close" class="img-fulid" width="40" height="40">
               
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="row mt-0">
                                        <div class="col-md-3">
                                            <div class="text-center text-primary">
                                                <span>income</span>
                                                
                                                <div class="counter income">
                                                    £&nbsp;{{ (isset($totalIncome) && !empty($totalIncome)) ? number_format($totalIncome) : 0 }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="text-center text-primary">
                                                <span>Outgoing</span>
                                                
                                                <div class="counter">
                                                    £&nbsp;{{ number_format($totalOutgoings) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="text-center text-primary">
                                                <span>Priority Debts Payment</span>
                                                <div class="counter">
                                                    £&nbsp;{{ number_format($totalPriorityDebtsPayment) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="text-center text-primary">
                                                <span>Disposable</span>
                                                
                                                <div class="counter">
                                                    £&nbsp;{{ number_format($totalDisposable) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            <div class="text-center text-primary">
                                                <span>Unsecured Debts Payment</span>
                                                <div class="counter">
                                                    {{-- £&nbsp;{{ number_format($getTotalDebtsforReview) }} --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="text-center text-primary">
                                                <span>Total Priority Debt Owned</span>
                                                <div class="counter">
                                                    £&nbsp;{{ number_format($totalPriorityDebtsPaymentOwned) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="text-center text-primary">
                                                <span>Unsecured Debts Owned</span>
                                                <div class="counter">
                                                    £&nbsp;{{ number_format($totalUnsecuredDebtsPaymentOwned) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="text-center text-primary">
                                                <span>Total Debts Owned</span>
                                                <div class="counter">
                                                   £&nbsp;{{ number_format($totalPriorityDebtsPaymentOwned + $totalUnsecuredDebtsPaymentOwned) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--<div id="show_calculated_solution_div"></div>-->
                        </div>
                        <div class="col-md-4">
                            <div class="card card-line">
                                <div class="card-title">
                                    Unsecured Debts
                                </div>
                                <div class="card-body">
                                    <p>
                                        Based on the disposable income and assuming the creditor freeze the interest to
                                        pay off your debts it will take
                                    </p>
                                    <strong>{{ round($totalMonthlyUnsecuredDebts, 2) }} Month</strong>
                                    <strong>{{ round($totalYearlyUnsecuredDebts, 2) }} Year</strong>
                                </div>
                            </div>
                            <div class="card card-line">
                                <div class="card-title">
                                   Priority Debts
                                </div>
                                <div class="card-body">
                                    <p>
                                        Based on your current payment schedule to pay off your debts It will take:
                                    </p>
                                    <strong>{{ round($totalMonthlyPriorityDebts, 2) }} Month</strong>
                                    <strong>{{ round($totalYearlyPriorityDebts, 2) }} Year</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 ml-0 mr-0">
                        @include('user.solution_calculation')
                       
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

