@extends('admin.main')

@section('content')
<div class="row mb-3">
    <div class="col-12 col-md-6 d-flex align-items-center">
        <h2 class="mb-0">Danh Sách Băng Chuyền</h2>
    </div>
    <div class="col-12 col-md-6 d-flex justify-content-end">
        <a class="btn btn-primary ml-2" href="{{ route('sliders.add') }}" style="width:auto;">
            <i class="fas fa-plus" ></i> Thêm Băng Chuyền
        </a>
    </div>
</div>
    <table class="table">
        <thead style="background-color: #28a745; color: white;">
        <tr>
            <th style="width: 50px">TT</th>
            <th>Tiêu Đề</th>
            <th>Link</th>
            <th>Ảnh</th>
            <th>Trang Thái</th>
            <th>Cập Nhật</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sliders as $key => $slider)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $slider->name }}</td>
                <td>{{ $slider->url }}</td>
                <td><a href="{{ $slider->thumb }}" target="_blank">
                        <img src="{{ $slider->thumb }}" height="40px">
                    </a>
                </td>
                <td>{!! \App\Helpers\Helper::active($slider->active) !!}</td>
                <td>{{ $slider->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/sliders/edit/{{ $slider->slider_id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $slider->slider_id }}, '/admin/sliders/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $sliders->links() !!}
@endsection


