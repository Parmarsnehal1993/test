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
        <h1 id="totalDebtsAmount">DMP Agent Quality Score Report Total</h1>
    </div>
            <section class="card-details">
                <div class="row mt-5">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <form action="{{ route('report.dmp_quality_average_score')}}" method="get">
                                        @csrf
                                        {{-- <input type="hidden" name="agent_new_id" value="" id="agent_new_id">
                                        <input type="hidden" name="agent_name" value="{{ $agent_name }}" id="agent_name"> --}}
                                        <div class="row">
                                            <div class="col-6">
                                            <div class="form-group d-flex">
                                            <input type="text" class="date_range_picker form-control"   id="date_range" name="date_range" placeholder="Select Date:"   autocomplete="off" value="{{ request()->get('date_range') ?? '' }}" autocomplete="off" placeholder="Date">
                                            <input type="submit" name="submit" value="search" class="btn btn-bordered-primary btn-large btn-outline-info ml-3">
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
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pr-0 mb-3">
                        <div class="buttons float-right float-md-left float-lg-left float-xl-right small-buttons">
                            <a href="{{ route('downloadReport.excel', 'get_dmp_agent_score_report_total') }}" class="btn btn-outline-info btn-bordered-primary">
                                <i class="fa fa-file-excel"></i>
                                &nbsp; Export Excel</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <form action="{{ route('report.single_dmp_quality_average_score') }}" method="post">
                            @csrf
                           <select class="form-control mb-3" name="get_da_agent" style="margin-bottom:100px;">
                            <option>Select Agent</option>
                            @foreach($data['allDmp'] as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                           </select>
                           <div class="form-group">
                               <input type="submit" name="submit" value="search" class="btn btn-outline-info btn-large">
                           </div>
                        </form>
                       </div>
                </div>
                @include('reports.masters.__get_dmp_agent_score_report_total')
        </section>
        </div>
    </section>
    <style>
        table, th, td {
            border: 1px solid black;
            border-spacing: 0px;
        }
    </style>
    <script>
        $('#advisor_send_to_drafter_case_report').DataTable({
            searching: false,
            ordering: false
        });
        $('#search').keyup(function(){
                table.search($(this).val()).draw();
            });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            
            $( ".datepicker" ).datepicker(
                {
            changeMonth: true,
            changeYear: true,
            dateFormat: 'mm/dd/yy',
            beforeShow: function (input, inst) {
                var rect = input.getBoundingClientRect();
                setTimeout(function () {
                    inst.dpDiv.css({ top: rect.top + 40, left: rect.left + 0 });
                }, 0);
            }});
        });
        </script>
    
    <script>
@endsection