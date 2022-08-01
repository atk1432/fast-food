<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;


class CartController extends Controller
{

    public function index(Request $request) {

        return view('carts.index', [
            'user' => $request->user(),
            'carts' => $request->user()->carts,
            ''
            'Cart' => Cart::class
        ]);

    }

    public function payment(Request $request) {

        $carts = $request->user()->carts;

        if (count($carts) == 0) 
            abort(404);

        return view('carts.payment', [
            'carts' => $carts,
            'Cart' => Cart::class
        ]);

    }
    
    public function store(Request $request, $product_id, $number) {

        $validator = Validator::make([
            'product_id' => $product_id, 
            'number' => $number
        ], [
            'product_id' => 'required|integer',
            'number' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            abort(404);
        }

        Product::findOrFail($product_id);

        $cart = Cart::where([
            ['user_id', $request->user()->id],
            ['product_id', $product_id]
        ])->first();

        if ($cart) {
            $cart->number = $number;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => $request->user()->id,
                'product_id' => $product_id,
                'number' => $number
            ]);
        }

    }

    public function delete(Request $request, $product_id) {

        $cart = Cart::where([
            ['user_id', $request->user()->id],
            ['product_id', $product_id]
        ])->first();
        
        if (!$cart)
            abort(404);
    
        $cart->delete();

    }

    public function get_cart_number(Request $request) {

        $carts = $request->user()->carts;
        return count($carts);

    }
}
