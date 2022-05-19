<style>

    table, th, td {

        border: 1px solid black;

        border-spacing: 0px;

    }

</style>

{{-- <form action="{{ route('report.ip_report') }}" class="form-inline">
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

            <table class="table search-table text-center" id="ip_report">

                <thead>

                <tr>

                    <th>Credit fix</th>

                    <th>Aperture</th>

                    <th>Debt Champion</th>

                    <th>Forrest King</th>

                    <th>debt Advisor</th>

                    <th>Hannover</th>

                    <th>TIP</th>

                    <th>Johnson Geddes</th>

                    <th>Anchorage Chambers</th>

                    <th>other</th>
                    
                    <th>Vanguard</th>
                    
                    <th>Wcf</th>

                    <th>Total</th>

                </tr>

                </thead>

                <tbody>

                <tr>

                    @php

                        $ipReportCounts = 0;

                    @endphp

                    @foreach($data['ipReportColumns'] as $ipReportColumnKey => $ipReportColumnValue)

                        @if(in_array(strtolower($ipReportColumnKey), array_keys(array_change_key_case($data['ipReportDetails']))))

                            <td>{{ array_change_key_case($data['ipReportDetails'])[strtolower($ipReportColumnKey)] }}</td>

                            @php

                                $ipReportCounts += array_change_key_case($data['ipReportDetails'])[strtolower($ipReportColumnKey)]

                            @endphp

                        @else

                            <td>{{ $ipReportColumnValue }}</td>

                        @endif

                    @endforeach

                    <td>{{ $ipReportCounts }}</td>

                </tr>

                <tr>

                    @foreach($data['ipReportColumns'] as $ipReportColumnKey => $ipReportColumnValue)

                        @if(in_array(strtolower($ipReportColumnKey), array_keys(array_change_key_case($data['ipReportDetails']))))

                            <td>{{ round(array_change_key_case($data['ipReportDetails'])[strtolower($ipReportColumnKey)] / $ipReportCounts, 2)*100 ?? 0}} %</td>

                        @else

                            <td>{{ $ipReportColumnValue }} %</td>

                        @endif

                    @endforeach

                </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

    </div>

</div>