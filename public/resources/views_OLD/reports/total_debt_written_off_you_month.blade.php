@extends('layouts.app')
@section('content')
    <section class="main-content">
            <div class="row">
                <h1 class="mt--100" id="totalDebtsAmount">Total Debt by written off report</h1>
            </div>
            <section class="card-details">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        
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
                            <a href="{{ route('downloadReport.excel', 'total_debt_written_off_you_month') }}" class="btn btn-outline-info btn-bordered-primary" id="add_excel_route">
                                <i class="fa fa-file-excel"></i>
                                &nbsp; Export Excel</a>
                        </div>
                    </div>
                </div>
            </section>
            @include('reports.masters.__total_debt_written_off_you_month')
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