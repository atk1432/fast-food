<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;


class CartController extends Controller
{
    
    public function store(Request $request, $product_id) {

        Product::findOrFail($product_id);

        Cart::create([
            'user_id' => $request->user()->id,
            'product_id' => $product_id
        ]);

    }

    public function delete($id) {

        $cart = Cart::findOrFail($id);
        $cart->delete();

    }
}
