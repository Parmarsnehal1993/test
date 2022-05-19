
 <style>
    table, th, td {
        border: 1px solid black;
        border-spacing: 0px;
    }

</style>


<div class="row">
{{-- {{ dd($data) }} --}}
<div class="col-md-12">
   
    <div class="card">
        <div class="card-body">
            <div class="table-responsive grid-wrapper">
               
                <div id="get_all_agent_data" style="display: block;">
    
                    <table class="table search-table text-center" id="new_case_to_submitted">
                        <thead>
                            <tr>
                                <th>month</th>
                                <th>System Cases</th>
                                <th>Total submitted cases</th>
                                <th>iva submitted</th>
                                <th>dmp submitted</th>
                                <th>IVA%</th>
                                <th>DMP%</th>
                                <th>overall%</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                                $overall = 0;
                                $dmp = 0;
                                $iva = 0;
                                
                                // /($data);
                                $data = array_reverse($data, true);
                                // dd($data);
                            @endphp

                            @foreach($data as $key => $value)
                                <tr>
                                    <td>{{ $value['month'] }}</td>
                                    <td>{{ $value['total_case'] }}</td>
                                    <td>{{ $value['total_submitted'] }}</td>
                                    <td>{{ $value['submitted_iva_count'] }}</td>
                                    <td>{{ $value['submitted_dmp_count'] }}</td>
                                @if($value['total_case'] > 0 && $value['submitted_iva_count'] > 0)
                                    @php 
                                        $iva =  $value['submitted_iva_count'] / $value['total_case'];
                                    @endphp
                                    <td>{{ number_format($iva * 100 ,2, '.', '') }}%</td>
                                @else 
                                    @php $iva = 0; @endphp
                                    <td>0</td>
                                @endif

                                @if($value['total_case'] > 0 && $value['submitted_dmp_count'] > 0)
                                    @php 
                                        $dmp = $value['submitted_dmp_count'] / $value['total_case']; 
                                    @endphp
                                    <td>{{ number_format($dmp * 100 ,2, '.', '') }}%</td>
                                @else 
                                    @php $dmp = 0; @endphp
                                    <td>{{ $dmp }}</td>
                                @endif
                                    @if($value['total_case'] > 0 && $value['submitted_dmp_count'] > 0  && $value['submitted_iva_count'] > 0)
                                        @php 
                                            $overallDmpIva = $value['submitted_dmp_count'] + $value['submitted_iva_count'];
                                            
                                            $overall_result = $overallDmpIva / $value['total_case'];
                                            
                                        @endphp
                                        <td>{{ number_format($overall_result * 100,2,'.','') }}%</td>
                                    @else
                                        <td>0</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>



