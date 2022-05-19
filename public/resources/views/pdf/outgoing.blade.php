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
    @media (min-width:1366px){
        #outgoing.modal .modal-dialog, #income_modal.modal .modal-dialog {
            width: 95% !important;
            max-width: 95%;
            min-height: 110vh !important;
            /*margin: 60px auto;*/
            transform: translate(0px) !important;
            top: 0px;
        }
        #outgoing.modal .modal-dialog{
            min-height: 200vh !important;
        }
        #outgoing.modal .modal-content, #income_modal.modal .modal-content {
            top: 20px;
            bottom: 20px;
        }   
    }
    #income_chart{margin-top:30px;}
    .form-group.form-inline label {
    max-width: calc(100% - 130px);
    font-size: 14px;
}
#outgoing .form-group.form-inline {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    text-align: left;
    justify-content: flex-start;
}
#outgoing .form-group.form-inline label {
    max-width: 100%;
    font-size: 14px;
    text-align: left;
    justify-content: flex-start;
    min-width: 150px;
}
#outgoing .form-group.form-inline .form-control {
    min-width: 100%;
    max-width: 100%;
    border-radius: 0px;
}
span.rule {
    font-size: 12px;
    margin-left: 10px;
    text-align: center;
    color:#797979;
}
.col-table{
    width: 100%;
    font-size: 14px;
}
.col-table td{
    text-align:center;
}
#outgoing .col-table td {
    text-align: right;
    width: 150px;
}

.col-table td:first-child {
    min-width: 100px;
    text-align: left !important;
}
.col-table h4 {
    font-size: 14px;
}
.col-table1 td {
    text-align: right;
    width: 140px;
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
                $totalOutgoings = getTotalOutcome($userInfo->user_id);
            @endphp
            <h1 class="text-center line-height-auto height-auto calculated_total_outgoing">&#163;{{ $totalOutgoings }}</h1>
        </div>
    </div>
</div>  
<!-- Display the amount of user outgoing code start -->
    <!-- Housing code start -->
        @php
            $rent = 0;
            $ground_rent_service_charge = 0;
            $how_much_do_you_pay_for_your_mortgage_endowment = 0;
            $mortgage = "";
            $do_you_have_secured_loan = "";
            $other_secured_loan = "";
            $mortgage_endowment_ppi = 0;
            $home_insurance = 0;
            $life_insurance = "";
            $pension = "";
            $council_tax = "";
            $gas = 0;
            $electricity = 0;
            $water = 0;
            $other_utilities_Coal_oil_ect = 0;
            $tV_licence = 0;
            $magistrates_court_fines = 0;
            $child_support = 0;
            $hire_purchase = 0;
            $child_care = 0;
            $adult_care = 0;
            $other_essential = 0;
            $total_essential_expediture = 0;
        @endphp
        @if(!empty($userOutgoingQuestionsEssentialExpediture['data']))
            @foreach($userOutgoingQuestionsEssentialExpediture['data'] as $housingKey => $housingValue)
                @php
                    $housingValue = collect($housingValue)->toArray();
                @endphp
                @if($housingValue['question'] == "How Much Do You Pay For Your Rent/Mortgage A Month?")
                    @php
                        $rent = $housingValue['answer'];
                        $total_essential_expediture += (int)$housingValue['answer']
                    @endphp
                @endif
                @if($housingValue['question'] == 'Do You Have Ground Rent Or Service Charge?')
                    @php
                        $ground_rent_service_charge = $housingValue['answer'];
                        $total_essential_expediture += (int)$housingValue['answer']
                    @endphp
                @endif
                @if($housingValue['question'] == 'How Much Do You Pay For Your Mortgage Endowment?')
                    @php
                        $mortgage = $housingValue['answer'];
                        $total_essential_expediture += (int)$housingValue['answer']
                    @endphp
                @endif
                @if($housingValue['question'] == 'Do You Have Secured Loan?')
                     @php
                        $do_you_have_secured_loan = $housingValue['answer'];
                        $total_essential_expediture += (int)$housingValue['answer']
                    @endphp
                @endif
                @if($housingValue['question'] == 'Mortgage Endowment/PPI')
                    @php
                        $mortgage_endowment_ppi = $housingValue['answer'];
                        $total_essential_expediture += (int)$housingValue['answer']
                    @endphp
                @endif
                @if($housingValue['question'] == 'Home Insurance')
                    @php
                        $home_insurance = $housingValue['answer'];
                        $total_essential_expediture += (int)$housingValue['answer']
                    @endphp
                @endif
                @if($housingValue['question'] == 'Life Insurance')
                    @php
                        $life_insurance = $housingValue['answer'];
                        $total_essential_expediture += (int)$housingValue['answer']
                    @endphp
                @endif
                @if($housingValue['question'] == 'Pension Payments')
                    @php
                        $pension = $housingValue['answer'];
                        $total_essential_expediture += (int)$housingValue['answer']
                    @endphp
                @endif
                @if($housingValue['question'] == 'How Much Do You Pay For Your Council Tax Rates A Month?')
                    @php
                        $council_tax = $housingValue['answer'];
                        $total_essential_expediture += (int)$housingValue['answer']
                    @endphp
                @endif
                @if($housingValue['question'] == 'Gas')
                    @php
                        $gas = $housingValue['answer'];
                        $total_essential_expediture += (int)$housingValue['answer']
                    @endphp
                @endif
                @if($housingValue['question'] == 'Electricity')
                    @php
                        $electricity = $housingValue['answer'];
                        $total_essential_expediture += (int)$housingValue['answer']
                    @endphp
                @endif
                @if($housingValue['question'] == 'Water')
                    @php
                        $water = $housingValue['answer'];
                        $total_essential_expediture += (int)$housingValue['answer']
                    @endphp
                @endif
                 @if($housingValue['question'] == 'Other Costs')
                    @php
                        $other_utilities_Coal_oil_ect = $housingValue['answer'];
                        $total_essential_expediture += (int)$housingValue['answer']
                    @endphp
                @endif
                 @if($housingValue['question'] == 'How Much Do You Pay For Tv Licence Every Month?')
                    @php
                        $tV_licence = $housingValue['answer'];
                        $total_essential_expediture += (int)$housingValue['answer']
                    @endphp
                @endif
                 @if($housingValue['question'] == 'Magistrates / Court Fines')
                    @php
                        $magistrates_court_fines = $housingValue['answer'];
                        $total_essential_expediture += (int)$housingValue['answer']
                    @endphp
                @endif
                 @if($housingValue['question'] == 'Do You Pay Any Child Maintenance Or Child Support?')
                    @php
                        $child_support = $housingValue['answer'];
                        $total_essential_expediture += (int)$housingValue['answer']
                    @endphp
                @endif
                 @if($housingValue['question'] == 'Hire Purchase')
                    @php
                        $hire_purchase = $housingValue['answer'];
                        $total_essential_expediture += (int)$housingValue['answer']
                    @endphp
                @endif
                 @if($housingValue['question'] == 'How Much Do You Spend On Childcare Costs Per Month?')
                    @php
                        $child_care = $housingValue['answer'];
                        $total_essential_expediture += (int)$housingValue['answer']
                    @endphp
                @endif
                 @if($housingValue['question'] == 'How Much Do You Spend On Adult Care Costs Per Month?')
                    @php
                        $adult_care = $housingValue['answer'];
                        $total_essential_expediture += (int)$housingValue['answer']
                    @endphp
                @endif
                @if($housingValue['question'] == 'Other')
                    @php
                        $other_essential = $housingValue['answer'];
                        $total_essential_expediture += (int)$housingValue['answer']
                    @endphp
                @endif
            @endforeach
        @endif
        @php
            $food_toiletries = 0;
            $newspappers_magazine = 0;
            $tabacco = 0;
            $laundry = 0;
            $clothing_footwear = 0;
            $nappies_baby_items = 0;
            $pet_food = 0;
            $other = 0;
            $pet_food_housing = 0;
            $other_housing = 0;            
            $totalHousKeeping = 0;
        @endphp
        @if(!empty($userOutgoingQuestionsHouseKeeping['data']))
            @foreach($userOutgoingQuestionsHouseKeeping['data'] as $utilitiesKey => $utilitiesValue)
                @php
                    $utilitiesValue = collect($utilitiesValue)->toArray();
                @endphp
                @if($utilitiesValue['question'] == 'Toiletries')
                    @php
                        $food_toiletries = $utilitiesValue['answer'];
                        $totalHousKeeping += (int)$utilitiesValue['answer']
                    @endphp
                @endif
                @if($utilitiesValue['question'] == 'How Much Do You Spend On Newspapers & Magazines Per Month?')
                    @php
                        $newspappers_magazine = $utilitiesValue['answer'];
                        $totalHousKeeping += (int)$utilitiesValue['answer']
                    @endphp
                @endif
                @if($utilitiesValue['question'] == 'Tabacco')
                    @php
                        $tabacco = $utilitiesValue['answer'];
                        $totalHousKeeping += (int)$utilitiesValue['answer']
                    @endphp
                @endif
                @if($utilitiesValue['question'] == 'How Much Do You Spend On Laundry & Dry Cleaning Per Month?')
                    @php
                        $laundry = $utilitiesValue['answer'];
                        $totalHousKeeping += (int)$utilitiesValue['answer']
                    @endphp
                @endif
                @if($utilitiesValue['question'] == 'Clothing')
                    @php
                        $clothing_footwear = $utilitiesValue['answer'];
                        $totalHousKeeping += (int)$utilitiesValue['answer']
                    @endphp
                @endif
                @if($utilitiesValue['question'] == 'How Much Do Spend On Nappies Monthly?')
                    @php
                        $nappies_baby_items = $utilitiesValue['answer'];
                        $totalHousKeeping += (int)$utilitiesValue['answer']
                    @endphp
                @endif
                @if($utilitiesValue['question'] == 'How Much Do Spend On Pet Food Monthly?')
                    @php
                        $pet_food_housing = $utilitiesValue['answer'];
                        $totalHousKeeping += (int)$utilitiesValue['answer']
                    @endphp
                @endif
                @if($utilitiesValue['question'] == 'Other')
                    @php
                        $other_housing = $utilitiesValue['answer'];
                        $totalHousKeeping += (int)$utilitiesValue['answer']
                    @endphp
                @endif
            @endforeach
        @endif
        @php
            $home_phone = 0;
            $mobile_phone = 0;
            $other_phone = 0;
            $totalphone  = 0;
        @endphp
        @if(!empty($userOutgoingQuestionsPhone['data']))
            @foreach($userOutgoingQuestionsPhone['data'] as $leisureKey => $leisureValue)
                @php
                    $leisureValue = collect($leisureValue)->toArray();
                @endphp
                @if($leisureValue['question'] == 'Home Phone')
                    @php
                        $home_phone = $leisureValue['answer'];
                        $totalphone += (int)$leisureValue['answer']
                    @endphp
                @endif
                @if($leisureValue['question'] == 'Mobile Phone')
                    @php
                        $mobile_phone = $leisureValue['answer'];
                        $totalphone += (int)$leisureValue['answer']
                    @endphp
                @endif
                @if($leisureValue['question'] == 'Other Phone')
                    @php
                        $other_phone = $leisureValue['answer'];
                        $totalphone += (int)$leisureValue['answer']
                    @endphp
                @endif
            @endforeach
        @endif
        @php
            $public_transport_inc_taxis = 0;
            $car_insurance = 0;
            $vehicle_tax = 0;
            $fuel_Petrol_Diesel_ect = 0;
            $mot_maintenance = 0;
            $breakdown_or_reovery = 0;
            $parking_tolls = 0;
            $other_car_costs = 0;
            $totalTravel  = 0;
        @endphp
        @if(!empty($userOutgoingQuestionsTravel['data']))
            @foreach($userOutgoingQuestionsTravel['data'] as $travelKey => $travelValue)
                @php
                    $travelValue = collect($travelValue)->toArray();
                @endphp
                @if($travelValue['question'] == 'How Much Do You Spend On Public Transport Per Month?')
                    @php
                        $public_transport_inc_taxis = $travelValue['answer'];
                        $totalTravel += (int)$travelValue['answer']
                    @endphp
                @endif
                @if($travelValue['question'] == 'Car Insurance Per Month?')
                    @php
                        $car_insurance = $travelValue['answer'];
                        $totalTravel += (int)$travelValue['answer']
                    @endphp
                @endif
                @if($travelValue['question'] == 'Vehicle Tax')
                    @php
                        $vehicle_tax = $travelValue['answer'];
                        $totalTravel += (int)$travelValue['answer']
                    @endphp
                @endif
                @if($travelValue['question'] == 'Fuel (Petrol, Diesel, ect)')
                    @php
                        $fuel_Petrol_Diesel_ect = $travelValue['answer'];
                        $totalTravel += (int)$travelValue['answer']
                    @endphp
                @endif
                @if($travelValue['question'] == 'Mot & Maintenance Per Month?')
                    @php
                        $mot_maintenance = $travelValue['answer'];
                        $totalTravel += (int)$travelValue['answer']
                    @endphp
                @endif
                @if($travelValue['question'] == 'Breakdown Cover Per Month?')
                    @php
                        $breakdown_or_reovery = $travelValue['answer'];
                        $totalTravel += (int)$travelValue['answer']
                    @endphp
                @endif
                @if($travelValue['question'] == 'Parking & Tolls')
                    @php
                        $parking_tolls = $travelValue['answer'];
                        $totalTravel += (int)$travelValue['answer']
                    @endphp
                @endif
                @if($travelValue['question'] == 'Other Car Costs')
                    @php
                        $other_car_costs = $travelValue['answer'];
                        $totalTravel += (int)$travelValue['answer']
                    @endphp
                @endif
            @endforeach
        @endif
        @php
            $health_dentist_glasses = 0;
            $medicine = 0;
            $repiars_house_maintanance = 0;
            $hairdressing_haircuts = 0;
            $sky_streaming_internet = 0;
            $work_meals = 0;
            $school_meals = 0;
            $pocket_money = 0;
            $school_trips = 0;
            $hobbies_sport = 0;
            $pet_food = 0;
            $pet_insurance = 0;
            $charity = 0;
            $sundries_emergency = 0;
            $gifts = 0;
            $other_exp = 0;
            $totalotherExp  = 0;
        @endphp
        @if(!empty($userOutgoingQuestionsOtherExp['data']))
            @foreach($userOutgoingQuestionsOtherExp['data'] as $foodKey => $foodValue)
                @php
                    $foodValue = collect($foodValue)->toArray();
                @endphp
                @if($foodValue['question'] == 'How Much Do You Spend On Health (Dentist, Medicine, Eyecare)?')
                    @php
                        $health_dentist_glasses = $foodValue['answer'];
                        $totalotherExp += (int)$foodValue['answer']
                    @endphp
                @endif
                @if($foodValue['question'] == 'How Much Do You Spend On Medicine?')
                    @php
                        $medicine = $foodValue['answer'];
                        $totalotherExp += (int)$foodValue['answer']
                    @endphp
                @endif
                @if($foodValue['question'] == 'How Much Do You Spend On Housekeeping Per Month')
                    @php
                        $repiars_house_maintanance = $foodValue['answer'];
                        $totalotherExp += (int)$foodValue['answer']
                    @endphp
                @endif
                @if($foodValue['question'] == 'Hairdressing / Haircuts')
                    @php
                        $hairdressing_haircuts = $foodValue['answer'];
                        $totalotherExp += (int)$foodValue['answer']
                    @endphp
                @endif
                @if($foodValue['question'] == 'Sky, Streaming & Internet')
                    @php
                        $sky_streaming_internet = $foodValue['answer'];
                        $totalotherExp += (int)$foodValue['answer']
                    @endphp
                @endif
                @if($foodValue['question'] == 'How Much Do You Spend On Meals At Work Per Month?')
                    @php
                        $work_meals = $foodValue['answer'];
                        $totalotherExp += (int)$foodValue['answer']
                    @endphp
                @endif
                @if($foodValue['question'] == 'How Much Do You Spend On School Meals Per Month?')
                    @php
                        $school_meals = $foodValue['answer'];
                        $totalotherExp += (int)$foodValue['answer']
                    @endphp
                @endif
                @if($foodValue['question'] == 'How Much Do You Spend On Pocket Money Per Month?')
                    @php
                        $pocket_money = $foodValue['answer'];
                        $totalotherExp += (int)$foodValue['answer']
                    @endphp
                @endif
                @if($foodValue['question'] == 'How Much Do You Spend On School Trips Per Month?')
                    @php
                        $school_trips = $foodValue['answer'];
                        $totalotherExp += (int)$foodValue['answer']
                    @endphp
                @endif
                @if($foodValue['question'] == 'How Much Do You Spend On Hobbies & Internet Per Month?')
                    @php
                        $hobbies_sport = $foodValue['answer'];
                        $totalotherExp += (int)$foodValue['answer']
                    @endphp
                @endif
                @if($foodValue['question'] == 'How Much Do Spend On Pet Food Monthly?')
                    @php
                        $pet_food = $foodValue['answer'];
                        $totalotherExp += (int)$foodValue['answer']
                    @endphp
                @endif
                @if($foodValue['question'] == 'Vets/Pet Insurance')
                    @php
                        $pet_insurance = $foodValue['answer'];
                        $totalotherExp += (int)$foodValue['answer']
                    @endphp
                @endif
                @if($foodValue['question'] == 'Charity')
                    @php
                        $charity = $foodValue['answer'];
                        $totalotherExp += (int)$foodValue['answer']
                    @endphp
                @endif
                @if($foodValue['question'] == 'Sundries & Emergency')
                    @php
                        $sundries_emergency = $foodValue['answer'];
                        $totalotherExp += (int)$foodValue['answer']
                    @endphp
                @endif
                 @if($foodValue['question'] == 'How Much Do You Spend On Gifts Per Month?')
                    @php
                        $gifts = $foodValue['answer'];
                        $totalotherExp += (int)$foodValue['answer']
                    @endphp
                @endif
                 @if($foodValue['question'] == 'Other')
                    @php
                        $other_exp = $foodValue['answer'];
                        $totalotherExp += (int)$foodValue['answer']
                    @endphp
                @endif
            @endforeach
        @endif
<div class="plus-sign" id="outgoin-popup"data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#outgoing">
    <img src="{!! asset('images/icons/Plus_Icon@2x.png')!!}" alt="Add" width="30">
</div>
    <div id="outgoing" class="modal fade outgoing" tabindex="-1" role="dialog"
            aria-labelledby="my-modal-title"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content card card-secondary">
                    <div class="modal-header">
                        <div class="card-title">
                            Expenditure
                        </div>
                        <button type="button" class="close alert_open">
                            <img src="{!! asset('images/icons/Cross_Icon@2x.png')!!}" alt="Close" class="img-fulid" width="40" height="40">
                        </button>
                    </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">  
                                    <h4 class="mb-3">Essential Expenditure : &#163;{{ $total_essential_expediture }}</h4>  
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Rent</label>
                                        <input type="text" name="Rent" data-type="ESSNTIAL EXPEDITURE" data-key="How Much Do You Pay For Your Rent/Mortgage A Month?" id="essential_expediture1"
                                        class="form-control" value="{{ $rent }}">
                                        <span class="rule">Bank Statement</span>
                                    </div>
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Ground Rent / Service Charge</label>
                                        <input type="text" name="Ground Rent / Service Charge" data-type="ESSNTIAL EXPEDITURE" data-key="Do You Have Ground Rent Or Service Charge?"
                                        id="essential_expediture2" class="form-control"value="{{ $ground_rent_service_charge }}">
                                        <span class="rule">Bank Statement</span>
                                    </div>
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Mortgage</label>
                                        <input type="text" id="essential_expediture3" data-type="ESSNTIAL EXPEDITURE" data-key="How Much Do You Pay For Your Mortgage Endowment?" name="Mortgage" class="form-control" value="{{ $mortgage }}">
                                        <span class="rule">Bank Statement</span>
                                    </div>
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Do you have secured loan?</label>
                                        <input type="text" name="" value="{{ $do_you_have_secured_loan }}" class="form-control" id="essential_expediture4" data-type="ESSNTIAL EXPEDITURE" data-key="Do You Have Secured Loan?" name="DO YOU HAVE SECURED LOAN?">
                                        <span class="rule">Bank Statement</span>
                                    </div> 
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Mortgage Endowment/PPI</label>
                                        <input type="text" name="Mortgage Endowment/PPI" data-type="ESSNTIAL EXPEDITURE" data-key="Mortgage Endowment/PPI" id="essential_expediture5" class="form-control" value="{{ $mortgage_endowment_ppi }}">
                                        <span class="rule">Bank Statement</span>
                                    </div>
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Home Insurance</label>
                                        <input type="text" id="essential_expediture6" data-type="ESSNTIAL EXPEDITURE" data-key="Home Insurance" name="Home Insurance" class="form-control" value="{{ $home_insurance }}">
                                        <span class="rule">Bank Statement</span>
                                    </div> 
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Life Insurance</label>
                                            <input type="text" class="form-control" name="do you have any appliances or furniture on rent?" id="essential_expediture7"
                                            data-type="ESSNTIAL EXPEDITURE" data-key="Life Insurance" value="{{ $life_insurance }}">  
                                            <span class="rule">Bank Statement</span>
                                    </div> 
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Pension</label>
                                        <input type="text" name="Pension" id="essential_expediture8" data-type="ESSNTIAL EXPEDITURE" data-key="Pension Payments" class="form-control" value="{{ $pension }}">
                                        <span class="rule">Bank Statement</span>
                                    </div> 
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Council Tax</label>
                                        <input type="text" name="Council Tax" id="essential_expediture9" data-type="ESSNTIAL EXPEDITURE" data-key="How Much Do You Pay For Your Council Tax Rates A Month?" class="form-control" value="{{ $council_tax }}">
                                        <span class="rule">Bank Statement</span>
                                    </div> 
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Gas</label>
                                        <input type="text" name="Gas" id="essential_expediture10" data-type="ESSNTIAL EXPEDITURE" data-key="Gas" class="form-control"
                                        value="{{ $gas  }}">
                                        <span class="rule">Bank Statement</span>
                                    </div> 
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Electricity</label>
                                        <input type="text" name="Electricity" id="essential_expediture11" data-type="ESSNTIAL EXPEDITURE" data-key="Electricity" class="form-control" value="{{ $electricity  }}">
                                        <span class="rule">Bank Statement</span>
                                    </div> 
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Water</label>
                                        <input type="text" name="Water" id="essential_expediture12" data-type="ESSNTIAL EXPEDITURE" data-key="Water" class="form-control"
                                        value="{{ $water  }}">
                                        <span class="rule">Bank Statement</span>
                                    </div> 
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Other Utilities (Coal, oil, ect)</label>
                                        <input type="text" name="Other Utilities (Coal, oil, ect)" data-type="ESSNTIAL EXPEDITURE" data-key="Other Costs" id="essential_expediture13" class="form-control"
                                        value="{{ $other_utilities_Coal_oil_ect  }}">
                                        <span class="rule">Bank Statement</span>
                                    </div> 
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>TV Licence</label>
                                        <input type="text" name="TV Licence" data-type="ESSNTIAL EXPEDITURE" data-key="How Much Do You Pay For Tv Licence Every Month?"id="essential_expediture14" class="form-control" value="{{ $tV_licence  }}">
                                        <span class="rule">Bank Statement</span>
                                    </div> 
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Magistrates / Court Fines</label>
                                        <input type="text name="Magistrates / Court Fines" data-type="ESSNTIAL EXPEDITURE" data-key="Magistrates / Court Fines" id="essential_expediture15" class="form-control" value="{{ $magistrates_court_fines  }}">
                                        <span class="rule">Bank Statement</span>
                                    </div> 
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Child Support</label>
                                        <input type="text" name="Child Support" id="essential_expediture16" data-type="ESSNTIAL EXPEDITURE" data-key="Do You Pay Any Child Maintenance Or Child Support?" class="form-control" value="{{ $child_support  }}">
                                        <span class="rule">Bank Statement</span>
                                    </div> 
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Hire Purchase</label>
                                        <input type="text" name="Hire Purchase" id="essential_expediture17" data-type="ESSNTIAL EXPEDITURE" data-key="Hire Purchase class="form-control" value="{{ $hire_purchase  }}">
                                        <span class="rule">Bank Statement</span>
                                    </div> 
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Child Care</label>
                                        <input type="text" name="Child Care" id="essential_expediture18" data-type="ESSNTIAL EXPEDITURE" data-key="How Much Do You Spend On Childcare Costs Per Month?" class="form-control" value="{{ $child_care  }}">
                                        <span class="rule">Bank Statement</span>
                                    </div> 
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Adult Care</label>
                                        <input type="text" name="Adult Care" id="essential_expediture19" data-type="ESSNTIAL EXPEDITURE" data-key="How Much Do You Spend On Adult Care Costs Per Month?" class="form-control" value="{{ $adult_care  }}">
                                        <span class="rule">Bank Statement</span>
                                    </div> 
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Other</label>
                                        <input type="text" name="Other" id="essential_expediture20" data-type="ESSNTIAL EXPEDITURE" data-key="Other" class="form-control"
                                        value="{{ $other_essential }}">
                                        <span class="rule">Bank Statement</span>
                                    </div> 
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <h4 class="mb-3">Housekeeping : &#163;{{ $totalHousKeeping }}</h4>
                                    @php 
                                        $getHouseKeepingFoodRules = getOutgoingRulesCommon('Food & Toiletries',$who_do_you_live_with,$total_child);
                                        $getFoodToiletriesValue = checkOutgoingRuleValue($getHouseKeepingFoodRules , $food_toiletries);
                                    @endphp
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Food & Toiletries</label>
                                        <input type="text" id="house_keeping1" data-type="HOUSEKEEPING" data-key="Toiletries" name="Food & Toiletries" class="form-control" value="{{ $food_toiletries }}">
                                        <span class="rule">{{ $getHouseKeepingFoodRules }}</span>
                                    </div>
                                    @php 
                                        $getHouseKeepingNewsPaperRules = getOutgoingRulesCommon('Newspappers / Magazine',$who_do_you_live_with,$total_child);
                                        $getNewsPaperValue = checkOutgoingRuleValue($getHouseKeepingNewsPaperRules , $newspappers_magazine);
                                    @endphp
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Newspappers / Magazine</label>
                                        <input type="text" name="Newspappers / Magazine" data-type="HOUSEKEEPING" data-key="How Much Do You Spend On Newspapers & Magazines Per Month?" id="house_keeping2" class="form-control" value="{{ $newspappers_magazine }}">
                                        <span class="rule">{{ $getHouseKeepingNewsPaperRules }}</span>
                                    </div>
                                    @php 
                                        $getHouseKeepingTabaccoRules = getOutgoingRulesCommon('Tabacco',$who_do_you_live_with,$total_child);
                                        $getTabaccoValue = checkOutgoingRuleValue($getHouseKeepingTabaccoRules , $tabacco);
                                    @endphp
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Tabacco</label>
                                        <input type="text" id="house_keeping3" data-type="HOUSEKEEPING" data-key="Tabacco" name="Tabacco" class="form-control" value="{{ $tabacco }}">
                                        <span class="rule">{{ $getHouseKeepingTabaccoRules }}</span>
                                    </div>
                                    @php 
                                        $getHouseKeepingLaundryRules = getOutgoingRulesCommon('Laundry',$who_do_you_live_with,$total_child);
                                        $getLaundryValue = checkOutgoingRuleValue($getHouseKeepingLaundryRules , $laundry);
                                    @endphp
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Laundry</label>
                                        <input type="text" id="house_keeping4" data-type="HOUSEKEEPING" data-key="How Much Do You Spend On Laundry & Dry Cleaning Per Month?"name="Laundry" class="form-control" value="{{ $laundry }}">
                                        <span class="rule">{{ $getHouseKeepingLaundryRules }}</span>
                                    </div>
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Clothing & Footwear</label>
                                        <input type="text" id="house_keeping5" data-type="HOUSEKEEPING" data-key="Clothing" name="Clothing & Footwear" class="form-control" value="{{ $clothing_footwear }}">
                                    </div> 
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Nappies & Baby Items</label>
                                        <input type="text" id="house_keeping6" data-type="HOUSEKEEPING" data-key="How Much Do Spend On Nappies Monthly?" name="Nappies & Baby Items" class="form-control" value="{{ $nappies_baby_items }}">
                                    </div>
                                    @php 
                                        $getPetFoodRules = getOutgoingRulesCommon('Pet Food',$who_do_you_live_with,$total_child);
                                        $getPetFoodValue = checkOutgoingRuleValue($getPetFoodRules , $pet_food_housing);
                                     @endphp
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Pet Food</label>
                                        <input type="text" id="house_keeping7" data-type="HOUSEKEEPING" data-key="How Much Do Spend On Pet Food Monthly?" name="Pet Food" class="form-control" value="{{ $pet_food_housing }}">
                                        <span class="rule">{{ $getPetFoodRules }}</span>
                                    </div>
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Other</label>
                                        <input type="text" id="house_keeping8" data-type="HOUSEKEEPING" data-key="Other" name="Other" class="form-control" value="{{ $other_housing }}">
                                    </div>  
                                    <div class="pensions mt-5">
                                        <h4 class="mb-3">Phone : &#163;{{ $totalphone }}</h4>
                                        <div class="form-group form-inline outgoing_rules">
                                            <label>Home Phone</label>
                                            <input type="text" id="phone1" data-type="Home Phone" data-key="Other" name="Home Phone" class="form-control" placeholder="1800"
                                            value="{{ $home_phone }}">
                                        </div> 
                                        @php 
                                            $getPhoneRules = getOutgoingRulesCommon('Mobile Phone',$who_do_you_live_with,$total_child);
                                            $getPhoneValue = checkOutgoingRuleValue($getPhoneRules , $mobile_phone);
                                        @endphp
                                        <div class="form-group form-inline outgoing_rules">
                                            <label>Mobile Phone</label>
                                            <input type="text" id="phone2" data-type="PHONE" data-key="Other" name="Mobile Phone" class="form-control" placeholder="1800"
                                            value="{{ $mobile_phone }}">
                                            <span class="rule">{{ $getPhoneRules }}</span>
                                        </div> 
                                        <div class="form-group form-inline outgoing_rules">
                                            <label>Other Phone</label>
                                            <input type="text" id="phone3" data-type="PHONE" data-key="Other Phone" name="Other Phone class="form-control" placeholder="1800"
                                            value="{{ $other_phone }}">
                                        </div> 
                                    </div>
                                    <div class="pensions mt-5">
                                        <h4 class="mb-3">Travel: &#163;{{ $totalTravel }}</h4>
                                        @php 
                                            $getPublictranportRules = getOutgoingRulesCommon('Public Transport (inc Taxis)',$who_do_you_live_with,$total_child);
                                            $getTransportValue = checkOutgoingRuleValue($getPublictranportRules , $public_transport_inc_taxis);
                                        @endphp
                                        <div class="form-group form-inline outgoing_rules">
                                            <label>Public Transport (inc Taxis)</label>
                                            <input type="text" id="transport1" data-type="TRAVEL" data-key="How Much Do You Spend On Public Transport Per Month?" name="Public Transport (inc Taxis)" class="form-control"
                                            placeholder="1800" value="{{ $public_transport_inc_taxis }}">
                                            <span class="rule">{{  $getPublictranportRules  }}</span>
                                        </div>
                                        <div class="form-group form-inline outgoing_rules">
                                            <label>Car Insurance</label>
                                            <input type="text" id="transport2" data-type="TRAVEL" data-key="Car Insurance Per Month?" name="Car Insurance" class="form-control" placeholder="1800" value="{{ $car_insurance }}">
                                            <span class="rule"></span>
                                        </div>
                                        <div class="form-group form-inline outgoing_rules">
                                            <label>Vehicle Tax</label>
                                            <input type="text" id="transport3" name="Vehicle Tax" data-type="TRAVEL" data-key="Vehicle Tax" class="form-control"
                                            placeholder="1800" value="{{ $vehicle_tax }}">
                                            <span class="rule"></span>
                                        </div>
                                        @php 
                                            $getFuleRule = getOutgoingRulesCommon('Fuel (Petrol, Diesel, ect)',$who_do_you_live_with,$total_child);
                                            $getFuelValue = checkOutgoingRuleValue($getFuleRule , $fuel_Petrol_Diesel_ect);
                                        @endphp
                                        <div class="form-group form-inline outgoing_rules">
                                            <label>Fuel (Petrol, Diesel, ect)</label>
                                            <input type="text" id="transport4" data-type="TRAVEL" data-key="Fuel (Petrol, Diesel, ect)" name="Fuel (Petrol, Diesel, ect)" class="form-control" placeholder="1800" value="{{ $fuel_Petrol_Diesel_ect }}">
                                            <span class="rule">{{ $getFuleRule }}</span>
                                        </div>
                                        @php 
                                            $getMotRule = getOutgoingRulesCommon('MOT & Maintenance',$who_do_you_live_with,$total_child);
                                            $getMotValue = checkOutgoingRuleValue($getMotRule , $mot_maintenance);
                                        @endphp
                                        <div class="form-group form-inline outgoing_rules">
                                            <label>MOT & Maintenance</label>
                                            <input type="text" id="transport5" data-type="TRAVEL" data-key="Mot & Maintenance Per Month?" name="MOT & Maintenance" class="form-control" placeholder="1800" value="{{ $mot_maintenance }}">
                                            <span class="rule">{{ $getMotRule }}</span>
                                        </div>
                                        <div class="form-group form-inline outgoing_rules">
                                            <label>Breakdown or Reovery</label>
                                            <input type="text" id="transport6" data-type="TRAVEL" data-key="Breakdown Cover Per Month?" name="Breakdown or Reovery"
                                            class="form-control" placeholder="1800" value="{{ $breakdown_or_reovery }}">
                                            <span class="rule"></span>
                                        </div>
                                        <div class="form-group form-inline outgoing_rules">
                                            <label>parking & tolls</label>
                                            <input type="text" id="transport7" data-type="TRAVEL" data-key="Parking & Tolls" name="parking & tolls"
                                            class="form-control" placeholder="1800" value="{{ $parking_tolls }}">
                                            <span class="rule"></span>
                                        </div>
                                        <div class="form-group form-inline outgoing_rules">
                                            <label>Other Car Costs</label>
                                            <input type="text" id="transport8" data-type="TRAVEL" data-key="Other Car Costs" name="Other Car Costs" class="form-control"
                                            placeholder="1800" value="{{ $other_car_costs }}">
                                            <span class="rule"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <h4 class="mb-3">Other Exp : &#163;{{ $totalotherExp }}</h4>
                                    @php 
                                        $getHelthRule = getOutgoingRulesCommon('Health ( Dentist & Glasses)',$who_do_you_live_with,$total_child);
                                        $getHealthValue = checkOutgoingRuleValue($getHelthRule , $health_dentist_glasses);
                                    @endphp
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Health ( Dentist & Glasses)</label>
                                        <input type="text" id="other_exp1" data-type="OTHER EXP" name="Health ( Dentist & Glasses)" data-key="How Much Do You Spend On Health (Dentist, Medicine, Eyecare)?" class="form-control" placeholder="1800" value="{{ $health_dentist_glasses }}">
                                        <span class="rule">{{ $getHelthRule }}</span>
                                    </div>
                                    @php 
                                        $getMedicineRule = getOutgoingRulesCommon('Medicine',$who_do_you_live_with,$total_child);
                                        $getMedicineValue = checkOutgoingRuleValue($getMedicineRule , $medicine);
                                    @endphp
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Medicine</label>
                                        <input type="text" id="other_exp2" data-type="OTHER EXP" data-key="How Much Do You Spend On Medicine?" name="Health ( Dentist & Glasses)" class="form-control" placeholder="1800" value="{{ $medicine }}">
                                        <span class="rule">{{ $getMedicineRule }}</span>
                                    </div>
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Repiars / House Maintanance</label>
                                        <input type="text" id="other_exp3" data-type="OTHER EXP" data-key="How Much Do You Spend On Housekeeping Per Month" name="Repiars / House Maintanance" class="form-control" placeholder="1800"
                                        value="{{ $repiars_house_maintanance }}">
                                    </div>
                                    @php 
                                        $getHairDressingRule = getOutgoingRulesCommon('Hairdressing / Haircuts',$who_do_you_live_with,$total_child);
                                        $getHairDressingValue = checkOutgoingRuleValue($getHairDressingRule , $hairdressing_haircuts);
                                    @endphp
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Hairdressing / Haircuts</label>
                                        <input type="text" id="other_exp4" data-type="OTHER EXP" data-key="Hairdressing / Haircuts" name="Hairdressing / Haircuts" class="form-control" placeholder="1800" value="{{ $hairdressing_haircuts }}">
                                        <span class="rule">{{ $getHairDressingRule }}</span>
                                    </div>
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Sky, Streaming & Internet</label>
                                        <input type="text" id="other_exp5" data-type="OTHER EXP" data-key="Sky, Streaming & Internet" name="Sky, Streaming & Internet"
                                        class="form-control" placeholder="1800" value="{{ $sky_streaming_internet }}">
                                    </div>
                                    @php 
                                        $getWorkMealRule = getOutgoingRulesCommon('Work Meals',$who_do_you_live_with,$total_child);
                                        $getWorkMealValue = checkOutgoingRuleValue($getWorkMealRule , $work_meals);
                                    @endphp
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Work Meals</label>
                                        <input type="text" id="other_exp6" data-type="OTHER EXP" data-key="How Much Do You Spend On Meals At Work Per Month?"
                                        name="Work Meals" class="form-control" placeholder="1800" value="{{ $work_meals }}">
                                        <span class="rule">{{ $getWorkMealRule }}</span>
                                    </div>
                                    @php 
                                        $getSchoolMealRule = getOutgoingRulesCommon('School Meals',$who_do_you_live_with,$total_child);
                                        $getSchoolMealValue = checkOutgoingRuleValue($getSchoolMealRule , $school_meals);
                                    @endphp
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>School Meals</label>
                                        <input type="text" id="other_exp7" data-type="OTHER EXP" data-key="How Much Do You Spend On School Meals Per Month?" name="School Meals" class="form-control" placeholder="1800" value="{{ $school_meals }}">
                                        <span class="rule">{{ $getSchoolMealRule }}</span>
                                    </div>
                                    @php 
                                        $getPocktMoneyRule = getOutgoingRulesCommon('Pocket Money',$who_do_you_live_with,$total_child);
                                        $getPocktMoneyValue = checkOutgoingRuleValue($getPocktMoneyRule , $pocket_money);
                                    @endphp
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Pocket Money</label>
                                        <input type="text" name="Pocket Money" data-type="OTHER EXP" data-key="How Much Do You Spend On Pocket Money Per Month?" class="other_exp8 form-control"  placeholder="1800" value="{{ $pocket_money }}">
                                        <span class="rule">{{ $getPocktMoneyRule }}</span>
                                    </div>
                                    @php 
                                        $getSchooltripRule = getOutgoingRulesCommon('School Trips',$who_do_you_live_with,$total_child);
                                        $getSchooltripValue = checkOutgoingRuleValue($getSchooltripRule , $school_trips);
                                    @endphp
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>School Trips</label>
                                        <input type="text" id="other_exp9" name="School Trips" data-type="OTHER EXP" data-key="How Much Do You Spend On School Trips Per Month?" class="form-control" placeholder="1800" value="{{ $school_trips }}">
                                        <span class="rule">{{ $getSchooltripRule }}</span>
                                    </div>
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Hobbies / Sport</label>
                                        <input type="text" id="other_exp10" name="Hobbies / Sport" data-type="OTHER EXP" data-key="How Much Do You Spend On Hobbies & Internet Per Month?" class="form-control" placeholder="1800" value="{{ $hobbies_sport }}">
                                    </div>
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Pet Food</label>
                                        <input type="text" id="other_exp11" name="Pet Food" data-type="OTHER EXP" data-key="How Much Do Spend On Pet Food Monthly?" class="form-control" placeholder="1800" value="{{ $pet_food }}">
                                    </div>
                                    <div class="form-group form-inline outgoing_rules">
                                        <label> Pet Insurance</label>
                                        <input type="text" id="other_exp12" data-type="OTHER EXP" name="Pet Insurance" data-key="Vets/Pet Insurance" class="form-control"
                                        placeholder="1800" value="{{ $pet_insurance }}">
                                    </div>
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Charity</label>
                                        <input type="text" id="other_exp13" name="Charity" data-type="OTHER EXP" data-key="Charity" class="form-control" placeholder="1800"
                                        value="{{ $charity }}">
                                    </div>
                                    @php 
                                        $getSundriesRule = getOutgoingRulesCommon('Sundries & Emergency',$who_do_you_live_with,$total_child);
                                        $getSundriesValue = checkOutgoingRuleValue($getSundriesRule , $sundries_emergency);
                                    @endphp
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Sundries & Emergency</label>
                                        <input type="text" id="other_exp14" name="Sundries & Emergency" data-type="OTHER EXP" data-key="Sundries & Emergency" class="form-control" placeholder="1800" value="{{ $sundries_emergency }}">
                                        <span class="rule">{{ $getSundriesRule }}</span>
                                    </div>
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>Gifts</label>
                                        <input type="text" id="other_exp15" data-type="OTHER EXP" data-key="How Much Do You Spend On Gifts Per Month?" name="Gifts" class="form-control" placeholder="1800" value="{{ $gifts }}">
                                    </div>
                                    <div class="form-group form-inline outgoing_rules">
                                        <label>other</label>
                                        <input type="text" id="other_exp16" data-type="OTHER EXP" data-key=Other" name="other" class="form-control" placeholder="1800"
                                        value="{{ $other_exp }}">
                                    </div>
                                    @php
                                        $totalIncome = getIncome($userInfo->user_id);
                                        if(!isset($totalIncome) && empty($totalIncome)){
                                        $totalIncome = 0;
                                        }
                                        $totalOutgoings = getOutgoing($userInfo->user_id);
                                        if(!isset($totalOutgoings) && empty($totalOutgoings)){
                                        $totalOutgoings = 0;
                                        }
                                        $disposabale = getTotalDisposable($userInfo->user_id);
                                        if(!isset($disposabale) && empty($disposabale)){
                                        $disposabale = 0;
                                        }
                                        $debt = getDebtAmount($userInfo->user_id);
                                        if(!isset($debt) && empty($debt)){
                                        $debt = 0;
                                        }
                                        $total_contribution = $disposabale*60;
                                        if(!isset($total_contribution) && empty($total_contribution)){
                                        $total_contribution = 0;
                                        }
                                        $potential_debt_written_off = $debt - $total_contribution;
                                        if(!isset($potential_debt_written_off) && empty($potential_debt_written_off)){
                                        $potential_debt_written_off = 0;
                                        }
                                        $fees = 3650;
                                        $paid_to_creditor = $total_contribution - $fees;
                                       if($paid_to_creditor > 0 && $debt > 0){
                                            $dividend = $paid_to_creditor / $debt;
                                      }else{
                                        $dividend = 0;
                                      }
                                    @endphp
                                    <table class="col-table mt-3">
                                        <tr>
                                            <td><h4><strong>INCOME:</strong></h4></td>
                                            <td><h4><strong> &#163;{{ number_format($totalIncome) }}</strong></h4></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><h4><strong>EXPENDITURE:</strong></h4></td>
                                            <td><h4><strong>&#163;{{ number_format($totalOutgoings) }}</strong></h4></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><h4><strong>DISPOSABALE:</strong></h4></td>
                                            <td><h4><strong>&#163;{{ number_format($disposabale) }}</strong></h4></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><h4><strong>DEBT:</strong></h4></td>
                                            <td><h4><strong>&#163;{{ number_format($debt) }}</strong></h4></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><h4><strong>TOTAL CONTRIBUTION:</strong></h4></td>
                                            <td><h4><strong>&#163;{{ number_format($total_contribution) }}</strong></h4></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><h4><strong>POTENTIAL DEBT WRITTEN OFF:</strong></h4></td>
                                            <td><h4><strong>&#163;{{ number_format($potential_debt_written_off) }}</strong></h4></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><h4><strong>FEES:</strong></h4></td>
                                            <td><h4><strong>&#163;{{ number_format($fees) }}</strong></h4></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><h4><strong>PAID TO CREDITORS:</strong></h4></td>
                                            <td><h4><strong>&#163;{{ number_format($paid_to_creditor) }}</strong></h4></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><h4><strong>DIVIDEND:</strong></h4></td>
                                            <td><h4><strong>&#163;{{ number_format($dividend) }}</strong></h4></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
<script type="text/javascript">
    $('.outgoing_rules input').on('change',function(e){
      e.preventDefault();      
      var userId = $('#userId').val();
      var title = $(this).data('type');
      var question = $(this).attr('name');
      var answer = $(this).val();
      var key = $(this).data('key');
        $.ajax({
            url : "{{ route('user.update_user_outgoing') }}",
            method : "POST",
            dataType : "JSON",
            data : {
                "_token":"{{ csrf_token() }}",
                "userId" : userId,
                "title" : title ,
                "question" : question,
                "answer" : answer,
                "key" : key
            },
            success : function(data)
            {
                var messageIcon = 'error';
                if (data.error == false) {
                    console.log('save');
                    var message = data.message;
                    var messageIcon = 'success';
                } else if(data.error == true) {
                    var message = data.message;
                }
                swal(message, {
                    icon: messageIcon,
                });
            }
        });
    });
</script>