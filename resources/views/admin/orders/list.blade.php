@extends('admin.main')

@section('content')
@php
use App\Models\Customer;
$customers = Customer::All();
@endphp

<div class="row mb-3">
    <div class="col-12 col-md-6 d-flex align-items-center">
        <h2 class="mb-0">Danh Sách Hóa Đơn</h2>
    </div>
    <div class="col-12 col-md-6 d-flex justify-content-end">
        <form action="{{ route('admin.orders.searchByEmail') }}" method="GET" class="d-flex align-items-center mr-2">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Nhập từ khóa tìm kiếm"
                    aria-label="Tìm kiếm">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </div>
        </form>
        <form action="{{ route('admin.orders.filterByStatus') }}" method="GET" class="d-flex align-items-center">
            <div class="input-group">
                <select name="status" class="form-control" aria-label="Lọc trạng thái">
                    <option value="">Tất cả đơn hàng</option>
                    <option value="Đang chuẩn bị">Đang chuẩn bị</option>
                    <option value="Đang vận chuyển">Đang vận chuyển</option>
                    <option value="Hoàn thành">Hoàn thành</option>
                    <option value="Hủy">Hủy</option>
                </select>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Lọc</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

<table class="table">
@if($orders->isEmpty())
    <div style="display: flex; justify-content: center; align-items: center; height: 300px;">
        <div style="text-align: center;">
            <h2 style="color: #666;">Không có hóa đơn nào.</h2>
        </div>
    </div>
@else
    <thead style="background-color: #28a745; color: white;">
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
                    <select class="form-control" name="status" onchange="this.form.submit()"
                        {{ in_array($order->status, ['Hoàn thành', 'Hủy']) ? 'disabled' : '' }}>
                        <option value="Đang chuẩn bị" {{ $order->status == 'Đang chuẩn bị' ? 'selected' : '' }}>Đang
                            chuẩn bị</option>
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
    @endif
</table>

<div class="card-footer clearfix">
    {!! $orders->links('pagination') !!}
</div>
@endsection