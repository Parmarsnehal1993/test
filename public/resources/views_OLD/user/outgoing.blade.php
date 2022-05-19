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
            $how_much_do_you_pay_for_your_rent_mortgage_a_month = 0;
            $do_you_have_ground_rent_or_service_charge = 0;
            $how_much_do_you_pay_for_your_mortgage_endowment = 0;
            $do_you_have_secured_loan = "";
            $do_you_have_secured_loan_yes = "";
            $do_you_have_secured_loan_no = "";
            $if_yes_how_much_you_pay_secured_loan = 0;
            $how_much_do_you_pay_for_your_council_tax_rates_a_month = 0;
            $do_you_have_any_appliances_or_furniture_on_rent = "";
            $do_you_have_any_appliances_or_furniture_on_rent_yes = "";
            $do_you_have_any_appliances_or_furniture_on_rent_no = "";
            $if_yes_how_much_do_you_pay_appliance_or_furniture_rent = 0;
            $how_much_do_you_pay_for_tv_licence_every_month = 0;
            $totalHousing = 0;
            $housing_yes_no_counter = 0;
        @endphp
        @if(!empty($userOutgoingQuestionsHousing['data']))
            @foreach($userOutgoingQuestionsHousing['data'] as $housingKey => $housingValue)
                @php
                    $housingValue = collect($housingValue)->toArray();
                @endphp
                @if(strtolower($housingValue['question']) == 'how much do you pay for your rent/mortgage a month?')
                    @php
                        $how_much_do_you_pay_for_your_rent_mortgage_a_month = $housingValue['answer'];
                        $totalHousing += (int)$housingValue['answer']
                    @endphp
                @endif
                @if(strtolower($housingValue['question']) == 'do you have ground rent or service charge?')
                    @php
                        $do_you_have_ground_rent_or_service_charge = $housingValue['answer'];
                        $totalHousing += (int)$housingValue['answer']
                    @endphp
                @endif
                @if(strtolower($housingValue['question']) == 'how much do you pay for your mortgage endowment?')
                    @php
                        $how_much_do_you_pay_for_your_mortgage_endowment = $housingValue['answer'];
                        $totalHousing += (int)$housingValue['answer']
                    @endphp
                @endif
                @if(strtolower($housingValue['question']) == 'do you have secured loan?')
                    @php $do_you_have_secured_loan = $housingValue['answer']; @endphp
                    @if($housingValue['answer'] == 'YES') @php $do_you_have_secured_loan_yes = 'selected' @endphp @endif
                    @if($housingValue['answer'] == 'NO') @php $do_you_have_secured_loan_no = 'selected' @endphp @endif
                @endif
                @if(strtolower($housingValue['question']) == '(if yes) how much you pay?' && $housing_yes_no_counter == 0)
                    @php
                        $housing_yes_no_counter++;
                        $if_yes_how_much_you_pay_secured_loan = $housingValue['answer'];
                        $totalHousing += (int)$housingValue['answer']
                    @endphp
                @endif
                @if(strtolower($housingValue['question']) == 'how much do you pay for your council tax rates a month?')
                    @php
                        $how_much_do_you_pay_for_your_council_tax_rates_a_month = $housingValue['answer'];
                        $totalHousing += (int)$housingValue['answer']
                    @endphp
                @endif
                @if(strtolower($housingValue['question']) == 'do you have any appliances or furniture on rent?')
                    @php $do_you_have_any_appliances_or_furniture_on_rent = $housingValue['answer']; @endphp
                    @if($housingValue['answer'] == 'YES') @php $do_you_have_any_appliances_or_furniture_on_rent_yes = 'selected' @endphp @endif
                    @if($housingValue['answer'] == 'NO') @php $do_you_have_any_appliances_or_furniture_on_rent_no = 'selected' @endphp @endif
                @endif
                @if(strtolower($housingValue['question']) == '(if yes) how much do you pay?' && $housing_yes_no_counter == 1)
                    @php
                        $if_yes_how_much_do_you_pay_appliance_or_furniture_rent = $housingValue['answer'];
                        $totalHousing += (int)$housingValue['answer']
                    @endphp
                @endif
                @if(strtolower($housingValue['question']) == 'how much do you pay for tv licence every month?')
                    @php
                        $how_much_do_you_pay_for_tv_licence_every_month = $housingValue['answer'];
                        $totalHousing += (int)$housingValue['answer']
                    @endphp
                @endif
            @endforeach
        @endif
    <!-- Housing code end -->
    <!-- Utilities code start -->
        @php
            $gas = 0;
            $water = 0;
            $electricity = 0;
            $other_costs = 0;
            $totalUtilities = 0;
        @endphp
        @if(!empty($userOutgoingQuestionsUtilities['data']))
            @foreach($userOutgoingQuestionsUtilities['data'] as $utilitiesKey => $utilitiesValue)
                @php
                    $utilitiesValue = collect($utilitiesValue)->toArray();
                @endphp
                @if(strtolower($utilitiesValue['question']) == 'gas')
                    @php
                        $gas = $utilitiesValue['answer'];
                        $totalUtilities += (int)$utilitiesValue['answer']
                    @endphp
                @endif
                @if(strtolower($utilitiesValue['question']) == 'water')
                    @php
                        $water = $utilitiesValue['answer'];
                        $totalUtilities += (int)$utilitiesValue['answer']
                    @endphp
                @endif
                @if(strtolower($utilitiesValue['question']) == 'electricity')
                    @php
                        $electricity = $utilitiesValue['answer'];
                        $totalUtilities += (int)$utilitiesValue['answer']
                    @endphp
                @endif
                @if(strtolower($utilitiesValue['question']) == 'other costs')
                    @php
                        $other_costs = $utilitiesValue['answer'];
                        $totalUtilities += (int)$utilitiesValue['answer']
                    @endphp
                @endif
            @endforeach
        @endif
    <!-- Utilities code end -->
    <!-- Communications & Leisure code start -->
        @php
            $how_much_do_you_pay_for_your = 0;
            $mobile_phone = 0;
            $internet_tv_package = 0;
            $how_much_do_you_spend_on_hobbies_internet_per_month = 0;
            $how_much_do_you_spend_on_gifts_per_month = 0;
            $how_much_do_you_spend_for_pocket_money_for_school_trip_per_month = 0;
            $how_much_do_you_spend_on_newspapers_magazines_per_month = 0;
            $totalLeisure = 0;
        @endphp
        @if(!empty($userOutgoingQuestionsLeisure['data']))
            @foreach($userOutgoingQuestionsLeisure['data'] as $leisureKey => $leisureValue)
                @php
                    $leisureValue = collect($leisureValue)->toArray();
                @endphp
                @if(strtolower($leisureValue['question']) == 'how much do you pay for your')
                    @php
                        $how_much_do_you_pay_for_your = $leisureValue['answer'];
                        $totalLeisure += (int)$leisureValue['answer']
                    @endphp
                @endif
                @if(strtolower($leisureValue['question']) == 'mobile phone')
                    @php
                        $mobile_phone = $leisureValue['answer'];
                        $totalLeisure += (int)$leisureValue['answer']
                    @endphp
                @endif
                @if(strtolower($leisureValue['question']) == 'internet & tv package')
                    @php
                        $internet_tv_package = $leisureValue['answer'];
                        $totalLeisure += (int)$leisureValue['answer']
                    @endphp
                @endif
                @if(strtolower($leisureValue['question']) == 'how much do you spend on hobbies & internet per month?')
                    @php
                        $how_much_do_you_spend_on_hobbies_internet_per_month = $leisureValue['answer'];
                        $totalLeisure += (int)$leisureValue['answer']
                    @endphp
                @endif
                @if(strtolower($leisureValue['question']) == 'how much do you spend on gifts per month?')
                    @php
                        $how_much_do_you_spend_on_gifts_per_month = $leisureValue['answer'];
                        $totalLeisure += (int)$leisureValue['answer']
                    @endphp
                @endif
                @if(strtolower($leisureValue['question']) == 'how much do you spend for pocket money for school trip per month?')
                    @php
                        $how_much_do_you_spend_for_pocket_money_for_school_trip_per_month = $leisureValue['answer'];
                        $totalLeisure += (int)$leisureValue['answer']
                    @endphp
                @endif
                @if(strtolower($leisureValue['question']) == 'how much do you spend on newspapers & magazines per month?')
                    @php
                        $how_much_do_you_spend_on_newspapers_magazines_per_month = $leisureValue['answer'];
                        $totalLeisure += (int)$leisureValue['answer']
                    @endphp
                @endif
            @endforeach
        @endif
    <!-- Communications & Leisure code end -->
    <!-- Transport & Travel code start -->
        @php
            $car_insurance_per_month = 0;
            $road_tax_per_month = 0;
            $breakdown_cover_per_month = 0;
            $mot_maintenance_per_month = 0;
            $fuel_parking_per_month = 0;
            $how_much_do_you_spend_on_public_transport_per_month = 0;
            $how_much_is_your_car_finance_per_month = 0;
            $totalTravel = 0;
        @endphp
        @if(!empty($userOutgoingQuestionsTravel['data']))
            @foreach($userOutgoingQuestionsTravel['data'] as $travelKey => $travelValue)
                @php
                    $travelValue = collect($travelValue)->toArray();
                @endphp
                @if(strtolower($travelValue['question']) == 'car insurance per month?')
                    @php
                        $car_insurance_per_month = $travelValue['answer'];
                        $totalTravel += (int)$travelValue['answer']
                    @endphp
                @endif
                @if(strtolower($travelValue['question']) == 'road tax per month?')
                    @php
                        $road_tax_per_month = $travelValue['answer'];
                        $totalTravel += (int)$travelValue['answer']
                    @endphp
                @endif
                @if(strtolower($travelValue['question']) == 'breakdown cover per month?')
                    @php
                        $breakdown_cover_per_month = $travelValue['answer'];
                        $totalTravel += (int)$travelValue['answer']
                    @endphp
                @endif
                @if(strtolower($travelValue['question']) == 'mot & maintenance per month?')
                    @php
                        $mot_maintenance_per_month = $travelValue['answer'];
                        $totalTravel += (int)$travelValue['answer']
                    @endphp
                @endif
                @if(strtolower($travelValue['question']) == 'fuel & parking per month?')
                    @php
                        $fuel_parking_per_month = $travelValue['answer'];
                        $totalTravel += (int)$travelValue['answer']
                    @endphp
                @endif
                @if(strtolower($travelValue['question']) == 'how much do you spend on public transport per month?')
                    @php
                        $how_much_do_you_spend_on_public_transport_per_month = $travelValue['answer'];
                        $totalTravel += (int)$travelValue['answer']
                    @endphp
                @endif
                @if(strtolower($travelValue['question']) == 'how much is your car finance per month?')
                    @php
                        $how_much_is_your_car_finance_per_month = $travelValue['answer'];
                        $totalTravel += (int)$travelValue['answer']
                    @endphp
                @endif
            @endforeach
        @endif
    <!-- Transport & Travel code end -->
    <!-- Food & Housekeeping code start -->
        @php
            $how_much_do_spend_on_groceries_monthly = 0;
            $how_much_do_spend_on_pet_food_monthly = 0;
            $how_much_do_spend_on_nappies_monthly = 0;
            $how_much_do_you_spend_on_school_meals_per_month = 0;
            $how_much_do_you_spend_on_meals_at_work_per_month = 0;
            $how_much_do_you_spend_on_laundry_dry_cleaning_per_month = 0;
            $how_much_do_you_spend_on_alcohol_per_month = 0;
            $how_much_do_you_spend_on_cigarettes_per_month = 0;
            $how_much_do_you_spend_on_housekeeping_per_month = 0;
            $totalFood = 0;
        @endphp
        @if(!empty($userOutgoingQuestionsFood['data']))
            @foreach($userOutgoingQuestionsFood['data'] as $foodKey => $foodValue)
                @php
                    $foodValue = collect($foodValue)->toArray();
                @endphp
                @if(strtolower($foodValue['question']) == 'how much do spend on groceries monthly?')
                    @php
                        $how_much_do_spend_on_groceries_monthly = $foodValue['answer'];
                        $totalFood += (int)$foodValue['answer']
                    @endphp
                @endif
                @if(strtolower($foodValue['question']) == 'how much do spend on pet food monthly?')
                    @php
                        $how_much_do_spend_on_pet_food_monthly = $foodValue['answer'];
                        $totalFood += (int)$foodValue['answer']
                    @endphp
                @endif
                @if(strtolower($foodValue['question']) == 'how much do spend on nappies monthly?')
                    @php
                        $how_much_do_spend_on_nappies_monthly = $foodValue['answer'];
                        $totalFood += (int)$foodValue['answer']
                    @endphp
                @endif
                @if(strtolower($foodValue['question']) == 'how much do you spend on school meals per month?')
                    @php
                        $how_much_do_you_spend_on_school_meals_per_month = $foodValue['answer'];
                        $totalFood += (int)$foodValue['answer']
                    @endphp
                @endif
                @if(strtolower($foodValue['question']) == 'how much do you spend on meals at work per month??')
                    @php
                        $how_much_do_you_spend_on_meals_at_work_per_month = $foodValue['answer'];
                        $totalFood += (int)$foodValue['answer']
                    @endphp
                @endif
                @if(strtolower($foodValue['question']) == 'how much do you spend on laundry & dry cleaning per month?')
                    @php
                        $how_much_do_you_spend_on_laundry_dry_cleaning_per_month = $foodValue['answer'];
                        $totalFood += (int)$foodValue['answer']
                    @endphp
                @endif
                @if(strtolower($foodValue['question']) == 'how much do you spend on alcohol per month')
                    @php
                        $how_much_do_you_spend_on_alcohol_per_month = $foodValue['answer'];
                        $totalFood += (int)$foodValue['answer']
                    @endphp
                @endif
                @if(strtolower($foodValue['question']) == 'how much do you spend on cigarettes per month')
                    @php
                        $how_much_do_you_spend_on_cigarettes_per_month = $foodValue['answer'];
                        $totalFood += (int)$foodValue['answer']
                    @endphp
                @endif
                @if(strtolower($foodValue['question']) == 'how much do you spend on housekeeping per month')
                    @php
                        $how_much_do_you_spend_on_housekeeping_per_month = $foodValue['answer'];
                        $totalFood += (int)$foodValue['answer']
                    @endphp
                @endif
            @endforeach
        @endif
    <!-- Food & Housekeeping code end -->
    <!-- panisions & Insurences code start -->
        @php
            $pension_payments = 0;
            $mortgage_payment_protection = 0;
            $health_insurance = 0;
            $life_insurance = 0;
            $building_contents_insurance = 0;
            $vets_pet_insurance = 0;
            $totalPensions = 0;
        @endphp
        @if(!empty($userOutgoingQuestionsPensions['data']))
            @foreach($userOutgoingQuestionsPensions['data'] as $pensionsKey => $pensionsValue)
                @php
                    $pensionsValue = collect($pensionsValue)->toArray();
                @endphp
                @if(strtolower($pensionsValue['question']) == 'pension payments')
                    @php
                        $pension_payments = $pensionsValue['answer'];
                        $totalPensions += (int)$pensionsValue['answer']
                    @endphp
                @endif
                @if(strtolower($pensionsValue['question']) == 'mortgage payment protection')
                    @php
                        $mortgage_payment_protection = $pensionsValue['answer'];
                        $totalPensions += (int)$pensionsValue['answer']
                    @endphp
                @endif
                @if(strtolower($pensionsValue['question']) == 'health insurance')
                    @php
                        $health_insurance = $pensionsValue['answer'];
                        $totalPensions += (int)$pensionsValue['answer']
                    @endphp
                @endif
                @if(strtolower($pensionsValue['question']) == 'life insurance')
                    @php
                        $life_insurance = $pensionsValue['answer'];
                        $totalPensions += (int)$pensionsValue['answer']
                    @endphp
                @endif
                @if(strtolower($pensionsValue['question']) == 'building & contents insurance')
                    @php
                        $building_contents_insurance = $pensionsValue['answer'];
                        $totalPensions += (int)$pensionsValue['answer']
                    @endphp
                @endif
                @if(strtolower($pensionsValue['question']) == 'vets/pet insurance')
                    @php
                        $vets_pet_insurance = $pensionsValue['answer'];
                        $totalPensions += (int)$pensionsValue['answer']
                    @endphp
                @endif
            @endforeach
        @endif
    <!-- panisions & Insurences code end -->
    <!-- Personal Costs code start -->
        @php
            $clothing = 0;
            $hairdressing = 0;
            $toiletries = 0;
            $totalPersonal = 0;
        @endphp
        @if(!empty($userOutgoingQuestionsPersonal['data']))
            @foreach($userOutgoingQuestionsPersonal['data'] as $personalKey => $personalValue)
                @php
                    $personalValue = collect($personalValue)->toArray();
                @endphp
                @if(strtolower($personalValue['question']) == 'clothing')
                    @php
                        $clothing = $personalValue['answer'];
                        $totalPersonal += (int)$personalValue['answer']
                    @endphp
                @endif
                @if(strtolower($personalValue['question']) == 'hairdressing')
                    @php
                        $hairdressing = $personalValue['answer'];
                        $totalPersonal += (int)$personalValue['answer']
                    @endphp
                @endif
                @if(strtolower($personalValue['question']) == 'toiletries')
                    @php
                        $toiletries = $personalValue['answer'];
                        $totalPersonal += (int)$personalValue['answer']
                    @endphp
                @endif
            @endforeach
        @endif
    <!-- Personal Costs code end -->
    <!-- Care & Health Costs code start -->
        @php
            $how_much_do_you_spend_on_childcare_costs_per_month = 0;
            $how_much_do_you_spend_on_adult_care_costs_per_month = 0;
            $do_you_pay_any_child_maintenance_or_child_support = "";
            $do_you_pay_any_child_maintenance_or_child_support_yes = "";
            $do_you_pay_any_child_maintenance_or_child_support_no = "";
            $if_yes_how_much_per_month_pay_any_child_maintenance_or_child_support = 0;
            $how_much_do_you_spend_on_pocket_money_or_school_trips_per_month = 0;
            $how_much_do_you_spend_on_health_dentist_medicine_eyecare = 0;
            $totalCare = 0;
        @endphp
        @if(!empty($userOutgoingQuestionsCare['data']))
            @foreach($userOutgoingQuestionsCare['data'] as $careKey => $careValue)
                @php
                    $careValue = collect($careValue)->toArray();
                @endphp
                @if(strtolower($careValue['question']) == 'how much do you spend on childcare costs per month?')
                    @php
                        $how_much_do_you_spend_on_childcare_costs_per_month = $careValue['answer'];
                        $totalCare += (int)$careValue['answer']
                    @endphp
                @endif
                @if(strtolower($careValue['question']) == 'how much do you spend on adult care costs per month?')
                    @php
                        $how_much_do_you_spend_on_adult_care_costs_per_month = $careValue['answer'];
                        $totalCare += (int)$careValue['answer']
                    @endphp
                @endif
                @if(strtolower($careValue['question']) == 'do you pay any child maintenance or child support?')
                    @php
                        $do_you_pay_any_child_maintenance_or_child_support = $careValue['answer'];
                    @endphp
                @endif
                @if(strtolower($careValue['question']) == '(if yes) how much per month?')
                    @php
                        $if_yes_how_much_per_month_pay_any_child_maintenance_or_child_support = $careValue['answer'];
                        $totalCare += (int)$careValue['answer']
                    @endphp
                @endif
                @if(strtolower($careValue['question']) == 'how much do you spend on pocket money or school trips per month?')
                    @php
                        $how_much_do_you_spend_on_pocket_money_or_school_trips_per_month = $careValue['answer'];
                        $totalCare += (int)$careValue['answer']
                    @endphp
                @endif
                @if(strtolower($careValue['question']) == 'how much do you spend on health (dentist, medicine, eyecare)?')
                    @php
                        $how_much_do_you_spend_on_health_dentist_medicine_eyecare = $careValue['answer'];
                        $totalCare += (int)$careValue['answer']
                    @endphp
                @endif
            @endforeach
        @endif
    <!-- Care & Health Costs code end -->
    <!-- School Costs code start -->
        @php
            $how_much_on_average_do_you_spend_on_school_uniform_per_month = 0;
            $how_much_do_you_pay_for_after_school_costs_school_activities = 0;
            $totalSchool = 0;
        @endphp
        @if(!empty($userOutgoingQuestionsSchool['data']))
            @foreach($userOutgoingQuestionsSchool['data'] as $schoolKey => $schoolValue)
                @php
                    $schoolValue = collect($schoolValue)->toArray();
                @endphp
                @if(strtolower($schoolValue['question']) == 'how much on average do you spend on school uniform per month?')
                    @php
                        $how_much_on_average_do_you_spend_on_school_uniform_per_month = $schoolValue['answer'];
                        $totalSchool += (int)$schoolValue['answer']
                    @endphp
                @endif
                @if(strtolower($schoolValue['question']) == 'how much do you pay for after school costs & school activities?')
                    @php
                        $how_much_do_you_pay_for_after_school_costs_school_activities = $schoolValue['answer'];
                        $totalSchool += (int)$schoolValue['answer']
                    @endphp
                @endif
            @endforeach
        @endif
    <!-- School Costs code end -->
    <!-- Profational Costs code start -->
        @php
            $professional_courses = 0;
            $union_fees = 0;
            $professional_fees = 0;
            $totalProfessional = 0;
        @endphp
        @if(!empty($userOutgoingQuestionsProfessional['data']))
            @foreach($userOutgoingQuestionsProfessional['data'] as $professionalKey => $professionalValue)
                @php
                    $professionalValue = collect($professionalValue)->toArray();
                @endphp
                @if(strtolower($professionalValue['question']) == 'professional courses')
                    @php
                        $professional_courses = $professionalValue['answer'];
                        $totalProfessional += (int)$professionalValue['answer']
                    @endphp
                @endif
                @if(strtolower($professionalValue['question']) == 'union fees')
                    @php
                        $union_fees = $professionalValue['answer'];
                        $totalProfessional += (int)$professionalValue['answer']
                    @endphp
                @endif
                @if(strtolower($professionalValue['question']) == 'professional fees')
                    @php
                        $professional_fees = $professionalValue['answer'];
                        $totalProfessional += (int)$professionalValue['answer']
                    @endphp
                @endif
            @endforeach
        @endif
    <!-- Profational Costs code end -->
    <!-- SAVINGS code start -->
        @php
            $how_much_do_you_put_away_for_savings_per_month = 0;
            $totalSaving = 0;
        @endphp
        @if(!empty($userOutgoingQuestionsSaving['data']))
            @foreach($userOutgoingQuestionsSaving['data'] as $savingKey => $savingValue)
                @php
                    $savingValue = collect($savingValue)->toArray();
                @endphp
                @if(strtolower($savingValue['question']) == 'how much do you put away for savings per month')
                    @php
                        $how_much_do_you_put_away_for_savings_per_month = $savingValue['answer'];
                        $totalSaving += (int)$savingValue['answer']                    
                    @endphp
                @endif
            @endforeach
        @endif
    <!-- SAVINGS code end -->
    <!-- OTHER ESSENTIAL COSTS code start -->
        @php
            $any_other_essential_costs_you_spend_on_per_month_please_list_below = 0;
            $totalEssential = 0;
        @endphp
        @if(!empty($userOutgoingQuestionsEssential['data']))
            @foreach($userOutgoingQuestionsEssential['data'] as $essentialKey => $essentialValue)
                @php
                    $essentialValue = collect($essentialValue)->toArray();
                @endphp
                @if(strtolower($essentialValue['question']) == 'any other essential costs you spend on per month please list below')
                    @php
                        $any_other_essential_costs_you_spend_on_per_month_please_list_below = $essentialValue['answer'];
                        $totalEssential += (int)$essentialValue['answer']
                    @endphp
                @endif
            @endforeach
        @endif
    <!-- OTHER ESSENTIAL COSTS code end -->
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
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="row mt-0">
                                            <div class="" style="padding-right: 30px;width: 100%;">
                                                <ul class="table-body align-items-center flex-wrap outgoing-data">
                                                    <li>
                                                        Housing
                                                    </li>
                                                    <li>
                                                        <span style="margin-top:5px;">
                                                        total:&#163;    
                                                        </span>
                                                        <span class="housing_total"> {{ $totalHousing }}</span>
                                                        <a href="#" data-toggle="collapse" data-target="#housing_collapse">
                                                        <img
                                                            src="{!! asset('images/icons/Plus_Icon@2x.png')!!}"
                                                            alt="Plus"
                                                            class="img-fluid"
                                                            width="30">
                                                        </a>
                                                    </li>
                                                    <div id="housing_collapse" class="collapse scroll-y">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                how much do you pay for your rent/mortgage a month?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    name="how much do you pay for your rent/mortgage a month?"
                                                                    id="housing_1"
                                                                    class="form-control"
                                                                    value="{{ $how_much_do_you_pay_for_your_rent_mortgage_a_month }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>do you have ground rent or service charge?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    name="do you have ground rent or service charge?"
                                                                    id="housing_2"
                                                                    class="form-control"
                                                                    value="{{ $do_you_have_ground_rent_or_service_charge }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>how much do you pay for your mortgage endowment?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="housing_3"
                                                                    name="how much do you pay for your mortgage endowment?"
                                                                    class="form-control"
                                                                    value="{{ $how_much_do_you_pay_for_your_mortgage_endowment }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                do you have secured loan?
                                                                </span>
                                                                <select name="do you have secured loan?" id="housing_4" class="form-control" value="{{ $do_you_have_secured_loan }}">
                                                                    <option value="yes">yes</option>
                                                                    <option value="no">no</option>
                                                                </select>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>(if yes) how much you pay?</span>
                                                                <input
                                                                    type="text"
                                                                    name="(if yes) how much you pay?"
                                                                    id="housing_5"
                                                                    class="form-control"
                                                                    value="{{ $if_yes_how_much_you_pay_secured_loan }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>how much do you pay for your council tax rates a month?</span>
                                                                <input
                                                                    type="text"
                                                                    id="housing_6"
                                                                    name="how much do you pay for your council tax rates a month?"
                                                                    class="form-control"
                                                                    value="{{ $how_much_do_you_pay_for_your_council_tax_rates_a_month }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>do you have any appliances or furniture on rent?
                                                                </span>
                                                                <select value="{{ $do_you_have_any_appliances_or_furniture_on_rent }}" class="form-control" name="do you have any appliances or furniture on rent?" id="housing_7">
                                                                    <option value="yes">yes</option>
                                                                    <option value="no">no</option>
                                                                </select>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>(if yes) how much do you pay?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    name="(if yes) how much do you pay?"
                                                                    id="housing_8"
                                                                    class="form-control"
                                                                    value="{{ $if_yes_how_much_do_you_pay_appliance_or_furniture_rent }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                how much do you pay for tv licence every month?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    name="how much do you pay for tv licence every month?"
                                                                    id="housing_9"
                                                                    class="form-control"
                                                                    value="{{ $how_much_do_you_pay_for_tv_licence_every_month }}">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a href="#" id="housing" class="btn btn-outline-info btn-large">Update</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>
                                                <ul class="table-body align-items-center flex-wrap outgoing-data">
                                                    <li>
                                                        utilities
                                                    </li>
                                                    <li><span style="margin-top:5px;">
                                                        total:&#163;    
                                                        </span><span class="utiliti_total">{{ $totalUtilities }}</span>
                                                        <a href="#" data-toggle="collapse" data-target="#utilities_collapse">
                                                        <img
                                                            src="{!! asset('images/icons/Plus_Icon@2x.png')!!}"
                                                            alt="Plus"
                                                            class="img-fluid"
                                                            width="30">
                                                        </a>
                                                    </li>
                                                    <div id="utilities_collapse" class="collapse scroll-y">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>gas
                                                                </span>
                                                                <input type="text" id="gas" name="gas" class="form-control" value="{{ $gas }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>water
                                                                </span>
                                                                <input type="text" id="water" name="water" class="form-control" value="{{ $water }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>electricity
                                                                </span>
                                                                <input type="text" name="electricity" id="electricity" class="form-control" value="{{ $electricity }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                other costs
                                                                </span>
                                                                <input type="text" id="other_costs" name="other_costs" class="form-control" value="{{ $other_costs }}">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a
                                                                    href="javascipt:void(0)"
                                                                    id="utilities"
                                                                    class="btn btn-outline-info btn-large">Update</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>
                                                <ul class="table-body align-items-center flex-wrap outgoing-data">
                                                    <li>
                                                        Communications & Leisure
                                                    </li>
                                                    <li><span style="margin-top:5px;">
                                                        total:&#163;    
                                                        </span><span class="leisure_total">{{ $totalLeisure }}</span>
                                                        <a href="#" data-toggle="collapse" data-target="#Communications_collapse">
                                                        <img
                                                            src="{!! asset('images/icons/Plus_Icon@2x.png')!!}"
                                                            alt="Plus"
                                                            class="img-fluid"
                                                            width="30">
                                                        </a>
                                                    </li>
                                                    <div id="Communications_collapse" class="collapse scroll-y">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                how much do you pay for your
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="leisure1"
                                                                    name="how much do you pay for your"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $how_much_do_you_pay_for_your }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>mobile phone
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="leisure2"
                                                                    name="mobile phone"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $mobile_phone }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>internet & tv package
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="leisure3"
                                                                    name="internet & tv package"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $internet_tv_package }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>how much do you spend on hobbies & internet per month?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="leisure4"
                                                                    name="how much do you spend on hobbies & internet per month?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $how_much_do_you_spend_on_hobbies_internet_per_month }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>how much do you spend on gifts per month?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="leisure5"
                                                                    name="how much do you spend on gifts per month?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $how_much_do_you_spend_on_gifts_per_month }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>how much do you spend for pocket money for school trip per month?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="leisure6"
                                                                    name="how much do you spend for pocket money for school trip per month?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $how_much_do_you_spend_for_pocket_money_for_school_trip_per_month }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                how much do you spend on newspapers & magazines per month?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="leisure7"
                                                                    name="how much do you spend on newspapers & magazines per month?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $how_much_do_you_spend_on_newspapers_magazines_per_month }}">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a href="javascipt:void(0)" id="leisure" class="btn btn-outline-info btn-large">Update</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>
                                                <ul class="table-body align-items-center flex-wrap outgoing-data">
                                                    <li>
                                                        Transport & Travel
                                                    </li>
                                                    <li>
<span style="margin-top:5px;">
                                                        total:&#163;    
                                                        </span><span class="transport">{{ $totalTravel }}</span>
                                                        <a href="#" data-toggle="collapse" data-target="#travel_collapse">
                                                        <img
                                                            src="{!! asset('images/icons/Plus_Icon@2x.png')!!}"
                                                            alt="Plus"
                                                            class="img-fluid"
                                                            width="30">
                                                        </a>
                                                    </li>
                                                    <div id="travel_collapse" class="collapse scroll-y">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>car insurance per month?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="transport1"
                                                                    name="car insurance per month?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $car_insurance_per_month }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>road tax per month?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="transport2"
                                                                    name="road tax per month?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $road_tax_per_month }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>breakdown cover per month?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="transport3"
                                                                    name="breakdown cover per month?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $breakdown_cover_per_month }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>mot & maintenance per month?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="transport4"
                                                                    name="mot & maintenance per month?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $mot_maintenance_per_month }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>fuel & parking per month?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="transport5"
                                                                    name="fuel & parking per month?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $fuel_parking_per_month }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>how much do you spend on public transport per month?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="transport6"
                                                                    name="how much do you spend on public transport per month?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $how_much_do_you_spend_on_public_transport_per_month }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                how much is your car finance per month?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="transport7"
                                                                    name=" how much is your car finance per month?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $how_much_is_your_car_finance_per_month }}">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a
                                                                    href="javascipt:void(0)"
                                                                    id="transport"
                                                                    class="btn btn-outline-info btn-large">Update</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>
                                                <ul class="table-body align-items-center flex-wrap outgoing-data">
                                                    <li>
                                                        Food & Housekeeping
                                                    </li>
                                                    <li>
                                                        <span style="margin-top:5px;">
                                                        total:&#163;    
                                                        </span><span class="food">{{ $totalFood }}</span>
                                                        <a href="#" data-toggle="collapse" data-target="#food_collapse">
                                                        <img
                                                            src="{!! asset('images/icons/Plus_Icon@2x.png')!!}"
                                                            alt="Plus"
                                                            class="img-fluid"
                                                            width="30">
                                                        </a>
                                                    </li>
                                                    <div id="food_collapse" class="collapse scroll-y">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>how much do spend on groceries monthly?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="food1"
                                                                    name="how much do spend on groceries monthly?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $how_much_do_spend_on_groceries_monthly }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>how much do spend on pet food monthly?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="food2"
                                                                    name="how much do spend on pet food monthly?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $how_much_do_spend_on_pet_food_monthly }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>how much do spend on nappies monthly?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="food3"
                                                                    name="how much do spend on nappies monthly?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $how_much_do_spend_on_nappies_monthly }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>how much do you spend on school meals per month?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="food4"
                                                                    name="how much do you spend on school meals per month?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $how_much_do_you_spend_on_school_meals_per_month }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>how much do you spend on meals at work per month?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="food5"
                                                                    name="how much do you spend on meals at work per month?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $how_much_do_you_spend_on_meals_at_work_per_month }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>how much do you spend on laundry & dry cleaning per month?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="food6"
                                                                    name="how much do you spend on laundry & dry cleaning per month?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $how_much_do_you_spend_on_laundry_dry_cleaning_per_month }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>how much do you spend on alcohol per month
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="food7"
                                                                    name="how much do you spend on alcohol per month "
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $how_much_do_you_spend_on_alcohol_per_month }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>how much do you spend on cigarettes per month
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    name="how much do you spend on cigarettes per month"
                                                                    class="food8 form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $how_much_do_you_spend_on_cigarettes_per_month }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                how much do you spend on housekeeping per month
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="food9"
                                                                    name="how much do you spend on housekeeping per month"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $how_much_do_you_spend_on_housekeeping_per_month }}">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a href="javascipt:void(0)" id="food" class="btn btn-outline-info btn-large">Update</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>
                                                <ul class="table-body align-items-center flex-wrap outgoing-data">
                                                    <li>
                                                        panisions & Insurences
                                                    </li>
                                                    <li>
                                                        <span style="margin-top:5px;"> total:&#163;</span>
                                                        <span class="panisions">{{ $totalPensions }}</span>
                                                        <a href="#" data-toggle="collapse" data-target="#panisions_collapse">
                                                        <img
                                                            src="{!! asset('images/icons/Plus_Icon@2x.png')!!}"
                                                            alt="Plus"
                                                            class="img-fluid"
                                                            width="30">
                                                        </a>
                                                    </li>
                                                    <div id="panisions_collapse" class="collapse scroll-y">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>pension payments
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="pension_payments"
                                                                    name="pension payments"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $pension_payments }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>mortgage payment protection
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="mortgage_payment_protection"
                                                                    name="mortgage payment protection"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $mortgage_payment_protection }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>health insurance
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="health_insurance"
                                                                    name="health insurance"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $health_insurance }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>life insurance
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="life_insurance"
                                                                    name="life insurance"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $life_insurance }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>building & contents insurance
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="building_contents_insurance"
                                                                    name="building & contents insurance"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $building_contents_insurance }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                vets/pet insurance
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="panisions1"
                                                                    name="vets/pet insurance"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $vets_pet_insurance }}">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a
                                                                    href="javascipt:void(0)"
                                                                    id="panisions"
                                                                    class="btn btn-outline-info btn-large">Update</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>
                                                <ul class="table-body align-items-center flex-wrap outgoing-data">
                                                    <li>
                                                        Personal Costs
                                                    </li>
                                                    <li>
                                                        <span style="margin-top:5px;">
                                                        total:&#163;    
                                                        </span><span class="personal_costs">{{ $totalPersonal }}</span>
                                                        <a href="#" data-toggle="collapse" data-target="#personal_collapse">
                                                        <img
                                                            src="{!! asset('images/icons/Plus_Icon@2x.png')!!}"
                                                            alt="Plus"
                                                            class="img-fluid"
                                                            width="30">
                                                        </a>
                                                    </li>
                                                    <div id="personal_collapse" class="collapse scroll-y">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                clothing
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="clothing"
                                                                    name=" clothing"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $clothing }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>hairdressing
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="hairdressing"
                                                                    name="hairdressing"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $hairdressing }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                toiletries
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="toiletries"
                                                                    name="toiletries"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $toiletries }}">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a
                                                                    href="javascipt:void(0)"
                                                                    id="personal_costs"
                                                                    class="btn btn-outline-info btn-large">Update</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>
                                                <ul class="table-body align-items-center flex-wrap outgoing-data">
                                                    <li>
                                                        Care & Health Costs
                                                    </li>
                                                    <li>
<span style="margin-top:5px;">
                                                        total:&#163;    
                                                        </span><span class="care">{{ $totalCare }}</span>
                                                        <a href="#" data-toggle="collapse" data-target="#health_collapse">
                                                        <img
                                                            src="{!! asset('images/icons/Plus_Icon@2x.png')!!}"
                                                            alt="Plus"
                                                            class="img-fluid"
                                                            width="30">
                                                        </a>
                                                    </li>
                                                    <div id="health_collapse" class="collapse scroll-y">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>how much do you spend on childcare costs per month?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="care1"
                                                                    name="how much do you spend on childcare costs per month?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $how_much_do_you_spend_on_childcare_costs_per_month }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>how much do you spend on adult care costs per month?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="care2"
                                                                    name="how much do you spend on adult care costs per month?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $how_much_do_you_spend_on_adult_care_costs_per_month }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>do you pay any child maintenance or child support?
                                                                </span>
                                                                <select
                                                                    id="care3"
                                                                    name="do you pay any child maintenance or child support?"
                                                                    class="form-control">
                                                                    <option {{ $do_you_pay_any_child_maintenance_or_child_support_yes }}>Yes</option>
                                                                    <option {{ $do_you_pay_any_child_maintenance_or_child_support_no }}>No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>: (if yes) how much per month?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="care4"
                                                                    name="(if yes) how much per month?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $if_yes_how_much_per_month_pay_any_child_maintenance_or_child_support }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                how much do you spend on pocket money or school trips per month?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="care5"
                                                                    name=" how much do you spend on pocket money or school trips per month?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $how_much_do_you_spend_on_pocket_money_or_school_trips_per_month }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                how much do you spend on health (dentist, medicine, eyecare)?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="care6"
                                                                    name="how much do you spend on health (dentist, medicine, eyecare)?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $how_much_do_you_spend_on_health_dentist_medicine_eyecare }}">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a href="javascipt:void(0)" id="care" class="btn btn-outline-info btn-large">Update</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>
                                                <ul class="table-body align-items-center flex-wrap outgoing-data">
                                                    <li>
                                                        School Costs
                                                    </li>
                                                    <li>
<span style="margin-top:5px;">
                                                        total:&#163;    
                                                        </span><span class="school_cost">{{ $totalSchool }}</span>
                                                        <a href="#" data-toggle="collapse" data-target="#school_collapse">
                                                        <img
                                                            src="{!! asset('images/icons/Plus_Icon@2x.png')!!}"
                                                            alt="Plus"
                                                            class="img-fluid"
                                                            width="30">
                                                        </a>
                                                    </li>
                                                    <div id="school_collapse" class="collapse scroll-y">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>how much on average do you spend on school uniform per month?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="school_cost1"
                                                                    name="how much on average do you spend on school uniform per month?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $how_much_on_average_do_you_spend_on_school_uniform_per_month }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                how much do you pay for after school costs & school activities?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="school_cost2"
                                                                    name=" how much do you pay for after school costs & school activities?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $how_much_do_you_pay_for_after_school_costs_school_activities }}">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a
                                                                    href="javascipt:void(0)"
                                                                    id="school_cost"
                                                                    class="btn btn-outline-info btn-large">Update</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>
                                                <ul class="table-body align-items-center flex-wrap outgoing-data">
                                                    <li>
                                                        Professional Costs
                                                    </li>
                                                    <li>
<span style="margin-top:5px;">
                                                        total:&#163;    
                                                        </span><span class="profational_costs">{{ $totalProfessional }}</span>
                                                        <a href="#" data-toggle="collapse" data-target="#profational_collapse">
                                                        <img
                                                            src="{!! asset('images/icons/Plus_Icon@2x.png')!!}"
                                                            alt="Plus"
                                                            class="img-fluid"
                                                            width="30">
                                                        </a>
                                                    </li>
                                                    <div id="profational_collapse" class="collapse scroll-y">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                professional courses
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    name=" professional courses"
                                                                    class=" professional_courses form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $professional_courses }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>union fees
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="union_fees"
                                                                    name="union fees"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $union_fees }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                professional fees
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="professional_fees"
                                                                    name="professional fees"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $professional_fees }}">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a
                                                                    href="javascipt:void(0)"
                                                                    id="professional_cost"
                                                                    class="btn btn-outline-info btn-large">Update</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>
                                                <ul class="table-body align-items-center flex-wrap outgoing-data">
                                                    <li>
                                                        Savings
                                                    </li>
                                                    <li>
<span style="margin-top:5px;">
                                                        total:&#163;    
                                                        </span><span class="saving">{{ $totalSaving }}</span>
                                                        <a href="#" data-toggle="collapse" data-target="#saving_collapse">
                                                        <img
                                                            src="{!! asset('images/icons/Plus_Icon@2x.png')!!}"
                                                            alt="Plus"
                                                            class="img-fluid"
                                                            width="30">
                                                        </a>
                                                    </li>
                                                    <div id="saving_collapse" class="collapse scroll-y">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                how much do you put away for savings per month?
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="saving1"
                                                                    name="how much do you put away for savings per month?"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $how_much_do_you_put_away_for_savings_per_month }}">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a href="javascipt:void(0)" id="saving" class="btn btn-outline-info btn-large">Update</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>
                                                <ul class="table-body align-items-center flex-wrap outgoing-data">
                                                    <li>
                                                        Other Essential Costs
                                                    </li>
                                                    <li>
<span style="margin-top:5px;">
                                                        total:&#163;    
                                                        </span><span class="other_essential_cost">{{ $totalEssential }}</span>
                                                        <a href="#" data-toggle="collapse" data-target="#other_collapse">
                                                        <img
                                                            src="{!! asset('images/icons/Plus_Icon@2x.png')!!}"
                                                            alt="Plus"
                                                            class="img-fluid"
                                                            width="30">
                                                        </a>
                                                    </li>
                                                    <div id="other_collapse" class="collapse scroll-y">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <span>
                                                                any other essential costs you spend on per month please list below
                                                                </span>
                                                                <input
                                                                    type="text"
                                                                    id="other_costs1"
                                                                    name="any other essential costs you spend on per month please list below"
                                                                    class="form-control"
                                                                    placeholder="1800"
                                                                    value="{{ $any_other_essential_costs_you_spend_on_per_month_please_list_below }}">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a
                                                                    href="javascipt:void(0)"
                                                                    id="other_costs"
                                                                    class="btn btn-outline-info btn-large">Update</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <table class="table mb-0 text-right text-primary td-p-0">
                                    <tbody>
                                        <tr>
                                            <td>Housing:</td>
                                            <td>&#163;<span id="housing_total_id" class="housing_total">{{ $totalHousing }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Utilities:</td>
                                            <td>&#163;<span id="utiliti_total_id" class="utiliti_total">{{ $totalUtilities }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Communications & Leisure</td>
                                            <td>&#163;<span id="leisure_total_id" class="leisure_total">{{ $totalLeisure }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Transport & Travel:</td>
                                            <td>&#163;<span id="transport_id" class="transport">{{ $totalTravel }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Food & Housekeeping:</td>
                                            <td>&#163;<span id="food_id" class="food">{{ $totalFood }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Pensions & Insurences:</td>
                                            <td>&#163;<span id="panisions_id" class="panisions">{{ $totalPensions }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Personal Costs:</td>
                                            <td>&#163;<span id="personal_costs_id" class="personal_costs">{{ $totalPersonal }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Care & Health Costs:</td>
                                            <td>&#163;<span id="care_id" class="care">{{ $totalCare }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>School Costs:</td>
                                            <td>&#163;<span id="school_cost_id" class="school_cost">{{ $totalSchool }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Profational Costs:</td>
                                            <td>&#163;<span id="profational_costs_id" class="profational_costs">{{ $totalProfessional }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Savings:</td>
                                            <td>&#163;<span id="saving_id" class="saving">{{ $totalSaving }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>other Essential Costs:</td>
                                            <td>&#163;<span id="other_essential_cost_id" class="other_essential_cost">{{ $totalEssential }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3>Total</h3>
                                            </td>
                                            <td>
                                                <h3>&#163;<span class="outgoing_total">{{ $totalHousing + $totalUtilities + $totalLeisure + $totalTravel + $totalFood + $totalPensions + $totalPersonal + $totalCare + $totalSchool + $totalProfessional + $totalSaving + $totalEssential }}</span></h3>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                               <div class="modal-footer mt-5 mb-4">
                                    <a href="{{ route('Export_excel_file_outgoing', ['userId' => $userInfo->user_id]) }}" class="btn btn-outline-info float-right btn-large">Export</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script type="text/javascript">
    function calculate_total_outgoings()
    {
        var housing_total = $('#housing_total_id').text();
        var utiliti_total = $('#utiliti_total_id').text();
        var leisure_total = $('#leisure_total_id').text();
        var transport = $('#transport_id').text();
        var food = $('#food_id').text();
        var panisions = $('#panisions_id').text();
        var personal_costs = $('#personal_costs_id').text();
        var care = $('#care_id').text();
        var school_cost = $('#school_cost_id').text();
        var profational_costs = $('#profational_costs_id').text();
        var saving = $('#saving_id').text();
        var other_essential_cost = $('#other_essential_cost_id').text();
        var other_essential_cost = $('#other_essential_cost_id').text();

        var total_outgoings = parseInt(housing_total) + parseInt(utiliti_total) + parseInt(leisure_total) + parseInt(transport) + parseInt(food) + parseInt(panisions) + parseInt(personal_costs) + parseInt(care) + parseInt(school_cost) + parseInt(profational_costs) + parseInt(saving) + parseInt(other_essential_cost) + parseInt(other_essential_cost);
        
        $('.outgoing_total').html(total_outgoings);
        $('.calculated_total_outgoing').html('&#163;' + total_outgoings);
    }
    $(document).on('click','#housing',function(e){
            e.preventDefault();
            var userId = $('#userId').val();
            var housing_1 = $('#housing_1').val();
            if(housing_1 == '') { housing_1 = 0; }
            var housing_2 = $('#housing_2').val();
            if(housing_2 == '') { housing_2 = 0; }
            var housing_3 = $('#housing_3').val();
            if(housing_3 == '') { housing_3 = 0; }
            var housing_4 = $('#housing_4').val();
            if(housing_4 == '') { housing_4 = 0; }
            var housing_5 = $('#housing_5').val();
            if(housing_5 == '') { housing_5 = 0; }
            var housing_6 = $('#housing_6').val();
            if(housing_6 == '') { housing_6 = 0; }
            var housing_7 = $('#housing_7').val();
            if(housing_7 == '') { housing_7 = 0; }
            var housing_8 = $('#housing_8').val();
            if(housing_8 == '') { housing_8 = 0; }
            var housing_9 = $('#housing_9').val(); 
            if(housing_9 == '') { housing_9 = 0; }
            var housing_total = parseInt(housing_1) + parseInt(housing_2) + parseInt(housing_3)  + parseInt(housing_5) + parseInt(housing_6) + parseInt(housing_8) + parseInt(housing_9);
            // var housing_total = ReplaceNumberWithCommas(housing_total);
            $('.housing_total').text(housing_total);
            $.ajax({
                url:'{{route('user.update_user_outgoing_housing')}}',
                method:'post',
                dataType: 'json',
                data:{
                        '_token':'{{ csrf_token() }}',
                        'userId':userId,
                        'housing_1':housing_1,
                        'housing_2':housing_2,
                        'housing_3':housing_3,
                        'housing_4':housing_4,
                        'housing_5':housing_5,
                        'housing_6':housing_6,
                        'housing_7':housing_7,
                        'housing_8':housing_8,
                        'housing_9':housing_9
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
    $(document).on('click','#utilities',function(e){
        e.preventDefault();
            var userId = $('#userId').val();
            var gas = $('#gas').val();
            if(gas == '') { gas = 0; }
            var water = $('#water').val();
            if(water == '') { water = 0; }
            var electricity = $('#electricity').val();
            if(electricity == '') { electricity = 0; }          
            var other_costs = $('#other_costs').val();
            if(other_costs == '') { other_costs = 0; }          
            var utilities_total = parseInt(gas) + parseInt(water) + parseInt(electricity) + parseInt(other_costs);
            // var utilities_total = ReplaceNumberWithCommas(utilities_total);
            $('.utiliti_total').text(utilities_total);
             $.ajax({
                url:'{{ route('user.update_user_outgoing_utilities') }}',
                method:'post',
                dataType: 'json',
                data:{
                        '_token':'{{ csrf_token() }}',
                        'userId':userId,
                        'gas':gas,
                        'water':water,
                        'electricity':electricity,
                        'other_costs':other_costs
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
    $(document).on('click','#leisure',function(e){
        e.preventDefault();
            var userId = $('#userId').val();
            var leisure1 =$('#leisure1').val();
            if(leisure1 == '') { leisure1 = 0; } 
            var leisure2 =$('#leisure2').val();
            if(leisure2 == '') { leisure2 = 0; } 
            var leisure3 =$('#leisure3').val();
            if(leisure3 == '') { leisure3 = 0; } 
            var leisure4 =$('#leisure4').val();
            if(leisure4 == '') { leisure4 = 0; } 
            var leisure5 =$('#leisure5').val();
            if(leisure5 == '') { leisure5 = 0; } 
            var leisure6 =$('#leisure6').val();
            if(leisure6 == '') { leisure6 = 0; } 
            var leisure7 =$('#leisure7').val();
            if(leisure7 == '') { leisure7 = 0; } 
            var leisure_total = parseInt(leisure1) + parseInt(leisure2) + parseInt(leisure3) + parseInt(leisure4) + parseInt(leisure5) + parseInt(leisure6) + parseInt(leisure7);
            // var leisure_total = ReplaceNumberWithCommas(leisure_total);
            $('.leisure_total').text(leisure_total);
             $.ajax({
                url:'{{ route('user.update_user_outgoing_leisure') }}',
                method:'post',
                dataType: 'json',
                data:{
                        '_token':'{{ csrf_token() }}',
                        'userId':userId,
                        'leisure1':leisure1,
                        'leisure2':leisure2,
                        'leisure3':leisure3,
                        'leisure4':leisure4,
                        'leisure5':leisure5,
                        'leisure6':leisure6,
                        'leisure7':leisure7
                    },
                success: function(data)
                {
                    var messageIcon = 'error';
                     if (data == 'success') {
                         calculate_total_outgoings();
                            var message = 'Date Saved Successfully';
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
    $(document).on('click','#transport',function(e){
        e.preventDefault();
            var userId = $('#userId').val();
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
            var transport_total = parseInt(transport1) + parseInt(transport2) + parseInt(transport3) + parseInt(transport4) + parseInt(transport5) + parseInt(transport6) + parseInt(transport7);  
            // var transport_total = ReplaceNumberWithCommas(transport_total);
            $('.transport').text(transport_total);
             $.ajax({
                url:'{{ route('user.update_user_outgoing_transport_travel') }}',
                method:'post',
                dataType: 'json',
                data:{
                        '_token':'{{ csrf_token() }}',
                        'userId':userId,
                        'transport1':transport1,
                        'transport2':transport2,
                        'transport3':transport3,
                        'transport4':transport4,
                        'transport5':transport5,
                        'transport6':transport6,
                        'transport7':transport7
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
    $(document).on('click','#food',function(e){
        e.preventDefault();
            var userId = $('#userId').val();
            var food1 = $('#food1').val();
            if(food1 == '') { food1 = 0; } 
            var food2 = $('#food2').val();
            if(food2 == '') { food2 = 0; } 
            var food3 = $('#food3').val();
            if(food3 == '') { food3 = 0; } 
            var food4 = $('#food4').val();
            if(food4 == '') { food4 = 0; } 
            var food5 = $('#food5').val();
            if(food5 == '') { food5 = 0; } 
            var food6 = $('#food6').val();
            if(food6 == '') { food6 = 0; } 
            var food7 = $('#food7').val();
            if(food7 == '') { food7 = 0; } 
            var food8 = $('.food8').val();
            if(food8 == '') { food8 = 0; } 
            var food9 = $('#food9').val();
            if(food9 == '') { food9 = 0; } 
            var food_total = parseInt(food1) + parseInt(food2) + parseInt(food3) + parseInt(food4) + parseInt(food5) + parseInt(food6) + parseInt(food7) + parseInt(food8) + parseInt(food9);
            // var food_total = ReplaceNumberWithCommas(food_total);
            $('.food').text(food_total);
             $.ajax({
                url:'{{ route('user.update_user_outgoing_food_housekeeping') }}',
                method:'post',
                dataType: 'json',
                data:{
                        '_token':'{{ csrf_token() }}',
                        'userId':userId,
                        'food1':food1,
                        'food2':food2,
                        'food3':food3,
                        'food4':food4,
                        'food5':food5,
                        'food6':food6,
                        'food7':food7,
                        'food8':food8,
                        'food9':food9
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
    $(document).on('click','#panisions',function(e){
        e.preventDefault();
            var userId = $('#userId').val();
            var pension_payments = $('#pension_payments').val();
            if(pension_payments == '') { pension_payments = 0; } 
            var mortgage_payment_protection = $('#mortgage_payment_protection').val();
            if(mortgage_payment_protection == '') { mortgage_payment_protection = 0; } 
            var health_insurance = $('#health_insurance').val();
            if(health_insurance == '') { health_insurance = 0; } 
            var life_insurance = $('#life_insurance').val();
            if(life_insurance == '') { life_insurance = 0; } 
            var building_contents_insurance = $('#building_contents_insurance').val();
            if(building_contents_insurance == '') { building_contents_insurance = 0; } 
            var panisions = $('#panisions1').val();
            if(panisions == '') { panisions = 0; } 
            var panisions_total = parseInt(pension_payments) + parseInt(mortgage_payment_protection) + parseInt(health_insurance) + parseInt(life_insurance) + parseInt(building_contents_insurance) + parseInt(panisions);
            // var panisions_total = ReplaceNumberWithCommas(panisions_total);
            $('.panisions').text(panisions_total);
             $.ajax({
                url:'{{ route('user.update_user_outgoing_pensions_insurances') }}',
                method:'post',
                dataType: 'json',
                data:{
                        '_token':'{{ csrf_token() }}',
                        'userId':userId,
                        'pension_payments':pension_payments,
                        'mortgage_payment_protection':mortgage_payment_protection,
                        'health_insurance':health_insurance,
                        'life_insurance':life_insurance,
                        'building_contents_insurance':building_contents_insurance,
                        'panisions':panisions
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
    $(document).on('click','#personal_costs',function(e){
        e.preventDefault();
            var userId = $('#userId').val();
            var clothing = $('#clothing').val();
            if(clothing == '') { clothing = 0; } 
            var hairdressing = $('#hairdressing').val();
            if(hairdressing == '') { hairdressing = 0; } 
            var toiletries = $('#toiletries').val();
            if(toiletries == '') { toiletries = 0; } 
            var personal_costs_total = parseInt(clothing) + parseInt(hairdressing) + parseInt(toiletries);
            // var personal_costs_total = ReplaceNumberWithCommas(personal_costs_total);
            $('.personal_costs').text(personal_costs_total);
             $.ajax({
                url:'{{ route('user.update_user_outgoing_personal_costs') }}',
                method:'post',
                dataType: 'json',
                data:{
                        '_token':'{{ csrf_token() }}',
                        'userId':userId,
                        'clothing':clothing,
                        'hairdressing':hairdressing,
                        'toiletries':toiletries
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
    $(document).on('click','#care',function(e){
        e.preventDefault();
             var userId = $('#userId').val();
             var care1 = $('#care1').val();
             if(care1 == '') { care1 = 0; } 
             var care2 = $('#care2').val();
             if(care2 == '') { care2 = 0; } 
             var care3 = $('#care3').val();
             if(care3 == '') { care3 = 0; } 
             var care4 = $('#care4').val();
             if(care4 == '') { care4 = 0; } 
             var care5 = $('#care5').val();
             if(care5 == '') { care5 = 0; } 
             var care6 = $('#care6').val();
             if(care6 == '') { care6 = 0; } 
             var care_total = parseInt(care1) + parseInt(care2) +  parseInt(care4) + parseInt(care5) + parseInt(care6);
            //  var care_total = ReplaceNumberWithCommas(care_total);
             $('.care').text(care_total);
             $.ajax({
                 url:'{{ route('user.update_user_outgoing_care_health_costs') }}',
                 method:'post',
                 dataType: 'json',
                data:{
                         '_token':'{{ csrf_token() }}', 
                        'userId':userId,
                         'care1':care1,
                         'care2':care2,
                         'care3':care3,
                         'care4':care4,
                         'care5':care5,
                         'care6':care6
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
    $(document).on('click','#school_cost',function(e){
        e.preventDefault();
            var userId = $('#userId').val();
            var school_cost1 = $('#school_cost1').val();
             if(school_cost1 == '') { school_cost1 = 0; } 
            var school_cost2 = $('#school_cost2').val();
             if(school_cost2 == '') { school_cost2 = 0; } 
            var school_cost_total = parseInt(school_cost1) + parseInt(school_cost2);
            // var school_cost_total = ReplaceNumberWithCommas(school_cost_total);
            $('.school_cost').text(school_cost_total);
             $.ajax({
                url:'{{ route('user.update_user_outgoing_school_costs') }}',
                method:'post',
                dataType: 'json',
                data:{
                        '_token':'{{ csrf_token() }}',
                        'userId':userId,
                        'school_cost1':school_cost1,
                        'school_cost2':school_cost2
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
    $(document).on('click','#professional_cost',function(e){
        e.preventDefault();
            var userId = $('#userId').val();
            var professional_courses = $('.professional_courses').val();
             if(professional_courses == '') { professional_courses = 0; } 
            var union_fees = $('#union_fees').val();
             if(union_fees == '') { union_fees = 0; } 
            var professional_fees = $('#professional_fees').val();
             if(professional_fees == '') { professional_fees = 0; } 
            professional_cost_total = parseInt(professional_courses)+parseInt(union_fees)+parseInt(professional_fees);
            // var professional_cost_total = ReplaceNumberWithCommas(professional_cost_total);
            $('.profational_costs').text(professional_cost_total);
             $.ajax({
                url:'{{ route('user.update_user_outgoing_professional_costs') }}',
                method:'post',
                dataType: 'json',
                data:{
                        '_token':'{{ csrf_token() }}',
                        'userId':userId,
                        'professional_courses':professional_courses,
                        'union_fees':union_fees,
                        'professional_fees':professional_fees
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
    $(document).on('click','#saving',function(e){
        e.preventDefault();
            var userId = $('#userId').val();
            var saving1 = $('#saving1').val();
             if(saving1 == '') { saving1 = 0; } 
            saving_total = parseInt(saving1);
            // var saving_total = ReplaceNumberWithCommas(saving_total);
            $('.saving').text(saving_total);           
             $.ajax({
                url:'{{ route('user.update_user_outgoing_savings') }}',
                method:'post',
                dataType: 'json',
                data:{
                        '_token':'{{ csrf_token() }}',
                        'userId':userId,
                        'saving1':saving1
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
    $(document).on('click','#other_costs',function(e){
        e.preventDefault();
        var userId = $('#userId').val();
            var other_costs1 = $('#other_costs1').val(); 
             if(other_costs1 == '') { other_costs1 = 0; }     
            var other_costs_total = parseInt(other_costs1);
            // var other_costs_total = ReplaceNumberWithCommas(other_costs_total);
            $('.other_essential_cost').text(other_costs_total);
             $.ajax({
                url:'{{ route('user.update_user_outgoing_other_essential_costs') }}',
                method:'post',
                dataType: 'json',
                data:{
                        '_token':'{{ csrf_token() }}',
                        'userId':userId,
                        'other_costs1':other_costs1
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
</script>