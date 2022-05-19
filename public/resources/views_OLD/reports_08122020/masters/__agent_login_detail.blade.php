
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
        <div class="card">
        <div class="card-body">
        <div class="table-responsive grid-wrapper">
            <table class="table search-table text-center" id="agent_report">
                <thead>
                <tr>
                    <th>Agent Name</th>
                    <th>Date</th>
                    <th>Logged in Time</th>
                    <th>Home Time</th>
                    <th>Total Hours</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($agentLoginDetails as $agentLoginDetailsKey => $agentLoginDetailsValue)
                        <tr>
                            <td>{{ $agentLoginDetailsValue->user->name }}</td>
                            <td>{{ date('d-m-Y', strtotime($agentLoginDetailsValue->date)) }}</td>
                            <td>{{ $agentLoginDetailsValue->login_time }}</td>
                            <td>{{ $agentLoginDetailsValue->logout_time }}</td>
                            <td>
                                @php
                                   $time1 = strtotime($agentLoginDetailsValue->login_time);
                                   $time2 = strtotime($agentLoginDetailsValue->logout_time);
                                   $difference = round(abs($time2 - $time1) / 3600,2);
                                @endphp
                                {{ $difference }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    </div>
</div>