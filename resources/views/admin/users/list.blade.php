@extends('admin.main')

@section('content')
<div class="container">

<div class="row mb-3">
    <div class="col-12 col-md-6 d-flex align-items-center">
        <h2 class="mb-0">Danh sách Người dùng</h2>
    </div>
</div>




    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Ngày tạo</th>
            <!-- <th style="width: 100px">&nbsp;</th> -->
        </tr>
        </thead>
        <tbody>
            @foreach($users as $key => $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email}}</td>
                <td>{{ $user->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
       
    </div>
</div>
@endsection
