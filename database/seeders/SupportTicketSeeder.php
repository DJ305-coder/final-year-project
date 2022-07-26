<?php

namespace Database\Seeders;
use Carbon\Carbon;
use DB;

use Illuminate\Database\Seeder;

class SupportTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post['ticketId'] = 'TICKET001';
        $post['name'] = 'John Doe';
        $post['subject'] = 'Lorem Ipsum Dolor Sit Amet, Consectetuer Adipiscing Elit.';
        $post['description'] = 'Lorem Ipsum Dolor Sit Amet, Consectetuer Adipiscing Elit.Lorem Ipsum Dolor Sit Amet, Consectetuer Adipiscing Elit.Lorem Ipsum Dolor Sit Amet, Consectetuer Adipiscing Elit.Lorem Ipsum Dolor Sit Amet, Consectetuer Adipiscing Elit.Lorem Ipsum Dolor Sit Amet, Consectetuer Adipiscing Elit.';
        $post['pending_remark'] = 'Pending Remark';
        $post['inprocess_remark'] = '';
        $post['completed_remark'] = '';
        $post['created_at'] = Carbon::now()->format('Y-m-d H:i:s');
        $post['created_by'] = '1';

        DB::table('trenta_support_ticket')->insert($post);
    }
}
