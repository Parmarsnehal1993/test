@extends('layouts.app')

@section('content')
    <style type="text/css">
        .show_dmp_tab, .show_iva_tab {
            cursor: pointer;
        }
    </style>
        <div id="sidenav-overlay"></div>
        {{-- <div class="wrapper"> --}}
            <!-- start .main-content -->
            <div class="main-content">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                        <div class="row mt--100">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">
                                <div class="main-title">
                                    <h1 class="font-h1">
                                    @php $loginUserData = Auth::user();
                                    unset($loginUserData->password);
                                    $loginUser = $loginUserData;
                                        @endphp
                                    <strong>{{ $loginUser->name }}'s Workflow</strong>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="card-section"> 
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <main class="pl-80">
                                <nav>
                                    <div class="nav nav-tabs calendar-tabs" role="tablist">
                                        <h1 class="mr-5">{{ date('F Y') }}</h1>
                                        <a
                                            class="nav-item nav-link active show_dmp_tab"
                                            id="nav-home-tab"
                                            data-toggle="tab"
                                            role="tab"
                                            aria-controls="nav-home"
                                            aria-selected="true" style="display: none;">DMP</a>
                                        <a
                                            class="nav-item nav-link show_iva_tab"
                                            id="nav-profile-tab"
                                            data-toggle="tab"
                                            role="tab"
                                            aria-controls="nav-profile"
                                            aria-selected="false" style="display: none;">IVA</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="dmp_tab" style="display:none;">
                                    <div
                                        class="tab-pane fade show active"
                                        id="nav-home"
                                        role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="calendar-wrapper">
                                            @if(isset($allDataForMonth) && !empty($allDataForMonth))
                                                @php
                                                    $dataCounter = 1;
                                                @endphp
                                                <div class="d-grid fr-7">
                                                    @foreach($allDateOfMonth as $allDateOfMonthKey => $allDateOfMonthValue)
                                                        @if($dataCounter < 8)
                                                                <div
                                                                    class="d-flex align-items-center align-content-center status-update text-center has-padding justify-content-center">
                                                                    <h1>{{ $allDateOfMonthValue }}</h1>
                                                                </div>
                                                        @else
                                                            @php break; @endphp
                                                        @endif
                                                        @php $dataCounter++; @endphp
                                                    @endforeach
                                                </div>
                                            @else
                                                <h2 class="text-center" style="position: relative;margin-top: 100px;">No Data Available</h2>
                                            @endif
                                            @if(isset($allDataForMonth) && !empty($allDataForMonth))
                                                <div class="calendar-dates">
                                                    <div class="d-grid fr-7">
                                                    @foreach($allDateOfMonth as $allDateOfMonthKey => $allDateOfMonthValue)
                                                        @php
                                                            $currentDate = date('Y-m-d');
                                                            
                                                            $currentDateHighlight = false;
                                                        @endphp
                                                        @if($allDateOfMonthKey == $currentDate)
                                                            @php $currentDateHighlight = true; @endphp
                                                        @endif
                                                        @if(isset($allDataForMonth[$allDateOfMonthKey]) && !empty($allDataForMonth[$allDateOfMonthKey]))
                                                            <div class="d-flex justify-content-start">
                                                                <div class="card" @if($currentDateHighlight) style="color:white; background-color: lightblue;border-color: red;" @endif>
                                                                    <div class="date">
                                                                        {{ date('d', strtotime($allDateOfMonthKey)) }}
                                                                    </div>
                                                                    <ul class="list-unstyled appontment-lists">
                                                                        <li>
                                                                            @foreach($allDataForMonth[$allDateOfMonthKey] as $allDataForMonthKey => $allDataForMonthValue)
                                                                                @foreach($allDataForMonthValue as $slotKey => $slotValue)
                                                                                    {{-- {{ dd($currentDateAllKey , $currentDateAllValue) }} --}}
                                                                                    <a href="javascript:void(0)" class="show_single_user_data" data-keyboard="false" data-backdrop="static" data-agent_id="{{ $slotValue['agent_id'] }}" data-user_id="{{ $slotValue['user_id'] }}" data-user_name="{{ $slotValue['user_name'] }}" data-date="{{ $slotValue['date'] }}" data-slot="{{ $slotValue['slot'] }}">{{ $slotValue['slot']. ' '.$slotValue['user_name'] }}</a>
                                                                                    {{-- <a href="javascript:void(0)" data-toggle="modal" data-target="#quick_view_modal" data-keyboard="false" data-backdrop="static">{{ $slotValue['slot']. ' '.$slotValue['user_name'] }}</a> --}}
                                                                                @endforeach
                                                                            @endforeach
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="d-flex justify-content-start">
                                                                <div class="card" @if($currentDateHighlight) style="color:white; background-color: lightblue;border-color: red;" @endif>
                                                                    <div class="date">
                                                                        {{ date('d', strtotime($allDateOfMonthKey)) }}
                                                                    </div>
                                                                    <ul class="list-unstyled appontment-lists">
                                                                        <li>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content" id="iva_tab" style="display: none;">
                                    <div
                                        class="tab-pane fade show active"
                                        id="nav-home"
                                        role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="calendar-wrapper">
                                            @if(isset($allIvaDataForMonth) && !empty($allIvaDataForMonth))
                                                @php
                                                    $ivaDataCounter = 1;
                                                @endphp
                                                <div class="d-grid fr-7">
                                                    @foreach($allDateOfMonth as $allDateOfMonthKey => $allDateOfMonthValue)
                                                        @if($ivaDataCounter < 8)
                                                                <div
                                                                    class="d-flex align-items-center align-content-center status-update text-center has-padding justify-content-center">
                                                                    <h1>{{ $allDateOfMonthValue }}</h1>
                                                                </div>
                                                        @else
                                                            @php break; @endphp
                                                        @endif
                                                        @php $ivaDataCounter++; @endphp
                                                    @endforeach
                                                </div>
                                            @else
                                                <h2 class="text-center" style="position: relative;margin-top: 100px;">No Data available</h2>
                                            @endif
                                            @if(isset($allIvaDataForMonth) && !empty($allIvaDataForMonth))
                                                <div class="calendar-dates">
                                                    <div class="d-grid fr-7">
                                                    @foreach($allDateOfMonth as $allDateOfMonthKey => $allDateOfMonthValue)
                                                        @php
                                                            $currentDate = date('Y-m-d');
                                                            $currentDateHighlight = false;
                                                        @endphp
                                                        @if($allDateOfMonthKey == $currentDate)
                                                            @php $currentDateHighlight = true; @endphp
                                                        @endif
                                                        @if(isset($allIvaDataForMonth[$allDateOfMonthKey]) && !empty($allIvaDataForMonth[$allDateOfMonthKey]))
                                                            <div class="d-flex justify-content-start">
                                                                <div class="card" @if($currentDateHighlight) style="color:white; background-color: lightblue;border-color: red;" @endif>
                                                                    <div class="date">
                                                                        {{ date('d', strtotime($allDateOfMonthKey)) }}
                                                                    </div>
                                                                    <ul class="list-unstyled appontment-lists">
                                                                        <li>
                                                                            @foreach($allIvaDataForMonth[$allDateOfMonthKey] as $allIvaDataForMonthKey => $allIvaDataForMonthValue)
                                                                                @foreach($allIvaDataForMonthValue as $ivaSlotKey => $ivaSlotValue)
                                                                                    <a href="javascript:void(0)" class="show_single_user_data" data-keyboard="false" data-backdrop="static" data-agent_id="{{ $ivaSlotValue['agent_id'] }}" data-user_id="{{ $ivaSlotValue['user_id'] }}" data-user_name="{{ $ivaSlotValue['user_name'] }}" data-date="{{ $ivaSlotValue['date'] }}" data-slot="{{ $ivaSlotValue['slot'] }}">{{ $ivaSlotValue['slot']. ' '.$ivaSlotValue['user_name'] }}</a>
                                                                                @endforeach
                                                                            @endforeach
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="d-flex justify-content-start">
                                                                <div class="card" @if($currentDateHighlight) style="color:white; background-color: lightblue;border-color: red;" @endif>
                                                                    <div class="date">
                                                                        {{ date('d', strtotime($allDateOfMonthKey)) }}
                                                                    </div>
                                                                    <ul class="list-unstyled appontment-lists">
                                                                        <li>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </main>
                        </div>
                    </div>
                </section>
            </div>
        {{-- </div> --}}

        <!-- Quick modal -->
            <div id="quick_view_modal_div" style="display: none;"></div>
        <!-- .quick modal -->

    <script type="text/javascript">
        $(document).on('click', '.show_single_user_data', function(){
            var user_id = $(this).data('user_id');
            var user_name = $(this).data('user_name');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'{{ route('user.get_ajax_user_case_all_data') }}',
                method:'post',
                cache: false,
                data:{ 
                    user_id: user_id,
                    user_name: user_name
                },
                success:function(data)
                {
                    console.log('data => ', data);
                    $('#quick_view_modal_div').html(data);
                    $('#quick_view_modal_div').show();
                    $('#quick_view_modal').modal('show');
                }
            });
        });

        $(document).on('click', '.show_dmp_tab', function(){
            $('#iva_tab').hide();
            $('#dmp_tab').show();
        });

        $(document).on('click', '.show_iva_tab', function(){
            $('#dmp_tab').hide();
            $('#iva_tab').show();
        });
    </script> 
    
    <script type="text/javascript">
        $(document).ready(function(){
        var loginUser = <?php echo $loginUser->user_type; ?>;

        if(loginUser == 6) {
            $('#iva_tab').show();
            $('.show_iva_tab').show();
        } else if(loginUser == 5) {
            $('#dmp_tab').show();
            $('.show_dmp_tab').show();
        } else if(loginUser == 8 || loginUser == 10) {
            // $('#iva_tab').show();
            $('.show_iva_tab').show();
            // $('#dmp_tab').show();
            $('.show_dmp_tab').show();
        }
        
    });
    </script>
    
    
    
@endsection