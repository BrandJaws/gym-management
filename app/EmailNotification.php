<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailNotification extends Model
{
    protected $table = 'email_notifications';
    protected $fillable = [
        'gym_id',
        'member_id',
        'lead_id',
        'employee_id',
        'trainer_id',
        'status',
        'subject',
        'message',
    ];
}
