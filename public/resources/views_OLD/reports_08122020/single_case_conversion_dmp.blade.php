@extends('layouts.app')

@section('content')

    <!-- main content start -->
@php
    $reportLoginUserData = Auth::user();
    unset($reportLoginUserData->password);

    $reportLoginUser = $reportLoginUserData;
@endphp

<section class="main-content">
        <!-- card details start -->
    <div class="row mt--100">
        <h1 id="totalDebtsAmount">DMP Single Conversion Report </h1>
    </div>
            <section class="card-details">
                
                <div class="row mt-5">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <form action="{{ route('report.single_case_conversion_dmp') }}" method="post">
                                        @csrf
                                        {{-- <input type="hidden" name="agent_new_id" value="" id="agent_new_id">
                                        <input type="hidden" name="agent_name" value="{{ $agent_name }}" id="agent_name"> --}}
                                        <div class="row">
                                            <div class="col-6">
                                            <div class="form-group d-flex">
                                            <input type="text" class="date_range_picker form-control"   id="date_range" name="date_range" placeholder="Select Date:"   autocomplete="off" value="{{ request()->get('date_range') ?? '' }}" autocomplete="off" placeholder="Date">
                                            <input type="submit" name="submit" value="search" class="btn btn-bordered-primary btn-large btn-outline-info ml-3">
                                            <input type="hidden" name="get_da_agent" value="{{ $data['getSingleAgentData']['agent_id'] }}">
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="col-6 pl-0">
                                    <div class="buttons form-group col-12">

                                            
                                            <a href="#" class="btn btn-outline-info">Clear</a>
                                            <a href="#" onclick="goBack()" class="btn btn-outline-info">Back</a>
                                        </div>     
                                    </div>
                                    </div>                           
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row">
                            <form action="{{ route('report.single_case_conversion_dmp') }}" method="post">
                                @csrf
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <input type="text" class="date_range_picker form-control" id="date_range" name="date_range" placeholder="Select Date:"   autocomplete="off" value="{{ request()->get('date_range') ?? '' }}" autocomplete="off" placeholder="Date">
                                        <input type="hidden" name="get_da_agent" value="{{ $data['getSingleAgentData']['agent_id'] }}">
                                        <input type="submit" name="submit" value="search">
                                    </div>
                                </div>
                            </div>
                            </form>
                            
                        </div>
                    </div> --}}
                    {{-- {{route('downloadReport.excel' , 'Debt-agent-case-report')}} --}}
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pr-0 mb-3">
                        <div class="buttons float-right float-md-left float-lg-left float-xl-right small-buttons">
                            <a href="{{ route('downloadReport.excel', ['single_case_conversion_dmp' => 'single_case_conversion_dmp' , 'agent_id' => $data['getSingleAgentData']['agent_id']]) }}" class="btn btn-outline-info btn-bordered-primary">
                                <i class="fa fa-file-excel"></i>
                                &nbsp; Export Excel</a>
                        </div>
                    </div>
                   

                        
                </div>

                {{-- __dmp_single_conversion_report --}}
                
                @include('reports.masters.__single_case_conversion_dmp')
   

        </section>

            

        </div>

    </section>

    <script>

        $('#advisor_send_to_drafter_case_report').DataTable({
            searching: false,
            ordering: false
        });
        $('#search').keyup(function(){
                table.search($(this).val()).draw();
            });


    </script>
@endsection