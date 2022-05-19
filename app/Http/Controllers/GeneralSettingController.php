<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use App\Models\generalSettings;
use App\Models\generalSettingsGroup;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generalSettingId = generalSettingsGroup::all('id', 'group_display_name');
        return view('general_setting.general_setting')->with('generalSettingId', $generalSettingId);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'general_settings_group_id' => 'required',
            'key' => 'required',
            'value' => 'required',
        ]);
        $general_setting = new GeneralSetting();
        $general_setting->general_settings_group_id = $request->general_settings_group_id;
        $general_setting->key = $request->key;
        $general_setting->value = $request->value;
        $general_setting->save();
        return response()->json($general_setting);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $generalSettingId = generalSettingsGroup::all('id', 'group_display_name');
        $records = GeneralSetting::all();
        return view('general_setting.general_setting')->with([
            'records' => $records,
            'generalSettingId' => $generalSettingId
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(GeneralSetting $records)
    {
        $generalSettingId = generalSettingsGroup::all('id', 'group_display_name');
        return response()->json($records);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'general_settings_group_id' => 'required',
            'key' => 'required',
            'value' => 'required',
        ]);
        $general_setting =  GeneralSetting::find($id);
        $general_setting->general_settings_group_id = $request->general_settings_group_id;
        $general_setting->key = $request->key;
        $general_setting->value = $request->value;
        $general_setting->save();
        return response()->json($general_setting);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $deleteSetting = GeneralSetting::find($id);
        if ($deleteSetting) {
            $deleteSetting->delete();
            return response()->json(array('success' => true));
        }
    }
    public function deleteMultipleSetting(Request $request)
    {
        $ids = $request->ids;
        $deleteMultipleSetting = GeneralSetting::whereIn('id', $ids)->delete();
        if ($deleteMultipleSetting) {
            echo json_encode('success');
        }
    }
    public function AllGeneralSetting(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'general_settings_group_id',
            2 => 'key',
            3 => 'value'
        );

        $totalData = GeneralSetting::count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = GeneralSetting::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');
            $posts =  GeneralSetting::where('id', 'LIKE', "%{$search}%")
                ->orWhere('general_settings_group_id', 'LIKE', "%{$search}%")
                ->orWhere('key', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = GeneralSetting::where('id', 'LIKE', "%{$search}%")
                ->orWhere('general_settings_group_id', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        $status = "";
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['id'] = '<div class="app-radio" class="allData"><input type="checkbox" name="multiple_check"
                class="multiple_check" value="' . $post->id . '" /></div>';
                $nestedData['general_settings_group_id'] = $post->general_settings_group_id;
                $nestedData['key'] = $post->key;
                $nestedData['value'] = $post->value;
                $nestedData['action'] =
                    '<a href="" data-id="' . $post->id . '" class="editSetting"><button class="btn btn-success"><i
                    class="fa fa-pencil" aria-hidden="true"></i></button></a><a href="" data-id="' . $post->id . '" class="delete_setting"><button class="btn btn-danger"><i
                class="fa fa-trash" aria-hidden="true"></i></button></a>';
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );
        echo json_encode($json_data);
        exit;
    }
}
