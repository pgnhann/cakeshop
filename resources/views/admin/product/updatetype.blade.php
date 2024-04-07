@extends ("admin.layouts.update_layout")

@section("title",'Atelier Cake')

@section("content")
<div class="card">
    <div class = "card-header">
        <h5> CẬP NHẬT LOẠI BÁNH </h5>
        <span>
            <a href ="{{ route ('type.main') }}">
                <button class = "btn btn-viewcustomer"> <i class="fa-solid fa-rotate-left"></i></button>
            </a>
        </span>
    </div>

    <div class="card-body">
        <form action="{{ url('/quanly/loaibanh/updated/' . $type->malb) }}" method="post">
            @csrf
            <center>
            <table class="updatetype-table">
                <tr>
                    <td class="label-updatetype"> <b>Mã loại bánh:</b></td> 
                    <td>
                        <input type="text" name="idtype" value="{{ $type-> malb }}">
                    </td>
                </tr>
                
                <tr>
                    <td class="label-updatetype"> <b>Tên loại bánh:</b></td> 
                    <td>
                        <input type="text" name="nametype" value="{{ $type-> tenlb }}">
                    </td>
                </tr>

                <tr>
                    <td class="label-updatetype"> <b>Giới thiệu:</b></td> 
                    <td>
                        <textarea name="descrtype">{{$type->gioithieu}}</textarea>
                    </td>
                </tr>

                <tr>
                    <td class="label-updatetype"> <b>Phụ kiện tặng kèm:</b></td> 
                    <td>
                        <textarea name="bonus">{{$type->phukien }}</textarea>
                    </td>
                </tr>

                <tr>
                    <td class="label-updatetype"> <b>Hướng dẫn bảo quản:</b></td> 
                    <td>
                        <textarea name="instru">{{$type->baoquan }}</textarea>
                    </td>
                </tr>
            </table>
            </center>
                <div class = "type-button-container">
                    <input type='button' value='HỦY' class="cancel-button" onclick="window.location.href='http://127.0.0.1:8000/quanly/loaibanh'">
                    <input type='submit' value='CẬP NHẬT' class="agree-button">
                </div>
        </form>
    </div>
</div>
@endsection