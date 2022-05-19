@extends('layouts.app')
@section('content')

@if($loginUser->user_type == 3 || $loginUser->user_type == 9)
    <div class="main-content pt-0">
        <div class="row mt--70" style="margin-top:-50px;"> 
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6  p-0">
                        <div class="main-title">

                                    <h1 class="font-h1">

                                        <strong>{{ $loginUser->name }}'s Workflow</strong>

                                    </h1>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="row" style="margin-top: 35px;"></div>

                <section class="card-section">

                    <div class="row">

                        <div class="col-md-4 col-lg-4 col-xl-4">
                            @if($loginUser->user_type == 3)
                            <div class="card card-secondary" style="min-height: 625px;">

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="profile-img ml-0">

                                            <img src="{!! asset('images/ic-user-default.jpg')!!}" class="img-fluid">

                                        </div>

                                    </div>

                                </div>

                                <div class="row mt-5">

                                    <div class="col-md-12">

                                        <div class="card-title profile-title" style="font-size: 40px;">

                                            {{ dd($loginUser->name) }}

                                        </div>

                                        <div class="card-body cr-cyan">

                                            <p>

                                                <span>email:</span>

                                                <span style="text-transform: initial">{{ $loginUser->email }}</span>

                                            </p>


                                            <p>

                                                <span>password:</span>

                                                <span>{{ $loginUser->password }}</span>

                                            </p>

                                            <div class="clearfix mt-4">

                                                <a href="javascipt:void(0)" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#chnagePassword" class="btn btn-outline-info btn-large">Edit</a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                            @endif
                            @if($loginUser->user_type == 9)
                            <div class="card card-secondary">

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="profile-img ml-0 rounded-circle">

                                            <img src="{!! asset('images/ic-user-default.jpg')!!}" class="img-fluid">

                                        </div>

                                    </div>

                                </div>

                                <div class="row mt-5">

                                    <div class="col-md-12">

                                        <div class="card-title profile-title" style="font-size: 40px;">

                                            {{ $loginUser->name }}

                                        </div>

                                        <div class="card-body cr-cyan">

                                            <p>

                                                <span>email:</span>

                                                <span style="text-transform: initial">{{ $loginUser->email }}</span>

                                            </p>
                                            <p>

                                                <span>Title:</span>

                                                <span style="text-transform: initial">DMP Advisor</span>

                                            </p>

                                            <p>

                                                <span>password:</span>

                                                <span>{{ $loginUser->password }}</span>

                                            </p>

                                            <div class="clearfix mt-4">

                                                <a href="javascipt:void(0)" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#chnagePassword" class="btn btn-outline-info btn-large">Edit</a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="card card-secondary min-height-auto height-auto case-sent-section" style="margin-top: 30px;">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="text-center">
                                            Cases sent 
                                            <h1>6</h1>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="text-center">
                                            DMP sent 
                                            <h1>5</h1>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="text-center">
                                            IVA sent 
                                            <h1>1</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                        </div>

                        <div class="col-md-4 col-lg-4 col-xl-4">

                            <div class="card card-secondary" style="    min-height: 655px;">

                                <div class="card-title">

                                <?php  echo date('F'); ?> Top 5 Cases Sent

                                </div>

                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table search-table text-left awaiating-table">
                                        
                                            <thead>
                                        
                                                <tr>
                                        
                                                    <th>POS</th>
                                        
                                                    <th>Name</th>
                                        
                                                    <th>DMP</th>
                                        
                                                    <th>IVA</th>
                                        
                                                </tr>
                                        
                                            </thead>
                                        
                                            <tbody>
                                        
                                                <tr>
                                        
                                                    <td>1</td>
                                        
                                                    <td>Dave</td>
                                        
                                                    <td>6</td>
                                        
                                                    <td>6</td>
                                        
                                                </tr>
                                        
                                                <tr>
                                        
                                                    <td>2</td>
                                        
                                                    <td>Becky</td>
                                        
                                                    <td>4</td>
                                        
                                                    <td>4</td>
                                        
                                                </tr>
                                        
                                                <tr>
                                        
                                                    <td>3</td>
                                        
                                                    <td>Tim</td>
                                        
                                                    <td>3</td>
                                        
                                                    <td>3</td>
                                        
                                                </tr>
                                        
                                                <tr>
                                        
                                                    <td>4</td>
                                        
                                                    <td>Tim</td>
                                        
                                                    <td>3</td>
                                        
                                                    <td>3</td>
                                        
                                                </tr>
                                        
                                                <tr>
                                        
                                                    <td>5</td>
                                        
                                                    <td>Tim</td>
                                        
                                                    <td>4</td>
                                        
                                                    <td>1</td>
                                        
                                                </tr>
                                        
                                            </tbody>
                                        
                                        </table>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-4 col-lg-4 col-xl-4">

                            <div class="card card-secondary day-appointment" style="min-height: 625px;">

                                <div class="card-title text-center">

                                <span>
                                    Your day 
                                    <a href="{{ route('fullWeek') }}" class="btn btn-outline-info">View Full week</a>
                                </span>

                                </div>

                                <div class="card-body">
                                    <ul class="list-unstyled ap-list mt-3">
                                        <li>
                                            <div class="time">
                                                8:00 - 8:30
                                            </div>
                                            <div class="is_active">
                                                <span class="appoiment_name">Mr david Harris </span>
                                                <span> 8:00 - 9:00</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="time">
                                                8:30 - 9:00
                                            </div>
                                            <div class="is_active">
                                                <span class="appoiment_name">Mr john doe </span>
                                                <span> 8:00 - 9:00</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="time">
                                                9:00 - 9:30
                                            </div>
                                            <div class="is_inactive">
                                                <span class="appoiment_name">&nbsp;</span>
                                                <span>&nbsp;</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="time">
                                                9:30 - 10:00
                                            </div>
                                            <div class="is_active">
                                                <span class="appoiment_name">Mr chris doe</span>
                                                <span>9:30 - 10:00</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="time">
                                                10:00 - 10:30
                                            </div>
                                            <div class="is_inactive">
                                                <span class="appoiment_name">&nbsp;</span>
                                                <span>&nbsp;</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="time">
                                                10:30 - 11:00
                                            </div>
                                            <div class="is_active">
                                                <span class="appoiment_name">Mr chetan makwana</span>
                                                <span>10:30 - 11:00</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="time">
                                                8:00 - 8:30
                                            </div>
                                            <div class="is_inactive">
                                                <span class="appoiment_name">&nbsp;</span>
                                                <span>&nbsp;</span>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        <img src="{!! asset('images/icons/down_arrow.png')!!}" alt="show more" class="img-fluid" width="30" />
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </section>

            </div>



@else



<div class="main-content">

    <div class="row" style="margin-top: -15px;"></div>

    <section class="card-section">

        <div class="row">

            <div class="col-md-8 col-lg-8 col-xl-8">

                <div class="card card-secondary">

                    <div class="row mt-5">

                        <div class="col-md-3">

                            <div class="profile-img">

                                <form id="profile_image_form" class="mb-0" action="{{ route('user.upload_profile_pic') }}" method="POST" enctype="multipart/form-data">



                                    @csrf

                                    <img src="{!! isset($loginUser->profile_image) ? $loginUser->profile_image : asset('images/ic-user-default.jpg') !!}" alt="User Image" class="img-fluid">

                            </div>

                            <div class="form-group" style="margin-left: 50px;margin-top: 20px;text-align: center;">

                                    <input type="file" class="form-control" style="display: none;" name="Choose_File" id="Choose_File" placeholder="Choose File:">

                                    <label for="Choose_File" class="form-control" style="width: auto;display: inline-block;margin-bottom: 0px;">Choose File</label>
                                    
                                    <input type="submit" name="submit" value="upload" class="form-control" style="margin-top:20px;cursor:pointer;">

                                </div>

                            </form>

                        </div>

                        <div class="col-md-9">

                            <div class="card-title profile-title" style="font-size: 60px;">

                                {{ $loginUser->name }}

                            </div>

                            <div class="card-body cr-cyan">

                                <p style="text-transform:initial">

                                    <span>email:</span>

                                    <span>{{ $loginUser->email }}</span>

                                </p>

                                <!-- <p>

                                    <span>access:</span>

                                    @if($loginUser->user_type == 1)

                                    <span>{{ 'Admin' }}</span>

                                    @elseif($loginUser->user_type == 2)

                                    <span>{{ 'Agent' }}</span>

                                    @else {{ '' }}



                                    @endif

                                </p> -->

                                <p>

                                    <span>password:</span>

                                    <span>{{ $loginUser->password }}</span>

                                </p>

                                <div class="clearfix mt-5">

                                    <!--                                                <a href="{{route('changePassword')}}" class="btn btn-outline-info float-right btn-large">Change Password</a>-->

                                    <button type="button" class="btn btn-outline-info float-right" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#chnagePassword">Change Password</button>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        @if($loginUser->user_type == 1)
            <div class="row">
                <div class="col-md-8 col-lg-8 col-xl-8">
                    <div class="card">
                        <div>
                            <div class="card-title">Existing Agents</div> 
                                <h1>hello</h1>
                                <div class="row mt-5 ml-0 mr-0 theme-overflow existing_agent">
                                    <ul class="table-header align-items-center">
                                        <li>Name</li>
                                        <li>Email</li>
                                        <li>User Type</li>
                                        <li>User Status</li>
                                        <li>Edit</li>
                                    </ul>
                                @if(isset($getAgentList) && !empty($getAgentList))



                                @foreach($getAgentList as $getAgentListKey => $getAgentListValue)



                                    <ul class="table-body align-items-center">



                                        <li>{{ $getAgentListValue->name }}</li>



                                        <li style="text-transform:initial;">{{ $getAgentListValue->email }}</li>



                                        <li>
                                            @if($getAgentListValue->user_type == 1) {{ 'Admin' }}



                                            @elseif($getAgentListValue->user_type == 2) {{ 'Agent Drafter' }}



                                            @elseif($getAgentListValue->user_type == 3) {{ 'Agent Adviser' }}



                                            @elseif($getAgentListValue->user_type == 4) {{ 'Report User' }}



                                            @elseif($getAgentListValue->user_type == 5) {{ 'DMP Advisor' }}

                                            @elseif($getAgentListValue->user_type == 6) {{ 'IVA Advisor' }}

                                            @elseif($getAgentListValue->user_type == 7) {{ 'Account' }}

                                            @elseif($getAgentListValue->user_type == 8) {{'Manager' }}

                                            @elseif($getAgentListValue->user_type == 9) {{ 'Compliance manager' }}

                                            @elseif($getAgentListValue->user_type == 10) {{ 'debt solution manager' }}

                                            @elseif($getAgentListValue->user_type == 11) {{ 'Compliance Agent' }}

                                            @endif

                                        </li>



                                        <li>

                                            <a href="{{ route('agent.change_status', $getAgentListValue->id) }}" class="float-none" style="cursor: pointer;" class="" data-id="{{ $getAgentListValue->id }}" onclick="return confirm('Are you sure to make change to this record')">

                                                    @if($getAgentListValue->is_active == 0)

                                                        {{ 'Active' }}

                                                    @elseif($getAgentListValue->is_active == 1)

                                                        {{ 'Inactive' }}

                                                    @endif

                                            </a>

                                    {{-- @if($getAgentListValue->is_active == 0)

                                                        <label class="label label-danger">{{ 'Inctive' }}</label>

                                    @elseif($getAgentListValue->is_active == 1)

                                    <label class="label label-success">{{ 'Active' }}</label>

                                    @endif --}}

                                        </li>



                                        <li>



                                            <a style="cursor: pointer;" class="edit-agent" data-id="{{ $getAgentListValue->id }}" data-name="{{ $getAgentListValue->name }}" data-email="{{ $getAgentListValue->email }}" data-user_type="{{ $getAgentListValue->user_type }}" data-ip_address="{{ $getAgentListValue->ip_address }}" title="Edit"><img src="images/icons/Plus_Icon@2x.png" alt="Edit"/ class="img-fluid" width="30">

                                            </a>







                                        </li>



                                    </ul>



                                @endforeach



                             @endif



                        </div>

                    </div>

                </div>

            </div>



            <div class="col-md-4 col-lg-4 col-xl-4">

                <div class="card min-height-393">

                    <div class="card-title">

                        Add New Agent

                    </div>

                    <div class="card-body">

                        <form action="{{ route('agent.save_agent') }}" method="POST">



                            @csrf



                            <input type="hidden" id="hiddenAgentId" name="hiddenAgentId">







                            <div class="form-group">



                                <input type="text" id="name" name="name" class="form-control" placeholder="Name" required />



                            </div>



                            <div class="form-group">



                                <input type="text" id="email" name="email" class="form-control" placeholder="Email" required />



                            </div>



                            <div class="form-group">



                                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required />



                            </div>



                            <div class="form-group">



                                <input type="text" id="ip_address" name="ip_address" class="form-control" placeholder="IP Address" required pattern="((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){4}$" />



                            </div>



                            <div class="form-group">



                                <select id="user_type" name="user_type" class="form-control" placeholder="user Type" required>



                                    <option value="1">Admin</option>



                                    <option value="2">Debts Drafter</option>



                                    <option value="3">Debts Advisor</option>



                                    <option value="4">Report User</option>



                                    <option value="5">DMP Advisor</option>
                                    
                                    <option value="6">IVA advisor</option>
                                    <option value="7">Account advisor</option>
                                    <option value="8">Manager</option>
                                    <option value="9">Compliance Manager</option>



                                    {{-- <option value="2">Agent</option> --}}



                                </select>



                            </div>

                            <div class="clearfix mt-2">

                                {{-- <a href="#" class="btn btn-outline-info float-right btn-large">Save</a> --}}

                                <input type="submit" name="submit" class="btn btn-outline-info float-right btn-large">

                            </div>





                        </form>



                    </div>

                </div>

            </div>

        </div>  



    </section>



</div>







<!--   Change Password popup modal open -->





<!-- Chnage Password popup modal close--->



@endif





@endif


<div class="modal chnagePassword" id="chnagePassword" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">



            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content card card-secondary">

                    <div class="modal-header">

                        <div class="card-title">

                            Change Password

                        </div>

                        <button type="button" class="close alert_open" aria-label="Close">

                            <img src="{!! asset('images/icons/Cross_Icon@2x.png')!!}" alt="Close" class="img-fulid" width="40" height="40">

                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="row">

                                    <form action="#" method="post" class="text-center" style="width:100%">

                                        @csrf

                                        <div class="form-group">

                                            <input type="password" name="old_password" id="old_password" placeholder="Enter Old Password" class="form-control">

                                        </div>



                                        <div class="form-group">

                                            <input type="password" name="new_password" id="new_password" placeholder="Enter New Password" class="form-control">

                                        </div>



                                        <div class="form-group">

                                            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control">

                                        </div>



                                        <div class="form-group">

                                            <input type="submit" name="change_password" id="change_password" class="btn btn-outline-info">

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="modal-footer mb-5">

                        <a href="javascipt:void(0)" class="btn btn-outline-info float-right btn-large" data-dismiss="modal">Save</a>

                    </div>

                </div>

            </div>

        </div>
<script type="text/javascript">

    $(document).on('click', '.edit-agent', function() {



        var id = $(this).data('id');



        var name = $(this).data('name');



        var email = $(this).data('email');



        var user_type = $(this).data('user_type');



        var ip_address = $(this).data('ip_address');







        $('#hiddenAgentId').val(id);



        $('#name').val(name);



        $('#email').val(email);



        $('#user_type').val(user_type);



        $('#ip_address').val(ip_address);



    });







    $(document).on('click', '.edit-user', function() {



        var id = $(this).data('id');



        var name = $(this).data('name');



        var email = $(this).data('email');



        var user_type = $(this).data('user_type');







        $('#hiddenUserId').val(id);



        $('#name').val(name);



        $('#email').val(email);



        $('#user_type').val(user_type);



    });







    $(document).on('change', '#profile_image', function() {



        $('#profile_image_form').submit();



    });







    $(document).on('click', '#create_new_agent', function() {



        $('#hiddenAgentId').val('');



        $('#name').val('');



        $('#email').val('');



        $('#ip_address').val('');



    });

    

    $('#change_password').click(function(e){

            e.preventDefault();

            var old_password=$('#old_password').val();

            var new_password=$('#new_password').val();

            var confirm_password=$('#confirm_password').val();

                $.ajax({

                    

                    url:'{{ route('saveChangePassword') }}',

                    type:'post',

                    data:{_token:'{{csrf_token()}}',old_password:old_password,new_password:new_password,confirm_password:confirm_password},

                    dataType:'json',

                    success:function(data){

                        alert(data);

                    }

                });

    });

</script>



@endsection