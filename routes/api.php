<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\ForgotController;
use App\Http\Controllers\API\AppConfigController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\Master\MasterController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\WishlistController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CmsController;
use App\Http\Controllers\API\AddressController;
/*;
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('unauthorized-user', function(){
    return response()->json(['status' => 401,'message' => 'unauthorized user'], 401);
})->name('unauthorized-user');

Route::post('app-base-url', [AppConfigController::class, 'fun_app_get_base_url']);

// user register and login api
Route::post('user-register', [LoginController::class, 'user_register']);
Route::post('user-login', [LoginController::class, 'user_login']);


Route::post('user-forgot-password', [ForgotController::class, 'resetPassword']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('change-password', [LoginController::class,'change_password']);
});


Route::get('splash-screen-slider',[LoginController::class, 'splash_screen_slider']);

Route::middleware('auth:sanctum')->group( function () {
  
    Route::get('user-details', [LoginController::class,'user_details']);
    Route::post('user-logout',  [LoginController::class, 'user_logout']);

    //homepage data list
    Route::get('get-homepage-data', [HomeController::class, 'get_homepage_data_arr_list']);
    
    // //get country list
    // Route::get('get-country-list', [MasterController::class, 'get_countries']);
    
    //state  list
    Route::get('get-state-list', [MasterController::class, 'state_list']);
    
    //state  list
    Route::post('get-city-list', [MasterController::class, 'cities_list']);
    
    // area list
    Route::post('get-area-list', [MasterController::class, 'area_list']);

    // get shoppinng category list
    Route::get('get-shopping-category-list', [MasterController::class, 'get_shopping_category_list']);

    //  get shopping sub category list
    Route::post('get-shopping-sub-category-list', [MasterController::class, 'get_shopping_sub_categpry']);
    
    // get sewing category list
    Route::get('get-sewing-category-list', [MasterController::class, 'get_sewing_category_list']);

    //  get shopping sub category list
    Route::post('get-sewing-sub-category-list', [MasterController::class, 'get_sewing_sub_categpry']);

    // get product list
    Route::get('get-product-list', [ProductController::class,'get_product_list']);

    // get category product list
    Route::post('get-category-product-list', [ProductController::class,'get_category_product_list']);

    //get  category detail
    Route::post('get-category-detail', [ProductController::class,'get_category_detail']);
    
    // get category product detail 
    Route::post('get-category-product-detail', [ProductController::class, 'get_category_product_detail']);
    
    // get new arrivals
    Route::get('get-new-arrivals',[ProductController::class, 'get_new_arrivals']);

    // get-best-sellers
    Route::get('get-best-sellers',[ProductController::class, 'get_best_sellers']);

    // add product into wishlist 
    Route::post('add-product-to-wishlist', [WishlistController::class,'add_product_to_wishlist']);

    // remove product from wishlist
    Route::post('remove-product-from-wishlist', [WishlistController::class,'remove_product_from_wishlist']);

    // get wishlist
    Route::get('get-wishlist', [WishlistController::class,'get_wishlist']);
    

    //user profile 
    Route::get('user-profile',[UserController::class, 'get_user_profile']);

    //edit user profile
    Route::post('edit-user-profile',[UserController::class,'edit_user_profile']);

    // get cms content
    Route::get('get-cms-content', [CmsController::class,'get_cms_content']);

    // get faq 
    Route::get('get-faqs',[CmsController::class,'get_faq']);

    // add user address 
    Route::post('add-user-address', [AddressController::class, 'add_user_address']);

    // get user address list 
    Route::get('get-user-address-list',[AddressController::class, 'get_user_address_list']);
    
    // user address delete
    Route::post('delete-user-address',[AddressController::class, 'delete_user_address']);
    

});

