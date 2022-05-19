
 <style>
    table, th, td {
        border: 1px solid black;
        border-spacing: 0px;
    }

</style>
<div class="row">
    {{-- <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <form action="{{ route('report.Da_agent_quality_report') }}" method="get">
            @csrf
            <input type="hidden" name="agent_new_id" value="" id="agent_new_id">
            <div class="row">
                <div class="col-6">
                <div class="form-group">
                <input type="text" class="datepicker form-control" name="date">
            </div>    
        </div>
        
        <div class="col-6">
        <div class="buttons form-group col-12">

                <input type="submit" name="submit" value="Search" class="btn btn-outline-info btn-large">
            </div>     
        </div>
        </div>                           
    </form>
</div> --}}

<div class="col-md-12">
   
   <!-- <div class="col-md-3">
     <form action="{{ route('report.Da_agent_single_quality_report') }}" method="post">
        @csrf
       <select class="form-control mb-3" name="get_da_agent">
           <option>select Agent</option>
        @foreach($allAgentDa as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
       </select>
       <div class="form-group">
           <input type="submit" name="submit" value="search" class="btn btn-outline-info btn-large">
       </div>
    </form>
   </div> -->
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
                                <th>Status</th>
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
                                    <td>{{ $key ? $key : '-'  }}</td>
                                    <td>{{ $innerValue['user_id'] ? $innerValue['user_id'] : 0 }}</td>
                                    <td>{{ $innerValue['introduction_count'] ? $innerValue['introduction_count'] : 0 }}</td>
                                    <td>{{ $innerValue['vulnerability_count'] ? $innerValue['vulnerability_count'] : 0 }}</td>
                                    <td>{{ $innerValue['fact_find_count'] ? $innerValue['fact_find_count'] : 0  }}</td>
                                    <td>{{ $innerValue['solution_count'] ? $innerValue['solution_count'] : 0 }}</td>
                                    <td>{{ $innerValue['documentation_total'] ? $innerValue['documentation_total'] : 0 }}</td>
                                    <td>{{ $innerValue['confirmation_total'] ? $innerValue['confirmation_total'] : 0 }}</td>
                                    <td>{{ $innerValue['total_result'] ? $innerValue['total_result'] : 0 }}</td>
                                    <td>{{ $innerValue['result'] ? $innerValue['result'] : 0 }}</td>
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
                                <td></td>
                            </tbody>
                        

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>


<script type="text/javascript">
    $(document).ready(function(){
        
        $( ".datepicker" ).datepicker(
            {
        changeMonth: true,
        changeYear: true,
        dateFormat: 'mm/dd/yy',
        beforeShow: function (input, inst) {
            var rect = input.getBoundingClientRect();
            setTimeout(function () {
                inst.dpDiv.css({ top: rect.top + 40, left: rect.left + 0 });
            }, 0);
        }});
    });
    </script>

