@extends('share.layout')

@section('head')
<title>Profile</title>
<!-- <link rel="stylesheet" type="text/css" href="/css/.css"> -->
<style type="text/css">
    .profile__icon {
        position: absolute;
        bottom: 0;
        right: -20px;
        font-size: 16px;
    }
</style>
@endsection

@section('index_script')
<script src="/js/profile.js"></script>
@endsection


@section('content')
<div class="profile">
    <div class="container-md">
        <div class="row container-90">
            <div class="col col-sm-6 col-12 d-flex justify-content-center position-relative">
                <div class="w-75 position-relative">
                    <img src="/img/default-avatar.png" class="rounded-circle w-100 profile__img">                        
                </div>
                <label for="image" class="position-absolute w-75 h-100 cursor-p profile__label"></label>
                <input type="file" name="image" class="d-none" id="image">
            </div>
            <div class="col col-sm-6 col-12 flex-element flex-column">
                <h2 class="profile__info position-relative cursor-p">
                    {{ $user->name }}
                    <i class="fa-solid fa-pen-to-square profile__icon"></i>
                </h2>
                <p class="profile__info">
                    <i class="fs-5 position-relative cursor-p">
                        {{ $user->email }}
                        <i class="fa-solid fa-pen-to-square profile__icon"></i>
                    </i>
                </p>
                <div class="profile__button d-flex flex-wrap justify-content-center">
                    <button class="p-2 m-2 rounded bg-warning">
                        <a href="{{ route('auth.logout') }}">Đăng xuất</a>
                    </button>
                    <button class="p-2 m-2 rounded bg-danger">
                        Xóa tài khoản
                    </button>
                    <button class="p-2 rounded bg-danger m-2 save-change" style="display: none;">
                        Lưu thay đổi
                    </button>
                </div>
            </div>
        </div>
        <span class="d-inline-block fs-3 my-3">
            Đơn hàng
            <span class="badge rounded-circle bg-primary ms-2 product__number"></span>
        </span>
        <div class="row container-90 mb-4">
            <div class="col col-12">
                <div class="row bg-light justify-content-between align-items-center px-3 py-2 rounded fs-4">
                    <div class="col col-4">
                        <a href="" class="text-decoration-underline">                            
                            #343278
                        </a>
                    </div>
                    <div class="col col-1">
                        <i class="fa-solid fa-xmark cart__delete text-dark float-end cursor-p"></i>
                    </div>
                </div>
            </div>
        </div>
        <span class="d-inline-block fs-3 my-3">
            Giỏ hàng
            <span class="badge rounded-circle bg-primary ms-2 product__number">{{ count($carts) }}</span>
        </span>
        <div class="row container-90 cart">        
            @foreach ($carts as $cart)
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
                            <p class="price-text fs-3 d-flex justify-content-between align-items-center">
                                {{ number_format($cart->price) }}đ
                                <i class="fa-solid fa-xmark cart__delete text-dark me-2 cursor-p"></i>
                            </p>
                            <div class="cart__number fs-5">
                                <span class="me-3">Số lượng: </span>
                                <span class="me-3">{{ 
                                    $Cart::getCart($cart->id)->number
                                }}</span>                                
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach            
            @if (count($carts) != 0)
                <a class="col col-12 my-4 flex-element" href="{{ route('cart.payment') }}">
                    <button class="px-4 py-2 fs-4 rounded bg-warning">Thanh toán</button>
                </a>
            @endif
        </div>
    </div>
</div>
@endsection
