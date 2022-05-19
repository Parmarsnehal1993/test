@extends('layouts.app')
@section('content')

    <!-- main content start -->
@php
    $reportLoginUserData = Auth::user();
    unset($reportLoginUserData->password);
    $reportLoginUser = $reportLoginUserData;
    $last_id = count($data['reportDetails']);
    $start = $last_id;
    $end = $start;
@endphp
    <section class="main-content">
        <div class="row">
            <h1 class="mt--100">Full Report</h1>
        </div>
        <div class="container">

            <!-- card details start -->

            <section class="card-details" style="padding: 30px;">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-12">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <form action="{{ route('downloadReport.excel','full') }}" class="mb-0">
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
                                                        <input type="submit" name="submit" class="btn btn-default-outlined font-weight-bold downloadExcel" value="Download Excel">
                                                       
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
                                        <form action="{{ route('monthly_excel_download') }}" class="mb-0">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <select class="form-control" name="month_name" value="Download Monthly Wise">
                                                            <option>select Month</option>
                                                            @for ($i = 1; $i < 6; $i++) {
                                                                <option value="{{ date(', F Y', strtotime("-$i month")) }}">{{ date('F Y', strtotime("-$i month")) }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="buttons">
                                                        <input type="submit" class="btn btn-default-outlined font-weight-bold downloadExcel" value="DownloadExcel">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        

                @include('reports.masters.__full')

            </section>

            <!-- card details end -->

        </div>

    </section>

    <script>
        $('#full_report').DataTable({
            searching: true,
            ordering: false
        });

    

    </script>

    
@endsection