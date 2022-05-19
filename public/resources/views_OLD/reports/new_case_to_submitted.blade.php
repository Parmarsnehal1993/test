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
        <h1 id="totalDebtsAmount">New case to submitted</h1>
    </div>
    <section class="card-details">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-12">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <form action="{{ route('report.new_to_submitted_report') }}" class="mb-0">
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
                                                <a href="{{ route('report.new_to_submitted_report') }}" class="btn btn-outline-info">Clear</a>
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
                       
                        <a href="{{route('downloadReport.excel' , 'new_case_to_submitted')}}" class="btn btn-outline-info btn-bordered-primary">
                            <i class="fa fa-file-excel"></i>
                            &nbsp; Export Excel</a>
                    </div>
                </div>
            </div>
        </div>
        @include('reports.masters.__new_case_to_submitted')
    </section>
</section>

    <script type="text/javascript">
        $('#new_case_to_submitted').DataTable({searching: true, ordering: false});
    </script>
    

@endsection