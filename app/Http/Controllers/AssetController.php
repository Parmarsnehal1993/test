<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('asset.asset');
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
        ]);
        $asset = new Asset();
        $asset->display_name = $request->display_name;
        $asset->name =  str_replace(" ", "_", strtolower($request->display_name));
        $asset->save();
        // return response()->json($asset);
        return response()->json(['message' => 'Asset add successfully'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $records = Asset::all();
        // return view('asset.asset')->with('records', $records);
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
    public function edit(Asset $records)
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
            'display_name' => 'required',
        ]);
        $asset =  Asset::find($id);
        $asset->display_name = $request->display_name;
        $asset->name =  str_replace(" ", "_", strtolower($request->display_name));
        $asset->save();
        // return response()->json($asset);
        return response()->json(['message' => 'Asset updated successfully'], 200);
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
        $delete_asset = Asset::find($id);
        if ($delete_asset) {
            $delete_asset->delete();
            // return response()->json(array('success' => true));
            return response()->json(['message' => 'Asset deleted successfully'], 200);
        }
        // return response()->json(['message' => 'Asset deleted successfully'], 200);
    }
    public function deleteAllasset(Request $request)
    {
        $ids = $request->ids;
        $deleteMultipleAsset = Asset::whereIn('id', $ids)->delete();
        if ($deleteMultipleAsset) {
            echo json_encode('success');
        }
    }
    public function allAssets(Request $request)
    {

        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'display_name',
        );

        $totalData = Asset::count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        if (empty($request->input('search.value'))) {
            $posts = Asset::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts =  Asset::where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('display_name', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Asset::where('id', 'LIKE', "%{$search}%")
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
                $nestedData['action'] =
                    '<a href="" data-id="' . $post->id . '" class="edit_assets"><button class="btn btn-success"><i
                    class="fa fa-pencil" aria-hidden="true"></i></button></a><a href="" data-id="' . $post->id . '" class="delete_asset"><button class="btn btn-danger"><i
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
