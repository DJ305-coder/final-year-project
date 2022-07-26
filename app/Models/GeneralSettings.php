<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSettings extends Model
{
    use HasFactory;

    protected $table = 'trenta_general_settings';

    protected $fillable = [
        'contact_email',
        'contact_phone',
        'contact_mobile',
        'contact_address',
        'contact_latitude',
        'contact_longitude',
        'social_media_facebook_url',
        'social_media_twitter_url',
        'social_media_instagram_url',
        'social_media_pinterest_url',
        'social_media_linkedin_url',
        'social_media_website_url',
        'social_media_youtube_url',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
        'status'
    ];
}
