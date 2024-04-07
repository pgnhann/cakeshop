@extends ("admin.layouts.add_layout")

@section("title",'Atelier Cake')

@section("content")
<div class="card">
    <div class = "card-header">
        <h5> THÊM KHUYẾN MÃI </h5>
        <span>
            <a href ="{{ route ('promotion.main') }}">
                <button class = "btn btn-viewcustomer"> <i class="fa-solid fa-rotate-left"></i></button>
            </a>
        </span>
    </div>

    <div class="card-body">
        <form id="addpromform" action="{{route ('promotion.added')}}" method = "post" enctype="multipart/form-data">
            <center>
            <table class="addprom-table">
                <tr>
                    <td class="label-addprom"> <b>Mã khuyến mãi:</b></td> 
                    <td>
                        <input type="text" name="idprom"  value="{{ $nextPromotionID }}" readonly>
                    </td>
                <tr>
                
                <tr>
                    <td class="label-addprom"> <b>Tên khuyến mãi:</b></td> 
                    <td><input type="text" name="nameprom"></td>
                <tr>

                <tr>
                    <td class="label-addprom"> <b>Mô tả: </b></td> 
                    <td>
                        <textarea name="descrprom"></textarea>
                    </td>
                </tr>
                
                <tr>
                    <td class="label-addprom"> <b>Điều kiện:</b></td> 
                    <td>
                        <textarea name="requireprom"></textarea>
                    </td>
                </tr>

                <tr>
                    <td class="label-addprom"> <b>Ngày bắt đầu:</b></td> 
                    <td>
                        <input type="text" id="datestart" name="datestart" pattern="\d{4}-\d{2}-\d{2}">
                        <script>
                            $(function() {
                                $("#datestart").datepicker({
                                    dateFormat: "yy-mm-dd",
                                    changeYear: true,
                                    yearRange: "-100:+0"
                                });
                            });
                        </script>
                    </td>
                <tr>

                <tr>
                    <td class="label-addprom"> <b>Ngày kết thúc:</b></td> 
                    <td>
                        <input type="text" id="dateend" name="dateend" pattern="\d{4}-\d{2}-\d{2}">
                        <script>
                            $(function() {
                                $("#dateend").datepicker({
                                    dateFormat: "yy-mm-dd",
                                    changeYear: true,
                                    yearRange: "-100:+0"
                                });
                            });
                        </script>
                    </td>
                <tr>

                <tr>
                    <td class="label-addprom"> <b>Trạng thái:</b></td> 
                    <td>
                    <select name="statusprom" required>
                        <option value=""disabled selected></option>
                        <option value="Chưa bắt đầu">Chưa bắt đầu</option>
                        <option value="Đang diễn ra">Đang diễn ra</option>
                    </select>
                    </td>
                <tr>
            </table>
            </center>
                <div class = "prom-button-container">
                    <input type='button' value='HỦY' class="cancel-button" onclick="window.location.href='http://127.0.0.1:8000/quanly/khuyenmai'">
                    <input type='submit' value='THÊM' class="agree-button" onclick="return validateForm()">
                </div>
            {{ csrf_field() }}
        </form>
    </div>
</div>

    <script>
        function validateForm() 
        {
            var id = document.forms["addpromform"]["idprom"].value;
            var name = document.forms["addpromform"]["nameprom"].value;
            var descr = document.forms["addpromform"]["descrprom"].value;
            var condition = document.forms["addpromform"]["requireprom"].value;
            var start = document.forms["addpromform"]["datestart"].value;
            var end = document.forms["addpromform"]["dateend"].value;
            var status = document.forms["addpromform"]["statusprom"].value;

            if (end < start) 
            {
                alert("Ngày kết thúc phải là ngày sau hoặc cùng ngày với ngày bắt đầu!");
                return false;
            }

            if (id == "" || name == "" || descr == "" || condition == "" || start == "" || end == "" || status == "") {
                alert("Vui lòng điền đầy đủ thông tin!");
                return false;
            }
        }
    </script>
@endsection