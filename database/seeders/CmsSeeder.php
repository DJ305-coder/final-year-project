<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = [];

        $post['page'] = 'About Us';
        $post['content'] = 'Demo Content';
        $post['meta_title'] = 'Demo meta_title';
        $post['meta_keywords'] = 'Demo meta_keywords';
        $post['description'] = 'Demo description';
        $post['cms_image_path'] = '';
        $post['cms_image_name'] = '';
        $post['created_at'] = Carbon::now()->format('Y-m-d H:i:s');
        $post['updated_at'] = Carbon::now()->format('Y-m-d H:i:s');

        DB::table('trenta_cms')->insert($post);
    }
}
