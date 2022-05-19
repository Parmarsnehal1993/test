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
        <h1 id="totalDebtsAmount">Advisior send to drafter case</h1>
    </div>
            <section class="card-details">
                
                <div class="row mt-5">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                         <form action="{{ route('report.advisor_send_to_drafter_case_report') }}" class="">
                                            <div class="row">
                                                <div class="col-6">
                                                <div class="form-group">
                                                <input type="text" class="date_range_picker form-control "  name="date_range" placeholder="Select Date:"   autocomplete="off" value="{{ request()->get('date_range') ?? '' }}" autocomplete="off" placeholder="Date">
                                            </div>    
                                            </div>
                                            
                                            <div class="col-6">
                                            <div class="buttons form-group col-12">

                                                    <button class="btn btn-outline-info">
                                                        Search
                                                    </button>
                                                    <a href="{{ route('report.advisor_send_to_drafter_case_report') }}" class="btn btn-outline-info">Clear</a>
                                                    {{-- <button class="btn btn-outline-info">
                                                        Clear
                                                    </button> --}}
                                                </div>     
                                            </div>
                                            </div>                           
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 pt-0 pl-5 p-tb-12">
                                <div class="form-group">
                                    <input type="text" id="search" name="Search" placeholder="Search" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pr-0 mb-3">
                        <div class="buttons float-right float-md-left float-lg-left float-xl-right   small-buttons">
                            <!-- <a href="{{ route('downloadReport.pdf', 'advisor_send_to_drafter_case') }}" class="btn btn-outline-info btn-bordered-primary">
                                <i class="fa fa-file-pdf"></i>
                                &nbsp; Export PDF</a> -->
                            <a href="{{ route('downloadReport.excel', 'advisor_send_to_drafter_case') }}" class="btn btn-outline-info btn-bordered-primary">
                                <i class="fa fa-file-excel"></i>
                                &nbsp; Export Excel</a>
                        </div>
                    </div>
                </div>
    {{-- <section class="main-content">

        <div class="container">

            <!-- card details start -->

            <section class="card-details" style="padding: 30px;">

                <h3 style="padding-bottom: 20px;

            font-weight: 700;" id="totalDebtsAmount">Full report
                    
                    @if($reportLoginUser->user_type == 1)
                    <span class="ml-1">
                        <a class="btn btn-default-outlined font-weight-bold" href="{{ route('downloadReport.pdf', 'advisor_send_to_drafter_case') }}">
                        <i class="fa fa-file-pdf-o"></i>
                        Download
                        
                            PDF</a>
                        
                        <a class="btn btn-default-outlined font-weight-bold" href="{{ route('downloadReport.excel', 'advisor_send_to_drafter_case') }}">
                        <i class="fa fa-file-excel-o"></i>
                        Download Excel</a>
                    </span>
                    @endif

                </h3> --}}

                @include('reports.masters.__advisor_send_to_drafter_case')

            </section>

            <!-- card details end -->

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