<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\States;
use App\Models\City;
use App\Models\Area;
use DataTables;
use Crypt;
use Arr;
use App\Library\LogActivity;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get country data
        $countries = Country::where('status', 'active')->select('id','country_name')->orderBy('id', 'DESC')->get();

        // view
        return view('admin/master/area/vw_area' , compact('countries'));
    }

    // This function is for datatable
    public function data_table(Request $request)
    {
        // Area data along with country,states and cities in datatable   
        $areas = Area::where('status', '!=', 'delete')->orderBy('id', 'DESC')->select('id','country_id','state_id','city_id','area_name','pincode','status')->with(['country','states','cities'])->get();

        if ($request->ajax()) {
            return DataTables::of($areas)
            ->addIndexColumn()
            ->addColumn('country_name', function ($row){
                return !empty($row->country_id) ? $row->country->country_name : '-'; 
            })
            ->addColumn('state_name', function ($row){
                return !empty($row->state_id) ? $row->states->state_name : '-'; 
            })
            ->addColumn('city_name', function ($row){
                return !empty($row->city_id) ? $row->cities->city_name : '-'; 
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '<a href="' . url('area/' . Crypt::encrypt($row->id) . '/edit') . '"> <button type="button" data-id="' . $row->id . '" class="btn btn-warning btn-xs Edit_button" title="Edit"><i class="fa fa-pencil"></i></button></a> 
                                <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="trenta_master_area" data-flash="Area Deleted Successfully!" class="btn btn-danger delete btn-xs" title="Delete"><i class="fa fa-trash"></i></a>';
                return $actionBtn;
            })
            ->addColumn('status', function ($row) {
                if ($row->status == 'active') {
                    $statusActiveBtn = '<a href="javascript:void(0)"  data-id="' . $row->id . '" data-table="trenta_master_area" data-flash="Status Changed Successfully!"  class="change-status"  ><i class="fa fa-toggle-on tgle-on  status_button" aria-hidden="true" title=""></i></a>';
                    return $statusActiveBtn;
                } else {
                    $statusBlockBtn = '<a href="javascript:void(0)"  data-id="' . $row->id . '" data-table="trenta_master_area" data-flash="Status Changed Successfully!" class="change-status" ><i class="fa fa-toggle-off tgle-off  status_button" aria-hidden="true" title=""></></a>';
                    return $statusBlockBtn;
                }
            })
            ->rawColumns(['city_name','state_name','country_name','action', 'status'])
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
        // validations
        $request->validate([
            'country_id' => 'required|numeric',
            'state_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'area_name' => 'required',
            'pincode' =>'required|digits:6'
        ]);
        $input = $request->all();
        $txtpkey = $input['txtpkey'];
        $old_data = Area::find($txtpkey);
        if(!empty($input['txtpkey'])){
            $check_id = Area::where('id','!=',$txtpkey)
                    ->where('country_id','=',$request->country_id)
                    ->where('state_id','=',$request->state_id)
                    ->where('city_id','=',$request->city_id)
                    ->where('area_name','=',$request->area_name)
                    ->where('status','!=','delete')
                    ->first();
            if(!empty($check_id)){
                return redirect('/area')->with('error', 'This area already exists under this country, state and city');
            }else{
                //update City
                $input['modified_by'] = auth()->guard('admin')->user()->id;
                $input['modified_ip_address'] = $request->ip();
                $input = Arr::except($input,['_token','txtpkey']);
                $Md_area = Area::where('id',$txtpkey)->update($input);
                
                $new_data = Area::find($txtpkey);
                LogActivity::AdminLog(json_encode($new_data),json_encode($old_data),'Area','update','admin');
                return redirect('/area')->with('success','Area updated successfully!');
            }
        }else{
            //create City
            $check_duplicate = Area::where(['country_id'=>$input['country_id'],'state_id'=> $input['state_id'],'city_id'=> $input['city_id'],'area_name'=> $input['area_name']])->where('status','!=','delete')->get();
            if(($check_duplicate)->isEmpty()){
                $input['created_by'] = auth()->guard('admin')->user()->id;
                $input['created_ip_address'] = $request->ip();
                $Md_area = Area::create($input);
                LogActivity::AdminLog(json_encode($Md_area),Null,'Area','create','admin');
                return redirect('/area')->with('success','Area added successfully!');
            }else{
                return redirect('/area')->with('error','This Area already exists under this country,state and city!');
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
    public function area_exists(Request $request)
    {
        if($request->ajax()){
            $area_name = Area::where('area_name','=',$request->area_name)
                    ->where('country_id',$request->country_id)
                    ->where('state_id',$request->state_id)
                    ->where('city_id',$request->city_id)
                    ->where('status','!=','delete')
                    ->select('area_name');
                    if(!empty($request->txtpkey)){
                        $area_name = $area_name->where('id','!=',$request->txtpkey);
                    }
                    $area_name = $area_name->first();

                    return !empty($area_name) ? 'false' : 'true';
        }else{
            return 'No direct scripts are allowed';
        }

    }

    public function pincode_exists(Request $request)
    {
        if($request->ajax()){
            $pincode = Area::where('pincode','=',$request->pincode)
                    ->where('status','!=','delete')
                    ->select('pincode');
                    if(!empty($request->txtpkey)){
                        $pincode = $pincode->where('id','!=',$request->txtpkey);
                    }
                    $pincode = $pincode->first();

                    return !empty($pincode) ? 'false' : 'true';
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
        //  decrypt id and get data from all tables
        $id = Crypt::decrypt($id);
        $area = Area::find($id,['id','country_id','state_id','city_id','area_name','pincode']);
        $countries = Country::where(['status'=> 'active'])->select('id','country_name')->orderBy('id', 'DESC')->get();
        $states = States::where(['status' => 'active','country_id'=>$area->country_id])->select('id','state_name')->orderBy('id', 'DESC')->get();
        $cities = City::where(['status' => 'active','country_id'=>$area->country_id,'state_id'=>$area->state_id])->select('id','city_name')->orderBy('id', 'DESC')->get();
        return view('admin/master/area/vw_area', compact('states','countries','cities','area'));
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
