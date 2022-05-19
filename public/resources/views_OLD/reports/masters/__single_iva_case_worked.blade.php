<div class="row">
    <div class="col-md-12">
        <div class="col-md-3"></div>
            <div class="card">
                <div class="card-body">
                     <div class="table-responsive grid-wrapper">
                        <div id="get_all_agent_data" style="display: block;">
                            <table class="table search-table text-center" id="single_iva_case_worked">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Agent Name</th>
                                        <th>Submitted IVA</th>
                                        <th>SENT TO IP</th>
                                        <th>Pass Back IVA </th>
                                        <th>No Answer IVA</th>
                                        <th>IVA No Contact</th>
                                        <th>paid on MOC</th>
                                        <th>Fixed Compliance</th>
                                        <th>Not Intrested</th>
                                        <th>DNC</th>
                                        <th>DRO</th>
                                        <th>SENT TO DMP</th>
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
                                                    @if(isset($data['getSingleAgentData']['submittedIva'][$matchDate]) || isset($data['getSingleAgentData']['sendIp'][$matchDate]))
                                                        <tr> 

                                                            <td>{{  $matchDate  }}</td>
                                                            <td class="get_agent_name">{{ $data['getSingleAgentData']['agent_name']  }}</td> 
                                                            <td>{{  isset($data['getSingleAgentData']['submittedIva'][$matchDate]) ? $data['getSingleAgentData']['submittedIva'][$matchDate] : 0  }}</td>
                                                            <td>{{  isset($data['getSingleAgentData']['sendIp'][$matchDate]) ? $data['getSingleAgentData']['sendIp'][$matchDate] : 0  }}</td>
                                                            <td>{{  isset($data['getSingleAgentData']['passbackiva'][$matchDate]) ? $data['getSingleAgentData']['passbackiva'][$matchDate] : 0  }}</td>
                                                            <td>{{  isset($data['getSingleAgentData']['noansweriva'][$matchDate]) ? $data['getSingleAgentData']['noansweriva'][$matchDate] : 0  }}</td>
                                                            <td>{{  isset($data['getSingleAgentData']['ivanocontact'][$matchDate]) ? $data['getSingleAgentData']['ivanocontact'][$matchDate] : 0  }}</td>
                                                            <td>{{  isset($data['getSingleAgentData']['paidonmoc'][$matchDate]) ? $data['getSingleAgentData']['paidonmoc'][$matchDate] : 0  }}</td>
                                                            <td>{{  isset($data['getSingleAgentData']['fixedcompliance'][$matchDate]) ? $data['getSingleAgentData']['fixedcompliance'][$matchDate] : 0  }}</td>
                                                            <td>{{  isset($data['getSingleAgentData']['notintrested'][$matchDate]) ? $data['getSingleAgentData']['notintrested'][$matchDate] : 0  }}</td>
                                                            <td>{{  isset($data['getSingleAgentData']['dnc'][$matchDate]) ? $data['getSingleAgentData']['dnc'][$matchDate] : 0  }}</td>
                                                            <td>{{  isset($data['getSingleAgentData']['dro'][$matchDate]) ? $data['getSingleAgentData']['dro'][$matchDate] : 0  }}</td>
                                                            <td>{{  isset($data['getSingleAgentData']['sendtodmp'][$matchDate]) ? $data['getSingleAgentData']['sendtodmp'][$matchDate] : 0  }}</td>
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



