<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\UserCalendar;
use App\Models\UserCallback;
use App\Models\AgentLoginDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';


    protected function authenticated()
    {
        $userId = Account::select('id', 'userId', 'agentId')->where('agentId', auth()->id())->first();

        // To insert login detail in table code start
        if (!empty(auth()->id())) {
            $checkRecordWithoutLogoutTime = AgentLoginDetail::select('id')
                ->where('agent_id', '=', auth()->id())
                ->where('logout_time', '=', NULL)
                ->first();
            if (empty($checkRecordWithoutLogoutTime)) {
                $saveObject = new AgentLoginDetail();
                $saveObject->agent_id = auth()->id();
                $saveObject->date = date('Y-m-d');
                $saveObject->login_time = date('H:i:s');
                $result = $saveObject->save();
            }
        }
        // To insert login detail in table code end

        if (isset($userId)) {
            //DB::enableQueryLog();
            /*$data['appointments'] = UserCalendar::whereDate('appointmentDate', Carbon::today())->where('addedBy', auth()->id())->get();

            $data['callbacks'] = UserCallback::whereDate('callbackDateTime', Carbon::today())
                ->where('Added_By', auth()->id())
                ->get();*/
            $data['appointments'] = UserCalendar::whereDate('appointmentDate', Carbon::today())->where('addedBy', auth()->id())->count();

            $data['callbacks'] = UserCallback::whereDate('callbackDateTime', Carbon::today())
                ->where('Added_By', auth()->id())
                ->count();
            //dd(DB::getQueryLog());

            session()->put('callbacks', $data['callbacks']);
            session()->put('appointments', $data['appointments']);
            return redirect()->intended($this->redirectTo);
        }
    }

    public function logout(Request $request)
    {
        // To insert login detail in table code start
        if (!empty($request->logout_reason)) {
            if (!empty(auth()->id())) {
                $checkRecordExist = \App\Models\AgentLoginDetail::select('id')
                    ->where('agent_id', '=', auth()->id())
                    ->where('logout_time', '=', NULL)
                    ->first();
                if (!empty($checkRecordExist)) {
                    $checkRecordExist->logout_reason = $request->logout_reason;
                    $checkRecordExist->logout_time = date('H:i:s');
                    $result = $checkRecordExist->save();
                }
            }
        }
        // To insert login detail in table code end
        $this->performLogout($request);
        //return json_encode('Logout Successfully');
        return json_encode('Logout');
        return redirect('/');
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
