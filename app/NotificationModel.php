<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationModel extends Model
{
    protected $table = 'notifications';
    protected $fillable = [
        'gym_id',
        'type',
        'notifiable_type',
        'notifiable_id',
        'data',
        'read_at',
    ];
}
