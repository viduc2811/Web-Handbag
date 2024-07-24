@extends('admin.main')

@section('content')
<div class="container">
    <!-- header -->
    <div class="row mb-3">
    <div class="col-12 col-md-6 d-flex align-items-center">
        <h2 class="mb-0">Danh Mục Sản Phẩm</h2>
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
                    <th style="width: 50px">TT</th>
                    <th>Tên danh mục</th>
                    <th>Danh mục cha</th>
                    <th>Cập nhật</th>
                    <th style="width: 100px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            @foreach($menus as $key=> $menu)
                <tr>
                    <td>{{$key + 1 }}</td>
                    <td>{{ $menu->menu_name }}</td>
                    <td>
                        @php
                            $parentMenu = \App\Models\Menu::find($menu->parent_id);
                        @endphp
                        {{ $parentMenu ? $parentMenu->menu_name : 'Không có danh mục cha' }}
                    </td>
                    <td>{{ $menu->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/menus/edit/{{ $menu->menu_id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm" onclick="removeRow({{ $menu->menu_id }}, '/admin/menus/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        {!! $menus->links('pagination') !!}
    </div>
@endsection

