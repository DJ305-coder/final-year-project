<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\States;
use App\Models\City;
use App\Models\MainShoppingCategory;
use App\Models\MainSubShoppingCategory;
use Storage;
class BannerAds extends Model
{
    use HasFactory;
    protected $table = 'trenta_master_banner_ads';

    protected $fillable = [
        'country_id',
        'state_id',
        'cities',
        'fromdate',
        'todate',
        'city_areas',
        'ad_sequence_number',
        'ad_url',
        'banner_image_path',
        'banner_image_name',
        'main_category_id',
        'sub_category_id',
        'product_id',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by'
    ];

    public function country()
    {
        return $this->hasOne(Country::class,'id','country_id')->select('id','country_name');
    }

    public function states()
    {
        return $this->hasOne(States::class,'id','state_id')->select('id','state_name');
    }

    public function cities()
    {
        return $this->hasOne(City::class,'id','city_id')->select('id','city_name');
    }

    public function main_category()
    {
        return $this->hasOne(MainShoppingCategory::class,'id','main_category_id')->select('id','main_shopping_category_name');
    }

    public function sub_category()
    {
        return $this->hasOne(MainSubShoppingCategory::class,'id','sub_category_id')->select('id','submain_shopping_category_name');
    }

    public function getBannerList(){
        $banner_ads = BannerAds::where('status','active')
                                ->select('banner_image_path','ad_url')
                                ->get();
        return $banner_ads;        
    }

    public function getBannerImagePathAttribute($value)
    {
        return url('/').Storage::url($value);
    }
}
