@extends('main')

@section('content')
    <div class="container">
        <h2>Đơn Hàng</h2>
        @if(isset($orders) && $orders->count() > 0)
            <!-- Display Orders -->
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Khách Hàng</th>
                        <th>Số Điện Thoại</th>
                        <th>Địa Chỉ Giao Hàng</th>
                        <th>Email</th>
                        <th>Ghi Chú</th>
                        <th>Tổng Tiền</th>
                        <th>Thời Gian</th>
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
                            <td>{{ number_format($order->total_amount, 0, ',', '.') }}</td>
                            <td>{{ $order->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @elseif(isset($orders))
            <p class="mt-4">Không tìm thấy đơn hàng nào.</p>
        @endif
    </div>
@endsection
