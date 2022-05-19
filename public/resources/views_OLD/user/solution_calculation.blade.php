<div class="col-12">
    <div class="mt-4 ml-0 mr-0">
        
        <h1 class="pl-2">Solution One
        @if($solutionCalculationUsed == 'solution_one')
            <span class="fa fa-check" style="color:#18CC00;"></span>
        @else
            <span class="fa fa-close" style="color:#EA0000;"></span>
        @endif
        </h1>
        <table class="table table-review-list">
            <tr>
                <th>Debt solution</th>
                <th>Written Off</th>
                <th>Cost</th>
                <th>Term</th>
            </tr>
            @if(isset($allAvailableSolutionsOne) && !empty($allAvailableSolutionsOne))
                @foreach ($allAvailableSolutionsOne as $key => $value)
                    @if($value['enable'] == "true")
                        <tr>
                            <td>{{ $value['title'] }}</td>
                            
                            @if($value['solutionType'] == "administration_order" || $value['solutionType'] == "debt_relief_order" || $value['solutionType'] == "bankruptcy" || $value['solutionType'] == "sequestration")
                                <td>£ {{$value['debt']}} Written off</td>
                            @else
                                <td>@if($value['amount_of_debt_written_off']<0){{'N/A'}}@else{{'£ '.$value['amount_of_debt_written_off']}}@endif Written off</td>
                            @endif

                            <td>
                                Monthly @if($value['monthly_cost']<0){{'N/A'}}@else{{'£'.$value['monthly_cost']}}@endif
                                 One off @if($value['one_off_cost']<0){{'N/A'}}@else{{'£'.$value['one_off_cost']}}@endif
                            </td>
                            
                            <td>@if($value['term']<=0){{'N/A'}}@else{{$value['term']}}@endif  Months</td>
                        </tr>
                    @else
                        <tr style="color:#EA0000;">
                            <td style="color:#EA0000;">{{ $value['title'] }}</td>
                            
                            @if($value['solutionType'] == "administration_order" || $value['solutionType'] == "debt_relief_order" || $value['solutionType'] == "bankruptcy" || $value['solutionType'] == "sequestration")
                                <td style="color:#EA0000;">N/A Written off</td>
                            @else
                                <td style="color:#EA0000;">N/A  Written off</td>
                            @endif

                            <td style="color:#EA0000;">
                                Monthly N/A
                                 One off N/A
                            </td>
                            
                            <td style="color:#EA0000;">N/A Months</td>
                        </tr>
                    @endif
                @endforeach
            @endif
        </table>
    </div>

    <div class="mt-4 ml-0 mr-0">
        
        <h1 class="pl-2">Solution Two  @if($solutionCalculationUsed == 'solution_two')
            <span class="fa fa-check" style="color:#18CC00;"></span>
        @else
            <span class="fa fa-close" style="color:#EA0000;"></span>
        @endif
        </h1>
        <table class="table table-review-list">
            <tr>
                <th>Debt solution</th>
                <th>Written Off</th>
                <th>Cost</th>
                <th>Term</th>
            </tr>
            @if(isset($allAvailableSolutionsTwo) && !empty($allAvailableSolutionsTwo))
                @foreach ($allAvailableSolutionsTwo as $key => $value)
                    @if($value['enable'] == "true")
                        <tr>
                            <td>{{ $value['title'] }}</td>
                            
                            @if($value['solutionType'] == "administration_order" || $value['solutionType'] == "debt_relief_order" || $value['solutionType'] == "bankruptcy" || $value['solutionType'] == "sequestration")
                                <td>£ {{$value['debt']}} Written off</td>
                            @else
                                <td>@if($value['amount_of_debt_written_off']<0){{'N/A'}}@else{{'£ '.$value['amount_of_debt_written_off']}}@endif Written off</td>
                            @endif

                            <td>
                                Monthly @if($value['monthly_cost']<0){{'N/A'}}@else{{'£'.$value['monthly_cost']}}@endif
                                 One off @if($value['one_off_cost']<0){{'N/A'}}@else{{'£'.$value['one_off_cost']}}@endif
                            </td>
                            
                            <td>@if($value['term']<=0){{'N/A'}}@else{{$value['term']}}@endif  Months</td>
                        </tr>
                    @else
                        <tr style="color:#EA0000;">
                            <td style="color:#EA0000;">{{ $value['title'] }}</td>
                            
                            @if($value['solutionType'] == "administration_order" || $value['solutionType'] == "debt_relief_order" || $value['solutionType'] == "bankruptcy" || $value['solutionType'] == "sequestration")
                                <td style="color:#EA0000;">N/A Written off</td>
                            @else
                                <td style="color:#EA0000;">N/A  Written off</td>
                            @endif

                            <td style="color:#EA0000;">
                                Monthly N/A
                                 One off N/A
                            </td>
                            
                            <td style="color:#EA0000;">N/A Months</td>
                        </tr>
                    @endif
                @endforeach
            @endif
        </table>
    </div>
</div>
