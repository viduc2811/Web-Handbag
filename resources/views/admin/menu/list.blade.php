@extends('admin.main')

@section('content')
<div class="container">
    <!-- <div class="row mb-3" style="height:30px;">
            <div class="col">
                <h2 class="float-left">Danh mục sản phẩm</h2>
            </div>
            <div style="display:flex;">
                <form action="{{ route('menus.search') }}" method="GET" class="mb-4">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control" placeholder="Nhập từ khóa tìm kiếm" >
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
                <div class="col " style="">
                    <a class="btn btn-primary" href="{{ route('menus.add') }}">
                        <i class="fas fa-plus"></i> Thêm danh mục
                    </a>
                </div>
            </div>
    </div> -->

    <!-- header -->
    <div class="row mb-3">
    <div class="col-12 col-md-6 d-flex align-items-center">
        <h2 class="mb-0">Danh mục sản phẩm</h2>
    </div>
    <div class="col-12 col-md-6 d-flex justify-content-end">
        <form action="{{ route('menus.search') }}" method="GET" class="d-flex mb-0">
            <div class="input-group">
                <input type="text" name="query" class="form-control" style="width:auto;" placeholder="Nhập từ khóa tìm kiếm">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </div>
        </form>
        <a class="btn btn-primary ml-2" href="{{ route('menus.add') }}" style="width:auto;">
            <i class="fas fa-plus" ></i> Thêm danh mục
        </a>
    </div>
</div>



        <table class="table">
            <thead style="background-color: #28a745; color: white;">
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>Tên danh mục</th>
                    <th>Danh mục cha</th>
                    <th>Cập nhật</th>
                    <th style="width: 100px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                {!! \App\Helpers\Helper::menu($menus) !!}
            </tbody>
        </table>
    </div>
@endsection

