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
                                <th>Month</th>
                                <th>Year</th>
                                <th>Cases</th>
                                <th>Total Debts</th>
                                <th>Average Debts</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['monthWiseDebt'] as $key => $value)
                            @foreach($value as $innerKey => $innerValue)
                                <tr>
                                    @php 
                                        $innerKey = getMonthName($innerKey);
                                        $toatlDebt = 0;
                                        $average = 0;
                                        if(isset($innerValue['total_debt']) && !empty($innerValue['total_debt'])){
                                            $toatlDebt = number_format($innerValue['total_debt']);
                                        }if(isset($innerValue['average']) && !empty($innerValue['average'])){
                                            $average = number_format($innerValue['average']);
                                        }
                                    @endphp 
                                    <td>{{ $innerKey }}</td>
                                    <td>{{ $key }}</td>
                                    <td>{{ $innerValue['cases'] ?? '0' }}</td>
                                    <td>{{  $toatlDebt ?? '0' }}</td>
                                    <td>{{ $$average ?? '0' }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
