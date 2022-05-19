<style>

    table, th, td {

        border: 1px solid black;

        border-spacing: 0px;

    }

</style>

    <!--<form action="{{ route('report.new_account') }}" class="form-inline">
        <div class="form-group">
            <input type="text" class="date_range_picker form-control border-0 col-md-3" name="date_range" value="{{ request()->get('date_range') ?? '' }}" autocomplete="off" placeholder="Date">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-default-outlined font-weight-bold" value="Search">
        </div>
    </form>-->

<div class="row">

    <div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive grid-wrapper">

            <table class="table search-table text-center" id="account_report">

                <thead>

                <tr>

                    <th>Date</th>

                    <th>Total Register</th>
                    
                    <th>App</th>

                    <th>IOS App</th>

                    <th>Android App</th>
                    
                    <th>Web</th>
                    
                    <th>Submitted IVA</th>
                    <th>Submitted DMP</th>
                    <th>DRO</th>
                    <th>Bankruptcy</th>
                    <th>Sequestrian</th>
                    <th>Trust Deed</th>
                    <th>DAS</th>
                    <th>Total</th>
                    
                    <th>Completed Cases</th>


                    
                    
                    <!--<th>Completed Cases</th>-->

                </tr>

                </thead>

                <tbody>  

                @foreach($data['dailyUserInfo'] as $dailyUserKey => $dailyUserValue)

                    @php     
                    
                        $appCount = 0;

                        $iosAppCount = 0;

                        $androidAppCount = 0;
                        
                        $completedCaseCount = 0;
                        
                        $webCounts = 0;
                        
                         $submittedIvaCaseCount = 0;
                        $submittedDmpCaseCount = 0;
                        $droCount = 0;
                        $bankruptcyCount = 0;
                        $sequestrianCount = 0;
                        $trustDeedCount = 0;
                        $dasCount = 0;

                        
                            if(in_array($dailyUserValue->date, array_keys($data['appCounts'])))

                                $appCount = $data['appCounts'][$dailyUserValue->date];


                            if(in_array($dailyUserValue->date, array_keys($data['iosAppCounts'])))

                                $iosAppCount = $data['iosAppCounts'][$dailyUserValue->date];


                            if(in_array($dailyUserValue->date, array_keys($data['androidAppCounts'])))

                                $androidAppCount = $data['androidAppCounts'][$dailyUserValue->date];
                            
                                
                            if(in_array($dailyUserValue->date, array_keys($data['webCounts'])))

                                $webCounts = $data['webCounts'][$dailyUserValue->date];
                                
                            if(in_array($dailyUserValue->date, array_keys($data['completedCaseCounts'])))

                                $completedCaseCount = $data['completedCaseCounts'][$dailyUserValue->date];
                            if(in_array($dailyUserValue->date, array_keys($data['submittedIvaCaseCount'])))
                                        
                                $submittedIvaCaseCount = $data['submittedIvaCaseCount'][$dailyUserValue->date];
                                    
                            if(in_array($dailyUserValue->date, array_keys($data['submittedDmpCaseCount'])))
                                        
                                $submittedDmpCaseCount = $data['submittedDmpCaseCount'][$dailyUserValue->date];

                            if(in_array($dailyUserValue->date, array_keys($data['droCount'])))
                                        
                                $droCount = $data['droCount'][$dailyUserValue->date];

                             if(in_array($dailyUserValue->date, array_keys($data['bankruptcyCount'])))
                                        
                                $bankruptcyCount = $data['bankruptcyCount'][$dailyUserValue->date];
                            if(in_array($dailyUserValue->date, array_keys($data['sequestrianCount'])))
                                        
                                $sequestrianCount = $data['sequestrianCount'][$dailyUserValue->date];
                            if(in_array($dailyUserValue->date, array_keys($data['trustDeedCount'])))
                                        
                                $trustDeedCount = $data['trustDeedCount'][$dailyUserValue->date];
                              if(in_array($dailyUserValue->date, array_keys($data['dasCount'])))
                                        
                                $dasCount = $data['dasCount'][$dailyUserValue->date];






                    @endphp

                    <tr>

                        <td>{{ $dailyUserValue->date }}</td>

                        <td>

                            @php echo $appCount+$iosAppCount+$androidAppCount+$webCounts @endphp

                        </td>
                        
                        <td>
                            @php echo $appCount @endphp
                        </td>

                        <td>

                            @php echo $iosAppCount @endphp

                        </td>

                        <td>

                            @php echo $androidAppCount @endphp

                        </td>
                        <td>
                            @php echo $webCounts @endphp
                        </td>
                        <td>
                            @php 
                                        echo $submittedIvaCaseCount 
                                    @endphp
                                 </td>
                                 <td>
                                    @php 
                                        echo $submittedDmpCaseCount 
                                    @endphp
                                 </td>
                                 <td>
                                    @php 
                                        echo $droCount 
                                    @endphp
                                 </td>
                                 <td>
                                    @php 
                                        echo $bankruptcyCount 
                                    @endphp
                                 </td>
                                 <td>
                                    @php 
                                        echo $sequestrianCount 
                                    @endphp
                                 </td>
                                 <td>
                                    @php 
                                        echo $trustDeedCount 
                                    @endphp
                                 </td>
                                 <td>
                                    @php 
                                        echo $dasCount 
                                    @endphp
                                 </td>
                                 <td>
                                    @php 
                                        echo $submittedIvaCaseCount + $submittedDmpCaseCount 
                                    @endphp
                                 </td>
                                 <td>
                                    @php 
                                        echo $submittedIvaCaseCount + $submittedDmpCaseCount 
                                    @endphp
                                </td>
                        
                        
                       
                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>
        </div>
    </div>
        

    </div>

</div>