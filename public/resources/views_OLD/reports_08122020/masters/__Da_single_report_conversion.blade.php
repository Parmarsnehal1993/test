
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
    
                    <table class="table search-table text-center" id="#">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Agent Name</th>
                                <th>Send IVA</th>
                                <th>Sent To Ip</th>
                                <th>IVA%</th>
                                <th>Send Dmp</th>
                                <th>Sent To DMP Provider</th>
                                <th>DMP%</th>
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
                                                
                                                <tr> 
                                                   
                                                    <td>{{  $matchDate  }}</td>
                                                    <td class="get_agent_name">{{ $data['singleAgentCount']['agent_name']  }}</td> 
                                                    <td>{{  isset($data['singleAgentCount']['sendIva'][$matchDate]) ? $data['singleAgentCount']['sendIva'][$matchDate] : 0  }}</td>
                                                    <td>{{  isset($data['singleAgentCount']['sendIp'][$matchDate]) ? $data['singleAgentCount']['sendIp'][$matchDate] : 0  }}</td>
                                                    @if(isset($data['singleAgentCount']['sendIva'][$matchDate]) && isset($data['singleAgentCount']['sendIp'][$matchDate]))
                                                    <td>{{ round($data['singleAgentCount']['sendIp'][$matchDate] / $data['singleAgentCount']['sendIva'][$matchDate]) }}</td>
                                                    @else 
                                                    <td>0</td>
                                                    @endif
                                                    <td>{{  isset($data['singleAgentCount']['sendDmp'][$matchDate]) ? $data['singleAgentCount']['sendDmp'][$matchDate] : 0  }}</td>
                                                    <td>{{  isset($data['singleAgentCount']['sendDmpProvider'][$matchDate]) ? $data['singleAgentCount']['sendDmpProvider'][$matchDate] : 0  }}</td>
                                                    @if(isset($data['singleAgentCount']['sendDmpProvider'][$matchDate]) && isset($data['singleAgentCount']['sendDmp'][$matchDate]))
                                                    <td>{{ round($data['singleAgentCount']['sendDmpProvider'][$matchDate] / $data['singleAgentCount']['sendDmp'][$matchDate]) }}</td>
                                                    @else 
                                                     <td>0</td>
                                                    @endif
                                                </tr>
                                                
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


