<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisualSettings;
use Storage;
use Str;
use App\Library\LogActivity;

class VisualSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visual_settings = VisualSettings::where('status','=','active')
                                            ->select('id','logo_image_path','logo_image_name','logo_email_image_path','logo_email_image_name','favicon_image_path','favicon_image_name')
                                            ->first();

        return view('admin.settings.visual_settings', compact('visual_settings'));
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
        $id = $request->txtpkey;
        $old_data = VisualSettings::find($id);

            if($request->has('logo_image_path')){
                $filename = time().Str::random(5).'.'.$request->file('logo_image_path')->getClientOriginalExtension();
                $original_name = $request->file('logo_image_path')->getClientOriginalName();
                $input['logo_image_name'] = $original_name;
                $filePath = $request->file('logo_image_path')->storeAs('public/images/visual_settings_images',$filename);  
                $input['logo_image_path'] = $filePath;
            }

            if($request->has('logo_email_image_path')){
                $filename = time().Str::random(5).'.'.$request->file('logo_email_image_path')->getClientOriginalExtension();
                $original_name = $request->file('logo_email_image_path')->getClientOriginalName();
                $input['logo_email_image_name'] = $original_name;
                $filePath = $request->file('logo_email_image_path')->storeAs('public/images/visual_settings_images',$filename);  
                $input['logo_email_image_path'] = $filePath;
            }

            if($request->has('favicon_image_path')){
                $filename = time().Str::random(5).'.'.$request->file('favicon_image_path')->getClientOriginalExtension();
                $original_name = $request->file('favicon_image_path')->getClientOriginalName();
                $input['favicon_image_name'] = $original_name;
                $filePath = $request->file('favicon_image_path')->storeAs('public/images/visual_settings_images',$filename);  
                $input['favicon_image_path'] = $filePath;
            }

            $input['modified_by'] = auth()->guard('admin')->user()->id;
            $input['modified_ip_address'] = $request->ip();
            VisualSettings::find($id)->update($input);
            $new_data = VisualSettings::find($id);
            LogActivity::AdminLog(json_encode($new_data),json_encode($old_data),'Visual Settings','update','admin');
            return redirect('visual-settings')->with('success','Visual Settings updated successfully!');
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
