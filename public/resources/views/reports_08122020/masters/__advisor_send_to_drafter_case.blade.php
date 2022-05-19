<style>

    table, th, td {

        border: 1px solid black;

        border-spacing: 0px;

    }

</style>

{{-- <form action="{{ route('report.advisor_send_to_drafter_case_report') }}" class="form-inline">
    <div class="form-group">
        <input type="text" class="date_range_picker form-control border-0 col-md-3" name="date_range" value="{{ request()->get('date_range') ?? '' }}" autocomplete="off" placeholder="Date" readonly>
    </div>
    <div class="from-group">
        <input type="submit" class="btn btn-default-outlined font-weight-bold" value="Search">
    </div>
</form> --}}

<div class="row">

    <div class="col-md-12">

        <div class="card">
        <div class="card-body">

        <div class="table-responsive grid-wrapper">

            <table class="table search-table text-center" id="advisor_send_to_drafter_case_report">

                <thead>

                <tr>
                    <th>Agent Name</th>

                    <th>SentTo Drafter</th>

                </tr>

                </thead>

                <tbody>
                    @if(isset($data['reportDetails']) && !empty($data['reportDetails']))
                        @foreach($data['reportDetails'] as $agentReportColumnKey => $agentReportColumnValue)
        
                            <tr>
                                <td>{{ ucfirst(getDrafterName($agentReportColumnKey)) }}</td>
        
                                <td>{{ $agentReportColumnValue ?? '-' }}</td>
                            </tr>
        
                        @endforeach
                    @endif

                </tbody>

            </table>

        </div>

    </div>

</div>

    </div>

</div>