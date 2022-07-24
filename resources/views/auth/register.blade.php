@extends('share.layout-auth')

@section('title')
<title>Đăng kí</title>
@endsection


@section('content')
<div class="auth flex-element">            
    <div class="container" style="max-width: 540px;">
        <div class="row">
            <div class="col col-sm-12 col-12 flex-element">                
                <img src="/img/mcdonald.png" class="auth__brand">                
            </div>
            <div class="col col-sm-12 col-12 flex-element">
                <div class="auth__item">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="username" id="username" placeholder="Username">
                </div>
            </div>
            <div class="col col-sm-12 col-12 flex-element">
                <div class="auth__item">
                    <i class="fa-solid fa-key"></i>
                    <input type="password" name="usernam" id="username" placeholder="Mật khẩu">
                </div>
            </div>
            <div class="col col-sm-12 col-12 flex-element">
                <div class="auth__item">
                    <i class="fa-solid fa-key"></i>
                    <input type="password" name="username" id="username" placeholder="Nhập lại mật khẩu">
                </div>
            </div>    
            <div class="col col-sm-12 col-12 flex-element">
                <a class="auth__item auth__item-social flex-element">
                    <img width="20px" alt="Google sign-in" 
        src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                    Đăng nhập với google
                </a>
            </div>   
            <div class="col col-sm-12 col-12 flex-element">
                <!-- <div class="auth__item"> -->
                <button type="submit" class="auth__item auth__item-submit flex-element bg-warning">Đăng nhập</button>
                <!-- </div> -->
            </div>               
        </div>
    </div>
</div>
@endsection