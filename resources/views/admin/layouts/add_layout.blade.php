<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content ="width=device-width, initial-scale=1.0">
        <!--============TITLE===============-->
            <title>@yield('title')</title>

        <!--============STYLESHEET===============-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/account.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/product.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/others.css') }}">
        
        <!-- ==========USING-FONT-AWESOME====== -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

        <!-- ==========USING-MODAL============ -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!--==============USING-DATE-THEME===============-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        
    </head>

    <body>
    <!--================MENU==================-->
       <div class="slidebar">
            <div class="logo"></div>
            <ul class="menu">
                <li class ="active-menu">
                    <a href ="http://127.0.0.1:8000/quanly/trangchu">
                        <i class="fas fa-house"></i>
                        <span> Trang chủ </span>
                    </a>
                </li>

                @if(session('role') == 1)
                    <li>
                        <a href ="{{ route ('account.main') }}">
                            <i class="fas fa-users"></i>
                            <span> Tài khoản </span>
                        </a>
                    </li>
                @endif
                
                <li>
                    <a href ="{{ route ('type.main') }}">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span> Loại bánh </span>
                    </a>
                </li>

                <li>
                    <a href ="{{ route ('product.main') }}">
                        <i class="fa-solid fa-cake-candles"></i>
                        <span> Sản phẩm </span>
                    </a>
                </li>

                <li>
                    <a href ="http://127.0.0.1:8000/quanly/donhang">
                        <i class="fa-solid fa-list-ul"></i>
                        <span> Đơn hàng </span>
                    </a>
                </li>

                <li>
                    <a href ="{{ route ('promotion.main') }}">
                        <i class="fa-solid fa-ticket"></i>
                        <span> Khuyến mãi </span>
                    </a>
                </li>

                <li>
                    <a href ="http://127.0.0.1:8000/quanly/gioithieu">
                        <i class="fa-solid fa-circle-info"></i>
                        <span> Giới thiệu </span>
                    </a>
                </li>

                <li>
                    <a href ="{{ route ('blog.main') }}">
                        <i class="fa-solid fa-newspaper"></i>
                        <span> Blog </span>
                    </a>
                </li>
            </ul>
        </div>
    <!--==============MENU-END==============-->

    <div class="main-content">
    <!--=============HEADER==============-->
        <div class="header-container">
                <div class="header-title">
                    <span> Atelier Cake </span>
                    <h2> Trang quản lý </h2>
                </div>

                <div class="user-info">
                    <div class="search-box">
                        <i class="fa-solid fa-search"></i>
                        <input type="text" name="keyword" placeholder="Tìm kiếm"/>
                    </div>
                    
                    <i class="fa-solid fa-user"></i>

                    <button class="setting-user">
                        <span>{{ session('username') }}</span>
                        <i class="fa-solid fa-angle-down"></i>
                        <div class="setting-dropdown" id="setting-dropdown">
                            <div class="setting-option">
                                <a href="#">Cài đặt</a>
                                <a href="{{ route('admin.logout') }}">Đăng xuất</a>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
    <!--============HEADER-END===========-->

    <!--============TABLE===========-->
        <div class="content-wrapper">
            @yield('content')
                    <!--@if ($errors->any())
                            <div class="error">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif-->
        </div>
    </div> <!-- End Main Content -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
            const settingUser = document.querySelector('.setting-user');

            settingUser.addEventListener('click', function() {
                settingUser.classList.toggle('clicked');
            });

            window.addEventListener('click', function(event) {
                if (!event.target.closest('.setting-user')) {
                    settingUser.classList.remove('clicked');
                }
            });
        });
        </script>
    </body>
<html>
