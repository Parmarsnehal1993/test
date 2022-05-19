
{{-- <form action="{{ route('report.agent_report') }}" class="form-inline">
    <div class="form-group">
        <input type="text" class="date_range_picker form-control border-0 col-md-3" name="date_range" value="{{ request()->get('date_range') ?? '' }}" autocomplete="off" placeholder="Date" readonly>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-default-outlined font-weight-bold" value="Search">
    </div>
</form> --}}

<div class="row">

    <div class="col-md-12">

        <div class="table-responsive grid-wrapper">

            <table class="table-grid table-bordered table-pd" id="agent_report">

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