<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MainShoppingCategory;
use App\Models\MainSubShoppingCategory;
use App\Models\Brand;
use Storage;
use App\Models\Wishlist;
class Product extends Model
{
    use HasFactory;
    protected $table = "trenta_shopping_products";

    protected $fillable = [
        'product_name',
        'product_mrp',
        'main_category_id',
        'sub_category_id',
        'brand_id',
        'product_name',
        'product_special_price',
        'product_discount',
        'product_description',
        'color',
        'size',
        'feature_image_path',
        'size_chart',
        'search_keywords',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];
   

    public function main_category()
    {
        return $this->hasOne(MainShoppingCategory::class,'id','main_category_id')->select('id','main_shopping_category_name');
    }

    public function sub_category()
    {
        return $this->hasOne(MainSubShoppingCategory::class,'id','sub_category_id')->select('id','submain_shopping_category_name');
    }

    public function brand()
    {
        return $this->hasOne(Brand::class,'id','brand_id')->select('id','brand_name');
    }

   

    public function setSizeAttribute($value)
    {
        $this->attributes['size'] = json_encode($value);
    }

    public function getSizeAttribute($value)
    {
        return json_decode($value);
    }


    public function getFeatureImagePathAttribute($value){
        return url('/').Storage::url($value);
    }


    public function getProductDiscountAttribute($value){
        return round($value);
    }

    public function getProductDescriptionAttribute($value){
        return strip_tags($value);
    }


    public function getCategoryProductList($request){

        $product_list = Product::where('main_category_id',$request->category_id)
                              ->select('id','product_name','product_special_price','product_mrp','product_discount','feature_image_path');
        
        if(!empty($request->size_id)){
            $product_list = $product_list->whereJsonContains('size', $request->size_id);
        }

        if(!empty($request->brand_id)){
            $product_list = $product_list->where('brand_id', $request->brand_id);
        }
        
        if(!empty($request->lowest_price) && !empty($request->highest_price)){
            $product_list = $product_list->whereBetween('product_special_price', [$request->lowest_price, $request->highest_price]);
        }

        if(!empty($request->sub_category_id)){
            $product_list = $product_list->where('sub_category_id', $request->sub_category_id);
        }

        if($request->limit != 0){
            $product_list = $product_list->offset($request->limit * $request->offset)->limit($request->limit);
        } 

        $product_list=$product_list->get();

        return $product_list;
    }
    
    public function getCategoryProductCount($request){
        $count = Product::where('status','active')
                       ->where('main_category_id',$request->category_id)    
                       ->count();
        return $count;
    }


    /**
     * get single product model function
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function getProduct($request){
        $product = Product::where('id', $request->product_id)
                        ->select('id','product_name','product_mrp','product_special_price',
                                'product_discount','product_description',
                                'feature_image_path','color','size','brand_id')
                        ->first();
        
        return $product;
    }

    public function wishlist(){
        return $this->hasMany(Wishlist::class);
     }

    

}
