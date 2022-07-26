<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $table = 'trenta_master_size';


    protected $fillable = [
        'size',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];

    public function getSizes(){
        $sizes = Size::where('status','active')
                    ->select('size','id')
                    ->get();
        return $sizes;
    }

  
}
