<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MainShoppingCategory;
use App\Models\CouponCode;

class MainSubShoppingCategory extends Model
{
    use HasFactory;

    protected $table = 'trenta_master_submain_shopping_category';
    protected $fillable = [
        'category_id',
        'submain_shopping_category_name',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];

    public function main_category()
    {
        return $this->hasOne(MainShoppingCategory::class,'id','category_id')->select('id','main_shopping_category_name');
    }

    public function coupon_code()
    {
        return $this->hasMany(CouponCode::class);
    }

    // public function products()
    // {
    //     return $this->hasMany(\App\Models\Brand::class);
    // }

    // public function categories() {return $this->belongsTo('Category');}
    public function products() {
        return $this->hasManyThrough('App\Models\Product', 'App\Models\MainShoppingCategory','sub_category_id','main_category_id','id');
    }


    public function getSubCategory($request){
        $sub_categories = MainSubShoppingCategory::where('category_id', $request->category_id)
                                                ->select('submain_shopping_category_name','id')
                                                ->get();
        return $sub_categories;
    }


    
}
