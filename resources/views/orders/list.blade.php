@extends('main')
<style>
.custom-margin-top {
    margin: 90px 0 50px 0;
}
</style>
@section('content')
    <div class="container custom-margin-top">
    <form action="{{ route('orders.search') }}" method="get" class="custom-margin-top">
            <div class="form-group">
                <label for="name">Tên Khách Hàng:</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ request()->input('query', '') }}">
            </div>
            <div class="form-group">
                <label for="phone">Số Điện Thoại:</label>
                <input type="text" class="form-control" id="phone" name="phone" required >
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required >
            </div>
            <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
        </form>
        <h2>Đơn Hàng</h2>
        @if(isset($orders) && $orders->count() > 0)
            <!-- Display Orders -->
            <div class="table-responsive">
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>STT</th>
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
                        @foreach($orders as $key => $order)
                            <tr>
                                <td>{{ $key + 1 }}</td>
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
            </div>
        @elseif(isset($orders))
            <p class="mt-4">Không tìm thấy đơn hàng nào.</p>
        @endif
    </div>
@endsection
