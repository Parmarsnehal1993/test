@extends('layouts.app')
@section('content')

    <!-- main content start -->
@php
    $reportLoginUserData = Auth::user();
    unset($reportLoginUserData->password);
    $reportLoginUser = $reportLoginUserData;
    /*$last_id = count($data['reportDetails']);
    $start = $last_id;
    $end = $start;*/
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
                                        <form action="{{ route('get_search_download_excel') }}" class="mb-0" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group mb-0">
                                                        <input type="text" class="date_range_picker form-control " name="date_range" id="get_date_range" placeholder="Select Date:" autocomplete="off" value="{{ request()->get('date_range') ?? '' }}" autocomplete="off" placeholder="Date">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="buttons">
                                                        <input type="submit" name="submit" class="btn btn-default-outlined font-weight-bold" value="Search">
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
                                        <form action="{{ route('monthly_excel_download') }}" class="mb-0" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <select class="form-control" name="month_name" value="Download Monthly Wise">
                                                            <option>select Month</option>
                                                            @for ($m=1; $m<=12; $m++)

                                                                 <option value="{{  date('F', mktime(0,0,0,$m, 1, date('Y'))) }}  {{ date("Y",strtotime("-2 year"))  }}">{{  date('F', mktime(0,0,0,$m, 1, date('Y'))) }} 2019 </option>;
                                                            @endfor
                                                            @for ($m=1; $m<=12; $m++)
                                                                 <option value="{{  date('F', mktime(0,0,0,$m, 1, date('Y')))}}  {{ date("Y",strtotime("-1 year"))  }}">{{  date('F', mktime(0,0,0,$m, 1, date('Y'))) }} 2020 </option>;
                                                            @endfor
                                                            @for ($m=1; $m<=12; $m++)
                                                                 <option value="{{  date('F', mktime(0,0,0,$m, 1, date('Y'))) }}  {{ date("Y") }}">{{  date('F', mktime(0,0,0,$m, 1, date('Y'))) }} 2021 </option>;
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
            processing: true,
            serverSide: true,
            ajax: '{{ route('report.full_report_ajax_data') }}',
            columns: [
                { data: "Customer Name", name: "Customer Name" },
                { data: "Number", name: "Number" },
                { data: "Email", name: "Email" },
                { data: "DOB", name: "DOB" },
                { data: "Debt Level", name: "Debt Level" },
                { data: "Total Debt", name: "Total Debt" },
                { data: "Employment", name: "Employment" },
                { data: "Living Arrangements", name: "Living Arrangements" },
                { data: "Downloaded Date", name: "Downloaded Date" },
                { data: "Completed Date", name: "Completed Date" },
                { data: "Case Status", name: "Case Status" },
                { data: "Solution Type", name: "Solution Type" }
            ]
        });
       
    </script>

    
@endsection