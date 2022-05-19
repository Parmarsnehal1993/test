

{{-- <form action="{{ route('report.total_debt_written_off_report') }}" class="form-inline">
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
                
                    <table class="table search-table text-center dataTable no-footer" id="total_debt_written_off">
                
                        <thead>
                
                        <tr>
                
                            <th>Cases</th>
                
                            <th>Total Debts</th>
                
                            <th>Average Debts</th>
                
                        </tr>
                
                        </thead>
                
                        <tbody>
                
                        <tr>
                
                            <td>{{ $data['reportDetails']->count() ?? '---' }}</td>
                
                            <td>£ {{ number_format($data['toatl_debt']) ?? '0' }} </td>
                
                            <td>£ {{ $data['reportDetails']->count() > 1 ? number_format(round($data['toatl_debt'] / $data['reportDetails']->count(), 2)) : '0' }} </td>
                
                        </tr>
                
                        </tbody>
                
                    </table>
                
                </div>
            </div>
        </div>

    </div>

</div>