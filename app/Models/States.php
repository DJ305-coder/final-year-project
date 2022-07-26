<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\City;
use App\Models\CouponCode;
use App\Models\BannerAds;
class States extends Model
{
    use HasFactory;

    protected $table = 'trenta_master_states';

    protected $fillable = [
       
        'country_id',
        'state_name',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
       
    ];

    
    public function country()
    {
        return $this->hasOne(Country::class,'id','country_id')->select('id','country_name');
    }

    public function city()
    {
        return $this->hasMany(City::class);
    }

    public function coupon_code()
    {
        return $this->hasMany(CouponCode::class);
    }

    public function banner_ads()
    {
        return $this->hasMany(BannerAds::class);
    }
}
