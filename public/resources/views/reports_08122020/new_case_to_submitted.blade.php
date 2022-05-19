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
                
                <div class="row mt-5">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pr-0 mb-3">
                        <div class="buttons float-right float-md-left float-lg-left float-xl-right small-buttons">
                            <a href="{{ route('downloadReport.excel','new_case_to_submitted') }}" class="btn btn-outline-info btn-bordered-primary">
                                <i class="fa fa-file-excel"></i>
                                &nbsp; Export Excel</a>
                                
                        </div>
                    </div>  
                </div>
                @include('reports.masters.__new_case_to_submitted')
        </section>
        </div>
    </section>

    <script type="text/javascript">
        $('#new_case_to_submitted').DataTable({searching: true, ordering: false});
    </script>
    

@endsection