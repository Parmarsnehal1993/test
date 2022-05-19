
 <style>
    table, th, td {
        border: 1px solid black;
        border-spacing: 0px;
    }

</style>
<div class="row">

<div class="col-md-12">
   <div class="col-md-3">
   </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive grid-wrapper">
               
                <div id="get_all_agent_data" style="display: block;">
    
                    <table class="table search-table text-center" id="single_case_conversion_iva">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Agent Name</th>
                                <th>SENT TO IP</th>
                                <th>Submitted</th>
                                <th>IVA%</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                
                                $ymd_start_date = date_create(date('Y-m-d', strtotime($data['start_date'])));
                                $ymd_end_date = date_create(date('Y-m-d', strtotime($data['end_date'])));
                                $matchDate = date('d/m/Y', strtotime($data['end_date']));
                                $days =date_diff($ymd_start_date, $ymd_end_date)->format("%a");
                                
                                $iva = 0;
                                $dmp = 0;
                                $sentIp = 0;
                                $senddmp = 0;
                               
                                @endphp

                                @for($dataCount = $days; $dataCount >= 0; $dataCount--)
                                            @php //echo '<br>matchDate => ' . $matchDate; @endphp
                                            
                                            @if(isset($data['getSingleAgentData']['sendIp'][$matchDate]) || isset($data['getSingleAgentData']['submittedIva'][$matchDate]))
                                                <tr> 
                                                    <td>{{  $matchDate  }}</td>
                                                    <td class="get_agent_name">{{ $data['getSingleAgentData']['agent_name']  }}</td> 
                                                    <td>{{  isset($data['getSingleAgentData']['sendIp'][$matchDate]) ? $data['getSingleAgentData']['sendIp'][$matchDate] : 0  }}</td>
                                                    <td>{{  isset($data['getSingleAgentData']['submittedIva'][$matchDate]) ? $data['getSingleAgentData']['submittedIva'][$matchDate] : 0  }}</td>
                                                    @if(isset($data['getSingleAgentData']['sendIp'][$matchDate]) && isset($data['getSingleAgentData']['submittedIva'][$matchDate]))
                                                    <td>{{ $data['getSingleAgentData']['sendIp'][$matchDate] / $data['getSingleAgentData']['submittedIva'][$matchDate] }}</td>
                                                    @else 
                                                    <td>0</td>
                                                    @endif
                                                </tr>
                                                @endif
                                                @php
                                                    $matchDate = str_replace('/', '-', $matchDate);
                                                    $tempMatchDate = date('Y-m-d', strtotime($matchDate . ' -1 day'));
                                                    $matchDate = date('d/m/Y', strtotime($tempMatchDate));
                                                @endphp
                                        @endfor
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>



