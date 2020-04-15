<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingGroup extends Model
{
    protected $table = 'training_groups';

    protected $fillable = [
        'gym_id',
        'member_id',
        'training_id',
    ];

    public function members()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function training()
    {
        return $this->belongsTo(Training::class, 'training_id');
    }
}
