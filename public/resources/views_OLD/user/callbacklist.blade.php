@extends('layouts.app')

@section('content')
    <div class="main-content dmp-advisor pt-0">
        <div class="row mb-5 mt--100">
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                <div class="row align-items-center">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5">
                        <h1>
                            Reminder List
                        </h1>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-center text-danger">
                                    Overdue
                                    <div class="counter border-danger">
                                        @php
                                        $overdue = callbackOverdueCount();
                                        @endphp
                                        
                                       {{$overdue}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center text-primary">
                                    Today
                                    <div class="counter">

                                        @php
                                        $todayCount = callbackTodayCount();
                                        @endphp

                                        {{$todayCount}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center text-primary">
                                    Total
                                    <div class="counter">
                                        @php
                                        $totalCount = callbackTotalCount();
                                        @endphp
                                        
                                        {{$totalCount}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 p-0">
                        <form action="{{ route('agent.callback_list') }}" class="has-no-margin mb-0">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group mb-0">
                                        <input type="text" class="date_range_picker form-control"   name="date_range" placeholder="Select Date:"   autocomplete="off" value="{{ request()->get('date_range') ?? '' }}" autocomplete="off" placeholder="Date">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 p-0">
                                    <div class="buttons">
                                        <input type="submit" class="btn btn-outline-info" value="Search">&nbsp;
                                        <a href="{{ route('agent.callback_list') }}" class="btn btn-outline-info">Clear</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-sm-12 col-md-10 col-lg-6 col-xl-6 pl-lg-3 p-0 mt-md-3 mt-lg-0 mt-xl-0">
                        <div class="row m-0">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">
                                <div class="form-group mb-0">
                                    <input type="text" id="search" name="Date" class="form-control" placeholder="Search">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 p-0 mt-4">
                <div class="pl-3 pr-4 pt-0 pb-0">
                    <div class="row">
                        <div class="table-responsive callback-table">
                            <table id="callback_list_data" class="table search-table text-center awaiating-table">
                                <thead>
                                    <tr>
                                        <th>case no.</th>
                                        <th>User Name</th>
                                        <th>agent</th>
                                        <th>Reminder Date Time</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>      
                                    @foreach ($allCallback as $callbackKey => $callbackValue)
                                        @if(!empty($callbackValue->userNames) && empty($callbackValue->userNames->deleted_at))
                                            <tr>
                                                <td>{{ $callbackValue->userId }}</td>
                                                <td>{{ $callbackValue->userName }}</td>
                                                <td>{{ $callbackValue->user->name }}</td>
                                                <td>{{ $callbackValue->callbackDateTime }}</td>
                                                <td>{{ $callbackValue->message }}</td>
                                                <td>
                                                    <div class="buttons">
                                                        <a href="{{ route('viewUser', $callbackValue->userId) }}" class="btn btn-bordered-primary">View Case</a>
                                                        &nbsp;
                                                        &nbsp;
                                                        @if($callbackValue->is_completed == 0)
                                                            <form action="{{ route('agent.completed_callback') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" id="hiddenCallbackId" name="hiddenCallbackId" value="{{ $callbackValue->id }}">
                                                                <button type="submit" class="btn btn-bordered-primary" onclick="return confirm('Are you sure to complete this record?')">Completed</button>
                                                                &nbsp;
                                                                <a href="#" class="btn btn-bordered-primary case-btn case_status_assign" data-status="Awaiting Docs " data-userId="{{$callbackValue->id}}" data-userName="{{$callbackValue->userName}}">Awaiting Docs</a>
                                                                &nbsp;
                                                        &nbsp;
                                                            </form>
                                                        @endif
                                                        @if($callbackValue->callbackDateTime < date('Y-m-d'))
                                                            <a href="" class="btn btn-bordered-primary text-danger">Overdue</a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            var table=$('#callback_list_data').DataTable({
                "dom": '<"float-left"l><"float-right"f>rt<"row"<"col-sm-4"><"col-sm-4"><"col-sm-4"p>>',
                "lengthChange": true,
                "lengthMenu": [[10, -1], [10, "All"]],
             });

            $('#search').keyup(function(){
                table.search($(this).val()).draw() ;
            });
        });
    </script>
@endsection