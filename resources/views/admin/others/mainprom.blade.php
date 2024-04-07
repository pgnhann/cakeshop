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
            <h5> QUẢN LÝ KHUYẾN MÃI </h5>
            <span>
                <a href ="{{ route ('promotion.add') }}">
                    <button class = "btn btn-add" > <i class="fa-solid fa-plus"></i> </button>
                </a>
            </span>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Mã khuyến mãi</th>
                        <th>Tên khuyến mãi</th>
                        <th>Mô tả</th>
                        <th>Điều kiện</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Trạng thái</th>
                        <th style = "border-right: none !important;">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prom as $row)
                    <tr>
                        <td>{{$row->makm}}</td>
                        <td>{{$row->tenkm}}</td>
                        <td>{{$row->mota}}</td>
                        <td>{{$row->dieukien}}</td>
                        <td>{{$row->ngaybd}}</td>
                        <td>{{$row->ngaykt}}</td>
                        <td>{{$row->trangthai}}</td>
                        <td width = "120px" style = "border-right: none !important;">
                            <a href="{{ url('/quanly/khuyenmai/update/'. $row->makm)}}">
                                <button class = "btn btn-update"> <i class="fa-solid fa-pen"></i> </button> 
                            </a>
                            <form action="{{ url('/quanly/khuyenmai/delete/'. $row->makm) }}" method="post" style="display: inline;">
                                @csrf @method('delete')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa khuyến mãi này?')"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection