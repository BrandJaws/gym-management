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
    public function productImage()
    {
        return $this->morphOne(Image::class, 'image');
    }

    public static function getProductsList($id)
    {
        return self::select([
                'restaurant_products.id',
                'restaurant_products.restaurant_sub_category_id',
                'restaurant_products.name',
                'restaurant_products.description',
                'restaurant_products.price',
                'restaurant_products.in_stock',
                'restaurant_products.visible',
                'restaurant_products.ingredients',
            ]
        )->where(function ($query) use ($id) {
            $query->where('restaurant_products.restaurant_sub_category_id', '=', $id);
        })->leftJoin('restaurant_sub_categories', function ($join) {
            $join->on('restaurant_sub_categories.id', 'restaurant_products.restaurant_sub_category_id');
        })->get();
    }

}
