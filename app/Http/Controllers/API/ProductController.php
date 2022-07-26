<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\MainShoppingCategory;
use App\Models\MainSubShoppingCategory;
use App\Models\CategoryBanner;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Size;
use App\Models\Color;
use App\Models\Wishlist;
use Validator;
use Auth;
class ProductController extends BaseController
{
    // get product list
    public function get_product_list(){
        $data = \App\Models\Product::where('status','active')->get();
        if(!empty($data)){
            return $this->sendResponse($data, 'Data found.');
        }else{
            return $this->sendError('Data not found', "", '500');
        } 
    }

    // get category products list

    public function get_category_product_list(Request $request){

        $validator = Validator::make($request->all(), [
            'category_id' => 'required|numeric',
            'limit' => 'required|numeric',
            'offset' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $data['product_list'] = Product::getCategoryProductList($request);
        $collection = collect($data['product_list']);
        $collection->map(function ($collection) {            
            $check_wishlist_product = Wishlist::check_user_wishlist_product($collection['id']);
            if(!empty($check_wishlist_product)){
               $collection['wishlist_status'] = 'yes';
            }else{
               $collection['wishlist_status'] = 'no';
            }
            return $collection;
        });
        if($collection){
            return $this->sendResponse($collection, 'Data found.');
        }else{
            return $this->sendError('Data not found', "", '404');
        } 
    }

    
    // get category details
    public function get_category_detail(Request $request){

        $validator = Validator::make($request->all(), [
            'category_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        
        $data['categories'] = MainShoppingCategory::get_category_detail($request->category_id);
        $data['banners'] = CategoryBanner::getCategoryBanner($request);
        $data['sub_categories'] = MainSubShoppingCategory::getSubCategory($request);
        $data['categories']['product_count'] = Product::getCategoryProductCount($request);
        $data['brands'] = Brand::getAllBrands();
        $data['sizes'] = Size::getSizes();

        $collection = Product::where('main_category_id', $request->category_id)->get();
        $data['lowest_price'] = collect($collection)->min('product_special_price');
        $data['highest_price'] = collect($collection)->max('product_special_price');

        if(($data)){
            return $this->sendResponse($data, 'Data found.');
        }else{
            return $this->sendError('Data not found', "", '500');
        } 
    }

    public function get_category_product_detail(Request $request){

        $validator = Validator::make($request->all(), [
            'product_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $data['product_detail'] = Product::getProduct($request);

       
        if(!empty($data['product_detail'])){
            $data['color'] = Color::getProductColor($data['product_detail']->color);        
            $data['size']  = Size::whereIn('id',$data['product_detail']->size)->select('size','id')->get();
            $data['brand'] = Brand::getProductBrand(($data['product_detail'])->brand_id);
            
            $check_wishlist_product = Wishlist::where('product_id',$request->product_id)
                                                ->where('user_id',Auth::user()->id)
                                                ->first();

            if(!empty($check_wishlist_product)){
                $data['wishlist_status'] = 'yes';
            }else{
                $data['wishlist_status'] = 'no';
            } 
            
            return $this->sendResponse($data, 'Data found.');
        }else{
            return $this->sendError('Data not found', "", 404);
        } 
    }


    public function get_new_arrivals(){
        
        $data = \App\Models\NewArrivals::where('status','active')->select('product_id','sequence_no','id')->get();

        $collection = collect($data);
      
        $collection = $collection->map(function ($item) {       
                $data = Product::where('id',$item->product_id)
                        ->select('id','product_name','product_mrp','product_special_price','product_discount','product_description','search_keywords','feature_image_path')
                        ->first();
                $data['sequence_no'] = $item->sequence_no;
                return $data;
        });

        if($collection->isNotEmpty()){
            return $this->sendResponse($collection, 'Data found.');
        }else{
            return $this->sendError('Data not found', "",404);
        } 
    }

    public function get_best_sellers(){
        $data = \App\Models\BestSellers::where('status','active')->select('product_id','sequence_no','id')->get();

        $collection = collect($data);
      
        $collection = $collection->map(function ($item) {       
                $data = Product::where('id',$item->product_id)
                        ->select('id','product_name','product_mrp','product_special_price','product_discount','product_description','search_keywords','feature_image_path')
                        ->first();
                $data['sequence_no'] = $item->sequence_no;
                return $data;
        });

        if($collection->isNotEmpty()){
            return $this->sendResponse($collection, 'Data found.');
        }else{
            return $this->sendError('Data not found', "",404);
        } 
    }

}
