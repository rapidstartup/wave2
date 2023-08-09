<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    public $table = 'support_tickets';
    public $fillable = [
        'subject',
        'message',
        'email',
        'file'
    ];
    use HasFactory;
}
