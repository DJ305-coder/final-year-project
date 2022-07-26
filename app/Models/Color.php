<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $table = "trenta_master_colors";

    protected $fillable = [
        'color_name',
        'color_code',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];


    public function getProductColor($request){
        $color = Color::whereIn('id',explode(",",$request))
                    ->select('id','color_name','color_code')
                    ->get();
        return $color;
    }

}
