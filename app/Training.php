<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Training extends Model
{
    protected $table = 'training';
    protected $fillable = [
        'gym_id',
        'trainer_id',
        'name',
        'description',
        'seats',
        'sessions',
        'price',
        'promotionContent',
        'promotionType',
        'startDate',
        'endDate',
        'status',
    ];

    public function userImage()
    {
        return $this->morphOne(Image::class, 'image');
    }
    public function trainer()
    {
        return $this->belongsTo(Trainer::class, 'trainer_id');
    }

    public static function getTrainingList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'training.*',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->where('training.gym_id', '=', Auth::guard('employee')->user()->gym_id);
            if ($searchTerm) {
                $query->where('training.trainer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('training.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('training.description', 'like', '%' . $searchTerm . '%')
                    ->orWhere('training.seats', 'like', '%' . $searchTerm . '%')
                    ->orWhere('training.sessions', 'like', '%' . $searchTerm . '%')
                    ->orWhere('training.price', 'like', '%' . $searchTerm . '%')
                    ->orWhere('training.startDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('training.endDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('training.status', 'like', '%' . $searchTerm . '%');
            }
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }
}
