@extends('layouts.app')
@section('content')

{{-- <section class="main-content">
    <div class="container"> --}}
            @php
                $dashboardLoginUserData = Auth::user();
                unset($dashboardLoginUserData->password);
                $dashboardLoginUser = $dashboardLoginUserData;
            @endphp
            
            <!-- commmon error message display section start -->
            @include('layouts.message')
            <!-- commmon error message display section end -->
            
            @if($dashboardLoginUser->user_type == 1)
                @include('user.admin_statistics')
            @elseif($dashboardLoginUser->user_type == 2)
                @include('user.agent_drafter_statistics')
            @elseif($dashboardLoginUser->user_type == 3)
                @include('user.agent_advisor_statistics')
             @elseif($dashboardLoginUser->user_type == 5)
            @elseif($dashboardLoginUser->user_type == 6)
            @elseif($dashboardLoginUser->user_type == 7)
                @include('user.account_statistics')
            @elseif($dashboardLoginUser->user_type == 8)
                @include('user.manager_statistics')
             @elseif($dashboardLoginUser->user_type == 9)
                @include('user.complince_manager_statistics')
             @elseif($dashboardLoginUser->user_type == 10)
                @include('user.debt_solution_manager_statistics')
            @elseif($dashboardLoginUser->user_type == 11)
                @include('user.complince_agent_statistics')
            @endif


<script type="text/javascript">
    
    $('.columnAjax').on('click', function () {
    
             var data_text = $(this).data('type');
             
                if(data_text == 'In Process' || data_text == 'Awaiting Docs') {
                    window.location ='{{ URL::to('list/data/inProcee/awaitingDocs') }}/'+data_text;
                } else {
                    window.location ='{{ URL::to('list/data') }}/'+data_text;
                }    

            
        });
</script>


<script>
    $(document).ready(function(){
        
    var $dashboardLoginUser = <?php echo $dashboardLoginUser->user_type; ?>;
    
    if($dashboardLoginUser == 5 || $dashboardLoginUser == 6)
    {
        window.location = '{{ URL::to('agent/calender') }}';
    }
    
    
    });
    
</script>

@endsection            