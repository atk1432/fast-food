@extends('share.layout')     

@section('head')
<title>Trang chủ</title>
<link rel="stylesheet" type="text/css" href="/css/index.css">
@endsection

@section('index_script')
<script src="/js/index.js"></script>
@endsection

@section('content')
<div class="alert alert-success" style="display: none; position: fixed;"></div>
<div class="body">        
    <div class="search container-md">
        <div class="row">
            <div class="col flex-element">   
                <div class="search__box flex-element">
                    <a href="">
                        <i class="fa-solid fa-magnifying-glass cursor-p"></i>
                    </a>
                    <input type="text" name="search" class="search__input" placeholder="Search for favourite food!" />
                </div>         
            </div>
        </div>            
    </div>
    <div class="slider container-md">
        <div class="row">
            <div class="col slider-container flex-element">
                <i class="fa-solid fa-angle-left slider__body-angle flex-element cursor-p"></i>
                <div class="slider__body-container">
                    <div class="slider__body bg-red">
                        <div class="slider__body-text no-select flex-element">
                            <h3>Free Combo</h3>
                            <span class="slider__body-text-description">
                                Burger + Coca-Cola for users
                            </span>
                        </div>                            
                        <img src="/img/fastfood1.jpg" class="slider__body-img" ondragstart="return false" />                                
                    </div>
                    <div class="slider__body bg-blue">
                        <div class="slider__body-text no-select flex-element">
                            <h3>Free Combo</h3>
                            <span class="slider__body-text-description">
                                Burger + Coca-Cola for users
                            </span>
                        </div>                            
                        <img src="/img/fastfood1.jpg" class="slider__body-img" ondragstart="return false" />
                    </div>     
                    <div class="slider__body bg-yellow">
                        <div class="slider__body-text no-select flex-element">
                            <h3>Free Combo</h3>
                            <span class="slider__body-text-description">
                                Burger + Coca-Cola for users
                            </span>
                        </div>                            
                        <img src="/img/fastfood1.jpg" class="slider__body-img" ondragstart="return false" />
                    </div> 
                    <div class="slider__body bg-green">
                        <div class="slider__body-text no-select flex-element">
                            <h3>Free Combo</h3>
                            <span class="slider__body-text-description">
                                Burger + Coca-Cola for users
                            </span>
                        </div>                            
                        <img src="/img/fastfood1.jpg" class="slider__body-img" ondragstart="return false" />
                    </div>                      
                </div>
                <i class="fa-solid fa-angle-right slider__body-angle flex-element cursor-p"></i>
            </div>
        </div>
        <div class="row">
            <div class="col flex-element">
                <div class="slider__button start-element">                           
                </div>
            </div>
        </div>
    </div>
    <div class="navbar-container container-md">
        <div class="row">
            <div class="col flex-element">                    
                <ul class="navbar__list container-90">
                    <li>
                        <a href="" class="navbar__list-item flex-element">
                            <i class="fa-solid fa-burger"></i>
                            <span>Burgers</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="navbar__list-item flex-element">
                            <i class="fa-solid fa-pizza-slice"></i>
                            <span>Pizza</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="navbar__list-item flex-element">
                            <i class="fas fa-mug-hot"></i>                    
                            <span>Drinks</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="navbar__list-item flex-element">
                            <i class="fa-solid fa-hotdog"></i>
                            <span>Hotdog</span>
                        </a>
                    </li>                        
                </ul>                        
            </div>
        </div>
    </div>
    <div class="header-container container-md">
        <div class="row container-90">
            <div class="col">
                <h1 style="margin-bottom: 14px; margin-left: -12px;">Top Products</h1>
            </div>
        </div>
    </div>
    <div class="products__list container-md">
        <div class="row container-90">
            @foreach ($products as $product)
            <div class="col col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-6">
                <a href="{{ route('product_item', [
                            'id' => $product->id, 
                            'name' => convertNameURI($product->name)
                        ]) }}" 
                    class="products__list-item">
                    <div class="products__list-item-img-container">                        
                        <img src="{{ $product->image }}" class="products__list-item-img">
                    </div>
                    <div class="products__list-item-info">
                        <div class="products__list-item-text">
                            <span class="products__list-item-name">{{ $product->name }}</span>
                            <span class="products__list-item-price">{{ $product->price }}đ</span>
                        </div>
                        <i class="fas fa-plus bg-green products__add-to-cart" data="{{ $product->id }}" user="{{ request()->user() ? request()->user()->name : '' }}"></i>
                    </div>                                    
                </a>                       
            </div>                    
            @endforeach
        </div>
    </div>
</div>
@endsection
