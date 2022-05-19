@extends('layouts.app')

@section('content')

    <!-- main content start -->
@php
    $reportLoginUserData = Auth::user();
    unset($reportLoginUserData->password);
    $reportLoginUser = $reportLoginUserData;
@endphp
 <style>
    table, th, td {
        border: 1px solid black;
        border-spacing: 0px;
    }

</style>
<section class="main-content">
        <!-- card details start -->
    <div class="row mt--100">
        <h1 id="totalDebtsAmount">All Debt Advisor Cases Worked</h1>
    </div>
    <section class="card-details">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-12">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <form action="{{ route('report.Da_case_report') }}" class="mb-0">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group mb-0">
                                                <input type="text" class="date_range_picker form-control " name="date_range" placeholder="Select Date:" autocomplete="off" value="{{ request()->get('date_range') ?? '' }}" autocomplete="off"placeholder="Date">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="buttons">
                                                <button class="btn btn-outline-info">Search</button>
                                                <a href="{{ route('report.Da_case_report') }}" class="btn btn-outline-info">Clear</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-6 pt-0 pl-5 pl-md-3 mt-md-3">
                        <div class="form-group mb-0">
                            <form action = "{{ route('report.get_ajax_Da_case_report') }}" method="post">
                            @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <select class="form-control" name="agent_name" id="get_agent_name">
                                            <option>select Agent</option>
                                            @foreach($data['allAgent'] as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                            </select>
                                    </div>
                                    <div class="col-6">
                                        <input type="submit" name="submit" class="btn btn-outline-info btn-bordered-primary btn-large ml-3" value="show">
                                    </div> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-12">
                <div>
                    <div class="buttons float-right float-lg-left float-md-left float-xl-right small-buttons mb-3 mt-3">
                        <a href="{{route('downloadReport.excel' , 'debt_case_report')}}" class="btn btn-outline-info btn-bordered-primary"><i class="fa fa-file-excel"></i>
                        &nbsp; Export Excel</a>
                    </div>
                </div>
            </div>
        </div>
        @include('reports.masters.__debt_case_report')
    </section>

</section>
<script>
  $('#debt_case_report').DataTable({
    searching: false,
    ordering: false
  });
  $('#search').keyup(function(){
    table.search($(this).val()).draw();
  });
</script>
@endsection