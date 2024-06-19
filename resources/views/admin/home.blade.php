@extends('admin.main')
@section('content')
<style>
         body, html {
            height: 100%;
        }
        .container-fluid {
            display: flex;
            justify-content: flex-end; /* Đẩy nội dung về phía bên phải */
            align-items: center;
            height: 100%;
            padding-right: 50px; /* Khoảng đệm để đẩy bảng về bên phải */
        }
        .table-container {
            width: 100%;
            max-width: 1000px; /* Cho phép kéo rộng */
        }
        .table-container h2 {
            tex
    </style>
    <div class="container-fluid">
        <div class="table-container">
            <div id="discount-products">
                <h2>Sản phẩm giảm giá</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Mô tả</th>
                            <th>Kích cỡ</th>
                            <th>Trạng thái</th>
                            <th>Giá gốc</th>
                            <th>Giá giảm</th>
                            <th>Hoạt động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Túi xách tay Hàn Quốc</td>
                            <td>Đây là loại túi xách phù hợp với mọi lứa tuổi</td>
                            <td>36</td>
                            <td>Active</td>
                            <td>200,000 VND</td>
                            <td>100,000 VND</td>
                            <td>
                                <i class="fas fa-trash-alt"></i>
                                <i class="fas fa-edit"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Túi xách tay Nhật Bản</td>
                            <td>Phong cách hiện đại, chất liệu cao cấp</td>
                            <td>38</td>
                            <td>Active</td>
                            <td>250,000 VND</td>
                            <td>150,000 VND</td>
                            <td>
                                <i class="fas fa-trash-alt"></i>
                                <i class="fas fa-edit"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Túi xách tay Châu Âu</td>
                            <td>Thiết kế sang trọng, đẳng cấp</td>
                            <td>40</td>
                            <td>Active</td>
                            <td>300,000 VND</td>
                            <td>200,000 VND</td>
                            <td>
                                <i class="fas fa-trash-alt"></i>
                                <i class="fas fa-edit"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection