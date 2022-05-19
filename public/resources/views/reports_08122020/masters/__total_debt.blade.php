{{-- form action="{{ route('report.total_debt_report') }}" class="form-inline">
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

            <table class="table search-table text-center" id="total_debt">

                <thead>

                <tr>

                    <th>No. of Users</th>

                    <th>Users at £0</th>

                    <th>No of users Filled in debts</th>

                    <th>Total debt</th>

                    <th>Average debt</th>

                </tr>

                </thead>

                <tbody>

                    <tr>

                        <td>{{ $data['totalUsers'] ?? '---' }}</td>

                        <td>{{ $data['totalUsers'] - $data['totalDebtUsers'] ?? '---' }}</td>

                        <td>{{ $data['totalDebtUsers'] ?? '---' }}</td>

                        <td>£ {{ number_format($data['totalDebtValue']) ?? '0' }} </td>

                        <td>£ {{ $data['totalDebtUsers'] > 1 ? number_format(round($data['totalDebtValue'] / $data['totalDebtUsers'], 2)) : '0' }}</td>

                    </tr>

                </tbody>

            </table>

        </div>

        </div>

    </div>

    </div>

</div>