@extends ("admin.layouts.add_layout")

@section("title",'Atelier Cake')

@section("content")
<div class="card">
    <div class = "card-header">
        <h5> THÊM NỘI DUNG GIỚI THIỆU </h5>
        <span>
            <a href ="{{ route ('abus.main') }}">
                <button class = "btn btn-viewcustomer"> <i class="fa-solid fa-rotate-left"></i></button>
            </a>
        </span>
    </div>

    <div class="card-body">
        <form id="addabusform" action="{{route ('abus.added')}}" method = "post" enctype="multipart/form-data">
            <center>
            <table class="addabus-table">
                <tr>
                    <td class="label-addabus"> <b>Số thứ tự:</b></td> 
                    <td>
                        <input type="text" name="id"  value="{{ $nextAbusID }}" readonly>
                    </td>
                <tr>
                
                <tr>
                    <td class="label-addabus"> <b>Tiêu đề:</b></td> 
                    <td><input type="text" name="title"></td>
                <tr>

                <tr>
                    <td class="label-addabus"> <b>Nội dung: </b></td> 
                    <td>
                        <textarea name="content"></textarea>
                    </td>
                </tr>
            </table>
            </center>
                <div class = "prom-button-container">
                    <input type='button' value='HỦY' class="cancel-button" onclick="window.location.href='http://127.0.0.1:8000/quanly/gioithieu'">
                    <input type='submit' value='THÊM' class="agree-button" onclick="return validateForm()">
                </div>
            {{ csrf_field() }}
        </form>
    </div>
</div>

    <script>
        function validateForm() 
        function validateForm() 
        {
            var id = document.forms["addabusform"]["id"].value;
            var title = document.forms["addabusform"]["title"].value;
            var content = document.forms["addabusform"]["content"].value;

            if (id == "" || title == "" || content == "") {
                alert("Vui lòng điền đầy đủ thông tin!");
                return false;
            }
        }
    </script>
@endsection