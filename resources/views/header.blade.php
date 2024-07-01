<header>
@php $menusHtml = \App\Helpers\Helper::menus($menus); @endphp
    <!-- Header desktop -->
    <style>
        .logo {
            font-size: 26px;
            font-weight: normal;
            color: #333;
            letter-spacing: 3px;
            font-family: 'Pacifico', cursive;
            text-align: center;
            margin: 20px 0;
        }
        .logo span {
            color: #e74c3c;
        }
        .wrap-menu-desktop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000; 
            background-color: #fff; 
            padding: 10px 0; 
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
        }

        .modal-search-header{
            height:30%;
        }
    </style>
    
    <div class="container-menu-desktop" >
        <div class="wrap-menu-desktop ">
            <nav class="limiter-menu-desktop container">
                <div class="logo">Hand<span>Bags</span> Store</div>
                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu"><a href="/" style="color:#333;">Trang Chủ</a></li>
                        {!! $menusHtml !!}
                    </ul>
                </div>
                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                         data-notify="{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="index.html"><img src="/template/images/icons/logo-01.png" alt="IMG-LOGO"></a>
        </div>
        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
                 data-notify="{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>
        </div>
        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li class="active-menu"><a href="/">Trang Chủ</a> </li>
            {!! $menusHtml !!}
            <li>
                <a href="contact.html">Liên Hệ</a>
            </li>

        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search" id="modal-search-header">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="/template/images/icons/icon-close2.png" alt="CLOSE">
            </button>
            <form action="{{ route('search') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Nhập từ khóa tìm kiếm" required value="{{ request()->input('query', '') }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-search"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
</header>
