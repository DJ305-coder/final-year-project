<?php

namespace App\Http\Controllers\API\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
class MasterController extends BaseController
{


    /**
     * Display a listing of country.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_countries(){
        $country_list = \App\Models\Country::where('status','active')
                                           ->select('country_name','id')
                                           ->get();
        if(!empty($country_list)){
            return $this->sendResponse($country_list,'Country list found');
        }else{
            return $this->sendError('Data not found', "", '500');
        }
    }

     /**
     * Display a listing of states.
     *
     * @return \Illuminate\Http\Response
     */
    public function state_list(Request $request){

        // $validator = Validator::make($request->all(), [
        //     'country_id' => 'required|numeric',
        // ]);

        // if ($validator->fails()) {
        //     return $this->sendError('Validation Error.', $validator->errors());
        // }

        $id = $request->country_id;
        $state_list = \App\Models\States::where('status','active')
                                        // ->where('country_id',$id)
                                        ->select('state_name','id')
                                        ->get();
        if(!empty($state_list)){
            return $this->sendResponse($state_list,'State list found.');
        }else{
            return $this->sendError('Data not found', "", '500');
        }
    }

    /**
     * Display a listing of cities.
     *
     * @return \Illuminate\Http\Response
     */
    public function cities_list(Request $request){

        $validator = Validator::make($request->all(), [
            'state_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $id = $request->state_id;
        $city_list = \App\Models\City::where('status','active')
                                        ->where('state_id',$id)
                                        ->select('city_name','id')
                                        ->get();
        if(!empty($city_list)){
            return $this->sendResponse($city_list,'City list found.');
        }else{
            return $this->sendError('Data not found', "", '500');
        }
    }

     /**
     * Display a listing of Areas.
     *
     * @return \Illuminate\Http\Response
     */
    public function area_list(Request $request){


        $validator = Validator::make($request->all(), [
            'city_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $id = $request->city_id;
        $area_list = \App\Models\Area::where('status','active')
                                        ->where('city_id',$id)
                                        ->select('area_name','id')
                                        ->get();
        if(!empty($area_list)){
            return $this->sendResponse($area_list,'area list found.');
        }else{
            return $this->sendError('Data not found', "", '500');
        }
    }

    /**
     * Display a listing of shopping category list.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_shopping_category_list(){

        $data =  \App\Models\MainShoppingCategory::getMainCategory();     
        if(!empty($data)){
            return $this->sendResponse($data, 'Data found.');
        }else{
            return $this->sendError('Data not found', "", '500');
        }
    }


     /**
     * Display a listing of shopping sub category list.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_shopping_sub_categpry(Request $request){
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $id = $request->category_id;
        $data =  \App\Models\MainSubShoppingCategory::where('status','active')
                                ->where('category_id',$id)
                                ->select('submain_shopping_category_name','id')
                                ->get(); 
        if(!empty($data)){
            return $this->sendResponse($data, 'Data found.');
        }else{
            return $this->sendError('Data not found', "", '500');
        } 
    }

      /**
     * Display a listing of sewing category list.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_sewing_category_list(){

        $data =  \App\Models\SewingMain::getSewingCategoryList();     
        if(!empty($data)){
            return $this->sendResponse($data, 'Data found.');
        }else{
            return $this->sendError('Data not found', "", '500');
        }
    }


    /**
     * Display a listing of sewing sub category list.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_sewing_sub_categpry(Request $request){

        
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $id = $request->category_id;
        $data =  \App\Models\SewingSub::where('status','active')
                                ->where('category_id',$id)
                                ->select('category_image','sub_category_name','id')
                                ->get(); 
        if(!empty($data)){
            return $this->sendResponse($data, 'Data found.');
        }else{
            return $this->sendError('Data not found', "", '500');
        } 
    }
}
