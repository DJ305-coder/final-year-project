<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\States;
use App\Models\City;
use App\Models\Area;
use App\Models\MainSubShoppingCategory;
use App\Models\Product;
use App\Models\SewingSub;
use App\Library\LogActivity;
class BaseController extends Controller
{
    //
    public function delete(Request $request)
    {
        $old_data = DB::table($request->table)->where('id',$request->id)->first();
        $data = DB::table($request->table)->where('id', $request->id)->update([
            'status' => 'delete',
            'modified_by' => Auth::guard('admin')->user()->id,
            'modified_ip_address' => $_SERVER['REMOTE_ADDR']
        ]);
        $new_data = DB::table($request->table)->where('id',$request->id)->first();
        LogActivity::AdminLog(json_encode($new_data),json_encode($old_data),$request->table,'delete','admin');
        return response()->json(['message' => $request->flash, 'status' => 'true']);
    }

    public function status(Request $request)
    {
        $old_data = DB::table($request->table)->where('id',$request->id)->first();
        $status = DB::table($request->table)->where('id', $request->id)->value('status');
        if ($status == 'active') {
            $block_status = DB::table($request->table)->where('id', $request->id)->update([
                'status' => 'inactive',
                'modified_by' => Auth::guard('admin')->user()->id,
                'modified_ip_address' => $_SERVER['REMOTE_ADDR']
            ]);
        } else {
            $active_status = DB::table($request->table)->where('id', $request->id)->update([
                'status' => 'active',
                'modified_by' => Auth::guard('admin')->user()->id,
                'modified_ip_address' => $_SERVER['REMOTE_ADDR']
            ]);
        }
        $new_data = DB::table($request->table)->where('id',$request->id)->first();
        LogActivity::AdminLog(json_encode($new_data),json_encode($old_data),$request->table,'update','admin');
        return response()->json(['message' => $request->flash, 'status' => 'true']);
    }

    // This function is to show state list
    public function state_list(Request $request)
    {
        if ($request->ajax()) {
            // check if got country id to send state list
            if($request->countryId != ''){
                $states = States::where(['status'=>'active','country_id'=>$request->countryId])->select('id','state_name')->orderBy('id', 'DESC')->get();
                $html = '';
                $html .= '<option value="" disabled selected>Select State</option>';
                if(!empty($states)){
                    foreach($states as $state_data){
                        $html .= '<option value="'.$state_data->id.'">'.$state_data->state_name.'</option>';
                    }
                }
                return $html;
            }
        }
    }

    public function city_list(Request $request)
    {
        if ($request->ajax()) {
            // check if got state id to send cities list
            if ($request->ajax()) {
                if($request->stateId != ''){
                    $cities = City::where(['status'=>'active','state_id'=>$request->stateId])->select('id','city_name')->orderBy('id', 'DESC')->get();
                    $html = '';
                    $html .= '<option value="" disabled selected>Select City</option>';
                
                    if(!empty($cities)){
                        foreach($cities as $city_data){
                            $html .= '<option value="'.$city_data->id.'">'.$city_data->city_name.'</option>';
                        }
                    }
                    return $html;
                }
            }
        }
    }

    public function area_list(Request $request)
    {
        if ($request->ajax()) {
            if($request->cityId != ''){
                $areas = Area::where(['status'=>'active','city_id'=>$request->cityId])->select('id','area_name')->orderBy('id', 'DESC')->get();
                $html = '';
                // $html .= '<option value="" selected>Select Area</option>';
            
                if(!empty($areas)){
                    foreach($areas as $area){
                        $html .= '<option value="'.$area->id.'">'.$area->area_name.'</option>';
                    }
                }
                return $html;
            }
        }
    }

    public function sub_category_list(Request $request)
    {
        if ($request->ajax()) {
            // check if got main category id to send sub category list
            if($request->mainCategoryId != ''){
                $main_sub_categories = MainSubShoppingCategory::where(['status'=>'active','category_id'=>$request->mainCategoryId])->select('id','submain_shopping_category_name')->orderBy('id', 'DESC')->get();
                $html = '';
                $html .= '<option value="" disabled selected>Select Sub category</option>';
                if(!empty($main_sub_categories)){
                    foreach($main_sub_categories as $main_sub_category_data){
                        $html .= '<option value="'.$main_sub_category_data->id.'">'.$main_sub_category_data->submain_shopping_category_name.'</option>';
                    }
                }
                return $html;
            }
        }
    }

    public function product_name_list(Request $request)
    {
        if ($request->ajax()) {
            // check if got sub category id to send product name list
            if($request->subCategoryId != ''){
                $product_names = Product::where(['status'=>'active','sub_category_id'=>$request->subCategoryId,'main_category_id'=>$request->mainCategoryId])->select('id','product_name')->orderBy('id', 'DESC')->get();
                $html = '';
                $html .= '<option value="" disabled selected>Select Product</option>';
                if(!empty($product_names)){
                    foreach($product_names as $product_name_data){
                        $html .= '<option value="'.$product_name_data->id.'">'.$product_name_data->product_name.'</option>';
                    }
                }
                return $html;
            }
        }
    }

    public function product_image(Request $request)
    {
        if ($request->ajax()) {
            // check if got sub category id to send product name list
            if($request->productId != ''){
                $product_image = Product::where(['status'=>'active','id'=>$request->productId,'sub_category_id'=>$request->subCategoryId,'main_category_id'=>$request->mainCategoryId])->select('feature_image_path','feature_image_name')->first();
                $html = '';
                if(!empty($product_image)){
                    $html = [
                        'image' => $product_image->feature_image_path,
                        'image_name' => $product_image->feature_image_name,
                    ];
                }
                return $html;
            }
        }
    }

    public function delete_image(Request $request)
    {
        $old_data = DB::table($request->DatabaseName)->where('id',$request->ImageId)->first();
        $data = DB::table($request->DatabaseName)->where('id', $request->ImageId)->update([
            'status' => 'delete',
            'modified_by' => Auth::guard('admin')->user()->id,
            'modified_ip_address' => $_SERVER['REMOTE_ADDR']
        ]);

        $new_data = DB::table($request->DatabaseName)->where('id',$request->ImageId)->first();
        LogActivity::AdminLog(json_encode($new_data),json_encode($old_data),$request->DatabaseName,'delete','admin');
        if(!empty($data)){
            return response()->json(['message' => 'Image Deleted Successfully.', 'status' => 'true']);
        }else{
            return response()->json(['error' => 'Image Not Deleted.', 'status' => 'false']);
        }
    }

    public function sub_sewing_category_list(Request $request)
    {    
        if ($request->ajax()) {
            if($request->main_id != ''){
                $main_sub_categories = SewingSub::where(['status'=>'active','category_id'=>$request->main_id])->select('id','sub_category_name')->orderBy('id', 'DESC')->get();
                return response()->json(['data'=>$main_sub_categories]);
            }
        }
    }
    

    
}
