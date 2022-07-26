<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainShoppingCategory;
use DataTables;
use Crypt;
use Str;
use App\Models\CategoryBanner;
use App\Library\LogActivity;
class MainShoppingCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.master.online_shopping.vw_online_shopping_main_category');
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
        //
        $request->validate([
            'main_shopping_category_name' => 'required',
        ]);

        $id = $request->txtpkey;
        $old_data = MainShoppingCategory::find($id);
        if(!empty($id)){
            $check_id = MainShoppingCategory::where('id','!=',$id)
                                ->where('main_shopping_category_name','=',$request->main_shopping_category_name)
                                ->where('status','!=','delete')
                                ->first();
            if(!empty($check_id)){
                return redirect('online-shopping-main-category')->with('error','This category already exists!!');
            }else{
                if($request->has('category_image')){
                    $filename = time().'.'.$request->file('category_image')->getClientOriginalExtension();
                    $filePath = $request->file('category_image')->storeAs('public/category',$filename);  
                    $input['category_image'] = $filePath;
                } 
                $input['main_shopping_category_name'] = $request->main_shopping_category_name;
                $input['category_image'] = $filePath;
                $input['modified_by'] = auth()->guard('admin')->user()->id;
                $input['modified_ip_address'] = $request->ip();
                $result = MainShoppingCategory::find($id)->update($input);
                $new_data = MainShoppingCategory::find($id);
                LogActivity::AdminLog(json_encode($new_data),json_encode($old_data),'Main Shopping Category','update','admin'); 
                return redirect('online-shopping-main-category')->with('success','Category updated successfully!');
            }
        }else{

            $check_duplicate = MainShoppingCategory::where('main_shopping_category_name', $request->main_shopping_category_name)
                                        ->where('status','!=','delete')
                                        ->get();
            if(($check_duplicate)->isEmpty()){
                if($request->has('category_image')){
                    $filename = time().'.'.$request->file('category_image')->getClientOriginalExtension();
                    $filePath = $request->file('category_image')->storeAs('public/category',$filename);  
                    $input['category_image'] = $filePath;
                } 
                $input['main_shopping_category_name'] = $request->main_shopping_category_name;
                $input['main_shopping_category_name'] = $request->main_shopping_category_name;
                $input['created_by'] = auth()->guard('admin')->user()->id;
                $input['created_ip_address'] = $request->ip();
        
                $result = MainShoppingCategory::create($input);
                LogActivity::AdminLog(json_encode($result),Null,'Main Shopping Category','create','admin');
                return redirect('online-shopping-main-category')->with('success','Category added successfully!');
            }else{
                return redirect('online-shopping-main-category')->with('error','This category already exists!');
            }                          
        }
    }

    public function data_table(Request $request){
          
        $countries = MainShoppingCategory::where('status', '!=', 'delete')->orderBy('id', 'DESC')->get();
        if ($request->ajax()) {
            return DataTables::of($countries)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . url('online-shopping-main-category/' . Crypt::encrypt($row->id) . '/edit') . '"> <button type="button" data-id="' . $row->id . '" class="btn btn-warning btn-xs Edit_button" title="Edit"><i class="fa fa-pencil"></i></button></a> 
                                  <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="trenta_master_main_shopping_category" data-flash="Category Deleted Successfully!" class="btn btn-danger delete btn-xs" title="Delete"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 'active') {
                        $statusActiveBtn = '<a href="javascript:void(0)"  data-id="' . $row->id . '" data-table="trenta_master_main_shopping_category" data-flash="Status Changed Successfully!"  class="change-status"  ><i class="fa fa-toggle-on tgle-on  status_button" aria-hidden="true" title=""></i></a>';
                        return $statusActiveBtn;
                    } else {
                        $statusBlockBtn = '<a href="javascript:void(0)"  data-id="' . $row->id . '" data-table="trenta_master_main_shopping_category" data-flash="Status Changed Successfully!" class="change-status" ><i class="fa fa-toggle-off tgle-off  status_button" aria-hidden="true" title=""></></a>';
                        return $statusBlockBtn;
                    }
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
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

    // check duplicate data for client side
    public function main_category_exists(Request $request)
    {
        if($request->ajax()){    
            $main_category_name = MainShoppingCategory::where('main_shopping_category_name','=',$request->main_shopping_category_name)
                    ->where('status','!=','delete')
                    ->select('main_shopping_category_name');
                    if(!empty($request->txtpkey)){
                        $main_category_name = $main_category_name->where('id','!=',$request->txtpkey);
                    }
                    $main_category_name = $main_category_name->first();

                return !empty($main_category_name) ? 'false' : 'true';      
        }else{
            return 'No direct scripts are allowed';
        }

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
        $main_shopping_category = MainShoppingCategory::find($id,['main_shopping_category_name','category_image','id']);
        
        return view('admin.master.online_shopping.vw_online_shopping_main_category', compact('main_shopping_category'));
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
