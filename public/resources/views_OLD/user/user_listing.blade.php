@extends('layouts.app')
@section('content')

@include('popup_models.user_z_case_type_change_modal')
@include('popup_models.user_view_enter_case_modal')
  
    @php
        // die(__DIR__.'/user/list_data');
        
        $loginUserData = Auth::user();
        unset($loginUserData->password);
        $loginUser = $loginUserData;
        $loginUserType = $loginUser->user_type;
    @endphp
    <main class="main-content dmp-advisor pt-0">
        <div class="row mb-5 mt--100">
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" id="content-type" style="margin-top: 60px;">
                        <h1>
                           @if($result['data_text'] == 'new_count')
                                NEW
                            @elseif($result['data_text'] == 'invoice')
                                To Be Invoiced
                            @elseif($result['data_text'] == 'Complete')
                                Invoice Paid ?
                            @else
                                {{ $result['data_text'] }}
                            @endif
                        </h1>
                    </div>
                    <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
                        <div class="row mt-4 mt-md-0 mt-lg-0 mt-xl-0">
                            <div class="col-md-4"></div>
                            <div class="col-md-4 col-6">
                                <div class="text-center text-primary">
                                    <h4>Today</h4>
                                    <div class="counter"> 
                                        {{ $result['today_count'] }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="text-center text-primary">
                                    <h4>Total</h4>
                                    <div class="counter">
                                        {{ $result['total_count'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- action="{{ route('user.user_ajax_listing') }}" --}}
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 p-0">
            <div class="row m-0">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">
                    <form class="has-no-margin"  method="GET">
                        <div class="row">
                            <div class="col-6 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                <div class="form-group">
                                    <input id="search" type="text" name="search" class="form-control search_value" placeholder="Search">
                                </div>
                            </div>
                            <div class="col-6 col-sm 12 col-md-3 col-lg-3 col-xl-3">
                                <div class="buttons">
                                    <input type="submit" class="btn btn-outline-info" id="Search_Data" name="submit" value="{{ request()->get('search') ?? 'Search' }}">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 p-0 mt-4">
                <div class="pl-3 pr-4 pt-0 pb-0">
                    <div class="table-responsive">
                        <table id="user_common_list" class="table search-table text-left awaiating-table"> 
                            <thead>
                                <tr>
                                     @php 
                                     $overdueArr = ['Awaiting Docs-overdue','In Process-overdue','iva draft-overdue','SENT TO IP-overdue','dmp draft-overdue'
                                      ,'SEND TO DMP PROVIDER-overdue','Chase Pack-overdue','Paid on MOC-overdue','No Answer IVA-overdue','Pass Back IVA-overdue',
                                      'No Answer DMP-overdue'];
                                    @endphp
                                    @if(in_array($result['data_text'] , $overdueArr))
                                        <th>Download Date</th>
                                    @else
                                        <th>Usersignindate</th>
                                    @endif
                                    <th>Status</th>
                                    <th>tel</th>
                                    <th>Case</th>
                                    <th>Username</th>
                                    <th>Agent</th>
                                    <th>Usercasetype</th>
                                    <th>Debtlevel</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('user/list_data')
    </main>
    <script type="text/javascript">
        $(document).on('click','#Search_Data',function(e){
            e.preventDefault();
            var search = $('.search_value').val();
            loadData(search);
        });
    </script>
    <script>
        $(document).ready(function(){
            loadData(search = '');
        });
        function loadData(search = ''){
             var case_status = '<?php echo $result['data_text'] ?>';
                $('#user_common_list').DataTable({
                    processing: true,
                    serverSide: true,
                    "bDestroy": true,
                    ajax : "{{ URL::to('list-ajax-data') }}/"+case_status+'/'+search,
                    columns: [
                            { data: "userSignInDate" },
                            { data: "zCaseType" },
                            { data: "tel" },
                            { data: "user_id" },
                            { data: "name"},
                            { data: "userType"},
                            { data: "userCaseType"},
                            { data: "Debtlevel"},
                            { data: "enable_text"},
                    ]
                });
                // $('#user_common_list').DataTable().ajax.reload();
        }
    </script>

    
    <script>
        $(document).on('click','.enter_view_case_btn',function(e){
            e.preventDefault();

            var case_status = $(this).data('case_status');
            var user_id = $(this).data('user_id');
            
            var view_case_route = '{{ URL::to('user/view/') }}/'+user_id;
            $('#get_view_case_route').attr('href',view_case_route);
            $('#user_view_enter_case_model').modal('show');
        });
    </script>




@endsection














