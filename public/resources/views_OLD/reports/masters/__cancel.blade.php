<style>

    table, th, td {

        border: 1px solid black;

        border-spacing: 0px;

    }

</style>

{{-- <form action="{{ route('report.cancel_report') }}" class="form-inline">
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

            <table class="table search-table text-center" id="cancel_report">

                <thead>

                <tr>

                    <th>Date Cancelled</th>

                    <th>Customer Name</th>

                    <th>Status</th>

                    <th>Insolvency Practioner</th>

                    <th>Agent</th>

                </tr>

                </thead>

                <tbody>

                @foreach($data['cancelReportDetails'] as $agentReportColumnKey => $agentReportColumnValue)

                    <tr>

                        <td>{{ $agentReportColumnValue->updated_at ?? 'Not Available' }}</td>

                        <td>{{ $agentReportColumnValue->name }}</td>

                        <td>{{ ucfirst(strtolower($agentReportColumnValue->zCaseType)) }}</td>

                        <td>{{ $agentReportColumnValue->insolvencyType->insolvency ?? 'Not available' }}</td>

                        <td>{{ $agentReportColumnValue->user->name ?? 'Default User' }}</td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

    </div>

</div>