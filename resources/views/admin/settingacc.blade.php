@extends ("admin.layouts.index_layout")

@section("title",'Atelier Cake')

@section("content")
<div class = "content-wrapper">
    @if ($errors->any())
    <div style='color:red;width:30%; margin:0 auto'>
        <div>
            {{ __('Có lỗi xảy ra!') }}
        </div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class = "card-header">
            <h5> CÀI ĐẶT TÀI KHOẢN </h5>
            <span>
                <a href ="{{ route ('account.main') }}"> 
                    <button class ="btn btn-viewcustomer"><i class="fa-solid fa-rotate-left"></i></button>
                </a>
                <a href ="{{ route ('admin.index') }}"> 
                    <button class ="btn btn-viewcustomer"><i class="fa-solid fa-rotate-left"></i></button>
                </a>
            </span>
        </div>
        <div class="card-body">
            <div class="setting-table">
                <form action="{{ route('save.info') }}" method="post">
                    <div class="mb-3">
                        <label class="form-label">Tên người dùng</label>
                        <input type="text" class ="form-control" name="username" value="{{ Auth::user()->username }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mật khẩu</label>
                        <input type="text" class ="form-control" name="pass" value="{{ Auth::user()->password_plain }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Chức vụ</label>
                        <input type="text" class ="form-control" name="posi" value="{{$info -> position}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mã chi nhánh</label>
                        <input type="text" class ="form-control" name="idbranch" value="{{$info -> id_branch}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Họ và tên</label>
                        <input type="text" class ="form-control" name="name" value="{{$info -> name}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Giới tính</label>
                        <input type="text" class ="form-control" name="sex" value="{{$info -> sex}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ngày sinh</label>
                        <input class="form-control" type="text" id="date" name="date" pattern="\d{4}-\d{2}-\d{2}" 
                                value = "{{ $info -> date }}">
                            <script>
                                $(document).ready(function() {
                                    $("#date").datepicker({
                                        dateFormat: "yy-mm-dd",
                                        changeYear: true,
                                        yearRange: "-100:+0"
                                    });
                                });
                            </script>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Số điện thoại</label>
                        <input type="text" class ="form-control" name="phone" value="{{$info -> phone}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class ="form-control" name="email" value="{{$info -> email}}">
                    </div>
                    <div class = "setting-button-container">
                            <input type='button' value='HỦY' class="cancel-button" onclick="window.location.href='http://127.0.0.1:8000/quanly/trangchu'">
                            <input type='submit' value='LƯU' class="addstaff-button">
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection