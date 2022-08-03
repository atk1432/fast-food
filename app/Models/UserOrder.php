<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Models\Status;


class UserOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'phone_number',
        'address',
        'info_for_shipper',
        'status'
    ];

    public function products() {
        return $this->belongsToMany(Product::class, 'orders')
                    ->withPivot('number');
    }

    public static function getTotal($user_order_id) {

        $user_order = request()->user()->user_orders->find($user_order_id);
        $products = $user_order->products;
        $total = 0;

        foreach ($products as $product) {
            $total += $product->pivot->number * $product->price;
        }

        return number_format($total);

    }

    public function statuss() {
        return $this->belongsTo(Status::class, 'status', 'sdfsd');
    }
}
