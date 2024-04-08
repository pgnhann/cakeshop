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
            <h5> QUẢN LÝ BLOG </h5>
            @if(session('role') == 1)
            <span>
                <a href ="{{ route ('blog.add') }}">
                    <button class = "btn btn-add" > <i class="fa-solid fa-plus"></i> </button>
                </a>
            </span>
            @endif
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        @if(session('role') == 1)
                        <th style = "border-right: none !important;">Thao tác</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($blog as $row)
                    <tr>
                        <td>{{$row->stt}}</td>
                        <td>{{$row->tieude}}</td>
                        <td style = "text-align: justify !important;">{{$row->noidung}}</td>
                        @if(session('role') == 1)
                        <td width = "120px" style = "border-right: none !important;">
                            <a href="{{ url('/quanly/blog/update/'. $row->stt)}}">
                                <button class = "btn btn-update"> <i class="fa-solid fa-pen"></i> </button> 
                            </a>
                            <form action="{{ url('/quanly/blog/delete/'. $row->stt) }}" method="post" style="display: inline;">
                                @csrf @method('delete')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa blog này?')"><i class="fa-solid fa-trash"></i></button>
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