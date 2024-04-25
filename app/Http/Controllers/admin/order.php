<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

use PDF;

class order extends Controller
{

    function mainorder(Request $request)
    {
        $filter = $request->input('filter');
        session(['filter' => $filter]);
        
        $query = "SELECT o.Order_Id, o.Cus_Phone, o.Cus_Name, o.Recipient_Name, o.Recipient_Phone, o.Recipient_Email, 
                            CONCAT_WS(', ', o.Recipient_Address, o.Recipient_Ward, o.Recipient_District, o.Recipient_Province_City) AS Recipient_AddressR, 
                            o.Staff_Id, o.Create_Date, o.Payment_Code, o.Note, o.Is_Paid, o.Is_Delivered, 
                            GROUP_CONCAT(od.Pd_Name SEPARATOR ', ') AS Product_Names,
                            SUM(od.Quantity) AS Total_Quantity,
                            MAX(CONCAT(od.Prm_Disc, ' (', od.Pd_Name, ')')) AS Pro_Discount,
                            SUM(od.AfterPrm_Total) AS Total_Money 
                    FROM `order` o 
                    JOIN order_detail od ON o.Order_Id = od.Order_Id";

        if ($filter == 'Tất cả') { }
        elseif ($filter == 'Chưa thanh toán') { $query .= " WHERE o.Is_Paid = 'Chưa thanh toán'"; }
        elseif ($filter == 'Thành công') { $query .= " WHERE o.Is_Delivered = 'Thành công'"; } 
        elseif ($filter == 'Đã thanh toán') { $query .= " WHERE o.Is_Paid = 'Đã thanh toán'"; }

        $query .= " GROUP BY o.Order_Id, o.Cus_Phone, o.Cus_Name, o.Recipient_Name, o.Recipient_Phone, o.Recipient_Email, 
                            o.Recipient_Address, o.Recipient_Ward, o.Recipient_District, o.Recipient_Province_City, o.Staff_Id, 
                            o.Create_Date, o.Payment_Code, o.Note, o.Is_Paid, o.Is_Delivered";

        $order = DB::select($query);

        return view('admin.order.mainorder', compact("order"));
    }

    function updateorder(Request $request)
        {
            $orderId = $request->input('orderid');
            $isPaid = 'Chưa thanh toán';
            $isDelivered = 'Chưa giao hàng';
            
            if ($request->has('checkpayment')) { $isPaid = 'Đã thanh toán'; }
            
            if ($request->has('checkdeliver')) { $isDelivered = 'Thành công'; }
            
            DB::table("order")
                ->where("Order_Id", $orderId)
                ->update([
                    "Is_Paid" => $isPaid,
                    "Is_Delivered" => $isDelivered
                ]);
        
            return redirect()->route('order.main')->with('status', 'CẬP NHẬT TRẠNG THÁI ĐƠN HÀNG THÀNH CÔNG!');
        }
    
    function delorder($id)
        {
            DB::table("order_detail")->where("Order_Id", $id)->delete();
            DB::table("order")->where("Order_Id", $id)->delete();

            return redirect()->route('order.main')->with('status', 'XÓA THÀNH CÔNG!');
        }

    function preexport(Request $request)
        {        
            $filter = session('filter');

            $o_data = "SELECT o.Order_Id, o.Cus_Phone, o.Cus_Name, o.Recipient_Name, o.Recipient_Phone, o.Recipient_Email, 
                                CONCAT_WS(', ', o.Recipient_Address, o.Recipient_Ward, o.Recipient_District, o.Recipient_Province_City) AS Recipient_AddressR, 
                                o.Staff_Id, o.Create_Date, o.Payment_Code, o.Note, o.Is_Paid, o.Is_Delivered, 
                                GROUP_CONCAT(od.Pd_Name SEPARATOR ', ') AS Product_Names,
                                SUM(od.Quantity) AS Total_Quantity,
                                MAX(CONCAT(od.Prm_Disc, ' (', od.Pd_Name, ')')) AS Pro_Discount,
                                SUM(od.AfterPrm_Total) AS Total_Money 
                        FROM `order` o 
                        JOIN order_detail od ON o.Order_Id = od.Order_Id";
        
            if ($filter == 'Tất cả') { }
            elseif ($filter == 'Chưa thanh toán') { $o_data .= " WHERE o.Is_Paid = 'Chưa thanh toán'"; }
            elseif ($filter == 'Thành công') { $o_data .= " WHERE o.Is_Delivered = 'Thành công'"; } 
            elseif ($filter == 'Đã thanh toán') { $o_data .= " WHERE o.Is_Paid = 'Đã thanh toán'"; }
        
            $o_data .= " GROUP BY o.Order_Id, o.Cus_Phone, o.Cus_Name, o.Recipient_Name, o.Recipient_Phone, o.Recipient_Email, 
                                o.Recipient_Address, o.Recipient_Ward, o.Recipient_District, o.Recipient_Province_City, o.Staff_Id, 
                                o.Create_Date, o.Payment_Code, o.Note, o.Is_Paid, o.Is_Delivered";
        
            $o_datanew = DB::select($o_data);
        
            $orderIds = collect($o_datanew)->pluck('Order_Id')->toArray();
            $od_data = DB::table('order_detail')->whereIn('Order_Id', $orderIds)->get();
        
            return view('admin.order.preexport', compact('o_datanew', 'od_data'));
        }
        

        function exportpdf(Request $request)
        {
            $filter = session('filter');

            $o_data = "SELECT o.Order_Id, o.Cus_Phone, o.Cus_Name, o.Recipient_Name, o.Recipient_Phone, o.Recipient_Email, 
                                CONCAT_WS(', ', o.Recipient_Address, o.Recipient_Ward, o.Recipient_District, o.Recipient_Province_City) AS Recipient_AddressR, 
                                o.Staff_Id, o.Create_Date, o.Payment_Code, o.Note, o.Is_Paid, o.Is_Delivered, 
                                GROUP_CONCAT(od.Pd_Name SEPARATOR ', ') AS Product_Names,
                                SUM(od.Quantity) AS Total_Quantity,
                                MAX(CONCAT(od.Prm_Disc, ' (', od.Pd_Name, ')')) AS Pro_Discount,
                                SUM(od.AfterPrm_Total) AS Total_Money 
                        FROM `order` o 
                        JOIN order_detail od ON o.Order_Id = od.Order_Id";
        
            if ($filter == 'Tất cả') { }
            elseif ($filter == 'Chưa thanh toán') { $o_data .= " WHERE o.Is_Paid = 'Chưa thanh toán'"; }
            elseif ($filter == 'Thành công') { $o_data .= " WHERE o.Is_Delivered = 'Thành công'"; } 
            elseif ($filter == 'Đã thanh toán') { $o_data .= " WHERE o.Is_Paid = 'Đã thanh toán'"; }
        
            $o_data .= " GROUP BY o.Order_Id, o.Cus_Phone, o.Cus_Name, o.Recipient_Name, o.Recipient_Phone, o.Recipient_Email, 
                                o.Recipient_Address, o.Recipient_Ward, o.Recipient_District, o.Recipient_Province_City, o.Staff_Id, 
                                o.Create_Date, o.Payment_Code, o.Note, o.Is_Paid, o.Is_Delivered";
        
            $o_datanew = DB::select($o_data);
        
            $orderIds = collect($o_datanew)->pluck('Order_Id')->toArray();
            $od_data = DB::table('order_detail')->whereIn('Order_Id', $orderIds)->get();
        
            $pdf = PDF::loadView('admin.order.preexport', compact('o_datanew', 'od_data'));
            return $pdf->download('listorder.pdf');
        }
}