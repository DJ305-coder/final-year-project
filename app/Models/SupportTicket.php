<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    use HasFactory;

    protected $table = 'trenta_support_ticket';

    protected $fillable = [
        'ticketId',
        'name',
        'subject',
        'description',
        'pending_remark',
        'inprocess_remark',
        'completed_remark',
        'ticket_status',
        'pending_to_inprocess',
        'inprocess_to_completed',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
        'status',
       
    ];
}
