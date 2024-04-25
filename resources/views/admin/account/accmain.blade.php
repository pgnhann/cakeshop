@extends ("admin.layouts.index_layout")

@section("title",'Atelier Cake')

@section("content")
<div class="content-wrapper">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class = "card-header">
            <h5> QUẢN LÝ TÀI KHOẢN </h5>
            <span>
                <a href ="#">
                    <button class = "btn btn-add" > <i class="fa-solid fa-user-plus"></i> </button>
                </a>
                <a href ="#"> 
                    <button class ="btn btn-viewcustomer"> <i class="fa-solid fa-eye"></i> </button>
                </a>
            </span>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Chức vụ</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Tên người dùng</th>
                        <th scope="col">Mật khẩu</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Giới tính</th>
                        <th scope="col">Ngày sinh</th>
                        <th scope="col">Email</th>
                        <th scope="col" style = "border-right: none !important;">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admin as $key => $row)
                        <tr>
                            <td>{{$row->position}}</td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->username}}</td>
                            <td>********</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->sex}}</td>
                            <td>{{$row->date}}</td>
                            <td>{{$row->email}}</td>
                            <td style ="vertical-align: middle; border-right: none !important" >
                            @if($row->position !== 'Quản lý')
                                <a class="btn btn-giverole" href="#" data-bs-toggle="modal" data-bs-target="#ModalGiveRole{{$row->phone}}">CẤP QUYỀN</a>
                                <a href="#">
                                    <button class = "btn btn-update"> <i class="fa-solid fa-pen"></i></button> 
                                </a>
                                <form action="#" method="post" style="display: inline;">
                                    @csrf @method('delete')
                                    <button type="submit" class="btn btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?')"><i class="fa-solid fa-trash"></i></button>
                                </form>      
                            </td>
                            @endif
                            @include('admin.modals.giverole')
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection