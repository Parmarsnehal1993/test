@php
    $currentDate = date('Y-m-d');
    $currentTime = date('H:i',  strtotime ("+1 hour"));

    //$currentDate = '2020-04-03';
    //$currentTime = '15:30';
@endphp
<div id="slot_book_for_dmp_advisor" class="modal fade slot_book"  tabindex="-1" role="dialog" aria-labelledby="slot_book">
    <div class="modal-dialog modal-sm">
        <div class="modal-content card card-secondary">
            <div class="modal-header">
                <div class="card-title text-center width-100">DMP Advisor Availability</div>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <img src="{!! asset('images/icons/Cross_Icon@2x.png')!!}" alt="Close" class="img-fulid" width="40" height="40">
                </button>
            </div>
            <div class="modal-body">
                <!-- To display monday to sunday date code start -->
                    <div class="slot-book-table d-grid">
                        <div class="d-flex align-items-center align-content-center slot-header text-center br-right">AM Availability</div>

                        @if(isset($currentWeekDates) && !empty($currentWeekDates))
                            @foreach($currentWeekDates as $currentWeekDatesKey => $currentWeekDatesValue)
                                
                                <div class="d-flex align-items-center align-content-center slot-header">
                                    {{ date('d/m/Y', strtotime($currentWeekDatesValue)) }}
                                </div>
                            @endforeach
                        @endif
                    </div>
                <!-- To display monday to sunday date code end -->
                <!-- Single row from monday to sunday calendar schedule code start -->
                    <!-- here it will load all the dmp advisor name which is available on the particular date and for particular time slot -->
                    @foreach($allAgentDataForCalendar as $allAgentDataForCalendarKey => $allAgentDataForCalendarValue)

                        <div class="slot-book-table d-grid">
                            <div class="d-flex align-items-center align-content-center slot-body text-center br-right">
                                {{ $allAgentDataForCalendarKey }}
                            </div>

                            @foreach($currentWeekDates as $currentWeekDatesKey => $currentWeekDatesValue)
                                @php
                                    $loopHours = explode('-', $allAgentDataForCalendarKey);
                                    $minHour = $loopHours[0];
                                    $maxHour = $loopHours[1];
                                @endphp
                                @if(strtotime($currentWeekDatesValue) < strtotime($currentDate))
                                    <div class="d-flex align-items-center align-content-center slot-body">
                                        <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                            <div>Not For Assign</div>
                                        </button>
                                    </div>
                                @elseif(strtotime($currentWeekDatesValue) == strtotime($currentDate) && strtotime($currentTime) >= strtotime($minHour))
                                    <div class="d-flex align-items-center align-content-center slot-body">
                                        <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                            <div>Not For Assign</div>
                                        </button>
                                    </div>
                                @else
                                    @if(isset($allAgentDataForCalendarValue[$currentWeekDatesValue]) && count($allAgentDataForCalendarValue[$currentWeekDatesValue]) == 1 && empty($allAgentDataForCalendarValue[$currentWeekDatesValue][0]))
                                        <div class="d-flex align-items-center align-content-center slot-body">
                                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                                <div>unavailable</div>
                                            </button>
                                        </div>
                                    @else
                                        @if(isset($allAgentDataForCalendarValue[$currentWeekDatesValue]) && count($allAgentDataForCalendarValue[$currentWeekDatesValue]) > 0)
                                            @php $str = ''; $agentCount = 0; @endphp
                                            @foreach($allAgentDataForCalendarValue[$currentWeekDatesValue] as $agentKey => $agentValue)
                                                 @if(isset($agentValue['agent_id']) && !empty($agentValue['agent_id']))
                                                    @php
                                                        $agentCount++;
                                                        $loopHours = explode('-', $allAgentDataForCalendarKey); 
                                                        
                                                        
                                                         $str .= '<div class="dropdown-item select_agent_for_dmp_calendar" data-agent_id="'.$agentValue["agent_id"].'" data-time_slot="'.$agentValue["slot"].'" data-slot_date="'.$agentValue["date"].'" data-slot_time="'.$loopHours[0].'">'.$agentValue["agent_name"].'</div>';
                                                    @endphp
                                                @endif
                                            @endforeach
                                            @if($agentCount == 0)
                                                <div class="d-flex align-items-center align-content-center slot-body">
                                                    <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                                        <div>unavailable</div>
                                                    </button>
                                                </div>
                                            @else
                                                <div class="d-flex align-items-center align-content-center slot-body">
                                                    <button class="btn btn-outline-primary bg-white slot-btn available" data-toggle="dropdown">
                                                    <div>{{ $agentCount }} available</div>    
                                                    <i class="fa fa-chevron-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        {!! $str !!}
                                                    </div>
                                                </div>
                                            @endif
                                        @else
                                            <div class="d-flex align-items-center align-content-center slot-body">
                                                <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                                    <div>unavailable</div>
                                                </button>
                                            </div>
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                    <!-- Single row from monday to sunday calendar schedule code end -->
            </div>
        </div>
    </div>
</div>