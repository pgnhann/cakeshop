<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>XUẤT ĐƠN HÀNG - PDF </title>
    <style>
        /* Style the table */
        .table-export {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px; /* Add some bottom margin for readability */
        }

        /* Style the table header */
        .table-export th {
            background-color: #f2f2f2;
            border: 1px solid black;
            text-align: center;
            padding: 8px;
        }

        /* Style the table rows */
        .table-export td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
        }

        /* Style the button */
        .btn {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
<center>
    <h3> DANH SÁCH ĐƠN HÀNG </h3>
    <table class="table-export">
        <thead>
        <tr style="vertical-align: middle;">
            <th>Mã đơn hàng</th>
            <th>Mã nhân viên</th>
            <th>Số điện thoại</th>
            <th>Tên khách hàng</th>
            <th>Số điện thoại người nhận</th>
            <th>Email người nhận</th>
            <th>Tên người nhận</th>
            <th>Địa chỉ</th>
            <th>Thời gian đặt</th>
            <th>Thời gian giao</th>
            <th>Phương thức thanh toán</th>
            <th>Ghi chú</th>
            <th>Tổng tiền</th>
        </tr>
        </thead>
        <tbody>
        @foreach($o_datanew as $row)
            <tr>
                <td>{{$row->Order_Id}}</td>
                <td>{{$row->Staff_Id}}</td>
                <td>{{$row->Cus_Phone}}</td>
                <td>{{$row->Cus_Name}}</td>
                <td>{{$row->Recipient_Phone}}</td>
                <td>{{$row->Recipient_Email}}</td>
                <td>{{$row->Recipient_Name}}</td>
                <td>{{$row->Recipient_AddressR}}</td>
                <td>{{$row->Create_Date}}</td>
                <td>NULL</td>
                <td>{{$row->Payment_Code}}</td>
                <td>{{$row->Note}}</td>
                <td>{{$row->Total_Money}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="page-break"></div>
    
    <h3> DANH SÁCH ĐƠN HÀNG CHI TIẾT </h3>
    <table class="table-export">
        <thead>
        <tr style="vertical-align: middle;">
            <th>Mã đơn hàng</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Mã khuyến mãi</th>
            <th>% khuyến mãi</th>
            <th>Giá gốc</th>
            <th>Giá sau giảm giá</th>
            <th>Tổng tiền sau giảm giá</th>
        </tr>
        </thead>
        <tbody>
        @foreach($od_data as $row)
            <tr>
                <td>{{$row->Order_Id}}</td>
                <td>{{$row->Pd_Name}}</td>
                <td>{{$row->Quantity}}</td>
                <td>{{$row->Prm_Id}}</td>
                <td>{{$row->Prm_Disc}}</td>
                <td>{{$row->Org_Price_P}}</td>
                <td>{{$row->AfterPrm_Price_P}}</td>
                <td>{{$row->AfterPrm_Total}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <br>
    <a href="{{ route ('order.export') }}">
        <button class="btn"> Xuất PDF </button>
    </a>
</center>
</body>
</html>
