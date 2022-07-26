<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use DataTables;
use Crypt;
use App\Library\LogActivity;
use Illuminate\Support\Facades\Gate;
class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if (! Gate::allows('admin_check')) {
        //     abort(403);
        // }else{
        //     // return 'admin access';
        // }
        return view('admin/master/country/vw_country');
    }


    public function data_table(Request $request){
          
        $countries = Country::where('status', '!=', 'delete')->select('country_name','id','status')->orderBy('id', 'DESC')->get();
        if ($request->ajax()) {
            return DataTables::of($countries)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . url('country/' . Crypt::encrypt($row->id) . '/edit') . '"> <button type="button" data-id="' . $row->id . '" class="btn btn-warning btn-xs Edit_button" title="Edit"><i class="fa fa-pencil"></i></button></a> 
                                  <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="trenta_master_countries" data-flash="Country Deleted Successfully!" class="btn btn-danger delete btn-xs" title="Delete"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 'active') {
                        $statusActiveBtn = '<a href="javascript:void(0)"  data-id="' . $row->id . '" data-table="trenta_master_countries" data-flash="Status Changed Successfully!"  class="change-status"  ><i class="fa fa-toggle-on tgle-on  status_button" aria-hidden="true" title=""></i></a>';
                        return $statusActiveBtn;
                    } else {
                        $statusBlockBtn = '<a href="javascript:void(0)"  data-id="' . $row->id . '" data-table="trenta_master_countries" data-flash="Status Changed Successfully!" class="change-status" ><i class="fa fa-toggle-off tgle-off  status_button" aria-hidden="true" title=""></></a>';
                        return $statusBlockBtn;
                    }
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
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
            'country_name' => 'required',
        ]);
        $id = $request->txtpkey;
        if(!empty($id)){
            $check_id = Country::where('id','!=',$id)
                    ->where('country_name','=',$request->country_name)
                    ->where('status','!=','delete')
                    ->first();
            // return $id;
            $old_data = Country::find($id);
            // return $old_data;
            if(!empty($check_id)){
                return redirect('/country')->with('error', 'This country already exists!');
            }else{
                //update country
                $input['country_name'] = $request->country_name;
                $input['modified_by'] = auth()->guard('admin')->user()->id;
                $input['modified_ip_address'] = $request->ip();
                // store user activity
                
                Country::find($id)->update($input);
                $new_data = Country::find($id);
                LogActivity::AdminLog(json_encode($new_data),json_encode($old_data),'Country','update','admin');
                return redirect('country')->with('success','Country updated successfully!');
            }

        }else{
            //create country
            $check_duplicate = Country::where('country_name', $request->country_name)
                                        ->where('status','!=','delete')
                                        ->get();
            if(($check_duplicate)->isEmpty()){
                $input['country_name'] = $request->country_name;
                $input['created_by'] = auth()->guard('admin')->user()->id;
                $input['created_ip_address'] = $request->ip();

                //store user activity
                $new_data = Country::create($input);
                
                LogActivity::AdminLog(json_encode($new_data),Null,'Country','create','admin');
                return redirect('/country')->with('success','Country added successfully!');
            }else{
                return redirect('/country')->with('error','This country already exists!');
            }
        }
    }

    // check duplicate data for client side
    public function country_exists(Request $request)
    {
        if($request->ajax()){
            $country_name = Country::where('country_name','=',$request->country_name)
                    ->where('status','!=','delete')
                    ->select('country_name');
                    if(!empty($request->txtpkey)){
                        $country_name = $country_name->where('id','!=',$request->txtpkey);
                    }
                    $country_name = $country_name->first();

                return !empty($country_name) ? 'false' : 'true';
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
        $country = Country::find($id,['country_name','id']);
        return view('admin/master/country/vw_country', compact('country'));
    }
}


