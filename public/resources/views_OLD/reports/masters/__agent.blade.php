<style>
    table, th, td {
        border: 1px solid black;
        border-spacing: 0px;
    }
</style>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive grid-wrapper">
                <table class="table search-table text-center" id="agent_report">
                    <thead>
                        <tr>
                            <th>Agent Name</th>
                            @foreach($data['agentColumns'] as $agentReportColumnKey => $agentReportColumnValue)
                                @if(isset($allCaseStatuses[$agentReportColumnKey]))
                                    <th>{{ $allCaseStatuses[$agentReportColumnKey] }}</th>
                                @else
                                    <th>{{ $agentReportColumnKey }}</th>
                                @endif
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