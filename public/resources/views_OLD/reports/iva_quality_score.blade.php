@extends('layouts.app')
@section('content')
@php
    $reportLoginUserData = Auth::user();
    unset($reportLoginUserData->password);
    $reportLoginUser = $reportLoginUserData;
@endphp
        <section class="main-content">
            <div class="row">
                <h1 class="mt--100" id="totalDebtsAmount">Iva quality score report</h1>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-12">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <form action="{{ route('report.iva_quality_score') }}" class="mb-0">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group mb-0">
                                                    <input
                                                        type="text"
                                                        class="date_range_picker form-control "
                                                         name="date_range" placeholder="Select Date:"   autocomplete="off"
                                                        value="{{ request()->get('date_range') ?? '' }}"
                                                        autocomplete="off"
                                                        placeholder="Date">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="buttons">
                                                    <button class="btn btn-outline-info">
                                                        Search
                                                    </button>
                                                    <a href="{{ route('report.iva_quality_score') }}" class="btn btn-outline-info">Clear</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <form action="{{ route('report.single_iva_agent_quality_score') }}" method="get">
                                        @csrf
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group mb-0">
                                                    <select class="form-control mb-3" name="get_agent_name" style="margin-bottom:100px;">
                                                        <option>Select Agent</option>
                                                    @foreach($data['allIva'] as $key => $value)
                                                        <option value="{{ $key }}">{{ $value }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="buttons">
                                                    <input type="submit" name="submit" value="search" class="btn btn-outline-info">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
    
                <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-12">
                    <div>
                        <div class="buttons float-right float-lg-left float-md-left float-xl-right small-buttons mb-3 mt-3">
                           
                            <a href="{{route('downloadReport.excel' , 'iva_quality_score')}}" class="btn btn-outline-info btn-bordered-primary">
                                <i class="fa fa-file-excel"></i>
                                &nbsp; Export Excel</a>
                        </div>
                    </div>
                </div>
            </div>
            @include('reports.masters.__iva_quality_score')
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
<style>
    table, th, td {
        border: 1px solid black;
        border-spacing: 0px;
    }
</style>
@endsection