
<div class="card-body d-flex align-items-center justify-content-center">
    @php
        $tempUserListSignupQuestions = collect($userListSignupQuestions)->toArray();
        $tickMarkImage = '';
    @endphp
    @if(!empty($tempUserListSignupQuestions))
        @foreach($userListSignupQuestions as $result)
            @if(!empty($userInfo->name) && !empty($userInfo->surname) && !empty($result->birthDay) && !empty($userInfo->email) && !empty($result->houseNumber) && !empty($result->address) && !empty($result->country) && !empty($userInfo->tel) && !empty($result->EmpStatus) && !empty($result->rentOrOwnHome) && ($result->child14To18 >=0) && ($result->childUnder14 >=0) && !empty($result->do_you_have_children) && !empty($result->how_long_in_job) && !empty($result->is_this_for_you_alone_or_you_and_partner) && !empty($result->where_did_you_hear_about_us) && !empty($result->birthDay))
                @php $tickMarkImage = 'images/TickMarkGreen.png'; @endphp
            @else
                @php $tickMarkImage = 'images/CrossMarkRed.png'; @endphp
            @endif
        @endforeach
    @endif
    <div class="d-flex align-items-center justify-content-center">
        <img src="{!! asset($tickMarkImage) !!}" id="personal_detail_tick_image" alt="Missing Personal Details" class="img-fluid" style="width:100px;">
    </div>
</div>
<div class="plus-sign" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#personal_detail_model">
    <img src="{!! asset('images/icons/Plus_Icon@2x.png')!!}" alt="Add" width="30">
</div>
<div id="personal_detail_model" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content card card-secondary">
                <div class="modal-header">
                    <div class="card-title">
                        Personal details
                    </div>
                    <button type="button" class="close alert_open" aria-label="Close">
                        <img
                            src="{!! asset('images/icons/Cross_Icon@2x.png')!!}"
                            alt="Close"
                            class="img-fulid"
                            width="40"
                            height="40">
                    </button>
                </div>
                @php
                    $tempUserListSignupQuestions = collect($userListSignupQuestions)->toArray();
                @endphp
                @if(!empty($tempUserListSignupQuestions))
                    @foreach($userListSignupQuestions as $result)
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            {{-- <form action="#" method="post" class="user_form">
                                                @csrf --}}
                                                {{-- <input type="hidden" name="userId" id="userId" value="{{ $userInfo->user_id }}"> --}}
                                                <div class="form-group">
                                                    <label for="f_name">First Name: <span style="color:red">*</span></label>
                                                    <input
                                                        id="f_name"
                                                        class="form-control"
                                                        type="text"
                                                        name="f_name"
                                                        placeholder="First Name" value="{{ !empty($userInfo->name) ? $userInfo->name : '' }}">
                                                </div>
                                                <div class="form-group">
                                                <label for="l_name">Last Name: <span style="color:red">*</span></label>
                                                    <input
                                                        id="l_name"
                                                        class="form-control"
                                                        type="text"
                                                        name="l_name"
                                                        placeholder="Last Name" value="{{ !empty($userInfo->surname) ? $userInfo->surname : '' }}">
                                                </div>
                                                <div class="form-group">
                                                <label for="birthDay">D.O.B.: <span style="color:red">*</span></label>
                                                    <input
                                                        type="text"
                                                        id="birthDay"
                                                        class="form-control dateofbirth_datepicker calculateAge"
                                                        name="birthDay"
                                                        placeholder="D.O.B." value="{{ !empty($result->birthDay) ? date('d/m/Y', strtotime($result->birthDay)) : '' }}">
                                                </div>
                                                <div class="form-group">
                                                <label for="email">Email: <span style="color:red">*</span></label>
                                                    <input
                                                        id="email"
                                                        class="form-control"
                                                        type="email"
                                                        name="email"
                                                        placeholder="Email" value="{{ !empty($userInfo->email) ? $userInfo->email : '' }}">
                                                </div>
                                                <div class="form-group">
                                                <label for="houseNumber">House No.:</label>
                                                    <input
                                                        id="houseNumber"
                                                        class="form-control"
                                                        type="text"
                                                        name="houseNumber"
                                                        placeholder="House No." value="{{ !empty($result->houseNumber) ? $result->houseNumber : '' }}">
                                                </div>
                                                <div class="form-group">
                                                <label for="address">Address:</label>
                                                    <input
                                                        id="address"
                                                        class="form-control"
                                                        type="text"
                                                        name="address"
                                                        placeholder="Address" value="{{ !empty($result->address) ? $result->address : '' }}">
                                                </div>
                                                <div class="form-group">
                                                <label for="country">Country: <span style="color:red">*</span></label>
                                                
                                                <select class="form-control" id="country" name="country">
                                                    
                                                   @foreach ($country as $Countrykey => $countryvalue)
                                                        @php  $selected_country = ''; @endphp
                                                        @if(isset($result->country) && !empty($result->country) && $result->country == $countryvalue->name)
                                                            @php $selected_country = 'selected'; @endphp
                                                            
                                                        @endif
                                                        <option value="{{ $countryvalue->name }}" {{ $selected_country }}>{{ $countryvalue->display_name }}</option>
                                                    @endforeach
                                                </select>
                                                    {{-- <input
                                                        id="country"
                                                        class="form-control"
                                                        type="text"
                                                        name="country"
                                                        placeholder="Country"
                                                         value="{{ !empty($result->country) ? $result->country : '' }}"> --}}
                                                </div>
                                                <div class="form-group">
                                                <label for="postCode">Postcode:</label>
                                                    <input
                                                        id="postCode"
                                                        class="form-control"
                                                        type="text"
                                                        name="postCode"
                                                        placeholder="Postcode" value="{{ !empty($result->postCode) ? $result->postCode : '' }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="mobile">Mobile: <span style="color:red">*</span></label>
                                                    <input
                                                        id="mobile"
                                                        class="form-control"
                                                        type="text"
                                                        name="mobile"
                                                        placeholder="Mobile" value="{{ !empty($userInfo->tel) ? $userInfo->tel : '' }}">
                                                </div>
                                        
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            {{-- <form action="#"> --}}
                                                <div class="form-group">
                                                <label for="EmpStatus">Employment:  <span style="color:red">*</span></label>
                                                        <select name="EmpStatus" id="EmpStatus" class="form-control">
                                                        @foreach($getEmpStatus as $getEmpStatuskey => $getEmpStatusvalue)
                                                            @php  $selected_country = '';  @endphp
                                                            @if(isset($result->EmpStatus) && !empty($result->EmpStatus) && $result->EmpStatus == $getEmpStatusvalue->name)
                                                                @php $selected_country = 'selected'; @endphp
                                                                
                                                            @endif
                                                            <option value="{{ $getEmpStatusvalue->name }}" {{ $selected_country }}>{{ $getEmpStatusvalue->display_name }}</option>
                                                        @endforeach
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                <label for="rentOrOwnHome">Living Arrangement: <span style="color:red">*</span></label>
                                                 <select id="rentOrOwnHome" name="rentOrOwnHome" class="form-control">
                                                     @foreach ($living_arrangment as $living_arrangment_key => $living_arrangment_value)
                                                        @php  $selected_country = ''; @endphp
                                                        @if(isset($result->rentOrOwnHome) && !empty($result->rentOrOwnHome) && $result->rentOrOwnHome == $living_arrangment_value)
                                                            @php $selected_country = 'selected'; @endphp
                                                            
                                                        @endif
                                                        <option value="{{ $living_arrangment_value }}" {{ $selected_country }}>{{ $living_arrangment_value }}</option>
                                                    @endforeach
                                                        
                                                    </select>    
                                                   
                                                
                                                {{-- <input
                                                        id="rentOrOwnHome"
                                                        class="form-control"
                                                        type="text"
                                                        name="rentOrOwnHome"
                                                        placeholder="Living Arrangement:" value="{{ !empty($result->rentOrOwnHome) ? $result->rentOrOwnHome : '' }}"> --}}
                                                </div>
                                                
                                                <!--<div class="form-group">
                                                <label for="haveCar">Car:</label>
                                                    <input id="haveCar" class="form-control" type="text" name="haveCar" placeholder="Car:" value="{{ !empty($result->haveCar) ? $result->haveCar : '' }}">
                                                </div>
                                                <div class="form-group">
                                                <label for="isFinanced">Is Financed:</label>
                                                    <input
                                                        id="isFinanced"
                                                        class="form-control"
                                                        type="text"
                                                        name="isFinanced"
                                                        placeholder="Is Financed:" value="{{ !empty($result->isFinanced) ? $result->isFinanced : '' }}">
                                                </div>
                                                <div class="form-group">
                                                <label for="havePets">Pet:</label>
                                                    <input id="havePets" class="form-control" type="text" name="havePets" placeholder="Pet:" value="{{ !empty($result->havePets) ? $result->havePets : '' }}">
                                                </div>-->
                                                @php
                                                    # object oriented
                                                    $age = 0;
                                                    if(!empty($result->birthDay)) {
                                                        $birthdate = date('Y-m-d', strtotime($result->birthDay));
                                                        $from = new DateTime($birthdate);
                                                        $to   = new DateTime('today');
                                                        $age = $from->diff($to)->y;
                                                    }
                                                @endphp
                                                <div class="form-group">
                                                    <label for="age">Age:</label>
                                                    <input id="age" class="form-control displayAge" type="text" placeholder="Age" value="{{ !empty($age) ? $age : '' }}" readonly disabled>
                                                </div>
                                                
                                                 <div class="form-group">
                                                    <label for="do_you_have_children">Do you have children?:</label>
                                                    <select class="form-control" id="do_you_have_children" name="do_you_have_children">
                                                       <option value="">Select any option</option>
                                                       <option value="yes" @if(isset($result->do_you_have_children) && !empty($result->do_you_have_children) && $result->do_you_have_children == 'yes') {{ 'selected=selected' }} @endif>Yes</option>
                                                       <option value="no" @if(isset($result->do_you_have_children) && !empty($result->do_you_have_children) && $result->do_you_have_children == 'no') {{ 'selected=selected' }} @endif>No</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="child14To18">Childern 14-18:</label>
                                                    <select id="child14To18" class="form-control" name="child14To18" placeholder="Childern 14-18:">
                                                        <option value="">Select any option</option>
                                                        @for($children_count= 0; $children_count <=10; $children_count++)
                                                            @php $children_count_selected = ''; @endphp

                                                            @if(isset($result->child14To18) && $result->child14To18 == $children_count)
                                                                @php $children_count_selected = 'selected=selected'; @endphp
                                                            @endif
                                                            <option value="{{ $children_count }}" {{ $children_count_selected }}>{{ $children_count }}</option>
                                                        @endfor
                                                    </select>
                                                    {{-- <input
                                                        id="child14To18"
                                                        class="form-control"
                                                        type="text"
                                                        name="child14To18"
                                                        placeholder="Childern 14-18:" value="{{ !empty($result->child14To18) ? $result->child14To18 : '' }}"> --}}
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="childUnder14">Childern under 14:</label>
                                                    <select id="childUnder14" class="form-control" name="childUnder14" placeholder="Childern 14-18:">
                                                        <option value="">Select any option</option>
                                                        @for($children_under_14_count= 0; $children_under_14_count <=10; $children_under_14_count++)

                                                            @php $children_under_count_selected = ''; @endphp
                                                            
                                                            @if(isset($result->childUnder14) && $result->childUnder14 == $children_under_14_count)
                                                                @php $children_under_count_selected = 'selected=selected'; @endphp
                                                            @endif
                                                            <option value="{{ $children_under_14_count }}" {{ $children_under_count_selected }}>{{ $children_under_14_count }}</option>
                                                        @endfor
                                                    </select>
                                                    {{-- <input
                                                        id="childUnder14"
                                                        class="form-control"
                                                        type="text"
                                                        name="childUnder14"
                                                        placeholder="Childern under 14:" value="{{ !empty($result->childUnder14) ? $result->childUnder14 : '' }}"> --}}
                                                </div>

                                               

                                                <div class="form-group">
                                                    <label for="how_long_in_job">How long in Job?:</label>
                                                    <select class="form-control" id="how_long_in_job" name="how_long_in_job">
                                                        <option value="">Select any option</option>
                                                        @php
                                                            $one_month_selected = $six_month_selected = '';
                                                            $one_year_selected = $two_year_selected = $three_year_selected = '';
                                                            $four_year_selected = $five_year_selected = $six_year_selected = '';
                                                            $seven_year_selected = $eight_year_selected = $nine_year_selected = '';
                                                            $ten_year_selected = $greater_then_ten_year_selected = '';
                                                        @endphp
                                                        @if(isset($result->how_long_in_job) && !empty($result->how_long_in_job))
                                                            @if($result->how_long_in_job == '1_month')
                                                                @php $one_month_selected = 'selected=selected'; @endphp
                                                            @elseif($result->how_long_in_job == '6_month')
                                                                @php $six_month_selected = 'selected=selected'; @endphp
                                                            @elseif($result->how_long_in_job == '1_year')
                                                                @php $one_year_selected = 'selected=selected'; @endphp
                                                            @elseif($result->how_long_in_job == '2_year')
                                                                @php $two_year_selected = 'selected=selected'; @endphp
                                                            @elseif($result->how_long_in_job == '3_year')
                                                                @php $three_year_selected = 'selected=selected'; @endphp
                                                            @elseif($result->how_long_in_job == '4_year')
                                                                @php $four_year_selected = 'selected=selected'; @endphp
                                                            @elseif($result->how_long_in_job == '5_year')
                                                                @php $five_year_selected = 'selected=selected'; @endphp
                                                            @elseif($result->how_long_in_job == '6_year')
                                                                @php $six_year_selected = 'selected=selected'; @endphp
                                                            @elseif($result->how_long_in_job == '7_year')
                                                                @php $seven_year_selected = 'selected=selected'; @endphp
                                                            @elseif($result->how_long_in_job == '8_year')
                                                                @php $eight_year_selected = 'selected=selected'; @endphp
                                                            @elseif($result->how_long_in_job == '9_year')
                                                                @php $nine_year_selected = 'selected=selected'; @endphp
                                                            @elseif($result->how_long_in_job == '10_year')
                                                                @php $ten_year_selected = 'selected=selected'; @endphp
                                                            @elseif($result->how_long_in_job == '10+')
                                                                @php $greater_then_ten_year_selected = 'selected=selected'; @endphp
                                                            @endif
                                                        @endif
                                                        <option value="1_month" {{ $one_month_selected }}>1 Month</option>
                                                        <option value="6_month" {{ $six_month_selected }}>6 Month</option>
                                                        <option value="1_year" {{ $one_year_selected }}>1 Year</option>
                                                        <option value="2_year" {{ $two_year_selected }}>2 Year</option>
                                                        <option value="3_year" {{ $three_year_selected }}>3 Year</option>
                                                        <option value="4_year" {{ $four_year_selected }}>4 Year</option>
                                                        <option value="5_year" {{ $five_year_selected }}>5 Year</option>
                                                        <option value="6_year" {{ $six_year_selected }}>6 Year</option>
                                                        <option value="7_year" {{ $seven_year_selected }}>7 Year</option>
                                                        <option value="8_year" {{ $eight_year_selected }}>8 Year</option>
                                                        <option value="9_year" {{ $nine_year_selected }}>9 Year</option>
                                                        <option value="10_year" {{ $ten_year_selected }}>10 Year</option>
                                                        <option value="10+_year" {{ $greater_then_ten_year_selected }}>10+ Year</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                <label for="Is_this_for_you_alone_or_you_and_partner">Single / Joint Solution:</label>
                                                
                                                <select class="form-control" id="Is_this_for_you_alone_or_you_and_partner" name="Is_this_for_you_alone_or_you_and_partner">
                                                    <option value="">Select any option</option>
                                                    @foreach ($singlejoin as $singlejoinkey => $singlejoinvalue)
                                                        @php  $selected_country = ''; @endphp
                                                        @if(isset($result->is_this_for_you_alone_or_you_and_partner) && !empty($result->is_this_for_you_alone_or_you_and_partner) && $result->is_this_for_you_alone_or_you_and_partner == $singlejoinvalue)
                                                            @php $selected_country = 'selected'; @endphp
                                                            
                                                        @endif
                                                        <option value="{{ $singlejoinvalue }}" {{ $selected_country }}>{{ $singlejoinvalue }}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                   
                                                </div>
                                                <div class="form-group">
                                                    <label for="where_did_you_hear_about_us">Where Did You Hear About Us?</label>
                                                    
                                                    <select class="form-control" id="where_did_you_hear_about_us" name="where_did_you_hear_about_us">
                                                        <option value="">Select any option</option>
                                                        @foreach ($aboutUs as $aboutUskey => $aboutUsvalue)
                                                            @php  $selected_country = ''; @endphp
                                                            @if(isset($result->where_did_you_hear_about_us) && !empty($result->where_did_you_hear_about_us) && $result->where_did_you_hear_about_us == $aboutUsvalue->name)
                                                                @php $selected_country = 'selected'; @endphp
                                                                
                                                            @endif
                                                            <option value="{{ $aboutUsvalue->name }}" {{ $selected_country }}>{{ $aboutUsvalue->display_name }}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                    {{-- <input
                                                        id="where_did_you_hear_about_us"
                                                        class="form-control"
                                                        type="text"
                                                        name="where_did_you_hear_about_us?"
                                                        placeholder="Where Did You Hear About Us?" value="{{ !empty($result->where_did_you_hear_about_us) ? $result->where_did_you_hear_about_us : '' }}"> --}}
                                                </div>
                                            {{--   </form> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <p style="font-size: 14px;color: #00b0ff;" class="mt-2 mb-0">
                                        Accepted T & C:
                                    </p>
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <td class="text-left pl-0">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="modal_yes" name="accepted_tearms_and_conditions_radio" class="custom-control-input" value="yes"{{ ($userInfo->is_term=='yes'
                                                        ) ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="modal_yes">yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="model_no" name="accepted_tearms_and_conditions_radio" class="custom-control-input" value="no"{{($userInfo->is_term=='no') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="model_no">no</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p style="font-size: 14px;color: #00b0ff;" class="mt-2 mb-0">
                                        Accepted Contact Information:
                                    </p>
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <td class="text-left pl-0">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input
                                                            type="radio"
                                                            id="contac_info_yes"
                                                            name="contact_info_radio"
                                                            class="custom-control-input"
                                                            value="yes" {{ ($userInfo->is_contact=='yes'
                                                        ) ? 'checked' : '' }}>
                                                        <label class="custom-control-label"  for="contac_info_yes">yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input
                                                            type="radio"
                                                            id="contac_info_no"
                                                            name="contact_info_radio"
                                                            class="custom-control-input"
                                                            value="no" {{ ($userInfo->is_contact=='no') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="contac_info_no">no</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                    <div class="form-group">
                                        <label>Assigned To : {{ $assigned_to }}</label>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Case Type : {{ $userInfo->userCaseType }}</label>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Last Login : {{ date('d-m-Y', strtotime($userInfo->lastLoginTime)) }}</label>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Device Name : {{ $userInfo->device_name }}</label>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Build Version : {{ $userInfo->build_version }}</label>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Login With : {{ !empty($userInfo->login_with) ? ucfirst($userInfo->login_with)  :  'N/A' }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="f_name">First Name: <span style="color:red">*</span></label>
                                                <input
                                                    id="f_name"
                                                    class="form-control"
                                                    type="text"
                                                    name="f_name"
                                                    placeholder="First Name"  value="{{ !empty($userInfo->name) ? $userInfo->name : '' }}">
                                            </div>
                                            <div class="form-group">
                                            <label for="l_name">Last Name: <span style="color:red">*</span></label>
                                                <input
                                                    id="l_name"
                                                    class="form-control"
                                                    type="text"
                                                    name="l_name"
                                                    placeholder="Last Name" value="{{ !empty($userInfo->surname) ? $userInfo->surname : '' }}">
                                            </div>
                                            <div class="form-group">
                                            <label for="birthDay">D.O.B.: <span style="color:red">*</span></label>
                                                <input
                                                    type="text"
                                                    id="birthDay"
                                                    class="form-control dateofbirth_datepicker calculateAge"
                                                    name="birthDay"
                                                    placeholder="D.O.B." value="">
                                            </div>
                                            <div class="form-group">
                                            <label for="email">Email: <span style="color:red">*</span></label>
                                                <input
                                                    id="email"
                                                    class="form-control"
                                                    type="email"
                                                    name="email"
                                                    placeholder="Email" value="{{ !empty($userInfo->email) ? $userInfo->email : '' }}">
                                            </div>
                                            <div class="form-group">
                                            <label for="houseNumber">House No.:</label>
                                                <input
                                                    id="houseNumber"
                                                    class="form-control"
                                                    type="text"
                                                    name="houseNumber"
                                                    placeholder="House No." value="">
                                            </div>
                                            <div class="form-group">
                                            <label for="address">Address:</label>
                                                <input
                                                    id="address"
                                                    class="form-control"
                                                    type="text"
                                                    name="address"
                                                    placeholder="Address" value="">
                                            </div>
                                            <div class="form-group">
                                            <label for="country">Country: <span style="color:red">*</span></label>
                                            <select class="form-control" id="country" name="country">
                                                <option>Select option</option>
                                                @foreach ($country as $key => $value)
                                                    <option value="{{ $value->name }}">{{ $value->display_name }}</option>
                                                @endforeach
                                            </select>   
                                            {{-- <input
                                                    id="country"
                                                    class="form-control"
                                                    type="text"
                                                    name="country"
                                                    placeholder="Country"
                                                     value=""> --}}
                                            </div>
                                            <div class="form-group">
                                            <label for="postCode">Postcode:</label>
                                                <input
                                                    id="postCode"
                                                    class="form-control"
                                                    type="text"
                                                    name="postCode"
                                                    placeholder="Postcode" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="mobile">Mobile: <span style="color:red">*</span></label>
                                                <input
                                                    id="mobile"
                                                    class="form-control"
                                                    type="text"
                                                    name="mobile"
                                                    placeholder="Mobile" value="{{ !empty($userInfo->tel) ? $userInfo->tel : '' }}">
                                            </div>
                                    
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        {{-- <form action="#"> --}}
                                            <div class="form-group">
                                            <label for="EmpStatus">Employment: <span style="color:red">*</span></label>
                                           
                                            <select name="EmpStatus" id="EmpStatus" class="form-control">
                                                <option>Select option</option>
                                                @foreach($getEmpStatus as $key => $value)
                                                    <option value="{{ $value->name }}">{{ $value->display_name }}</option>
                                                @endforeach
                                            </select>
                                                
                                            </div>
                                            <div class="form-group">
                                            <label for="rentOrOwnHome">Living Arrangement: <span style="color:red">*</span></label>
                                            <select id="rentOrOwnHome" name="rentOrOwnHome" class="form-control">
                                                <option value="">Select any option</option>
                                                @if(!empty($result->rentOrOwnHome) && isset($result->rentOrOwnHome))
                                                        <option>{{ $result->rentOrOwnHome }}</option>
                                                    @else 
                                                        <option>Select option</option>
                                                    @endif
                                                  @foreach($living_arrangment as $key => $value)
                                                    <option>{{ $value }}</option>
                                                  @endforeach
                                            </select>    
                                            
                                            </div>
                                            <!--<div class="form-group">
                                            <label for="haveCar">Car:</label>
                                                <input id="haveCar" class="form-control" type="text" name="haveCar" placeholder="Car:" value="">
                                            </div>
                                            <div class="form-group">
                                            <label for="isFinanced">Is Financed:</label>
                                                <input
                                                    id="isFinanced"
                                                    class="form-control"
                                                    type="text"
                                                    name="isFinanced"
                                                    placeholder="Is Financed:" value="">
                                            </div>
                                            <div class="form-group">
                                            <label for="havePets">Pet:</label>
                                                <input id="havePets" class="form-control" type="text" name="havePets" placeholder="Pet:" value="">
                                            </div>-->
                                            <div class="form-group">
                                                <label for="do_you_have_children">Do you have children?:</label>
                                                <select class="form-control" id="do_you_have_children" name="do_you_have_children">
                                                    <option value="">Select any option</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="child14To18">Childern 14-18:</label>
                                                <select id="child14To18" class="form-control" name="child14To18" placeholder="Childern 14-18:">
                                                    @for($children_count= 0; $children_count <=10; $children_count++)
                                                        <option value="{{ $children_count }}">{{ $children_count }}</option>
                                                    @endfor
                                                    {{-- <input id="child14To18" class="form-control" type="text" name="child14To18" placeholder="Childern 14-18:" value=""> --}}
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="childUnder14">Childern under 14:</label>
                                                <select id="childUnder14" class="form-control" name="childUnder14" placeholder="Childern 14-18:">
                                                    <option value="">Select any option</option>
                                                    @for($children_under_14_count= 0; $children_under_14_count <=10; $children_under_14_count++)
                                                        <option value="{{ $children_under_14_count }}">{{ $children_under_14_count }}</option>
                                                    @endfor
                                                    {{-- <input id="childUnder14" class="form-control" type="text" name="childUnder14" placeholder="Childern under 14:" value=""> --}}
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="how_long_in_job">How long in Job?:</label>
                                                <select class="form-control" id="how_long_in_job" name="how_long_in_job">
                                                   <option value="">Select any option</option>
                                                   <option value="1_month">1 Month</option>
                                                   <option value="6_month">6 Month</option>
                                                   <option value="1_year">1 Year</option>
                                                   <option value="2_year">2 Year</option>
                                                   <option value="3_year">3 Year</option>
                                                   <option value="4_year">4 Year</option>
                                                   <option value="5_year">5 Year</option>
                                                   <option value="6_year">6 Year</option>
                                                   <option value="7_year">7 Year</option>
                                                   <option value="8_year">8 Year</option>
                                                   <option value="9_year">9 Year</option>
                                                   <option value="10_year">10 Year</option>
                                                   <option value="10+">10+</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                            <label for="Is_this_for_you_alone_or_you_and_partner">Single / Joint Solution:</label>
                                            <select class="form-control" id="Is_this_for_you_alone_or_you_and_partner" name="Is_this_for_you_alone_or_you_and_partner">
                                                <option value="">Select any option</option>
                                                @if(!empty($result->is_this_for_you_alone_or_you_and_partner) && isset($result->is_this_for_you_alone_or_you_and_partner))
                                                        <option>{{ $result->is_this_for_you_alone_or_you_and_partner }}</option>
                                                    @else 
                                                        <option>Select option</option>
                                                    @endif
                                                @foreach ($singlejoin as $key => $value)
                                                    <option>{{ $value }}</option>
                                                @endforeach
                                            </select>    
                                           
                                            </div>
                                            <div class="form-group">
                                                <label for="where_did_you_hear_about_us">Where Did You Hear About Us?</label>
                                                 <select class="form-control" id="where_did_you_hear_about_us" name="where_did_you_hear_about_us">
                                                                <option>Select option</option>
                                                        @foreach ($aboutUs as $key => $value)
                                                            <option value="{{ $value->name }}">{{ $value->display_name }}</option>
                                                        @endforeach
                                                </select> 
                                                
                                            </div>
                                        {{--   </form> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p style="font-size: 14px;color: #00b0ff;" class="mt-2 mb-0">
                                    Accepted T & C:
                                </p>
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left pl-0">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="modal_yes" name="accepted_tearms_and_conditions_radio" class="custom-control-input" value="yes">
                                                    <label class="custom-control-label" for="modal_yes">yes</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="model_no" name="accepted_tearms_and_conditions_radio" class="custom-control-input" value="no">
                                                    <label class="custom-control-label" for="model_no">no</label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p style="font-size: 14px;color: #00b0ff;" class="mt-2 mb-0">
                                    Accepted Contact Information:
                                </p>
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left pl-0">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input
                                                        type="radio"
                                                        id="contac_info_yes"
                                                        name="contact_info_radio"
                                                        class="custom-control-input"
                                                        value="yes" {{ ($userInfo->is_contact=='yes'
                                                        ) ? 'checked' : '' }}>
                                                    <label class="custom-control-label"  for="contac_info_yes">yes</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input
                                                        type="radio"
                                                        id="contac_info_no"
                                                        name="contact_info_radio"
                                                        class="custom-control-input"
                                                        value="no" {{ ($userInfo->is_contact=='no') ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="contac_info_no">no</label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                <div class="form-group">
                                    <label>Assigned To : {{ $assigned_to }}</label>
                                </div>
                                
                                <div class="form-group">
                                    <label>Case Type : {{ $userInfo->userCaseType }}</label>
                                </div>
                                
                                <div class="form-group">
                                    <label>Last Login : {{ date('d-m-Y', strtotime($userInfo->lastLoginTime)) }}</label>
                                </div>
                                
                                <div class="form-group">
                                    <label>Device Name : {{ $userInfo->device_name }}</label>
                                </div>
                                
                                <div class="form-group">
                                    <label>Build Version : {{ $userInfo->build_version }}</label>
                                </div>
                                
                                <div class="form-group">
                                    <label>Login With : {{ !empty($userInfo->login_with) ? ucfirst($userInfo->login_with)  :  'N/A' }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="modal-body">
                </div>
                <div class="modal-footer mb-5">
                    {{-- <a href="javascipt:void(0)" class="btn btn-outline-info float-right btn-large" data-dismiss="modal" id="update">Update</a> --}}
                    <input type="submit" name="submit" value="Update" class="btn btn-outline-info float-right btn-large" data-dismiss="modal" id="update">
                </div>
                {{-- </form> --}}
            </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    
    $( ".dateofbirth_datepicker" ).datepicker(
        {
    changeMonth: true,
    changeYear: true,
    dateFormat: 'dd/mm/yy',
    yearRange: '1950:2040', 
    beforeShow: function (input, inst) {
        var rect = input.getBoundingClientRect();
        setTimeout(function () {
            inst.dpDiv.css({ top: rect.top + 40, left: rect.left + 0 });
        }, 0);
    }});
});
</script>


<script>
$(document).on('click', '#update', function(e){
    e.preventDefault();

    var userId = $('#userId').val();
    var f_name = $('#f_name').val();
    var l_name = $('#l_name').val();
    var birthDay = $('#birthDay').val();
    var email = $('#email').val();
    var houseNumber = $('#houseNumber').val();
    var address = $('#address').val();
    var country = $('#country').val();
    var postCode = $('#postCode').val();
    var EmpStatus = $('#EmpStatus').val();
    var rentOrOwnHome = $('#rentOrOwnHome').val();
    //var haveCar = $('#haveCar').val();
    //var isFinanced = $('#isFinanced').val();
    //var havePets = $('#havePets').val();
    var child14To18 = $('#child14To18').val();
    var childUnder14 = $('#childUnder14').val();
    var do_you_have_children = $('#do_you_have_children').val();
    var how_long_in_job = $('#how_long_in_job').val();
    var mobile = $('#mobile').val();
    var Is_this_for_you_alone_or_you_and_partner = $('#Is_this_for_you_alone_or_you_and_partner').val();
    var where_did_you_hear_about_us = $('#where_did_you_hear_about_us').val();
    var contact_info_radio = $('input[name="contact_info_radio"]:checked').val();
    var accepted_tearms_and_conditions_radio = $('input[name="accepted_tearms_and_conditions_radio"]:checked').val();

    //console.log('userId => ' + userId + ' f_name => '+ f_name +' l_name => '+ l_name +' birthDay => '+ birthDay +' email => '+ email +' houseNumber => '+ houseNumber +' address => '+ address +' country => '+ country +' postCode => '+ postCode +' EmpStatus => '+ EmpStatus +' rentOrOwnHome => '+ rentOrOwnHome +' haveCar => '+ haveCar +' isFinanced => '+ isFinanced +' havePets => '+ havePets +' child14To18 => '+ child14To18 +' childUnder14 => '+ childUnder14 + ' Is_this_for_you_alone_or_you_and_partner => ' +Is_this_for_you_alone_or_you_and_partner);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:'{{ route('user.update_sigunup_question') }}',
        method:'POST',
        dataType:'json',
        data:{
            "userId" : userId,
            "f_name" : f_name,
            "l_name" : l_name,
            "birthDay" : birthDay,
            "email" : email,
            "houseNumber" : houseNumber,
            "address" : address,
            "country" : country,
            "postCode" : postCode,
            "EmpStatus" : EmpStatus,
            "rentOrOwnHome" : rentOrOwnHome,
            //"haveCar" : haveCar,
            //"isFinanced" : isFinanced,
            //"havePets" : havePets,
            "child14To18" : child14To18,
            "childUnder14" : childUnder14,
            "do_you_have_children" : do_you_have_children,
            "how_long_in_job" : how_long_in_job,
            "mobile" : mobile,
            "Is_this_for_you_alone_or_you_and_partner" : Is_this_for_you_alone_or_you_and_partner,
            "where_did_you_hear_about_us" : where_did_you_hear_about_us,
            "contact_info_radio" : contact_info_radio,
            "accepted_tearms_and_conditions_radio" : accepted_tearms_and_conditions_radio
        },
        success:function(data)
        {
            var successImage = "{!! asset('images/TickMarkGreen.png') !!}";
            var errorImage = "{!! asset('images/CrossMarkRed.png') !!}";
            var messageIcon = 'error';
            if (data == 'RequiredFirstName') {
                var message = 'First Name is required';
            } else if (data == 'RequiredSurName') {
                var message = 'Last Name is required';
            } else if (data == 'RequiredMobile') {
                var message = 'Mobile Number is required';
            } else if (data == 'RequiredEmail') {
                var message = 'Email is required';
            } else if (data == 'RequiredBirthdate') {
                var message = 'Birthdate is required';
            } else if (data == 'RequiredEmployment') {
                var message = 'Employment is required';
            } else if (data == 'RequiredLivingArrangement') {
                var message = 'Livinng Arrangement is required';
            } else if (data == 'RequiredCountry') {
                var message = 'Country is required';
            } else if (data == 'success') {
                $('#personal_detail_tick_image').attr('src', successImage);
                var message = 'Data Save Successfully';
                var messageIcon = 'success';
            } else if (data == 'CrossMarkRed') {
                $('#personal_detail_tick_image').attr('src', errorImage);
                var message = 'Data Save Successfully';
                var messageIcon = 'success';
            } else {
                var message = 'something wrong please try again';
            }
            swal(message, {
              icon: messageIcon,
            });
        }
    });
});

$(document).on('change', '.calculateAge', function(){
    dob = $(this).val();
    dobDate = new Date(dob);
    nowDate = new Date();
    
    var diff = nowDate.getTime() - dobDate.getTime();
    
    var ageDate = new Date(diff); // miliseconds from epoch
    var age = Math.abs(ageDate.getUTCFullYear() - 1970);
    
    $('.displayAge').val(age);
});
</script>

