<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model
{
    protected $table = 'shop_categories';
    protected $fillable = [
        'gym_id',
        'name',
    ];

    public static function getCategoryList($categoryId, $pageSize, $searchTerm)
    {
        return self::select([
                'shop_categories.id',
                'shop_categories.name',
                'shop_categories.gym_id',
            ]
        )->where(function ($query) use ($categoryId, $searchTerm) {
            $query->where('shop_categories.gym_id', '=', $categoryId);
            if ($searchTerm) {
                $query->where('shop_categories.id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('shop_categories.name', 'like', '%' . $searchTerm . '%');
            }
        })->paginate($pageSize);
    }

    public function categoryImage()
    {
        return $this->morphOne(Image::class, 'image');
    }
}
