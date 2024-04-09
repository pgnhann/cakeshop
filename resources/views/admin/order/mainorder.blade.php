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
            <h5> QUẢN LÝ ĐƠN HÀNG </h5>
            <div>
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-filter"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{ route('order.main', ['filter' => 'Tất cả']) }}">Tất cả</a></li>
                    <li><a class="dropdown-item" href="{{ route('order.main', ['filter' => 'Chưa thanh toán']) }}">Chưa thanh toán</a></li>
                    <li><a class="dropdown-item" href="{{ route('order.main', ['filter' => 'Đã thanh toán']) }}">Đã thanh toán</a></li>
                    <li><a class="dropdown-item" href="{{ route('order.main', ['filter' => 'Thành công']) }}">Thành công</a></li>
                </ul>
                <a href ="{{ route ('order.preexport') }}">
                    <button class = "btn btn-add" > <i class="fa-solid fa-file-export"></i> </button>
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr style="vertical-align: middle;">
                        <th>Mã đơn hàng</th>
                        <th>Số điện thoại</th>
                        <th>Tên khách hàng</th>
                        <th>Tổng tiền</th>
                        <th>Địa chỉ</th>
                        <th>Thời gian đặt</th>
                        <th>Thời gian giao</th>
                        <th>Phương thức thanh toán</th>
                        <th>Ghi chú</th>
                        <th>Thanh toán</th>
                        <th>Giao hàng</th>
                        <th style = "border-right: none !important;">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order as $key => $row)
                    <tr>
                        <td>{{$row->Order_Id}}</td>
                        <td>{{$row->Cus_Phone}}</td>
                        <td>{{$row->Cus_Name}}</td>
                        <td>{{$row->Total_Money}}</td>
                        <td>{{$row->Recipient_AddressR}}</td>
                        <td>{{$row->Create_Date}}</td>
                        <td>NULL</td>
                        <td>{{$row->Payment_Code}}</td>
                        <td>{{$row->Note}}</td>
                        <td>{{$row->Is_Paid}}</td>
                        <td>{{$row->Is_Delivered}}</td>
                        <td style = "border-right: none !important;" width = "160px">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#ModalOrderDetail{{$row->Order_Id}}">
                                <button class="btn btn-viewcustomer"> <i class="fa-solid fa-eye"></i> </button>
                            </a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#ModalStatusOrder{{$row->Order_Id}}">
                                <button class = "btn btn-update"> <i class="fa-solid fa-pen"></i> </button> 
                            </a>
                            @if(session('role') == 1)
                            <form action="{{ url('/quanly/donhang/delete/'. $row->Order_Id) }}" method="post" style="display: inline;">
                                @csrf @method('delete')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')"><i class="fa-solid fa-trash"></i></button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @include('admin.modals.orderdetail')
                    @include('admin.modals.statusorder')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection