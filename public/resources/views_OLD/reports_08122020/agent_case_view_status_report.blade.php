@extends('layouts.app')



@section('content')

    <!-- main content start -->

    <section class="main-content">

        <div class="container">

            <!-- card details start -->

            <section class="card-details" style="padding: 30px;">

                <h3 style="padding-bottom: 20px;

            font-weight: 700;" id="totalDebtsAmount">Agent Case View Status Report

                    {{-- <span class="ml-1">
                        <a class="btn btn-default-outlined font-weight-bold" href="{{ route('downloadReport.pdf', 'agent_case_view_status') }}">
                        <i class="fa fa-file-pdf-o"></i>   
                        Download
                            PDF</a>
                        <a class="btn btn-default-outlined font-weight-bold" href="{{ route('downloadReport.excel', 'agent_case_view_status') }}">
                        <i class="fa fa-file-excel-o"></i>  
                        Download Excel</a>
                    </span> --}}

                    <form action="{{ route('report.agent_view_case_status_data_report') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <select class="form-control" id="agent_id" name="agent_id" required>
                                    <option value="">Select Agent</option>
                                    @foreach($allAgentList as $allAgentListKey => $allAgentListValue)
                                        <option value="{{ $allAgentListValue->id }}">{{ $allAgentListValue->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input class="form-control datepicker" type="text" name="date" id="date" required>
                            </div>
                            <div class="col-md-3">
                                <input type="submit" class="btn btn-primary" name="get_case_view_status_agent_data" value="Submit">
                            </div>
                        </div>

                    </form>

                </h3>

                @if(isset($agentData) && !empty($agentData))
                    @include('reports.masters.__agent_case_view_status')
                @endif

            </section>

            <!-- card details end -->

        </div>

    </section>

    <script>
        $(document).ready(function(){
            $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
        });

        $('#agent_case_view_status_report').DataTable({
            searching: true,
            ordering: false
        });

    </script>

@endsection