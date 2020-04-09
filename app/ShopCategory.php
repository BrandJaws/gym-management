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
}
