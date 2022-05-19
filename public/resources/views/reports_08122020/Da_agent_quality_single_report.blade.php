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
        <h1 id="totalDebtsAmount">Da Agent Quality single Report </h1>
    </div>
            <section class="card-details">
                @foreach($allAgentDaReport as $key => $value)
                @php 
                        $getAgentName  = '';
                        $getAgentName = $key;
                @endphp

                @endforeach
                <div class="row mt-5">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row">
                            <form action="{{ route('report.Da_agent_single_quality_report') }}" method="post">
                                @csrf
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex">
                                <input type="text" class="date_range_picker form-control"   id="date_range" name="date_range" placeholder="Select Date:"   autocomplete="off" value="{{ request()->get('date_range') ?? '' }}" autocomplete="off" placeholder="Date">
                                <input type="hidden" name="get_agent_name" value="{{ $getAgentName }}">
                                <input type="submit" name="submit" value="search" class="btn btn-bordered-primary btn-large btn-outline-info ml-3">
                                <a href="#" onclick="Back()" class="btn btn-bordered-primary btn-large btn-outline-info ml-3">Back</a>
                            </div>
                            </form>
                        </div>
                    </div>
                    {{-- {{route('downloadReport.excel' , 'Debt-agent-case-report')}} --}}
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pr-0 mb-3">
                        <div class="buttons float-right float-md-left float-lg-left float-xl-right small-buttons">
                            <a href="#" class="btn btn-outline-info btn-bordered-primary">
                                <i class="fa fa-file-excel"></i>
                                &nbsp; Export Excel</a>
                        </div>
                    </div>
                   
                        
                </div>

               
                    
                @include('reports.masters.__Da_agent_quality_single_report')
   

        </section>

            

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
    <script>
    function Back() {
      window.history.back();
    }
</script>
@endsection