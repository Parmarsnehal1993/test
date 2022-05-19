@extends('layouts.app')
@section('content')

    <!-- main content start -->
@php
    $reportLoginUserData = Auth::user();
    unset($reportLoginUserData->password);
    $reportLoginUser = $reportLoginUserData;
@endphp
<style>
    table, th, td {
        border: 1px solid black;
        border-spacing: 0px;
    }
</style>
<section class="main-content">
        <!-- card details start -->
    <div class="row mt--100">
        <h1 id="totalDebtsAmount">DA Report - Single Case Conversion</h1>
    </div>
    <section class="card-details">
        @php $agent_id =  $data['singleAgentCount']['agent_id']; @endphp
        <div class="row mt-5">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <form action="{{ route('report.Da_single_report_conversion') }}" method="post">
                        @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-0">
                                        <input type="hidden" name="agent_name" value="{{ $agent_id }}">
                                        <input type="text" class="date_range_picker form-control"   id="date_range" name="date_range" placeholder="Select Date:"   autocomplete="off" value="{{ request()->get('date_range') ?? '' }}" autocomplete="off" placeholder="Date">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="buttons">
                                        <button class="btn btn-outline-info">Search</button>
                                        <a href="{{ route('report.Da_report_conversion') }}" class="btn btn-outline-info">Clear</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pr-0 mb-3">
                <div class="buttons float-right float-md-left float-lg-left float-xl-right small-buttons">
                    <a href="{{ route('downloadReport.excel',['da_single_report_conversion' => 'da_single_report_conversion' , 'agent_id' => $agent_id])}}" class="btn btn-outline-info btn-bordered-primary"><i class="fa fa-file-excel"></i>&nbsp; Export Excel</a>
                </div>
            </div>
        </div>
        @include('reports.masters.__Da_single_report_conversion')
    </section>
</section>
<script>
    $('#da_single_case_conversion').DataTable({
        searching: false,
        ordering: false
    });
    $('#search').keyup(function(){
        table.search($(this).val()).draw();
    });
</script>
@endsection