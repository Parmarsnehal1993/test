
{{-- <form action="{{ route('report.fees_report') }}" class="form-inline">
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

            <table class="table search-table text-center dataTable no-footer" id="fees_report">

                <thead>

                <tr>

                    <th>Credit fix</th>

                    <th>Aperture</th>

                    <th>Debt Champion</th>

                    <th>Forrest King</th>

                    <th>debt Advisor</th>

                    <th>Hannover</th>

                    <th>TIP</th>

                    <th>Johnson Geddes</th>

                    <th>Anchorage Chambers</th>

                    <th>other</th>
                    
                    <th>Vanguard</th>
                    
                    <th>Cwf</th>

                    <th>Total</th>

                </tr>

                </thead>

                <tbody>

                <tr>

                    @php

                        $feesReportCounts = 0;

                        $feesReportFeesCounts = 0;

                    @endphp
                    
                    @foreach($data['feesColumns'] as $insolvencyDataUserCountKey => $insolvencyDataUserCountValue)
                        @if(in_array(strtolower($insolvencyDataUserCountKey), array_keys(array_change_key_case($data['insolvencyDataUserCount']))))

                            <td>{{ array_change_key_case($data['insolvencyDataUserCount'])[strtolower($insolvencyDataUserCountKey)] }}</td>

                            @php

                                $feesReportCounts += array_change_key_case($data['insolvencyDataUserCount'])[strtolower($insolvencyDataUserCountKey)]

                            @endphp

                        @else

                            <td>{{ $insolvencyDataUserCountValue }}</td>

                        @endif

                    @endforeach

                    <td>{{ $feesReportCounts }}</td>

                </tr>

                <tr>

                    @foreach($data['feesColumns'] as $feesDetailsKey => $feesDetailsValue)

                        @if(in_array(strtolower($feesDetailsKey), array_keys(array_change_key_case($data['feesDetails']))))
                            @php

                            $feesReportFeesCounts += round(array_change_key_case($data['feesDetails'])[strtolower($feesDetailsKey)], 0);

                        @endphp

                            <td>£ {{ isset(array_change_key_case($data['feesDetails'])[strtolower($feesDetailsKey)]) ? number_format(round(array_change_key_case($data['feesDetails'])[strtolower($feesDetailsKey)], 2)) : '0' }} </td>

                        @else

                            <td> £{{ $feesDetailsValue }}</td>

                        @endif

                    @endforeach

                    <!--<td> £{{ $feesReportFeesCounts }}</td>-->
                    <td>£{{ number_format(round($feesReportFeesCounts, 2)) }} </td>

                </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

    </div>

</div>