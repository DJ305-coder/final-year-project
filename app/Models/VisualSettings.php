<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class VisualSettings extends Model
{
    use HasFactory;

    protected $table = 'trenta_visual_settings';

    protected $fillable = [
        'logo_image_path',
        'logo_image_name',
        'logo_email_image_path',
        'logo_email_image_name',
        'favicon_image_path',
        'favicon_image_name',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
        'status'
    ];

    public function getLogoImagePathAttribute($value){
        return url('/').Storage::url($value);
    }

    public function getLogoEmailImagePathAttribute($value){
        return url('/').Storage::url($value);
    }

    public function getFaviconImagePathAttribute($value){
        return url('/').Storage::url($value);
    }
}
