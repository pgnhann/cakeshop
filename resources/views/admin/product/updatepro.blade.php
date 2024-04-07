@extends ("admin.layouts.update_layout")

@section("title",'Atelier Cake')

@section("content")
<div class="card">
    <div class = "card-header">
        <h5> CẬP NHẬT SẢN PHẨM </h5>
        <span>
            <a href ="{{ route ('product.main') }}">
                <button class = "btn btn-viewuser"> <i class="fa-solid fa-rotate-left"></i></button>
            </a>
        </span>
    </div>

    <div class="card-body">
        <form action="{{ url('/quanly/sanpham/updated/' . $pro->masp) }}" method="post" enctype="multipart/form-data">
            @csrf
            <center>
            <table class="updatepro-table">
                <tr>
                    <td class="label-updatepro"> <b>Mã bánh:</b></td> 
                    <td>
                        <input type="text" name="idpro" value="{{ $pro-> masp }}">
                    </td>
                <tr>
                
                <tr>
                    <td class="label-updatepro"> <b>Loại bánh:</b></td> 
                    <td>
                        <select name="typepro">
                            @if($pro->tenlb == "Bánh kem")
                                <option value="Bánh kem" selected>Bánh kem</option>
                                <option value="Tiramisu">Tiramisu</option>
                                <option value="Entremet">Entremet</option>
                                <option value="Bánh ngọt">Bánh ngọt</option>
                            @elseif($pro->tenlb == "Tiramisu")
                                <option value="Bánh kem">Bánh kem</option>
                                <option value="Tiramisu" selected>Tiramisu</option>
                                <option value="Entremet">Entremet</option>
                                <option value="Bánh ngọt">Bánh ngọt</option>
                            @elseif($pro->tenlb == "Entremet")
                                <option value="Bánh kem">Bánh kem</option>
                                <option value="Tiramisu">Tiramisu</option>
                                <option value="Entremet" selected>Entremet</option>
                                <option value="Bánh ngọt">Bánh ngọt</option>
                            @else
                                <option value="Bánh kem">Bánh kem</option>
                                <option value="Tiramisu">Tiramisu</option>
                                <option value="Entremet">Entremet</option>
                                <option value="Bánh ngọt" selected>Bánh ngọt</option>
                            @endif
                        </select>
                    </td>
                <tr>

                <tr>
                    <td class="label-updatepro"> <b>Tên bánh:</b></td> 
                    <td>
                        <input type="text" name="namepro" value="{{ $pro-> tensp }}">
                    </td>
                <tr>

                <tr>
                    <td class="label-updatepro"> <b>Nguyên liệu:</b></td> 
                    <td>
                        <input type="text" name="ingrepro" value="{{ $pro-> nglieu }}">
                    </td>
                <tr>

                <tr>
                    <td class="label-updatepro"> <b>Giá bán:</b></td> 
                    <td>
                        <input type="text" name="pricepro" value="{{ $pro-> giaban }}">
                    </td>
                <tr>

                <tr>
                    <td class="label-updatepro"> <b>Hình ảnh:</b></td> 
                    <td>
                        <div class ="updateimg-container">
                            <img id="oldImage" src="{{asset('storage/images/'.$pro->hinhanh)}}" alt="img">
                            <img id="preview" src="#" alt="Preview" style="max-width: 180px; max-height: 180px; display: none;">
                            <input type="hidden" id="imgName" name="imgName" value="{{ $pro->hinhanh }}">
                            <input type="file" id ="img" name="imgpro" accept="image/*" class="img-input" onchange="previewImage(event)">
                        </div>
                    </td>
                <tr>
            </table>
            </center>
                <div class = "type-button-container">
                    <input type='button' value='HỦY' class="cancel-button" onclick="window.location.href='http://127.0.0.1:8000/quanly/sanpham'">
                    <input type='submit' value='CẬP NHẬT' class="agree-button">
                </div>
        </form>
    </div>
</div>

    <script>
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function(){
                var imgElement = document.getElementById('preview');
                var oldImgElement = document.getElementById('oldImage');
                imgElement.src = reader.result;
                imgElement.style.display = 'block';
                oldImgElement.style.display = 'none';
            };

            reader.readAsDataURL(input.files[0]);
        }
    </script>
@endsection