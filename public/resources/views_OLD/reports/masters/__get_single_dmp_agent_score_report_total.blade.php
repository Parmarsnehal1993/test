<div class="row">  
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive grid-wrapper">
                <div id="get_all_agent_data" style="display: block;">
                    <table class="table search-table text-center" id="get_single_dmp_agent_score_report_total">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Agent</th>
                                <th>Average Introducation</th>
                                <th>Average Vulnerability</th>
                                <th>Average Fact Find</th>
                                <th>Average IE</th>
                                <th>Average DMP</th>
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
                            @foreach($data['allAgentDmpReport'] as $key => $value)
                                @foreach ($value as $innerKey => $innerValue)
                                @php
                                     $count++;
                                     $introducation_total += $innerValue['introducation_compliance_count'] ? $innerValue['introducation_compliance_count'] : 0;
                                     $vulnerability_total += $innerValue['vulnerability_compliance_count'] ? $innerValue['vulnerability_compliance_count'] : 0; 
                                     $fact_find_total += $innerValue['fact_find_compliance_count'] ? $innerValue['fact_find_compliance_count'] : 0;
                                     $solution_total += $innerValue['ie_compliance_count'] ? $innerValue['ie_compliance_count'] : 0;
                                     $documenation_total += $innerValue['dmp_compliance_count'] ? $innerValue['dmp_compliance_count'] : 0;
                                     $confirmation_total += $innerValue['confirmation_compliance_count'] ? $innerValue['confirmation_compliance_count'] : 0;
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
                                    <td>{{ $data['allAgentCaseCount'] ? $data['allAgentCaseCount'] : 0 }}</td>
                                </tbody>
                                @endforeach
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>


