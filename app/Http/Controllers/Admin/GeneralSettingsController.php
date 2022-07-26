<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSettings;
use Storage;
use Str;
use App\Library\LogActivity;

class GeneralSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $general_settings = GeneralSettings::where('status','=','active')
                                            ->select('id','contact_email','contact_phone','contact_mobile','contact_address','contact_latitude','contact_longitude')
                                            ->first();

        return view('admin.settings.general_settings_contact', compact('general_settings'));
    }


    public function social_media_index()
    {
        $general_settings = GeneralSettings::where('status','=','active')
                                            ->select('id','social_media_facebook_url','social_media_twitter_url','social_media_instagram_url','social_media_pinterest_url','social_media_youtube_url')
                                            ->first();

        return view('admin.settings.general_settings_social_media', compact('general_settings'));
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
        if($request->has('contact_settings')){
            $request->validate([
                'contact_email' => 'required|email',
                'contact_phone' => 'required|digits:10',
                'contact_mobile' => 'required|digits:10',
                'contact_address' => 'required',
                'contact_longitude' => 'required',
                'contact_latitude' => 'required'
            ]);

            $input = $request->all();
            $id = $request->txtpkey;
            $old_data = GeneralSettings::find($id);
            $input['modified_by'] = auth()->guard('admin')->user()->id;
            $input['modified_ip_address'] = $request->ip();
            GeneralSettings::find($id)->update($input);
            $new_data = GeneralSettings::find($id);
            LogActivity::AdminLog(json_encode($new_data),json_encode($old_data),'General Contact Settings','update','admin');
            return redirect('general-settings/contact-settings')->with('success','Contact Settings updated successfully!');
        }

        if($request->has('social_media_settings')){
            $request->validate([
                'social_media_facebook_url' => 'required|url',
                'social_media_twitter_url' => 'required|url',
                'social_media_instagram_url' => 'required|url',
                'social_media_pinterest_url' => 'required|url',
                'social_media_youtube_url' => 'required|url'
            ]);

            $input = $request->all();
            $id = $request->txtpkey;
            $old_data = GeneralSettings::find($id);
            $input['modified_by'] = auth()->guard('admin')->user()->id;
            $input['modified_ip_address'] = $request->ip();
            GeneralSettings::find($id)->update($input);
            $new_data = GeneralSettings::find($id);
            LogActivity::AdminLog(json_encode($new_data),json_encode($old_data),'General Social Settings','update','admin');
            return redirect('general-settings/social-media-settings')->with('success','Social Media Settings updated successfully!');
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
