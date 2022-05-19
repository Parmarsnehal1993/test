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
    .form-group.form-inline label { 
    max-width: calc(100% - 130px);
    font-size: 14px;
    }
.form-group.form-inline {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.form-group.form-inline .form-control {
    min-width: 100px;
    max-width: 100px;
    text-align: center;
    border-radius: 0px;
}
.col-table{
    font-size: 14px;
}
.col-table{
    width:100%;
}
.col-table td{
    text-align: center;
}
.col-table td:first-child {
    min-width: 70px;
    text-align: left;
    padding-left: 0px;
}
.col-table h4 {
    font-size: 14px;
}
.w-30{
    max-width:30%
}
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
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">  
                        <h4 class="mb-3">Wages</h4>
                        @php $totalWages = 0; @endphp
                            @if(isset($userIncomeWages['data'][0]['how_much_do_you_receive_in_rent_orboard']))
                                @php $totalWages += $userIncomeWages['data'][0]['how_much_do_you_receive_wage']; @endphp
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
                        <div class="form-group form-inline">
                            <label>Wage</label>
                             <input type="number"
                                id="wage_1" name="Rent" value="{{ (isset($userIncomeWages['data'][0]['how_much_do_you_receive_wage']) && !empty($userIncomeWages['data'][0]['how_much_do_you_receive_wage'])) ? $userIncomeWages['data'][0]['how_much_do_you_receive_wage'] : 0 }}" class="form-control" placeholder="">
                        </div>
                        <div class="form-group form-inline">
                            <label>Partner Wage</label>
                            <input type="number" id="wage_2" name="partner_wage" value="{{ (isset($userIncomeWages['data'][0]['partner_wage']) && !empty($userIncomeWages['data'][0]['partner_wage'])) ? $userIncomeWages['data'][0]['partner_wage'] : 0 }}" class="form-control" placeholder="">
                        </div>
                        <div class="form-group form-inline">
                            <label>Other Income</label>
                            <input type="number" id="wage_3" name="other_income" value="{{ (isset($userIncomeWages['data'][0]['other_income']) && !empty($userIncomeWages['data'][0]['other_income'])) ? $userIncomeWages['data'][0]['other_income'] : 0 }}" class="form-control" placeholder="0">
                        </div>
                        <div class="form-group form-inline">
                            <label>Partner Other income</label>
                             <input type="number" id="wage_4" name="partner_other_income" value="{{ (isset($userIncomeWages['data'][0]['partner_other_income']) && !empty($userIncomeWages['data'][0]['partner_other_income'])) ? $userIncomeWages['data'][0]['partner_other_income'] : 0 }}"
                            class="form-control" placeholder="0">
                        </div>
                        <div class="pensions mt-5">
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
                            <h4 class="mb-3">Pensions:</h4>
                            <div class="form-group form-inline">
                                <label>State Pension</label>
                                 <input type="text" class="form-control" id="pension_1" name="state_pension" value="{{ !empty($userIncomePensions['data'][0]['how_much_do_you_receive_from_your_state_pension']) ? $userIncomePensions['data'][0]['how_much_do_you_receive_from_your_state_pension'] : 0 }}" placeholder="">
                            </div>
                            <div class="form-group form-inline">
                                <label>Private Pension</label>
                                <input type="text" class="form-control" id="pension_2" name="private_pension" value="{{ !empty($userIncomePensions['data'][0]['how_much_do_you_receive_from_your_private_pension']) ? $userIncomePensions['data'][0]['how_much_do_you_receive_from_your_private_pension'] : 0 }}" placeholder="">
                            </div>
                            <div class="form-group form-inline">
                                <label>Pension Credit</label>
                                 <input type="text" class="form-control" id="pension_3" name="pension_credit" value="{{ !empty($userIncomePensions['data'][0]['how_much_do_you_receive_in_pension_credit']) ? $userIncomePensions['data'][0]['how_much_do_you_receive_in_pension_credit'] : 0 }}" placeholder="">
                            </div>
                            <div class="form-group form-inline">
                                <label>Other Pension</label>
                                <input type="text" class="form-control" id="pension_4" name="other_pension" value="{{ !empty($userIncomePensions['data'][0]['other_pension']) ? $userIncomePensions['data'][0]['other_pension'] : 0 }}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"> 
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
                        <h4 class="mb-3">Benefits:</h4>
                            <div class="form-group form-inline">
                                <label>Jobseekers 1</label>
                                 <input type="number" id="Jobseekers_1" name="Jobseekers_1" class="form-control" value="{{ !empty($userIncomeBenefits['data'][0]['Jobseekers_1']) ? $userIncomeBenefits['data'][0]['Jobseekers_1'] : 0 }}" placeholder="">
                            </div>
                            <div class="form-group form-inline">
                                <label>Jobseekers 2</label>
                                 <input type="text" id="Jobseekers_2" name="Jobseekers_2" value="{{ !empty($userIncomeBenefits['data'][0]['Jobseekers_2']) ? $userIncomeBenefits['data'][0]['Jobseekers_2'] : 0 }}"class="form-control" placeholder="">
                            </div>
                            <div class="form-group form-inline">
                                <label>Income Support</label>
                                <input type="text" class="form-control" id="benefit_3" name="income_support" value="{{ !empty($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_income_support']) ? $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_income_support'] : 0 }}" placeholder="">
                            </div>
                            <div class="form-group form-inline">
                                <label>Working Tax Credit</label>
                                <input type="text" class="form-control" id="benefit_4" name="working_tax_credit" value="{{ !empty($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_working_tax_credit']) ? $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_working_tax_credit'] : 0 }}" placeholder="">
                            </div>
                            <div class="form-group form-inline">
                                <label>Child Tax Credit</label>
                                 <input type="text" class="form-control" id="benefit_5" name="child_tax_credit" value="{{ !empty($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_tax_credit']) ? $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_tax_credit'] : 0 }}" placeholder="">
                            </div>
                            <div class="form-group form-inline">
                                <label>Child Benefit</label>
                                 <input type="text" class="form-control" id="benefit_6" name="child_benefit" value="{{ !empty($userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_benefit']) ? $userIncomeBenefits['data'][0]['How_much_do_you_receive_in_child_benefit'] : 0 }}" placeholder="">
                            </div>
                            <div class="form-group form-inline">
                                <label>Employment & Support Allowance</label>
                                 <input type="text" class="form-control" id="benefit_7" name="employment_support_allowance" value="{{ !empty($userIncomeBenefits['data'][0]['ESA']) ? $userIncomeBenefits['data'][0]['ESA'] : 0 }}" placeholder="">
                            </div>
                            <div class="form-group form-inline">
                                <label>DLA, PIP or Attendance allowance</label>
                                <input type="text" class="form-control" id="benefit_8" name="dla_pip_or_attendance_allowance" value="{{ !empty($userIncomeBenefits['data'][0]['DLA']) ? $userIncomeBenefits['data'][0]['DLA'] : 0 }}" placeholder="">
                            </div>
                            <div class="form-group form-inline">
                                <label>Carers Allowance</label>
                                 <input type="text" class="form-control" id="benefit_9" name="carers_allowance" value="{{ !empty($userIncomeBenefits['data'][0]['carers_allowance']) ? $userIncomeBenefits['data'][0]['carers_allowance'] : 0 }}" placeholder="">
                            </div>
                            <div class="form-group form-inline">
                                <label>Housing Benefit</label>
                                <input type="text" class="form-control" id="benefit_10" name="housing_benefit" value="{{ !empty($userIncomeBenefits['data'][0]['housing_benefit']) ? $userIncomeBenefits['data'][0]['housing_benefit'] : 0 }}" placeholder="">
                            </div>
                            <div class="form-group form-inline">
                                <label>Council Tax Reduction</label>
                                <input type="text" class="form-control" id="benefit_11" name="council_tax_reduction" value="{{ !empty($userIncomeBenefits['data'][0]['council_tax_reduction']) ? $userIncomeBenefits['data'][0]['council_tax_reduction'] : 0 }}" placeholder="">
                            </div>
                            <div class="form-group form-inline">
                                <label>Universal Credit</label>
                                 <input type="text" class="form-control" id="benefit_12" name="universal_credit" value="{{ !empty($userIncomeBenefits['data'][0]['universal_credit']) ? $userIncomeBenefits['data'][0]['universal_credit'] : 0 }}" placeholder="">
                            </div>
                            <div class="form-group form-inline">
                                <label>Other Benefit</label>
                                 <input type="text" class="form-control" id="benefit_13" name="other_benefit" value="{{ !empty($userIncomeBenefits['data'][0]['other_benefit']) ? $userIncomeBenefits['data'][0]['other_benefit'] : 0 }}" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 w-30">  
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
                        <h4 class="mb-3">Other Income:</h4>
                        <div class="form-group form-inline">
                            <label>Child Support / Maintanance</label>
                            <input type="text" class="form-control" id="other_income1" name="chat_support_maintanance" value="{{ !empty($userOtherIncome['data'][0]['child_support_maintanance']) ? $userOtherIncome['data'][0]['child_support_maintanance'] : 0 }}" placeholder="">
                        </div>
                        <div class="form-group form-inline">
                            <label>Board / Lodge</label>
                            <input type="text" class="form-control" id="other_income2" name="board_lodge" value="{{ !empty($userOtherIncome['data'][0]['board_lodge']) ? $userOtherIncome['data'][0]['board_lodge'] : 0 }}" placeholder="">
                        </div>
                        <div class="form-group form-inline">
                            <label>Non Dependednt Contibution</label>
                            <input type="text" class="form-control" id="other_income3" name="non_dependednt_contibution" value="{{ !empty($userOtherIncome['data'][0]['non_dependednt_contibution']) ? $userOtherIncome['data'][0]['non_dependednt_contibution'] : 0 }}" placeholder="">
                        </div>
                        <div class="form-group form-inline">
                            <label>Student Loans & Grants</label>
                            <input type="text" class="form-control" id="other_income4" name="student_loans_Grants" value="{{ !empty($userOtherIncome['data'][0]['student_loans_Grants']) ? $userOtherIncome['data'][0]['student_loans_Grants'] : 0 }}" placeholder="">
                        </div>
                        @php 
                            $wage_percentage = 0;
                            $pension_percentage = 0;
                            $benefit_percentage = 0;
                            $other_income_percentage = 0;
                            if($totalWages > 0){
                            $wage_percentage = $totalWages/$totalIncome*100;
                            }
                            if($totalUserIncomePensions > 0){
                            $pension_percentage = $totalUserIncomePensions/$totalIncome*100;
                            }
                            if($totalUserIncomeBenefits > 0){
                            $benefit_percentage = $totalUserIncomeBenefits/$totalIncome*100;
                            }
                            if($totaluserOtherIncome > 0){
                             $other_income_percentage = $totaluserOtherIncome/$totalIncome*100;
                            }
                        @endphp
                        <table class="col-table mt-3">
                            <tr>
                                <td><h4><strong>Wages:</strong></h4></td>
                                <td><h4><strong class="wages_total">£ {{ number_format($totalWages,2) }}</strong></h4></td>
                                <td><h4><strong class="wage_percentage">£ {{ number_format($wage_percentage,2) }}%</strong></h4></td>
                            </tr>
                            <tr>
                                <td><h4><strong>Pensions:</strong></h4></td>
                                <td><h4><strong class="pension_total">£{{ number_format($totalUserIncomePensions,2) }}</strong></h4></td>
                                <td><h4><strong class="pension_percentage">£ {{ number_format($pension_percentage,2) }}%</strong></h4></td>
                            </tr>
                            <tr>
                                <td><h4><strong>Benefits:</strong></h4></td>
                                <td><h4><strong class="benefit_total">£{{ number_format($totalUserIncomeBenefits,2) }}</strong></h4></td>
                                <td><h4><strong class="benefit_percentage">£ {{ number_format($benefit_percentage,2) }}%</strong></h4></td>
                            </tr>
                            <tr>
                                <td><h4><strong>Other:</strong></h4></td>
                                <td><h4><strong class="other_income_total">£{{ number_format($totaluserOtherIncome,2) }}</strong></h4></td>
                                <td><h4><strong class="other_income_percentage">£ {{ number_format($other_income_percentage,2) }}%</strong></h4></td>
                            </tr>
                            <tr>
                                <td><h4><strong>Total:</strong></h4></td>
                                <td><h4><strong class="total_income">£{{ number_format($totalIncome,2) }}</strong></h4></td>
                            </tr>
                        </table>
                        <div class="form-group float-right mt-5">
                            <a href="#" class="btn btn-outline-info btn-large" name="update_income" id="update_income">Update</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    var total_income = 0;
    $('#update_income').click(function(e){
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
        var pension_1 = $('#pension_1').val();
        if(pension_1 == '') { pension_1 = 0; }
        var pension_2 = $('#pension_2').val();
        if(pension_2 == '') { pension_2 = 0; }
        var pension_3 = $('#pension_3').val();
        if(pension_3 == '') { pension_3 = 0; }
        var pension_4 = $('#pension_4').val();
        if(pension_4 == '') { pension_4 = 0; }
        var other_income1 = $('#other_income1').val();
        if(other_income1 == '') { other_income1 = 0; }
        var other_income2 = $('#other_income2').val();
        if(other_income2 == '') { other_income2 = 0; }
        var other_income3 = $('#other_income3').val();
        if(other_income3 == '') { other_income3 = 0; }
        var other_income4 = $('#other_income4').val();
        if(other_income4 == '') { other_income4 = 0; }
        var wage_total = parseInt(wage_1) + parseInt(wage_2) + parseInt(wage_3) + parseInt(wage_4);
        var wage_total = ReplaceNumberWithCommas(wage_total);
        var benefit_total = parseInt(benefit_1) + parseInt(benefit_2) + parseInt(benefit_3) + parseInt(benefit_4) + parseInt(benefit_5) + parseInt(benefit_6) + parseInt(benefit_7) + parseInt(benefit_8) + parseInt(benefit_9) + parseInt(benefit_10) + parseInt(benefit_11) + parseInt(benefit_12) + parseInt(benefit_13);
        var benefit_total = ReplaceNumberWithCommas(benefit_total);
        var pension_total = parseInt(pension_1) + parseInt(pension_2) + parseInt(pension_3) +  parseInt(pension_4);
        var pension_total = ReplaceNumberWithCommas(pension_total);
        var other_income_total = parseInt(other_income1) + parseInt(other_income2) + parseInt(other_income3) +  parseInt(other_income4);
        var other_income_total = ReplaceNumberWithCommas(other_income_total);
        var total_income =parseInt(wage_1) + parseInt(wage_2) + parseInt(wage_3) + parseInt(wage_4) + parseInt(benefit_1) + parseInt(benefit_2) + parseInt(benefit_3) + parseInt(benefit_4) + parseInt(benefit_5) + parseInt(benefit_6) + parseInt(benefit_7) + parseInt(benefit_8) + parseInt(benefit_9) + parseInt(benefit_10) + parseInt(benefit_11) + parseInt(benefit_12) + parseInt(benefit_13) + parseInt(pension_1) + parseInt(pension_2) + parseInt(pension_3) +  parseInt(pension_4) + parseInt(other_income1) + parseInt(other_income2) + parseInt(other_income3) +  parseInt(other_income4);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'{{ route('user.update_user_income') }}',
            method:'post',
            dataType:'json',
            data: {
                "userId" : userId,
                "editIncomeWage" : editIncomeWage,
                "how_much_do_you_receive_wage" : wage_1,
                "partner_wage" : wage_2,
                "other_income" : wage_3,
                "partner_other_income" : wage_4,
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
                "other_benefit" : benefit_13,
                "state_pension" : pension_1,
                "private_pension" : pension_2,
                "pension_credit" : pension_3,
                "other_pension" : pension_4,
                "child_support_maintanance" : other_income1,
                "board_lodge" : other_income2,
                "non_dependednt_contibution" : other_income3,
                "student_loans_Grants" : other_income4
            },
            success:function(data) {
                var messageIcon = 'error';
                if (data == 'sucesss') {
                    console.log(total_income);
                    var wages_percentage =  parseInt(wage_total) / parseInt(total_income) * 100;
                    wages_percentage = wages_percentage.toFixed(2);
                    var benefit_percentage =  parseInt(benefit_total) /  parseInt(total_income) * 100;
                    benefit_percentage = benefit_percentage.toFixed(2);
                    var pension_percentage =  parseInt(pension_total) / parseInt(total_income) * 100;
                    pension_percentage = pension_percentage.toFixed(2);
                    var other_income_percentage =  parseInt(other_income_total) /  parseInt(total_income) * 100;
                    other_income_percentage = other_income_percentage.toFixed(2);
                    $('.wages_total').text('£'+wage_total);
                    $('.wage_percentage').text('£'+wages_percentage+'%');
                    $('.pension_total').text('£'+pension_total);
                    $('.pension_percentage').text('£'+pension_percentage+'%');
                    $('.benefit_total').text('£'+benefit_total);
                    $('.benefit_percentage').text('£'+benefit_percentage+'%');
                    $('.other_income_total').text('£'+other_income_total);
                    $('.other_income_percentage').text('£'+other_income_percentage+'%');
                    total_income = total_income.toFixed(2);
                    $('.total_income').text('£'+total_income);
                    var message = 'User Income save successfully';
                    var messageIcon = 'success';
                } else {
                    var message = 'something wrong please try again';
                }
                swal(message, {
                    icon: messageIcon,
                });
            }
        });
    });
</script>

