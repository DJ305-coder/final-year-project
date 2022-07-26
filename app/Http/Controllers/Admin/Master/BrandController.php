<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use DataTables;
use Crypt;
use App\Library\LogActivity;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin/master/brand/add_brand');
    }

    public function data_table(Request $request){
          
        $data = Brand::where('status', '!=', 'delete')->select('brand_name','id','status')->orderBy('id', 'DESC')->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . url('add-brand/' . Crypt::encrypt($row->id) . '/edit') . '"> <button type="button" data-id="' . $row->id . '" class="btn btn-warning btn-xs Edit_button" title="Edit"><i class="fa fa-pencil"></i></button></a> 
                                  <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="trenta_master_brand" data-flash="Brand Deleted Successfully!" class="btn btn-danger delete btn-xs" title="Delete"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 'active') {
                        $statusActiveBtn = '<a href="javascript:void(0)"  data-id="' . $row->id . '" data-table="trenta_master_brand" data-flash="Status Changed Successfully!"  class="change-status"  ><i class="fa fa-toggle-on tgle-on  status_button" aria-hidden="true" title=""></i></a>';
                        return $statusActiveBtn;
                    } else {
                        $statusBlockBtn = '<a href="javascript:void(0)"  data-id="' . $row->id . '" data-table="trenta_master_brand" data-flash="Status Changed Successfully!" class="change-status" ><i class="fa fa-toggle-off tgle-off  status_button" aria-hidden="true" title=""></></a>';
                        return $statusBlockBtn;
                    }
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //checking server side validation
         $request->validate([
            'brand_name' => 'required',
        ]);
        $id = $request->txtpkey;
        $old_data = Brand::find($id);
        if(!empty($id)){
            $check_id = Brand::where('id','!=',$id)
                                ->where('brand_name','=',$request->brand_name)
                                ->where('status','!=','delete')
                                ->first();
            if(!empty($check_id)){
                return redirect('/add-brand')->with('error', 'This brand already exists!');
            }else{
                //update size
                $input['brand_name'] = $request->brand_name;
                $input['modified_by'] = auth()->guard('admin')->user()->id;
                $input['modified_ip_address'] = $request->ip();
                Brand::find($id)->update($input);
                $new_data = Brand::find($id);
                LogActivity::AdminLog(json_encode($new_data),json_encode($old_data),'Brand','update','admin');
                return redirect('/add-brand')->with('success','Size updated successfully!');
            }

        }else{
            //create size-
            $check_duplicate = Brand::where('brand_name', $request->brand_name)
                                        ->where('status','!=','delete')
                                        ->get();
            if(($check_duplicate)->isEmpty()){
                $input['brand_name'] = $request->brand_name;
                $input['created_by'] = auth()->guard('admin')->user()->id;
                $input['created_ip_address'] = $request->ip();
                $Md_brand = Brand::create($input);
                LogActivity::AdminLog(json_encode($Md_brand),Null,'Brand','create','admin');
                return redirect('/add-brand')->with('success','Brand added successfully!');
            }else{
                return redirect('/add-brand')->with('error','This size already exists!');
            }
        }
    }


    public function brand_exists(Request $request)
    {
        if($request->ajax()){
            $brand_name = Brand::where('brand_name','=',$request->brand_name)
                    ->where('status','!=','delete')
                    ->select('brand_name');
            if(!empty($request->txtpkey)){
                $brand_name = $brand_name->where('id','!=',$request->txtpkey);
            }
            $brand_name = $brand_name->first();
            return !empty($brand_name) ?  "false" :  "true";
        }else{
            return 'No direct scripts are allowed';
        }
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
    public function edit($id)
    {
        //
        $id = Crypt::decrypt($id);
        $brand = Brand::find($id,['brand_name','id']);
        return view('admin/master/brand/add_brand', compact('brand'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
