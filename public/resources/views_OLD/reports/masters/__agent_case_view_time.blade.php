<style>

    table, th, td {
        border: 1px solid black;
        border-spacing: 0px;
    }

</style>
{{-- <form action="{{ route('report.agent_case_view_time_report') }}" class="form-inline">
    <div class="form-group">
        <input type="text" class="date_range_picker form-control border-0 col-md-3" name="date_range" value="{{ request()->get('date_range') ?? '' }}" autocomplete="off" placeholder="Date" readonly>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-default-outlined font-weight-bold" value="Search">
    </div>
</form> --}}

<div class="row">

    <div class="col-md-12">

        <div class="card">
        <div class="card-body">

        <div class="table-responsive grid-wrapper">

            <table class="table search-table text-center" id="agent_case_view_time_report">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Agent Name</th>
                    <th>Case No.</th>
                    <th>Time in case</th>
                    <th>Outcome</th>
                </tr>

                </thead>

                <tbody>

                @foreach($agentCaseViewTimeReport as $agentCaseViewTimeReportColumnKey => $agentCaseViewTimeReportColumnValue)
                    <tr>
                        @php
                            $caseCountOfAgent = 0;
                        @endphp

                        <td>{{ date('d/m/Y', strtotime($agentCaseViewTimeReportColumnValue->case_view_start_time)) }}</td>
                        <td>{{ $agentCaseViewTimeReportColumnValue->user->name }}</td>
                        <td>{{ $agentCaseViewTimeReportColumnValue->user_id }}</td>
                        <td>
                            @php
                                $seconds = strtotime($agentCaseViewTimeReportColumnValue->case_view_stop_time) - strtotime($agentCaseViewTimeReportColumnValue->case_view_start_time);

                                $days    = floor($seconds / 86400);
                                $hours   = floor(($seconds - ($days * 86400)) / 3600);
                                $minutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);
                                $seconds = floor(($seconds - ($days * 86400) - ($hours * 3600) - ($minutes*60)));
                            @endphp
                            {{ $hours.':'.$minutes }}</td>
                        <td>{{ strtoupper(str_replace('_', ' ', $agentCaseViewTimeReportColumnValue->case_status) )}}</td>
                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

    </div>

</div>