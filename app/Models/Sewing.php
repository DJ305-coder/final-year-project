<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SewingMain;
use App\Models\SewingSub;
class Sewing extends Model
{
    use HasFactory;
    protected $table = "trenta_sewing_products";

    protected $fillable = [
        'main_category_id',
        'sub_category_id',
        'product_name',
        'product_mrp',
        'offer_price',
        'product_description',
        'search_keywords',
        'feature_image_path',
        'feature_image_name',
        'stiching_price',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];



    public function main_category()
    {
        return $this->hasOne(SewingMain::class,'id','main_category_id')->select('id','sewing_category_name');
    }

    public function sub_category()
    {
        return $this->hasOne(SewingSub::class,'id','sub_category_id')->select('id','sub_category_name');
    }
}
