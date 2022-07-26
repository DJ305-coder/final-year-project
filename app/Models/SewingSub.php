<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SewingMain;
use App\Models\Product;
use Storage;
class SewingSub extends Model
{
    use HasFactory;

    protected $table = 'trenta_sewing_sub_category';
    protected $fillable = [
        'category_id',
        'sub_category_name',
        'category_image',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];

    public function main_category()
    {
        return $this->hasOne(SewingMain::class,'id','category_id')->select('id','sewing_category_name');
    }

    public function product(){
        return $this->hasOne(Product::class, 'id','product_id');
    }

    public function getCategoryImageAttribute($value){
        return url('/').Storage::url($value);
    }
}
