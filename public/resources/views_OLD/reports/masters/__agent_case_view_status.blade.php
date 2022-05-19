<div class="row">
    <div class="col-md-12">
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                     <div class="table-responsive grid-wrapper">
                        <div id="get_all_agent_data" style="display: block;">
                            <table class="table-grid table-bordered table-pd" id="agent_case_view_status_report">
                <thead>
                    <tr>
                        <th>Agent Name</th>
                        @foreach($data['agentColumns'] as $agentReportColumnKey => $agentReportColumnValue)
                        <th>{{ $agentReportColumnKey }}</th>
                        @endforeach
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data['agentDetails'] as $agentReportColumnKey => $agentReportColumnValue)
                        @php
                            $caseCountOfAgent = 0;
                        @endphp
                            @foreach($agentReportColumnValue as $agentName => $agentCaseDetails)
                                <tr>
                                    <td>{{ $agentName }}</td>
                                        @foreach($data['agentColumns'] as $caseType => $caseCount)
                                            <td>{{ array_change_key_case($agentCaseDetails)[strtolower($caseType)] ?? 0 }}</td>
                                                @php
                                                    $caseCountOfAgent += array_change_key_case($agentCaseDetails)[strtolower($caseType)] ?? 0;
                                                @endphp
                                        @endforeach
                                            <td>{{ $caseCountOfAgent ?? 0 }}</td>
                                </tr>
                            @endforeach
                    @endforeach
                </tbody> 
            </table>
                     </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






{{-- div class="row">
    <div class="col-md-12">
        <div class="col-md-3"></div>
            <div class="card">
                <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-12">
                <div>
                    <div class="buttons float-right float-lg-left float-md-left float-xl-right small-buttons mb-3 mt-3">     
                        <a href="{{route('downloadReport.excel' , 'agent_case_view_status')}}" class="btn btn-outline-info btn-bordered-primary">
                            <i class="fa fa-file-excel"></i>
                            &nbsp; Export Excel</a>
                    </div>
                </div>
            </div>
                <div class="card-body">
                     <div class="table-responsive grid-wrapper">
                        <div id="get_all_agent_data" style="display: block;">
                {{-- <table class="table-grid table-bordered table-pd" id="agent_report">
                <thead>
                    <tr>
                        <th>Agent Name</th>
                        @foreach($data['agentColumns'] as $agentReportColumnKey => $agentReportColumnValue)
                        <th>{{ $agentReportColumnKey }}</th>
                        @endforeach
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data['agentDetails'] as $agentReportColumnKey => $agentReportColumnValue)
                        @php
                            $caseCountOfAgent = 0;
                        @endphp
                            @foreach($agentReportColumnValue as $agentName => $agentCaseDetails)
                                <tr>
                                    <td>{{ $agentName }}</td>
                                        @foreach($data['agentColumns'] as $caseType => $caseCount)
                                            <td>{{ array_change_key_case($agentCaseDetails)[strtolower($caseType)] ?? 0 }}</td>
                                                @php
                                                    $caseCountOfAgent += array_change_key_case($agentCaseDetails)[strtolower($caseType)] ?? 0;
                                                @endphp
                                        @endforeach
                                            <td>{{ $caseCountOfAgent ?? 0 }}</td>
                                </tr>
                            @endforeach
                    @endforeach
                </tbody> --}}
          {{--   </table>
           </div>
                    </div>
                </div>
            </div>
    </div>
</div> --}}
           
