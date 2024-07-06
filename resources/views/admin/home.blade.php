@extends('admin.main')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2>Doanh thu theo ngày</h2>
            @if ($revenues->count() > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Ngày</th>
                            <th>Doanh thu</th>
                            <th>Số hóa đơn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($revenues as $revenue)
                            <tr>
                                <td>{{ $revenue->date }}</td>
                                <td>{{ number_format($revenue->total_revenue, 0, ',', '.') }} VND</td>
                                <td>{{ $revenue->total_orders }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Không có dữ liệu doanh thu.</p>
            @endif
        </div>
        <div class="col-md-6">
            <h2>Tồn kho sản phẩm</h2>
            @if ($productInventory->count() > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Tồn kho</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productInventory as $product)
                            <tr>
                                <td>{{ $product->product_id }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->product_quantity }}</td> <!-- Updated to product_quantity -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Không có dữ liệu tồn kho sản phẩm.</p>
            @endif
        </div>
    </div>
@endsection
