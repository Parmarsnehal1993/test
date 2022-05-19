<style>
    table, th, td {
        border: 1px solid black;
        border-spacing: 0px;
    }
</style>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive grid-wrapper">
                <table class="table search-table text-center" id="agent_report">
                    <thead>
                        <tr>
                            <th>Debt Type</th>
                            <th>Cases</th>
                            <th>Total Debt written off</th>
                            <th>Average Debts</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php arsort($data); @endphp
                        @foreach($data as $key => $value)
                            <tr>
                                <td>{{ str_replace("_"," ",$key) }}</td>
                                <td>{{ $value['cases'] }}</td>
                                <td>&#163;{{ number_format($value['total_debt_written_off'],2) }}</td>
                                <td>&#163;{{ number_format($value['average_debt'],2) }}</td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>