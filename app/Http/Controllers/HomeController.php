<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $getAgent = $request->getagent;
        $data = [];
        $loginUserData = Auth::user();

        unset($loginUserData->password);
        $agentCalendarDayArr = array();

        $data['loginUser'] = $loginUserData;
        $allIsCustomDate = array();
        if (isset($getAgent) && !empty($getAgent)) {
            if ($loginUserData->user_type == 15 || $loginUserData->user_type == 8 || $loginUserData->user_type == 9 || $loginUserData->user_type == 10) {
                if ($loginUserData->user_type == 15) {
                    $data['getAgentList'] = \App\User::when(\request()->has('getagent'), function ($q) {
                        $getAgent = \request()->get('getagent');
                        if (!empty($getAgent)) {
                            return $q->where('user_type', $getAgent);
                        }
                    })
                        ->get();
                    $data['getAgent'] = $getAgent;
                }
                // else if ($loginUserData->user_type == 8) {
                //     $data['getAgentList'] = \App\User::where('user_type', '=', 3)->get();
                // } else if ($loginUserData->user_type == 9) {
                //     $data['getAgentList'] = \App\User::where('user_type', '=', 11)->get();
                // } else if ($loginUserData->user_type == 10) {
                //     $data['getAgentList'] = \App\User::whereIn('user_type', [5, 6])->get();
                // }



                $getAllAgentCalendarDetail = AgentCalendarDetail::get()->groupBy('agent_id')->toArray();

                $allDatesOfMonth = getAllDateOfTwoMonth(true);

                foreach ($getAllAgentCalendarDetail as $getAllAgentCalendarDetailKey => $getAllAgentCalendarDetailValue) {
                    foreach ($getAllAgentCalendarDetailValue as $agentInnerDataKey => $agentInnerDataValue) {
                        if (in_array($agentInnerDataValue['date'], $allDatesOfMonth)) {
                            $explodeStartTime = explode(' ', $agentInnerDataValue['start_time']);
                            $explodeEndTime = explode(' ', $agentInnerDataValue['end_time']);
                            $agentCalendarArr[$getAllAgentCalendarDetailKey][$agentInnerDataValue['date']] = trim($explodeStartTime[0]) . trim($explodeEndTime[0]);

                            $agentCalendarDayArr[$getAllAgentCalendarDetailKey][strtolower($agentInnerDataValue['day'])] = trim($explodeStartTime[0]) . trim($explodeEndTime[0]);


                            if ($agentInnerDataValue['is_custom'] == 1) {

                                if (isset($allIsCustomDate[$getAllAgentCalendarDetailKey]) && in_array(strtolower($agentInnerDataValue['day']), $allIsCustomDate[$getAllAgentCalendarDetailKey])) {
                                } else {
                                    $allIsCustomDate[$getAllAgentCalendarDetailKey][] = strtolower($agentInnerDataValue['day']);
                                }
                            }
                        }
                    }
                }

                $data['agentCalendarDetail'] = $agentCalendarDayArr;
                $data['allIsCustomDate'] = $allIsCustomDate;
            }
            //  else if ($loginUserData->user_type == 2) {
            //     $data['getUserList'] = \App\Models\UserNames::where('userType', '=', 'User')->get();
            // } else if ($loginUserData->user_type == 3) {
            //     $allTimeSlots = generateDmpCalendarTimeSlot();
            //     $currentDate = date('Y-m-d', strtotime('+ 1Day'));

            // foreach ($allTimeSlots as $allTimeSlotsKey => $allTimeSlotsValue) {
            //     $timeSlot = explode('-', $allTimeSlotsValue);

            //     $tempCurrentData = '';
            //     $tempCurrentData = AgentCalendarSlotDetail::with('userNames:user_id,name,surname')->where('slot_date', $currentDate)
            //         ->where('slot_start_time', trim($timeSlot[0]))
            //         ->where('slot_end_time', trim($timeSlot[1]))
            //         ->where('agent_id', $loginUserData->id)
            //         ->first();
            //     $tempCurrentData = collect($tempCurrentData)->toArray();

            //     if (!empty($tempCurrentData)) {

            //         $currentDateCalendarSlotData[$allTimeSlotsValue] = array(
            //             'user_id' => $tempCurrentData['user_names']['user_id'],
            //             'user_name' => $tempCurrentData['user_names']['name'],
            //             'user_surname' => $tempCurrentData['user_names']['surname'],
            //             'date' => $currentDate,
            //             'slot' => $allTimeSlotsValue
            //         );
            //     } else {
            //         $currentDateCalendarSlotData[$allTimeSlotsValue] = array(
            //             'user_id' => '',
            //             'user_name' => '',
            //             'user_surname' => '',
            //             'date' => $currentDate,
            //             'slot' => $allTimeSlotsValue
            //         );
            //     }
            // }

            // $data['currentDateCalendarSlotData'] = $currentDateCalendarSlotData;
            // }
        }
        return view('home', $data);
        return view('sidebar', $data);
    }
    public function view()
    {
        return view('sidebar');
    }
}
