@extends ("admin.layouts.update_layout")

@section("title",'Atelier Cake')

@section("content")
<div class="card">
    <div class = "card-header">
        <h5> CẬP NHẬT BLOG </h5>
        <span>
            <a href ="{{ route ('blog.main') }}">
                <button class = "btn btn-viewcustomer"> <i class="fa-solid fa-rotate-left"></i></button>
            </a>
        </span>
    </div>

    <div class="card-body">
        <form action="{{ url('/quanly/blog/updated/' . $blog->stt) }}" method="post" enctype="multipart/form-data">
            @csrf
            <center>
            <table class="updateblog-table">
                <tr>
                    <td class="label-updateblog"> <b>Số thứ tự:</b></td> 
                    <td>
                        <input type="text" name="idblog" value="{{ $blog -> stt }}">
                    </td>
                </tr>
                
                <tr>
                    <td class="label-updateblog"> <b>Tiêu đề:</b></td> 
                    <td>
                        <input type="text" name="nameblog" value="{{ $blog -> tieude }}">
                    </td>
                </tr>

                <tr>
                    <td class="label-updateblog"> <b>Nội dung:</b></td> 
                    <td>
                        <textarea name="descrblog">{{$blog ->noidung}}</textarea>
                    </td>
                </tr>

            </table>
            </table>
            </center>
                <div class = "prom-button-container">
                    <input type='button' value='HỦY' class="cancel-button" onclick="window.location.href='http://127.0.0.1:8000/quanly/blog'">
                    <input type='submit' value='CẬP NHẬT' class="agree-button">
                </div>
        </form>
    </div>
</div>
@endsection