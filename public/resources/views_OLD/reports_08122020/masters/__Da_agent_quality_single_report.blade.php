
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
    
                    <table class="table search-table text-center border-0" id="#">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Agent</th>
                                <th>Customer Case ID</th>
                                <th>Introducation</th>
                                <th>Vulnerability</th>
                                <th>Fact Find</th>
                                <th>Solution</th>
                                <th>Documentation</th>
                                <th>Confirmation</th>
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
                        

                        @foreach($allAgentDaReport as $key => $value)
                        @foreach ($value as $innerKey => $innerValue)
                        <tbody>
                            <td>{{ $innerValue['date'] ? $innerValue['date'] : 0  }}</td>
                            <td>{{ $key ?  $key : '-' }}</td>
                            <td>{{ $innerValue['user_id'] ? $innerValue['user_id'] : 0 }}</td>
                            <td>{{ $innerValue['introduction_count'] ? $innerValue['introduction_count'] : 0 }}</td>
                            <td>{{ $innerValue['vulnerability_count'] ? $innerValue['vulnerability_count'] : 0 }}</td>
                            <td>{{ $innerValue['fact_find_count'] ? $innerValue['fact_find_count'] : 0 }}</td>
                            <td>{{ $innerValue['solution_count'] ? $innerValue['solution_count'] : 0 }}</td>
                            <td>{{ $innerValue['documentation_total'] ? $innerValue['documentation_total'] : 0 }}</td>
                            <td>{{ $innerValue['confirmation_total'] ? $innerValue['confirmation_total'] : 0 }}</td>
                            <td>{{ $innerValue['total_result'] ? $innerValue['total_result'] : 0 }}</td>
                            <td>{{ $allAgentCaseCount ? $allAgentCaseCount : 0 }}</td>
                        </tbody>
                        @php
                             $count++;
                             $introducation_total += $innerValue['introduction_count'] ? $innerValue['introduction_count'] : 0;
                             $vulnerability_total += $innerValue['vulnerability_count'] ? $innerValue['vulnerability_count'] : 0; 
                             $fact_find_total += $innerValue['fact_find_count'] ? $innerValue['fact_find_count'] : 0;
                             $solution_total += $innerValue['solution_count'] ? $innerValue['solution_count'] : 0;
                             $documenation_total += $innerValue['documentation_total'] ? $innerValue['documentation_total'] : 0;
                             $confirmation_total += $innerValue['confirmation_total'] ? $innerValue['confirmation_total'] : 0;
                             $overall += $innerValue['total_result'] ? $innerValue['total_result'] : 0;
                        @endphp
                        @endforeach
                    @endforeach
                    <tbody>
                        <td></td>
                        <td></td>
                        <td>Average</td>
                        <td>{{ round($introducation_total/$count) ? round($introducation_total/$count) : 0 }}%</td>
                        <td>{{ round($vulnerability_total/$count) ? round($vulnerability_total/$count) : 0 }}%</td>
                        <td>{{ round($fact_find_total/$count) ? round($fact_find_total/$count) : 0 }}%</td>
                        <td>{{ round($solution_total/$count) ? round($solution_total/$count) : 0 }}%</td>
                        <td>{{ round($documenation_total/$count) ? round($documenation_total/$count) : 0 }}%</td>
                        <td>{{ round($confirmation_total/$count) ? round($confirmation_total/$count) : 0 }}%</td>
                        <td>{{ round($overall/$count) ? round($overall/$count) : 0 }}%</td>
                        <!-- manoj add tabel-cell  for  design -->
                        <td></td>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>