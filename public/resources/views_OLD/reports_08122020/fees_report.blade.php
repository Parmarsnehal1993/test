@extends('layouts.app')



@section('content')

    <!-- main content start -->
    <section class="main-content">
        <!-- card details start -->
    <div class="row">
        <h1 class="mt--100" id="totalDebtsAmount">Fees report Summary</h1>
    </div>
            <section class="card-details">
                
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                         <form action="{{ route('report.fees_report') }}" class="mb-0">
                                            <div class="row">
                                                <div class="col-6">
                                                <div class="form-group mb-0">
                                                <input type="text" class="date_range_picker form-control "  name="date_range" placeholder="Select Date:"   autocomplete="off" value="{{ request()->get('date_range') ?? '' }}" autocomplete="off" placeholder="Date">
                                            </div>    
                                            </div>
                                            
                                            <div class="col-6">
                                            <div class="buttons">
                                                    <button class="btn btn-outline-info">
                                                        Search
                                                    </button>
                                                    <a href="{{ route('report.fees_report') }}" class="btn btn-outline-info">Clear</a>
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
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 pt-0 pl-5 p-tb-12 mt-md-3 mt-lg-3">
                                <div class="form-group mb-0">
                                    <input type="text" name="Search" placeholder="Search" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="buttons float-right float-md-left float-lg-left float-xl-right small-buttons mt-3 mb-3">
                            <!-- <a href="{{ route('downloadReport.pdf', 'fees') }}" class="btn btn-outline-info btn-bordered-primary">
                                <i class="fa fa-file-pdf"></i>
                                &nbsp; Export PDF</a> -->
                            <a href="{{ route('downloadReport.excel', 'fees') }}" class="btn btn-outline-info btn-bordered-primary">
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

            font-weight: 700;" id="totalDebtsAmount">Fees report Summary

                    <span class="ml-1">
                        <a class="btn btn-default-outlined font-weight-bold" href="{{ route('downloadReport.pdf', 'fees') }}">
                        <i class="fa fa-file-pdf-o"></i>
                        Download pdf
                        </a>

                        
                        <a class="btn btn-default-outlined font-weight-bold" href="{{ route('downloadReport.excel', 'fees') }}">
                        <i class="fa fa-file-excel-o"></i> 
                        
                        Download Excel</a>
                    </span>

                </h3>
 --}}
                @include('reports.masters.__fees')

            </section>

            <!-- card details end -->

        </div>

    </section>

    <script>

        $('#fees_report').DataTable();

    </script>

@endsection