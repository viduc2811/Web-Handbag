<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin </title>
    @include('admin.head')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #00bcd4;">
       <a class="navbar-brand" href="#">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><i class="fas fa-home"></i> Trang chủ</a>
                </li>
              
                <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                   <i class="fas fa-sign-out-alt"></i> Đăng xuất
                </a>
            </li>

            </ul>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                            <i class="fas fa-users"></i>   Bảng Điều Khiển
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('menus.list') }}">
                                <i class="fas fa-list-alt"></i> Danh Mục
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.list') }}">
                                <i class="fas fa-box"></i> Sản Phẩm
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sliders.list') }}">
                            <i class="fas fa-tachometer-alt"></i> Slider
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('customers') }}">
                                <i class="fas fa-file-alt"></i> Hóa Đơn
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-file-alt"></i> Chi Tiết Hóa Đơn
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users') }}">
                            <i class="fas fa-users"></i> Người dùng
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row">
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        @include('admin.alert')
        @yield('content')
            </main>
        </div>
    </div>
    <!-- Bootstrap JS and jQuery -->
    @include('admin.footer')
</body>
</html>
