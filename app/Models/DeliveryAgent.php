<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\States;
use App\Models\City;
use Storage;

class DeliveryAgent extends Model
{
    use HasFactory;

    protected $table = 'trenta_delivery_agent';

    protected $fillable = [
        'country_id',
        'state_id',
        'city_id',
        'name',
        'email',
        'mobile',
        'dob',
        'gender',
        'salary',
        'address',
        'area',
        'profile_image_path',
        'profile_image_name',
        'aadhar_card_number',
        'aadhar_card_image_path',
        'aadhar_card_image_name',
        'pan_card_number',
        'pan_card_image_path',
        'pan_card_image_name',
        'DL_number',
        'DL_image_path',
        'DL_image_name',
        'RC_book_number',
        'RC_image_path',
        'RC_image_name',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
        'status',
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

    public function getProfileImagePathAttribute($value){
        return url('/').Storage::url($value);
    }

    public function getAadharCardImagePathAttribute($value){
        return url('/').Storage::url($value);
    }

    public function getPanCardImagePathAttribute($value){
        return url('/').Storage::url($value);
    }

    public function getDLImagePathAttribute($value){
        return url('/').Storage::url($value);
    }

    public function getRCImagePathAttribute($value){
        return url('/').Storage::url($value);
    }
}
