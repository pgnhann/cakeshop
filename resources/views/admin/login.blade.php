<!doctype html>
<html>
    <head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#sdt').focus(function() {
            console.log("Focus event triggered.");
            if ($('#rememberCheckbox').is(':checked')) {
                var savedPassword = "{{ session('password') }}";
                console.log("Saved password:", savedPassword);
                $('#pass').val(savedPassword);
            }
        });
    });
</script>

    </head>
    <body>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
            <div>
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ url('quanly/trangchu') }}" method="post">
            Số điện thoại: <input id ="sdt" type="text" name="sdt" required> <br> <br>
            Mật khẩu: <input id = "pass" type="password" name="pass" required> <br> <br> 
            @csrf
            <input type="checkbox" id="rememberCheckbox" name="remember"> Lưu mật khẩu
            <input type='submit' value='Đăng nhập'>
        </form>

        <div id="error-message" style="color: red;"></div>

        <a href="http://127.0.0.1:8000/forgot-password">Quên mật khẩu?</a>

    </body>
</html>
