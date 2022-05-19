@extends('layouts.app')
@section('content')
@php
    // dd('view file calleed');
    $dashboardLoginUserData = Auth::user();
    unset($dashboardLoginUserData->password);
    $dashboardLoginUser = $dashboardLoginUserData;
    // dd($allCasesCount['getToatlDebt']);
@endphp
 @include('layouts.message')
@php
    $loginUserData = Auth::user();
    unset($loginUserData->password);
    
    $loginUser = $loginUserData;    
@endphp

<style>
    #loader ,#loader1 , #loader2, #loader3 {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  margin : 0 auto;
  border-radius: 50%;
  width: 20px;
  height: 20px;
  animation: spin 2s linear infinite;
}

@keyframes spin {

  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.box-inner-hight{
    width: 100%;
    height: 155px !important;
}
.addtext{
    text-align: center !important;
}
h2{
    color:#004e8a !important;
}
</style>
    <!-- /sidebar end -->
    <!-- start .main-content -->
    <main class="main-content dmp-advisor">
        <!-- header -->
        <div class="row mt--100">
            <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6  p-0">
                        <div class="main-title">
                            <h1 class="font-h1">
                                @if($loginUser->user_type == 12)
                                <strong>{{ $loginUser->name }} Workflow</strong>
                                @endif
                            </h1>
                            <div style="position: relative;left: 78%;top: -39px;">
                                <form method="post" action="#">
                                    @csrf 
                                    <div class="row">
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                <select class="form-control" name="year" id="year" value="search">
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="submit" style="position:absolute;" name="submit" class="btn btn-outline-info float-right btn-large getfilter">
                                            </div>
                                        </div>  
                                    </div>
                                   
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <!-- / header -->
        <section class="card-section">
            <!-- proceess -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="row ml--30 mr-0">
                        <div class="col-md-6">
                            <div class="card section-height-auto height-auto box-inner-hight">
                                <div class="card-title font-h1" style="color:#004e8a">
                                    <strong>Total Debt</strong>
                                </div> 
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="margin: 0 auto;">
                                            <div id="loader" style="display: none;"></div>
                                            <a href="javascript:void(0)" class="statistics columnAjax d-block">
                                                <h2 class="text-bold get_total_debt" style="color:#004e8a"></h2>   
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card section-height-auto height-auto box-inner-hight">
                                <div class="card-title" style="color:#004e8a">
                                    Total Debt Written Off          
                                </div>
                                <div class="card-body">
                                    <div class="row">  
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="margin: 0 auto;">
                                            <div id="loader1" style="display: none;"></div>
                                            <a href="javascript:void(0)" class="statistics columnAjax d-block">
                                                <h2 class="text-bold get_debt_written_off" style="color:#004e8a"></h2>
                                            </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ml--30 mr-0">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="card section-height-auto height-auto box-inner-hight">
                                <div class="card-title" style="color:#004e8a">
                                    Top Debt Type                   
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="margin: 0 auto;">
                                            <div id="loader2" style="display: none;"></div>
                                           <a href="javascript:void(0)" class="statistics columnAjax d-block">
                                            <h2 class="text-bold text-center get_top_debt_type" style="color:#004e8a"></h2>
                                            </a>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <div class="card section-height-auto height-auto">
                                <div class="card-title" style="color:#004e8a">
                                   Top Debt Type Written Off
                                </div>
                                
                                <div class="card-body text-center">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="margin: 0 auto;">
                                            <h4 class="text-center">Personal loan</h4>
                                            <a href="javascript:void(0)" class="addtext">
                                                <div id="loader3" style="display: none;"></div>
                                                <h2 class="text-bold personal_load_total_debt_written_off" style="color:#004e8a"></h2>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

    <script>
        $(document).ready(function() {
            $('#loader').show();
            $('#loader1').show();
            $('#loader2').show();
            $('#loader3').show();
            getData();
        });
        function getData(year = "")
        {
        // ajax code for total debt box code start here
            $.ajax({
                url : "{{ route('get_total_debt') }}",
                method : "get",
                data : {
                    _token:"{{ csrf_token() }}",
                    year  : year
                },
                dataType : "json",
                success : function(data)
                {
                    if(data != ""){
                        $('#loader').hide();
                        $('.get_total_debt').text(data);
                        // get total debt written off code start here
                        $.ajax({
                            url : "{{ route('get_total_debt_written_off') }}",
                            method : "get",
                            data : {
                                _token:"{{ csrf_token() }}",
                                year  : year
                            },
                            dataType : "json",
                            success : function(data){
                                if(data != ""){
                                    $('#loader1').hide();
                                    $('.get_debt_written_off').text(data);
                                    // get total debt written off code end here
                                    // get top debt type code start here
                                    $.ajax({
                                        url : "{{ route('get_top_debt_type') }}",
                                        method : "get",
                                        data : {
                                            _token:"{{ csrf_token() }}",
                                            year  : year
                                        },
                                        dataType : "json",
                                        success : function(data)
                                        {
                                            if(data != ""){
                                                $('#loader2').hide();
                                                $('.get_top_debt_type').text(data);
                                                // get top debt type code end here
                                                // top debt type written off code start here
                                                $.ajax({
                                                    url : "{{ route('get_personal_load_debt_type_written_off') }}",
                                                    method : "get",
                                                    data : {
                                                        _token:"{{ csrf_token() }}",
                                                        year  : year
                                                    },
                                                    dataType : "json",
                                                    success : function(data)
                                                    {
                                                        if(data != ""){
                                                            $('#loader3').hide();
                                                            $('.personal_load_total_debt_written_off').text(data);
                                                        }
                                                    }
                                                });
                                            }
                                        }

                                    });
                                }
                            }
                        });
                    }
                    
                }
            });
        }
        $(document).on('click','.getfilter',function(e){
            e.preventDefault();
            $('#loader').show();
            $('#loader1').show();
            $('#loader2').show();
            $('#loader3').show();
            var year = $('#year').find(':selected').val();
            getData(year);
        });

    </script>
@endsection
