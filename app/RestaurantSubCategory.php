<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantSubCategory extends Model
{
    protected $table = 'restaurant_sub_categories';
    public $fillable = [
        "gym_id",
        "restaurant_main_category_id",
        'name'
    ];

    public function subCategoryImage()
    {
        return $this->morphOne(Image::class, 'image');
    }

    public static function getSubCategoryList($id)
    {
        return self::select([
                'restaurant_sub_categories.id',
                'restaurant_sub_categories.gym_id',
                'restaurant_sub_categories.restaurant_main_category_id',
                'restaurant_sub_categories.name',
                'restaurant_main_categories.name as Category'
            ]
        )->where(function ($query) use ($id) {
            $query->where('restaurant_sub_categories.restaurant_main_category_id', '=', $id);
        })->leftJoin('restaurant_main_categories', function ($join) {
            $join->on('restaurant_main_categories.id', 'restaurant_sub_categories.restaurant_main_category_id');
        })->get();
    }

}
