<div class="row">

    @php $totalWages = 0; @endphp

    <div class="col-md-9">

        <span>1. How much do your recive a Wage ?</span>

        <input type="number"

        id="wage_1" name="how_much_do_you_receive_wage_?" value="{{ (isset($userIncomeWages['data'][0]['how_much_do_you_receive_wage_?']) && !empty($userIncomeWages['data'][0]['how_much_do_you_receive_wage_?'])) ? $userIncomeWages['data'][0]['how_much_do_you_receive_wage_?'] : 0 }}" class="form-control" placeholder="">

    </div>

</div>

<div class="row">

    <div class="col-md-9">

        <span>2. How much Tour Receive in part time Wages ?

        </span>

        <input type="number" id="wage_2" name="how_much_do_you_receive_in_part_time_wages_?" value="{{ (isset($userIncomeWages['data'][0]['how_much_do_you_receive_in_part_time_wages_?']) && !empty($userIncomeWages['data'][0]['how_much_do_you_receive_in_part_time_wages_?'])) ? $userIncomeWages['data'][0]['how_much_do_you_receive_in_part_time_wages_?'] : 0 }}" class="form-control" placeholder="">

    </div>

</div>

<div class="row">

    <div class="col-md-9">

        <span>3. How much do your recive a Wage ?

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



<div class="col-12">

    Total Sum: {{ $totalWages }}

</div>