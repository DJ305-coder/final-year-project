<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Cms extends Model
{
    use HasFactory;

    protected $table = 'trenta_cms';

    protected $fillable = [
        'page',
        'title',
        'content',
        'meta_title',
        'meta_keywords',
        'description',
        'cms_image_name',
        'cms_image_path',
        'created_ip_address',
        'modefied_ip_address',
        'created_by',
        'modefied_by',
    ];

    public function getCmsImagePathAttribute($value)
    {
       return $image_path =  url("/").Storage::url($value);
    }

    public function getContentAttribute($value){
        return strip_tags($value);
    }
}
