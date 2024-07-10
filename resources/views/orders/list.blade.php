@extends('main')

@section('content')
    <div class="container" style="margin-top:50px;">
        <h2 class="my-4">{{ $title }}</h2>
        @if($orders->isEmpty())
            <div class="alert alert-warning">Không tìm thấy đơn hàng nào.</div>
        @else
        <h1>Danh sách hóa đơn</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Khách Hàng</th>
                        <th>Số Điện Thoại</th>
                        <th>Địa Chỉ</th>
                        <th>Email</th>
                        <th>Ghi Chú</th>
                        <th>Tổng Tiền</th>
                        <th>Ngày Đặt</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->content }}</td>
                            <td>{{ number_format($order->total_amount, 0, '', '.') }}</td>
                            <td>{{ $order->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
