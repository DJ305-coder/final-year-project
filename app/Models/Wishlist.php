<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
class Wishlist extends Model
{
    use HasFactory;
    protected $table = "trenta_wishlist";

    protected $fillable=['product_id','user_id','category_id','sub_category_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function check_user_wishlist_product($product_id){
        $wishlist = Wishlist::where('product_id',$product_id)
                            ->where('user_id',\Auth::user()->id)
                            ->first();
        return $wishlist;
    }
}
