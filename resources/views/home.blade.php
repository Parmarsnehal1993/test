@extends('layouts.app')



@section('content')

    <style>
        .card {
            min-height: 345px;
        }

    </style>

    @if ($loginUser->user_type == 15 || $loginUser->user_type == 8)



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
                        @if ($loginUser->user_type == 3)
                            <div class="card card-secondary" style="min-height: 625px;">

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="profile-img ml-0">

                                            <img src="{!! asset('images/ic-user-default.jpg') !!}" class="img-fluid">

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

                                                <span>password:</span>

                                                <span>{{ $loginUser->password }}</span>

                                            </p>

                                            <div class="clearfix mt-4">

                                                <a href="javascipt:void(0)" data-toggle="modal" data-backdrop="static"
                                                    data-keyboard="false" data-target="#chnagePassword"
                                                    class="btn btn-outline-info btn-large">Edit</a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        @endif
                        @if ($loginUser->user_type == 9)
                            <div class="card card-secondary">

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="profile-img ml-0 rounded-circle">

                                            <img src="{!! asset('images/ic-user-default.jpg') !!}" class="img-fluid">

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

                                                <a href="javascipt:void(0)" data-toggle="modal" data-backdrop="static"
                                                    data-keyboard="false" data-target="#chnagePassword"
                                                    class="btn btn-outline-info btn-large">Edit</a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="card card-secondary min-height-auto height-auto case-sent-section"
                                style="margin-top: 30px;">
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



                </div>

            </section>

        </div>



    @else



        <div class="main-content">

            <div class="row" style="margin-top: -15px;"></div>

            <section class="card-section">
                @if ($loginUser->user_type == 2 || $loginUser->user_type == 5 || $loginUser->user_type == 6)
                    <div class="row">

                        <div class="col-md-8 col-lg-8 col-xl-8">

                            <div class="card card-secondary">

                                <div class="row mt-5">

                                    <div class="col-md-3">

                                        <div class="profile-img">

                                            <form id="profile_image_form" class="mb-0"
                                                action="{{ route('user.upload_profile_pic') }}" method="POST"
                                                enctype="multipart/form-data">



                                                @csrf

                                                <img src="{!! isset($loginUser->profile_image) ? $loginUser->profile_image : asset('images/ic-user-default.jpg') !!}" alt="User Image" class="img-fluid">

                                        </div>

                                        <div class="form-group"
                                            style="margin-left: 50px;margin-top: 20px;text-align: center;">

                                            <input type="file" class="form-control" style="display: none;"
                                                name="Choose_File" id="Choose_File" placeholder="Choose File:">

                                            <label for="Choose_File" class="form-control"
                                                style="width: auto;display: inline-block;margin-bottom: 0px;">Choose
                                                File</label>

                                            <input type="submit" name="submit" value="upload" class="form-control"
                                                style="margin-top:20px;cursor:pointer;">

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

                                                                                        @if ($loginUser->user_type == 1)

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

                                                <!--                                                <a href="{{ route('changePassword') }}" class="btn btn-outline-info float-right btn-large">Change Password</a>-->

                                                <button type="button" class="btn btn-outline-info float-right"
                                                    data-toggle="modal" data-backdrop="static" data-keyboard="false"
                                                    data-target="#chnagePassword">Change Password</button>

                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                @endif

                @if ($loginUser->user_type == 1 || $loginUser->user_type == 8 || $loginUser->user_type == 10 || $loginUser->user_type == 9 || $loginUser->user_type == 11)

                    <div class="row">

                        <div class="col-md-5 col-lg-5 col-xl-5">

                            <div class="card card-secondary">

                                <div class="row">
                                    <div class="col-md-5">

                                        <div class="profile-img ml-0">

                                            <img src="{!! asset('images/ic-user-default.jpg') !!}" class="img-fluid">

                                        </div>
                                    </div>

                                    <div class="col-md-7">

                                        <div class="card-title profile-title" style="font-size: 60px;">

                                            {{ $loginUser->name }}

                                        </div>
                                    </div>
                                    <div class="card-body cr-cyan mt-3">
                                        <div class="col-12">
                                            <p style="text-transform:initial"><span>email:</span>
                                                <span>{{ $loginUser->email }}</span>
                                            </p> <span>password:</span><span>{{ $loginUser->password }}</span></p>
                                        </div>
                                        <div class="clearfix mt-0">
                                            <button type="button" class="btn btn-outline-info float-right"
                                                data-toggle="modal" data-backdrop="static" data-keyboard="false"
                                                data-target="#chnagePassword">Change Password</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @if ($loginUser->user_type == 1 || $loginUser->user_type == 9 || $loginUser->user_type == 10 || $loginUser->user_type == 11)
                                <div class="card">

                                    <div class="card-title">

                                        Add New Agent

                                    </div>

                                    <div class="card-body">

                                        <form action="" method="POST">
                                            {{-- //{{ route('agent.save_agent') }} --}}
                                            @csrf
                                            <input type="hidden" id="hiddenAgentId" name="hiddenAgentId">
                                            <div class="form-group">
                                                <input type="text" id="name" name="name" class="form-control"
                                                    placeholder="Name" required />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" id="email" name="email" class="form-control"
                                                    placeholder="Email" required />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" id="password" name="password" class="form-control"
                                                    placeholder="Password" required />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" id="ip_address" name="ip_address" class="form-control"
                                                    placeholder="IP Address" required
                                                    pattern="((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){4}$" />
                                            </div>
                                            <div class="form-group">
                                                <select id="user_type" name="user_type" class="form-control"
                                                    placeholder="user Type" required>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Debts Drafter</option>
                                                    <option value="3">Debts Advisor</option>
                                                    <option value="4">Report User</option>
                                                    <option value="5">DMP Advisor</option>
                                                    <option value="6">IVA advisor</option>
                                                    <option value="7">Account advisor</option>
                                                    <option value="8">Manager</option>
                                                    <option value="9">Compliance Manager</option>
                                                    <option value="10">Debt Solution Manager</option>
                                                    <option value="11">Compliance Agent</option>
                                                    <option value="12">Marketing Agent</option>
                                                    <option value="15">Super Admin</option>
                                                    {{-- <option value="2">Agent</option> --}}
                                                </select>
                                            </div>
                                            <div class="clearfix mt-2">
                                                {{-- <a href="#" class="btn btn-outline-info float-right btn-large">Save</a> --}}
                                                <input type="submit" name="submit"
                                                    class="btn btn-outline-info float-right btn-large">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @else

                                @if ($loginUser->user_type == 8)
                                    <div class="card">
                                        <div class="card-title">
                                            @php$date = date('d');
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                $month = date('F');
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                echo 'Week' . ' ' . $date . 'th' . '  ' . $month;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            @endphp ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?>

                                            {{-- <a href="#" style="font-size:15px;margin-right:30px;" class="btn btn-primary chnageweek">Next Week</a> --}}
                                        </div>
                                        <div class="card-body">

                                            <div style="padding:10px 0px;">
                                                <div class="row">
                                                    <div
                                                        class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 small-select change-status width-auto">
                                                        <div class="d-grid fr-5">
                                                            <div
                                                                class="d-flex align-items-center align-content-center status-update text-center br-right justify-content-center">
                                                                &nbsp;
                                                            </div>
                                                            <div
                                                                class="d-flex align-items-center align-content-center status-update text-center br-right justify-content-center">
                                                                8am - 4pm
                                                            </div>
                                                            <div
                                                                class="d-flex align-items-center align-content-center status-update text-center br-right justify-content-center">
                                                                10am - 6pm
                                                            </div>
                                                            <div
                                                                class="d-flex align-items-center align-content-center status-update text-center br-right justify-content-center">
                                                                12pm - 8pm
                                                            </div>
                                                            <div
                                                                class="d-flex align-items-center align-content-center status-update text-center br-right justify-content-center">
                                                                custom
                                                            </div>
                                                        </div>
                                                        <!-- Code to displaye the calendat week dynamically start -->
                                                        @php
                                                            //$currentWeek = getCurrentWeekDates();
                                                            $allDays = getAllDays();
                                                        @endphp
                                                        @foreach ($allDays as $allDaysKey => $allDaysValue)
                                                            {{-- {{ dd($agentCalendarDetail[$getAgentListValue->id][$allDaysValue]) }} --}}
                                                            {{-- {{ dd($allIsCustomDate) }} --}}
                                                            @php $is_custom_date = false; @endphp


                                                            @if (!empty($allIsCustomDate[$loginUser->id]))
                                                                @if (in_array($allDaysValue, $allIsCustomDate[$loginUser->id]))
                                                                    @php $is_custom_date = true; @endphp
                                                                @endif
                                                            @endif

                                                            @php
                                                                $eightyFourClass = 'dot-danger'; // 8am-4pm
                                                                $oneZeoSixClass = 'dot-danger'; // 10am - 6pm
                                                                $oneTwoEightClass = 'dot-danger'; // 12pm - 8pm

                                                                if (!$is_custom_date) {
                                                                    if (isset($agentCalendarDetail[$loginUser->id][$allDaysValue]) && $agentCalendarDetail[$loginUser->id][$allDaysValue] == '84') {
                                                                        $eightyFourClass = 'dot-success';
                                                                    } else {
                                                                        $eightyFourClass = 'dot-danger';
                                                                    }

                                                                    if (isset($agentCalendarDetail[$loginUser->id][$allDaysValue]) && $agentCalendarDetail[$loginUser->id][$allDaysValue] == '106') {
                                                                        $oneZeoSixClass = 'dot-success';
                                                                    } else {
                                                                        $oneZeoSixClass = 'dot-danger';
                                                                    }

                                                                    if (isset($agentCalendarDetail[$loginUser->id][$allDaysValue]) && $agentCalendarDetail[$loginUser->id][$allDaysValue] == '128') {
                                                                        $oneTwoEightClass = 'dot-success';
                                                                    } else {
                                                                        $oneTwoEightClass = 'dot-danger';
                                                                    }
                                                                }

                                                            @endphp

                                                            @if ($loginUser->user_type == 3 || $loginUser->user_type == 5 || $loginUser->user_type == 6)
                                                            @else
                                                                <div class="d-grid fr-5">
                                                                    <div
                                                                        class="d-flex align-items-center align-content-center status-update text-center br-right justify-content-center">
                                                                        {{ ucfirst($allDaysValue) }}
                                                                    </div>
                                                                    <!-- 8am - 4pm -->
                                                                    <div
                                                                        class="d-flex align-items-center align-content-center status-update text-center br-right justify-content-center">
                                                                        <span
                                                                            class="dot {{ $eightyFourClass }} select_agent_calendar_slot slot_{{ $allDaysValue . '84' . $loginUser->id }}"
                                                                            data-selected_day="{{ $allDaysValue }}"
                                                                            data-calendar_slot="{{ $allDaysValue . '84' . $loginUser->id }}"
                                                                            data-agent_id="{{ $loginUser->id }}"
                                                                            data-date="{{ $allDaysValue }}"
                                                                            data-day="{{ $allDaysValue }}"
                                                                            data-start_time="8 am"
                                                                            data-end_time="4 pm"></span>
                                                                    </div>
                                                                    <!-- 10am - 6pm -->
                                                                    <div
                                                                        class="d-flex align-items-center align-content-center status-update text-center br-right justify-content-center">
                                                                        <span
                                                                            class="dot {{ $oneZeoSixClass }} select_agent_calendar_slot slot_{{ $allDaysValue . '106' . $loginUser->id }}"
                                                                            data-selected_day="{{ $allDaysValue }}"
                                                                            data-calendar_slot="{{ $allDaysValue . '106' . $loginUser->id }}"
                                                                            data-agent_id="{{ $loginUser->id }}"
                                                                            data-date="{{ $allDaysValue }}"
                                                                            data-day="{{ $allDaysValue }}"
                                                                            data-start_time="10 am"
                                                                            data-end_time="6 pm"></span>
                                                                    </div>
                                                                    <!-- 12pm - 8pm -->
                                                                    <div
                                                                        class="d-flex align-items-center align-content-center status-update text-center br-right justify-content-center">
                                                                        <span
                                                                            class="dot {{ $oneTwoEightClass }} select_agent_calendar_slot slot_{{ $allDaysValue . '128' . $loginUser->id }}"
                                                                            data-selected_day="{{ $allDaysValue }}"
                                                                            data-calendar_slot="{{ $allDaysValue . '128' . $loginUser->id }}"
                                                                            data-agent_id="{{ $loginUser->id }}"
                                                                            data-date="{{ $allDaysValue }}"
                                                                            data-day="{{ $allDaysValue }}"
                                                                            data-start_time="12 pm"
                                                                            data-end_time="8 pm"></span>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center align-content-center status-update text-center br-right justify-content-center">
                                                                        <select
                                                                            id="start_hour_{{ $allDaysValue . $loginUser->id }}"
                                                                            class="form-control start_custom_hour"
                                                                            placeholder="Start Hour"
                                                                            data-selected_day="{{ $allDaysValue }}"
                                                                            data-agent_id="{{ $loginUser->id }}"
                                                                            data-date="{{ $allDaysValue }}"
                                                                            data-day="{{ $allDaysValue }}">
                                                                            @php
                                                                                $splittedStartTime = '';
                                                                                $splittedEndTime = '';
                                                                                if ($is_custom_date) {
                                                                                    if (strlen($agentCalendarDetail[$loginUser->id][$allDaysValue]) == 2) {
                                                                                        $splitedTime = str_split($agentCalendarDetail[$loginUser->id][$allDaysValue]);
                                                                                    } elseif (strlen($agentCalendarDetail[$loginUser->id][$allDaysValue]) == 3 || strlen($agentCalendarDetail[$loginUser->id][$allDaysValue]) == 4) {
                                                                                        $splitedTime = str_split($agentCalendarDetail[$loginUser->id][$allDaysValue], 2);
                                                                                    }
                                                                                    $splittedStartTime = $splitedTime[0];
                                                                                    //$splittedEndTime = $splitedTime[1];
                                                                                    $tempSplittedEndTime = $splitedTime[1] . ' pm';
                                                                                    $splittedEndTime = date('H', strtotime($tempSplittedEndTime));
                                                                                }
                                                                            @endphp
                                                                            <option value="">Select Start Hour</option>
                                                                            @for ($startHour = 8; $startHour <= 20; $startHour++)
                                                                                @php
                                                                                    $selectedStartTime = '';
                                                                                @endphp

                                                                                @if ($startHour == $splittedStartTime)
                                                                                    @php $selectedStartTime = 'selected=selected'; @endphp
                                                                                @endif
                                                                                @if ($startHour >= 12)
                                                                                    @if ($startHour != 12)
                                                                                        <option
                                                                                            value="{{ $startHour - 12 . 'pm' }}"
                                                                                            {{ $selectedStartTime }}>
                                                                                            {{ $startHour - 12 . ':00' }}
                                                                                            PM</option>
                                                                                    @else
                                                                                        <option
                                                                                            value="{{ $startHour . ' pm' }}"
                                                                                            {{ $selectedStartTime }}>
                                                                                            {{ $startHour . ':00' }} PM
                                                                                        </option>
                                                                                    @endif
                                                                                @else
                                                                                    <option
                                                                                        value="{{ $startHour . ' am' }}"
                                                                                        {{ $selectedStartTime }}>
                                                                                        {{ $startHour . ':00' }} AM
                                                                                    </option>
                                                                                @endif
                                                                            @endfor
                                                                        </select>

                                                                        <select
                                                                            id="end_hour_{{ $allDaysValue . $loginUser->id }}"
                                                                            class="form-control end_custom_hour"
                                                                            placeholder="Start Hour"
                                                                            data-selected_day="{{ $allDaysValue }}"
                                                                            data-agent_id="{{ $loginUser->id }}"
                                                                            data-date="{{ $allDaysValue }}"
                                                                            data-day="{{ $allDaysValue }}">
                                                                            <option value="">Select End Hour</option>
                                                                            @for ($endHour = 8; $endHour <= 20; $endHour++)
                                                                                @php
                                                                                    $selectedEndTime = '';
                                                                                @endphp

                                                                                @if ($endHour == $splittedEndTime)
                                                                                    @php $selectedEndTime = 'selected=selected'; @endphp
                                                                                @endif
                                                                                @if ($endHour >= 12)
                                                                                    @if ($endHour != 12)
                                                                                        <option
                                                                                            value="{{ $endHour - 12 . ' pm' }}"
                                                                                            {{ $selectedEndTime }}>
                                                                                            {{ $endHour - 12 . ':00' }}
                                                                                            PM</option>
                                                                                    @else
                                                                                        <option
                                                                                            value="{{ $endHour . ' pm' }}"
                                                                                            {{ $selectedEndTime }}>
                                                                                            {{ $endHour . ':00' }} PM
                                                                                        </option>
                                                                                    @endif
                                                                                @else
                                                                                    <option value="{{ $endHour . 'am' }}"
                                                                                        {{ $selectedEndTime }}>
                                                                                        {{ $endHour . ':00' }} AM
                                                                                    </option>
                                                                                @endif
                                                                            @endfor
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                        <!-- Code to displaye the calendat week dynamically end -->
                                                        <div class="clearfix mt-4 mb-3">
                                                            <input type="submit" name="submit" data-toggle="collapse"
                                                                value="Save" data-target="#{{ $loginUser->name }}"
                                                                class="btn btn-outline-info float-right btn-large">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @else

                                @endif
                            @endif

                        </div>
                        <div class="col-md-7 col-lg-7 col-xl-7">

                            <div class="card">
                                <div>
                                    <div class="card-title">
                                        Existing Agents

                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <form action="" method="post">
                                                {{-- //{{ route('home_post') }} --}}
                                                @csrf
                                                <div class="row">
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <select class="form-control" name="getagent" required>
                                                                @if (isset($getAgent) && !empty($getAgent))
                                                                    @php
                                                                        $getUserType = getUserType($getAgent);
                                                                    @endphp
                                                                    <option value="{{ $getAgent }}">
                                                                        {{ $getUserType }}</option>
                                                                @else
                                                                    <option>Select Agent</option>
                                                                @endif
                                                                <option value="1">Admin</option>
                                                                <option value="2">Drafter</option>
                                                                <option value="3">Agent Advisior</option>
                                                                <option value="4">Report User</option>
                                                                <option value="5">DMP Advisior</option>
                                                                <option value="6">IVA Advisior</option>
                                                                <option value="7">Account</option>
                                                                <option value="8">Manager</option>
                                                                <option value="9">Compliance Manager</option>
                                                                <option value="10">Debt Solution Manager</option>
                                                                <option value="11">Compliance Agent</option>
                                                                <option value="12">Marketing Agent</option>
                                                                <option value="15">Super Admin</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <input type="submit" name="submit" class="btn btn-outline-info"
                                                                value="Submit" style="font-size: 17px;">
                                                        </div>
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
                                    </div>

                                    <div class="row mt-5 ml-0 mr-0 theme-overflow existing_agent existing_agent-admin"
                                        style="height:auto;">

                                        <ul class="table-header align-items-center">

                                            <li>

                                                Name

                                            </li>

                                            <li>Email</li>

                                            <li>User Type</li>

                                            <li>User Status</li>

                                            <li>Edit</li>

                                        </ul>



                                        @if (isset($getAgentList) && !empty($getAgentList))



                                            @foreach ($getAgentList as $getAgentListKey => $getAgentListValue)




                                                <ul class="table-body align-items-center flex-wrap">



                                                    <li>{{ $getAgentListValue->name }}</li>



                                                    <li style="text-transform:initial;">{{ $getAgentListValue->email }}
                                                    </li>



                                                    <li>



                                                        @if ($getAgentListValue->user_type == 1)
                                                            {{ 'Admin' }}



                                                        @elseif($getAgentListValue->user_type == 2)
                                                            {{ 'Agent Drafter' }}



                                                        @elseif($getAgentListValue->user_type == 3)
                                                            {{ 'Agent Adviser' }}



                                                        @elseif($getAgentListValue->user_type == 4)
                                                            {{ 'Report User' }}



                                                        @elseif($getAgentListValue->user_type == 5)
                                                            {{ 'DMP Advisor' }}

                                                        @elseif($getAgentListValue->user_type == 6)
                                                            {{ 'IVA Advisor' }}

                                                        @elseif($getAgentListValue->user_type == 7) {{ 'Account' }}

                                                        @elseif($getAgentListValue->user_type == 8) {{ 'Manager' }}

                                                        @elseif($getAgentListValue->user_type == 9)
                                                            {{ 'Compliance Manager' }}

                                                        @elseif($getAgentListValue->user_type == 10)
                                                            {{ 'Debt Solution Manager' }}

                                                        @elseif($getAgentListValue->user_type == 11)
                                                            {{ 'Compliance Agent' }}

                                                        @elseif($getAgentListValue->user_type == 12)
                                                            {{ 'Marketing Agent' }}



                                                        @else {{ '' }}



                                                        @endif



                                                    </li>



                                                    <li>

                                                        <a href="{{ route('agent.change_status', $getAgentListValue->id) }}"
                                                            class="float-none" style="cursor: pointer;"
                                                            class=""
                                                            data-id=" {{ $getAgentListValue->id }}"
                                                            onclick="return confirm('Are you sure to make change to this record')">

                                                            @if ($getAgentListValue->is_active == 1)


                                                                {{ 'Active' }}
                                                                <span class="dot dot-success"></span>

                                                            @elseif($getAgentListValue->is_active == 0)

                                                                {{ 'Inactive' }}
                                                                <span class="dot dot-danger"></span>

                                                            @endif

                                                        </a>

                                                        {{-- @if ($getAgentListValue->is_active == 0)

                                                        <label class="label label-danger">{{ 'Inctive' }}</label>

                                    @elseif($getAgentListValue->is_active == 1)

                                    <label class="label label-success">{{ 'Active' }}</label>

                                    @endif --}}

                                                    </li>



                                                    @if ($getAgentListValue->user_type == 5 || $getAgentListValue->user_type == 6)
                                                        <li>
                                                            <a style="cursor: pointer;" data-toggle="collapse"
                                                                data-target="#{{ $getAgentListValue->name }}"
                                                                title="Edit"><img src="images/icons/Plus_Icon@2x.png"
                                                                    alt="Edit" / class="img-fluid" width="30">

                                                            </a>
                                                        </li>
                                                    @else
                                                        <li></li>
                                                    @endif
                                                    <li>
                                                        <a class="edit-agent" data-id="{{ $getAgentListValue->id }}"
                                                            data-name="{{ $getAgentListValue->name }}"
                                                            data-email="{{ $getAgentListValue->email }}"
                                                            data-user_type="{{ $getAgentListValue->user_type }}"
                                                            data-ip_address="{{ $getAgentListValue->ip_address }}"><i
                                                                class="fa fa-pencil" aria-hidden="true"></a></i>
                                                    </li>
                                                    <div class="collapse width-100" id="{{ $getAgentListValue->name }}"
                                                        style="padding:0px 20px;">
                                                        <div style="padding:10px 0px;">
                                                            <div class="row">

                                                                <div
                                                                    class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 change-status">
                                                                    <div class="d-grid fr-5">
                                                                        <div
                                                                            class="d-flex align-items-center align-content-center status-update text-center br-right justify-content-center">
                                                                            &nbsp;
                                                                        </div>
                                                                        <div
                                                                            class="d-flex align-items-center align-content-center status-update text-center br-right justify-content-center">
                                                                            8am - 4pm
                                                                        </div>
                                                                        <div
                                                                            class="d-flex align-items-center align-content-center status-update text-center br-right justify-content-center">
                                                                            10am - 6pm
                                                                        </div>
                                                                        <div
                                                                            class="d-flex align-items-center align-content-center status-update text-center br-right justify-content-center">
                                                                            12pm - 8pm
                                                                        </div>
                                                                        <div
                                                                            class="d-flex align-items-center align-content-center status-update text-center br-right justify-content-center">
                                                                            custom
                                                                        </div>
                                                                    </div>
                                                                    <!-- Code to displaye the calendat week dynamically start -->
                                                                    @php
                                                                        //$currentWeek = getCurrentWeekDates();
                                                                        $allDays = getAllDays();
                                                                    @endphp
                                                                    @foreach ($allDays as $allDaysKey => $allDaysValue)
                                                                        {{-- {{ dd($agentCalendarDetail[$getAgentListValue->id][$allDaysValue]) }} --}}
                                                                        {{-- {{ dd($allIsCustomDate) }} --}}
                                                                        @php $is_custom_date = false; @endphp


                                                                        @if (!empty($allIsCustomDate[$getAgentListValue->id]))
                                                                            @if (in_array($allDaysValue, $allIsCustomDate[$getAgentListValue->id]))
                                                                                @php $is_custom_date = true; @endphp
                                                                            @endif
                                                                        @endif


                                                                        @php
                                                                            $eightyFourClass = 'dot-danger';
                                                                            $oneZeoSixClass = 'dot-danger';
                                                                            $oneTwoEightClass = 'dot-danger';

                                                                            if (!$is_custom_date) {
                                                                                if (isset($agentCalendarDetail[$getAgentListValue->id][$allDaysValue]) && $agentCalendarDetail[$getAgentListValue->id][$allDaysValue] == '84') {
                                                                                    $eightyFourClass = 'dot-success';
                                                                                } else {
                                                                                    $eightyFourClass = 'dot-danger';
                                                                                }

                                                                                if (isset($agentCalendarDetail[$getAgentListValue->id][$allDaysValue]) && $agentCalendarDetail[$getAgentListValue->id][$allDaysValue] == '106') {
                                                                                    $oneZeoSixClass = 'dot-success';
                                                                                } else {
                                                                                    $oneZeoSixClass = 'dot-danger';
                                                                                }

                                                                                if (isset($agentCalendarDetail[$getAgentListValue->id][$allDaysValue]) && $agentCalendarDetail[$getAgentListValue->id][$allDaysValue] == '128') {
                                                                                    $oneTwoEightClass = 'dot-success';
                                                                                } else {
                                                                                    $oneTwoEightClass = 'dot-danger';
                                                                                }
                                                                            }
                                                                        @endphp

                                                                        @if ($loginUser->user_type == 3 || $loginUser->user_type == 5 || $loginUser->user_type == 6)
                                                                        @else

                                                                            <div class="d-grid fr-5">
                                                                                <div
                                                                                    class="d-flex align-items-center align-content-center status-update text-center br-right justify-content-center">
                                                                                    {{ ucfirst($allDaysValue) }}
                                                                                </div>
                                                                                <!-- 8am - 4pm -->
                                                                                <div
                                                                                    class="d-flex align-items-center align-content-center status-update text-center br-right justify-content-center">
                                                                                    <span
                                                                                        class="dot {{ $eightyFourClass }} select_agent_calendar_slot slot_{{ $allDaysValue . '84' . $getAgentListValue->id }}"
                                                                                        data-selected_day="{{ $allDaysValue }}"
                                                                                        data-calendar_slot="{{ $allDaysValue . '84' . $getAgentListValue->id }}"
                                                                                        data-agent_id="{{ $getAgentListValue->id }}"
                                                                                        data-date="{{ $allDaysValue }}"
                                                                                        data-day="{{ $allDaysValue }}"
                                                                                        data-start_time="8 am"
                                                                                        data-end_time="4 pm"></span>
                                                                                </div>
                                                                                <!-- 10am - 6pm -->
                                                                                <div
                                                                                    class="d-flex align-items-center align-content-center status-update text-center br-right justify-content-center">
                                                                                    <span
                                                                                        class="dot {{ $oneZeoSixClass }} select_agent_calendar_slot slot_{{ $allDaysValue . '106' . $getAgentListValue->id }}"
                                                                                        data-selected_day="{{ $allDaysValue }}"
                                                                                        data-calendar_slot="{{ $allDaysValue . '106' . $getAgentListValue->id }}"
                                                                                        data-agent_id="{{ $getAgentListValue->id }}"
                                                                                        data-date="{{ $allDaysValue }}"
                                                                                        data-day="{{ $allDaysValue }}"
                                                                                        data-start_time="10 am"
                                                                                        data-end_time="6 pm"></span>
                                                                                </div>
                                                                                <!-- 12pm - 8pm -->
                                                                                <div
                                                                                    class="d-flex align-items-center align-content-center status-update text-center br-right justify-content-center">
                                                                                    <span
                                                                                        class="dot {{ $oneTwoEightClass }} select_agent_calendar_slot slot_{{ $allDaysValue . '128' . $getAgentListValue->id }}"
                                                                                        data-selected_day="{{ $allDaysValue }}"
                                                                                        data-calendar_slot="{{ $allDaysValue . '128' . $getAgentListValue->id }}"
                                                                                        data-agent_id="{{ $getAgentListValue->id }}"
                                                                                        data-date="{{ $allDaysValue }}"
                                                                                        data-day="{{ $allDaysValue }}"
                                                                                        data-start_time="12 pm"
                                                                                        data-end_time="8 pm"></span>
                                                                                </div>
                                                                                <div
                                                                                    class="d-flex align-items-center align-content-center status-update text-center br-right justify-content-center">
                                                                                    <select
                                                                                        id="start_hour_{{ $allDaysValue . $getAgentListValue->id }}"
                                                                                        class="form-control start_custom_hour"
                                                                                        placeholder="Start Hour"
                                                                                        data-selected_day="{{ $allDaysValue }}"
                                                                                        data-agent_id="{{ $getAgentListValue->id }}"
                                                                                        data-date="{{ $allDaysValue }}"
                                                                                        data-day="{{ $allDaysValue }}">
                                                                                        @php
                                                                                            $splittedStartTime = '';
                                                                                            $splittedEndTime = '';
                                                                                            if ($is_custom_date) {
                                                                                                if (strlen($agentCalendarDetail[$getAgentListValue->id][$allDaysValue]) == 2) {
                                                                                                    $splitedTime = str_split($agentCalendarDetail[$getAgentListValue->id][$allDaysValue]);
                                                                                                } elseif (strlen($agentCalendarDetail[$getAgentListValue->id][$allDaysValue]) == 3 || strlen($agentCalendarDetail[$getAgentListValue->id][$allDaysValue]) == 4) {
                                                                                                    $splitedTime = str_split($agentCalendarDetail[$getAgentListValue->id][$allDaysValue], 2);
                                                                                                }
                                                                                                $splittedStartTime = $splitedTime[0];
                                                                                                //$splittedEndTime = $splitedTime[1];
                                                                                                $tempSplittedEndTime = $splitedTime[1] . ' pm';
                                                                                                $splittedEndTime = date('H', strtotime($tempSplittedEndTime));
                                                                                            }
                                                                                        @endphp
                                                                                        <option value="">Select Start Hour
                                                                                        </option>
                                                                                        @for ($startHour = 8; $startHour <= 20; $startHour++)
                                                                                            @php
                                                                                                $selectedStartTime = '';
                                                                                            @endphp

                                                                                            @if ($startHour == $splittedStartTime)
                                                                                                @php $selectedStartTime = 'selected=selected'; @endphp
                                                                                            @endif
                                                                                            @if ($startHour >= 12)
                                                                                                @if ($startHour != 12)
                                                                                                    <option
                                                                                                        value="{{ $startHour - 12 . 'pm' }}"
                                                                                                        {{ $selectedStartTime }}>
                                                                                                        {{ $startHour - 12 . ':00' }}
                                                                                                        PM</option>
                                                                                                @else
                                                                                                    <option
                                                                                                        value="{{ $startHour . ' pm' }}"
                                                                                                        {{ $selectedStartTime }}>
                                                                                                        {{ $startHour . ':00' }}
                                                                                                        PM</option>
                                                                                                @endif
                                                                                            @else
                                                                                                <option
                                                                                                    value="{{ $startHour . ' am' }}"
                                                                                                    {{ $selectedStartTime }}>
                                                                                                    {{ $startHour . ':00' }}
                                                                                                    AM</option>
                                                                                            @endif
                                                                                        @endfor
                                                                                    </select>

                                                                                    <select
                                                                                        id="end_hour_{{ $allDaysValue . $getAgentListValue->id }}"
                                                                                        class="form-control end_custom_hour"
                                                                                        placeholder="Start Hour"
                                                                                        data-selected_day="{{ $allDaysValue }}"
                                                                                        data-agent_id="{{ $getAgentListValue->id }}"
                                                                                        data-date="{{ $allDaysValue }}"
                                                                                        data-day="{{ $allDaysValue }}">
                                                                                        <option value="">Select End Hour
                                                                                        </option>
                                                                                        @for ($endHour = 8; $endHour <= 20; $endHour++)
                                                                                            @php
                                                                                                $selectedEndTime = '';
                                                                                            @endphp

                                                                                            @if ($endHour == $splittedEndTime)
                                                                                                @php $selectedEndTime = 'selected=selected'; @endphp
                                                                                            @endif
                                                                                            @if ($endHour >= 12)
                                                                                                @if ($endHour != 12)
                                                                                                    <option
                                                                                                        value="{{ $endHour - 12 . ' pm' }}"
                                                                                                        {{ $selectedEndTime }}>
                                                                                                        {{ $endHour - 12 . ':00' }}
                                                                                                        PM</option>
                                                                                                @else
                                                                                                    <option
                                                                                                        value="{{ $endHour . ' pm' }}"
                                                                                                        {{ $selectedEndTime }}>
                                                                                                        {{ $endHour . ':00' }}
                                                                                                        PM</option>
                                                                                                @endif
                                                                                            @else
                                                                                                <option
                                                                                                    value="{{ $endHour . 'am' }}"
                                                                                                    {{ $selectedEndTime }}>
                                                                                                    {{ $endHour . ':00' }}
                                                                                                    AM</option>
                                                                                            @endif
                                                                                        @endfor
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        @endif

                                                                    @endforeach
                                                                    <!-- Code to displaye the calendat week dynamically end -->
                                                                    <div class="clearfix mt-4 mb-3">
                                                                        <input type="submit" name="submit"
                                                                            data-toggle="collapse" value="Save"
                                                                            data-target="#{{ $getAgentListValue->name }}"
                                                                            class="btn btn-outline-info float-right btn-large">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </ul>



                                            @endforeach



                                        @endif



                                    </div>

                                </div>

                            </div>

                            @if ($loginUser->user_type == 8)
                                <div class="card">

                                    <div class="card-title">

                                        Add New Agent

                                    </div>

                                    <div class="card-body">

                                        <form action="{{ route('agent.save_agent') }}" method="POST">
                                            @csrf
                                            <input type="hidden" id="hiddenAgentId" name="hiddenAgentId">
                                            <div class="form-group">
                                                <input type="text" id="name" name="name" class="form-control"
                                                    placeholder="Name" required />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" id="email" name="email" class="form-control"
                                                    placeholder="Email" required />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" id="password" name="password" class="form-control"
                                                    placeholder="Password" required />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" id="ip_address" name="ip_address" class="form-control"
                                                    placeholder="IP Address" required
                                                    pattern="((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){4}$" />
                                            </div>
                                            <div class="form-group">
                                                <select id="user_type" name="user_type" class="form-control"
                                                    placeholder="user Type" required>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Debts Drafter</option>
                                                    <option value="3">Debts Advisor</option>
                                                    <option value="4">Report User</option>
                                                    <option value="5">DMP Advisor</option>
                                                    <option value="6">IVA advisor</option>
                                                    <option value="7">Account advisor</option>
                                                    <option value="8">Manager</option>
                                                    <option value="9">Compliance Manager</option>
                                                    <option value="10">Debt Solution Manager</option>
                                                    <option value="11">Compliance Agent</option>
                                                    <option value="12">Marketing Agent</option>
                                                    {{-- <option value="2">Agent</option> --}}
                                                </select>
                                            </div>
                                            <div class="clearfix mt-2">
                                                {{-- <a href="#" class="btn btn-outline-info float-right btn-large">Save</a> --}}
                                                <input type="submit" name="submit"
                                                    class="btn btn-outline-info float-right btn-large">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endif

                        </div>

                    </div>



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

                        <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">

                    </button>

                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="row">

                                <form action="#" method="post" class="text-center" style="width:100%">

                                    @csrf

                                    <div class="form-group">

                                        <input type="password" name="old_password" id="old_password"
                                            placeholder="Enter Old Password" class="form-control">

                                    </div>



                                    <div class="form-group">

                                        <input type="password" name="new_password" id="new_password"
                                            placeholder="Enter New Password" class="form-control">

                                    </div>



                                    <div class="form-group">

                                        <input type="password" name="confirm_password" id="confirm_password"
                                            placeholder="Confirm Password" class="form-control">

                                    </div>



                                    <div class="form-group">

                                        <input type="submit" name="change_password" id="change_password"
                                            class="btn btn-outline-info">

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="modal-footer mb-5">

                    <a href="javascipt:void(0)" class="btn btn-outline-info float-right btn-large"
                        data-dismiss="modal">Save</a>

                </div>

            </div>

        </div>

    </div>


    <!----debts advisior add agent code start here -->

    <div class="modal chnagePassword" id="add_new_user" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">


        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content card card-secondary">

                <div class="modal-header">

                    <div class="card-title">

                        Add Agent

                    </div>

                    <button type="button" class="close alert_open" aria-label="Close">

                        <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">

                    </button>

                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="row">

                                <form action="#" method="POST">
                                    @csrf
                                    <input type="hidden" id="hiddenAgentId" name="hiddenAgentId">
                                    <div class="form-group">
                                        <input type="text" id="name_user" name="name" class="form-control"
                                            placeholder="Name" required />
                                        <input type="hidden" id="get_ajax_call" name="get_ajax_call" value="yes">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="email_user" name="email" class="form-control"
                                            placeholder="Email" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="password_user" name="password" class="form-control"
                                            placeholder="Password" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="ip_address_user" name="ip_address" class="form-control"
                                            placeholder="IP Address" required
                                            pattern="((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){4}$" />
                                    </div>
                                    <div class="form-group">
                                        @if ($loginUser->user_type == 1)
                                            <select id="user_type_add_user" name="user_type" class="form-control"
                                                placeholder="user Type" required>
                                                <option value="1">Admin</option>
                                                <option value="2">Debts Drafter</option>
                                                <option value="3">Debts Advisor</option>
                                                <option value="4">Report User</option>
                                                <option value="5">DMP Advisor</option>
                                                <option value="6">IVA advisor</option>
                                                <option value="7">Account advisor</option>
                                                <option value="8">Manager</option>
                                                <option value="9">Compliance Manager</option>
                                                <option value="10">Debt Solution Manager</option>
                                                <option value="11">Compliance Agent</option>
                                            </select>
                                        @elseif($loginUser->user_type == 8)
                                            <select id="user_type_add_user" name="user_type" class="form-control"
                                                placeholder="user Type" required>
                                                <option value="3">Debts Advisor</option>
                                            </select>
                                        @elseif($loginUser->user_type == 9)
                                            <select id="user_type_add_user" name="user_type" class="form-control"
                                                placeholder="user Type" required>
                                                <option value="11">Compliance Agent</option>
                                            </select>
                                        @elseif($loginUser->user_type == 10)
                                            <select id="user_type_add_user" name="user_type" class="form-control"
                                                placeholder="user Type" required>
                                                <option value="5">DMP Advisor</option>
                                                <option value="6">IVA advisor</option>
                                            </select>
                                        @endif
                                    </div>

                                    <div class="clearfix mt-2">

                                        {{-- <a href="#" class="btn btn-outline-info float-right btn-large">Save</a> --}}

                                        <input type="submit" name="submit" value="Add Agent"
                                            class="btn btn-outline-info float-right btn-large add-agent">

                                    </div>

                            </div>

                        </div>

                    </div>

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



        $('#change_password').click(function(e) {

            e.preventDefault();

            var old_password = $('#old_password').val();

            var new_password = $('#new_password').val();

            var confirm_password = $('#confirm_password').val();

            $.ajax({



                url: '',

                type: 'post',

                data: {
                    _token: '{{ csrf_token() }}',
                    old_password: old_password,
                    new_password: new_password,
                    confirm_password: confirm_password
                },

                dataType: 'json',

                success: function(data) {

                    alert(data);

                }

            });

        });
    </script>

    <!--
                                                    maonj script 28-02 -->

    <script>
        /*$(document).ready(function () {
                                                        $(".change-status .dot").on('click' , function () {
                                                            if($(this).hasClass("dot-success")){
                                                                $(this).removeClass("dot-success").addClass("dot-danger");
                                                            }
                                                            else if($(this).hasClass("dot-danger")){
                                                                $(this).removeClass("dot-danger").addClass("dot-success");
                                                            }
                                                        })
                                                    })*/

        $(document).on('click', '.select_agent_calendar_slot', function() {
            var agent_id = $(this).data('agent_id');
            var date = $(this).data('date');
            var day = $(this).data('day');
            var start_time = $(this).data('start_time');
            var end_time = $(this).data('end_time');
            var calendar_slot = $(this).data('calendar_slot');
            var selected_day = $(this).data('selected_day');
            var currentClass = '';
            var changeClass = '';


            if ($(this).hasClass("dot-success")) {
                currentClass = "dot-success";
                changeClass = "dot-danger";
            } else if ($(this).hasClass("dot-danger")) {
                currentClass = "dot-danger";
                changeClass = "dot-success";
            }
            //console.log('agent_id => ', agent_id, 'date => ', date, 'day => ', day, 'start_time => ', start_time, 'end_time => ', end_time, 'currentClass => ', currentClass, 'changeClass => ', changeClass);

            $.ajax({
                url: '',
                type: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    agent_id: agent_id,
                    date: date,
                    day: day,
                    start_time: start_time,
                    end_time: end_time
                },
                success: function(data) {
                    console.log('completed => ', data);
                    var flag = '';
                    for (var key in data) {
                        if (data.hasOwnProperty(key)) {
                            if (key == 'inserted') {
                                flag = 'inserted';
                            } else if (key == 'insertFailed') {
                                flag = 'insertFailed';
                                messageIcon = 'error';
                                message = 'Failed to insert this data.' + data[key] +
                                    ' Please try again.';
                            } else if (key == 'deleted') {
                                flag = 'deleted';
                            } else if (key == 'deletedFailed') {
                                flag = 'deletedFailed'
                                messageIcon = 'error';;
                                message = 'Failed to delete this data.' + data[key] +
                                    ' Please try again.';
                            }
                        }
                    }
                    if (flag == 'inserted') {
                        $('#start_hour_' + selected_day + agent_id).find('option:eq(0)').prop(
                            'selected', true);
                        $('#end_hour_' + selected_day + agent_id).find('option:eq(0)').prop('selected',
                            true);

                        if ($('.slot_' + selected_day + '84' + agent_id).hasClass(changeClass))
                            $('.slot_' + selected_day + '84' + agent_id).removeClass(changeClass)
                            .addClass(currentClass);
                        if ($('.slot_' + selected_day + '106' + agent_id).hasClass(changeClass))
                            $('.slot_' + selected_day + '106' + agent_id).removeClass(changeClass)
                            .addClass(currentClass);
                        if ($('.slot_' + selected_day + '128' + agent_id).hasClass(changeClass))
                            $('.slot_' + selected_day + '128' + agent_id).removeClass(changeClass)
                            .addClass(currentClass);
                        $('.slot_' + calendar_slot).removeClass(currentClass).addClass(changeClass);
                    } else if (flag == 'deleted') {
                        $('.slot_' + calendar_slot).removeClass(currentClass).addClass(changeClass);
                    } else if (flag == 'insertFailed' || flag == 'deletedFailed') {
                        swal(message, {
                            icon: messageIcon,
                        });
                    }
                }
            });
        });

        $(document).on('change', '.start_custom_hour, .end_custom_hour', function() {
            var agent_id = $(this).data('agent_id');
            var date = $(this).data('date');
            var day = $(this).data('day');
            var start_time = '';
            var end_time = '';
            var calendar_slot = $(this).data('calendar_slot');
            var selected_day = $(this).data('selected_day');

            var start_time = $('#start_hour_' + selected_day + agent_id + ' option:selected').val();
            var end_time = $('#end_hour_' + selected_day + agent_id + ' option:selected').val();
            if (start_time != '' && end_time != '') {
                $.ajax({
                    url: '',
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        is_custom: 1,
                        agent_id: agent_id,
                        date: date,
                        day: day,
                        start_time: start_time,
                        end_time: end_time
                    },
                    success: function(data) {
                        $('.slot_' + selected_day + '84' + agent_id).removeClass("dot-success")
                            .addClass("dot-danger");
                        $('.slot_' + selected_day + '106' + agent_id).removeClass("dot-success")
                            .addClass("dot-danger");
                        $('.slot_' + selected_day + '128' + agent_id).removeClass("dot-success")
                            .addClass("dot-danger");
                    }
                });
            }
        });
    </script>

    <script>
        $(document).on('click', '.add-agent', function(e) {
            e.preventDefault();
            var get_ajax_call = $('#get_ajax_call').val();
            var name = $('#name_user').val();
            var email = $('#email_user').val();
            var password = $('#password_user').val();
            var ip_address = $('#ip_address_user').val();
            var user_type = $('#user_type_add_user option:checked').val();

            $.ajax({
                url: '',
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    get_ajax_call: get_ajax_call,
                    name: name,
                    email: email,
                    password: password,
                    ip_address: ip_address,
                    user_type: user_type
                },
                dataType: 'json',
                success: function(data) {
                    if (data == 'success') {
                        var successMessage = 'Agent Added Succesfully';
                        //swal(successMessage, "success");
                        swal(successMessage, {
                            icon: "success",
                        });
                    }
                    location.reload();
                }
            });

        });
    </script>


    <script>
        $(document).on('click', '.chnageweek', function() {
            $newDate = date('Y-m-d', strtotime("+1 week"));
            alert($newDate);

        });
    </script>


@endsection
