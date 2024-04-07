@extends ("admin.layouts.index_layout")

@section("title",'Atelier Cake')

@section("content")
<div class="content-wrapper">
    <div class="card">
        <div class = "card-header">
            <h5> XEM NGƯỜI DÙNG </h5>
            <div>
                <b> Tổng số lượng: {{ count($qlnd) }} </b> &nbsp;
                <a href ="{{ route ('account.main') }}">
                    <button class = "btn btn-viewuser"> <i class="fa-solid fa-rotate-left"></i></button>
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr style="vertical-align: middle;">
                        <th>Số điện thoại</th>
                        <th>Họ và tên</th>
                        <th>Giới tính</th>
                        <th>Ngày sinh</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Quận</th>
                        <th>Thành phố</th>
                        <th style = "border-right: none !important;">Tổng số đơn đã đặt</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($qlnd as $row)
                    <tr>
                        <td>{{$row->phone}}</td>
                        <td>{{$row->hoten}}</td>
                        <td>{{$row->gioitinh}}</td>
                        <td>{{$row->ngaysinh}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->diachi}}</td>
                        <td>{{$row->quan}}</td>
                        <td>{{$row->thpho}}</td>
                        <td style = "border-right: none !important;">{{$row->tongdondadat}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection