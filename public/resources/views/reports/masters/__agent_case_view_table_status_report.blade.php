<div class="row">
    <div class="col-md-12">
        <div class="col-md-3"></div>
            <div class="card">
                <div class="card-body">
                     <div class="table-responsive grid-wrapper">
                        <div id="get_all_agent_data" style="display: block;">
                            <table class="table search-table text-center" id="case_conversion_iva">
                                <thead>
                                    <tr> 
                                        <th>Agent Name</th>
                                        <th>new</th>
                                        <th>in process</th>
                                        <th>Initial Contact</th>
                                        <th>Not Intrested</th>
                                        <th>completed</th>
                                        <th>awaiting docs</th>
                                        <th>sent to ip</th>
                                        <th>cancelled</th>
                                        <th>REVIEW</th>
                                        <th>send_to_drafter</th>
                                        <th>SMS Sent</th>
                                        <th>paid on MOC</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['agentDetails'] as $agentReportColumnKey => $agentReportColumnValue)
                                        @php $caseCountOfAgent = 0;@endphp
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




