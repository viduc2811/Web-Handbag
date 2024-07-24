@extends('admin.main')

@section('content')
<div class="container">

    <div class="row mb-3">
        <div class="col-12 col-md-6 d-flex align-items-center">
            <h2 class="mb-0">Danh Sách Sản Phẩm</h2>
        </div>
        <div class="col-12 col-md-6 d-flex justify-content-end">
            <form action="{{ route('products.search') }}" method="GET" class="d-flex mb-0">
                <div class="input-group">
                    <input type="text" name="query" class="form-control" style="width:auto;"
                        placeholder="Nhập từ khóa tìm kiếm">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </div>
            </form>
            <a class="btn btn-primary ml-2" href="{{ route('products.add') }}" style="width:auto;">
                <i class="fas fa-plus"></i> Thêm Sản phẩm
            </a>
        </div>
    </div>

    <table class="table">
        <thead style="background-color: #28a745; color: white;">
            <tr>
                <th style="width: 50px">Mã</th>
                <th>Tên Sản Phẩm</th>
                <th>Danh Mục</th>
                <th>Giá Nhập</th>
                <th>Giá Gốc</th>
                <th>Giá Khuyến Mãi</th>
                <th>Số lượng</th>
                <th>Kích hoạt</th>
                <th>Thời gian</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $product)
            <tr>
                <td>{{ $product->product_id }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->menu->menu_name }}</td>
                <td>{{ $product->cost_price }}</td>
                <td>{{ $product->product_price }}</td>
                <td>{{ $product->price_sale }}</td>
                <td>{{ $product->product_quantity }}</td>
                <td>{!! \App\Helpers\Helper::active($product->active) !!}</td>
                <td>{{ $product->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{ $product->product_id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                        onclick="removeRow({{ $product->product_id }}, '/admin/products/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $products->links('pagination') !!}
    </div>
</div>
@endsection