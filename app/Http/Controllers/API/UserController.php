<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Auth;
use Str;
class UserController extends BaseController
{
    //

    public function get_user_profile(){
        $user = Auth::user()->id;
        $success = User::where('id', $user)
                        ->select('name','profile_image','cover_image', 'email','phone_number','date_of_birth','gender','address','state_id','city_id','area_id','username','address','pincode')
                        ->first();
        return $this->sendResponse($success, 'User Profile Details');
    }

    public function edit_user_profile(Request $request){

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'phone_number' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'area_id' => 'required',
            'pincode' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if($request->has('profile_image')){
            $filename = time().Str::random(5).'.'.$request->file('profile_image')->getClientOriginalExtension();
            $original_name = $request->file('profile_image')->getClientOriginalName();
            $filePath = $request->file('profile_image')->storeAs('public/profile_image',$filename);  
            $input['profile_image'] = $filePath;
            $input['profile_image_name'] = $original_name;
        }

        if($request->has('cover_image')){
            $filename = time().Str::random(5).'.'.$request->file('cover_image')->getClientOriginalExtension();
            $original_name = $request->file('cover_image')->getClientOriginalName();
            $filePath = $request->file('cover_image')->storeAs('public/profile_image',$filename);  
            $input['cover_image'] = $filePath;
            $input['cover_image_name'] = $original_name;
        }

        $user = Auth::user()->id;
        User::where('id',$user)
            ->update([
                'username' => $request->username,
                'gender' => $request->gender,
                'date_of_birth' => $request->date_of_birth,
                'phone_number' => $request->phone_number,
                'state_id' => $request->state_id,
                'city_id' => $request->city_id,
                'area_id' => $request->area_id,
                'pincode' => $request->pincode,
                'address' => $request->address,
                'profile_image' => $input['profile_image'],
                'profile_image_name' => $input['profile_image_name'],
                'cover_image' => $input['cover_image'] = $filePath,
                'cover_image_name' => $input['cover_image_name']
            ]);
        return response()->json(['status' => 200, 'message' => 'User profile update successfully!']);
    }
}

