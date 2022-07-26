<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use Validator;
use Auth;
class WishlistController extends BaseController
{
    //

    public function add_product_to_wishlist(Request $request){

        $validator = Validator::make($request->all(), [
            'product_id' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $input['product_id'] = $request->product_id;
        $input['user_id'] = Auth::user()->id;
        $check_exist = Wishlist::where('product_id',$request->product_id)
                                ->where('user_id',Auth::user()->id)
                                ->first();
        if(!empty($check_exist)){
            return $this->sendError('Product alerady exist in wishlist.', "", 409);
        }
        $data = Wishlist::create($input);
        if(!empty($data)){
            return $this->sendResponse($data, 'Product added in wishlist.');
        }else{
            return $this->sendError('Product not add in wishlist.', "", 404);
        } 
    }


    public function remove_product_from_wishlist(Request $request){
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $data = Wishlist::when($request->product_id, function($query)use($request){
            return $query->where('product_id', $request->product_id);
        })
        ->where('user_id', Auth::user()->id)->first();

        if ($data) {
            $data->delete();
            return response()->json(['status' => 200, 'message' => 'Product remove from wishlist.']);
        }else{
            return response()->json(['status' => 404, 'message' => 'data not found.']); 
        }

    }

    
    public function get_wishlist(){
        $data = Wishlist::select('id','product_id')
                        ->where('user_id',Auth::user()->id)
                        ->get();
        $collection = collect($data);
        $collection = $collection->map(function($item){
            $data = Product::where('product_id',$item->product_id)
                            ->select('product_name','product_mrp','product_special_price','feature_image_path','product_discount')
                            ->first();
            $data['product_id'] = $item->product_id;
            return $data;
        });
        if($collection->isNotEmpty()){
            return $this->sendResponse($collection, 'data found.');
        }else{
            return $this->sendError('data not found.', "", 404);
        } 
    }

  
}
