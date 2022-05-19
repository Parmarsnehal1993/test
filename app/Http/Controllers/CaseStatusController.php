<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaseStatus;
use Illuminate\Support\Facades\Redirect;

class CaseStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);
        $case = new CaseStatus();
        $case->code = strtolower($request->name);
        $case->name = $request->name;
        $case->status = $request->status;
        $case->save();
        return response()->json($case);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        $records = CaseStatus::all();
        // return view('case_status.case_status')->with('records', $records);
        return response()->json($records);
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
    public function edit(CaseStatus $records)
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
            'name' => 'required',
            'status' => 'required'
        ]);
        $updateCase = CaseStatus::find($id);
        $updateCase->code = strtolower($request->name);
        $updateCase->name = $request->name;
        $updateCase->status = $request->status;
        $updateCase->save();
        return response()->json($updateCase);
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $row = CaseStatus::find($id);
        if ($row) {
            $row->delete();
            return response()->json(array('success' => true));
        }
        return Redirect::back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $deleteMultipleRecord = CaseStatus::whereIn('id', $ids)->delete();
        if ($deleteMultipleRecord) {
            echo json_encode('success');
        }
    }
    public function activeAll(Request $request)
    {
        $ids = $request->ids;
        $updateStatus = CaseStatus::whereIn('id', $ids)->update(array('status' => '1'));
        if ($updateStatus) {
            echo json_encode('success');
        } else {
            echo json_encode('failed');
        }
    }
    public function inactiveAll(Request $request)
    {
        $ids = $request->ids;
        $updateStatus = CaseStatus::whereIn('id', $ids)->update(array('status' => '0'));
        if ($updateStatus) {
            echo json_encode('success');
        } else {
            echo json_encode('failed');
        }
    }
    public function allCaseStatus(Request $request)
    {

        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'code',
            3 => 'status',
        );

        $totalData = CaseStatus::count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = CaseStatus::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts =  CaseStatus::where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = CaseStatus::where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        $status = "";
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $status = $post->status;
                if ($post->status == "0") {
                    $status = "<label class='badge badge-pill badge-info' style='font-size: 15px; width: 100px;'>Inactive</label>";
                } else if ($post->status == "1") {
                    $status = "<label class='badge badge-pill badge-success' style='font-size: 15px; width: 100px;'>Active</label>";
                }
                $nestedData['id'] = '<div class="app-radio" class="allData"><input type="checkbox" name="multiple_check"
                class="multiple_check" value="' . $post->id . '" /></div>';
                $nestedData['name'] = $post->name;
                $nestedData['code'] = str_replace('_', ' ', $post->code);
                $nestedData['status'] = "<div id='status_" . $post->id . "'>$status</div>";
                $nestedData['action'] =
                    '<a href="" data-id="' . $post->id . '" class="edit_record"><button class="btn btn-success"><i
                    class="fa fa-pencil" aria-hidden="true"></i></button></a><a href="" data-id="' . $post->id . '" class="delete_record"><button class="btn btn-danger"><i
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
