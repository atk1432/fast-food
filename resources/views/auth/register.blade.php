@extends('share.layout-auth')

@section('title')
<title>Đăng kí</title>
@endsection


@section('content')

<form method="post" action="{{ route('auth.create') }}">
    @csrf
    <div class="col col-sm-12 col-12 flex-element">
        <div class="auth__item">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="name" id="name" placeholder="Username" value="{{ old('name') }}">
        </div>
    </div>
    <div class="col col-sm-12 col-12 flex-element">
        @error('name')
            <p class="auth__error">{{ $errors->first('name') }}</p>
        @enderror
    </div>
    <div class="col col-sm-12 col-12 flex-element">
        <div class="auth__item">
            <i class="fa-solid fa-user"></i>
            <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
        </div>
    </div>
    <div class="col col-sm-12 col-12 flex-element">
        @error('email')
            <p class="auth__error">{{ $errors->first('email') }}</p>
        @enderror
    </div>
    <div class="col col-sm-12 col-12 flex-element">
        <div class="auth__item">
            <i class="fa-solid fa-key"></i>
            <input type="password" name="password" id="password" placeholder="Mật khẩu" value="{{ old('password') }}">
        </div>
    </div>
    <div class="col col-sm-12 col-12 flex-element">
        @error('password')
            <p class="auth__error">{{ $errors->first('password') }}</p>
        @enderror
    </div>
    <div class="col col-sm-12 col-12 flex-element">
        <div class="auth__item">
            <i class="fa-solid fa-key"></i>
            <input type="password" name="password-repeat" id="password-repeat" placeholder="Nhập lại mật khẩu" value="{{ old('password-repeat') }}">
        </div>
    </div>
    <div class="col col-sm-12 col-12 flex-element">
        @error('password-repeat')
            <p class="auth__error">{{ $errors->first('password-repeat') }}</p>
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
        <button type="submit" class="auth__item auth__item-submit flex-element bg-warning">Đăng kí</button>                
    </div>
</form>

@endsection