<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use Validator;
use Auth;
class AddressController extends BaseController
{
    //
    public function add_user_address(Request $request){

        $validator = Validator::make($request->all(), [
            'state_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'area_id' => 'required|numeric',
            'name' => 'required|alpha',
            'mobile_number' => 'required|digits:10',
            'pincode' => 'required|digits:6',
            'appartment_name' => 'required',
            'house_no' => 'required',
            'street' => 'required',
            'landmark' => 'required',
            'address_type' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $input['created_ip_address'] = $request->ip();

        $data = Address::where('user_id',Auth::user()->id)
                        ->where('is_default','yes')
                        ->get();
        
        $address = Address::create($input);
        if($data->isEmpty()){
            Address::where('user_id',Auth::user()->id)
                    ->where('id', $address->id)
                    ->update(['is_default' => 'yes']);
        }
       
        if(!empty($address)){
            return $this->sendResponse($address, 'Address added successfully done!.');
        }else{
            return $this->sendError('Soemthing Wrong.', "", 404);
        } 
    }

    public function get_user_address_list(){
  
        $addreess_list = Address::where('status','active')
                                ->where('user_id',Auth::user()->id)
                                ->select('user_id','city_id','area_id','address_type','is_default','name','mobile_number','pincode','appartment_name','house_no','street','landmark')
                                ->get();
        if($addreess_list->isNotEmpty()){
            return $this->sendResponse($addreess_list, 'Address added successfully done!.');
        }else{
            return $this->sendError('Data not found.', "", 404);
        } 
    }

    public function delete_user_address(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $address = Address::where('id', $request->id)->update(['status' => 'delete']);
        if($address){
            return response()->json(['status' => 200, 'message' => 'Address delete successfully done!']);
        }else{
            return $this->sendError('Data not found.', "", 404);
        }
    }


}
