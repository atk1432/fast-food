@extends('share.layout')

@section('head')
<title>Title</title>
<style type="text/css">
    .container-form {
        max-width: 500px;
        margin: auto;
    }
</style>
@endsection


@section('content')
<div class="container-md mt-5">
    <div class="row container-90">
        <div class="col col-sm-6 col-12 fs-4 mb-3">            
            <input type="text" name="name" id="name" class="rounded-pill px-3 w-100" autofocus placeholder="Họ và tên" />
            <p class="fs-5 text-danger ms-2">This is a error text!</p>
        </div>
        <div class="col col-sm-6 col-12 fs-4 mb-3">            
            <input type="email" name="email" id="email" class="rounded-pill px-3 w-100" placeholder="Email" />
            <p class="fs-5 text-danger ms-2">This is a error text!</p>
        </div>
        <div class="col col-sm-6 col-12 fs-4 mb-3">            
            <input type="tel" name="phone-number" id="phone-number" class="rounded-pill px-3 w-100"  placeholder="Số điện thoại" />
            <p class="fs-5 text-danger ms-2">This is a error text!</p>
        </div>
        <div class="col col-sm-12 col-12 fs-4 mb-3">            
            <textarea name="info" id="info" class="rounded px-3 w-100" placeholder="Thông tin cho người giao hàng"></textarea>
            <p class="fs-5 text-danger ms-2">This is a error text!</p>
        </div>
    </div>
</div>
<div class="container-md">
    <div class="row">
        <h3 class="ms-4">Thông tin sản phẩm</h3>
    </div>
    <div class="row container-90">
        @foreach ($carts as $cart)
            @php 
                $number = $Cart::getCart($cart->id)->number
            @endphp
            <div class="col col-12 bg-light rounded my-2 cart__item" id="{{ $cart->id }}">
                <div class="row align-items-center overflow-hidden">
                    <div class="col col-2">                        
                        <img src="{{ $cart->image }}" class="w-100" />
                    </div>
                    <div class="col col-10 py-2">
                        <a class="fs-5 text-ellipsis mb-0 text-dark" href="{{ route('product_item', [
                            'id' => $cart->id,
                            'name' => convertNameURI($cart->name)
                        ]) }}" 
                            >{{ $cart->name }}
                        </a>
                        <div class="cart__number fs-5">
                            <span class="me-3">Số lượng: </span>
                            <span class="me-3">{{ $number }}</span>
                        </div>
                        <p class="price-text fs-3 d-flex justify-content-between align-items-center">
                            <span class="fs-5 text-dark">Tổng tiền: </span>
                            {{ number_format($number * $cart->price) }}đ 
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
        <h3>
            Tổng tiền: 
            <span class="price-text">{{ number_format($Cart::getTotal()) }}đ</span>
        </h3>
        <a class="col col-12 my-4 flex-element" href="{{ route('cart.payment') }}">
            <button class="px-4 py-2 fs-4 rounded bg-warning">
                Đặt hàng
            </button>
        </a>
    </div>
</div>
@endsection
