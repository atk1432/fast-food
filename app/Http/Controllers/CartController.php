<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;


class CartController extends Controller
{
    
    public function store(Request $request, $product_id, $number) {

        Validator::make([
            'product_id' => $product_id, 
            'number' => $number
        ], [
            'product_id' => 'required|integer',
            'number' => 'required|integer'
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
}
