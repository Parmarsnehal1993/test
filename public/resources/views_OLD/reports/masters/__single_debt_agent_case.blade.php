<div class="row">
                
    <div class="col-md-12">

        <div class="card">
        <div class="card-body">

        <div class="">

            <div id="get_ajax_agent_data" style="display: none;"></div>

            <div id="get_all_agent_data" style="display: block;">

                <table class="table search-table text-center border-0 table-responsive grid-wrapper" id="">
                    <thead>
                        <tr>
                            <th>Date</th>
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
                        
                            $allColumnTotal = 0;
                            $columnTotal = array();
                            $columnTotal['sendIva'] = 0;
                            $columnTotal['sendDmp'] = 0;
                            $columnTotal['sendAwaitingDocs'] = 0;
                            $columnTotal['sendawaitingdocsday1'] = 0;
                            $columnTotal['sendawaitingdocsday2'] = 0;
                            $columnTotal['sendawaitingdocsday3'] = 0;
                            $columnTotal['sendawaitingdocsday4'] = 0;
                            $columnTotal['sendInProcess'] = 0;
                            $columnTotal['sendinprocessday1'] = 0;
                            $columnTotal['sendinprocessday2'] = 0;
                            $columnTotal['sendinprocessday3'] = 0;
                            $columnTotal['sendinprocessday4'] = 0;
                            $columnTotal['sendMessageday1'] = 0;
                            $columnTotal['sendMessageday2'] = 0;
                            $columnTotal['sendMessageday3'] = 0;
                            $columnTotal['sendMessageday4'] = 0;
                            $columnTotal['sendNotIntrested'] = 0;
                            $columnTotal['sendDnc'] = 0;
                            $columnTotal['sendDro'] = 0;
                        @endphp
                        @for($dataCount = $days; $dataCount >= 0; $dataCount--)
                            @php
                                $rowTotal = 0;
                                
                            @endphp
                            @if(isset($data['getSingleAgentData']['sendIva'][$matchDate]) || isset($data['getSingleAgentData']['sendDmp'][$matchDate]) || isset($data['getSingleAgentData']['sendAwaitingDocs'][$matchDate]) ||isset($data['getSingleAgentData']['sendawaitingdocsday1'][$matchDate]) || isset($data['getSingleAgentData']['sendawaitingdocsday1
                            2'][$matchDate]) || isset($data['getSingleAgentData']['sendawaitingdocsday3'][$matchDate]) ||isset($data['getSingleAgentData']['sendawaitingdocsday4'][$matchDate]) || isset($data['getSingleAgentData']['sendInProcess'][$matchDate]) || isset($data['getSingleAgentData']['sendinprocessday1'][$matchDate]) ||isset($data['getSingleAgentData']['sendinprocessday2'][$matchDate]) || isset($data['getSingleAgentData']['sendinprocessday3'][$matchDate]) || isset($data['getSingleAgentData']['sendinprocessday4'][$matchDate]) ||isset($data['getSingleAgentData']['sendMessageday1'][$matchDate]) || isset($data['getSingleAgentData']['sendMessageday2'][$matchDate]) || isset($data['getSingleAgentData']['sendMessageday3'][$matchDate]) ||isset($data['getSingleAgentData']['sendMessageday4'][$matchDate]) || isset($data['getSingleAgentData']['sendNotIntrested'][$matchDate]) || isset($data['getSingleAgentData']['sendDnc'][$matchDate]) || isset($data['getSingleAgentData']['sendDro'][$matchDate]))
                                <tr>
                                    <td>{{  $matchDate  }}</td>
                                    <td class="get_agent_value">{{ $data['getSingleAgentData']['agent_name']  }}</td> 
                                    <td>
                                        @if(isset($data['getSingleAgentData']['sendIva'][$matchDate]))
                                            {{ $data['getSingleAgentData']['sendIva'][$matchDate] }}
                                            @php
                                                $columnTotal['sendIva'] += $data['getSingleAgentData']['sendIva'][$matchDate];
                                                $rowTotal += $data['getSingleAgentData']['sendIva'][$matchDate];

                                                $allColumnTotal += $data['getSingleAgentData']['sendIva'][$matchDate];
                                            @endphp
                                        @else
                                            {{ 0 }}
                                        @endif
                                    </td>

                                    <td>
                                        @if(isset($data['getSingleAgentData']['sendDmp'][$matchDate]))
                                            {{ $data['getSingleAgentData']['sendDmp'][$matchDate] }}
                                            @php
                                                $columnTotal['sendDmp'] += $data['getSingleAgentData']['sendDmp'][$matchDate];
                                                $rowTotal += $data['getSingleAgentData']['sendDmp'][$matchDate];

                                                $allColumnTotal += $data['getSingleAgentData']['sendDmp'][$matchDate];
                                            @endphp
                                        @else
                                            {{ 0 }}
                                        @endif
                                    </td>

                                    <td>
                                        @if(isset($data['getSingleAgentData']['sendAwaitingDocs'][$matchDate]))
                                            {{ $data['getSingleAgentData']['sendAwaitingDocs'][$matchDate] }}
                                            @php
                                                $columnTotal['sendAwaitingDocs'] += $data['getSingleAgentData']['sendAwaitingDocs'][$matchDate];
                                                $rowTotal += $data['getSingleAgentData']['sendAwaitingDocs'][$matchDate];

                                                $allColumnTotal += $data['getSingleAgentData']['sendAwaitingDocs'][$matchDate];
                                            @endphp
                                        @else
                                            {{ 0 }}
                                        @endif
                                    </td>

                                    <td>
                                        @if(isset($data['getSingleAgentData']['sendawaitingdocsday1'][$matchDate]))
                                            {{ $data['getSingleAgentData']['sendawaitingdocsday1'][$matchDate] }}
                                            @php
                                                $columnTotal['sendawaitingdocsday1'] += $data['getSingleAgentData']['sendawaitingdocsday1'][$matchDate];
                                                $rowTotal += $data['getSingleAgentData']['sendawaitingdocsday1'][$matchDate];

                                                $allColumnTotal += $data['getSingleAgentData']['sendawaitingdocsday1'][$matchDate];
                                            @endphp
                                        @else
                                            {{ 0 }}
                                        @endif
                                    </td>

                                    <td>
                                        @if(isset($data['getSingleAgentData']['sendawaitingdocsday2'][$matchDate]))
                                            {{ $data['getSingleAgentData']['sendawaitingdocsday2'][$matchDate] }}
                                            @php
                                                $columnTotal['sendawaitingdocsday2'] += $data['getSingleAgentData']['sendawaitingdocsday2'][$matchDate];
                                                $rowTotal += $data['getSingleAgentData']['sendawaitingdocsday2'][$matchDate];

                                                $allColumnTotal += $data['getSingleAgentData']['sendawaitingdocsday2'][$matchDate];
                                            @endphp
                                        @else
                                            {{ 0 }}
                                        @endif
                                    </td>

                                    <td>
                                        @if(isset($data['getSingleAgentData']['sendawaitingdocsday3'][$matchDate]))
                                            {{ $data['getSingleAgentData']['sendawaitingdocsday3'][$matchDate] }}
                                            @php
                                                $columnTotal['sendawaitingdocsday3'] += $data['getSingleAgentData']['sendawaitingdocsday3'][$matchDate];
                                                $rowTotal += $data['getSingleAgentData']['sendawaitingdocsday3'][$matchDate];

                                                $allColumnTotal += $data['getSingleAgentData']['sendawaitingdocsday3'][$matchDate];
                                            @endphp
                                        @else
                                            {{ 0 }}
                                        @endif
                                    </td>

                                    <td>
                                        @if(isset($data['getSingleAgentData']['sendawaitingdocsday4'][$matchDate]))
                                            {{ $data['getSingleAgentData']['sendawaitingdocsday4'][$matchDate] }}
                                            @php
                                                $columnTotal['sendawaitingdocsday4'] += $data['getSingleAgentData']['sendawaitingdocsday4'][$matchDate];
                                                $rowTotal += $data['getSingleAgentData']['sendawaitingdocsday4'][$matchDate];

                                                $allColumnTotal += $data['getSingleAgentData']['sendawaitingdocsday4'][$matchDate];
                                            @endphp
                                        @else
                                            {{ 0 }}
                                        @endif
                                    </td>

                                    <td>
                                        @if(isset($data['getSingleAgentData']['sendInProcess'][$matchDate]))
                                            {{ $data['getSingleAgentData']['sendInProcess'][$matchDate] }}
                                            @php
                                                $columnTotal['sendInProcess'] += $data['getSingleAgentData']['sendInProcess'][$matchDate];
                                                $rowTotal += $data['getSingleAgentData']['sendInProcess'][$matchDate];

                                                $allColumnTotal += $data['getSingleAgentData']['sendInProcess'][$matchDate];
                                            @endphp
                                        @else
                                            {{ 0 }}
                                        @endif
                                    </td>

                                    <td>
                                        @if(isset($data['getSingleAgentData']['sendinprocessday1'][$matchDate]))
                                            {{ $data['getSingleAgentData']['sendinprocessday1'][$matchDate] }}
                                            @php
                                                $columnTotal['sendinprocessday1'] += $data['getSingleAgentData']['sendinprocessday1'][$matchDate];
                                                $rowTotal += $data['getSingleAgentData']['sendinprocessday1'][$matchDate];

                                                $allColumnTotal += $data['getSingleAgentData']['sendinprocessday1'][$matchDate];
                                            @endphp
                                        @else
                                            {{ 0 }}
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($data['getSingleAgentData']['sendinprocessday2'][$matchDate]))
                                            {{ $data['getSingleAgentData']['sendinprocessday2'][$matchDate] }}
                                            @php
                                                $columnTotal['sendinprocessday2'] += $data['getSingleAgentData']['sendinprocessday2'][$matchDate];
                                                $rowTotal += $data['getSingleAgentData']['sendinprocessday2'][$matchDate];

                                                $allColumnTotal += $data['getSingleAgentData']['sendinprocessday2'][$matchDate];
                                            @endphp
                                        @else
                                            {{ 0 }}
                                        @endif
                                    </td>

                                    <td>
                                        @if(isset($data['getSingleAgentData']['sendinprocessday3'][$matchDate]))
                                            {{ $data['getSingleAgentData']['sendinprocessday3'][$matchDate] }}
                                            @php
                                                $columnTotal['sendinprocessday3'] += $data['getSingleAgentData']['sendinprocessday3'][$matchDate];
                                                $rowTotal += $data['getSingleAgentData']['sendinprocessday3'][$matchDate];

                                                $allColumnTotal += $data['getSingleAgentData']['sendinprocessday3'][$matchDate];
                                            @endphp
                                        @else
                                            {{ 0 }}
                                        @endif
                                    </td>

                                    <td>
                                        @if(isset($data['getSingleAgentData']['sendinprocessday4'][$matchDate]))
                                            {{ $data['getSingleAgentData']['sendinprocessday4'][$matchDate] }}
                                            @php
                                                $columnTotal['sendinprocessday4'] += $data['getSingleAgentData']['sendinprocessday4'][$matchDate];
                                                $rowTotal += $data['getSingleAgentData']['sendinprocessday4'][$matchDate];

                                                $allColumnTotal += $data['getSingleAgentData']['sendinprocessday4'][$matchDate];
                                            @endphp
                                        @else
                                            {{ 0 }}
                                        @endif
                                    </td>

                                    <td>
                                        @if(isset($data['getSingleAgentData']['sendMessageday1'][$matchDate]))
                                            {{ $data['getSingleAgentData']['sendMessageday1'][$matchDate] }}
                                            @php
                                                $columnTotal['sendMessageday1'] += $data['getSingleAgentData']['sendMessageday1'][$matchDate];
                                                $rowTotal += $data['getSingleAgentData']['sendMessageday1'][$matchDate];

                                                $allColumnTotal += $data['getSingleAgentData']['sendMessageday1'][$matchDate];
                                            @endphp
                                        @else
                                            {{ 0 }}
                                        @endif
                                    </td>

                                    <td>
                                        @if(isset($data['getSingleAgentData']['sendMessageday2'][$matchDate]))
                                            {{ $data['getSingleAgentData']['sendMessageday2'][$matchDate] }}
                                            @php
                                                $columnTotal['sendMessageday2'] += $data['getSingleAgentData']['sendMessageday2'][$matchDate];
                                                $rowTotal += $data['getSingleAgentData']['sendMessageday2'][$matchDate];

                                                $allColumnTotal += $data['getSingleAgentData']['sendMessageday2'][$matchDate];
                                            @endphp
                                        @else
                                            {{ 0 }}
                                        @endif
                                    </td>
                                    
                                    <td>
                                        @if(isset($data['getSingleAgentData']['sendMessageday3'][$matchDate]))
                                            {{ $data['getSingleAgentData']['sendMessageday3'][$matchDate] }}
                                            @php
                                                $columnTotal['sendMessageday3'] += $data['getSingleAgentData']['sendMessageday3'][$matchDate];
                                                $rowTotal += $data['getSingleAgentData']['sendMessageday3'][$matchDate];

                                                $allColumnTotal += $data['getSingleAgentData']['sendMessageday3'][$matchDate];
                                            @endphp
                                        @else
                                            {{ 0 }}
                                        @endif
                                    </td>

                                    <td>
                                        @if(isset($data['getSingleAgentData']['sendMessageday4'][$matchDate]))
                                            {{ $data['getSingleAgentData']['sendMessageday4'][$matchDate] }}
                                            @php
                                                $columnTotal['sendMessageday4'] += $data['getSingleAgentData']['sendMessageday4'][$matchDate];
                                                $rowTotal += $data['getSingleAgentData']['sendMessageday4'][$matchDate];

                                                $allColumnTotal += $data['getSingleAgentData']['sendMessageday4'][$matchDate];
                                            @endphp
                                        @else
                                            {{ 0 }}
                                        @endif
                                    </td>

                                    <td>
                                        @if(isset($data['getSingleAgentData']['sendNotIntrested'][$matchDate]))
                                            {{ $data['getSingleAgentData']['sendNotIntrested'][$matchDate] }}
                                            @php
                                                $columnTotal['sendNotIntrested'] += $data['getSingleAgentData']['sendNotIntrested'][$matchDate];
                                                $rowTotal += $data['getSingleAgentData']['sendNotIntrested'][$matchDate];

                                                $allColumnTotal += $data['getSingleAgentData']['sendNotIntrested'][$matchDate];
                                            @endphp
                                        @else
                                            {{ 0 }}
                                        @endif
                                    </td>

                                    <td>
                                        @if(isset($data['getSingleAgentData']['sendDnc'][$matchDate]))
                                            {{ $data['getSingleAgentData']['sendDnc'][$matchDate] }}
                                            @php
                                                $columnTotal['sendDnc'] += $data['getSingleAgentData']['sendDnc'][$matchDate];
                                                $rowTotal += $data['getSingleAgentData']['sendDnc'][$matchDate];

                                                $allColumnTotal += $data['getSingleAgentData']['sendDnc'][$matchDate];
                                            @endphp
                                        @else
                                            {{ 0 }}
                                        @endif
                                    </td>

                                    <td>
                                        @if(isset($data['getSingleAgentData']['sendDro'][$matchDate]))
                                            {{ $data['getSingleAgentData']['sendDro'][$matchDate] }}
                                            @php
                                                $columnTotal['sendDro'] += $data['getSingleAgentData']['sendDro'][$matchDate];
                                                $rowTotal += $data['getSingleAgentData']['sendDro'][$matchDate];

                                                $allColumnTotal += $data['getSingleAgentData']['sendDro'][$matchDate];
                                            @endphp
                                        @else
                                            {{ 0 }}
                                        @endif
                                    </td>
                                    <td> {{ $rowTotal }} </td>
                                </tr>
                                @endif
                                @php
                                    $matchDate = str_replace('/', '-', $matchDate);
                                    $tempMatchDate = date('Y-m-d', strtotime($matchDate . ' -1 day'));
                                    $matchDate = date('d/m/Y', strtotime($tempMatchDate));
                                @endphp
                        @endfor
                                <td>Total</td>
                                <td>-</td> 
                                <td>{{ isset($columnTotal['sendIva']) ? $columnTotal['sendIva'] : 0 }}</td>
                                <td>{{ isset($columnTotal['sendDmp']) ? $columnTotal['sendDmp'] : 0 }}</td>
                                <td>{{ isset($columnTotal['sendAwaitingDocs']) ? $columnTotal['sendAwaitingDocs'] : 0 }}</td>
                                <td>{{ isset($columnTotal['sendawaitingdocsday1']) ? $columnTotal['sendawaitingdocsday1'] : 0 }}</td>
                                <td>{{ isset($columnTotal['sendawaitingdocsday2']) ? $columnTotal['sendawaitingdocsday2'] : 0 }}</td>
                                <td>{{ isset($columnTotal['sendawaitingdocsday3']) ? $columnTotal['sendawaitingdocsday3'] : 0 }}</td>
                                <td>{{ isset($columnTotal['sendawaitingdocsday4']) ? $columnTotal['sendawaitingdocsday4'] : 0 }}</td>
                                <td>{{ isset($columnTotal['sendInProcess']) ? $columnTotal['sendInProcess'] : 0 }}</td>
                                <td>{{ isset($columnTotal['sendinprocessday1']) ? $columnTotal['sendinprocessday1'] : 0 }}</td>
                                <td>{{ isset($columnTotal['sendinprocessday2']) ? $columnTotal['sendinprocessday2'] : 0 }}</td>
                                <td>{{ isset($columnTotal['sendinprocessday3']) ? $columnTotal['sendinprocessday3'] : 0 }}</td>
                                <td>{{ isset($columnTotal['sendinprocessday4']) ? $columnTotal['sendinprocessday4'] : 0 }}</td>
                                <td>{{ isset($columnTotal['sendMessageday1']) ? $columnTotal['sendMessageday1'] : 0 }}</td>
                                <td>{{ isset($columnTotal['sendMessageday2']) ? $columnTotal['sendMessageday2'] : 0 }}</td>
                                <td>{{ isset($columnTotal['sendMessageday3']) ? $columnTotal['sendMessageday3'] : 0 }}</td>
                                <td>{{ isset($columnTotal['sendMessageday4']) ? $columnTotal['sendMessageday4'] : 0 }}</td>
                                <td>{{ isset($columnTotal['sendNotIntrested']) ? $columnTotal['sendNotIntrested'] : 0 }}</td>
                                <td>{{ isset($columnTotal['sendDnc']) ? $columnTotal['sendDnc'] : 0 }}</td>
                                <td>{{ isset($columnTotal['sendDro']) ? $columnTotal['sendDro'] : 0 }}</td>
                                <td> {{ $allColumnTotal }} </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>