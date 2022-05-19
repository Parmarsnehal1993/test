<div class="row mt-8 ml-0 mr-0">
    <table class="table table-review-list">
        <tr>
            <th>Debt solution</th>
            <th>Written Off</th>
            <th>Cost</th>
            <th>Term</th>
            <th>Reason</th>
            <th>Solution Used</th>
        </tr>
        @if(isset($allAvailableSolutions) && !empty($allAvailableSolutions))
            @foreach ($allAvailableSolutions as $key => $value)
                @if($value['enable'] == "true")
                    <tr>
                        <td>{{ $value['title'] }}</td>
                        
                        @if($value['solutionType'] == "administration_order" || $value['solutionType'] == "debt_relief_order" || $value['solutionType'] == "bankruptcy" || $value['solutionType'] == "sequestration")
                            <td>£ {{$value['debt']}} </br>Written off</td>
                        @else
                            <td>@if($value['amount_of_debt_written_off']<0){{'N/A'}}@else{{'£ '.$value['amount_of_debt_written_off']}}@endif </br>Written off</td>
                        @endif

                        <td>
                            Monthly @if($value['monthly_cost']<0){{'N/A'}}@else{{'£'.$value['monthly_cost']}}@endif
                            <br>One off @if($value['one_off_cost']<0){{'N/A'}}@else{{'£'.$value['one_off_cost']}}@endif
                        </td>
                        
                        <td>@if($value['term']<=0){{'N/A'}}@else{{$value['term']}}@endif <br>Months</td>
                        <td></td>
                        <td>
                            @if(isset($value['solutionCalculationUsed']) && !empty($value['solutionCalculationUsed']))
                                @if($value['solutionCalculationUsed'] == 'solution_one')
                                    <span class="fa fa-check" style="color:green;"></span><label>Solution One</label>
                                    <span class="fa fa-close" style="color:red;"></span><label>Solution Two</label>
                                @else
                                    <span class="fa fa-close" style="color:red;"></span><label>Solution One</label>
                                    <span class="fa fa-check" style="color:green;"></span><label>Solution Two</label>
                                @endif
                            @endif
                        </td>
                    </tr>
                @else
                    <tr>
                        <td>{{ $value['title'] }}</td>
                        
                        @if($value['solutionType'] == "administration_order" || $value['solutionType'] == "debt_relief_order" || $value['solutionType'] == "bankruptcy" || $value['solutionType'] == "sequestration")
                            <td>N/A </br>Written off</td>
                        @else
                            <td>N/A <br>Written off</td>
                        @endif

                        <td>
                            Monthly N/A
                            <br>One off N/A
                        </td>
                        
                        <td>N/A<br>Months</td>
                        <td>{{$value['error_message']}}</td>
                        <td>
                            @if(isset($value['solutionCalculationUsed']) && !empty($value['solutionCalculationUsed']))
                                @if($value['solutionCalculationUsed'] == 'solution_one')
                                    <span class="fa fa-tick" style="color:green;">Solution One</span>
                                    <span >Solution Two</span>
                                @else
                                    <span>Solution One</span>
                                    <span class="fa fa-tick" style="color:green;">Solution Two</span>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endif
            @endforeach
        @endif
    </table>
</div>