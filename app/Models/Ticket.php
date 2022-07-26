<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    
    protected $table = 'trenta_master_ticket_type';

    protected $fillable = [
        'ticket_type',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];
}
