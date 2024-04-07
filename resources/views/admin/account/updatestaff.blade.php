@extends ("admin.layouts.update_layout")

@section("title",'Atelier Cake')

@section("content")
<div class="card">
    <div class = "card-header">
        <h5> CẬP NHẬT THÔNG TIN NHÂN VIÊN </h5>
        <span>
            <a href ="{{ route ('account.main') }}">
                <button class = "btn btn-viewuser"> <i class="fa-solid fa-rotate-left"></i></button>
            </a>
        </span>
    </div>

    <div class="card-body">
        <form action="{{ url('/quanly/nhvien/updated/'.$staff->phone) }}" method="post" enctype="multipart/form-data">
            @csrf
            <center>
            <table class="updatestaff-table">
                <tr>
                    <td class="label-updatenv"> <b>Tên người dùng:</b></td> 
                    <td>
                        <input type="text" name="username" value="{{ $staff-> username }}">
                    </td>
                <tr>

                <tr>
                    <td class="label-updatenv"> <b>Mật khẩu:</b></td> 
                    <td>
                        <input type="text" name="pass" value="********">
                    </td>
                <tr>

                <tr>
                    <td class="label-updatenv"> <b>Mã chi nhánh:</b></td> 
                    <td>
                        <input type="text" name="idbranch" value="{{ $staff-> id_branch }}">
                    </td>
                <tr>

                <tr>
                    <td class="label-updatenv"> <b>Họ và tên:</b></td> 
                    <td>
                        <input type="text" name="name" value="{{ $staff-> name }}">
                    </td>
                <tr>

                <tr>
                    <td class="label-updatenv"> <b>Giới tính:</b></td> 
                    <td>
                        <input type="text" name="sex" value="{{ $staff-> sex }}">
                    </td>
                <tr>

                <tr>
                    <td class="label-updatenv"> <b>Ngày sinh:</b></td> 
                    <td>
                        <input type="text" id="date" name="date" pattern="\d{4}-\d{2}-\d{2}" 
                                value = "{{ $staff -> date }}" title="Ngày sinh phải có định dạng yyyy-mm-dd">
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
                    <td class="label-updatenv"> <b>Số điện thoại:</b></td> 
                    <td>
                        <input type="text" name="sdt" value="{{ $staff-> phone }}">
                    </td>
                <tr>

                <tr>
                    <td class="label-updatenv"> <b>Email:</b></td> 
                    <td>
                        <input type="text" name="email" value="{{ $staff-> email }}">
                    </td>
                <tr>
            </table>
            </center>
                <div class = "type-button-container">
                    <input type='button' value='HỦY' class="cancel-button" onclick="window.location.href='http://127.0.0.1:8000/quanly/taikhoan'">
                    <input type='submit' value='CẬP NHẬT' class="agree-button">
                </div>
                {{ csrf_field() }}
        </form>
    </div>
</div>
@endsection