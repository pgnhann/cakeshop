@extends ("admin.layouts.add_layout")

@section("title",'Atelier Cake')

@section("content")
<div class="card">
    <div class = "card-header">
        <h5> THÊM SẢN PHẨM </h5>
        <span>
            <a href ="{{ route ('product.main') }}">
                <button class = "btn btn-viewuser"> <i class="fa-solid fa-rotate-left"></i></button>
            </a>
        </span>
    </div>

    <div class="card-body">
        <form id="addproform" action="{{route ('product.added')}}" method = "post" enctype="multipart/form-data">
            <center>
            <table class="addpro-table">
                <tr>
                    <td class="label-addpro"> <b>Mã bánh:</b></td> 
                    <td><input type="text" name="idpro"  value="{{ $nextProductID }}" readonly></td>
                <tr>

                <tr>
                    <td class="label-addpro"> <b>Loại bánh:</b></td> 
                    <td>
                    <select name="typepro" required>
                        <option value=""disabled selected></option>
                        <option value="Bánh kem">Bánh kem</option>
                        <option value="Tiramisu">Tiramisu</option>
                        <option value="Entremet">Entremet</option>
                        <option value="Bánh ngọt">Bánh ngọt</option>
                    </select>
                    </td>
                <tr>

                <tr>
                    <td class="label-addpro"> <b>Tên bánh:</b></td> 
                    <td><input type="text" name="namepro"></td>
                <tr>

                <tr>
                    <td class="label-addpro"> <b>Nguyên liệu:</b></td> 
                    <td><input type="text" name="ingrepro"></td>
                <tr>
                
                <tr>
                    <td class="label-addpro"> <b>Giá bán:</b></td> 
                    <td>
                        <input type="text" name="pricepro" pattern="[0-9]+(\.[0-9]{1,2})?">
                    </td>
                <tr>

                <tr>
                    <td class="label-addpro"> <b>Hình ảnh:</b></td> 
                    <td>
                        <div class ="uploadimg-container">
                            <img id="preview" src="#" alt="Preview" style="max-width: 180px; max-height: 180px; display: none;">
                            <input type="file" id="img" name="imgpro" accept="image/*" onchange="previewImage(event)">
                        </div>
                    </td>
                <tr>        
            </table>
            </center>
                <div class = "pro-button-container">
                    <input type='button' value='HỦY' class="cancel-button" onclick="window.location.href='http://127.0.0.1:8000/quanly/sanpham'">
                    <input type='submit' value='THÊM' class="agree-button" onclick="return validateForm()">
                </div>
            {{ csrf_field() }}
        </form>
    </div>
</div>

    <script>
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function(){
                var imgElement = document.getElementById('preview');
                imgElement.src = reader.result;
                imgElement.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>

    <script>
        function validateForm() {
            var type = document.forms["addproform"]["typepro"].value;
            var id = document.forms["addproform"]["idpro"].value;
            var name = document.forms["addproform"]["namepro"].value;
            var ingre = document.forms["addproform"]["ingrepro"].value;
            var price = document.forms["addproform"]["pricepro"].value;
            var img = document.forms["addproform"]["img"].value;

            if (type == "" || id == "" || name == "" || ingre == "" || price == "" || img == "") {
                alert("Vui lòng điền đầy đủ thông tin!");
                return false;
            }
        }
    </script>
@endsection