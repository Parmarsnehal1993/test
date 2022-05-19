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
        <h1 id="totalDebtsAmount">All Debt Advisor Cases Worked</h1>
    </div>
            <section class="card-details">
                
                <div class="row mt-5">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row">
                             <form action="{{ route('report.Da_case_report') }}" method="get">
                                    @csrf
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex">
                                         <input type="text" class="date_range_picker form-control" id="date_range" name="date_range" placeholder="Select Date:"   autocomplete="off" value="{{ request()->get('date_range') ?? '' }}" autocomplete="off" placeholder="Date">
                                         <input type="submit" name="submit" value="search" class="btn btn-bordered-primary btn-large btn-outline-info ml-3">
                                    </div>
                                   
                                </div>
                            </div>
                            </form>
                            <form action = "{{ route('report.get_ajax_Da_case_report') }}" method="post">
                        @csrf
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pr-0 mb-3 d-flex align-items-start">
                                <select class="form-control" name="agent_name" id="get_agent_name">
                                    <option>select Agent</option>
                                    @foreach($allAgent as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <input type="submit" name="submit" class="btn btn-outline-info btn-bordered-primary btn-large ml-3" value="show">

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

               
                    
                @include('reports.masters.__Debt_agent_case_report')
   

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


    {{-- <script>
        // 
        $('#get_agent_name').change(function(){
            var agent_name = $(this).text(); 
            var agent_name = 'chetan';
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : '{{    }}',
                method : 'post',
                data : {agent_name : agent_name },
                dataType : 'json',
                success : function(data){
                    alert(data);
                    if(data == '' || data == null){
                        $('#get_all_agent_data').css('display','none');
                        $('#get_ajax_agent_data').html(data);
                        $('#get_ajax_agent_data').css('display','block');
                    }
                }
            })
        });
    </script> --}}
    

@endsection