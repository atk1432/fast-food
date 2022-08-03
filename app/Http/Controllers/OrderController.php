<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\UserOrder;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;


class OrderController extends Controller
{

    public function create(OrderRequest $request) {

        $validated = $request->validated();

        $user_order = UserOrder::create(
            array_merge($validated, ['user_id' => $request->user()->id])
        );

        // dd($user_order->id);

        $carts = Cart::select('product_id', 'number')
                ->where('user_id', $request->user()->id)->get()->toArray();

        $now = Carbon::now('utc')->toDateTimeString();

        $orders = [];
        foreach ($carts as $cart) {
            $orders[] = [
                'user_order_id' => $user_order->id,
                'product_id' => $cart['product_id'],
                'number' => $cart['number'],
                'created_at' => $now,
                'updated_at' => $now
            ];
        }

        Order::insert($orders);

        Cart::where('user_id', $request->user()->id)->delete();

        return redirect('/');

    }

    public function order(Request $request, $id) {

        $user_order = $request->user()->user_orders->find($id);

        if (!$user_order)
            abort(404);

        return view('orders.order', [
            'user' => $request->user(),
            'user_order' => $user_order,
            'products' => $user_order->products,
            'UserOrder' => UserOrder::class
        ]);

    }


    /**
     * For Admin
     * 
     * 
     */
    public function list_orders() {

        return view('admin.orders', [
            'orders' => UserOrder::all(),
            'statuses' => Status::all()
        ]);

    }

    public function detail_order($user_id, $user_order_id) {

        $user = User::find($user_id);
        $user_order = $user->user_orders->find($user_order_id); 

        // dd($user_order->products);

        return view('orders.order', [
            'user' => $user,
            'user_order' => $user_order,
            'products' => $user_order->products,
            'UserOrder' => UserOrder::class
        ]);

    }

}
