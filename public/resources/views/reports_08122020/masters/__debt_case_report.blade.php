
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
    
                    <table class="table search-table text-center border-0" id="debt_case_report">
                        <thead>
                            <tr>
                                <th>Agent Name</th>
                                <th>Send IVA</th>
                                <th>Send DMP</th>
                                <th>Awaiting Docs</th>
                                <th>ADNC DAY1</th>
                                <th>ADNC DAY2</th>
                                <th>ADNC DAY3</th>
                                <th>ADNC DAY4</th>
                                <th>In Process</th>
                                <th>IPNC Day1</th>
                                <th>IPNC Day2</th>
                                <th>IPNC Day3</th>
                                <th>IPNC Day4</th>
                                <th>Messageday1</th>
                                <th>Messageday2</th>
                                <th>Messageday3</th>
                                <th>Messageday4</th>
                                <th>Not Intrested</th>
                                <th>DNC</th>
                                <th>DRO</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $ymd_start_date = date_create(date('Y-m-d', strtotime($data['start_date'])));
                                $ymd_end_date = date_create(date('Y-m-d', strtotime($data['end_date'])));
                                $matchDate = date('d/m/Y', strtotime($data['end_date']));
                                $days =date_diff($ymd_start_date, $ymd_end_date)->format("%a");
                                $sentIp = 0;
                                $submittedIva = 0;
                            @endphp
                            @foreach($data['finalAllAgent'] as $key => $value)
                            @for($dataCount = $days; $dataCount >= 0; $dataCount--)
                                @foreach($value as $innerKey => $innerValue)
                                    @if(isset($value['sendIva'][$matchDate]) || isset($value['sendDmp'][$matchDate]) || 
                                    isset($value['sendAwaitingDocs'][$matchDate]) || isset($value['sendawaitingdocsday1'][$matchDate])
                                    || isset($value['sendawaitingdocsday1'][$matchDate]) || isset($value['sendawaitingdocsday1'][$matchDate]) 
                                    || isset($value['sendawaitingdocsday2'][$matchDate]) || isset($value['sendawaitingdocsday3'][$matchDate])
                                    || isset($value['sendawaitingdocsday4'][$matchDate]) || isset($value['sendInProcess'][$matchDate])
                                    || isset($value['sendinprocessday1'][$matchDate]) || isset($value['sendinprocessday2'][$matchDate]) 
                                    || isset($value['sendinprocessday3'][$matchDate]) || isset($value['sendinprocessday4'][$matchDate])
                                    || isset($value['sendMessageday1'][$matchDate]) || isset($value['sendMessageday2'][$matchDate])
                                    || isset($value['sendMessageday3'][$matchDate]) || isset($value['sendMessageday4'][$matchDate])
                                    || isset($value['sendNotIntrested'][$matchDate]) || isset($value['sendDnc'][$matchDate])
                                    || isset($value['sendDro'][$matchDate]))
                                        <tr> 
                                            <td>{{  $matchDate  }}</td>
                                            <td>{{ $key }}</td>
                                            <td>{{  isset($value['sendIva'][$matchDate]) ? $value['sendIva'][$matchDate] : 0  }}</td>
                                            <td>{{  isset($value['sendDmp'][$matchDate]) ? $value['sendDmp'][$matchDate] : 0  }}</td>
                                            <td>{{  isset($value['sendAwaitingDocs'][$matchDate]) ? $value['sendAwaitingDocs'][$matchDate] : 0  }}</td>
                                            <td>{{  isset($value['sendawaitingdocsday1'][$matchDate]) ? $value['sendawaitingdocsday1'][$matchDate] : 0  }}</td>
                                            <td>{{  isset($value['sendawaitingdocsday2'][$matchDate]) ? $value['sendawaitingdocsday2'][$matchDate] : 0  }}</td>
                                            <td>{{  isset($value['sendawaitingdocsday3'][$matchDate]) ? $value['sendawaitingdocsday3'][$matchDate] : 0  }}</td>
                                            <td>{{  isset($value['sendawaitingdocsday4'][$matchDate]) ? $value['sendawaitingdocsday4'][$matchDate] : 0  }}</td>
                                            <td>{{  isset($value['sendInProcess'][$matchDate]) ? $value['sendInProcess'][$matchDate] : 0  }}</td>
                                            <td>{{  isset($value['sendinprocessday1'][$matchDate]) ? $value['sendinprocessday1'][$matchDate] : 0  }}</td>
                                            <td>{{  isset($value['sendinprocessday2'][$matchDate]) ? $value['sendinprocessday2'][$matchDate] : 0  }}</td>
                                            <td>{{  isset($value['sendinprocessday3'][$matchDate]) ? $value['sendinprocessday3'][$matchDate] : 0  }}</td>
                                            <td>{{  isset($value['sendinprocessday4'][$matchDate]) ? $value['sendinprocessday4'][$matchDate] : 0  }}</td>
                                            <td>{{  isset($value['sendMessageday1'][$matchDate]) ? $value['sendMessageday1'][$matchDate] : 0  }}</td>
                                            <td>{{  isset($value['sendMessageday2'][$matchDate]) ? $value['sendMessageday2'][$matchDate] : 0  }}</td>
                                            <td>{{  isset($value['sendMessageday3'][$matchDate]) ? $value['sendMessageday3'][$matchDate] : 0  }}</td>
                                            <td>{{  isset($value['sendMessageday4'][$matchDate]) ? $value['sendMessageday4'][$matchDate] : 0  }}</td>
                                            <td>{{  isset($value['sendNotIntrested'][$matchDate]) ? $value['sendNotIntrested'][$matchDate] : 0  }}</td>
                                            <td>{{  isset($value['sendDnc'][$matchDate]) ? $value['sendDnc'][$matchDate] : 0  }}</td>
                                            <td>{{  isset($value['sendDro'][$matchDate]) ? $value['sendDro'][$matchDate] : 0  }}</td>

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