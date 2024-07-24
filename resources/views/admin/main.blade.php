<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin </title>
    @include('admin.head')

    <style>
    .navbar {
        background-color: #00bcd4;
        margin-bottom: 10px;
    }

    .navbar-brand {
        color: #000;
        font-weight: bold;
        transition: color 0.3s ease;
    }
    .navbar-nav .nav-link {
        color: #fff;
        transition: color 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
        color: #ccc;
    }

    .sidebar {
        background-color: #f8f9fa;
        border-right: 1px solid #ddd;
        transition: all 0.3s ease;
        padding: 10px;
    }

    .sidebar:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .nav-link {
        padding: 10px 15px;
        color: #495057;
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        background-color: #e9ecef;
        color: #007bff;
    }

    .nav-link.active {
        background-color: #007bff;
        color: #fff;
    }

    .nav-link .fas {
        font-size: 18px;
        margin-right: 8px;
        color: #007bff;
    }

    .main-content {
        padding: 20px;
    }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Đăng xuất
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar ">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <a class="navbar-brand">
                            <img src="/img/admin-icon.jpg" width="30" height="30" class="d-inline-block align-top"
                                alt="Logo">
                            Trang Quản Trị
                        </a>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('admin.main') }}">
                                <i class="fas fa-chart-line"></i> Thống Kê
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('menus.list') }}">
                                <i class="fas fa-list"></i> Danh Mục
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.list') }}">
                                <i class="fas fa-box"></i> Sản Phẩm
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sliders.list') }}">
                                <i class="fas fa-sliders-h"></i> Slider
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('customers') }}">
                                <i class="fas fa-file-invoice"></i> Hóa Đơn
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
            <main role="main" class="col-md-10 ml-sm-auto col-lg-10 main-content">
                @include('admin.alert')
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Footer -->
    @include('admin.footer')

</body>

</html>