@extends('layouts.app')
@section('content')
    <section class="main-content">
            <div class="row">
                <h1 class="mt--100" id="totalDebtsAmount">Total Debt By Type Report</h1>
            </div>
            <section class="card-details">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <form action="{{ route('report.total_debt_by_type') }}" class="mb-0">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <select class="form-control" name="month_name" id="month_name" value="Download Monthly Wise">
                                                            <option>select Month</option>
                                                            @for ($m=1; $m<=12; $m++)
                                                                 <option value="{{  date('F', mktime(0,0,0,$m, 1, date('Y'))) }}  {{ date("Y",strtotime("-2 year"))  }}">{{  date('F', mktime(0,0,0,$m, 1, date('Y'))) }} 2019 </option>;
                                                            @endfor
                                                            @for ($m=1; $m<=12; $m++)
                                                                 <option value="{{  date('F', mktime(0,0,0,$m, 1, date('Y')))}}  {{ date("Y",strtotime("-1 year"))  }}">{{  date('F', mktime(0,0,0,$m, 1, date('Y'))) }} 2020 </option>;
                                                            @endfor
                                                            @for ($m=1; $m<=12; $m++)
                                                                 <option value="{{  date('F', mktime(0,0,0,$m, 1, date('Y'))) }}  {{ date("Y") }}">{{  date('F', mktime(0,0,0,$m, 1, date('Y'))) }} 2021 </option>;
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="buttons">
                                                        <input type="submit" class="btn btn-default-outlined font-weight-bold downloadExcel" value="search">
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
                            <a href="{{ route('downloadReport.excel', 'total_debt_by_type') }}" class="btn btn-outline-info btn-bordered-primary" id="add_excel_route">
                                <i class="fa fa-file-excel"></i>
                                &nbsp; Export Excel</a>
                        </div>
                    </div>
                </div>
                @include('reports.masters.__total_debt_by_type')
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
        $(document).on('change','#month_name',function(e){
            e.preventDefault();
            var route = "";
            var monthYearName = $(this).val();
            if(monthYearName != ""){
                route = "{{ route('downloadReport.excel', 'total_debt_by_type') }},"+monthYearName;
            }else{  
                route = "{{ route('downloadReport.excel', 'total_debt_by_type') }}";
            }
            $('#add_excel_route').attr('href', route);
        });
    </script>
       
    
@endsection