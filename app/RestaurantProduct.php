<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantProduct extends Model
{
    protected $table = 'restaurant_products';
    public $fillable = [
        "gym_id",
        "restaurant_sub_category_id",
        "name",
        "description",
        "image",
        "price",
        "in_stock",
        "visible",
        "ingredients"
    ];

    protected $casts = [
        'ingredients' => 'array',
    ];

}
