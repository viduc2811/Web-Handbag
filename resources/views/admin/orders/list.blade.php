@extends('admin.main')

@section('content')
@php
use App\Models\Customer;
$customers = Customer::All();
@endphp
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px">Mã</th>
            <th>Tên Khách Hàng</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Địa Chỉ</th>
            <th>Ngày Đặt hàng</th>
            <th>Trạng thái</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->order_id }}</td>
            <td>{{ $order->customer_name }}</td>
            <td>{{ $order->phone }}</td>
            <td>{{ $order->email }}</td>
            <td>{{ $order->address }}</td>
            <td>{{ $order->created_at }}</td>
            <td>
                <form action="{{ route('customers.update', ['order' => $order->order_id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select class="form-control" name="status" onchange="this.form.submit()" {{ in_array($order->status, ['Hoàn thành', 'Hủy']) ? 'disabled' : '' }}>
                        <option value="Đang chuẩn bị" {{ $order->status == 'Đang chuẩn bị' ? 'selected' : '' }}>Đang chuẩn bị</option>
                        <option value="Đang vận chuyển" {{ $order->status == 'Đang vận chuyển' ? 'selected' : '' }}>Đang
                            vận chuyển</option>
                        <option value="Hoàn thành" {{ $order->status == 'Hoàn thành' ? 'selected' : '' }}>Hoàn thành
                        </option>
                        <option value="Hủy" {{ $order->status == 'Hủy' ? 'selected' : '' }}>Hủy</option>
                    </select>

                </form>

            </td>
            <td>
                <a class="btn btn-primary btn-sm"
                    href="{{ route('admin.order.detail', ['order_id' => $order->order_id]) }}">
                    <i class="fas fa-eye"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="card-footer clearfix">
    {!! $orders->links('pagination') !!}
</div>
@endsection