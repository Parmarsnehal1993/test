@extends('layouts.app')
@section('content')
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
        <h1 id="totalDebtsAmount">Individual Debt Advisor Cases Worked</h1>
    </div>
    <section class="card-details">
        <div class="row mt-5">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <form action="{{ route('report.get_ajax_Da_case_report') }}" method="post">
                                @csrf
                                    <input type="hidden" name="agent_new_id" value="" id="agent_new_id">
                                    <input type="hidden" name="agent_name" value="{{ $data['agent_id'] }}" id="agent_name">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group d-flex">
                                                <input type="text" class="date_range_picker form-control"   id="date_range" name="date_range" placeholder="Select Date:"   autocomplete="off" value="{{ request()->get('date_range') ?? '' }}" autocomplete="off" placeholder="Date">
                                                <input type="submit" name="submit" value="search" class="btn btn-bordered-primary btn-large btn-outline-info ml-3">
                                            </div>
                                        </div>
                                        <div class="col-6 pl-0">
                                            <div class="buttons form-group col-12">
                                                <a href="#" class="btn btn-outline-info">Clear</a>
                                                <a href="#" onclick="goBack()" class="btn btn-outline-info">Back</a>
                                            </div>     
                                        </div>
                                    </div>                           
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pr-0 mb-3">
                <div class="buttons float-right float-md-left float-lg-left float-xl-right   small-buttons">
                    <a href="{{ route('downloadReport.excel',['single_debt_agent_case'=>'single_debt_agent_case','agent_id' => $data['agent_id']]) }}" class="btn btn-outline-info btn-bordered-primary"><i class="fa fa-file-excel"></i>&nbsp; Export Excel</a>
                </div>
            </div>
        </div>
        @include('reports.masters.__single_debt_agent_case')
    </section>

</section>
<script type="text/javascript">
    $(document).ready(function(){
        $( ".datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'mm/dd/yy',
            beforeShow: function (input, inst) {
                var rect = input.getBoundingClientRect();
                setTimeout(function () {
                    inst.dpDiv.css({ top: rect.top + 40, left: rect.left + 0 });
                }, 0);
            }});
        });
</script>
<script>
    $('#single_debt_agent_case_report').DataTable({
        searching: false,
        ordering: false
    });
    $('#search').keyup(function(){
        table.search($(this).val()).draw();
    });
</script>
<script>
   $(document).ready(function(){
     var agent_name_get = $('.get_agent_value').text();
     $('#agent_new_id').val(agent_name_get);
   });
</script>
<script>
    function goBack() {
      window.history.back();
    }
</script>

@endsection