<?php
function getDashboardCount($caseStatusArr, $agentId = '', $agent = false)
{
    $agentId = Auth::id();
    $agentData = Auth::user();

    if ((in_array(
        'In Process' || 'inprocessday1' || 'inprocessday2' || 'inprocessday3' || 'inprocessday4' || 'Awaiting Docs' ||
            'awaitingdocsday1' || 'awaitingdocsday2' || 'awaitingdocsday3' || 'awaitingdocsday4',
        $caseStatusArr
    )) && ($agentData->user_type == 3)) {
        $agent = true;
    }
    $count = \App\Models\TotalCounterValue::select('value', 'key', 'agent_id')
        ->when($agent, function ($q) use ($agentId) {
            return $q->where('agent_id', $agentId);
        })

        ->whereIn('key', $caseStatusArr)
        ->pluck('value', 'key');
    return $count;
}

function getDataFromCollection($allDataByZcaseType, $matchedArray)
{
    dd($allDataByZcaseType);
    $resultData = $allDataByZcaseType->filter(function ($item, $key) use ($matchedArray) {
        // echo $item/;
        // echo ' || ';
        if (in_array($item->zCaseType, $matchedArray)) {
            return $item;
            // dd($item);
        }
    });
    // dd($resultData->count());

    return $resultData->count();
}









function getAgentIdDashboardCount($caseStatusArr, $agentId)
{

    // $count = \App\Models\TotalCounterValue::whereIn('key', $caseStatusArr)->pluck('value', 'key');
    // return $count;
    $count = \App\Models\TotalCounterValue::select('value', 'key', 'agent_id')
        ->where('agent_id', $agentId)
        ->whereIn('key', $caseStatusArr)
        ->pluck('value', 'key');
    return $count;
}
