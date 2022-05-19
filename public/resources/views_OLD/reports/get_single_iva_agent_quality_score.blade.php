@extends('layouts.app')
@section('content')
    <!-- main content start -->
@php
    $reportLoginUserData = Auth::user();
    unset($reportLoginUserData->password);
    $reportLoginUser = $reportLoginUserData;
@endphp
<section class="main-content">
    <div class="row mt--100">
        <h1 id="totalDebtsAmount">IVA Agent Quality single Report </h1>
    </div>
         <section class="card-details">
            <div class="row mt-5">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="row">
                        <form action="{{ route('report.single_iva_agent_quality_score') }}" method="get">
                            @csrf
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <input type="text" class="date_range_picker form-control"   id="date_range" name="date_range" placeholder="Select Date:"   autocomplete="off" value="{{ request()->get('date_range') ?? '' }}" autocomplete="off" placeholder="Date">
                                            <input type="hidden" name="get_agent_name" value="{{ $get_agent_id }}">
                                            <input type="submit" name="submit" value="search" class="btn btn-bordered-primary btn-large btn-outline-info ml-3">
                                    </div>
                                </div>
                            </div>
                        </form>    
                    </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pr-0 mb-3">
                        <div class="buttons float-right float-md-left float-lg-left float-xl-right small-buttons">
                            <a href="{{ route('downloadReport.excel', ['get_single_iva_agent_quality_score' => 'get_single_iva_agent_quality_score' ,'agent_id'=>$get_agent_id]) }}" class="btn btn-outline-info btn-bordered-primary">
                                <i class="fa fa-file-excel"></i>
                                &nbsp; Export Excel</a>
                        </div>
                    </div>         
                </div>
                @include('reports.masters.__get_single_iva_agent_quality_score')
            </div>
        </section>
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