<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\States;

class Country extends Model
{
    use HasFactory;
    protected $table = "trenta_master_countries";
    protected $fillable = [
        'country_name',
        'country_code',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];

    public function states(){
        return $this->hasMany(States::class);
    }

    
}
