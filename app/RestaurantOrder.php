<?php

namespace App;

use App\Http\Models\RestaurantOrderDetail;
use Illuminate\Database\Eloquent\Model;

class RestaurantOrder extends Model
{
    protected $table = 'restaurant_orders';
    protected $fillable = [
        'id',
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
                'members.name as Member',
            ]
        )->where(function ($query) use ($gym_id, $searchTerm) {
            $query->where('restaurant_orders.gym_id', '=', $gym_id)->where('restaurant_orders.is_served', '=', "NO");
            if ($searchTerm) {
                $query->where('members.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('restaurant_orders.gross_total', 'like', '%' . $searchTerm . '%')
                    ->orWhere('restaurant_orders.created_at', 'like', '%' . $searchTerm . '%')
                    ->orWhere('restaurant_orders.in_process', 'like', '%' . $searchTerm . '%')
                    ->orWhere('restaurant_orders.is_served', 'like', '%' . $searchTerm . '%')
                    ->orWhere('restaurant_orders.is_ready', 'like', '%' . $searchTerm . '%');
            }
        })->leftJoin('members', function ($join) {
            $join->on('members.id', 'restaurant_orders.member_id');
        })->paginate($pageSize);
    }

    public static function getOrderDetail($id)
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
                'members.name as Member',
                'restaurant_order_details.quantity',
                'restaurant_order_details.sale_total',
                'restaurant_products.name',
                'restaurant_products.price'
            ]
        )->where(function ($query) use ($id) {
            $query->where('restaurant_orders.id', '=', $id);
        })->leftJoin('members', function ($join) {
            $join->on('members.id', 'restaurant_orders.member_id');
        })->leftJoin('restaurant_order_details', function ($join) {
            $join->on('restaurant_order_details.restaurant_order_id', 'restaurant_orders.id')
                ->join('restaurant_products', function ($join) {
                    $join->on('restaurant_products.id', 'restaurant_order_details.restaurant_product_id');
                });
        })->get();
    }
}
