<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantMainCategory extends Model
{
    protected $table = 'pipeline';
    protected $fillable = [
        'gym_id',
        'name',
        'icon'
    ];

    public function sub_categories(){
        return $this->hasMany(RestaurantSubCategory::class,'restaurant_main_category_id');
    }
}
