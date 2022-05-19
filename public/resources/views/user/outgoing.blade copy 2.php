@if($loginUser->user_type == 3 || $loginUser->user_type == 1 || $loginUser->user_type == 5 || $loginUser->user_type == 6 || $loginUser->user_type == 7 || $loginUser->user_type == 8 || $loginUser->user_type == 9 || $loginUser->user_type == 10 || $loginUser->user_type == 11)
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
@else
<div class="card-body">
    <h1 class="text-center mb-0"></h1>
</div>
<div class="card-body">
     @php

            $totalOutgoings = getTotalOutcome($userInfo->user_id);
    @endphp
    <h1 class="text-center calculated_total_outgoing">&#163;{{ $totalOutgoings }}</h1>
</div>

@endif
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
                    {{-- @php $do_you_have_secured_loan = $housingValue['answer']; @endphp
                    @if($housingValue['answer'] == 'YES') @php $do_you_have_secured_loan_yes = 'selected' @endphp @endif
                    @if($housingValue['answer'] == 'NO') @php $do_you_have_secured_loan_no = 'selected' @endphp @endif --}}
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
                   {{--  @php $do_you_have_any_appliances_or_furniture_on_rent = $housingValue['answer']; @endphp
                    @if($housingValue['answer'] == 'YES') @php $do_you_have_any_appliances_or_furniture_on_rent_yes = 'selected' @endphp @endif
                    @if($housingValue['answer'] == 'NO') @php $do_you_have_any_appliances_or_furniture_on_rent_no = 'selected' @endphp @endif --}}
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
    <!-- Housing code end -->
    <!-- Utilities code start -->
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
    <!-- Utilities code end -->
    <!-- Communications & Leisure code start -->
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
    <!-- Communications & Leisure code end -->
    <!-- Transport & Travel code start -->
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
    <!-- Transport & Travel code end -->
    <!-- Food & Housekeeping code start -->
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

  
<!-- Display the amount of user outgoing code end -->
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
                            Out goings
                        </div>
                        <button type="button" class="close alert_open">
                    <img src="{!! asset('images/icons/Cross_Icon@2x.png')!!}" alt="Close" class="img-fulid" width="40" height="40">
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                           <div class="col-md-4">
                            <div class="container">
                                <div class="row">
                                <h3>ESSENTIAL EXPEDITURE : {{ $total_essential_expediture }}</h3>
                                    <div class="col-md-9">
                                        <span>Rent</span>&nbsp;&nbsp;<input type="text" name="Rent"
                                        id="essential_expediture1"
                                        class="form-control box_style"
                                        value="{{ $rent }}">
                                    </div>
                                    <div class="col-md-3">
                                        <span class="rule_style">Bank <br>Statement</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-9">
                                        <span>Ground Rent / Service Charge
                                        </span>&nbsp;&nbsp;<input
                                        type="text"
                                        name="Ground Rent / Service Charge"
                                        id="essential_expediture2"
                                        class="form-control box_style"
                                        value="{{ $ground_rent_service_charge }}">
                                    </div>
                                    <div class="col-md-3">
                                        <span class="rule_style">Bank <br>Statement</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>Mortgage
                                        </span>&nbsp;&nbsp;<input
                                        type="text"
                                        id="essential_expediture3"
                                        name="Mortgage"
                                        class="form-control box_style"
                                        value="{{ $mortgage }}">
                                    </div>
                                    <div class="col-md-3">
                                        <span class="rule_style">Bank <br>Statement</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>
                                        DO YOU HAVE SECURED LOAN?
                                        </span>&nbsp;&nbsp;<input type="text" name="" value="{{ $do_you_have_secured_loan }}" class="form-control box_style" id="essential_expediture4"
                                        name="DO YOU HAVE SECURED LOAN?">
                                    </div>
                                    <div class="col-md-3">
                                        <span class="rule_style">Bank <br>Statement</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>Mortgage Endowment/PPI</span>&nbsp;&nbsp;<input
                                        type="text"
                                        name="Mortgage Endowment/PPI"
                                        id="essential_expediture5"
                                        class="form-control box_style"
                                        value="{{ $mortgage_endowment_ppi }}">
                                    </div>
                                    <div class="col-md-3">
                                        <span class="rule_style">Bank <br>Statement</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>Home Insurance</span>&nbsp;&nbsp;<input
                                        type="text"
                                        id="essential_expediture6"
                                        name="Home Insurance"
                                        class="form-control box_style"
                                        value="{{ $home_insurance }}">
                                    </div>
                                    <div class="col-md-3">
                                        <span class="rule_style">Bank <br>Statement</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>Life Insurance
                                        </span>&nbsp;&nbsp;<input type="text" class="form-control box_style" name="do you have any appliances or furniture on rent?" id="essential_expediture7" value="{{ $life_insurance }}">    
                                    </div>
                                    <div class="col-md-3">
                                        <span class="rule_style">Bank <br>Statement</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>Pension
                                        </span>&nbsp;&nbsp; <input
                                        type="text"
                                        name="Pension"
                                        id="essential_expediture8"
                                        class="form-control box_style"
                                        value="{{ $pension }}">
                                    </div>
                                    <div class="col-md-3">
                                        <span class="rule_style">Bank <br>Statement</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>Council Tax
                                        </span>&nbsp;&nbsp; <input
                                        type="text"
                                        name="Council Tax"
                                        id="essential_expediture9"
                                        class="form-control box_style"
                                        value="{{ $council_tax }}">
                                    </div>
                                    <div class="col-md-3">
                                        <span class="rule_style">Bank <br>Statement</span>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-9">
                                        <span>Gas
                                        </span>&nbsp;&nbsp; <input
                                        type="text"
                                        name="Gas"
                                        id="essential_expediture10"
                                        class="form-control box_style"
                                        value="{{ $gas  }}">
                                    </div>
                                    <div class="col-md-3">
                                        <span class="rule_style">Max <br>£87</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>Electricity
                                        </span>&nbsp;&nbsp;<input
                                        type="text"
                                        name="Electricity"
                                        id="essential_expediture11"
                                        class="form-control box_style"
                                        value="{{ $electricity  }}">
                                    </div>
                                    <div class="col-md-3">
                                     <span class="rule_style">Max <br>£87</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>Water
                                        </span>&nbsp;&nbsp;<input
                                        type="text"
                                        name="Water"
                                        id="essential_expediture12"
                                        class="form-control box_style"
                                        value="{{ $water  }}">
                                       
                                    </div>
                                    <div class="col-md-3">
                                        <span class="rule_style">Bank <br>Statement</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>Other Utilities (Coal, oil, ect)
                                        </span>&nbsp;&nbsp;<input
                                        type="text"
                                        name="Other Utilities (Coal, oil, ect)"
                                        id="essential_expediture13"
                                        class="form-control box_style"
                                        value="{{ $other_utilities_Coal_oil_ect  }}">
                                    </div>
                                    <div class="col-md-3">
                                        <span class="rule_style">Bank <br>Statement</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>TV Licence
                                        </span>&nbsp;&nbsp;<input
                                        type="text"
                                        name="TV Licence"
                                        id="essential_expediture14"
                                        class="form-control box_style"
                                        value="{{ $tV_licence  }}">
                                    </div>
                                    <div class="col-md-3">
                                        <span class="rule_style">Bank <br>Statement</span>\
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>Magistrates / Court Fines
                                        </span>&nbsp;&nbsp;<input
                                        type="text"
                                        name="Magistrates / Court Fines"
                                        id="essential_expediture15"
                                        class="form-control box_style"
                                        value="{{ $magistrates_court_fines  }}">
                                       
                                    </div>
                                    <div class="col-md-3">
                                        <span class="rule_style">Bank <br>Statement</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>Child Support
                                        </span>&nbsp;&nbsp;<input
                                        type="text"
                                        name="Child Support"
                                        id="essential_expediture16"
                                        class="form-control box_style"
                                        value="{{ $child_support  }}">
                                       
                                    </div>
                                    <div class="col-md-3">
                                        <span class="rule_style">Bank <br>Statement</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>Hire Purchase
                                        </span>&nbsp;&nbsp;<input
                                        type="text"
                                        name="Hire Purchase"
                                        id="essential_expediture17"
                                        class="form-control box_style"
                                        value="{{ $hire_purchase  }}">
                                    </div>
                                    <div class="col-md-3">
                                        <span class="rule_style">250</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>Child Care
                                        </span>&nbsp;&nbsp;<input
                                        type="text"
                                        name="Child Care"
                                        id="essential_expediture18"
                                        class="form-control box_style"
                                        value="{{ $child_care  }}">
                                    </div>
                                    <div class="col-md-3">
                                        <span class="rule_style">Bank <br>Statement</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>Adult Care
                                        </span>&nbsp;&nbsp;<input
                                        type="text"
                                        name="Adult Care"
                                        id="essential_expediture19"
                                        class="form-control box_style"
                                        value="{{ $adult_care  }}">
                                    </div>
                                    <div class="col-md-3">
                                        <span class="rule_style">Bank <br>Statement</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>
                                        Other
                                        </span>&nbsp;&nbsp; <input
                                        type="text"
                                        name="Other"
                                        id="essential_expediture20"
                                        class="form-control box_style"
                                        value="{{ $other_essential }}">
                                    </div>
                                    <div class="col-md-3">
                                        <span class="rule_style">Bank <br>Statement</span>
                                    </div>
                                    {{-- <div class="col-md-3">
                                        <a href="#" id="essential_expediture" class="btn btn-outline-info btn-large">Update</a>
                                    </div> --}}
                                </div>
                            </div>
                           </div>
                           <div class="col-md-4">
                               <div class="container">
                               <h3>HOUSEKEEPING : {{ $totalHousKeeping }}</h3>
                                    <div class="row">
                                        @php 
                                            $getHouseKeepingFoodRules = getOutgoingRulesCommon('Food & Toiletries',$who_do_you_live_with,$total_child);
                                            $getFoodToiletriesValue = checkOutgoingRuleValue($getHouseKeepingFoodRules , $food_toiletries);
                                            
                                        @endphp
                                        <div class="col-md-9 outgoing_rules" style="margin-left: 40px;">
                                            <span>Food & Toiletries
                                            </span>&nbsp;&nbsp; <input type="text" id="house_keeping1" name="Food & Toiletries" class="form-control box_style_housekeeping" value="{{ $food_toiletries }}">
                                        </div>
                                             <span class="rule_style_housing">{{ $getHouseKeepingFoodRules }}</span> 
                                    </div>
                                    <div class="row">
                                        @php 
                                            $getHouseKeepingNewsPaperRules = getOutgoingRulesCommon('Newspappers / Magazine',$who_do_you_live_with,$total_child);
                                            $getNewsPaperValue = checkOutgoingRuleValue($getHouseKeepingNewsPaperRules , $newspappers_magazine);
                                        @endphp
                                        <div class="col-md-9 outgoing_rules" style="margin-left: 40px;"> 
                                            <span>Newspappers / Magazine
                                            </span>
                                            <input type="text" name="Newspappers / Magazine" id="house_keeping2" class="form-control box_style_housekeeping" value="{{ $newspappers_magazine }}">
                                        </div>
                                        
                                            <span class="rule_style_housing">{{ $getHouseKeepingNewsPaperRules }}</span>

                                    </div>
                                    <div class="row">
                                        @php 
                                            $getHouseKeepingTabaccoRules = getOutgoingRulesCommon('Tabacco',$who_do_you_live_with,$total_child);
                                            $getTabaccoValue = checkOutgoingRuleValue($getHouseKeepingTabaccoRules , $tabacco);
                                        @endphp
                                        <div class="col-md-9 outgoing_rules" style="margin-left: 40px;">
                                                <span>Tabacco
                                                </span>&nbsp;&nbsp;<input type="text" id="house_keeping3" name="Tabacco" class="form-control box_style_housekeeping" value="{{ $tabacco }}">
                                            </div>
                                            
                                                <span class="rule_style_housing">{{ $getHouseKeepingTabaccoRules }}</span>
    
                                    </div> 
                                    <div class="row">
                                        @php 
                                            $getHouseKeepingLaundryRules = getOutgoingRulesCommon('Laundry',$who_do_you_live_with,$total_child);
                                            $getLaundryValue = checkOutgoingRuleValue($getHouseKeepingLaundryRules , $laundry);
                                        @endphp
                                        <div class="col-md-9 outgoing_rules" style="margin-left: 40px;">
                                            <span>Laundry
                                            </span>&nbsp;&nbsp;<input type="text" id="house_keeping4" name="Laundry" class="form-control box_style_housekeeping" value="{{ $laundry }}">
                                        </div>
                                        
                                            <span class="rule_style_housing">{{ $getHouseKeepingLaundryRules }}</span>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-9" style="margin-left: 40px;">
                                            <span>Clothing & Footwear
                                            </span>&nbsp;&nbsp;<input type="text" id="house_keeping5" name="Clothing & Footwear" class="form-control box_style_housekeeping" value="{{ $clothing_footwear }}">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-9" style="margin-left: 40px;">
                                            <span>Nappies & Baby Items
                                            </span>&nbsp;&nbsp; <input type="text" id="house_keeping6" name="Nappies & Baby Items" class="form-control box_style_housekeeping" value="{{ $nappies_baby_items }}">
                                        </div>
                                        
                                            <span class="rule_style_housing">Bank <br>Statement</span>

                                    </div>
                                    <div class="row">
                                        @php 
                                            $getPetFoodRules = getOutgoingRulesCommon('Pet Food',$who_do_you_live_with,$total_child);
                                            $getPetFoodValue = checkOutgoingRuleValue($getPetFoodRules , $pet_food_housing);
                                        @endphp
                                        <div class="col-md-9 outgoing_rules" style="margin-left: 40px;">
                                            <span>Pet Food
                                            </span>&nbsp;&nbsp;<input type="text" id="house_keeping7" name="Pet Food" class="form-control box_style_housekeeping" value="{{ $pet_food_housing }}">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-9" style="margin-left: 40px;">
                                            <span>
                                            Other
                                            </span>
                                            <input type="text" id="house_keeping8" name="Other" class="form-control box_style_housekeeping" value="{{ $other_housing }}">
                                        </div>
                                        
                                            <span class="rule_style_housing">Bank <br>Statement</span>

                                        {{-- <div class="col-md-3" style="margin-left: 60px;">
                                            <button
                                                href="javascipt:void(0)"
                                                id="housing"
                                                @if($getFoodToiletriesValue == 1 && $getNewsPaperValue == 1 && $getTabaccoValue == 1 && $getLaundryValue == 1)
                                                @else
                                                    disabled="disabled"
                                                @endif
                                                class="btn btn-outline-info btn-large">Update</button>
                                        </div> --}}
                                    </div>
                                    <h3>Phone : {{ $totalphone }}</h3>
                                    <div class="row">
                                        <div class="col-md-9" style="margin-left: 60px;">
                                            <span>
                                            Home Phone
                                            </span>
                                            <input
                                                type="text"
                                                id="phone1"
                                                name="Home Phone"
                                                class="form-control box_style_housekeeping"
                                                placeholder="1800"
                                                value="{{ $home_phone }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                         @php 
                                            $getPhoneRules = getOutgoingRulesCommon('Mobile Phone',$who_do_you_live_with,$total_child);
                                            $getPhoneValue = checkOutgoingRuleValue($getPhoneRules , $mobile_phone);
                                            
                                        @endphp
                                        <div class="col-md-9 outgoing_rules" style="margin-left: 60px;">
                                            <span>Mobile Phone
                                            </span>
                                            <input
                                                type="text"
                                                id="phone2"
                                                name="Mobile Phone"
                                                class="form-control box_style_housekeeping"
                                                placeholder="1800"
                                                value="{{ $mobile_phone }}">
                                        </div>
                                        <span class="rule_style_housing">{{ $getPhoneRules }}</span>
                                    </div>
                                    
                                    
                                    <div class="row">
                                        <div class="col-md-9" style="margin-left: 60px;">
                                           <span>Other Phone
                                            </span>
                                           <input
                                                type="text"
                                                id="phone3"
                                                name="Other Phone"
                                                class="form-control box_style_housekeeping"
                                                placeholder="1800"
                                                value="{{ $other_phone }}">
                                        </div>
                                        {{-- <div class="col-md-3">
                                            <button href="javascipt:void(0)" id="phone" class="btn btn-outline-info btn-large" @if($getPhoneValue == 1) @else disabled="disabled" @endif>Update</button>
                                        </div> --}}
                                    </div>
                                    <h3>TRAVEL: {{ $totalTravel }}</h3>
                                    <div class="row">
                                        @php 
                                           $getPublictranportRules = getOutgoingRulesCommon('Public Transport (inc Taxis)',$who_do_you_live_with,$total_child);
                                           
                                           $getTransportValue = checkOutgoingRuleValue($getPublictranportRules , $public_transport_inc_taxis);
                                          
                                       @endphp
                                       <div class="col-md-9 outgoing_rules" style="margin-left: 60px;">
                                           <span>Public Transport (inc Taxis)
                                           </span>
                                           <input
                                               type="text"
                                               id="transport1"
                                               name="Public Transport (inc Taxis)"
                                               class="form-control box_style_housekeeping"
                                               placeholder="1800"
                                               value="{{ $public_transport_inc_taxis }}">
                                       </div>
                                        <span class="rule_style_housing">{{ $getPublictranportRules }}</span>
                                   </div>
                                   <div class="row">
                                       <div class="col-md-9" style="margin-left: 60px;">
                                           <span>Car Insurance
                                           </span>
                                           <input
                                               type="text"
                                               id="transport2"
                                               name="Car Insurance"
                                               class="form-control box_style_housekeeping"
                                               placeholder="1800"
                                               value="{{ $car_insurance }}">
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-md-9" style="margin-left: 60px;">
                                           <span>Vehicle Tax
                                           </span>
                                           <input
                                               type="text"
                                               id="transport3"
                                               name="Vehicle Tax"
                                               class="form-control box_style_housekeeping"
                                               placeholder="1800"
                                               value="{{ $vehicle_tax }}">
                                       </div>
                                   </div>
                                   <div class="row">
                                       @php 
                                           $getFuleRule = getOutgoingRulesCommon('Fuel (Petrol, Diesel, ect)',$who_do_you_live_with,$total_child);
                                           $getFuelValue = checkOutgoingRuleValue($getFuleRule , $fuel_Petrol_Diesel_ect);
                                       @endphp
                                       <div class="col-md-9 outgoing_rules" style="margin-left: 60px;">
                                           <span>Fuel (Petrol, Diesel, ect)
                                           </span>
                                           <input
                                               type="text"
                                               id="transport4"
                                               name="Fuel (Petrol, Diesel, ect)"
                                               class="form-control box_style_housekeeping"
                                               placeholder="1800"
                                               value="{{ $fuel_Petrol_Diesel_ect }}">
                                       </div>
                                       <span class="rule_style_housing">{{ $getFuleRule }}</span>
                                   </div>
                                  
                                   <div class="row">
                                       @php 
                                           $getMotRule = getOutgoingRulesCommon('MOT & Maintenance',$who_do_you_live_with,$total_child);
                                           $getMotValue = checkOutgoingRuleValue($getMotRule , $mot_maintenance);
                                       @endphp
                                       <div class="col-md-9 outgoing_rules" style="margin-left: 60px;">
                                           <span>MOT & Maintenance
                                           </span>
                                           <input
                                               type="text"
                                               id="transport5"
                                               name="MOT & Maintenance"
                                               class="form-control box_style_housekeeping"
                                               placeholder="1800"
                                               value="{{ $mot_maintenance }}">
                                       </div>
                                       <span class="rule_style_housing">{{ $getMotRule }}</span>
                                   </div>
                                   <div class="row">
                                       <div class="col-md-9" style="margin-left: 60px;">
                                            <span>
                                           Breakdown or Reovery
                                           </span>
                                           <input
                                               type="text"
                                               id="transport6"
                                               name="Breakdown or Reovery"
                                               class="form-control box_style_housekeeping"
                                               placeholder="1800"
                                               value="{{ $breakdown_or_reovery }}">
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-md-9" style="margin-left: 60px;">
                                            <span>
                                           parking & tolls
                                           </span>
                                           <input
                                               type="text"
                                               id="transport7"
                                               name="parking & tolls"
                                               class="form-control box_style_housekeeping"
                                               placeholder="1800"
                                               value="{{ $parking_tolls }}">
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-md-9" style="margin-left: 60px;">
                                           <span>
                                           Other Car Costs
                                           </span>
                                           <input
                                               type="text"
                                               id="transport8"
                                               name="Other Car Costs"
                                               class="form-control box_style_housekeeping"
                                               placeholder="1800"
                                               value="{{ $other_car_costs }}">
                                       </div>
                                       
                                       {{-- <div class="col-md-3" style="margin-left: 60px;">
                                           <button
                                               href="javascipt:void(0)"
                                               id="transport"
                                               @if($getTransportValue == 1 && $getFuelValue == 1 && $getMotValue)
                                               @else
                                               disabled="disabled"
                                               @endif
                                               class="btn btn-outline-info btn-large">Update</button>
                                       </div> --}}
                                   </div>
                                </div>
                            </div>
                           <div class="col-md-4">
                                <div class="row">
                                    @php 
                                        $getHelthRule = getOutgoingRulesCommon('Health ( Dentist & Glasses)',$who_do_you_live_with,$total_child);
                                        $getHealthValue = checkOutgoingRuleValue($getHelthRule , $health_dentist_glasses);
                                    @endphp
                                    <h3>OTHER EXP : {{ $totalotherExp }}</h3>
                                    <div class="col-md-9 outgoing_rules">
                                        <span>Health ( Dentist & Glasses)
                                        </span>
                                        <input
                                            type="text"
                                            id="other_exp1"
                                            name="Health ( Dentist & Glasses)"
                                            class="form-control box_style_housekeeping"
                                            placeholder="1800"
                                            value="{{ $health_dentist_glasses }}">
                                    </div>
                                    <span class="rule_style_other">{{ $getHelthRule }}</span>
                                </div>
                                <div class="row">
                                    @php 
                                        $getMedicineRule = getOutgoingRulesCommon('Medicine',$who_do_you_live_with,$total_child);
                                        $getMedicineValue = checkOutgoingRuleValue($getMedicineRule , $medicine);
                                        // dd($getMedicineValue);
                                    @endphp
                                    <div class="col-md-9 outgoing_rules">
                                        <span>Medicine
                                        </span>
                                        <input
                                            type="text"
                                            id="other_exp2"
                                            name="Medicine"
                                            class="form-control box_style_housekeeping"
                                            placeholder="1800"
                                            value="{{ $medicine }}">
                                    </div>
                                    <span class="rule_style_other">{{ $getMedicineRule }}</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>Repiars / House Maintanance
                                        </span>
                                        <input
                                            type="text"
                                            id="other_exp3"
                                            name="Repiars / House Maintanance"
                                            class="form-control box_style_housekeeping"
                                            placeholder="1800"
                                            value="{{ $repiars_house_maintanance }}">
                                    </div>
                                </div>
                                <div class="row">
                                    @php 
                                        $getHairDressingRule = getOutgoingRulesCommon('Hairdressing / Haircuts',$who_do_you_live_with,$total_child);
                                        $getHairDressingValue = checkOutgoingRuleValue($getHairDressingRule , $hairdressing_haircuts);
                                    @endphp
                                    <div class="col-md-9 outgoing_rules">
                                        <span>Hairdressing / Haircuts
                                        </span>
                                        <input
                                            type="text"
                                            id="other_exp4"
                                            name="Hairdressing / Haircuts"
                                            class="form-control box_style_housekeeping"
                                            placeholder="1800"
                                            value="{{ $hairdressing_haircuts }}">
                                    </div>
                                    <span class="rule_style_other">{{ $getHairDressingRule }}</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>Sky, Streaming & Internet
                                        </span>
                                        <input
                                            type="text"
                                            id="other_exp5"
                                            name="Sky, Streaming & Internet"
                                            class="form-control box_style_housekeeping"
                                            placeholder="1800"
                                            value="{{ $sky_streaming_internet }}">
                                    </div>
                                </div>
                                <div class="row">
                                    @php 
                                        $getWorkMealRule = getOutgoingRulesCommon('Work Meals',$who_do_you_live_with,$total_child);
                                        $getWorkMealValue = checkOutgoingRuleValue($getWorkMealRule , $work_meals);
                                    @endphp
                                    <div class="col-md-9 outgoing_rules">
                                        <span>Work Meals
                                        </span>
                                        <input
                                            type="text"
                                            id="other_exp6"
                                            name="Work Meals"
                                            class="form-control box_style_housekeeping"
                                            placeholder="1800"
                                            value="{{ $work_meals }}">
                                    </div>
                                    <span class="rule_style_other">{{ $getWorkMealRule }}</span>
                                </div>
                                <div class="row">
                                    @php 
                                        $getSchoolMealRule = getOutgoingRulesCommon('School Meals',$who_do_you_live_with,$total_child);
                                        $getSchoolMealValue = checkOutgoingRuleValue($getSchoolMealRule , $school_meals);
                                    @endphp
                                    <div class="col-md-9 outgoing_rules">
                                        <span>School Meals
                                        </span>
                                        <input
                                            type="text"
                                            id="other_exp7"
                                            name="School Meals"
                                            class="form-control box_style_housekeeping"
                                            placeholder="1800"
                                            value="{{ $school_meals }}">
                                    </div>
                                    <span class="rule_style_other">{{ $getSchoolMealRule }}</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-9 outgoing_rules">
                                        @php 
                                        $getPocktMoneyRule = getOutgoingRulesCommon('Pocket Money',$who_do_you_live_with,$total_child);
                                        $getPocktMoneyValue = checkOutgoingRuleValue($getPocktMoneyRule , $pocket_money);
                                        @endphp
                                        <span>Pocket Money
                                        </span>
                                        <input
                                            type="text"
                                            name="Pocket Money"
                                            class="other_exp8 form-control box_style_housekeeping"
                                            placeholder="1800"
                                            value="{{ $pocket_money }}">
                                    </div>
                                    <span class="rule_style_other">{{ $getPocktMoneyRule }}</span>
                                </div>
                                <div class="row">
                                    @php 
                                        $getSchooltripRule = getOutgoingRulesCommon('School Trips',$who_do_you_live_with,$total_child);
                                        $getSchooltripValue = checkOutgoingRuleValue($getSchooltripRule , $school_trips);
                                    @endphp
                                    <div class="col-md-9 outgoing_rules">
                                        <span>
                                        School Trips
                                        </span>
                                        <input
                                            type="text"
                                            id="other_exp9"
                                            name="School Trips"
                                            class="form-control box_style_housekeeping"
                                            placeholder="1800"
                                            value="{{ $school_trips }}">
                                    </div>
                                    <span class="rule_style_other">{{ $getSchooltripRule }}</span>
                                </div>
                                <div class="row">
                                    @php 
                                        $getHobbieSportRule = getOutgoingRulesCommon('Hobbies / Sport',$who_do_you_live_with,$total_child);
                                        $getHobbieSportValue = checkOutgoingRuleValue($getHobbieSportRule , $hobbies_sport);
                                    @endphp
                                    <div class="col-md-9 outgoing_rules">
                                        <span>
                                        Hobbies / Sport
                                        </span>
                                        <input
                                            type="text"
                                            id="other_exp10"
                                            name="Hobbies / Sport"
                                            class="form-control box_style_housekeeping"
                                            placeholder="1800"
                                            value="{{ $hobbies_sport }}">
                                    </div>
                                    <span class="rule_style_other">{{ $getHobbieSportRule }}</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>
                                        Pet Food
                                        </span>
                                        <input
                                            type="text"
                                            id="other_exp11"
                                            name="Pet Food"
                                            class="form-control box_style_housekeeping"
                                            placeholder="1800"
                                            value="{{ $pet_food }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>
                                        Pet Insurance
                                        </span>
                                        <input
                                            type="text"
                                            id="other_exp12"
                                            name="Pet Insurance"
                                            class="form-control box_style_housekeeping"
                                            placeholder="1800"
                                            value="{{ $pet_insurance }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>
                                        Charity
                                        </span>
                                        <input
                                            type="text"
                                            id="other_exp13"
                                            name="Charity"
                                            class="form-control box_style_housekeeping"
                                            placeholder="1800"
                                            value="{{ $charity }}">
                                    </div>
                                </div>
                                <div class="row">
                                    @php 
                                        $getSundriesRule = getOutgoingRulesCommon('Sundries & Emergency',$who_do_you_live_with,$total_child);
                                        $getSundriesValue = checkOutgoingRuleValue($getSundriesRule , $sundries_emergency);
                                    @endphp
                                    <div class="col-md-9 outgoing_rules">
                                        <span>
                                        Sundries & Emergency
                                        </span>
                                        <input
                                            type="text"
                                            id="other_exp14"
                                            name="Sundries & Emergency"
                                            class="form-control box_style_housekeeping"
                                            placeholder="1800"
                                            value="{{ $sundries_emergency }}">
                                    </div>
                                    <span class="rule_style_other">{{ $getSundriesRule }}</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>
                                        Gifts
                                        </span>
                                        <input
                                            type="text"
                                            id="other_exp15"
                                            name="Gifts"
                                            class="form-control box_style_housekeeping"
                                            placeholder="1800"
                                            value="{{ $gifts }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <span>
                                        other
                                        </span>
                                        <input
                                            type="text"
                                            id="other_exp16"
                                            name="other"
                                            class="form-control box_style_housekeeping"
                                            placeholder="1800"
                                            value="{{ $other_exp }}">
                                    </div>
                                
                                {{-- <div class="col-md-3">
                                    <button href="javascipt:void(0)" id="other_exp" 
                                    @if($getHealthValue == 1 && $getMedicineValue == 1 && $getHairDressingValue == 1 && $getWorkMealValue == 1 && $getSchoolMealValue == 1 && $getPocktMoneyValue == 1 && $getSchooltripValue == 1 && $getHobbieSportValue == 1 && $getSundriesValue == 1) @else
                                    disabled="disabled" @endif class="btn btn-outline-info btn-large">Update</button>
                                </div> --}} 
                                <div class="col-md-3">
                                    <button href="javascipt:void(0)" id="update_expenditure"  class="btn btn-outline-info btn-large">Update</button>
                                </div>
                                <br><br>
                                <div class="container">
                                    @php
                                        $totalIncome = getIncome($userInfo->user_id);
                                        $totalOutgoings = getOutgoing($userInfo->user_id);
                                        $disposabale = getTotalDisposable($userInfo->user_id);
                                        $debt = getDebtAmount($userInfo->user_id);
                                        $total_contribution = $disposabale*60;
                                        $potential_debt_written_off = $debt - $total_contribution;
                                        $fees = 3650;
                                        $paid_to_creditor = $total_contribution - $fees;
                                        $dividend = $paid_to_creditor / $debt;
                                    @endphp
                                    <br><br>
                                    <span>INCOME:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#163;{{ $totalIncome }}<br>
                                    <span>EXPENDITURE:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#163;{{ $totalOutgoings }}<br>
                                    <span>DISPOSABALE:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#163;{{ $disposabale }}<br>
                                    <span>DEBT:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#163;{{ $debt }}<br>
                                    <span>TOTAL CONTRIBUTION:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#163;{{ $total_contribution }}<br>
                                    <span>POTENTIAL DEBT WRITTEN OFF:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#163;{{ $potential_debt_written_off }}<br>
                                    <span>FEES:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#163;{{ $fees }}<br>
                                    <span>PAID TO CREDITORS:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#163;{{ $paid_to_creditor }}<br>
                                    <span>DIVIDEND:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#163;{{ $dividend }}<br>
                                     
                                </div>
                            </div>
                        </div>
                    <div>  
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script type="text/javascript">
    var outgoing_rules_count = 0;
    $('.outgoing_rules input').on('change',function(){
        
        var question = $(this).attr('name');
        var who_do_you_live_with = '<?php echo $who_do_you_live_with; ?>';
        var total_child = '<?php echo $total_child; ?>'; 
        var value = $(this).val();
        
    
        $.ajax({
            url : "{{ route('outgoing_rules') }}",
            method : "POST",
            data : {
                '_token':'{{ csrf_token() }}',
                "question" : question,
                "who_do_you_live_with" : who_do_you_live_with,
                "total_child" : total_child
            },
            dataType : "json",
            success : function(data)
            {
                if(Array.isArray(data)){
                    if(value < data[0]){ 
                        alert('Please enter £'+data[0]+' or higher then £'+' '+data[0]);
                        
                        return false;
                       }else if(value > data[1]){  
                        alert('Please enter £'+data[1]+' or less then £'+' '+data[1]);
                        
                        return false;
                       }else{
                        outgoing_rules_count++;
                        console.log(data);
                       }
                    
                }else{
                    data = data.replace('£','');
                    if(data == "40" || data == "60" || data == "130" || data == "111" || data == "111" || data == "11" || data == "44" || data == "20" || data == "30" || data == "40" || data == "50" || data == "60" || data == "70" || data == "80" || data == "90" || data == "10" || data == "88" || data == "52" || data == "104" || data == "156" || data == "208" || data == "260" || data == "13" || data == "26" || data == "39" || data == "65" || data == "64"){
                        if(value < data || value > data){
                            alert('Please enter'+data);
                        }else{
                            outgoing_rules_count++;

                        }
                    }else{
                        outgoing_rules_count++;
                    }
                }
                console.log(outgoing_rules_count);
                if(outgoing_rules_count === 18){
                    $('#update_expenditure').removeAttr("disabled");
                    console.log('disable remove...');
                }
            }
            
        });

    });
    
    function calculate_total_outgoings()
    {
        var essential_expediture = $('#essential_expediture').text();
        var house_keeping_id = $('#house_keeping_id').text();
        var phone_total_id = $('#phone_total_id').text();
        var travel_id = $('#travel_id').text();
        var other_exp_id = $('#other_exp_id').text();
        
        var total_outgoings = parseInt(essential_expediture) + parseInt(house_keeping_id) + parseInt(phone_total_id) + parseInt(travel_id) + parseInt(other_exp_id);
        
        $('.outgoing_total').html(total_outgoings);
        $('.calculated_total_outgoing').html('&#163;' + total_outgoings);
    }

    $(document).on('click','#update_expenditure',function(e){
        e.preventDefault();
        var userId = $('#userId').val();
        var essential_expediture1 = $('#essential_expediture1').val();
            if(essential_expediture1 == '') { essential_expediture1 = 0; }

            var essential_expediture2 = $('#essential_expediture2').val();
            if(essential_expediture2 == '') { essential_expediture2 = 0; }

            var essential_expediture3 = $('#essential_expediture3').val();
            if(essential_expediture3 == '') { essential_expediture3 = 0; }

            var essential_expediture4 = $('#essential_expediture4').val();

            if(essential_expediture4 == '') { essential_expediture4 = 0; }

            var essential_expediture5 = $('#essential_expediture5').val();
            if(essential_expediture5 == '') { essential_expediture5 = 0; }
            var essential_expediture6 = $('#essential_expediture6').val();
            if(essential_expediture6 == '') { essential_expediture6 = 0; }
            var essential_expediture7 = $('#essential_expediture7').val();
            if(essential_expediture7 == '') { essential_expediture7 = 0; }
            var essential_expediture8 = $('#essential_expediture8').val();
            if(essential_expediture8 == '') { essential_expediture8 = 0; }
            var essential_expediture9 = $('#essential_expediture9').val(); 
            if(essential_expediture9 == '') { essential_expediture9 = 0; }
            var essential_expediture10 = $('#essential_expediture10').val(); 
            if(essential_expediture10 == '') { essential_expediture10 = 0; }
            var essential_expediture11 = $('#essential_expediture11').val(); 
            if(essential_expediture11 == '') { essential_expediture11 = 0; }
            var essential_expediture12 = $('#essential_expediture12').val(); 
            if(essential_expediture12 == '') { essential_expediture12 = 0; }
            var essential_expediture13 = $('#essential_expediture13').val(); 
            if(essential_expediture13 == '') { essential_expediture13 = 0; }
            var essential_expediture14 = $('#essential_expediture14').val(); 
            if(essential_expediture14 == '') { essential_expediture14 = 0; }
            var essential_expediture15 = $('#essential_expediture15').val(); 
            if(essential_expediture15 == '') { essential_expediture15 = 0; }
            var essential_expediture16 = $('#essential_expediture16').val(); 
            if(essential_expediture16 == '') { essential_expediture16 = 0; }
            var essential_expediture17 = $('#essential_expediture17').val(); 
            if(essential_expediture17 == '') { essential_expediture17 = 0; }
            var essential_expediture18 = $('#essential_expediture18').val(); 
            if(essential_expediture18 == '') { essential_expediture18 = 0; }
            var essential_expediture19 = $('#essential_expediture19').val(); 
            if(essential_expediture19 == '') { essential_expediture19 = 0; }
            var essential_expediture20 = $('#essential_expediture20').val(); 
            if(essential_expediture20 == '') { essential_expediture20 = 0; }
            var house_keeping1 = $('#house_keeping1').val();
            if(house_keeping1 == '') { house_keeping1 = 0; }
            var house_keeping2 = $('#house_keeping2').val();
            if(house_keeping2 == '') { house_keeping2 = 0; }
            var house_keeping3 = $('#house_keeping3').val();
            if(house_keeping3 == '') { house_keeping3 = 0; }
            var house_keeping4 = $('#house_keeping4').val();
            if(house_keeping4 == '') { house_keeping4 = 0; }
            var house_keeping5 = $('#house_keeping5').val();
            if(house_keeping5 == '') { house_keeping5 = 0; }
            var house_keeping6 = $('#house_keeping6').val();
            if(house_keeping6 == '') { house_keeping6 = 0; }
            var house_keeping7 = $('#house_keeping7').val();
            if(house_keeping7 == '') { house_keeping7 = 0; }
            var house_keeping8 = $('#house_keeping8').val();
            if(house_keeping8 == '') { house_keeping8 = 0; }
            var phone1 =$('#phone1').val();
            if(phone1 == '') { phone1 = 0; } 
            var phone2 =$('#phone2').val();
            if(phone2 == '') { phone2 = 0; } 
            var phone3 =$('#phone3').val();
            if(phone3 == '') { phone3 = 0; } 
            var transport1 =$('#transport1').val();
            if(transport1 == '') { transport1 = 0; } 
            var transport2 =$('#transport2').val();
            if(transport2 == '') { transport2 = 0; } 
            var transport3 =$('#transport3').val();
            if(transport3 == '') { transport3 = 0; } 
            var transport4 =$('#transport4').val();
            if(transport4 == '') { transport4 = 0; } 
            var transport5 =$('#transport5').val();
            if(transport5 == '') { transport5 = 0; } 
            var transport6 =$('#transport6').val();
            if(transport6 == '') { transport6 = 0; } 
            var transport7 =$('#transport7').val();
            if(transport7 == '') { transport7 = 0; } 
            var transport8 =$('#transport8').val();
            if(transport8 == '') { transport8 = 0; } 
            var other_exp1 = $('#other_exp1').val();
            if(other_exp1 == '') { other_exp1 = 0; } 
            var other_exp2 = $('#other_exp2').val();
            if(other_exp2 == '') { other_exp2 = 0; } 
            var other_exp3 = $('#other_exp3').val();
            if(other_exp3 == '') { other_exp3 = 0; } 
            var other_exp4 = $('#other_exp4').val();
            if(other_exp4 == '') { other_exp4 = 0; } 
            var other_exp5 = $('#other_exp5').val();
            if(other_exp5 == '') { other_exp5 = 0; } 
            var other_exp6 = $('#other_exp6').val();
            if(other_exp6 == '') { other_exp6 = 0; } 
            var other_exp7 = $('#other_exp7').val();
            if(other_exp7 == '') { other_exp7 = 0; } 
            var other_exp8 = $('.other_exp8').val();
            if(other_exp8 == '') { other_exp8 = 0; } 
            var other_exp9 = $('#other_exp9').val();
            if(other_exp9 == '') { other_exp9 = 0; } 
            var other_exp10 = $('#other_exp10').val();
            if(other_exp10 == '') { other_exp10 = 0; } 
            var other_exp11 = $('#other_exp11').val();
            if(other_exp11 == '') { other_exp11 = 0; } 
            var other_exp12 = $('#other_exp12').val();
            if(other_exp12 == '') { other_exp12 = 0; } 
            var other_exp13 = $('#other_exp13').val();
            if(other_exp13 == '') { other_exp13 = 0; } 
            var other_exp14 = $('#other_exp14').val();
            if(other_exp14 == '') { other_exp14 = 0; } 
            var other_exp15 = $('#other_exp15').val();
            if(other_exp15 == '') { other_exp15 = 0; } 
            var other_exp16 = $('#other_exp16').val();
            if(other_exp16 == '') { other_exp16 = 0; }

            $.ajax({
                url:'{{route('user.update_user_outgoing')}}',
                method:'post',
                dataType: 'json',
                data:{
                        '_token':'{{ csrf_token() }}',
                        'userId':userId,
                        'essential_expediture1':essential_expediture1,
                        'essential_expediture2':essential_expediture2,
                        'essential_expediture3':essential_expediture3,
                        'essential_expediture4':essential_expediture4,
                        'essential_expediture5':essential_expediture5,
                        'essential_expediture6':essential_expediture6,
                        'essential_expediture7':essential_expediture7,
                        'essential_expediture8':essential_expediture8,
                        'essential_expediture9':essential_expediture9,
                        'essential_expediture10': essential_expediture10,
                        'essential_expediture11' : essential_expediture11,
                        'essential_expediture12' : essential_expediture12,
                        'essential_expediture13' : essential_expediture13,
                        'essential_expediture14' : essential_expediture14,
                        'essential_expediture15' : essential_expediture15,
                        'essential_expediture16' : essential_expediture16,
                        'essential_expediture17' : essential_expediture17,
                        'essential_expediture18' : essential_expediture18,
                        'essential_expediture19' : essential_expediture19,
                        'essential_expediture20' : essential_expediture20,
                        'house_keeping1':house_keeping1,
                        'house_keeping2':house_keeping2,
                        'house_keeping3':house_keeping3,
                        'house_keeping4':house_keeping4,
                        'house_keeping5':house_keeping5,
                        'house_keeping6':house_keeping6,
                        'house_keeping7':house_keeping7,
                        'house_keeping8':house_keeping8,
                        'phone1':phone1,
                        'phone2':phone2,
                        'phone3':phone3,
                        'transport1':transport1,
                        'transport2':transport2,
                        'transport3':transport3,
                        'transport4':transport4,
                        'transport5':transport5,
                        'transport6':transport6,
                        'transport7':transport7,
                        'transport8':transport8,
                        'other_exp1':other_exp1,
                        'other_exp2':other_exp2,
                        'other_exp3':other_exp3,
                        'other_exp4':other_exp4,
                        'other_exp5':other_exp5,
                        'other_exp6':other_exp6,
                        'other_exp7':other_exp7,
                        'other_exp8':other_exp8,
                        'other_exp9':other_exp9,
                        'other_exp10':other_exp10,
                        'other_exp11':other_exp11,
                        'other_exp12':other_exp12,
                        'other_exp13':other_exp13,
                        'other_exp14':other_exp14,
                        'other_exp15':other_exp15,
                        'other_exp16':other_exp16,

                    },
                success: function(data)
                {
                    var messageIcon = 'error';
                        if (data == 'success') {
                            calculate_total_outgoings();
                            var message = 'Data Saved Successfully';
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
    // $(document).on('click','#essential_expediture',function(e){
    //         e.preventDefault();

            
           
            
    //         var essential_expediture_total = 
    //         parseInt(essential_expediture1) + 
    //         parseInt(essential_expediture2) + 
    //         parseInt(essential_expediture3)  + 
    //         parseInt(essential_expediture4) + 
    //         parseInt(essential_expediture5) + 
    //         parseInt(essential_expediture6) + 
    //         parseInt(essential_expediture7) + 
    //         parseInt(essential_expediture8) + 
    //         parseInt(essential_expediture9) + 
    //         parseInt(essential_expediture10) + 
    //         parseInt(essential_expediture11) + 
    //         parseInt(essential_expediture12) + 
    //         parseInt(essential_expediture13) + 
    //         parseInt(essential_expediture14) + 
    //         parseInt(essential_expediture15) + 
    //         parseInt(essential_expediture16) + 
    //         parseInt(essential_expediture17) + 
    //         parseInt(essential_expediture18) + 
    //         parseInt(essential_expediture19) + 
    //         parseInt(essential_expediture20);
            
    //         // var housing_total = ReplaceNumberWithCommas(housing_total);
    //         $('.essential_expediture').text(essential_expediture_total);

    // });
        
        

    //     $(document).on('click','#housing',function(e){
    //     e.preventDefault();
    //         var userId = $('#userId').val();
    //         // house_keeping1
    //         var house_keeping1 = $('#house_keeping1').val();
    //         if(house_keeping1 == '') { house_keeping1 = 0; }
    //         var house_keeping2 = $('#house_keeping2').val();
    //         if(house_keeping2 == '') { house_keeping2 = 0; }
    //         var house_keeping3 = $('#house_keeping3').val();
    //         if(house_keeping3 == '') { house_keeping3 = 0; }
    //         var house_keeping4 = $('#house_keeping4').val();
    //         if(house_keeping4 == '') { house_keeping4 = 0; }
    //         var house_keeping5 = $('#house_keeping5').val();
    //         if(house_keeping5 == '') { house_keeping5 = 0; }
    //         var house_keeping6 = $('#house_keeping6').val();
    //         if(house_keeping6 == '') { house_keeping6 = 0; }
    //         var house_keeping7 = $('#house_keeping7').val();
    //         if(house_keeping7 == '') { house_keeping7 = 0; }
    //         var house_keeping8 = $('#house_keeping8').val();
    //         if(house_keeping8 == '') { house_keeping8 = 0; }
                    
    //         var house_keeping_total = parseInt(house_keeping1) + parseInt(house_keeping2) + parseInt(house_keeping3) + parseInt(house_keeping4) + parseInt(house_keeping5) + parseInt(house_keeping6) + parseInt(house_keeping7) + parseInt(house_keeping8);
    //         // var utilities_total = ReplaceNumberWithCommas(utilities_total);
    //         $('.house_keeping_total').text(house_keeping_total);
    //          $.ajax({
    //             url:'{{ route('user.update_user_outgoing_housing_keeping') }}',
    //             method:'post',
    //             dataType: 'json',
    //             data:{
    //                     '_token':'{{ csrf_token() }}',
    //                     'userId':userId,
    //                     'house_keeping1':house_keeping1,
    //                     'house_keeping2':house_keeping2,
    //                     'house_keeping3':house_keeping3,
    //                     'house_keeping4':house_keeping4,
    //                     'house_keeping5':house_keeping5,
    //                     'house_keeping6':house_keeping6,
    //                     'house_keeping7':house_keeping7,
    //                     'house_keeping8':house_keeping8 
    //                 },
    //             success: function(data)
    //             {
    //                 var messageIcon = 'error';
    //                     if (data == 'success') {
    //                         calculate_total_outgoings();
    //                         var message = 'Data Saved Successfully';
    //                         var messageIcon = 'success';
    //                     } else {
    //                         var message = 'something wrong please try again';
    //                     }
    //                     swal(message, {
    //                       icon: messageIcon,
    //                     });
    //             }
    //         });
    // });
    // $(document).on('click','#phone',function(e){
    //     e.preventDefault();
    //         var userId = $('#userId').val();
    //         var phone1 =$('#phone1').val();
    //         if(phone1 == '') { phone1 = 0; } 
    //         var phone2 =$('#phone2').val();
    //         if(phone2 == '') { phone2 = 0; } 
    //         var phone3 =$('#phone3').val();
    //         if(phone3 == '') { phone3 = 0; } 
            
    //         var phone_total = parseInt(phone1) + parseInt(phone2) + parseInt(phone3);
    //         // var leisure_total = ReplaceNumberWithCommas(leisure_total);
    //         $('.phone_total').text(phone_total);
    //          $.ajax({
    //             url:'{{ route('user.update_user_outgoing_phone') }}',
    //             method:'post',
    //             dataType: 'json',
    //             data:{
    //                     '_token':'{{ csrf_token() }}',
    //                     'userId':userId,
    //                     'phone1':phone1,
    //                     'phone2':phone2,
    //                     'phone3':phone3,
                      
    //                 },
    //             success: function(data)
    //             {
    //                 var messageIcon = 'error';
    //                  if (data == 'success') {
    //                      calculate_total_outgoings();
    //                         var message = 'Date Saved Successfully';
    //                         var messageIcon = 'success';
    //                     } else {
    //                         var message = 'something wrong please try again';
    //                     }
    //                     swal(message, {
    //                       icon: messageIcon,
    //                     });
    //             }
    //         });
    // });
    // $(document).on('click','#transport',function(e){
    //     e.preventDefault();
    //         var userId = $('#userId').val();
    //         var transport1 =$('#transport1').val();
    //         if(transport1 == '') { transport1 = 0; } 
    //         var transport2 =$('#transport2').val();
    //         if(transport2 == '') { transport2 = 0; } 
    //         var transport3 =$('#transport3').val();
    //         if(transport3 == '') { transport3 = 0; } 
    //         var transport4 =$('#transport4').val();
    //         if(transport4 == '') { transport4 = 0; } 
    //         var transport5 =$('#transport5').val();
    //         if(transport5 == '') { transport5 = 0; } 
    //         var transport6 =$('#transport6').val();
    //         if(transport6 == '') { transport6 = 0; } 
    //         var transport7 =$('#transport7').val();
    //         if(transport7 == '') { transport7 = 0; } 
    //         var transport8 =$('#transport8').val();
    //         if(transport8 == '') { transport8 = 0; } 
    //         var travel_total = parseInt(transport1) + parseInt(transport2) + parseInt(transport3) + parseInt(transport4) + parseInt(transport5) + parseInt(transport6) + parseInt(transport7) + parseInt(transport8);  
    //         // var transport_total = ReplaceNumberWithCommas(transport_total);
    //         $('.travel_total').text(travel_total);
    //          $.ajax({
    //             url:'{{ route('user.update_user_outgoing_transport_travel') }}',
    //             method:'post',
    //             dataType: 'json',
    //             data:{
    //                     '_token':'{{ csrf_token() }}',
    //                     'userId':userId,
    //                     'transport1':transport1,
    //                     'transport2':transport2,
    //                     'transport3':transport3,
    //                     'transport4':transport4,
    //                     'transport5':transport5,
    //                     'transport6':transport6,
    //                     'transport7':transport7,
    //                     'transport8':transport8,
    //                 },
    //             success: function(data)
    //             {
    //                 var messageIcon = 'error';
    //                  if (data == 'success') {
    //                         calculate_total_outgoings();
    //                         var message = 'Data Saved Successfully';
    //                         var messageIcon = 'success';
    //                     } else {
    //                         var message = 'something wrong please try again';
    //                     }
    //                     swal(message, {
    //                       icon: messageIcon,
    //                     });
    //             }
    //         });
    // });
    // $(document).on('click','#other_exp',function(e){
    //     e.preventDefault();
    //         var userId = $('#userId').val();
    //         var other_exp1 = $('#other_exp1').val();
    //         if(other_exp1 == '') { other_exp1 = 0; } 
    //         var other_exp2 = $('#other_exp2').val();
    //         if(other_exp2 == '') { other_exp2 = 0; } 
    //         var other_exp3 = $('#other_exp3').val();
    //         if(other_exp3 == '') { other_exp3 = 0; } 
    //         var other_exp4 = $('#other_exp4').val();
    //         if(other_exp4 == '') { other_exp4 = 0; } 
    //         var other_exp5 = $('#other_exp5').val();
    //         if(other_exp5 == '') { other_exp5 = 0; } 
    //         var other_exp6 = $('#other_exp6').val();
    //         if(other_exp6 == '') { other_exp6 = 0; } 
    //         var other_exp7 = $('#other_exp7').val();
    //         if(other_exp7 == '') { other_exp7 = 0; } 
    //         var other_exp8 = $('.other_exp8').val();
    //         if(other_exp8 == '') { other_exp8 = 0; } 
    //         var other_exp9 = $('#other_exp9').val();
    //         if(other_exp9 == '') { other_exp9 = 0; } 
    //         var other_exp10 = $('#other_exp10').val();
    //         if(other_exp10 == '') { other_exp10 = 0; } 
    //         var other_exp11 = $('#other_exp11').val();
    //         if(other_exp11 == '') { other_exp11 = 0; } 
    //         var other_exp12 = $('#other_exp12').val();
    //         if(other_exp12 == '') { other_exp12 = 0; } 
    //         var other_exp13 = $('#other_exp13').val();
    //         if(other_exp13 == '') { other_exp13 = 0; } 
    //         var other_exp14 = $('#other_exp14').val();
    //         if(other_exp14 == '') { other_exp14 = 0; } 
    //         var other_exp15 = $('#other_exp15').val();
    //         if(other_exp15 == '') { other_exp15 = 0; } 
    //         var other_exp16 = $('#other_exp16').val();
    //         if(other_exp16 == '') { other_exp16 = 0; } 
    //         var other_exp_total = parseInt(other_exp1) + parseInt(other_exp2) + parseInt(other_exp3) + parseInt(other_exp4) + parseInt(other_exp5) + parseInt(other_exp6) + parseInt(other_exp7) + parseInt(other_exp8) + parseInt(other_exp9) + parseInt(other_exp10) + parseInt(other_exp11) + parseInt(other_exp12) + parseInt(other_exp13) + parseInt(other_exp14) + parseInt(other_exp15) + parseInt(other_exp16);
    //         // var food_total = ReplaceNumberWithCommas(food_total);
    //         $('.other_exp').text(other_exp_total);
    //          $.ajax({
    //             url:'{{ route('user.update_user_outgoing_other_exp') }}',
    //             method:'post',
    //             dataType: 'json',
    //             data:{
    //                     '_token':'{{ csrf_token() }}',
    //                     'userId':userId,
    //                     'other_exp1':other_exp1,
    //                     'other_exp2':other_exp2,
    //                     'other_exp3':other_exp3,
    //                     'other_exp4':other_exp4,
    //                     'other_exp5':other_exp5,
    //                     'other_exp6':other_exp6,
    //                     'other_exp7':other_exp7,
    //                     'other_exp8':other_exp8,
    //                     'other_exp9':other_exp9,
    //                     'other_exp10':other_exp10,
    //                     'other_exp11':other_exp11,
    //                     'other_exp12':other_exp12,
    //                     'other_exp13':other_exp13,
    //                     'other_exp14':other_exp14,
    //                     'other_exp15':other_exp15,
    //                     'other_exp16':other_exp16,
    //                 },
    //             success: function(data)
    //             {
    //                 var messageIcon = 'error';
    //                      if (data == 'success') {
    //                         calculate_total_outgoings();
    //                         var message = 'Data Saved Successfully';
    //                         var messageIcon = 'success';
    //                     } else {
    //                         var message = 'something wrong please try again';
    //                     }
    //                     swal(message, {
    //                       icon: messageIcon,
    //                     });
    //             }
    //         });
    // });
   
</script>