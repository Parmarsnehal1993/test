@extends('layouts.app')
@section('content')
    <section class="main-content">
        <div class="container">
            <section class="card-details" style="padding: 30px;">
                <h3 style="padding-bottom: 20px;font-weight: 700;" id="totalDebtsAmount">Agent Case View Status Report
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
               {{--  @if(isset($data['agentDetails']) && !empty($data['agentDetails']))
                <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-12">
                    <div>
                        <div class="buttons float-right float-lg-left float-md-left float-xl-right small-buttons mb-3 mt-3">     
                            <a href="{{route('downloadReport.excel' , 'agent_case_view_status')}}" class="btn btn-outline-info btn-bordered-primary">
                                <i class="fa fa-file-excel"></i>
                                &nbsp; Export Excel</a>
                        </div>
                    </div>
                </div>
                @endif --}}
                @if(isset($agentData) && !empty($agentData))
                    @include('reports.masters.__agent_case_view_status')
                @endif
            </section>
        </div>
    </section>
    <script>
        $(document).ready(function(){
            $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
        });x
        $('#agent_case_view_status_report').DataTable({
            searching: true,
            ordering: false
        });
    </script>

@endsection