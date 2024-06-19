@extends('admin.main')

@section('content')
<div class="container">
        <div class="row mb-3" style="height:30px;">
            <div class="col">
                <h2 class="float-left">Danh sách danh mục</h2>
            </div>
            <div class="col text-right" style="">
                <a class="btn btn-primary" href="{{ route('menus.add') }}">
                    <i class="fas fa-plus"></i> Thêm danh mục
                </a>
            </div>
        </div>

        <table class="table">
            <thead style="background-color: #28a745; color: white;">
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>Tên danh mục</th>
                    <th>Danh mục cha</th>
                    <th>Cập nhật</th>
                    <th style="width: 100px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                {!! \App\Helpers\Helper::menu($menus) !!}
            </tbody>
        </table>
    </div>
@endsection

