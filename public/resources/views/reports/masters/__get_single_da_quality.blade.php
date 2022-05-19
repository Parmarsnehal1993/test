
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
                        
                        
                        @foreach($data['allAgentDaReport'] as $key => $value)
                        
                        <tbody>
                            <td>{{ $value['date'] ? $value['date'] : 0  }}</td>
                            <td>{{ $key ?  $key : '-' }}</td>
                            <td>{{ $value['user_id'] ? $value['user_id'] : 0 }}</td>
                            <td>{{ $value['introduction_count'] ? $value['introduction_count'] : 0 }}</td>
                            <td>{{ $value['vulnerability_count'] ? $value['vulnerability_count'] : 0 }}</td>
                            <td>{{ $value['fact_find_count'] ? $value['fact_find_count'] : 0 }}</td>
                            <td>{{ $value['solution_count'] ? $value['solution_count'] : 0 }}</td>
                            <td>{{ $value['documentation_total'] ? $value['documentation_total'] : 0 }}</td>
                            <td>{{ $value['confirmation_total'] ? $value['confirmation_total'] : 0 }}</td>
                            <td>{{ $value['total_result'] ? $value['total_result'] : 0 }}</td>
                            <td>{{ $data['allAgentCaseCount'] ? $data['allAgentCaseCount'] : 0 }}</td>
                        </tbody>
                        @php
                             $count++;
                             $introducation_total += $value['introduction_count'] ? $value['introduction_count'] : 0;
                             $vulnerability_total += $value['vulnerability_count'] ? $value['vulnerability_count'] : 0; 
                             $fact_find_total += $value['fact_find_count'] ? $value['fact_find_count'] : 0;
                             $solution_total += $value['solution_count'] ? $value['solution_count'] : 0;
                             $documenation_total += $value['documentation_total'] ? $value['documentation_total'] : 0;
                             $confirmation_total += $value['confirmation_total'] ? $value['confirmation_total'] : 0;
                             $overall += $value['total_result'] ? $value['total_result'] : 0;
                        @endphp
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