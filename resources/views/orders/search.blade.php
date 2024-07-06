@extends('main')
<style>
.custom-margin-top {
    margin-top: 90px;
}
</style>
@section('content')
    <div class="container">
        <!-- Search Form -->
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
    </div>
@endsection


