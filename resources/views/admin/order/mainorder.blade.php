@extends ("admin.layouts.index_layout")

@section("title",'Atelier Cake')

@section("content")
<div class="content-wrapper">
    <div class="card">
        <div class = "card-header">
            <h5> QUẢN LÝ ĐƠN HÀNG </h5>
            <div>
                <a href ="{{ route ('order.main') }}">
                    <button class = "btn btn-viewcustomer"> <i class="fa-solid fa-rotate-left"></i></button>
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr style="vertical-align: middle;">
                        <th>Mã đơn hàng</th>
                        <th>Số điện thoại</th>
                        <th>Mã nhân viên</th>
                        <th>Tổng tiền</th>
                        <th>Địa chỉ</th>
                        <th>Thời gian đặt</th>
                        <th>Thời gian giao</th>
                        <th>Phương thức thanh toán</th>
                        <th>Ghi chú</th>
                        <th>Trạng thái</th>
                        <th>Đánh giá</th>
                        <th>Nhận xét</th>
                        <th style = "border-right: none !important;">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order as $key => $row)
                    <tr>
                        <td>{{$row->madh}}</td>
                        <td>{{$row->sdt}}</td>
                        <td>{{$row->manv}}</td>
                        <td>{{$row->tongtien}}</td>
                        <td>{{$row->diachi}}</td>
                        <td>{{$row->tgdat}}</td>
                        <td>{{$row->tggiao}}</td>
                        <td>{{$row->pttt}}</td>
                        <td>{{$row->ghichu}}</td>
                        <td>{{$row->trangthai}}</td>
                        <td>{{$row->danhgia}}</td>
                        <td>{{$row->nhanxet}}</td>
                        <td style = "border-right: none !important;" width = "160px">
                            <a class="btn btn-giverole" href="#" data-bs-toggle="modal" data-bs-target="#ModalOrderDetail{{$row->madh}}">
                                <button class ="btn btn-viewcustomer"> <i class="fa-solid fa-eye"></i> </button>
                            </a>
                            <a href="{{ url('/quanly/donhang/update/'. $row->madh)}}">
                                <button class = "btn btn-update"> <i class="fa-solid fa-pen"></i> </button> 
                            </a>
                            <form action="{{ url('/quanly/donhang/delete/'. $row->madh) }}" method="post" style="display: inline;">
                                @csrf @method('delete')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection