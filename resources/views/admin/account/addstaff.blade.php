@extends ("admin.layouts.add_layout")

@section("title",'Atelier Cake')

@section("content")
<div class="card">
    <div class = "card-header">
        <h5> THÊM TÀI KHOẢN </h5>
        <span>
            <a href ="{{ route ('account.main') }}">
                <button class = "btn btn-viewcustomer"> <i class="fa-solid fa-rotate-left"></i></button>
            </a>
        </span>
    </div>

    <div class="card-body">
        <form id ="addstaffform" action="{{route('account.added')}}" method = "post">
            <center> 
            @csrf
            <table class="addstaff-table">
                <tr>
                    <td class="label-addstaff"> <b>Số điện thoại:</b></td> 
                    <td>
                        <input type="text" name="sdt" 
                            required pattern="\d{10,11}">
                    </td>
                <tr>
                
                <tr>
                    <td class="label-addstaff"> <b>Tên người dùng:</b></td> 
                    <td><input type="text" name="username" 
                        required pattern="[a-z]{1,15}" title="Tên người dùng chỉ chứa chữ cái thường."></td>
                <tr>

                <tr>
                    <td class="label-addstaff"> <b>Mật khẩu:</b></td> 
                    <td><input type="text" name="pass" required></td>
                <tr>

                <tr>
                    <td class="label-addstaff"> <b>Họ và tên:</b></td> 
                    <td><input type="text" name="name" required></td>
                <tr>

                <tr>
                    <td class="label-addstaff"> <b>Giới tính:</b></td> 
                    <td>
                    <select name="sex" required>
                        <option value=""disabled selected></option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                    </td>
                <tr>

                <tr>
                    <td class="label-addstaff"> <b>Ngày sinh:</b></td> 
                    <td>
                        <input type="text" id="date" name="date" pattern="\d{4}-\d{2}-\d{2}" title="Ngày sinh phải có định dạng yyyy-mm-dd">
                        <script>
                            $(document).ready(function() {
                                $("#date").datepicker({
                                    dateFormat: "yy-mm-dd",
                                    changeYear: true,
                                    yearRange: "-100:+0"
                                });
                            });
                        </script>
                    </td>
                <tr>

                <tr>
                    <td class="label-addstaff"> <b>Email:</b></td> 
                    <td><input type="text" name="email" required></td>
                <tr>

                <tr>
                    <td class="label-addstaff"> <b>Chức vụ:</b></td> 
                    <td>
                    <select name="posi" required>
                        <option value=""disabled selected></option>
                        <option value="Nhân viên">Nhân viên</option>
                        <option value="Quản lý">Quản lý</option>
                    </select>
                    </td>
                <tr>
            </table>
            </center>
            <div class = "acc-button-container">
                    <input type='button' value='HỦY' class="cancel-button" onclick="window.location.href='http://127.0.0.1:8000/quanly/taikhoan'">
                    <input type='submit' value='THÊM' class="addstaff-button" onclick="return validateForm()">
            </div>
            {{ csrf_field() }}
        </form>
    </div>
</div>

    <script>
        function validateForm() {
            var phone = document.forms["addstaffform"]["sdt"].value;
            var username = document.forms["addstaffform"]["username"].value;
            var pass = document.forms["addstaffform"]["pass"].value;
            var name = document.forms["addstaffform"]["name"].value;
            var sex = document.forms["addstaffform"]["sex"].value;
            var date = document.forms["addstaffform"]["date"].value;
            var email = document.forms["addstaffform"]["email"].value;

            if (phone == "" || username == "" || pass == "" || name == "" || sex == "" || date == "" || email == "") {
                alert("Vui lòng điền đầy đủ thông tin!");
                return false;
            }
        }
    </script>
@endsection