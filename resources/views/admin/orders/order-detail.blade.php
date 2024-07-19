@extends('admin.main')

@section('content')
    <div class="container" style="margin-top:50px;">
        <h2 class="my-4">Chi tiết đơn hàng #{{ $order->order_id }}</h2>
        <div class="row">
            <div class="col-md-6">
                <h3>Thông tin khách hàng</h3>
                <p><strong>Tên khách hàng:</strong> {{ $order->customer_name }}</p>
                <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
                <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
                <p><strong>Email:</strong> {{ $order->email }}</p>
                <p><strong>Ghi chú:</strong> {{ $order->content }}</p>
            </div>
            <div class="col-md-6">
                <h3>Thông tin đơn hàng</h3>
                <p><strong>Tổng tiền:</strong> {{ number_format($order->total_amount, 0, '', '.') }}</p>
                <p><strong>Trạng thái:</strong> {{ $order->status }}</p>
                <p><strong>Ngày đặt hàng:</strong> {{ $order->created_at }}</p>
            </div>
        </div>
        <h3>Danh sách sản phẩm trong đơn hàng</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderDetails as $key => $orderDetail)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $orderDetail->product_name }}</td>
                        <td>{{ $orderDetail->product_quantity }}</td>
                        <td>{{ number_format($orderDetail->product_price, 0, '', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
