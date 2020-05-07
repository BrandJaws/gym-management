<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public static function getTrainingGroupList($gym_id,$id)
    {
        return self::select([
                'training_groups.id',
                'training_groups.gym_id',
                'training_groups.member_id',
                'training_groups.training_id',
                'members.name as Member',
            ]
        )->where(function ($query) use ($gym_id,$id) {
            $query->where('training_groups.gym_id', $gym_id)->where('training_groups.training_id', $id);
        })->leftJoin('members', function ($join) {
            $join->on('members.id', 'training_groups.member_id');
        })->get();
    }

    public static function getTrainingGroupEditList($id)
    {
        $post = DB::table('training_groups')
            ->leftJoin('members', 'training_groups.member_id', '=', 'members.id')
            ->where('training_groups.id', $id)
            ->select(
                'training_groups.id',
                'training_groups.gym_id',
                'training_groups.member_id',
                'training_groups.training_id',
                'members.name as Member'
            )
            ->first();
        return $post;
    }
}
