<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;


class ProfileController extends Controller
{

    public function profile(Request $request, $name) {

        $user_name = $request->user()->name;

        if (convertNameURI($user_name) != $name) {
            abort(404);
        }

        return view('profile.index', [
            'user' => $request->user(),
            'carts' => $request->user()->carts,
            'cart_model' => Cart::class
        ]);

    }

}
