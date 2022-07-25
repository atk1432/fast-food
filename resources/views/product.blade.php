@extends('share.layout')

@section('head')
<title>{{ $product->name }}</title>
<link rel="stylesheet" type="text/css" href="/css/style.css">
@endsection

@section('content')
<div class="cart container-md">
	<h2 class="description">{{ $product->name }}</h2>
	<div class="row">
		<div class="col col-xxl-6 col-xl-6 col-md-6 col-sm-6 col-12">
			<img src="{{ $product->image }}" class="width-100 br-10px">
		</div>
		<div class="col col-xxl-6 col-xl-6 col-md-6 col-sm-6 col-12 cart__info">
			<div class="row">
				<div class="col">
					<h4 class="cart__number">{{ $product->energy ?? 'None' }} kkai</h4>
					<p class="cart__name color-text">Enegy</p>
				</div>
				<div class="col">
					<h4 class="cart__number">{{ $product->weight ?? 'None' }} gr.</h4>
					<p class="cart__name color-text">Weight</p>
				</div>
				<div class="col">
					<h4 class="cart__number">{{ $product->delivery ?? 'None' }} min</h4>
					<p class="cart__name color-text">Delivery</p>
				</div>
			</div>
			<div class="row cart__count-container">	
				<div class="col cart__count">			
					<button class="cart__button br-10px">							
						<i class="fas fa-plus"></i>
					</button>							
					<h4 class="cart__number">1</h4>								
					<button class="cart__button br-10px">
						<i class="fas fa-minus"></i>
					</button>									
				</div>
				<div class="col">
					<p class="cart__price color-text">{{ $product->price }}đ</p>					
				</div>
			</div>
			<div class="row">
				<div class="col">
					<button class="cart__add">
						Thêm vào giỏ hàng
					</button>
				</div>
			</div>
		</div>
	</div>
	<h2 class="description">Thông tin sản phẩm</h2>
	<div class="row container-90">
		<div class="col">
			<p class="cart__desciption">
				@if ($product->description) 
					{{ $product->description }}
				@else
					<i>Không có thông tin</i>
				@endif
			</p>
		</div>
	</div>
</div>
@endsection