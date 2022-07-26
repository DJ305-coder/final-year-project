<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class GeneralSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = [];

        $post['contact_email'] = 'mplussoftesting@gmail.com';
        $post['contact_phone'] = '9876543210';
        $post['contact_mobile'] = '9876543210';
        $post['contact_address'] = 'Address';
        $post['contact_latitude'] = '35';
        $post['contact_longitude'] = '37';
        $post['social_media_facebook_url'] = 'https://www.youtube.com/';
        $post['social_media_twitter_url'] = 'https://www.youtube.com/';
        $post['social_media_instagram_url'] = 'https://www.youtube.com/';
        $post['social_media_pinterest_url'] = 'https://www.youtube.com/';
        $post['social_media_linkedin_url'] = 'https://www.youtube.com/';
        $post['social_media_website_url'] = 'https://www.youtube.com/';
        $post['social_media_youtube_url'] = 'https://www.youtube.com/';
        $post['created_at'] = Carbon::now()->format('Y-m-d H:i:s');
        $post['updated_at'] = Carbon::now()->format('Y-m-d H:i:s');

        DB::table('trenta_general_settings')->insert($post);
    }
}
