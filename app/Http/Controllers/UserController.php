<?php

namespace App\Http\Controllers;

use App\Models\TotalCounterValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agentId = Auth::id();
        $agentData = Auth::user();
        if ($agentData->user_type == 1) {
            return $this->getAdminDashboardCount();
        } else if ($agentData->user_type == 3) {
            return $this->getAgentDashboardCount();
        }
    }
    function getAdminDashboardCount()
    {
        $caseStatusArr = [
            'AWAITINGDOCS1', 'REVIEW', 'COMPLETED_CASE', 'COMPLETED_CASE', 'DELETED_CASE', 'CANCELED',
            'DMP_DRAFT', 'Failed_Compliance', 'Fixed_Compliance', 'IN_PROCESS', 'in_voice', 'INPROCESSDAY1', 'SUBMITTED',
            'IVA_DRAFT', 'MESSAGEDAY1', 'MESSAGEDAY2', 'MESSAGEDAY3', 'MESSAGEDAY4', 'PAID_ON_MOC', 'SENT_TO_IP', 'COMPLETED_APP', 'REGISTERED', 'DA_QUALITY', 'NEW', 'ND1', 'ND2', 'ND3'
        ];

        // $counts = getDas/hboardCount($caseStatusArr);
        // return view('user.admin_statistics')->with('count', $counts);
    }

    public function getAgentDashboardCount()
    {
        $agentId = Auth::id();
        $agentData = Auth::user();

        $caseStatusArr = [
            'AWAITINGDOCS1', 'REVIEW', 'COMPLETED_CASE', 'COMPLETED_CASE', 'DELETED_CASE', 'CANCELED',
            'DMP_DRAFT', 'Failed_Compliance', 'Fixed_Compliance', 'IN_PROCESS', 'in_voice', 'INPROCESSDAY1', 'SUBMITTED',
            'IVA_DRAFT', 'MESSAGEDAY1', 'MESSAGEDAY2', 'MESSAGEDAY3', 'MESSAGEDAY4', 'PAID_ON_MOC',
            'SENT_TO_IP', 'COMPLETED_APP', 'REGISTERED', 'DA_QUALITY', 'NEW', 'ND1', 'ND2', 'ND3',
            'iva_complete', 'web', 'iva_docs_complete', 'trust_deed_complete',
            'deed_docs_complete', 'dmp_complete', 'das_complete', 'other_zcase_type',
            'inprocessday1', 'inprocessday2', 'inprocessday3', 'inprocessday4',
            'Awaiting Docs', 'awaitingdocsday1', 'awaitingdocsday2', 'awaitingdocsday3', 'awaitingdocsday4',
        ];
        $counts = getDashboardCount($caseStatusArr, $agentId, true);
        return view('user.agent_advisor_statistics')->with('count', $counts);
    }
    public function list_inprocess_awaiting_data($data_text)
    {
        $agentId = Auth::id();
        $agentData = Auth::user();
        if ($agentData->user_type == 3) {
            $totalCountArr = getDashboardCount(['In Process', 'inprocessday1', 'inprocessday2', 'inprocessday3', 'inprocessday4', 'Awaiting Docs', 'awaitingdocsday1', 'awaitingdocsday2', 'awaitingdocsday3', 'awaitingdocsday4'], false, false);
        } else {
            $totalCountArr = getDashboardCount(['In Process', 'inprocessday1', 'inprocessday2', 'inprocessday3', 'inprocessday4', 'Awaiting Docs', 'awaitingdocsday1', 'awaitingdocsday2', 'awaitingdocsday3', 'awaitingdocsday4'], false, true);
        }
        return view('user.list_inprocess_awaiting_data', compact('totalCountArr', 'data_text'));
    }
    public function agent(Request $request)
    {
        $agentId = Auth::id();
        // dd($agentId);
        $agentData = Auth::user();
        // }

        // if ($agentData->user_type == 3) {
        //     $counts = getAgentIdDashboardCount($caseStatusArr, $agentId);
        //     return view('user.agent_advisor_statistics')->with('count', $counts);
        // }
        // if ($agentData->user_type == 3) {
        // $counts = getDashboardCount($caseStatusArr, $agentId);
        // }
        // return view('user.agent_advisor_statistics')->with('count', $counts);
        // dd($counts);
        // dd($counts);
        // \DB::connection()->enableQueryLog();
        // $count = \App\Models\TotalCounterValue::select('value', 'key', 'agent_id')
        //     ->when($agent, function ($q) use ($agentId) {
        //         return $q->where('agent_id', $agentId);
        //     })
        //     // ->when($request->has('agent_id'), function ($query) use ($request) {
        //     //     $query->where('agent_id', $agentId);
        //     // })
        //     // ->where('agent_id', $agentId)
        //     ->whereIn('key', $caseStatusArr)
        //     ->pluck('value', 'key');
        // // dd($count);
        // return $counts;
        // $queries = \DB::getQueryLog();
        // return dd($queries);

        $caseStatusArr = [
            'AWAITINGDOCS1', 'REVIEW', 'COMPLETED_CASE', 'COMPLETED_CASE', 'DELETED_CASE', 'CANCELED',
            'DMP_DRAFT', 'Failed_Compliance', 'Fixed_Compliance', 'IN_PROCESS', 'in_voice', 'INPROCESSDAY1', 'SUBMITTED',
            'IVA_DRAFT', 'MESSAGEDAY1', 'MESSAGEDAY2', 'MESSAGEDAY3', 'MESSAGEDAY4', 'PAID_ON_MOC',
            'SENT_TO_IP', 'COMPLETED_APP', 'REGISTERED', 'DA_QUALITY', 'NEW', 'ND1', 'ND2', 'ND3',
            'iva_complete', 'web', 'iva_docs_complete', 'trust_deed_complete',
            'deed_docs_complete', 'dmp_complete', 'das_complete', 'other_zcase_type',
        ];
        $count = TotalCounterValue::select('value', 'key', 'agent_id')
            ->where('agent_id', 11)
            ->whereIn('key', $caseStatusArr)->pluck('value', 'key');
        // dd($count);
        return view('user.agent_advisor_statistics')->with('count', $count);
    }
    public function indexies(Request $request)
    {



        $caseStatusArr = [
            'AWAITINGDOCS1', 'REVIEW', 'COMPLETED_CASE', 'COMPLETED_CASE', 'DELETED_CASE', 'CANCELED',
            'DMP_DRAFT', 'Failed_Compliance', 'Fixed_Compliance', 'IN_PROCESS', 'in_voice', 'INPROCESSDAY1', 'SUBMITTED',
            'IVA_DRAFT', 'MESSAGEDAY1', 'MESSAGEDAY2', 'MESSAGEDAY3', 'MESSAGEDAY4', 'PAID_ON_MOC', 'SENT_TO_IP', 'COMPLETED_APP', 'REGISTERED', 'DA_QUALITY', 'NEW', 'ND1', 'ND2', 'ND3'
        ];
        $count = TotalCounterValue::whereIn('key', $caseStatusArr)->pluck('value', 'key');
        return view('user.super_admin_statistics')->with('count', $count);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $caseStatusArr = [
            'AWAITINGDOCS1', 'REVIEW', 'COMPLETED_CASE', 'COMPLETED_CASE', 'DELETED_CASE', 'CANCELED',
            'DMP_DRAFT', 'Failed_Compliance', 'Fixed_Compliance', 'IN_PROCESS', 'in_voice', 'INPROCESSDAY1', 'SUBMITTED',
            'IVA_DRAFT', 'MESSAGEDAY1', 'MESSAGEDAY2', 'MESSAGEDAY3', 'MESSAGEDAY4', 'PAID_ON_MOC', 'SENT_TO_IP', 'COMPLETED_APP', 'REGISTERED', 'DA_QUALITY', 'NEW', 'ND1', 'ND2', 'ND3'
        ];
        $count = TotalCounterValue::whereIn('key', $caseStatusArr)->pluck('value', 'key');
        return view('user.manager_statistics')->with('count', $count);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $caseStatusArr = [
            'AWAITINGDOCS1', 'REVIEW', 'COMPLETED_CASE', 'DELETED_CASE', 'CANCELED',
            'DMP_DRAFT', 'Failed_Compliance', 'Fixed_Compliance', 'IN_PROCESS', 'in_voice', 'INPROCESSDAY1', 'SUBMITTED',
            'IVA_DRAFT', 'MESSAGEDAY1', 'MESSAGEDAY2', 'MESSAGEDAY3', 'MESSAGEDAY4', 'PAID_ON_MOC', 'SENT_TO_IP', 'COMPLETED_APP', 'REGISTERED', 'DA_QUALITY', 'NEW', 'ND1', 'ND2', 'ND3', 'SUBMITED_DMP', 'SUBMITED_IVA', 'Complaints'
        ];
        $count = TotalCounterValue::whereIn('key', $caseStatusArr)->pluck('value', 'key');
        return view('user.compliance_manager_statistics')->with('count', $count);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function complianceAgent(Request $request)
    {
        $caseStatusArr = [
            'AWAITINGDOCS1', 'REVIEW', 'COMPLETED_CASE', 'DELETED_CASE', 'CANCELED',
            'DMP_DRAFT', 'Failed_Compliance', 'Fixed_Compliance', 'IN_PROCESS', 'in_voice', 'INPROCESSDAY1', 'SUBMITTED',
            'IVA_DRAFT', 'MESSAGEDAY1', 'MESSAGEDAY2', 'MESSAGEDAY3', 'MESSAGEDAY4', 'PAID_ON_MOC', 'SENT_TO_IP', 'COMPLETED_APP', 'REGISTERED',
            'DA_QUALITY', 'NEW', 'ND1', 'ND2', 'ND3', 'SUBMITED_DMP', 'SUBMITED_IVA', 'Complaints', 'DMP_Compliance', 'Iva_Compliance'
        ];
        $count = TotalCounterValue::whereIn('key', $caseStatusArr)->pluck('value', 'key');
        return view('user.compliance_agent_statistics')->with('count', $count);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function debtManager(Request $request)
    {
        $caseStatusArr = [
            'AWAITINGDOCS1', 'REVIEW', 'COMPLETED_CASE', 'DELETED_CASE', 'CANCELED',
            'DMP_DRAFT', 'Failed_Compliance', 'Fixed_Compliance', 'IN_PROCESS', 'in_voice', 'INPROCESSDAY1', 'SUBMITTED',
            'IVA_DRAFT', 'MESSAGEDAY1', 'MESSAGEDAY2', 'MESSAGEDAY3', 'MESSAGEDAY4', 'PAID_ON_MOC', 'SENT_TO_IP', 'COMPLETED_APP', 'REGISTERED',
            'DA_QUALITY', 'NEW', 'ND1', 'ND2', 'ND3', 'SUBMITED_DMP', 'SUBMITED_IVA', 'Complaints', 'DMP_Compliance', 'Iva_Compliance', 'PassBackIva', 'NoAnswerIva', 'SendToDmpProvider', 'PassBackDmp', 'NoAnswerDmp', 'Sent_to_DMP'
        ];
        $count = TotalCounterValue::whereIn('key', $caseStatusArr)->pluck('value', 'key');
        return view('user.debt_manager_statistics')->with('count', $count);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                "X-Api-Key:test_c38ed230a339b00948e0e8e2f47",
                "X-Auth-Token:test_29fb766cc433db60a79f7ff3c01"
            )
        );
        $payload = array(
            'purpose' => 'by domain',
            'amount' => '2500',
            'phone' => '9999999999',
            'buyer_name' => 'snehal',
            'redirect_url' => 'http://localhost/DreamsTech/luchi/Loochi/public/instamojo/',
            'send_email' => true,
            // 'webhook' => 'http://www.example.com/webhook/',
            'send_sms' => true,
            'email' => 'foo@example.com',
            'allow_repeated_payments' => false
        );
        // dd($payload);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch);
        // die();
        // return response()->json($response);
        $response = json_decode($response);
        // dd($response->payment_request);
        // echo '<pre>';
        // print($response);
        // echo '</pre>';
        // return redirect($response->longurl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function instamojo()
    {
        echo '<pre>';
        print_r($_GET);
    }
}
