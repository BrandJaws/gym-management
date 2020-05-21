<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ShopProduct extends Model
{
    protected $table = 'shop_products';
    protected $fillable = [
        'gym_id',
        'category_id',
        'name',
        'description',
        'price',
        'in_stock',
        'visible'
    ];
    public function productImage()
    {
        return $this->morphOne(Image::class, 'image');
    }

    public function category()
    {
        return $this->belongsTo(ShopCategory::class,'category_id');
    }

    public static function getProductList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'shop_products.*',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->where('shop_products.gym_id', '=', Auth::guard('employee')->user()->gym_id);
            if ($searchTerm) {
                $query->where('shop_products.category_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('shop_products.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('shop_products.description', 'like', '%' . $searchTerm . '%')
                    ->orWhere('shop_products.price', 'like', '%' . $searchTerm . '%')
                    ->orWhere('shop_products.visible', 'like', '%' . $searchTerm . '%')
                    ->orWhere('shop_products.in_stock', 'like', '%' . $searchTerm . '%');
            }
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }
}
