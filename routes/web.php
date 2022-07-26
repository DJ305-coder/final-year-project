<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Admin\Login\LoginController;
use App\Http\Controllers\Admin\Login\ForgotController;
use App\Http\Controllers\Admin\Master\CountryController;
use App\Http\Controllers\Admin\Master\StateController;
use App\Http\Controllers\Admin\Master\CityController;
use App\Http\Controllers\Admin\Master\MainShoppingCategoryController;

use App\Http\Controllers\Admin\Master\SliderController;
use App\Http\Controllers\Admin\CmsController;

use App\Http\Controllers\Admin\DeliveryAgentController;
use App\Http\Controllers\Admin\RegisteredUsersController;
use App\Http\Controllers\Admin\EmailSettingsController;
use App\Http\Controllers\Admin\GeneralSettingsController;
use App\Http\Controllers\Admin\VisualSettingsController;

/*
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/link', function () {
    Artisan::call('storage:link');
    return 'link successfully done!';
});

Route::get('/clear', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return 'cache clear done!';
});


Route::group(['middleware' => 'prevent-back-history'], function () {
    Route::get('/', [LoginController::class, 'index']);
});
Route::post('admin-login', [LoginController::class, 'admin_login']);


// forgot routes
Route::get('forgot-password', [ForgotController::class, 'forgot_password_view']);
Route::post('send-otp', [ForgotController::class, 'send_otp']);
Route::get('check-otp', function(){
    if(Session::has('email')){
        return view('admin.login.otp');
    }else{
        abort('404');
    }
});

Route::get('check',function(){
    return session('email');
});

Route::post('otp-verify', [ForgotController::class, 'otp_verify']);
Route::get('reset-password', [ForgotController::class, 'reset_password_view']);
Route::post('new-password', [ForgotController::class, 'reset_password']);

Route::group(['middleware' => ['prevent-back-history', 'admin']], function () {
    
    Route::get('common-delete', [BaseController::class, 'delete']);
    Route::post('change-status', [BaseController::class, 'status'])->name('change-status');
    
    // Get State List and City List
    //dashboard
    Route::view('dashboard','admin/dashboard/vw_dashboard')->name('dashboard');
    
    // Get State List
    Route::post('state-list', [BaseController::class,'state_list']);
    
    // Get city List
    Route::post('city-list', [BaseController::class,'city_list']);
    
    // Get area List
    // Route::post('area-list', [BaseController::class,'area_list']);

    Route::post('state-list', [BaseController::class,'state_list']);

    Route::resource('country', CountryController::class, [
        'only' => ['index','store','edit']
    ]);
    Route::get('country-data-table', [CountryController::class,'data_table']);
    Route::post('/country-exists',[CountryController::class,'country_exists']);

    //master main shopping
    Route::resource('online-shopping-main-category', MainShoppingCategoryController::class, [
        'only' => ['index','store','edit']
    ]);
    Route::get('main-shopping-category-data-table', [MainShoppingCategoryController::class,'data_table']);
    Route::post('/main-category-exists',[MainShoppingCategoryController::class,'main_category_exists']);

    Route::get('dashboard/cms',[CmsController::class,'index'])->name('cms');
    Route::post('dashboard/cms/cms-data', [CmsController::class,'show'])->name('cms_data');
    Route::post('dashboard/cms/edit-cms', [CmsController::class,'edit'])->name('edit_cms');
    
    // CMS
    Route::get('cms',[CmsController::class,'index']);
    Route::post('cms/edit-cms', [CmsController::class,'edit']);
    Route::post('cms/update-cms', [CmsController::class,'update'])->name('update_cms');
    
    // State
    Route::resource('states', StateController::class, [
        'only' => ['index','store','edit']
    ]);
    Route::get('states-data-table', [StateController::class,'data_table']);
    Route::post('/state-exists',[StateController::class,'state_exists']);

    // City
    Route::resource('city', CityController::class, [
        'only' => ['index','store','edit']
    ]);
    Route::get('city-data-table', [CityController::class,'data_table']);
    Route::post('/city-exists',[CityController::class,'city_exists']);

    // Area
    Route::resource('area', AreaController::class, [
        'only' => ['index','store','edit']
    ]);
    Route::get('area-data-table', [AreaController::class,'data_table']);
    Route::post('/area-exists',[AreaController::class,'area_exists']);
    Route::post('/pincode-exists',[AreaController::class,'pincode_exists']);

    // welcome slider
    Route::resource('sliders', SliderController::class, [
        'only' => ['index','store','edit']
    ]);
    Route::get('slider-image-data-table', [SliderController::class,'data_table']);
 
    // Deliver Agent
    Route::get('business-list',[DeliveryAgentController::class, 'deliver_agent_list']);
    Route::get('delivery-agent-data-table',[DeliveryAgentController::class, 'data_table']);
    Route::resource('add-delivery-agent', DeliveryAgentController::class, [
        'only' => ['index','store','show','edit']
    ]);

    // Registered Users List
    Route::resource('registered-users-list', RegisteredUsersController::class,[
        'only'=> ['index','show']
    ]);
    Route::get('registered-users-list-data-table',[RegisteredUsersController::class,'data_table']);

    // Email Settings
    Route::resource('email-settings', EmailSettingsController::class, [
        'only' => ['index', 'store']
    ]);

    // General Settings
    Route::get('general-settings/contact-settings',[GeneralSettingsController::class, 'index']);
    Route::get('general-settings/social-media-settings',[GeneralSettingsController::class, 'social_media_index']);
    Route::post('general-settings/store', [GeneralSettingsController::class,'store']);
   
    // Visual Settings
    Route::resource('visual-settings', VisualSettingsController::class, [
        'only' => ['index', 'store']
    ]);

    // Change password
    Route::get('change-password',[LoginController::class, 'change_password_view']);
    Route::post('change-password',[LoginController::class, 'change_password']);

    Route::get('logout', [LoginController::class, 'logout']);
});
