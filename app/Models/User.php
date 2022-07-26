<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use carbon;
use App\Models\Country;
use App\Models\States;
use App\Models\City;
use App\Models\Wishlist;
use Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "trenta_users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'username',
        'gender',
        'date_of_birth',
        'phone_number',
        'state_id',
        'city_id',
        'area_id',
        'pincode',
        'address',
        'profile_image_name'
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }

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

    public function getProfileImageAttribute($value){
        return url('/').Storage::url($value);
    }

    public function getPhoneNumberAttribute($value){
        return strval($value);
    }

    public function getCoverImageAttribute($value){
        return url('/').Storage::url($value);
    }

}
