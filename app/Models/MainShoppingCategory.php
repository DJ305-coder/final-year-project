<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MainSubShoppinCategory;
use App\Models\CouponCode;
use App\Models\Product;
use Storage;
class MainShoppingCategory extends Model
{
    use HasFactory;
    protected $table = "trenta_master_main_shopping_category";
    protected $fillable = [
        'main_shopping_category_name', 
        'category_image',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];

    public function sub_category(){
        return $this->hasMany(MainSubShoppingCategory::class);
    }

    public function coupon_code()
    {
        return $this->hasMany(CouponCode::class);
    }

    public function getCategoryImageAttribute($value){
        return url('/').Storage::url($value);
    }

    public function getMainCategory(){
        $main_category = MainShoppingCategory::whereStatus('active')
                                    ->select('category_type','category_image','id','main_shopping_category_name')
                                    ->get();
        return $main_category;
    }

    public function products(){
        return $this->hasMany(Product::class, 'sub_category_id');
    }

    public function get_category_detail($category_id){

        $category_detail = MainShoppingCategory::where('id',$category_id)
                            ->select('main_shopping_category_name','category_image','id')
                            ->first();

        return $category_detail;
    }

    public function product(){
        return $this->hasMany(Product::class, 'main_category_id');
    }

   
   
}
