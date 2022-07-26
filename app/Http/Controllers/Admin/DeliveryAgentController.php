<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeliveryAgent;
use App\Models\Country;
use App\Models\States;
use App\Models\City;
use DataTables;
use Crypt;
use Storage;
use Str;
use App\Library\LogActivity;

class DeliveryAgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::where('status','=','active')->get();
        $states = States::where('status','=','active')->get();
        //
        return view('admin/delivery_agent/add_delivery_agent',compact('countries','states'));
    }

    public function deliver_agent_list(){
        return view('admin/delivery_agent/delivery_agent');
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
            'name' => 'required',
            'email' => 'required|email',
            'mobile_number' => 'required|digits:10',
            'dob' => 'required|date',
            'gender' => 'required',
            'salary' => 'required|numeric',
            'country_id' => 'required|numeric',
            'state_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'address' => 'required',
            'area' => 'required',
            'aadhar_card_number' => 'required|numeric',
            'pan_card_number' => 'required',
            'DL_number' => 'required',
            'RC_book_number' => 'required'
        ]);

        $input = $request->all();
        $id = $request->txtpkey;
        $old_data = DeliveryAgent::find($id);
        $input = $request->except(['_token','txtpkey','old_profile_image','old_aadhar_card_image','old_pan_card_image','old_DL_image','old_RC_image']);
        
        if(!empty($id)){
            // check for already exists data
            // $data_exists = DeliveryAgent::where('id','!=',$id)
            //                             ->orWhere('email',$input['email'])
            //                             ->orWhere('mobile_number',$input['mobile_number'])
            //                             ->orWhere('aadhar_card_number',$input['aadhar_card_number'])
            //                             ->orWhere('pan_card_number',$input['pan_card_number'])
            //                             ->orWhere('DL_number',$input['DL_number'])
            //                             ->orWhere('RC_book_number',$input['RC_book_number'])
            //                             ->first();

            // if(!empty($data_exists)){
            //     return redirect('/add-delivery-agent')->with('error','This data already exists!');
            // }else{
                // profile image
                if($request->has('profile_image_path')){
                    $filename = time().Str::random(5).'.'.$request->file('profile_image_path')->getClientOriginalExtension();
                    $original_name = $request->file('profile_image_path')->getClientOriginalName();
                    $filePath = $request->file('profile_image_path')->storeAs('public/images/delivery_agent',$filename);  
                    $input['profile_image_path'] = $filePath;
                    $input['profile_image_name'] = $original_name;
                }
                // aadhar card image
                if($request->has('aadhar_card_image_path')){
                    $filename = time().Str::random(5).'.'.$request->file('aadhar_card_image_path')->getClientOriginalExtension();
                    $original_name = $request->file('aadhar_card_image_path')->getClientOriginalName();
                    $filePath = $request->file('aadhar_card_image_path')->storeAs('public/images/delivery_agent',$filename);  
                    $input['aadhar_card_image_path'] = $filePath;
                    $input['aadhar_card_image_name'] = $original_name;
                }
                // pan card image
                if($request->has('pan_card_image_path')){
                    $filename = time().Str::random(5).'.'.$request->file('pan_card_image_path')->getClientOriginalExtension();
                    $original_name = $request->file('pan_card_image_path')->getClientOriginalName();
                    $filePath = $request->file('pan_card_image_path')->storeAs('public/images/delivery_agent',$filename);  
                    $input['pan_card_image_path'] = $filePath;
                    $input['pan_card_image_name'] = $original_name;
                }
                // DL image
                if($request->has('DL_image_path')){
                    $filename = time().Str::random(5).'.'.$request->file('DL_image_path')->getClientOriginalExtension();
                    $original_name = $request->file('DL_image_path')->getClientOriginalName();
                    $filePath = $request->file('DL_image_path')->storeAs('public/images/delivery_agent',$filename);  
                    $input['DL_image_path'] = $filePath;
                    $input['DL_image_name'] = $original_name;
                }
                // RC image
                if($request->has('RC_image_path')){
                    $filename = time().Str::random(5).'.'.$request->file('RC_image_path')->getClientOriginalExtension();
                    $original_name = $request->file('RC_image_path')->getClientOriginalName();
                    $filePath = $request->file('RC_image_path')->storeAs('public/images/delivery_agent',$filename);  
                    $input['RC_image_path'] = $filePath;
                    $input['RC_image_name'] = $original_name;
                }

                $input['dob'] = date('Y-m-d',strtotime(str_replace('/', '-',$input['dob'])));
                $input['modified_by'] =  auth()->guard('admin')->user()->id;
                $input['modified_ip_address'] = $request->ip();
                DeliveryAgent::where('id',$id)->update($input);
                $new_data = DeliveryAgent::find($id);
                LogActivity::AdminLog(json_encode($new_data),json_encode($old_data),'Delivery Agent','update','admin');
                return redirect('/delivery-agent-list')->with('success','Delivery Agent details updated successfully!');
            // }
        }else{
            // check for already exists data
            // $data_exists = DeliveryAgent::orWhere('email',$input['email'])
            //                             ->orWhere('mobile_number',$input['mobile_number'])
            //                             ->orWhere('aadhar_card_number',$input['aadhar_card_number'])
            //                             ->orWhere('pan_card_number',$input['pan_card_number'])
            //                             ->orWhere('DL_number',$input['DL_number'])
            //                             ->orWhere('RC_book_number',$input['RC_book_number'])
            //                             ->first();

            // if(!empty($data_exists)){
            //     return redirect('/add-delivery-agent')->with('error','This data already exists!');
            // }else{
                // profile image
                if($request->has('profile_image_path')){
                    $filename = time().Str::random(5).'.'.$request->file('profile_image_path')->getClientOriginalExtension();
                    $original_name = $request->file('profile_image_path')->getClientOriginalName();
                    $filePath = $request->file('profile_image_path')->storeAs('public/images/delivery_agent',$filename);  
                    $input['profile_image_path'] = $filePath;
                    $input['profile_image_name'] = $original_name;
                }
                // aadhar card image
                if($request->has('aadhar_card_image_path')){
                    $filename = time().Str::random(5).'.'.$request->file('aadhar_card_image_path')->getClientOriginalExtension();
                    $original_name = $request->file('aadhar_card_image_path')->getClientOriginalName();
                    $filePath = $request->file('aadhar_card_image_path')->storeAs('public/images/delivery_agent',$filename);  
                    $input['aadhar_card_image_path'] = $filePath;
                    $input['aadhar_card_image_name'] = $original_name;
                }
                // pan card image
                if($request->has('pan_card_image_path')){
                    $filename = time().Str::random(5).'.'.$request->file('pan_card_image_path')->getClientOriginalExtension();
                    $original_name = $request->file('pan_card_image_path')->getClientOriginalName();
                    $filePath = $request->file('pan_card_image_path')->storeAs('public/images/delivery_agent',$filename);  
                    $input['pan_card_image_path'] = $filePath;
                    $input['pan_card_image_name'] = $original_name;
                }
                // DL image
                if($request->has('DL_image_path')){
                    $filename = time().Str::random(5).'.'.$request->file('DL_image_path')->getClientOriginalExtension();
                    $original_name = $request->file('DL_image_path')->getClientOriginalName();
                    $filePath = $request->file('DL_image_path')->storeAs('public/images/delivery_agent',$filename);  
                    $input['DL_image_path'] = $filePath;
                    $input['DL_image_name'] = $original_name;
                }
                // RC image
                if($request->has('RC_image_path')){
                    $filename = time().Str::random(5).'.'.$request->file('RC_image_path')->getClientOriginalExtension();
                    $original_name = $request->file('RC_image_path')->getClientOriginalName();
                    $filePath = $request->file('RC_image_path')->storeAs('public/images/delivery_agent',$filename);  
                    $input['RC_image_path'] = $filePath;
                    $input['RC_image_name'] = $original_name;
                }

                $input['dob'] = date('Y-m-d',strtotime(str_replace('/', '-',$input['dob'])));
                $input['created_by'] =  auth()->guard('admin')->user()->id;
                $input['created_ip_address'] = $request->ip();
                $Md_delivery_agent = DeliveryAgent::create($input);
                LogActivity::AdminLog(json_encode($Md_delivery_agent),Null,'Delivery Agent','create','admin');
                return redirect('/delivery-agent-list')->with('success','Delivery Agent added successfully!');
            // }
        }
    }

    public function data_table(Request $request)
    {
        
        $agents = DeliveryAgent::where('status', '!=', 'delete')->orderBy('id', 'DESC')->select('id','name','email','mobile_number','city_id','status')->with(['cities'])->get();
        
        if ($request->ajax()) {
            return DataTables::of($agents)
            ->addIndexColumn()
            ->addColumn('city_name', function ($row){
                return !empty($row->city_id) ? $row->cities->city_name : '-';
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '<a href="' .route('add-delivery-agent.show',Crypt::encrypt($row->id)).'"> <button type="button" data-id="' . $row->id . '" class="btn btn-primary btn-xs View_button" title="View"><i class="fa fa-eye"></i></button></a> 
                                <a href="' . url('add-delivery-agent/' . Crypt::encrypt($row->id) . '/edit') . '"> <button type="button" data-id="' . $row->id . '" class="btn btn-warning btn-xs Edit_button" title="Edit"><i class="fa fa-pencil"></i></button></a>                
                                <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="trenta_delivery_agent" data-flash=Agent Details Deleted Successfully!" class="btn btn-danger delete btn-xs" title="Delete"><i class="fa fa-trash"></i></a>';
                return $actionBtn;
            })
            ->addColumn('status', function ($row) {
                if ($row->status == 'active') {
                    $statusActiveBtn = '<a href="javascript:void(0)"  data-id="' . $row->id . '" data-table="trenta_delivery_agent" data-flash="Status Changed Successfully!"  class="change-status"  ><i class="fa fa-toggle-on tgle-on  status_button" aria-hidden="true" title=""></i></a>';
                    return $statusActiveBtn;
                } else {
                    $statusBlockBtn = '<a href="javascript:void(0)"  data-id="' . $row->id . '" data-table="trenta_delivery_agent" data-flash="Status Changed Successfully!" class="change-status" ><i class="fa fa-toggle-off tgle-off  status_button" aria-hidden="true" title=""></></a>';
                    return $statusBlockBtn;
                }
            })
            ->rawColumns(['city_name','action', 'status'])
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
        $id = Crypt::decrypt($id);
        $agent = DeliveryAgent::where('id',$id)->select('id','name','email','mobile_number','dob','gender','salary','country_id','state_id','city_id','address','area','aadhar_card_number','pan_card_number','DL_number','RC_book_number','profile_image_path','profile_image_name','aadhar_card_image_path','aadhar_card_image_name','pan_card_image_path','pan_card_image_name','DL_image_path','DL_image_name','RC_image_path','RC_image_name')->first();
        if(!empty($agent)){
            $country = Country::where('status','active')->where('id','=',$agent->country_id)->select('id','country_name')->first();
            $state = States::where('status','active')->where('id','=',$agent->state_id)->select('id','state_name')->first();
            $city = City::where('status','active')->where('id','=',$agent->city_id)->select('id','city_name')->first();
            return view('admin/delivery_agent/vw_delivery_agent',compact('agent','country','state','city'));
        }else{
            return redirect('delivery-agent-list')->with('error','Something wrong');
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
        $agent = DeliveryAgent::where('id',$id)->select('id','name','email','mobile_number','dob','gender','salary','country_id','state_id','city_id','address','area','aadhar_card_number','pan_card_number','DL_number','RC_book_number','profile_image_path','profile_image_name','aadhar_card_image_path','aadhar_card_image_name','pan_card_image_path','pan_card_image_name','DL_image_path','DL_image_name','RC_image_path','RC_image_name')->first();
        if(!empty($agent)){
            $countries = Country::where('status','active')->select('id','country_name')->get();
            $states = States::where('status','active')->select('id','state_name')->get();
            $cities = City::where('status','active')->where('state_id','=',$agent->state_id)->select('id','city_name')->get();
            return view('admin/delivery_agent/add_delivery_agent',compact('agent','countries','states','cities'));
        }else{
            return redirect('delivery-agent-list')->with('error','Something wrong');
        }
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
