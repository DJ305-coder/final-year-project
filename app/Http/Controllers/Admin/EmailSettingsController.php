<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmailSettings;
use Storage;
use Config;
use Str;
use App\Library\LogActivity;

class EmailSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email_settings = EmailSettings::where('id','=',1)
                                        ->select('id','mail_encryption','mail_protocol','mail_title','mail_host','mail_port','mail_username','mail_password','status')
                                        ->first();

        return view('admin.settings.email_settings',compact('email_settings'));
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
        if($request->has('email_settings')){

            $email = EmailSettings::where('id','=',1)->where('status','=','active')->first();

            if(!empty($email)){

                $request->validate([
                    'mail_encryption' => 'required',
                    'mail_protocol' => 'required',
                    'mail_title' => 'required',
                    'mail_host' => 'required',
                    'mail_port' => 'required',
                    'mail_username' => 'required|email',
                    'mail_password' => 'required'
                ]);
    
                $input['mail_encryption'] = $request->mail_encryption;
                $input['mail_protocol'] = $request->mail_protocol;
                $input['mail_host'] = $request->mail_host;
                $input['mail_port'] = $request->mail_port;
                $input['mail_username'] = $request->mail_username;
                $input['mail_password'] = $request->mail_password;
                $input['mail_title'] = $request->mail_title;
                $input['modified_by'] = auth()->guard('admin')->user()->id;
                $input['modified_ip_address'] = $request->ip();
    
                $old_data = EmailSettings::where('id','=',1)->first();

                EmailSettings::where('id','=',1)->update($input);

                $new_data = EmailSettings::where('id','=',1)->first();

                LogActivity::AdminLog(json_encode($new_data),json_encode($old_data),'Email settings','update','admin');
    
                return redirect('email-settings')->with('success','Email Settings updated successfully.');
            }else{
                return redirect('email-settings')->with('error','Email verification is disabled.');
            }
        }

        if($request->has('email_verification')){

            $email = EmailSettings::where('id','=',1)->first();

            if($request->has('enable')){
                $input['status'] = 'active';
            }
            if($request->has('disable')){
                $input['status'] = 'inactive';
            }

            $old_data = EmailSettings::where('id','=',1)->first();

            EmailSettings::where('id','=',1)->update($input);

            $new_data = EmailSettings::where('id','=',1)->first();

            LogActivity::AdminLog(json_encode($new_data),json_encode($old_data),'Email verification','update','admin');

            return redirect('email-settings')->with('success','Email verification updated successfully.');
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
