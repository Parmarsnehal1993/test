<?php

namespace App\Http\Controllers;

use App\Models\DebtType;
use Illuminate\Http\Request;

class DebtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('debt_type.debt_type');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'display_name' => 'required',
            'type' => 'required'
        ]);
        $add_debt = new DebtType();
        $add_debt->display_name = $request->display_name;
        $add_debt->name =  str_replace(" ", "_", strtolower($request->display_name));
        $add_debt->type = $request->type;
        $add_debt->save();
        return response()->json($add_debt);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $records = DebtType::all();
        return view('debt_type.debt_type')->with('records', $records);
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
    public function edit(DebtType $records)
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
    public function update(Request $request, $id)
    {
        $id = $request->id;
        $request->validate([
            'display_name' => 'required',
            'type' => 'required'
        ]);
        $updateDebt = DebtType::find($id);
        $updateDebt->display_name = $request->display_name;
        $updateDebt->name =  str_replace(" ", "_", strtolower($request->display_name));
        $updateDebt->type = $request->type;
        $updateDebt->save();
        return response()->json($updateDebt);
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
        $delete_debt = DebtType::find($id);
        if ($delete_debt) {
            $delete_debt->delete();
            return response()->json(array('success' => true));
        }
    }
    public function allDebtType(Request $request)
    {

        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'display_name',
            3 => 'type',
        );

        $totalData = DebtType::count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = DebtType::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts =  DebtType::where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('type', 'LIKE', "%{$search}%")
                ->orWhere('display_name', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = DebtType::where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        $status = "";
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['id'] = '<div class="app-radio" class="allData"><input type="checkbox" name="multiple_check"
                class="multiple_check" value="' . $post->id . '" /></div>';
                $nestedData['name'] = $post->name;
                $nestedData['display_name'] = $post->display_name;
                $nestedData['type'] = strtolower($post->type);
                $nestedData['action'] =
                    '<a href="" data-id="' . $post->id . '" class="edit_debt"><button class="btn btn-success"><i
                    class="fa fa-pencil" aria-hidden="true"></i></button></a><a href="" data-id="' . $post->id . '" class="delete_debt"><button class="btn btn-danger"><i
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
    public function deleteAllDebt(Request $request)
    {
        $ids = $request->ids;
        $deleteMultipleRecord = DebtType::whereIn('id', $ids)->delete();
        if ($deleteMultipleRecord) {
            echo json_encode('success');
        }
    }
}
