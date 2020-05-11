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
        'net_total',
        'created_at'
    ];

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public static function getOrderList($gym_id, $pageSize, $searchTerm)
    {
        return self::select([
                'restaurant_orders.id',
                'restaurant_orders.gym_id',
                'restaurant_orders.member_id',
                'restaurant_orders.in_process',
                'restaurant_orders.is_ready',
                'restaurant_orders.is_served',
                'restaurant_orders.gross_total',
                'restaurant_orders.vat',
                'restaurant_orders.net_total',
                'restaurant_orders.created_at',
            ]
        )->where(function ($query) use ($gym_id, $searchTerm) {
            $query->where('restaurant_orders.gym_id', '=', $gym_id);
            if ($searchTerm) {
                $query->where('restaurant_orders.member_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('restaurant_orders.gross_total', 'like', '%' . $searchTerm . '%')
                    ->orWhere('restaurant_orders.created_at', 'like', '%' . $searchTerm . '%')
                    ->orWhere('restaurant_orders.in_process', 'like', '%' . $searchTerm . '%')
                    ->orWhere('restaurant_orders.is_served', 'like', '%' . $searchTerm . '%')
                    ->orWhere('restaurant_orders.is_ready', 'like', '%' . $searchTerm . '%');
            }
        })->paginate($pageSize);
    }

}
