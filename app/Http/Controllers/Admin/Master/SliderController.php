<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use DataTables;
use Crypt;
use Storage;
use App\Library\LogActivity;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin/master/welcome_banner_slider/welcome_banner_slider');
    }

    public function data_table(Request $request){
          
        $data = Slider::where('status', '!=', 'delete')->select('slider_image','title','id','status')->orderBy('id', 'DESC')->get();
        // return $data;
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('slider_image', function($row){
                    $actionBtn = '<img src="'.$row->slider_image.'"  />';
                    return $actionBtn;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . url('sliders/' . Crypt::encrypt($row->id) . '/edit') . '"> <button type="button" data-id="' . $row->id . '" class="btn btn-warning btn-xs Edit_button" title="Edit"><i class="fa fa-pencil"></i></button></a> 
                                  <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="trenta_master_sliders" data-flash="Slider Deleted Successfully!" class="btn btn-danger delete btn-xs" title="Delete"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 'active') {
                        $statusActiveBtn = '<a href="javascript:void(0)"  data-id="' . $row->id . '" data-table="trenta_master_sliders" data-flash="Status Changed Successfully!"  class="change-status"  ><i class="fa fa-toggle-on tgle-on  status_button" aria-hidden="true" title=""></i></a>';
                        return $statusActiveBtn;
                    } else {
                        $statusBlockBtn = '<a href="javascript:void(0)"  data-id="' . $row->id . '" data-table="trenta_master_sliders" data-flash="Status Changed Successfully!" class="change-status" ><i class="fa fa-toggle-off tgle-off  status_button" aria-hidden="true" title=""></></a>';
                        return $statusBlockBtn;
                    }
                })
                ->rawColumns(['slider_image','action', 'status'])
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
        $request->validate([
            'title' => 'required',
        ]);

        $id = $request->txtpkey;
        $old_data = Slider::find($id);
        if(!empty($request->txtpkey)){
            if($request->has('slider_image')){
                $filename = time().'.'.$request->file('slider_image')->getClientOriginalExtension();
                $filePath = $request->file('slider_image')->storeAs('public/slider',$filename);  
                $input['slider_image'] = $filePath;
            } 
            $input['title'] = $request->title;
            $input['created_by'] = auth()->guard('admin')->user()->id;
            $input['created_ip_address'] = $request->ip();
            Slider::where('id',$request->txtpkey)->update($input);
            $new_data = Slider::find($id);
            LogActivity::AdminLog(json_encode($new_data),json_encode($old_data),'Slider','update','admin'); 
            return redirect('/sliders')->with('success','Slider image updated successfully!');
        }else{
            if($request->has('slider_image')){
                $filename = time().'.'.$request->file('slider_image')->getClientOriginalExtension();
                $filePath = $request->file('slider_image')->storeAs('public/slider',$filename);  
                $input['slider_image'] = $filePath;
            }
            $input['title'] = $request->title;
            $input['created_by'] = auth()->guard('admin')->user()->id;
            $input['created_ip_address'] = $request->ip();
            $Md_slider = Slider::create($input);
            LogActivity::AdminLog(json_encode($Md_slider),Null,'Slider','create','admin');
            return redirect('/sliders')->with('success','Slider image added successfully!');
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
        $slider = Slider::where('id',$id)->select('title','slider_image','id')->first();
        return view('admin/master/welcome_banner_slider/welcome_banner_slider', compact('slider'));
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
