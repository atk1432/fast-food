@extends('share.layout-auth')

@section('title')
<title>Đăng nhập</title>
@endsection


@section('content')
<form method="post" action="{{ route('auth.auth') }}">
    @csrf
    <div class="col col-sm-12 col-12 flex-element">
        <div class="auth__item">
            <i class="fa-solid fa-user"></i>
            <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
        </div>
    </div>
    <div class="col col-sm-12 col-12 flex-element">
        <div class="auth__item">
            <i class="fa-solid fa-key"></i>
            <input type="password" name="password" id="password" placeholder="Mật khẩu">
        </div>
    </div>
    <div class="col col-sm-12 col-12 flex-element">
        @error('invalid')
            <p class="auth__error">{{ $errors->first('invalid') }}</p>
        @enderror
    </div>
    <div class="col col-sm-12 col-12 flex-element">
        <a class="auth__item auth__item-social flex-element">
            <img width="20px" alt="Google sign-in" 
    src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
            Đăng nhập với google
        </a>
    </div>   
    <div class="col col-sm-12 col-12 flex-element">                
        <button type="submit" class="auth__item auth__item-submit flex-element bg-warning">Đăng nhập</button>                
    </div>
    <div class="col col-sm-12 col-12 flex-element">                
        <p class="fs-3 bg-light">
            Chưa có tài khoản? 
            <a href="{{ route('auth.register') }}">Đăng kí</a>
        </p>   
    </div>
</form>
@endsection