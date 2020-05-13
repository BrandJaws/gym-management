<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantMainCategory extends Model
{
    protected $table = 'restaurant_main_categories';
    protected $fillable = [
        'gym_id',
        'name',
    ];

    public function sub_categories(){
        return $this->hasMany(RestaurantSubCategory::class,'restaurant_main_category_id');
    }

    public function categoryImage()
    {
        return $this->morphOne(Image::class, 'image');
    }

    public static function getCategoryList($gym_id)
    {
        return self::select([
                'restaurant_main_categories.id',
                'restaurant_main_categories.gym_id',
                'restaurant_main_categories.name',
            ]
        )->where(function ($query) use ($gym_id) {
            $query->where('restaurant_main_categories.gym_id', '=', $gym_id);
        })->get();
    }

}
