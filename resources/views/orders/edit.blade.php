@extends('main')

@section('content')
    <div class="container" style="margin-top:50px;">
        <h2 class="my-4">Sửa thông tin đơn hàng #{{ $order->order_id }}</h2>
        <form action="{{ route('order.update', ['order_id' => $order->order_id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="customer_name">Tên khách hàng:</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $order->customer_name }}" readonly>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $order->phone }}">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $order->address }}">
            </div>
            <div class="form-group">
                <label for="content">Ghi chú:</label>
                <textarea class="form-control" id="content" name="content">{{ $order->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
        </form>
    </div>
@endsection
