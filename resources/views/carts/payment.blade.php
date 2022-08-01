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
<form method="post" action="{{ route('order.create') }}" style="width: 100%;">
    @csrf
    <div class="container-md mt-5">
        <div class="row container-90">
            <div class="col col-sm-6 col-12 fs-4 mb-3">            
                <input type="text" name="name" id="name" class="rounded px-3 w-100" autofocus placeholder="Họ và tên" value="{{ old('name') }}" />
                @error('name')
                    <p class="fs-5 text-danger ms-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="col col-sm-6 col-12 fs-4 mb-3">            
                <input type="text" name="address" id="address" class="rounded px-3 w-100" placeholder="Địa chỉ" value="{{ old('address') }}" />
                @error('address')
                    <p class="fs-5 text-danger ms-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="col col-sm-6 col-12 fs-4 mb-3">            
                <input type="tel" name="phone_number" id="phone_number" class="rounded px-3 w-100"  placeholder="Số điện thoại" value="{{ old('phone_number') }}" />
                @error('phone_number')
                    <p class="fs-5 text-danger ms-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="col col-sm-12 col-12 fs-4 mb-3">            
                <textarea name="info_for_shipper" id="info_for_shipper" class="rounded px-3 w-100 fs-5 py-3" placeholder="Thông tin cho người giao hàng" value="{{ old('info_for_shipper') }}"></textarea>
                @error('info_for_shipper')
                    <p class="fs-5 text-danger ms-2">{{ $message }}</p>
                @enderror   
            </div>
        </div>
    </div>
    
    <div class="container-md">
        <span class="d-inline-block my-4 ms-4 fs-3">Thông tin sản phẩm</span>
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
            <span class="d-inline-block my-3 fs-3">
                Tổng tiền: 
                <span class="price-text">{{ number_format($Cart::getTotal()) }}đ</span>
            </span>
            <div class="col col-12 my-4 flex-element">
                <button class="px-4 py-2 fs-4 rounded bg-warning">
                    Đặt hàng
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
