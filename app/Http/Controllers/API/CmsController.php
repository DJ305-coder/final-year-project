<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Cms;
use App\Models\FAQ;
class CmsController extends BaseController
{
    //
    public function get_cms_content(){

        $data['about_us'] = Cms::where('id',1)->select('id','title','content','cms_image_path')->first();
        $data['refund_and_pricing_policy'] = Cms::where('id',2)->select('id','title','content','cms_image_path')->first();
        $data['privacy_policy'] = Cms::where('id',3)->select('id','title','content','cms_image_path')->first();
        $data['term_and_condition'] = Cms::where('id',4)->select('id','title','content','cms_image_path')->first();
        
        if(($data)){
            return $this->sendResponse($data, 'Data found.');
        }else{
            return $this->sendError('Data not found', "", 404);
        } 
    }

    public function get_faq(){
        $data = FAQ::where('status','active')->select('id','question','answer')->get();
        if(($data->isNotEmpty())){
            return $this->sendResponse($data, 'Data found.');
        }else{
            return $this->sendError('Data not found', "", 404);
        } 
    }
}
