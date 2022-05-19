@extends('layouts.app') @section('content')
<section class="main-content">
    <!-- card details start -->
    <div class="row">
        <h1 class=" mt--100" id="totalDebtsAmount">Invoice Summary</h1>
    </div>
    <section class="card-details">
                <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-12">
                <form id="agent_report_filter_form" action="{{ route('report.invoice_report') }}" class="mb-0">
                    {{-- @csrf --}}
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group mb-0">
                                                <input type="text" class="date_range_picker form-control " name="date_range" placeholder="Select Date:" autocomplete="off" value="{{ request()->get('date_range') ?? '' }}" autocomplete="off" placeholder="Date">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="buttons">
                                                <input type="submit" class="btn btn-outline-info" value="search">
                                                <a href="{{ route('report.invoice_report') }}" class="btn btn-outline-info">Clear</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-6 pt-0 pl-5 pl-md-3 mt-md-3">
                            <div class="form-group mb-0">
                                <input type="text" name="search" placeholder="search" class="form-control" value="{{ request()->get('search') ?? '' }}">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-12 p-md-0 p-lg-0">
                    <div class="buttons float-right float-lg-left float-md-left float-xl-right small-buttons mb-3 mt-3">
                       <a href="{{ route('downloadReport.excel', 'invoice') }}" class="btn btn-outline-info btn-bordered-primary"> <i class="fa fa-file-excel"></i>&nbsp; Export Excel</a>
                    </div>
                </div>
            </div>  
            @include('reports.masters.__invoice')
        </section>
</section>

<script>

$('#invoice_report').DataTable({searching: true, ordering: false});
</script>

@endsection