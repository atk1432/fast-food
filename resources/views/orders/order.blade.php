@extends('share.layout')

@section('head')
<title>Đơn hàng #{{ $user_order->id }}</title>
@endsection


@section('content')

<div class="container-md">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Thông tin</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <td>
                    <ul>
                        <li>
                            <span class="me-3">Họ và tên: </span>
                            {{ $user_order->name }}
                        </li>
                        <li>
                            <span class="me-3">Email: </span>
                            {{ $user->email }}
                        </li>
                        <li>
                            <span class="me-3">Số điện thoại: </span>
                            {{ $user_order->phone_number }}
                        </li>
                        <li>
                            <span class="me-3">Địa chỉ: </span>
                            {{ $user_order->address }}
                        </li>
                        <li class="my-4">
                            <div class="row">
                                @foreach ($products as $product)
                                <div class="col col-12 bg-light rounded my-2">
                                    <div class="row gx-2">
                                        <div class="col col-2">
                                            <img class="w-75" src="{{ $product->image }}">
                                        </div>
                                        <div class="col col-10">
                                            <p>{{ $product->name }}</p>
                                            <p>Số lượng: {{ $product->pivot->number }}</p>
                                            <p>
                                                Tổng tiền: 
                                                <span class="price-text">
                                                    {{ number_format($product->price * $product->pivot->number) }}đ
                                                </span>
                                            </p>
                                        </div>
                                    </div>       
                                </div>
                                @endforeach
                            </div>
                        </li>
                        <li class="fs-4">
                            Tổng tiền: 
                            <span class="price-text">{{ $UserOrder::getTotal($user_order->id) }}đ</span>
                        </li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection