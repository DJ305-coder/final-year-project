<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;
class AppConfigController extends BaseController
{
    /**
     * This function is used to get all base url for app.
     *fun:- fun_app_get_base_url
     * @return \Illuminate\Http\Response
     */
    public function fun_app_get_base_url(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'app_key' => 'required|max:16',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        if ($request->app_key == "%Trenta*app#key%") {
             $data=array(
                'app_main_url' => url('/')."/api/",
                'app_testing_url' => url('/')."/trenta-testing/api/"
            );
            return $this->sendResponse($data, 'Base url found.');
        } else {
            return $this->sendError('Please enter valid app key', "", '403');
        }
    }
}
