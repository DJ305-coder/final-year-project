<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewArrivals extends Model
{
    use HasFactory;

    protected $table = 'trenta_new_arrival';

    protected $fillable = [
        'category_id',
        'sub_category_id',
        'product_id',
        'sequence_no',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
        'status',
    ];

    public function getFeatureImagePathAttribute($value)
    {
       return $image_path =  url("/").Storage::url($value);
    }

    public function category()
    {
        return $this->hasOne(MainShoppingCategory::class,'id','category_id')->select('id','main_shopping_category_name');
    }

    public function subCategory()
    {
        return $this->hasOne(MainSubShoppingCategory::class,'id','sub_category_id')->select('id','submain_shopping_category_name');
    }

    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id')->select('id','product_name');
    }
}
