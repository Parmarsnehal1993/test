@extends('layouts.app')
@section('content')
    <section class="main-content">
            <div class="row">
                <h1 class="mt--100" id="totalDebtsAmount">Solution Report Summary</h1>
            </div>
            <section class="card-details">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                         <form action="{{ route('report.solution_report') }}" class="mb-0">
                                            <div class="row">
                                                <div class="col-6">
                                                <div class="form-group mb-0">
                                                <input type="text" class="date_range_picker form-control "  name="date_range" placeholder="Select Date:"   autocomplete="off" value="{{ request()->get('date_range') ?? '' }}" autocomplete="off" placeholder="Date">
                                            </div>    
                                            </div>
                                            
                                            <div class="col-6">
                                            <div class="buttons">
                                                    <button class="btn btn-outline-info">
                                                        Search
                                                    </button>
                                                    <a href="{{ route('report.solution_report') }}" class="btn btn-outline-info">Clear</a>
                                                </div>     
                                            </div>
                                            </div>                           
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 pt-0 pl-5 p-tb-12 mt-md-3 mt-lg-3 mt-xl-0">
                                <div class="form-group mb-0">
                                    {{-- <input type="text" name="Search" placeholder="Search" class="form-control"> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="buttons float-right float-md-left float-lg-left float-xl-right small-buttons mt-3 mb-3">
                            <a href="{{ route('downloadReport.excel', 'solution') }}" class="btn btn-outline-info btn-bordered-primary">
                                <i class="fa fa-file-excel"></i>
                                &nbsp; Export Excel</a>
                        </div>
                    </div>
                </div>
                @include('reports.masters.__solution')
            </section>
    </section>
    <script>
        $('#solution_report').DataTable({
            searching: true,
            ordering: false
        });
        $(document).ready(function(){
            $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
        });
    </script>
@endsection