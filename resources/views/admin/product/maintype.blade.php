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
            <h5> QUẢN LÝ LOẠI BÁNH </h5>
            <span>
                <a href ="{{ route ('type.add') }}">
                    <button class = "btn btn-add" > <i class="fa-solid fa-plus"></i> </button>
                </a>
            </span>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Mã loại bánh</th>
                        <th>Tên loại bánh</th>
                        <th>Giới thiệu</th>
                        <th>Phụ kiện tặng kèm</th>
                        <th>Hướng dẫn bảo quản</th>
                        <th style = "border-right: none !important;">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($qllb as $row)
                    <tr>
                        <td width ="100px">{{$row->malb}}</td>
                        <td>{{$row->tenlb}}</td>
                        <td style ="text-align: justify", width = "400px">{{$row->gioithieu}}</td>
                        <td class="wrap-after-dot">{{$row->phukien}}</td>
                        <td class="wrap-after-dot", width = "250px">{{$row->baoquan}}</td>
                        <td style = "border-right: none !important;">
                            <a href="{{ url('/quanly/loaibanh/update/'. $row->malb)}}">
                                <button class = "btn btn-update"> <i class="fa-solid fa-pen"></i> </button> 
                            </a>
                            <form action="{{ url('/quanly/loaibanh/delete/'. $row->malb) }}" method="post" style="display: inline;">
                                @csrf @method('delete')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa loại bánh này?')"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection