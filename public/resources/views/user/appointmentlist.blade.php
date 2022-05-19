@extends('layouts.app')



@section('content')



<!-- main content start -->

<div class="main-content">

    <div class="row">

        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

            <div class="row">

                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6  p-0">

                    <div class="row">

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                            <form action="{{ route('agent.appointment_list') }}" class="mb-0">

                                <div class="form-group mb-0">

                                    <input type="text"  class="date_range_picker form-control"  name="date_range" placeholder="Select Date:"   autocomplete="off" value="{{ request()->get('date_range') ?? '' }}" autocomplete="off" placeholder="Date" readonly>

                                </div>

                            </form>

                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 p-0">

                            <div class="form-group mb-0 buttons">

                                <input type="submit" class="btn btn btn-outline-info font-weight-bold" value="Search">

                                <a href="{{ route('agent.appointment_list') }}" class="btn btn btn-outline-info font-weight-bold">Clear</a>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pt-0 pl-5">

                    <div class="form-group mb-0">

                        <input type="search" id="search" name="Search" placeholder="Search" class="form-control">

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-12 col-sm-12 col-md-12 p-0 mt-4">

            <div class="pl-3 pr-4 pt-0 pb-0">

                <div class="table-responsive">

                    <table id="appointment_list" class="table search-table text-center">

                        <thead class="table_css">

                            <tr>

                                <th class="sorting_disabled">case no.</th>

                                <th>User Name</th>

                                <th>agent</th>

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

                                                <a href="{{ route('viewUser', $appointmentValue->userId) }}" class="btn btn-bordered-primary ">View Case</a>

                                                {{-- <a href="#" class="btn btn-default-outlined case-btn">Solution</a>

                                                <a href="#" class="btn btn-default-outlined case-btn">CALENDAR</a> --}}

                                                @if($appointmentValue->is_completed == 0)

                                                    <form action="{{ route('agent.completed_appointment') }}" method="POST" style="display: inline;">

                                                        <input type="hidden" id="hiddenAppointmentId" name="hiddenAppointmentId" value="{{ $appointmentValue->id }}">

                                                        @csrf

                                                        <button class="btn btn-bordered-primary " onclick="return confirm('Are you sure to complete this record?')">Completed</button>

                                                    </form>

                                                @endif

                                                @if($appointmentValue->appointmentDate < date('Y-m-d'))

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

{{-- </body>

</html> --}}

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

@endsection