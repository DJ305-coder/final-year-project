<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminLogActivity extends Model
{
    use HasFactory;
    protected $table = 'trenta_admin_system_logs';
    protected $fillable = [
        'new_data', 'old_data', 'model', 'user_type', 'url', 'action', 'method', 'ip', 'agent', 'user_id'
    ];
}
