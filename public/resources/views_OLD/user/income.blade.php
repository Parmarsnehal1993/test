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
                                                
                                                @if(isset($userIncomeWages['data'][0]['how_much_do_you_receive_wage_?']))
                                                    @php $totalWages += $userIncomeWages['data'][0]['how_much_do_you_receive_wage_?']; @endphp
                                                @endif
                                                @if(isset($userIncomeWages['data'][0]['how_much_do_you_receive_in_part_time_wages_?']))
                                                    @php $totalWages += $userIncomeWages['data'][0]['how_much_do_you_receive_in_part_time_wages_?']; @endphp
                                                @endif
                                                @if(isset($userIncomeWages['data'][0]['how_much_do_you_receive_in_rent_orboard?']))
                                                    @php $totalWages += $userIncomeWages['data'][0]['how_much_do_you_receive_in_rent_orboard?']; @endphp
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
                                                            <span>1. how much do you receive as a wage?
                                                            </span>
                                                            <input type="number"
                                                            id="wage_1" name="how_much_do_you_receive_wage_?" value="{{ (isset($userIncomeWages['data'][0]['how_much_do_you_receive_wage_?']) && !empty($userIncomeWages['data'][0]['how_much_do_you_receive_wage_?'])) ? $userIncomeWages['data'][0]['how_much_do_you_receive_wage_?'] : 0 }}" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <span>2. how much do you receive in part time wages?
                                                            </span>
                                                            <input type="number" id="wage_2" name="how_much_do_you_receive_in_part_time_wages_?" value="{{ (isset($userIncomeWages['data'][0]['how_much_do_you_receive_in_part_time_wages_?']) && !empty($userIncomeWages['data'][0]['how_much_do_you_receive_in_part_time_wages_?'])) ? $userIncomeWages['data'][0]['how_much_do_you_receive_in_part_time_wages_?'] : 0 }}" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <span>3. how much do you receive in rent onboard?
                                                            </span>
                                                            <input type="number" id="wage_3" name="how_much_do_you_receive_in_rent_orboard?"
                                                            value="{{ (isset($userIncomeWages['data'][0]['how_much_do_you_receive_in_rent_orboard?']) && !empty($userIncomeWages['data'][0]['how_much_do_you_receive_in_rent_orboard?'])) ? $userIncomeWages['data'][0]['how_much_do_you_receive_in_rent_orboard?'] : 0 }}"
                                                            class="form-control" placeholder="0">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <a href="javascipt:void(0)" class="wage_button btn btn-outline-info btn-large" id="wage-update">Update</a>
                                                        </div>
                                                    </div>
                                                    @if(isset($userIncomeWages['data'][0]['how_much_do_you_receive_wage_?']))
                                                                                     @php $totalWages += $userIncomeWages['data'][0]['how_much_do_you_receive_wage_?']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeWages['data'][0]['how_much_do_you_receive_in_part_time_wages_?']))
                                                                                    @php $totalWages += $userIncomeWages['data'][0]['how_much_do_you_receive_in_part_time_wages_?']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeWages['data'][0]['how_much_do_you_receive_in_rent_orboard?']))
                                                                                    @php $totalWages += $userIncomeWages['data'][0]['how_much_do_you_receive_in_rent_orboard?']; @endphp
                                                                        @endif
                                                    <div class="col-12 total_income_wage">
                                                        Total Sum: {{  number_format($totalWages) }}
                                                    </div>
                                                </div>
                                            </ul>

                                            <ul class="table-body align-items-center flex-wrap income-data">
                                                <li>benefits</li>
                                                 @php $totalUserIncomeBenefits = 0; @endphp
                                                  @if(isset($userIncomeBenefits['data'][0]['ESA']))
                                                                                @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['ESA']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['JSA']))
                                                                                @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['JSA']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_working_tax_credit_?']))
                                                                                @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_working_tax_credit_?']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_income_support']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_income_support']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['DLA']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['DLA']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_benefit']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_benefit']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_support_or_CSA']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_support_or_CSA']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_tax_credit']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_tax_credit']; @endphp
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
                                                                <span>1.how much do you receive in employement and support allowance?</span>
                                                                <input type="number" id="ESA" name="ESA" class="form-control" value="{{ !empty($userIncomeBenefits['data'][0]['ESA']) ? $userIncomeBenefits['data'][0]['ESA'] : 0 }}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>2. how much do you receive in jobseekers allowance (jsa)?
                                                                </span>
                                                                <input type="text" id="JSA" name="JSA" value="{{ !empty($userIncomeBenefits['data'][0]['JSA']) ? $userIncomeBenefits['data'][0]['JSA'] : 0 }}"class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>3. how much do you receive in working tax credit?
                                                                </span>
                                                                <input type="text" class="form-control" id="benefit_3" name="How_much_do_you_receive_in_working_tax_credit_?" value="{{ !empty($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_working_tax_credit_?']) ? $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_working_tax_credit_?'] : 0 }}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>4. how much do you receive in income support?
                                                                </span>
                                                                <input type="text" class="form-control" id="benefit_4" name="How_much_do_you_receive_in_income_support" value="{{ !empty($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_income_support']) ? $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_income_support'] : 0 }}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>5.how much do you receive in disabilityliving allowance (dla)?
                                                                </span>
                                                                <input type="text" class="form-control" id="DLA" name="DLA" value="{{ !empty($userIncomeBenefits['data'][0]['DLA']) ? $userIncomeBenefits['data'][0]['DLA'] : 0 }}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>6. how much do you receive in child benefit?
                                                                </span>
                                                                <input type="text" class="form-control" id="benefit_5" name="How_much_do_you_receive_in_child_benefit" value="{{ !empty($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_benefit']) ? $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_benefit'] : 0 }}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>7.how much do you receive in child support or csa?
                                                                </span>
                                                                <input type="text" class="form-control" id="benefit_6" name="How_much_do_you_receive_in_child_support_or_CSA" value="{{ !empty($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_support_or_CSA']) ? $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_support_or_CSA'] : 0 }}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                8. how much do you receive in child tax credit?
                                                                </span>
                                                                <input type="text" class="form-control" id="benefit_7" name="How_much_do_you_receive_in_child_tax_credit" value="{{ !empty($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_tax_credit']) ? $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_tax_credit'] : 0 }}" placeholder="">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a href="#" class="btn btn-outline-info btn-large" id="benefit-update">Update</a>
                                                            </div>
                                                        </div>
                                                    {{-- </form> --}}
                                                                        @if(isset($userIncomeBenefits['data'][0]['ESA']))
                                                                                @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['ESA']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['JSA']))
                                                                                @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['JSA']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_working_tax_credit_?']))
                                                                                @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_working_tax_credit_?']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_income_support']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_income_support']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['DLA']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['DLA']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_benefit']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_benefit']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_support_or_CSA']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_support_or_CSA']; @endphp
                                                                        @endif
                                                                        @if(isset($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_tax_credit']))
                                                                                    @php $totalUserIncomeBenefits += $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_tax_credit']; @endphp
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
                                                
                                                 @if(isset($userIncomePensions['data'][0]['how_much_do_you_receive_from_your_state_pension?']))
                                                                                @php $totalUserIncomePensions += $userIncomePensions['data'][0]['how_much_do_you_receive_from_your_state_pension?']; @endphp
                                                                    @endif
                                                                    @if(isset($userIncomePensions['data'][0]['how_much_do_you_receive_from_your_private_pension?']))
                                                                                @php $totalUserIncomePensions += $userIncomePensions['data'][0]['how_much_do_you_receive_from_your_private_pension?']; @endphp
                                                                    @endif
                                                                    @if(isset($userIncomePensions['data'][0]['how_much_do_you_receive_in_pension_credit?']))
                                                                                 @php $totalUserIncomePensions += $userIncomePensions['data'][0]['how_much_do_you_receive_in_pension_credit?']; @endphp
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
                                                                <span>1.how much do you receive from your state pension?
                                                                </span>
                                                                <input type="text" class="form-control" id="pension_1" name="how_much_do_you_receive_from_your_state_pension?" value="{{ !empty($userIncomePensions['data'][0]['how_much_do_you_receive_from_your_state_pension?']) ? $userIncomePensions['data'][0]['how_much_do_you_receive_from_your_state_pension?'] : 0 }}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>2.  how much do you receive from your private pension?
                                                                </span>
                                                                <input type="text" class="form-control" id="pension_2" name="how_much_do_you_receive_from_your_private_pension?" value="{{ !empty($userIncomePensions['data'][0]['how_much_do_you_receive_from_your_private_pension?']) ? $userIncomePensions['data'][0]['how_much_do_you_receive_from_your_private_pension?'] : 0 }}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>3. how much do you receive in pension credit?
                                                                </span>
                                                                <input type="text" class="form-control" id="pension_3" name="how_much_do_you_receive_in_pension_credit?" value="{{ !empty($userIncomePensions['data'][0]['how_much_do_you_receive_in_pension_credit?']) ? $userIncomePensions['data'][0]['how_much_do_you_receive_in_pension_credit?'] : 0 }}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9"></div>
                                                            <div class="col-md-3">
                                                                <a href="" class="btn btn-outline-info btn-large" id="pension-update">Update</a>
                                                            </div>
                                                        </div>
                                                    {{-- </form> --}}
                                                                    @if(isset($userIncomePensions['data'][0]['how_much_do_you_receive_from_your_state_pension?']))
                                                                                @php $totalUserIncomePensions += $userIncomePensions['data'][0]['how_much_do_you_receive_from_your_state_pension?']; @endphp
                                                                    @endif
                                                                    @if(isset($userIncomePensions['data'][0]['how_much_do_you_receive_from_your_private_pension?']))
                                                                                @php $totalUserIncomePensions += $userIncomePensions['data'][0]['how_much_do_you_receive_from_your_private_pension?']; @endphp
                                                                    @endif
                                                                    @if(isset($userIncomePensions['data'][0]['how_much_do_you_receive_in_pension_credit?']))
                                                                                 @php $totalUserIncomePensions += $userIncomePensions['data'][0]['how_much_do_you_receive_in_pension_credit?']; @endphp
                                                                    @endif
                                                                     <div class="col-12 total_income_pensions">
                                                                     Total Sum: {{  number_format($totalUserIncomePensions) }}
                                                                     </div>         
                                                                    
                                                </div>
                                            </ul>
                                        </div>
                                        </div>
                                    </div>
                                </div>
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


        var wage_total = parseInt(wage_1) + parseInt(wage_2) + parseInt(wage_3);
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
                "how_much_do_you_receive_wage" : wage_1,
                "how_much_do_you_receive_in_part_time_wage" : wage_2,
                "how_much_do_you_receive_in_rent_orboard" : wage_3
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
        var ESA = $('#ESA').val();
        if(ESA == '') { ESA = 0; }
        var JSA = $('#JSA').val();
        if(JSA == '') { JSA = 0; }
        var How_much_do_you_receive_in_working_tax_credit = $('#benefit_3').val();
        if(How_much_do_you_receive_in_working_tax_credit == '') { How_much_do_you_receive_in_working_tax_credit = 0; }
        var How_much_do_you_receive_in_income_support = $('#benefit_4').val();
        if(How_much_do_you_receive_in_income_support == '') { How_much_do_you_receive_in_income_support = 0; }
        var DLA = $('#DLA').val();
        if(DLA == '') { DLA = 0; }
        var How_much_do_you_receive_in_child_benefit = $('#benefit_5').val();
        if(How_much_do_you_receive_in_child_benefit == '') { How_much_do_you_receive_in_child_benefit = 0; }
        var How_much_do_you_receive_in_child_support_or_CSA = $('#benefit_6').val();
        if(How_much_do_you_receive_in_child_support_or_CSA == '') { How_much_do_you_receive_in_child_support_or_CSA = 0; }
        var How_much_do_you_receive_in_child_tax_credit = $('#benefit_7').val();
        if(How_much_do_you_receive_in_child_tax_credit == '') { How_much_do_you_receive_in_child_tax_credit = 0; }

        var benefit_total = parseInt(ESA) + parseInt(JSA) + parseInt(How_much_do_you_receive_in_working_tax_credit) + parseInt(How_much_do_you_receive_in_income_support) + parseInt(DLA) + parseInt(How_much_do_you_receive_in_child_benefit) + parseInt(How_much_do_you_receive_in_child_support_or_CSA) + parseInt(How_much_do_you_receive_in_child_tax_credit);

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
                "ESA" : ESA,
                "JSA" : JSA,
                "How_much_do_you_receive_in_working_tax_credit" : How_much_do_you_receive_in_working_tax_credit,
                "How_much_do_you_receive_in_income_support" : How_much_do_you_receive_in_income_support,
                "DLA" : DLA,
                "How_much_do_you_receive_in_child_benefit" : How_much_do_you_receive_in_child_benefit,
                "How_much_do_you_receive_in_child_support_or_CSA" : How_much_do_you_receive_in_child_support_or_CSA,
                "How_much_do_you_receive_in_child_tax_credit" : How_much_do_you_receive_in_child_tax_credit
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
        var how_much_do_you_receive_from_your_state_pension = $('#pension_1').val();
        if(how_much_do_you_receive_from_your_state_pension == '') { how_much_do_you_receive_from_your_state_pension = 0; }

        var how_much_do_you_receive_from_your_private_pension = $('#pension_2').val();
        if(how_much_do_you_receive_from_your_private_pension == '') { how_much_do_you_receive_from_your_private_pension = 0; }

        var how_much_do_you_receive_in_pension_credit = $('#pension_3').val();
        if(how_much_do_you_receive_in_pension_credit == '') { how_much_do_you_receive_in_pension_credit = 0; }
        

        var pension_total = parseInt(how_much_do_you_receive_from_your_state_pension) + parseInt(how_much_do_you_receive_from_your_private_pension) + parseInt(how_much_do_you_receive_in_pension_credit);

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
                "how_much_do_you_receive_from_your_state_pension" : how_much_do_you_receive_from_your_state_pension,
                "how_much_do_you_receive_from_your_private_pension" : how_much_do_you_receive_from_your_private_pension,
                "how_much_do_you_receive_in_pension_credit" : how_much_do_you_receive_in_pension_credit
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
    
        var wage_income_total = <?php echo $totalWages; ?>;
        
        var benefit_income_total = <?php echo $totalUserIncomeBenefits; ?>;
        
        var pension_income_total = <?php echo $totalUserIncomePensions; ?>;
        
    
        var ctx = document.getElementById('income_chart').getContext('2d');

    if ($("#income_chart").length) {
      var incomeChartdata = {
        datasets: [{
        data: [wage_income_total,benefit_income_total,pension_income_total],
          backgroundColor: [
            '#00538f',
            '#047fdb',
            '#4bb2ff'
          ],
          hoverBackgroundColor: [
            '#00538f',
            '#047fdb',
            '#4bb2ff'
          ],
          borderColor: [
            
          ],
          legendColor: [
            '#00538f',
            '#047fdb',
            '#4bb2ff'
          ]
        }],
    
        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
          'Wages',
          'Benefits',
          'Pension',
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

