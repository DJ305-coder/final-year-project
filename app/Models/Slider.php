<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'trenta_master_sliders';

    protected $fillable = [
        'title',
        'slider_image',
        'created_ip_address',
        'modefied_ip_address',
        'created_by',
        'modefied_by',
    ];

    public function getSliderImageAttribute($value)
    {
        return url('/').Storage::url($value);
    }
}
