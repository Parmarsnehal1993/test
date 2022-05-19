@if($loginUser->user_type == 3 || $loginUser->user_type == 1 || $loginUser->user_type == 5 || $loginUser->user_type == 6 || $loginUser->user_type == 7 || $loginUser->user_type == 8 || $loginUser->user_type == 9 || $loginUser->user_type == 10 || $loginUser->user_type == 11)

<style type="text/css">
    
    .theme-overflow to .mt-0 .theme-overflow {
        top: 30px;
        min-height: 400px;
        position: relative;
        margin-right: 0px;
        padding-right: 20px;
        
    }
    @media (width:1920px){
    	#income_chart{
    		margin-top:0px;
    	}
    	.theme-overflow {
    	    top: 0px;
    	    min-height: 560px;
    	}	
    }
    #income_chart{margin-top:30px;}
</style>

<div class="row">
    <div class="col-6"></div>
    <div class="col-6">
        <div class="card-body">
            @php
            $totalIncome = getTotalIncome($userInfo->user_id);
            @endphp
            <h1 class="text-center line-height-auto height-auto calculated_total_income">
            £{{ number_format($totalIncome) }}
            </h1> 
        </div>
    </div>
</div>
@else
<div class="card-body">
    <h1 class="text-center mb-0"></h1>
</div>
    <div class="card-body">
            @php
            $totalIncome = getTotalIncome($userInfo->user_id);
            @endphp
        <h1 class="text-center calculated_total_income">&#163;{{ number_format($totalIncome) }}</h1>
    </div>
@endif

    <div class="plus-sign" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#income_modal">
        <img src="{!! asset('images/icons/Plus_Icon@2x.png')!!}" alt="Add" width="30">
    </div>
    <div id="income_modal" class="modal fade show income_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered bd-example-modal-sm" role="document">
            <div class="modal-content card card-secondary">
                <div class="modal-header">
                    <h1 class="modal-title">income</h1>
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
                                        <div class="theme-overflow">
                                            <div class="width-100">
                                            <ul class="table-body align-items-center flex-wrap income-data">
                                                <li>wages</li>
                                                @php $totalWages = 0; @endphp
                                                
                                                @if(isset($userIncomeWages['data'][0]['how_much_do_you_receive_in_rent_orboard']))
                                                    @php $totalWages += $userIncomeWages['data'][0]['how_much_do_you_receive_in_rent_orboard']; @endphp
                                                @endif
                                                @if(isset($userIncomeWages['data'][0]['partner_wage']))
                                                    @php $totalWages += $userIncomeWages['data'][0]['partner_wage']; @endphp
                                                @endif
                                                @if(isset($userIncomeWages['data'][0]['other_income']))
                                                    @php $totalWages += $userIncomeWages['data'][0]['other_income']; @endphp
                                                @endif
                                                @if(isset($userIncomeWages['data'][0]['partner_other_income']))
                                                    @php $totalWages += $userIncomeWages['data'][0]['partner_other_income']; @endphp
                                                @endif
                                                <li>
                                                <span style="margin-top:5px;">Total :</span>
                                                &#163;<span id="wage_total_value"> {{ number_format($totalWages)}}</span>
                                                    <a href="#" data-toggle="collapse" data-target="#wages_collapse">
                                                        <img src="{!! asset('images/icons/Plus_Icon@2x.png')!!}" alt="Plus" class="img-fluid" width="30">
                                                    </a>
                                                </li>
                                                <div id="wages_collapse" class="collapse scroll-y">
                                                    <input type="hidden" id="editIncomeWage" name="editIncomeWage" value="">
                                                    <div class="row">
                                                        @php $totalWages = 0; @endphp
                                                        <div class="col-md-9">
                                                            <span>1. Rent
                                                            </span>
                                                            <input type="number"
                                                            id="wage_1" name="Rent" value="{{ (isset($userIncomeWages['data'][0]['how_much_do_you_receive_in_rent_orboard']) && !empty($userIncomeWages['data'][0]['how_much_do_you_receive_in_rent_orboard'])) ? $userIncomeWages['data'][0]['how_much_do_you_receive_in_rent_orboard'] : 0 }}" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <span>2. Partner Wage
                                                            </span>
                                                            <input type="number" id="wage_2" name="partner_wage" value="{{ (isset($userIncomeWages['data'][0]['partner_wage']) && !empty($userIncomeWages['data'][0]['partner_wage'])) ? $userIncomeWages['data'][0]['partner_wage'] : 0 }}" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <span>3. Other Income
                                                            </span>
                                                            <input type="number" id="wage_3" name="other_income"
                                                            value="{{ (isset($userIncomeWages['data'][0]['other_income']) && !empty($userIncomeWages['data'][0]['other_income'])) ? $userIncomeWages['data'][0]['other_income'] : 0 }}"
                                                            class="form-control" placeholder="0">
                                                        </div>
                                                        
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-md-9">
                                                            <span>4. Partner Other income
                                                            </span>
                                                            <input type="number" id="wage_4" name="partner_other_income"
                                                            value="{{ (isset($userIncomeWages['data'][0]['how_much_do_you_receive_in_rent_orboard?']) && !empty($userIncomeWages['data'][0]['partner_other_income'])) ? $userIncomeWages['data'][0]['partner_other_income?'] : 0 }}"
                                                            class="form-control" placeholder="0">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <a href="javascipt:void(0)" class="wage_button btn btn-outline-info btn-large" id="wage-update">Update</a>
                                                        </div>
                                                    </div>
                                                    @if(isset($userIncomeWages['data'][0]['how_much_do_you_receive_in_rent_orboard']))
                                                                                     @php $totalWages += $userIncomeWages['data'][0]['how_much_do_you_receive_in_rent_orboard']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeWages['data'][0]['partner_wage']))
                                                                                    @php $totalWages += $userIncomeWages['data'][0]['partner_wage']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeWages['data'][0]['other_income']))
                                                                                    @php $totalWages += $userIncomeWages['data'][0]['other_income']; @endphp
                                                                        @endif
                                                                         @if(isset($userIncomeWages['data'][0]['partner_other_income']))
                                                                                    @php $totalWages += $userIncomeWages['data'][0]['partner_other_income']; @endphp
                                                                        @endif
                                                    <div class="col-12 total_income_wage">
                                                        Total Sum: {{  number_format($totalWages) }}
                                                    </div>
                                                </div>
                                            </ul>

                                            <ul class="table-body align-items-center flex-wrap income-data">
                                                <li>benefits</li>
                                                 @php $totalUserIncomeBenefits = 0; @endphp
                                                                        @if(isset($userIncomeBenefits['data'][0]['Jobseekers_1']))
                                                                            @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['Jobseekers_1']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['Jobseekers_2']))
                                                                                @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['Jobseekers_2']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_income_support']))
                                                                                @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_income_support']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_working_tax_credit']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_working_tax_credit']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_tax_credit']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_tax_credit']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_benefit']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_benefit']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['ESA']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['ESA']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['DLA']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['DLA']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['carers_allowance']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['carers_allowance']; @endphp
                                                                        @endif
                                                                        
                                                                        @if(isset($userIncomeBenefits['data'][0]['housing_benefit']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['housing_benefit']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['council_tax_reduction']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['council_tax_reduction']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['universal_credit']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['universal_credit']; @endphp
                                                                        @endif
                                                                         @if(isset($userIncomeBenefits['data'][0]['other_benefit']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['other_benefit']; @endphp
                                                                        @endif                     
                                                <li>
                                                <span style="margin-top:5px;">Total :</span>        
                                                &#163;<span id="benefit_total_value">{{ number_format($totalUserIncomeBenefits) }}</span>
                                                    <a href="#" data-toggle="collapse" data-target="#benifits_collapse">
                                                        <img src="{!! asset('images/icons/Plus_Icon@2x.png')!!}" alt="Plus" class="img-fluid" width="30">
                                                    </a>
                                                </li>
                                                <div id="benifits_collapse" class="collapse scroll-y">
                                                    {{-- form action="#" method="post" id="benefits-form">
                                                        @csrf
                                                        <input type="hidden" id="userId" name="userId" value="{{ $userInfo->user_id }}"> --}}
                                                        <input type="hidden" id="editIncomeBenefits" name="editIncomeBenefits" value="">
                                                        <div class="row">
                                                            @php $totalUserIncomeBenefits = 0; @endphp
                                                            <div class="col-md-9">
                                                                <span>1.Jobseekers 1</span>
                                                                <input type="number" id="Jobseekers_1" name="Jobseekers_1" class="form-control" value="{{ !empty($userIncomeBenefits['data'][0]['Jobseekers_1']) ? $userIncomeBenefits['data'][0]['Jobseekers_1'] : 0 }}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>2. Jobseekers 2
                                                                </span>
                                                                <input type="text" id="Jobseekers_2" name="Jobseekers_2" value="{{ !empty($userIncomeBenefits['data'][0]['Jobseekers_2']) ? $userIncomeBenefits['data'][0]['Jobseekers_2'] : 0 }}"class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>3. Income Support
                                                                </span>
                                                                <input type="text" class="form-control" id="benefit_3" name="income_support" value="{{ !empty($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_income_support']) ? $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_income_support'] : 0 }}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>4. Working Tax Credit
                                                                </span>
                                                                <input type="text" class="form-control" id="benefit_4" name="working_tax_credit" value="{{ !empty($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_working_tax_credit']) ? $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_working_tax_credit'] : 0 }}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>5.Child Tax Credit
                                                                </span>
                                                                <input type="text" class="form-control" id="benefit_5" name="child_tax_credit" value="{{ !empty($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_tax_credit']) ? $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_tax_credit'] : 0 }}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>6. Child Benefit
                                                                </span>
                                                                <input type="text" class="form-control" id="benefit_6" name="child_benefit" value="{{ !empty($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_benefit']) ? $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_benefit'] : 0 }}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>7.Employment & Support Allowance
                                                                </span>
                                                                <input type="text" class="form-control" id="benefit_7" name="employment_support_allowance" value="{{ !empty($userIncomeBenefits['data'][0]['ESA']) ? $userIncomeBenefits['data'][0]['ESA'] : 0 }}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                8. DLA, PIP or Attendance allowance
                                                                </span>
                                                                <input type="text" class="form-control" id="benefit_8" name="dla_pip_or_attendance_allowance" value="{{ !empty($userIncomeBenefits['data'][0]['DLA']) ? $userIncomeBenefits['data'][0]['DLA'] : 0 }}" placeholder="">
                                                            </div>
                                                           
                                                        </div>
                                                         <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                9. Carers Allowance
                                                                </span>
                                                                <input type="text" class="form-control" id="benefit_9" name="carers_allowance" value="{{ !empty($userIncomeBenefits['data'][0]['carers_allowance']) ? $userIncomeBenefits['data'][0]['carers_allowance'] : 0 }}" placeholder="">
                                                            </div>
                                                           
                                                        </div>
                                                         <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                8. Housing Benefit
                                                                </span>
                                                                <input type="text" class="form-control" id="benefit_10" name="housing_benefit" value="{{ !empty($userIncomeBenefits['data'][0]['housing_benefit']) ? $userIncomeBenefits['data'][0]['housing_benefit'] : 0 }}" placeholder="">
                                                            </div>
                                                           
                                                        </div>
                                                         <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                10. Council Tax Reduction
                                                                </span>
                                                                <input type="text" class="form-control" id="benefit_11" name="council_tax_reduction" value="{{ !empty($userIncomeBenefits['data'][0]['council_tax_reduction']) ? $userIncomeBenefits['data'][0]['council_tax_reduction'] : 0 }}" placeholder="">
                                                            </div>
                                                            
                                                        </div>
                                                         <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                11. Universal Credit
                                                                </span>
                                                                <input type="text" class="form-control" id="benefit_12" name="universal_credit" value="{{ !empty($userIncomeBenefits['data'][0]['universal_credit']) ? $userIncomeBenefits['data'][0]['universal_credit'] : 0 }}" placeholder="">
                                                            </div>
                                                            
                                                        </div>
                                                         <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                12.Other Benefit
                                                                </span>
                                                                <input type="text" class="form-control" id="benefit_13" name="other_benefit" value="{{ !empty($userIncomeBenefits['data'][0]['other_benefit']) ? $userIncomeBenefits['data'][0]['other_benefit'] : 0 }}" placeholder="">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a href="#" class="btn btn-outline-info btn-large" id="benefit-update">Update</a>
                                                            </div>
                                                        </div>
                                                    {{-- </form> --}}
                                                                        @if(isset($userIncomeBenefits['data'][0]['Jobseekers_1']))
                                                                                @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['Jobseekers_1']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['Jobseekers_2']))
                                                                                @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['Jobseekers_2']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_income_support']))
                                                                                @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_income_support']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_working_tax_credit']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_working_tax_credit']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_tax_credit']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_tax_credit']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_benefit']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_benefit']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['ESA']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['ESA']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['DLA']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['DLA']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['carers_allowance']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['carers_allowance']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['council_tax_reduction']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['council_tax_reduction']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['council_tax_reduction']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['council_tax_reduction']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['universal_credit']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['universal_credit']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['other_benefit']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['other_benefit']; @endphp
                                                                        @endif
                                                                            <div class="col-12 total_income_benefit">
                                                                            Total Sum: {{ number_format($totalUserIncomeBenefits) }}

                                                                            </div>
                                                </div>
                                            </ul>
                                            <!-- User income wages code end -->

                                            <!-- User income pension code start -->
                                            <ul class="table-body align-items-center flex-wrap income-data">
                                                <li>pension</li>
                                                @php $totalUserIncomePensions = 0; @endphp
                                                
                                                 @if(isset($userIncomePensions['data'][0]['how_much_do_you_receive_from_your_state_pension']))
                                                                                @php $totalUserIncomePensions += $userIncomePensions['data'][0]['how_much_do_you_receive_from_your_state_pension']; @endphp
                                                                    @endif
                                                                    @if(isset($userIncomePensions['data'][0]['how_much_do_you_receive_from_your_private_pension']))
                                                                                @php $totalUserIncomePensions += $userIncomePensions['data'][0]['how_much_do_you_receive_from_your_private_pension']; @endphp
                                                                    @endif
                                                                    @if(isset($userIncomePensions['data'][0]['how_much_do_you_receive_in_pension_credit']))
                                                                                 @php $totalUserIncomePensions += $userIncomePensions['data'][0]['how_much_do_you_receive_in_pension_credit']; @endphp
                                                                    @endif
                                                                    @if(isset($userIncomePensions['data'][0]['other_pension']))
                                                                                 @php $totalUserIncomePensions += $userIncomePensions['data'][0]['other_pension']; @endphp
                                                                    @endif

                                                
                                                <li>
                                                <span style="margin-top:5px;">Total :</span>        
                                                &#163;<span id="pension_total_value">{{ number_format($totalUserIncomePensions) }}</span>
                                                    <a href="#" data-toggle="collapse" data-target="#pension_collapse">
                                                        <img src="{!! asset('images/icons/Plus_Icon@2x.png')!!}" alt="Plus" class="img-fluid" width="30">
                                                    </a>
                                                </li>
                                                <div id="pension_collapse" class="collapse scroll-y">
                                                    {{-- <form action="#" id="pension-form" method="post">
                                                        @csrf
                                                        <input type="hidden" id="userId" name="userId" value="{{ $userInfo->user_id }}"> --}}
                                                        <input type="hidden" id="editIncomePensions" name="editIncomePensions" value="">
                                                        @php $totalUserIncomePensions = 0; @endphp
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>1.State Pension
                                                                </span>
                                                                <input type="text" class="form-control" id="pension_1" name="state_pension" value="{{ !empty($userIncomePensions['data'][0]['how_much_do_you_receive_from_your_state_pension']) ? $userIncomePensions['data'][0]['how_much_do_you_receive_from_your_state_pension'] : 0 }}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>2.  Private Pension
                                                                </span>
                                                                <input type="text" class="form-control" id="pension_2" name="private_pension" value="{{ !empty($userIncomePensions['data'][0]['how_much_do_you_receive_from_your_private_pension']) ? $userIncomePensions['data'][0]['how_much_do_you_receive_from_your_private_pension'] : 0 }}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>3. Pension Credit
                                                                </span>
                                                                <input type="text" class="form-control" id="pension_3" name="pension_credit" value="{{ !empty($userIncomePensions['data'][0]['how_much_do_you_receive_in_pension_credit']) ? $userIncomePensions['data'][0]['how_much_do_you_receive_in_pension_credit'] : 0 }}" placeholder="">
                                                            </div>
                                                        </div>
                                                         <div class="row">
                                                            <div class="col-md-9">
                                                                <span>3. Other Pension
                                                                </span>
                                                                <input type="text" class="form-control" id="pension_4" name="other_pension" value="{{ !empty($userIncomePensions['data'][0]['other_pension']) ? $userIncomePensions['data'][0]['other_pension'] : 0 }}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9"></div>
                                                            <div class="col-md-3">
                                                                <a href="" class="btn btn-outline-info btn-large" id="pension-update">Update</a>
                                                            </div>
                                                        </div>
                                                    {{-- </form> --}}
                                                                    @if(isset($userIncomePensions['data'][0]['how_much_do_you_receive_from_your_state_pension']))
                                                                                @php $totalUserIncomePensions += $userIncomePensions['data'][0]['how_much_do_you_receive_from_your_state_pension']; @endphp
                                                                    @endif
                                                                    @if(isset($userIncomePensions['data'][0]['how_much_do_you_receive_from_your_private_pension']))
                                                                                @php $totalUserIncomePensions += $userIncomePensions['data'][0]['how_much_do_you_receive_from_your_private_pension']; @endphp
                                                                    @endif
                                                                    @if(isset($userIncomePensions['data'][0]['how_much_do_you_receive_in_pension_credit']))
                                                                                 @php $totalUserIncomePensions += $userIncomePensions['data'][0]['how_much_do_you_receive_in_pension_credit']; @endphp
                                                                    @endif
                                                                     @if(isset($userIncomePensions['data'][0]['other_pension']))
                                                                                 @php $totalUserIncomePensions += $userIncomePensions['data'][0]['other_pension']; @endphp
                                                                    @endif
                                                                     <div class="col-12 total_income_pensions">
                                                                     Total Sum: {{  number_format($totalUserIncomePensions) }}
                                                                     </div>         
                                                                    
                                                </div>
                                            </ul>
                                            <ul class="table-body align-items-center flex-wrap income-data">
                                                <li>Other income</li>
                                                @php $totaluserOtherIncome = 0; @endphp
                                                
                                                 @if(isset($userOtherIncome['data'][0]['child_support_maintanance']))
                                                                                @php $totaluserOtherIncome += $userOtherIncome['data'][0]['child_support_maintanance']; @endphp
                                                                    @endif
                                                                    @if(isset($userOtherIncome['data'][0]['board_lodge']))
                                                                                @php $totaluserOtherIncome += $userOtherIncome['data'][0]['board_lodge']; @endphp
                                                                    @endif
                                                                    @if(isset($userOtherIncome['data'][0]['non_dependednt_contibution']))
                                                                                 @php $totaluserOtherIncome += $userOtherIncome['data'][0]['non_dependednt_contibution']; @endphp
                                                                    @endif
                                                                    @if(isset($userOtherIncome['data'][0]['other_pension']))
                                                                                 @php $totaluserOtherIncome += $userOtherIncome['data'][0]['other_pension']; @endphp
                                                                    @endif
                                                                     @if(isset($userOtherIncome['data'][0]['student_loans_Grants']))
                                                                                 @php $totaluserOtherIncome += $userOtherIncome['data'][0]['student_loans_Grants']; @endphp
                                                                    @endif
                                                                    

                                                
                                                <li>
                                                <span style="margin-top:5px;">Total :</span>        
                                                &#163;<span id="other_icome_total_value">{{ number_format($totaluserOtherIncome) }}</span>
                                                    <a href="#" data-toggle="collapse" data-target="#other_income_collapse">
                                                        <img src="{!! asset('images/icons/Plus_Icon@2x.png')!!}" alt="Plus" class="img-fluid" width="30">
                                                    </a>
                                                </li>
                                                <div id="other_income_collapse" class="collapse scroll-y">
                                                    {{-- <form action="#" id="pension-form" method="post">
                                                        @csrf
                                                        <input type="hidden" id="userId" name="userId" value="{{ $userInfo->user_id }}"> --}}
                                                        <input type="hidden" id="editIncomePensions" name="editIncomePensions" value="">
                                                        @php $totaluserOtherIncome = 0; @endphp
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>1.Child Support / Maintanance
                                                                </span>
                                                                <input type="text" class="form-control" id="other_income1" name="chat_support_maintanance" value="{{ !empty($userOtherIncome['data'][0]['child_support_maintanance']) ? $userOtherIncome['data'][0]['child_support_maintanance'] : 0 }}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>2.  Board / Lodge
                                                                </span>
                                                                <input type="text" class="form-control" id="other_income2" name="board_lodge" value="{{ !empty($userOtherIncome['data'][0]['board_lodge']) ? $userOtherIncome['data'][0]['board_lodge'] : 0 }}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>3. Non Dependednt Contibution
                                                                </span>
                                                                <input type="text" class="form-control" id="other_income3" name="non_dependednt_contibution" value="{{ !empty($userOtherIncome['data'][0]['non_dependednt_contibution']) ? $userOtherIncome['data'][0]['non_dependednt_contibution'] : 0 }}" placeholder="">
                                                            </div>
                                                        </div>
                                                         <div class="row">
                                                            <div class="col-md-9">
                                                                <span>3. Student Loans & Grants
                                                                </span>
                                                                <input type="text" class="form-control" id="other_income4" name="student_loans_Grants" value="{{ !empty($userOtherIncome['data'][0]['student_loans_Grants']) ? $userOtherIncome['data'][0]['student_loans_Grants'] : 0 }}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9"></div>
                                                            <div class="col-md-3">
                                                                <a href="" class="btn btn-outline-info btn-large" id="other-income-update">Update</a>
                                                            </div>
                                                        </div>
                                                    {{-- </form> --}}
                                                                    @if(isset($userOtherIncome['data'][0]['child_support_maintanance']))
                                                                                @php $totaluserOtherIncome += $userOtherIncome['data'][0]['child_support_maintanance']; @endphp
                                                                    @endif
                                                                    @if(isset($userOtherIncome['data'][0]['board_lodge']))
                                                                                @php $totaluserOtherIncome += $userOtherIncome['data'][0]['board_lodge']; @endphp
                                                                    @endif
                                                                    @if(isset($userOtherIncome['data'][0]['non_dependednt_contibution']))
                                                                                 @php $totaluserOtherIncome += $userOtherIncome['data'][0]['non_dependednt_contibution']; @endphp
                                                                    @endif
                                                                     @if(isset($userOtherIncome['data'][0]['student_loans_Grants']))
                                                                                 @php $totaluserOtherIncome += $userOtherIncome['data'][0]['student_loans_Grants']; @endphp
                                                                    @endif
                                                                     <div class="col-12 total_other_income">
                                                                     Total Sum: {{  number_format($totaluserOtherIncome) }}
                                                                     </div>         
                                                                    
                                                </div>
                                            </ul>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="percenatge">
                                <h3>Wages: £ {{ number_format($totalWages,2) }}</h3>
                                <h3>Pensions:£ {{ number_format($totalUserIncomeBenefits,2) }}</h3>
                                <h3>Benefits:£ {{ number_format($totalUserIncomePensions,2) }}</h3>
                                <h3>Other:£ {{ number_format($totaluserOtherIncome,2) }}</h3>
                                <h3>Total:£ {{ number_format($totalWages + $totalUserIncomeBenefits + $totalUserIncomePensions + $totaluserOtherIncome,2)  }} </h3>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- <canvas id="income" width="400" height="400"></canvas> -->
                            <canvas id="income_chart" width="400" height="400"></canvas>
                            <div id="labels"></div>
                            <div class="modal-footer mt-4 mb-4 float-right">
                                 <a href="{{url ('user/Income_Wages_export',$userInfo->user_id)}}" class="btn btn-outline-info float-right btn-large">Wages</a>
                                <a  href="{{url ('user/Income_Benefits_export',$userInfo->user_id)}}" class="btn btn-outline-info float-right btn-large" >Benefits</a>
                                <a href="{{url ('user/Income_Pensions_export',$userInfo->user_id)}}"class="btn btn-outline-info float-right btn-large" >Pensions</a>
                                <a href="javascipt:void(0)" class="btn btn-outline-info float-right btn-large d-none" data-dismiss="modal">Update</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">

    $('#wage-update').click(function(e){
        e.preventDefault();
        
        var userId = $('#userId').val();
        var editIncomeWage = $('#editIncomeWage').val();
        var wage_1 = $('#wage_1').val();
        if(wage_1 == '') { wage_1 = 0; }
        var wage_2 = $('#wage_2').val();
        if(wage_2 == '') { wage_2 = 0; }
        var wage_3  = $('#wage_3').val();
        if(wage_3 == '') { wage_3 = 0; }
        var wage_4  = $('#wage_4').val();
        if(wage_4 == '') { wage_4 = 0; }


        var wage_total = parseInt(wage_1) + parseInt(wage_2) + parseInt(wage_3) + parseInt(wage_4);
        var wage_total = ReplaceNumberWithCommas(wage_total);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'{{ route('user.update_user_income_wages') }}',
            method:'post',
            dataType:'json',
            data: {
                "userId" : userId,
                "editIncomeWage" : editIncomeWage,
                "rent" : wage_1,
                "partner_wage" : wage_2,
                "other_income" : wage_3,
                "partner_other_income" : wage_4
            },
            success:function success(data) {
                var messageIcon = 'error';

                     if (data == 'success') {
                        //var wage_total_value_js = $('#wage_total_value').text();
                        var bottom_total_income_wage = 'Total Sum: £ ' + wage_total;

                        $('#wage_total_value').text(wage_total);
                        $('.total_income_wage').html(bottom_total_income_wage);

                        var total_income_benefits_js = $('#benefit_total_value').text();
                        var total_income_pensions_js = $('#pension_total_value').text();
                        var total_income = parseInt(total_income_benefits_js) + parseInt(total_income_pensions_js) + parseInt(wage_total);

                        $('.calculated_total_income').html('£ ' + total_income);
                        var message = 'Data Saved Successfully';
                        var messageIcon = 'success';
                    } else {
                           var message = 'something wrong please try again';
                    }
                    swal(message, {
                        icon: messageIcon,
                    });
                    location.reload();

            }
        });
    });



    $('#benefit-update').click(function(e){
        e.preventDefault();
        var userId = $('#userId').val();
        var editIncomeBenefits = '';
        var benefit_1 = $('#Jobseekers_1').val();
        if(benefit_1 == '') { benefit_1 = 0; }
        var benefit_2 = $('#Jobseekers_2').val();
        if(benefit_2 == '') { benefit_2 = 0; }
        var benefit_3 = $('#benefit_3').val();
        if(benefit_3 == '') { benefit_3 = 0; }
        var benefit_4 = $('#benefit_4').val();
        if(benefit_4 == '') { benefit_4 = 0; }
        var benefit_5 = $('#benefit_5').val();
        if(benefit_5 == '') { benefit_5 = 0; }
        var benefit_6 = $('#benefit_6').val();
        if(benefit_6 == '') { benefit_6 = 0; }
        var benefit_7 = $('#benefit_7').val();
        if(benefit_7 == '') { benefit_7 = 0; }
        var benefit_8 = $('#benefit_8').val();
        if(benefit_8 == '') { benefit_8 = 0; }

        var benefit_9 = $('#benefit_9').val();
        if(benefit_9 == '') { benefit_9 = 0; }
        var benefit_10 = $('#benefit_10').val();
        if(benefit_10 == '') { benefit_10 = 0; }
        var benefit_11 = $('#benefit_11').val();
        if(benefit_11 == '') { benefit_11 = 0; }
        var benefit_12 = $('#benefit_12').val();
        if(benefit_12 == '') { benefit_12 = 0; }
        var benefit_13 = $('#benefit_13').val();
        if(benefit_13 == '') { benefit_13 = 0; }

        var benefit_total = parseInt(benefit_1) + parseInt(benefit_2) + parseInt(benefit_3) + parseInt(benefit_4) + parseInt(benefit_5) + parseInt(benefit_6) + parseInt(benefit_7) + parseInt(benefit_8) + parseInt(benefit_9) + parseInt(benefit_10) + parseInt(benefit_11) + parseInt(benefit_12) + parseInt(benefit_13);

        var benefit_total = ReplaceNumberWithCommas(benefit_total);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'{{ route('user.update_user_income_benefits') }}',
            type:'post',
            dataType:'json',
            data:{
                "userId" : userId,
                "editIncomeBenefits" : editIncomeBenefits,
                "Jobseekers_1" : benefit_1,
                "Jobseekers_2" : benefit_2,
                "income_support" : benefit_3,
                "working_tax_credit" : benefit_4,
                "child_tax_credit" : benefit_5,
                "child_benefit" : benefit_6,
                "employment_support_allowance" : benefit_7,
                "dla_pip_or_attendance_allowance" : benefit_8,
                "carers_allowance" : benefit_9,
                "housing_benefit" : benefit_10,
                "council_tax_reduction" : benefit_11,
                "universal_credit" : benefit_12,
                "other_benefit" : benefit_13
            },
            success:function(data) {
                 var messageIcon = 'error';

                     if (data == 'success') {
                        //var benefit_total_value_js = $('#benefit_total_value').text();
                        var bottom_total_income_benefit = 'Total Sum: £ ' + benefit_total;

                        // To add top right corner total
                        $('#benefit_total_value').text(benefit_total);
                        // To add bottom side total
                        $('.total_income_benefit').html(bottom_total_income_benefit);

                        // To add total in dashboard for income
                        var total_income_wage_js = $('#wage_total_value').text();
                        var total_income_pensions_js = $('#pension_total_value').text();
                        var total_income = parseInt(total_income_wage_js) + parseInt(total_income_pensions_js) + parseInt(benefit_total);

                        $('.calculated_total_income').html('£ ' + total_income);

                        var message = 'Data Saved Successfully';
                        var messageIcon = 'success';
                    } else {
                           var message = 'something wrong please try again';
                    }
                    swal(message, {
                        icon: messageIcon,
                    });
                    
                    location.reload();
                    
            }
        });
        
    });

    $('#pension-update').click(function(e){
        e.preventDefault(); 
        var userId = $('#userId').val();
        var editIncomePensions = '';
        var pension_1 = $('#pension_1').val();
        if(pension_1 == '') { pension_1 = 0; }

        var pension_2 = $('#pension_2').val();
        if(pension_2 == '') { pension_2 = 0; }

        var pension_3 = $('#pension_3').val();
        if(pension_3 == '') { pension_3 = 0; }

        var pension_4 = $('#pension_4').val();
        if(pension_4 == '') { pension_4 = 0; }        

        var pension_total = parseInt(pension_1) + parseInt(pension_2) + parseInt(pension_3) +  parseInt(pension_4);

        var pension_total = ReplaceNumberWithCommas(pension_total);
        
        $.ajax({ 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'{{ route('user.update_user_income_pensions') }}',
            type:'post',
            dataType:'json',
            data:{
                "userId" : userId,
                "editIncomePensions" : editIncomePensions,
                "state_pension" : pension_1,
                "private_pension" : pension_2,
                "pension_credit" : pension_3,
                "other_pension" : pension_4
            },
            success:function(data) {
                var messageIcon = 'error';

                     if (data == 'success') {
                        //var pension_total_value_js = $('#pension_total_value').text();
                        var bottom_total_income_wage = 'Total Sum: £ ' + pension_total;

                        // To add top right corner total
                        $('#pension_total_value').text(pension_total);
                        // To add bottom side total
                        $('.total_income_pensions').html(bottom_total_income_wage);

                        // To add total in dashboard for income
                        var total_income_wage_js = $('#wage_total_value').text();
                        var total_income_pensions_js = $('#benefit_total_value').text();
                        var total_income = parseInt(total_income_wage_js) + parseInt(total_income_pensions_js) + parseInt(pension_total);

                        $('.calculated_total_income').html('£ ' + total_income);

                        var message = 'Data Saved Successfully';
                        var messageIcon = 'success';
                    } else {
                           var message = 'something wrong please try again';
                    }
                      swal(message, {
                        icon: messageIcon,
                    });
                    
                    location.reload();
            }
        });
    });

     $('#other-income-update').click(function(e){
        e.preventDefault(); 
        var userId = $('#userId').val();
        var editIncomePensions = '';
        var other_income1 = $('#other_income1').val();
        if(other_income1 == '') { other_income1 = 0; }

        var other_income2 = $('#other_income2').val();
        if(other_income2 == '') { other_income2 = 0; }

        var other_income3 = $('#other_income3').val();
        if(other_income3 == '') { other_income3 = 0; }

        var other_income4 = $('#other_income4').val();
        if(other_income4 == '') { other_income4 = 0; }        

        var other_income_total = parseInt(other_income1) + parseInt(other_income2) + parseInt(other_income3) +  parseInt(other_income4);

        var other_income_total = ReplaceNumberWithCommas(other_income_total);
        
        $.ajax({ 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'{{ route('user.update_user_other_income') }}',
            type:'post',
            dataType:'json',
            data:{
                "userId" : userId,
                "editIncomePensions" : editIncomePensions,
                "child_support_maintanance" : other_income1,
                "board_lodge" : other_income2,
                "non_dependednt_contibution" : other_income3,
                "student_loans_Grants" : other_income4
            },
            success:function(data) {
                var messageIcon = 'error';

                     if (data == 'success') {
                        //var pension_total_value_js = $('#pension_total_value').text();
                        var bottom_total_income_wage = 'Total Sum: £ ' + other_income_total;

                        // To add top right corner total
                        $('#other_icome_total_value').text(other_income_total);
                        // To add bottom side total
                        $('.total_other_income').html(bottom_total_income_wage);

                        // To add total in dashboard for income
                        var total_income_wage_js = $('#wage_total_value').text();
                        var total_other_income_js = $('#benefit_total_value').text();
                        var total_income = parseInt(total_income_wage_js) + parseInt(total_other_income_js) + parseInt(other_income_total);

                        $('.calculated_total_income').html('£ ' + total_income);

                        var message = 'Data Saved Successfully';
                        var messageIcon = 'success';
                    } else {
                           var message = 'something wrong please try again';
                    }
                      swal(message, {
                        icon: messageIcon,
                    });
                    
                    location.reload();
            }
        });
    });
    
        var wage_income_total = <?php echo $totalWages; ?>;
        
        var benefit_income_total = <?php echo $totalUserIncomeBenefits; ?>;
        
        var pension_income_total = <?php echo $totalUserIncomePensions; ?>;

        var other_income_total = <?php echo $totaluserOtherIncome; ?>;
        
    
        var ctx = document.getElementById('income_chart').getContext('2d');

    if ($("#income_chart").length) {
      var incomeChartdata = {
        datasets: [{
        data: [wage_income_total,benefit_income_total,pension_income_total,other_income_total],
          backgroundColor: [
            '#00538f',
            '#047fdb',
            '#4bb2ff',
            '#4682B4'
          ],
          hoverBackgroundColor: [
            '#00538f',
            '#047fdb',
            '#4bb2ff',
            '#4682B4'
          ],
          borderColor: [
            
          ],
          legendColor: [
            '#00538f',
            '#047fdb',
            '#4bb2ff',
            '#4682B4'
          ]
        }],
    
        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
          'Wages',
          'Benefits',
          'Pension',
          'other Income'
        ]
      };
      var incomeChartoption = {
        responsive: true,
        animation: {
          animateScale: false,
          animateRotate: false
        },
        legend: false,
        legendCallback: function(chart) {
          var text = []; 
          text.push('<div class="mt-3" style="max-width: 50%;margin: auto;">'); 
          for (var i = 0; i < incomeChartdata.datasets[0].data.length; i++) { 
              text.push('<span style="width: 100%;float: left;margin-left:30px;"><span class="legend-dots" style="width: 10px;height: 10px;border-radius: 100%;display: inline-block;margin-right: 10px;background:' + 
              incomeChartdata.datasets[0].legendColor[i] + 
                          '"></span>'); 
              if (incomeChartdata.labels[i]) { 
                  text.push(incomeChartdata.labels[i]); 
              }
              text.push('<span class="float-right d-none">'+incomeChartdata.datasets[0].data[i]+"%"+'</span>')
              text.push('</span>'); 
          } 
          text.push('</div>'); 
          return text.join('');
        }
      };
      var incomeChartCanvas = $("#income_chart").get(0).getContext("2d");
      var incomeChart = new Chart(incomeChartCanvas, {
        type: 'doughnut',
        data: incomeChartdata,
        options: incomeChartoption
      });
      $("#labels").html(incomeChart.generateLegend());      
    }





</script>

