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
            <h5> QUẢN LÝ SẢN PHẨM </h5>
            <div>
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-filter"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{ route('product.main', ['filter' => 'all']) }}">Tất cả</a></li>
                    <li><a class="dropdown-item" href="{{ route('product.main', ['filter' => 'Bánh kem']) }}">Bánh kem</a></li>
                    <li><a class="dropdown-item" href="{{ route('product.main', ['filter' => 'Tiramisu']) }}">Tiramisu</a></li>
                    <li><a class="dropdown-item" href="{{ route('product.main', ['filter' => 'Entremet']) }}">Entremet</a></li>
                    <li><a class="dropdown-item" href="{{ route('product.main', ['filter' => 'Bánh ngọt']) }}">Bánh ngọt</a></li>
                </ul>
                <a href ="{{ route ('product.add') }}">
                    <button class = "btn btn-add" > <i class="fa-solid fa-plus"></i> </button>
                </a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Mã bánh</th>
                        <th>Loại bánh</th>
                        <th>Tên bánh</th>
                        <th> Nguyên liệu </th>
                        <th>Giá bán</th>
                        <th>Hình ảnh</th>
                        <th style = "border-right: none !important;"> Thao tác </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pro as $sp)
                    <tr>
                        <td>{{$sp->masp}}</td>
                        <td>{{$sp->tenlb}}</td>
                        <td>{{$sp->tensp}}</td>
                        <td>{{$sp->nglieu}}</td>
                        <td>{{$sp->giaban}}</td>
                        <td><img style="width: 120px; height: 120px;" src="{{ asset('storage/images/' . $sp->hinhanh) }}" alt="img"></td>
                        <td style = "border-right: none !important;">
                            <a href="{{ url('/quanly/sanpham/update/'. $sp->masp)}}">
                                <button class = "btn btn-update"> <i class="fa-solid fa-pen"></i> </button> 
                            </a>
                            <form action="{{ url('/quanly/sanpham/delete/'. $sp->masp) }}" method="post" style="display: inline;">
                                @csrf @method('delete')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection