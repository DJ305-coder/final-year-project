<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\States;
use App\Models\Country;
use DataTables;
use Crypt;
use Arr;
use App\Library\LogActivity;
class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::where('status', 'active')->select('id','country_name')->orderBy('id', 'DESC')->get();
        return view('admin/master/states/vw_states' , compact('countries'));
    }

    public function data_table(Request $request){
          
        $states = States::where('status', '!=', 'delete')->orderBy('id', 'DESC')->select('id','country_id','state_name','status')->with('country')->get();
       
        if ($request->ajax()) {
            return DataTables::of($states)
            ->addIndexColumn()
            ->addColumn('country_name', function ($row){
                return !empty($row->country_id) ? $row->country->country_name : '-';
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '<a href="' . url('states/' . Crypt::encrypt($row->id) . '/edit') . '"> <button type="button" data-id="' . $row->id . '" class="btn btn-warning btn-xs Edit_button" title="Edit"><i class="fa fa-pencil"></i></button></a> 
                                <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="trenta_master_states" data-flash="State Deleted Successfully!" class="btn btn-danger delete btn-xs" title="Delete"><i class="fa fa-trash"></i></a>';
                return $actionBtn;
            })
            ->addColumn('status', function ($row) {
                if ($row->status == 'active') {
                    $statusActiveBtn = '<a href="javascript:void(0)"  data-id="' . $row->id . '" data-table="trenta_master_states" data-flash="Status Changed Successfully!"  class="change-status"  ><i class="fa fa-toggle-on tgle-on  status_button" aria-hidden="true" title=""></i></a>';
                    return $statusActiveBtn;
                } else {
                    $statusBlockBtn = '<a href="javascript:void(0)"  data-id="' . $row->id . '" data-table="trenta_master_states" data-flash="Status Changed Successfully!" class="change-status" ><i class="fa fa-toggle-off tgle-off  status_button" aria-hidden="true" title=""></></a>';
                    return $statusBlockBtn;
                }
            })
            ->rawColumns(['country_name','action', 'status'])
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
        $request->validate([
            'country_id' => 'required|numeric',
            'state_name' => 'required',
        ]);
        $input = $request->all();
        $txtpkey = $input['txtpkey'];
        $old_data = States::find($txtpkey);
        if(!empty($txtpkey)){
            $check_id = States::where('id','!=',$txtpkey)
                    ->where('country_id','=',$request->country_id)
                    ->where('state_name','=',$request->state_name)
                    ->where('status','!=','delete')
                    ->first();
            if(!empty($check_id)){
                return redirect('/states')->with('error', 'This state already exists under this country.');
            }else{
                //update State
                $input['modified_by'] = auth()->guard('admin')->user()->id;
                $input['modified_ip_address'] = $request->ip();
                $input = Arr::except($input,['_token','txtpkey']);
                $Md_states = States::where('id',$txtpkey)->update($input);
                $new_data = States::find($id);
                LogActivity::AdminLog(json_encode($new_data),json_encode($old_data),'States','update','admin');
                return redirect('/states')->with('success','State updated successfully!');
            }
        }else{
            //create State
            $check_duplicate = States::where('country_id',$input['country_id'])
                                    ->where('state_name', $input['state_name'])
                                    ->where('status','!=','delete')
                                    ->get();
            if(($check_duplicate)->isEmpty()){
                $input['created_by'] = auth()->guard('admin')->user()->id;
                $input['created_ip_address'] = $request->ip();
                $Md_states = States::create($input);   
                LogActivity::AdminLog(json_encode($Md_states),Null,'States','create','admin');
                return redirect('/states')->with('success','State added successfully!');
            }else{
                return redirect('/states')->with('error','This state already exists under this country!');
            }
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
    public function state_exists(Request $request)
    {
        if($request->ajax()){ 
            $state_name = States::where('state_name','=',$request->state_name)
                    ->where('country_id',$request->country_id)
                    ->where('status','!=','delete')
                    ->select('state_name');
                    if(!empty($request->txtpkey)){
                        $state_name = $state_name->where('id','!=',$request->txtpkey);
                    }
                    $state_name = $state_name->first();

                    return !empty($state_name) ? 'false' : 'true';
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
        $id = Crypt::decrypt($id);
        $state = States::find($id,['country_id','state_name','id']);
        $countries = Country::where(['status'=>'active'])->select('id','country_name')->orderBy('id', 'DESC')->get();
        return view('admin/master/states/vw_states', compact('state','countries'));
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
