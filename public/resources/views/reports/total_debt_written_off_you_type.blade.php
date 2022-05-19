@extends('layouts.app') @section('content')
<section class="main-content">
    <div class="row">
        <h1 class="mt--100" id="totalDebtsAmount">Total Debt Written of you Type Report</h1>
    </div>
    <section class="card-details">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-12">
                <form id="agent_report_filter_form" action="{{ route('report.total_debt_written_off_by_type') }}" class="mb-0">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                            <select class="form-control" name="month_name_excel" id="month_name" value="Download Monthly Wise">
                                                
                                                    <option>{{ request()->get('month_name_excel') ?? 'select option' }}</option>
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
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </form>
                <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-12 p-md-0 p-lg-0">
                    <div class="buttons float-right float-lg-left float-md-left float-xl-right small-buttons mb-3 mt-3">
                       <a href="{{ route('downloadReport.excel', 'total_debt_written_off_you_type') }}" class="btn btn-outline-info btn-bordered-primary" id="add_excel_route_one"> <i class="fa fa-file-excel"></i>&nbsp; Export Excel</a>
                    </div>
                </div>
            </div>
            @include('reports.masters.__total_debt_written_off_you_type')
        </section>
    </div>
</section>

<script>
    $('#agent_report').DataTable({searching: true, ordering: false});
    $(document).on('keyup', '#Search', function(e){
        if(e.keyCode == 13) {
            $('#agent_report_filter_form').submit();
        }
    })
    $(document).ready(function(){
            var route = "";
            var monthYearName = $("#month_name").val();
            if(monthYearName != ""){
                route = "{{ route('downloadReport.excel', 'total_debt_written_off_you_type') }},"+monthYearName;
            }else{  
                route = "{{ route('downloadReport.excel', 'total_debt_written_off_you_type') }}";
            }
            $('#add_excel_route_one').attr('href', route);
    });
</script>

@endsection