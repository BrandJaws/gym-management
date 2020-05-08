<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantOrderDetail extends Model
{
    protected $table = 'restaurant_order_details';
    protected $fillable = [
        'gym_id',
        'restaurant_order_id',
        'restaurant_product_id',
        'quantity',
        'sale_total',
    ];

    public function restaurant_order(){
        return $this->belongsTo(RestaurantOrder::class);
    }
}
