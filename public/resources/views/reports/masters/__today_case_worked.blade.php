<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive grid-wrapper">
                <table class="table search-table text-center" id="today_Case_report">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Case id</th>
                            <th>Mobile no</th>
                            <th>Case type</th>
                            <th>case staus</th>
                            <th>Download From</th>
                            <th>Download Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                        $counter = 1;
                        
                        @endphp
                        @if(!empty($data['today_case']))
                            @foreach($data['today_case'] as $key => $value)
                            <tr>
                                
                                <td>{{ $counter }}</td>
                                <td>{{ $value['user_id'] }}</td>
                                <td>{{ $value['tel'] }}</td>
                                <td>{{ $value['caseType'] }}</td>
                                <td>{{ $value['zCaseType'] }}</td>
                                <td>{{ $value['where_did_you_hear_about_us'] ? $value['where_did_you_hear_about_us'] : '-' }}</td>
                                @php 
                                $date = getDateValue($value['download_date']);
                                @endphp
                                <td>{{ $date }}</td>
                            </tr>
                            @php 
                            $counter++;
                            @endphp
                            @endforeach
                        @else 
                        <tr>
                            <td>No Record Found</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>