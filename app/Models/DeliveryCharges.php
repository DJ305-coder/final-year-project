<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryCharges extends Model
{
    use HasFactory;

    protected $table = 'trenta_master_delivery_charges';

    protected $fillable = [
        'order_amount',
        'delivery_charge',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by'
    ];

}
