<?php

namespace App\Http\Controllers;

use App\Models\GeneralSettingsGroup;
use Illuminate\Http\Request;

class GeneralSettingGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('general_setting_group.general_setting_group');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $request->validate([
            'group_display_name' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);
        $general_group = new GeneralSettingsGroup();
        $general_group->group_display_name = $request->group_display_name;
        $general_group->group_name = str_replace(" ", "_", strtolower($request->group_display_name));
        $general_group->title = $request->title;
        $general_group->description = $request->description;
        $general_group->save();
        return response()->json($general_group);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $records = GeneralSettingsGroup::all();
        return view('general_setting_group.general_setting_group')->with('records', $records);
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
    public function edit(GeneralSettingsGroup $records)
    {
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
            'group_display_name' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);
        $UpdateGeneralGroup = GeneralSettingsGroup::find($id);
        $UpdateGeneralGroup->group_display_name = $request->group_display_name;
        $UpdateGeneralGroup->group_name = str_replace(" ", "_", strtolower($request->group_display_name));
        $UpdateGeneralGroup->title = $request->title;
        $UpdateGeneralGroup->description = $request->description;
        $UpdateGeneralGroup->save();
        return response()->json($UpdateGeneralGroup);
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
        $deleteGroup = GeneralSettingsGroup::find($id);
        if ($deleteGroup) {
            $deleteGroup->delete();
            return response()->json(array('success' => true));
        }
    }
    public function deleteMultipleGroup(Request $request)
    {
        $ids = $request->ids;
        $deleteMultipleGroup = GeneralSettingsGroup::whereIn('id', $ids)->delete();
        if ($deleteMultipleGroup) {
            echo json_encode('success');
        }
    }
    public function AllGeneralSettingGroup(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'group_name',
            2 => 'group_display_name',
            3 => 'title',
            4 => 'description'
        );

        $totalData = GeneralSettingsGroup::count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = GeneralSettingsGroup::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');
            $posts =  GeneralSettingsGroup::where('id', 'LIKE', "%{$search}%")
                ->orWhere('group_name', 'LIKE', "%{$search}%")
                ->orWhere('group_display_name', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = GeneralSettingsGroup::where('id', 'LIKE', "%{$search}%")
                ->orWhere('group_name', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        $status = "";
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['id'] = '<div class="app-radio" class="allData"><input type="checkbox" name="multiple_check"
                class="multiple_check" value="' . $post->id . '" /></div>';
                $nestedData['group_name'] = $post->group_name;
                $nestedData['group_display_name'] = $post->group_display_name;
                $nestedData['title'] = $post->title;
                $nestedData['description'] = $post->description;
                $nestedData['action'] =
                    '<a href="" data-id="' . $post->id . '" class="editGroup"><button class="btn btn-success"><i
                    class="fa fa-pencil" aria-hidden="true"></i></button></a><a href="" data-id="' . $post->id . '" class="delete_general_group"><button class="btn btn-danger"><i
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
