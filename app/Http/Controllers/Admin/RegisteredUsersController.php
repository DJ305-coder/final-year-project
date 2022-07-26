<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\States;
use App\Models\City;
use DataTables;
use Crypt;
use Storage;
use App\Library\LogActivity;

class RegisteredUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.registered_users.vw_registered_users');
    }

    // Datatable
    public function data_table(Request $request)
    {
        
        $users = User::where('status', '!=', 'delete')->orderBy('id', 'DESC')->select('id','name','email','phone_number','date_of_birth','city_id','state_id','status','created_at')->with(['cities','states'])->get();
        
        if ($request->ajax()) {
            return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('registration_date_and_time', function($row){
                return !empty($row->created_at) ? date('Y-m-d & h:i A', strtotime($row->created_at)) : '-';
            })
            ->addColumn('city_name', function ($row){
                return !empty($row->city_id) ? $row->cities->city_name : '-';
            })
            ->addColumn('state_name', function ($row){
                return !empty($row->state_id) ? $row->states->state_name : '-';
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '<a href="' .route('registered-users-list.show',Crypt::encrypt($row->id)).'"> <button type="button" data-id="' . $row->id . '" class="btn btn-primary btn-xs View_button" title="View"><i class="fa fa-eye"></i></button></a> 
                                <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="trenta_users" data-flash=User Details Deleted Successfully!" class="btn btn-danger delete btn-xs" title="Delete"><i class="fa fa-trash"></i></a>';
                return $actionBtn;
            })
            ->addColumn('status', function ($row) {
                if ($row->status == 'active') {
                    $statusActiveBtn = '<a href="javascript:void(0)"  data-id="' . $row->id . '" data-table="trenta_users" data-flash="Status Changed Successfully!"  class="change-status"  ><i class="fa fa-toggle-on tgle-on  status_button" aria-hidden="true" title=""></i></a>';
                    return $statusActiveBtn;
                } else {
                    $statusBlockBtn = '<a href="javascript:void(0)"  data-id="' . $row->id . '" data-table="trenta_users" data-flash="Status Changed Successfully!" class="change-status" ><i class="fa fa-toggle-off tgle-off  status_button" aria-hidden="true" title=""></></a>';
                    return $statusBlockBtn;
                }
            })
            ->rawColumns(['registration_date_and_time','city_name','state_name','action', 'status'])
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
        //
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
        $user = User::where('id',$id)->select('id','name','email','phone_number','date_of_birth','gender','profile_image','state_id','city_id','address')->first();
        if(!empty($user)){
            $state = States::where('status','active')->where('id','=',$user->state_id)->select('id','state_name')->first();
            $city = City::where('status','active')->where('id','=',$user->city_id)->select('id','city_name')->first();
            return view('admin.registered_users.vw_view_registered_users',compact('user','state','city'));
        }else{
            return redirect('registered-users-list')->with('user','Something wrong');
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
