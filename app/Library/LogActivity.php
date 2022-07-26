<?php


namespace App\Library;
use Request;
use App\Models\AdminLogActivity;

class LogActivity
{


    public static function AdminLog($new_data,$old_data,$model,$action,$user_type)
    {
			$log = [];
			$log['new_data'] = $new_data;
			$log['old_data'] = $old_data;
			$log['model'] = $model;
			$log['action'] = $action;
			$log['url'] = Request::fullUrl();
			$log['method'] = Request::method();
			$log['ip'] = Request::ip();
			$log['agent'] = Request::header('user-agent');
			$log['user_id'] = auth()->guard('admin')->user()->id;
			$log['user_type'] = $user_type;
			AdminLogActivity::create($log);
    }

}