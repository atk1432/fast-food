<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="/favicon.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        @yield('head')
        <link rel="stylesheet" href="/css/header.css" />
    </head>

    <body>
        <header class="header">
            <div class="container-md">
                <div class="row">
                    <div class="col header__bars">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                    <div class="header__link flex-element col col-xxl-10 col-xl-10 col-lg-10 col-md-10"> 
                        <a class="header__link-logo" href="/">
                            <img src="/img/mcdonald.png" class="header__logo" />
                        </a>
                        <ul class="header__link flex-element h-0 h-header-auto">
                            <li>
                                <a class="header__link-item" href="/"> 
                                    Trang chủ 
                                </a> 
                            </li> 
                            <li> 
                                 <a class="header__link-item" href=""> 
                                    Tìm hiểu  
                                </a>  
                            </li>                             
                            <li>   
                                <a class="header__link-item" href=""> 
                                    Thực đơn     
                                </a>    
                            </li>    
                            <li>
                                <a class="header__link-item" href=""> 
                                    Tin tức  
                                </a>  
                            </li>                             
                            <li> 
                                <a class="header__link-item" href="">
                                    Liên hệ
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col col-xxl-2 col-xl-2 col-lg-2 col-md-2 header__col">
                        <a class="header__user" href="{{ route('auth.login') }}">
                            @if (request()->user())
                                <img class="header__user-img" src="{{ request()->user()->image }}" /> 
                            @else
                                <i class="fa-solid fs-3 fa-arrow-right-to-bracket"></i>
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </header>
        
        @yield('content')

        <footer class="footer">
            <div class="container-md">
                <div class="row">
                    <div class="col">
                        <p>copyright ©</p>
                    </div>
                </div>
            </div>
        </footer>

        <script 
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        >
        </script>
        <script src="/js/header.js"></script>        
        @yield('index_script')        
    </body>
</html>