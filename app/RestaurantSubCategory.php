<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantSubCategory extends Model
{
    protected $table = 'restaurant_sub_categories';
    public $fillable = [
        "gym_id",
        "restaurant_main_category_id"
    ];
}
