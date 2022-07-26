<?php

namespace App\Http\Controllers\Admin\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use DB;
use Hash;
use App\Library\LogActivity;

class LoginController extends Controller
{
    //show login form
    public function index(){ 
       
        return !empty(Session::has('trenta_admin*%')) ? redirect('dashboard') :  view('admin.login.login'); 
        
    }

    //already admin lagin in browser then direct show dashboard using session 
    public function dashboard_view(){
        return !empty(Session::has('trenta_admin*%')) ? view('admin.layout.app') : redirect('/');
        
    }

    //this function is used for check login details is present in database
    public function admin_login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $admin_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );  
        if(Auth::guard('admin')->attempt($admin_data)){
           $user_id = Auth::guard('admin')->user()->id;  
           Session::put('trenta_admin*%', $user_id);
           return redirect('dashboard')->with('success','Login successfully!');
        }else{          
            return redirect('/')->with('error','Invalid Login Details!');;
        }
    }

    //destroy login session data using logout function 
    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return redirect('/')->with('success', 'Logout Successfully!');
    }

    public function change_password_view(){
        return view('admin.login.change_password');
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'confirm_password' => 'required|string',
        ]);

        $email = Auth::guard('admin')->user()->email;

        $user_data = DB::table('admins')->where('email','=',$email)->first();
        $old_data = DB::table('admins')->find($user_data);

        // check old password
        if(Hash::check($request->old_password, $user_data->password)){
            $input['password'] = Hash::make($request->confirm_password);
            Db::table('admins')->where('email','=',$email)->update($input);
            $new_data = DB::table('admins')->find($user_data);
            LogActivity::AdminLog(json_encode($new_data),json_encode($old_data),'Password Change','update','admin');
            return redirect('/logout')->with('success', 'Password Changed Successfully.');
        }else{
            return redirect('change-password')->with('error','Enter correct old password.');
        }
        
    }
}
