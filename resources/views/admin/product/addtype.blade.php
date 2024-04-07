@extends ("admin.layouts.add_layout")

@section("title",'Atelier Cake')

@section("content")
<div class="card">
    <div class = "card-header">
        <h5> THÊM LOẠI BÁNH </h5>
        <span>
            <a href ="{{ route ('type.main') }}">
                <button class = "btn btn-viewcustomer"> <i class="fa-solid fa-rotate-left"></i></button>
            </a>
        </span>
    </div>
    <div class="card-body">
        <form id="addtypeform" action="{{route('type.added')}}" method = "post">
            <center>
            <table class="addtype-table">
                <tr>
                    <td class="label-addtype"> <b> Mã loại bánh:</b></td> 
                    <td><input type="text" name="idtype" value="{{ $nextTypeID }}" readonly></td>
                <tr>

                <tr>
                    <td class="label-addtype"> <b>Tên loại bánh:</b></td> 
                    <td><input type="text" name="nametype"></td>
                <tr>

                <tr>
                    <td class="label-addtype"> <b>Giới thiệu:</b></td> 
                    <td>
                        <textarea name="descrtype"></textarea>
                    </td>
                </tr>
                
                <tr>
                    <td class="label-addtype"> <b>Phụ kiện tặng kèm:</b></td> 
                    <td>
                        <textarea class ="decor-bonus" name="bonus"></textarea>
                    </td>
                </tr>

                <tr>
                    <td class="label-addtype"> <b>Hướng dẫn bảo quản:</b></td> 
                    <td>
                        <textarea class ="decor-instru" name="instru"></textarea>
                    </td>
                </tr>
            </table>
            </center>
                <div class = "type-button-container">
                    <input type='button' value='HỦY' class="cancel-button" onclick="window.location.href='http://127.0.0.1:8000/quanly/loaibanh'">
                    <input type='submit' value='THÊM' class="agree-button" onclick="return validateForm()">
                </div>
            {{ csrf_field() }}
        </form>
    </div>
</div>

    <script>
        function validateForm() {
            var id = document.forms["addtypeform"]["idtype"].value;
            var name = document.forms["addtypeform"]["nametype"].value;
            var descr = document.forms["addtypeform"]["descrtype"].value;

            if (id == "" || name == "" || descr == "") {
                alert("Vui lòng điền đầy đủ thông tin!");
                return false;
            }
        }
    </script>
@endsection