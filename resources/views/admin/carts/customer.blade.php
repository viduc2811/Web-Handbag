@extends('admin.main')

@section('content')
@php
use App\Models\Customer;
$customers = Customer::All(); 
@endphp
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
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
                    <select class="form-control" id="status" name="status" style="">
                        <option value="Đang vận chuyển" {{ $order->status == 'Đang vận chuyển' ? 'selected' : '' }}>Đang vận chuyển</option>
                        <option value="Hoàn thành" {{ $order->status == 'Hoàn thành' ? 'selected' : '' }}>Hoàn thành</option>
                        <option value="Hủy" {{ $order->status == 'Hủy' ? 'selected' : '' }}>Hủy</option>
                    </select>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('admin.customers.view', ['customer' => $order->customer->id]) }}">
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
