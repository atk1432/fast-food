<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'number'
    ];

    protected $hidden = [
        'user_id'
    ];

    public static function getCart($cart_id)
    {
        $cart = Cart::where('user_id', request()->user()->id)
            ->where('product_id', $cart_id)->first();

        return $cart;

    }

    public static function getNumberInCart($cart_id)
    {
        $cart = Cart::getCart($cart_id);

        if ($cart) {
            return $cart->number;
        } else {
            return 1;
        }
    }

    public static function getTotal()
    {
        $carts = Cart::where('user_id', request()->user()->id)->get();
        $cart_users = request()->user()->carts;
        $total = 0;

        foreach ($carts as $cart) {
            $ppp = searchForId($cart->product_id, $cart_users)->price;
            $price = $cart->number * $ppp;
            $total += $price;
            error_log($ppp);
        }

        return $total;
    }
}
