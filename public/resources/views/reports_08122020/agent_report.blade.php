@extends('layouts.app') @section('content')

<!-- main content start -->

<section class="main-content">
    <!-- card details start -->
    <div class="row">
        <h1 class="mt--100" id="totalDebtsAmount">Agent Report</h1>
    </div>
    <section class="card-details">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-12">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <form action="{{ route('report.agent_report') }}" class="mb-0">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group mb-0">
                                                <input type="text" class="date_range_picker form-control " name="date_range" placeholder="Select Date:"   autocomplete="off" value="{{ request()->get('date_range') ?? '' }}" autocomplete="off"
                                                    placeholder="Date">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="buttons">
                                                <button class="btn btn-outline-info">
                                                    Search
                                                </button>
                                                <a href="{{ route('report.agent_report') }}" class="btn btn-outline-info">Clear</a>
                                                {{-- <button class="btn btn-outline-info">
                                                    Clear
                                                </button> --}}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-6 pt-0 pl-5 pl-md-3 mt-md-3">
                        <div class="form-group mb-0">
                            <input type="text" id="Search" name="Search" placeholder="Search" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-12 p-md-0 p-lg-0">
                    <div class="buttons float-right float-lg-left float-md-left float-xl-right small-buttons mb-3 mt-3">
                        <!-- <a href="{{ route('downloadReport.pdf', 'agent') }}" class="btn
                        btn-outline-info btn-bordered-primary"> <i class="fa fa-file-pdf"></i> &nbsp;
                        Export PDF</a> -->
                        <a
                            href="{{ route('downloadReport.excel', 'agent') }}"
                            class="btn btn-outline-info btn-bordered-primary">
                            <i class="fa fa-file-excel"></i>
                            &nbsp; Export Excel</a>
                    </div>
                </div>
            </div>

            {{-- <span class="ml-1">
                        <!-- <a class="btn btn-default-outlined font-weight-bold" href="{{ route('downloadReport.pdf', 'new-account') }}">
                        <i class="fa fa-file-pdf-o"></i>   
                        Download PDF</a> -->
                        
                        <a class="btn btn-default-outlined font-weight-bold" href="{{ route('downloadReport.excel', 'new-account') }}">
                        <i class="fa fa-file-excel-o"></i>    
                        Download Excel</a>
                    </span>
            --}}
            {{-- <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-12 pr-0">
                        <div class="buttons float-right small-buttons">
                            <a href="javascript:void(0)" class="btn btn-outline-info btn-bordered-primary">
                                <i class="fa fa-file-pdf"></i>
                                &nbsp; Export PDF</a>
                            <a href="javascript:void(0)" class="btn btn-outline-info btn-bordered-primary">
                                <i class="fa fa-file-excel"></i>
                                &nbsp; Export Excel</a>
                        </div>
                    </div> --}}

            {{--  <section class="main-content">

        <div class="container">
            <!-- card details start -->
            <section class="card-details" style="padding: 30px;">
                <h3 style="padding-bottom: 20px;font-weight: 700;" id="totalDebtsAmount">Agent Report
                    <span class="ml-1">
                        <a class="btn btn-default-outlined font-weight-bold" href="{{ route('downloadReport.pdf', 'agent') }}">
                        <i class="fa fa-file-pdf-o"></i>Download PDF</a>
                        <a class="btn btn-default-outlined font-weight-bold" href="{{ route('downloadReport.excel', 'agent') }}">
                        <i class="fa fa-file-excel-o"></i>  
                        Download Excel</a>
                    </span>
                </h3> --}}
            @include('reports.masters.__agent')
        </section>
        <!-- card details end -->
    </div>
</section>
<script>
    $('#agent_report').DataTable({searching: true, ordering: false});
</script>

@endsection