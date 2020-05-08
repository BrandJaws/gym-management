<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantOrder extends Model
{
    protected $table = 'restaurant_orders';
    protected $fillable = [
        'gym_id',
        'member_id',
        'in_process',
        'is_ready',
        'is_served',
        'gross_total',
        'vat',
        'net_total'
    ];

    public function member(){
        return $this->belongsTo(Member::class);
    }

}
