{{-- <form action="{{ route('report.invoice_report') }}" class="form-inline">
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

                <div class="table-responsive grid-wrapper">

                    <table class="table search-table text-center" id="invoice_report">

                        <thead>

                            <tr>

                                <th>Date</th>

                                <th>Insolvency Practioner</th>

                                <th>Customer Name</th>

                                <th>Solution Type</th>

                                <th>Fee</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($data['invoices'] as $invoiceKey => $invoiceValue)

                            <tr>

                                <td>{{ isset($invoiceValue->lastUpdatedAt) ? date('Y-m-d', strtotime($invoiceValue->lastUpdatedAt)) : '-' }}</td>

                                <td>{{ $invoiceValue->insolvency ?? '-' }}</td>

                                <td>{{ $invoiceValue->user->name ?? '-' }}</td>

                                <td>{{ $invoiceValue->solutionType ?? '-' }}</td>

                                <td>{{ $invoiceValue->account->fee ?? '-' }}</td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>
            </div>
        </div>
</div>