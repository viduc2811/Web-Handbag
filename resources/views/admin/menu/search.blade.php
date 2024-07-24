@extends('admin.main')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-12 col-md-6 d-flex align-items-center">
            <h2 class="mb-0">Danh mục sản phẩm</h2>
        </div>
        <div class="col-12 col-md-6 d-flex justify-content-end">
            <form action="{{ route('menus.search') }}" method="GET" class="d-flex mb-0">
                <div class="input-group">
                    <input type="text" name="query" class="form-control" style="width:auto;"
                        placeholder="Nhập từ khóa tìm kiếm">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </div>
            </form>
            <a class="btn btn-primary ml-2" href="{{ route('menus.add') }}" style="width:auto;">
                <i class="fas fa-plus"></i> Thêm danh mục
            </a>
        </div>
    </div>

    <table class="table">
        @if($menus->isEmpty())
        <div style="display: flex; justify-content: center; align-items: center; height: 300px;">
            <div style="text-align: center;">
                <h2 style="color: #666;">Không tìm thấy danh mục nào.</h2>
            </div>
        </div>
        @else
        <thead style="background-color: #28a745; color: white;">
            <tr>
                <th style="width: 50px">TT</th>
                <th>Tên danh mục</th>
                <th>Danh mục cha</th>
                <th>Cập nhật</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::menu($menus) !!}
        </tbody>
        @endif
    </table>
</div>
@endsection