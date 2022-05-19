
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
    
                    <table class="table search-table text-center" id="da_report_single_conversion_report">
                        <thead>
                            <tr>
                                <th>Agent Name</th>
                                <th>Date</th>
                                <th>Send IVA</th>
                                <th>Sent To Ip</th>
                                <th>IVA%</th>
                                <th>Send Dmp</th>
                                <th>Sent To DMP Provider</th>
                                <th>DMP%</th>
                            </tr>
                        </thead>
                            @php
                                // dd($start_date);
                                $ymd_start_date = date_create(date('Y-m-d', strtotime($data['start_date'])));
                                
                                $ymd_end_date = date_create(date('Y-m-d', strtotime($data['end_date'])));
                            
                                $matchDate = date('d/m/Y', strtotime($data['end_date']));
                                $days = date_diff($ymd_start_date, $ymd_end_date)->format("%a");
                                $sentIva = 0;
                                $sendIp = 0;
                                $sendDmp = 0;
                                $sendDmpprovider = 0;
                                
                            @endphp
                             @foreach($data['allAgentCount'] as $key => $value)
                                    
                             @for($dataCount = $days; $dataCount >= 0; $dataCount--)
                                 @foreach ($value as $innerKey => $innerValue)
                                     
                                     <tr> 
                                        <td>{{ $key }}</td>
                                         <td>{{  $matchDate  }}</td>
                                         <td>{{  isset($value['sendIva'][$matchDate]) ? $value['sendIva'][$matchDate] : 0  }}</td>
                                         <td>{{  isset($value['sendIp'][$matchDate]) ? $value['sendIp'][$matchDate] : 0  }}</td>
                                         @if(isset($value['sendIva'][$matchDate]) && isset($value['sendIp'][$matchDate]))
                                         <td>{{ round($value['sendIp'][$matchDate] / $value['sendIva'][$matchDate])}}</td>
                                         @else 
                                         <td>0</td>
                                         @endif
                                         <td>{{  isset($value['sendDmp'][$matchDate]) ? $value['sendDmp'][$matchDate] : 0  }}</td>
                                         <td>{{  isset($value['sendDmpProvider'][$matchDate]) ? $value['sendDmpProvider'][$matchDate] : 0  }}</td>
                                         @if(isset($value['sendDmp'][$matchDate]) && isset($value['sendDmpProvider'][$matchDate]))
                                         <td>{{ round($value['sendDmpProvider'][$matchDate] / $value['sendDmp'][$matchDate]) }}</td>
                                         @else 
                                         <td>0</td>
                                         @endif
                                     
                                     </tr>
                                     
                                     @php
                                         $matchDate = str_replace('/', '-', $matchDate);
                                         $tempMatchDate = date('Y-m-d', strtotime($matchDate . ' -1 day'));
                                         $matchDate = date('d/m/Y', strtotime($tempMatchDate));
                                     @endphp   
                                      
                                 @endforeach
                             @endfor
                             @php 
                                 $matchDate = date('d/m/Y', strtotime($data['end_date'] ));
                             @endphp
                         @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>