<style>

    table, th, td {

        border: 1px solid black;

        border-spacing: 0px;

    }

</style>
   {{--  <form action="{{ route('report.solution_report') }}" class="form-inline">
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

            <table class="table search-table text-center" id="solution_report">

                <thead>

                <tr>

                    <th>IVA</th>

                    <th>DMP</th>

                    <th>DRO</th>

                    <th>Administration Order</th>

                    <th>Trust Deed</th>

                    <th>Bankruptcy</th>

                    <th>Other</th>

                    <th>TOTAL</th>

                </tr>

                </thead>

                <tbody>

                <tr>

                    @php

                        $columnCount = 0;

                    @endphp

                    @foreach($data['solutionReportColumns'] as $solutionReportColumnKey => $solutionReportColumnValue)

                        @if(in_array(strtolower($solutionReportColumnKey), array_keys(array_change_key_case($data['solutionReportDetails']))))

                                <td>{{ array_change_key_case($data['solutionReportDetails'])[strtolower($solutionReportColumnKey)] }}</td>

                            @php

                                $columnCount += array_change_key_case($data['solutionReportDetails'])[strtolower($solutionReportColumnKey)];

                            @endphp

                        @else

                            <td>{{ $solutionReportColumnValue }}</td>

                        @endif

                    @endforeach

                    <td>{{ $columnCount }}</td>

                </tr>

                <tr>

                    @foreach($data['solutionReportColumns'] as $solutionReportColumnKey => $solutionReportColumnValue)

                        @if(in_array(strtolower($solutionReportColumnKey), array_keys(array_change_key_case($data['solutionReportDetails']))))

                            <td>{{ round(array_change_key_case($data['solutionReportDetails'])[strtolower($solutionReportColumnKey)] / $columnCount, 2)*100 ?? '---' }} %</td>

                        @else

                            <td>{{ $solutionReportColumnValue }}</td>

                        @endif

                    @endforeach

                </tr>

                </tbody>

            </table>

        </div>

    </div>

    </div>

    </div>

</div>

<script type="text/javascript">

    $(document).ready(function(){

        $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });

    });

</script>