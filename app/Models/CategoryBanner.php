<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;
class CategoryBanner extends Model
{
    use HasFactory;
    protected $table = 'trenta_shopping_category_banners';
    protected $fillable = [
        'category_id',
        'banner_image_path', 
        'banner_image_name',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];

    public function getCategoryBanner($request){
        $banners = CategoryBanner::where('category_id', $request->category_id)
                                ->select('banner_image_path','id')    
                                ->get();
        return $banners;
    }

    public function getBannerImagePathAttribute($value){
        return url('/').Storage::url($value);
    }
}
