<style>

    table, th, td {

        border: 1px solid black;

        border-spacing: 0px;

    }

</style>

{{-- <form action="{{ route('report.case_status_report') }}" class="form-inline">
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

            <table class="table search-table text-center" id="case_status">

                <thead>

                <tr>

                    @foreach($data['caseStatusColumns'] as $caseStatusReportColumnKey => $caseStatusReportColumnValue)
                        @if($caseStatusReportColumnKey == 'send_to_drafter')
                            <th>Send To Drafter</th>
                        @else
                            <th>{{ $caseStatusReportColumnKey }}</th>
                        @endif

                    @endforeach

                    <th>Total</th>

                </tr>

                </thead>

                <tbody>

                @php

                    $reportCounts = 0;

                @endphp

                <tr>

                    @foreach($data['caseStatusColumns'] as $caseStatusReportColumnKey => $caseStatusReportColumnValue)

                        @if(in_array(strtolower($caseStatusReportColumnKey), array_keys(array_change_key_case($data['caseStatusDetails']))))

                            <td>{{ array_change_key_case($data['caseStatusDetails'])[strtolower($caseStatusReportColumnKey)] }}</td>

                            @php

                                $reportCounts += array_change_key_case($data['caseStatusDetails'])[strtolower($caseStatusReportColumnKey)];

                            @endphp

                        @else

                            <td>{{ $caseStatusReportColumnValue }}</td>

                        @endif

                    @endforeach

                    <td>{{ $reportCounts }}</td>

                </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

    </div>

</div>