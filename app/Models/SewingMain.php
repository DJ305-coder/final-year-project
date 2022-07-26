<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SewingSub;
use Storage;
class SewingMain extends Model
{
    use HasFactory;
    protected $table = 'trenta_sewing_main_category';
    protected $fillable = [
        'sewing_category_name',
        'category_image', 
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];

    public function sub_category(){
        return $this->hasMany(SewingSub::class);
    }

    public function getSewingCategoryList(){
        $sewing_main_category = SewingMain::where('status','active')
                                            ->select('category_image','sewing_category_name','id')
                                            ->get();
        return $sewing_main_category;
    }


    public function getCategoryImageAttribute($value){
        return url('/').Storage::url($value);
    }
    

  

}
