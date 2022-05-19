<style>
    table, th, td {
        border: 1px solid black;
        border-spacing: 0px;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive grid-wrapper">
                    <table class="table search-table text-center" id="solution_report">
                        <thead>
                            <tr>
                               <th>Debt Type</th>
                               <th>cases</th>
                               <th>Total Debt</th>
                               <th>Average debt</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $value)
                                <tr>
                                    <td>{{ str_replace("_"," ",$key) }}</td>
                                    <td>{{ $value['cases'] }}</td>
                                    <td>{{ number_format($value['total_debt_written_off']) }}</td>
                                    <td>{{ number_format($value['average_debt']) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
