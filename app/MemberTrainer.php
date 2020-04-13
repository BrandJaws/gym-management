<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberTrainer extends Model
{
    protected $table = 'member_trainers';

    protected $fillable = [
        'gym_id',
        'member_id',
        'trainer_id',
    ];
}
