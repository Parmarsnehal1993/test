@extends('layouts.app')

@section('content')

    <!-- main content start -->
    <div class="main-content">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5  p-0">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="date-input">
                                    <form action="{{ route('completed_list') }}"  class="form-inline" style="border: 1px solid #008dcc;border-radius: 15px;">
                                        <div class="form-group">
                                            <input type="text"  class="date_range_picker form-control border-0 col-md-3"  name="date_range" value="{{ request()->get('date_range') ?? '' }}" autocomplete="off" placeholder="Date" readonly>
                                            <button>Select Date></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <div class="entrie-input">
                                        <input type="text" name="entries" class="form-control" placeholder="Show Entries">
                                        <button>
                                            10>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 pt-0 pl-5">
                        <div class="form-group">
                            <input type="search" id="search" name="Search" placeholder="Search" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="buttons">
                <button class="btn btn-outline-info">
                    Search
                </button>
                <button class="btn btn-outline-info">
                    Clear
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 p-0 mt-4">
                <div class="card card-secondary pt-0 pb-0">
                    <div class="table-responsive">
                        <table id="appointment_list" class="table search-table text-center">
                            <thead class="table_css">
                                <tr>
                                    <th class="sorting_disabled">CASE NO.</th>
                                    <th>User Name</th>
                                    <th>AGENT</th>
                                    <th>Appointment Date Time</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allAppointment as $appointmentKey => $appointmentValue)
                                @if(!empty($appointmentValue->userNames) && empty($appointmentValue->userNames->deleted_at))
                                <tr>

                                    <td>{{ $appointmentValue->userId }}</td>
                                    
                                    <td>{{ $appointmentValue->userNames->name }}</td>
                                    
                                    <td>@if(isset($appointmentValue->user->name) && !empty($appointmentValue->user->name)) {{ $appointmentValue->user->name }} @else {{ '-' }} @endif</td>
                                    
                                    <td>{{ $appointmentValue->appointmentDate }}</td>
                                    
                                    <td>{{ $appointmentValue->message }}</td>
                                    
                                    <td>
                                     <div class="buttons"> 
                                        <a href="{{ route('viewUser', $appointmentValue->userId) }}" class="btn btn-bordered-primary ">VIEW CASE</a>
                                        
                                        {{-- <a href="#" class="btn btn-default-outlined case-btn">SOLUTION</a>
                    
                                        <a href="#" class="btn btn-default-outlined case-btn">CALENDAR</a> --}}

                                        <a href = "#" class="btn btn-bordered-primary case-btn case_status_assign" data-status="In Process" data-userId="" data-userName="">In Process</a>

                                        <a href="#" class="btn btn-bordered-primary case-btn case_status_assign" data-status="Awaiting Docs" data-userId="" data-userName="">Awaiting Docs</a>

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

    </body>
    </html>
    <!-- main content end -->

    <script type="text/javascript">
        $(document).ready(function(){
            var table=$('#appointment_list').DataTable({
                "dom": '<"float-left"l><"float-right"f>rt<"row"<"col-sm-4"><"col-sm-4"><"col-sm-4"p>>',
                "lengthChange": true,
                "lengthMenu": [[10, -1], [10, "All"]],
            });

            $('#search').keyup(function(){
                table.search($(this).val()).draw() ;
            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function()
        {
            $('input[ name="date_range"]').daterangepicker();
        });
    </script>

@endsection