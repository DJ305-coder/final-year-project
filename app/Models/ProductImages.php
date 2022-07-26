<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImages;
use Storage;

class ProductImages extends Model
{
    use HasFactory;

    protected $table = "trenta_shopping_product_images";

    protected $fillable = [
        'product_id',
        'product_image_path',
        'product_image_name',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];

    public function getProductImagePathAttribute($value){
        return url('/').Storage::url($value);
    }
}
