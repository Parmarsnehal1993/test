
 <style>
    table, th, td {
        border: 1px solid black;
        border-spacing: 0px;
    }

</style>
<div class="row">

<div class="col-md-12">
   
    <div class="card">
        <div class="card-body">
            <div class="table-responsive grid-wrapper">
               
                <div id="get_all_agent_data" style="display: block;">
    
                    <table class="table search-table text-center" id="dmp_case_worked_case">
                        <thead>
                            <tr>
                                
                                <th>Date</th>
                                <th>Agent Name</th>
                                <th>Submitted DMP</th>
                                <th>SEND TO DMP PROVIDER</th>
                                <th>Chase Pack</th>
                                <th>No Answer DMP</th>
                                <th>DMP Pack N C</th>
                                <th>DMP No Contact</th>
                                <th>Fixed Compliance</th>
                                <th>Not Intrested</th>
                                <th>DNC</th>
                                <th>DRO</th>
                                <th>SENT To IVA</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $ymd_start_date = date_create(date('Y-m-d', strtotime($data['start_date'])));
                            
                            $ymd_end_date = date_create(date('Y-m-d', strtotime($data['end_date'])));
                           
                            $matchDate = date('d/m/Y', strtotime($data['end_date']));
                            $days = date_diff($ymd_start_date, $ymd_end_date)->format("%a");
                            $sentIp = 0;
                            $submittedIva = 0; 
                            
                        @endphp
                        @foreach($data['finalDmp'] as $key => $value)
                            
                            @for($dataCount = $days; $dataCount >= 0; $dataCount--)
                                @foreach ($value as $innerKey => $innerValue)
                                    @if(isset($value['submittedDmp'][$matchDate]) || isset($value['sendDmpprovider'][$matchDate]))
                                    <tr> 
                                        
                                        <td>{{  $matchDate  }}</td>
                                        <td>{{ $key }}</td>
                                        <td>{{  isset($value['submittedDmp'][$matchDate]) ? $value['submittedDmp'][$matchDate] : 0  }}</td>
                                        <td>{{  isset($value['sendDmpprovider'][$matchDate]) ? $value['sendDmpprovider'][$matchDate] : 0  }}</td>
                                        <td>{{  isset($value['chasepack'][$matchDate]) ? $value['chasepack'][$matchDate] : 0  }}</td>
                                        <td>{{  isset($value['noanswerdmp'][$matchDate]) ? $value['noanswerdmp'][$matchDate] : 0  }}</td>
                                        <td>{{  isset($value['dmppacknc'][$matchDate]) ? $value['dmppacknc'][$matchDate] : 0  }}</td>
                                        <td>{{  isset($value['dmpnotcontact'][$matchDate]) ? $value['dmpnotcontact'][$matchDate] : 0  }}</td>
                                        <td>{{  isset($value['fixedcompliance'][$matchDate]) ? $value['fixedcompliance'][$matchDate] : 0  }}</td>
                                        <td>{{  isset($value['notintrested'][$matchDate]) ? $value['notintrested'][$matchDate] : 0  }}</td>
                                        <td>{{  isset($value['dnc'][$matchDate]) ? $value['dnc'][$matchDate] : 0  }}</td>
                                        <td>{{  isset($value['dro'][$matchDate]) ? $value['dro'][$matchDate] : 0  }}</td>
                                        <td>{{  isset($value['sendtoiva'][$matchDate]) ? $value['sendtoiva'][$matchDate] : 0  }}</td>
                                    
                                    </tr>
                                    @endif
                                    @php
                                        $matchDate = str_replace('/', '-', $matchDate);
                                        $tempMatchDate = date('Y-m-d', strtotime($matchDate . ' -1 day'));
                                        $matchDate = date('d/m/Y', strtotime($tempMatchDate));
                                    @endphp   
                                     
                                @endforeach
                            @endfor
                            @php 
                                $matchDate = date('d/m/Y', strtotime($data['end_date']));
                            @endphp
                        @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>



