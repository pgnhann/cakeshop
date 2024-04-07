@extends ("admin.layouts.add_layout")

@section("title",'Atelier Cake')

@section("content")
<div class="card">
    <div class = "card-header">
        <h5> THÊM BLOG </h5>
        <span>
            <a href ="{{ route ('blog.main') }}">
                <button class = "btn btn-viewcustomer"> <i class="fa-solid fa-rotate-left"></i></button>
            </a>
        </span>
    </div>

    <div class="card-body">
        <form id="addblogform" action="{{route ('blog.added')}}" method = "post" enctype="multipart/form-data">
            <center>
            <table class="addblog-table">
                <tr>
                    <td class="label-addblog"> <b>Số thứ tự:</b></td> 
                    <td>
                        <input type="text" name="idblog"  value="{{ $nextBlogID }}" readonly>
                    </td>
                <tr>
                
                <tr>
                    <td class="label-addblog"> <b>Tên blog:</b></td> 
                    <td><input type="text" name="nameblog"></td>
                <tr>

                <tr>
                    <td class="label-addblog"> <b>Nội dung: </b></td> 
                    <td>
                        <textarea name="descrblog"></textarea>
                    </td>
                </tr>
            </table>
            </center>
                <div class = "prom-button-container">
                    <input type='button' value='HỦY' class="cancel-button" onclick="window.location.href='http://127.0.0.1:8000/quanly/blog'">
                    <input type='submit' value='THÊM' class="agree-button" onclick="return validateForm()">
                </div>
            {{ csrf_field() }}
        </form>
    </div>
</div>

    <script>
        function validateForm() 
        {
            var id = document.forms["addblogform"]["idblog"].value;
            var name = document.forms["addblogform"]["nameblog"].value;
            var descr = document.forms["addblogform"]["descrblog"].value;

            if (id == "" || name == "" || descr == "") {
                alert("Vui lòng điền đầy đủ thông tin!");
                return false;
            }
        }
    </script>
@endsection