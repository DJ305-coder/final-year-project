<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use \Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Password;
use Response;
class LoginController extends BaseController
{
    //
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function user_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $email_check = User::where('email', $request->email)->first();
        if (!empty($email_check)) {
            return $this->sendError('User already exists', "", 409);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        if (!empty($user)) {
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            return $this->sendResponse($success, 'User register successfully.');
        } else {
            return $this->sendError('User not registered', "", 404);
        }
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function user_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            User::where('id', $user->id)->update([
                'last_login' => Carbon::now(),
                'access_token' => $success['token']
            ]);
            return $this->sendResponse($success, 'User login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }

    public function user_details()
    {
        // return 'check';
        $user = Auth::user()->id;
        $success = User::where('id', $user)->select('name', 'email')->first();
        return $this->sendResponse($success, 'User Details');
    }

    public function user_logout()
    {
        Auth::user()->tokens()->delete();
        return $this->sendResponse($success = NULL, 'User logout successfully.');
    }

    public function splash_screen_slider()
    {
        $success = \App\Models\Slider::where('status', 'active')
            ->select('title', 'slider_image')
            ->get();
        if(!empty($success)){
            return $this->sendResponse($success, 'Splash Screen Found successfully.');
        }else{
            return $this->sendError('Data not found', "", 404);
        }
    }
}
