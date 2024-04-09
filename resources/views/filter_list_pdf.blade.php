<!doctype html>

    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Đơn hàng</title>
    </head>
    <body>


    <style>
    /*css*/
    </style>
    <br>
    <h1>Danh sách đơn hàng</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Khách hàng</th>
                <th>Ngày tạo</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->Order_Id }}</td> 
                    <td>{{ $order->Cus_Phone }}</td>
                    <td>{{ $order->Create_Date }}</td>
                    <td>{{ $order->Total }}</td>
                    <td>{{ $order->status }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
     </body>
    </html>