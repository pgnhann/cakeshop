@extends ("admin.layouts.update_layout")

@section("title",'Atelier Cake')

@section("content")
<div class="card">
    <div class = "card-header">
        <h5> CẬP NHẬT KHUYẾN MÃI </h5>
        <span>
            <a href ="{{ route ('promotion.main') }}">
                <button class = "btn btn-viewcustomer"> <i class="fa-solid fa-rotate-left"></i></button>
            </a>
        </span>
    </div>

    <div class="card-body">
        <form action="{{ url('/quanly/khuyenmai/updated/' . $prom->Prm_Id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <center>
            <table class="updateprom-table">
                <tr>
                    <td class="label-updateprom"> <b>Mã khyến mãi:</b></td> 
                    <td>
                        <input type="text" name="idprom" value="{{ $prom -> Prm_Id }}">
                    </td>
                </tr>
                
                <tr>
                    <td class="label-updateprom"> <b>Tên khuyến mãi:</b></td> 
                    <td>
                        <input type="text" name="nameprom" value="{{ $prom-> Prm_Name }}">
                    </td>
                </tr>

                <tr>
                    <td class="label-updateprom"> <b>Mô tả:</b></td> 
                    <td>
                        <textarea name="descrprom">{{$prom->Prm_Desc}}</textarea>
                    </td>
                </tr>

                <tr>
                    <td class="label-updateprom"> <b>Điều kiện:</b></td> 
                    <td>
                        <textarea name="requireprom">{{$prom->dieukien}}</textarea>
                    </td>
                </tr>

                <tr>
                    <td class="label-updateprom"> <b>Ngày bắt đầu:</b></td> 
                    <td>
                        <input type="text" id="datestart" name="datestart" 
                            value ="{{ $prom -> Prm_StDate }}" pattern="\d{4}-\d{2}-\d{2}">
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
                    <td class="label-updateprom"> <b>Ngày kết thúc:</b></td> 
                    <td>
                        <input type="text" id="dateend" name="dateend" 
                            value ="{{ $prom -> Prm_EnDate }}" pattern="\d{4}-\d{2}-\d{2}">
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
                    <td class="label-updateprom"> <b>Trạng thái:</b></td> 
                    <td>
                        <select name="statusprom">
                            @if($prom->Prm_Status == "Chưa bắt đầu")
                                <option value="Chưa bắt đầu" selected>Chưa bắt đầu</option>
                                <option value="Đang diễn ra">Đang diễn ra</option>
                                <option value="Kết thúc">Kết thúc</option>
                            @elseif($prom->Prm_Status == "Đang diễn ra")
                                <option value="Chưa bắt đầu">Chưa bắt đầu</option>
                                <option value="Đang diễn ra" selected>Đang diễn ra</option>
                                <option value="Kết thúc">Kết thúc</option>
                            @else
                                <option value="Chưa bắt đầu">Chưa bắt đầu</option>
                                <option value="Đang diễn ra">Đang diễn ra</option>
                                <option value="Kết thúc" selected>Kết thúc</option>
                            @endif
                        </select>
                    </td>
                <tr>
            </table>
            </center>
                <div class = "prom-button-container">
                    <input type='button' value='HỦY' class="cancel-button" onclick="window.location.href='http://127.0.0.1:8000/quanly/khuyenmai'">
                    <input type='submit' value='CẬP NHẬT' class="agree-button">
                </div>
        </form>
    </div>
</div>
@endsection