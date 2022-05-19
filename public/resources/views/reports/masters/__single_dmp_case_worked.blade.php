<div class="row">
    <div class="col-md-12">
        <div class="col-md-3"></div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive grid-wrapper">
                        <div id="get_all_agent_data" style="display: block;">
                            <table class="table search-table text-center" id="sinle_dmp_case_worked">
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
                                        $days =date_diff($ymd_start_date, $ymd_end_date)->format("%a");
                                        $iva = 0;
                                        $dmp = 0;
                                        $sentIp = 0;
                                        $senddmp = 0;
                                        @endphp

                                        @for($dataCount = $days; $dataCount >= 0; $dataCount--)
                                                    @php //echo '<br>matchDate => ' . $matchDate; @endphp
                                                    @if(isset($data['getSingleAgentData']['submittedDmp'][$matchDate]) || isset($data['getSingleAgentData']['sendDmpprovider'][$matchDate]))
                                                        <tr> 

                                                            <td>{{  $matchDate  }}</td>
                                                            <td class="get_agent_name">{{ $data['getSingleAgentData']['agent_name']  }}</td> 
                                                            <td>{{  isset($data['getSingleAgentData']['submittedDmp'][$matchDate]) ? $data['getSingleAgentData']['submittedDmp'][$matchDate] : 0  }}</td>
                                                            <td>{{  isset($data['getSingleAgentData']['sendDmpprovider'][$matchDate]) ? $data['getSingleAgentData']['sendDmpprovider'][$matchDate] : 0  }}</td>
                                                            <td>{{  isset($data['getSingleAgentData']['chasepack'][$matchDate]) ? $data['getSingleAgentData']['chasepack'][$matchDate] : 0  }}</td>
                                                            <td>{{  isset($data['getSingleAgentData']['noanswerdmp'][$matchDate]) ? $data['getSingleAgentData']['noanswerdmp'][$matchDate] : 0  }}</td>
                                                            <td>{{  isset($data['getSingleAgentData']['dmppacknc'][$matchDate]) ? $data['getSingleAgentData']['dmppacknc'][$matchDate] : 0  }}</td>
                                                            <td>{{  isset($data['getSingleAgentData']['dmpnotcontact'][$matchDate]) ? $data['getSingleAgentData']['dmpnotcontact'][$matchDate] : 0  }}</td>
                                                            <td>{{  isset($data['getSingleAgentData']['fixedcompliance'][$matchDate]) ? $data['getSingleAgentData']['fixedcompliance'][$matchDate] : 0  }}</td>
                                                            <td>{{  isset($data['getSingleAgentData']['notintrested'][$matchDate]) ? $data['getSingleAgentData']['notintrested'][$matchDate] : 0  }}</td>
                                                            <td>{{  isset($data['getSingleAgentData']['dnc'][$matchDate]) ? $data['getSingleAgentData']['dnc'][$matchDate] : 0  }}</td>
                                                            <td>{{  isset($data['getSingleAgentData']['dro'][$matchDate]) ? $data['getSingleAgentData']['dro'][$matchDate] : 0  }}</td>
                                                            <td>{{  isset($data['getSingleAgentData']['sendtoiva'][$matchDate]) ? $data['getSingleAgentData']['sendtoiva'][$matchDate] : 0  }}</td>
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



