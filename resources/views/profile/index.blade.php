@extends('share.layout')

@section('head')
<link rel="stylesheet" type="text/css" href="/css/index.css">
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
                        Đăng xuất
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
            Giỏ hàng
            <span class="badge rounded-circle bg-primary ms-2">3</span>
        </span>
        <div class="row container-90">
            <a class="col col-12 bg-light rounded my-2" href="">
                <div class="row align-items-center overflow-hidden">
                    <div class="col col-2">                        
                        <img src="./cocacola.png" class="w-100" />
                    </div>
                    <div class="col col-9 py-2">
                        <p class="fs-5 text-ellipsis mb-0">Cocacola nóng hổi thơm ngon</p>
                        <span>20,000đ</span>                            
                    </div>
                    <div class="col col-1 flex-element">
                        <i class="fa-solid fa-xmark"></i>                         
                    </div>
                </div>
            </a>
            <a class="col col-12 bg-light rounded my-2" href="">
                <div class="row align-items-center overflow-hidden">
                    <div class="col col-2">                        
                        <img src="./cocacola.png" class="w-100" />
                    </div>
                    <div class="col col-9 py-2">
                        <p class="fs-5 text-ellipsis mb-0">Cocacola nóng hổi thơm ngon</p>
                        <span>20,000đ</span>                            
                    </div>
                    <div class="col col-1 flex-element">
                        <i class="fa-solid fa-xmark"></i>                         
                    </div>
                </div>
            </a>
            <a class="col col-12 my-4 flex-element" href="">
                <button class="px-4 py-2 fs-4 rounded bg-warning">Thanh toán</button>
            </a>
        </div>
    </div>
</div>
@endsection
