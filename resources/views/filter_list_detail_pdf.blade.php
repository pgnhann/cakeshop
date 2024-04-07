<!doctype html>

    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Đơn hàng chi tiết</title>
    </head>
    <body>


    <style>
        table, th, td {
            border:1px solid black;
        }
        tr{
            min-width: 300px;
            max-width: fit-content;
        }
        th{
            min-width: none;
            max-width: fit-content;
        }
        table{
            margin: auto;
            width: 100%;
        }
        td{
            width:10%;
        }
    </style>
    
    <h1 style="text-align: center;">Đơn hàng</h1>
    <table>
        <thread>
            <tr>
                <th>Order  Id</th>
                <th>Cus  Phone</th>
                <th>Cus Name</th>
                <th>Staff Id</th>
                <th>Recipient Name</th>
                <th>Recipient Phone</th>
                <th>Total</th>
                <th>Create Date</th>
                <th>Is Paid</th>
                <th>Is Delivered</th>
            </tr>
        </thread>
        <tbody>
            @foreach ($detailed_orders as $combined_order)
                <tr>
                    <td>{{ $combined_order['order']->Order_Id  }}</td> 
                    <td>{{ $combined_order['order']->Cus_Phone }}</td>
                    <td>{{ $combined_order['order']->Cus_Name }}</td>
                    <td>{{ $combined_order['order']->Staff_Id }}</td>
                    <td>{{ $combined_order['order']->Recipient_Name }}</td>
                    <td>{{ $combined_order['order']->Recipient_Phone }}</td>
                    <td>{{ $combined_order['order']->Total }}</td>
                    <td>{{ $combined_order['order']->Create_Date }}</td>
                    <td>{{ $combined_order['order']->Is_Paid }}</td>
                    <td>{{ $combined_order['order']->Is_Delivered }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br><br>
    <h1 style="text-align: center;">Chi tiết đơn hàng</h1>
    <table>
        <thread>
            <tr>
                <th>Order detail id</th>
                <th>Order Id</th>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Promote Id</th>
                <th>Promote Discount</th>
                <th>Orginal Price/ Product</th>
                <th>After Promote Price/ Product</th>
                <th>After Promote Total</th>
                
            </tr>
        </thread>
        <tbody>
            @foreach ($detailed_orders as $combined_order)
                @foreach ($combined_order['order_details'] as $detail)
                    <tr>
                        <td>{{ $detail->Order_detail_id }}</td> 
                        <td>{{ $detail->Order_Id }}</td>
                        <td>{{ $detail->Pd_Id }}</td>
                        <td>{{ $detail->Pd_Name}}</td>
                        <td>{{ $detail->Quantity }}</td>
                        <td>{{ $detail->Prm_Id }}</td>
                        <td>{{ $detail->Prm_Disc }}</td>
                        <td>{{ $detail->Org_Price_P }}</td>
                        <td>{{ $detail->AfterPrm_Price_P }}</td>
                        <td>{{ $detail->AfterPrm_Total }}</td>
                        
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>




     </body>
    </html>