<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomeOutgoing;

class IncomeOutgoingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('income_outgoing.income_outgoing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'type' => 'required',
            'sub_type' => 'required'
        ]);

        $income_outgoing = new IncomeOutgoing();
        $income_outgoing->question = $request->question;
        $income_outgoing->type = $request->type;
        $income_outgoing->sub_type = $request->sub_type;
        $income_outgoing->save();
        return response()->json($income_outgoing);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $type = ['Income', 'outgoing'];
        $records = IncomeOutgoing::all();
        return view('income_outgoing.income_outgoing')->with([
            'records' => $records,
            'type' => $type,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)

    {
        $data['Income'] = [
            "1" => "User Income Benefits",
            "2" => "User Income Pensions",
            "3" => "User Income Wages",
            "4" => "User Other Income"
        ];
        $data['outgoing'] = [
            "1" => "User Outgoing Questions",
            "2" => "ESSENTIAL EXPENDITURE",
            "3" => "HOUSEKEEPING",
            "4" => "PHONE",
            "5" => "TRAVEL",
            "6" => "OTHER EXP"
        ];

        $type = $request->type;
        $html = "";
        foreach ($data[$type] as $key => $value) {
            $html .= '<option value="' . $key . '">' . $value . '</option>';
        }
        return response()->json($html);
    }
    public function showType($id)

    {
        $records = IncomeOutgoing::find($id);
        $data['Income'] = [
            "1" => "User Income Benefits",
            "2" => "User Income Pensions",
            "3" => "User Income Wages",
            "4" => "User Other Income"
        ];
        $data['outgoing'] = [
            "1" => "User Outgoing Questions",
            "2" => "ESSENTIAL EXPENDITURE",
            "3" => "HOUSEKEEPING",
            "4" => "PHONE",
            "5" => "TRAVEL",
            "6" => "OTHER EXP"
        ];

        $type = $records->type;
        dd($type);
        $html = "";
        foreach ($data[$type] as $key => $value) {
            $html .= '<option value="' . $key . '">' . $value . '</option>';
        }
        return response()->json($html);
    }
    public function edit(Request $request)
    {

        $result = [];
        $id = $request->id;
        $html = '';
        $selected = '';
        $records = IncomeOutgoing::find($id);
        // dd($records->sub_type);
        $type = ['Income', 'outgoing'];
        $data['Income'] = [
            "1" => "User Income Benefits",
            "2" => "User Income Pensions",
            "3" => "User Income Wages",
            "4" => "User Other Income"
        ];
        $data['outgoing'] = [
            "1" => "User Outgoing Questions",
            "2" => "ESSENTIAL EXPENDITURE",
            "3" => "HOUSEKEEPING",
            "4" => "PHONE",
            "5" => "TRAVEL",
            "6" => "OTHER EXP"
        ];
        $type = $records->type;
        foreach ($data[$type] as $key => $value) {
            if ($key == $records->sub_type) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
            $html .= '<option value="' . $value . '" ' . $selected . '>' . $value . '</option>';
        }
        // dd($type);
        // if ($type == $records->type) {
        //     $html = "";
        //     foreach ($data[$type] as $key => $value) {
        //         $html .= '<option value="' . $key . '">' . $value . '</option>';
        //         // $html .= '<option value="' . $value . '" ' . $selected . '>' . $value . '</option>';
        //     }
        // }

        //     $html = "";
        // foreach ($data['Income'] as $key => $value) {
        //     $html .= '<option value="' . $key . '">' . $value . '</option>';
        //  }
        // $Permission = IncomeOutgoing::get();
        // $html .= '<div class="col-md-12">';
        // $html .= '<div class="row">';
        // $html .= '<div class="col-md-12">';
        // $html .= '<div class="form-group">';

        // $html .= '<input type="hidden" name="updated_id" id="updated_id" value="' . $records->id . '">';
        // $html .= '<label for="mobile">sub type: <span style="color:red">*</span></label>';
        // $html .= '<select class="form-control" name="type" id="type">';
        // $html .= '<option value="">Select type</option>';
        // foreach ($type as $key => $value) {

        //     if ($value == $records->type) {
        //         // dd($value);
        //         $selected = 'selected';
        //         // dd($selected);
        //     } else {
        //         $selected = '';
        //         // dd($selected);
        //     }
        //     $html .= '<option value="' . $value . '" ' . $selected . '>' . $value . '</option>';
        // }
        // $html .= '</select>';
        // $html .= '</div>';
        //     $html .= '<div class="form-group">';
        //     $html .= '<label for="mobile">sub_type Name: <span style="color:red">*</span></label>';
        //     $html .= '<input type="text" name="sub_type" id="sub_type" class="form-control"
        //    value="' . $records->sub_type . '">';
        //     // dd($records->sub_type);
        //     $html .= '</div>';
        //     $html .= '</div>';
        //     $html .= '</div>';
        //     $html .= '</div>';
        //     $html .= '</div>';
        return response()->json([
            'html' => $html,
            'records' => $records
        ]);
        // dd($html);
        // $type = $records['type'];
        // $data['Income'] = [
        //     "1" => "User Income Benefits",
        //     "2" => "User Income Pensions",
        //     "3" => "User Income Wages",
        //     "4" => "User Other Income"
        // ];
        // $data['outgoing'] = [
        //     "1" => "User Outgoing Questions",
        //     "2" => "ESSENTIAL EXPENDITURE",
        //     "3" => "HOUSEKEEPING",
        //     "4" => "PHONE",
        //     "5" => "TRAVEL",
        //     "6" => "OTHER EXP"
        // ];

        // $data[] = $records;
        // foreach ($data[$type] as $key => $value) {
        //     if ($key == $records['sub_type']) {
        //         // $data['sub_type'][$key] = array($records['sub_type'] => $value);
        //         $data['sub_type'][$key] =  $value;
        //     }
        // }

        // $data['updated_data'][] = $records;
        // $result['final_result'] = array_merge($data['updated_data'], $data['sub_type']);
        // return $result;
        // }
        // $result = [];
        // $id = $request->id;
        // $records = IncomeOutgoing::where('id', $id)->get()->toArray()[0];

        // $type = $records['type'];
        // $data['Income'] = [
        //     "1" => "User Income Benefits",
        //     "2" => "User Income Pensions",
        //     "3" => "User Income Wages",
        //     "4" => "User Other Income"
        // ];
        // $data['outgoing'] = [
        //     "1" => "User Outgoing Questions",
        //     "2" => "ESSENTIAL EXPENDITURE",
        //     "3" => "HOUSEKEEPING",
        //     "4" => "PHONE",
        //     "5" => "TRAVEL",
        //     "6" => "OTHER EXP"
        // ];

        // $data[] = $records;
        // foreach ($data[$type] as $key => $value) {
        //     if ($key == $records['sub_type']) {
        //         $data['updated_sub_type'][] = $value;
        //     }
        // }
        // $data['updated_data'][] = $records;
        // $result['final_result'] = array_merge($data['updated_sub_type'], $data['updated_data']);
        // return $result;
        // $result = [];
        // $id = $request->id;
        // $records = IncomeOutgoing::where('id', $id)->get()->toArray()[0];
        // // dd($records);
        // $type = $records['type'];
        // $data['Income'] = [
        //     "1" => "User Income Benefits",
        //     "2" => "User Income Pensions",
        //     "3" => "User Income Wages",
        //     "4" => "User Other Income"
        // ];
        // $data['outgoing'] = [
        //     "1" => "User Outgoing Questions",
        //     "2" => "ESSENTIAL EXPENDITURE",
        //     "3" => "HOUSEKEEPING",
        //     "4" => "PHONE",
        //     "5" => "TRAVEL",
        //     "6" => "OTHER EXP"
        // ];

        // $data[] = $records;
        // foreach ($data[$type] as $key => $value) {
        //     if ($key == $records['sub_type']) {
        //         $data[$type][] = $value;
        //     }
        // }
        // $data['updated_data'][] = $records;
        // $result['final_result'][] = array_merge_recursive($data[$type], $data['updated_data']);
        // // dd($result);
        // return response()->json($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editssss(Request $request)
    {

        $id = $request->id;
        $records = IncomeOutgoing::find($id);
        $type = $records->type;
        $Income = [
            "1" => "User Income Benefits",
            "2" => "User Income Pensions",
            "3" => "User Income Wages",
            "4" => "User Other Income"
        ];
        $outgoing = [
            "1" => "User Outgoing Questions",
            "2" => "ESSENTIAL EXPENDITURE",
            "3" => "HOUSEKEEPING",
            "4" => "PHONE",
            "5" => "TRAVEL",
            "6" => "OTHER EXP"
        ];
        $data = [];
        if ($type == "Income") {
            foreach ($Income as $key => $value) {
                if ($key == $records->sub_type) {
                    $data[] = [$key => $value];
                }
            }
        } else {
            foreach ($outgoing as $key => $value) {
                if ($key == $records->sub_type) {
                    $data[] = [$key => $value];
                }
            }
        }

        $data[] = $records;
        return response()->json($data);
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
            'question' => 'required',
            'type' => 'required',
            'sub_type' => 'required'
        ]);
        $incomeOutgoingUpdate = IncomeOutgoing::find($id);
        $incomeOutgoingUpdate->question = $request->question;
        $incomeOutgoingUpdate->type = $request->type;
        $incomeOutgoingUpdate->sub_type = $request->sub_type;
        $incomeOutgoingUpdate->save();
        return response()->json($incomeOutgoingUpdate);
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
        $deleteQue = IncomeOutgoing::find($id);
        if ($deleteQue) {
            $deleteQue->delete();
            return response()->json(array('success' => true));
        }
    }
    public function deleteMultipleQuestion(Request $request)
    {
        $ids = $request->ids;
        $deleteMultipleQuestion = IncomeOutgoing::whereIn('id', $ids)->delete();
        if ($deleteMultipleQuestion) {
            echo json_encode('success');
        }
    }
    public function allIncomeOutgoings(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'question',
            2 => 'type',
            3 => 'sub_type'
        );
        $totalData = IncomeOutgoing::count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = IncomeOutgoing::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');
            $posts =  IncomeOutgoing::where('id', 'LIKE', "%{$search}%")
                ->orWhere('question', 'LIKE', "%{$search}%")
                ->orWhere('type', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = IncomeOutgoing::where('id', 'LIKE', "%{$search}%")
                ->orWhere('question', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        $status = "";
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['id'] = '<div class="app-radio" class="allData"><input type="checkbox" name="multiple_check"
                class="multiple_check" value="' . $post->id . '" /></div>';
                $nestedData['question'] = $post->question;
                $nestedData['sub_type'] = $post->sub_type;
                $nestedData['type'] = $post->type;
                $nestedData['action'] =
                    '<a href="" data-id="' . $post->id . '" class="edit_question"><button class="btn btn-success"><i
                    class="fa fa-pencil" aria-hidden="true"></i></button></a><a href="" data-id="' . $post->id . '" class="delete_question"><button class="btn btn-danger"><i
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
