    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive grid-wrapper">
                    <div id="get_all_agent_data" style="display: block;">
                        <table class="table search-table text-center" id="#">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Agent</th>
                                    <th>Average Introducation</th>
                                    <th>Average Vulnerability</th>
                                    <th>Average Fact Find</th>
                                    <th>Average IE</th>
                                    <th>Average IVA</th>
                                    <th>Average Confirmation</th>
                                    <th>Overall</th>
                                    <th>Total Number of case</th>
                                </tr>
                            </thead>
                                @php
                                    $count = 1;
                                    $introducation_total = 0;
                                    $vulnerability_total = 0;
                                    $fact_find_total = 0;
                                    $solution_total = 0;
                                    $documenation_total = 0;
                                    $confirmation_total = 0;
                                    $overall = 0;
                                @endphp
                                @foreach($data['total_number_of_case'] as $key => $value)
                                    @php
                                        $total_number_case = $value;
                                    @endphp
                                 @endforeach
                                @foreach($data['getIvaQuality'] as $key => $value)
                                @foreach ($value as $innerKey => $innerValue)
                                @php
                                     $count++;
                                     $introducation_total += $innerValue['introducation_iva_compliance_count'] ? $innerValue['introducation_iva_compliance_count'] : 0;
                                     $vulnerability_total += $innerValue['vulnerability_iva_compliance_count'] ? $innerValue['vulnerability_iva_compliance_count'] : 0; 
                                     $fact_find_total += $innerValue['fact_find_iva_compliance_count'] ? $innerValue['fact_find_iva_compliance_count'] : 0;
                                     $solution_total += $innerValue['ie_iva_compliance_count'] ? $innerValue['ie_iva_compliance_count'] : 0;
                                     $documenation_total += $innerValue['iva_compliance_count'] ? $innerValue['iva_compliance_count'] : 0;
                                     $confirmation_total += $innerValue['confirmation_iva_compliance_count'] ? $innerValue['confirmation_iva_compliance_count'] : 0;
                                     $overall += $innerValue['total_result'] ? $innerValue['total_result'] : 0;
                                @endphp
                                <tbody>
                                    <td>{{ $innerValue['date'] }}</td>
                                    <td>{{ $key ? $key : '-'  }}</td>
                                    <td>{{ $introducation_total ? $introducation_total : 0 }} %</td>
                                    <td>{{ $vulnerability_total ? $vulnerability_total : 0 }}%</td>
                                    <td>{{ $fact_find_total ? $fact_find_total : 0 }}%</td>
                                    <td>{{ $solution_total ? $solution_total : 0 }}%</td>
                                    <td>{{ $documenation_total ? $documenation_total : 0 }}%</td>
                                    <td>{{ $confirmation_total ? $confirmation_total : 0 }}%</td>
                                    <td>{{ $overall }}%</td>
                                    <td>{{ $total_number_case ? $total_number_case : 0 }}</td>
                                </tbody>
                                
                                @endforeach
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>