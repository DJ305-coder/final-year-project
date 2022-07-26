<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'trenta_master_brand';

    protected $fillable = [
        'brand_name',
        'created_ip_address',
        'modefied_ip_address',
        'created_by',
        'modefied_by',
    ];

    public function products()
    {
        return $this->hasMany(\App\Models\Product::class);
    }

  
    public function getAllBrands(){
        $brands = Brand::where('status','active')
                        ->select('brand_name','id')
                        ->get();
        return $brands;
    }

    public function getProductBrand($brand_id){
        $brand = Brand::where('id',$brand_id)
                        ->select('brand_name','id')
                        ->first();
        return $brand;
    }
}
