
 <style>
    table, th, td {
        border: 1px solid black;
        border-spacing: 0px;
    }

</style>
<div class="row" style="width:100%">

<div class="col-md-12">
   <div class="col-md-3">
    
   </div> 
    <div class="card">
        <div class="card-body">
            <div class="table-responsive grid-wrapper">
               
                <div id="get_all_agent_data" style="display: block;">
    
                    <table class="table search-table text-center" id="case_conversion_iva">
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
                                $days = date_diff($ymd_start_date, $ymd_end_date)->format("%a");
                                $sentIp = 0;
                                $submittedIva = 0; 
                            @endphp
                            @foreach($data['finalIva'] as $key => $value)
                                    
                                @for($dataCount = $days; $dataCount >= 0; $dataCount--)
                                    @foreach ($value as $innerKey => $innerValue)
                                        @if(isset($value['sendIp'][$matchDate]) || isset($value['submittedIva'][$matchDate]))
                                        <tr> 
                                            <td>{{  $matchDate  }}</td>
                                            <td>{{ $key }}</td>
                                            <td>{{  isset($value['sendIp'][$matchDate]) ? $value['sendIp'][$matchDate] : 0  }}</td>
                                            <td>{{  isset($value['submittedIva'][$matchDate]) ? $value['submittedIva'][$matchDate] : 0  }}</td>
                                            @if(isset($value['sendIp'][$matchDate]) && isset($value['submittedIva'][$matchDate]))
                                            <td>{{ (round($value['submittedIva'][$matchDate] / $value['sendIp'][$matchDate])) }}</td>
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



