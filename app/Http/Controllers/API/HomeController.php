<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
class HomeController extends BaseController
{
    //
    public function get_homepage_data_arr_list(){
        
        $data['banner_ads'] =  \App\Models\BannerAds::getBannerList();
        $data['main_category'] =  \App\Models\MainShoppingCategory::getMainCategory();      
        $data['sewing_main_category'] = \App\Models\SewingMain::getSewingCategoryList();
        if(!empty($data)){
            return $this->sendResponse($data, 'Data found.');
        }else{
            return $this->sendError('Data not found', "", '500');
        }
    }

   
}
