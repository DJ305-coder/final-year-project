<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\States;
use App\Models\City;
use DataTables;
use Crypt;
use Arr;
use App\Library\LogActivity;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  This function is to show city page with country data
    public function index()
    {
        // get country data
        $countries = Country::where('status', 'active')->select('id','country_name')->orderBy('id', 'DESC')->get();

        // view
        return view('admin/master/city/vw_city' , compact('countries'));
    }

    // This function is for datatable
    public function data_table(Request $request)
    {
        // cities data along with country and states in datatable   
        $cities = City::where('status', '!=', 'delete')->orderBy('id', 'DESC')->select('id','country_id','state_id','city_name','status')->with(['country','states'])->get();

        if ($request->ajax()) {
            return DataTables::of($cities)
            ->addIndexColumn()
            ->addColumn('country_name', function ($row){
                if(!empty($row->country_id)){
                    return $row->country->country_name;
                }else{
                    return '-';
                }
            })
            ->addColumn('state_name', function ($row){
                if(!empty($row->state_id)){
                    return $row->states->state_name;
                }else{
                    return '-';
                }
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '<a href="' . url('city/' . Crypt::encrypt($row->id) . '/edit') . '"> <button type="button" data-id="' . $row->id . '" class="btn btn-warning btn-xs Edit_button" title="Edit"><i class="fa fa-pencil"></i></button></a> 
                                <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="trenta_master_city" data-flash="State Deleted Successfully!" class="btn btn-danger delete btn-xs" title="Delete"><i class="fa fa-trash"></i></a>';
                return $actionBtn;
            })
            ->addColumn('status', function ($row) {
                if ($row->status == 'active') {
                    $statusActiveBtn = '<a href="javascript:void(0)"  data-id="' . $row->id . '" data-table="trenta_master_city" data-flash="Status Changed Successfully!"  class="change-status"  ><i class="fa fa-toggle-on tgle-on  status_button" aria-hidden="true" title=""></i></a>';
                    return $statusActiveBtn;
                } else {
                    $statusBlockBtn = '<a href="javascript:void(0)"  data-id="' . $row->id . '" data-table="trenta_master_city" data-flash="Status Changed Successfully!" class="change-status" ><i class="fa fa-toggle-off tgle-off  status_button" aria-hidden="true" title=""></></a>';
                    return $statusBlockBtn;
                }
            })
            ->rawColumns(['state_name','country_name','action', 'status'])
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
    // This function is to store or update data
    public function store(Request $request)
    {
        // validations
        $request->validate([
            'country_id' => 'required|numeric',
            'state_id' => 'required|numeric',
            'city_name' => 'required'
        ]);
        $input = $request->all();
        $txtpkey = $input['txtpkey'];
        $old_data = City::find($txtpkey);
        if(!empty($txtpkey)){
            $check_id = City::where('id','!=',$txtpkey)
                    ->where('country_id','=',$request->country_id)
                    ->where('state_id','=',$request->state_id)
                    ->where('city_name','=',$request->city_name)
                    ->where('status','!=','delete')
                    ->first();
            if(!empty($check_id)){
                return redirect('/city')->with('error', 'This city already exists under this country and state.');
            }else{
                //update City
                $input['modified_by'] = auth()->guard('admin')->user()->id;
                $input['modified_ip_address'] = $request->ip();
                $input = Arr::except($input,['_token','txtpkey']);
                $Md_city = City::where('id',$txtpkey)->update($input);
                $new_data = City::find($id);
                LogActivity::AdminLog(json_encode($new_data),json_encode($old_data),'City','update','admin');
                return redirect('/city')->with('success','State updated successfully!');
            }
        }else{
            //create City
            $check_duplicate = City::where(['country_id'=>$input['country_id'],'state_id'=> $input['state_id'],'city_name'=> $input['city_name']])->where('status','!=','delete')->get();
            if(($check_duplicate)->isEmpty()){
                $input['created_by'] = auth()->guard('admin')->user()->id;
                $input['created_ip_address'] = $request->ip();
                $Md_city = City::create($input);
                LogActivity::AdminLog(json_encode($Md_city),Null,'City','create','admin');
                return redirect('/city')->with('success','City added successfully!');
            }else{
                return redirect('/city')->with('error','This City already exists under this country and state!');
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
    public function city_exists(Request $request)
    {
    
        if($request->ajax()){
            $city_name = City::where('city_name','=',$request->city_name)
                    ->where('country_id',$request->country_id)
                    ->where('state_id',$request->state_id)
                    ->where('status','!=','delete')
                    ->select('city_name');
                    if(!empty($request->txtpkey)){
                        $city_name = $city_name->where('id','!=',$request->txtpkey);
                    }
                    $city_name = $city_name->first();

                    return !empty($city_name) ? 'false' : 'true';
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
    // this function is to get to the edit form section
    public function edit($id)
    {
        // decrypt id and get data from all tables
        $id = Crypt::decrypt($id);
        $city = City::find($id,['country_id','state_id','id','city_name']);
        $countries = Country::where(['status'=> 'active'])->select('id','country_name')->orderBy('id', 'DESC')->get();
        $states = States::where(['status' => 'active','country_id'=>$city->country_id])->select('id','state_name')->orderBy('id', 'DESC')->get();
        return view('admin/master/city/vw_city', compact('states','countries','city'));
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
