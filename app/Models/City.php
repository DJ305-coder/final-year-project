<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\States;
use App\Models\Area;
use App\Models\CouponCode;
use App\Models\DeliveryAgent;

class City extends Model
{
    use HasFactory;

    protected $table = 'trenta_master_city';

    protected $fillable = [
        'country_id',
        'state_id',
        'city_name',
        'created_ip_address',
        'modefied_ip_address',
        'created_by',
        'modefied_by',
    ];

    public function areas()
    {
        return $this->hasMany(Area::class);
    }

    public function coupon_code()
    {
        return $this->hasMany(CouponCode::class);
    }

    public function country()
    {
        return $this->hasOne(Country::class,'id','country_id')->select('id','country_name');
    }

    public function states()
    {
        return $this->hasOne(States::class,'id','state_id')->select('id','state_name');
    }

    public function delivery_agent()
    {
        return $this->hasMany(DeliveryAgent::class);
    }

}
