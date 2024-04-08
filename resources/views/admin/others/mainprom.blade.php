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
            @if(session('role') == 1)
            <span>
                <a href ="{{ route ('promotion.add') }}">
                    <button class = "btn btn-add" > <i class="fa-solid fa-plus"></i> </button>
                </a>
            </span>
            @endif
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
                        @if(session('role') == 1)
                        <th style = "border-right: none !important;">Thao tác</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($prom as $row)
                    <tr>
                        <td>{{$row->Prm_Id}}</td>
                        <td>{{$row->Prm_Name}}</td>
                        <td>{{$row->Prm_Desc}}</td>
                        <td>{{$row->dieukien}}</td>
                        <td>{{$row->Prm_StDate}}</td>
                        <td>{{$row->Prm_EnDate}}</td>
                        <td>{{$row->Prm_Status}}</td>
                        @if(session('role') == 1)
                        <td width = "120px" style = "border-right: none !important;">
                            <a href="{{ url('/quanly/khuyenmai/update/'. $row->Prm_Id)}}">
                                <button class = "btn btn-update"> <i class="fa-solid fa-pen"></i> </button> 
                            </a>
                            <form action="{{ url('/quanly/khuyenmai/delete/'. $row->Prm_Id) }}" method="post" style="display: inline;">
                                @csrf @method('delete')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa khuyến mãi này?')"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection