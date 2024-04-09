<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;

class OrderExport extends Controller
{
    function preexport()
        {
            $o_data = DB::select("SELECT o.Order_Id, o.Cus_Phone, o.Cus_Name, o.Recipient_Name, o.Recipient_Phone, o.Recipient_Email, 
                                        CONCAT_WS(', ', o.Recipient_Address, o.Recipient_Ward, o.Recipient_District, o.Recipient_Province_City) AS Recipient_AddressR, 
                                        o.Staff_Id, o.Create_Date, o.Payment_Code, o.Note, o.Is_Paid, o.Is_Delivered,
                                        SUM(od.AfterPrm_Total) AS Total_Money 
                                        FROM `order` o 
                                        JOIN order_detail od ON o.Order_Id = od.Order_Id 
                                        GROUP BY o.Order_Id, o.Cus_Phone, o.Cus_Name, o.Recipient_Name, o.Recipient_Phone, o.Recipient_Email, 
                                        o.Recipient_Address, o.Recipient_Ward, o.Recipient_District, o.Recipient_Province_City, o.Staff_Id, 
                                        o.Create_Date, o.Payment_Code, o.Note, o.Is_Paid, o.Is_Delivered");
            
            $od_data = DB::select("SELECT * FROM order_detail");
            
            return view('preexport', compact("o_data", "od_data"));
        }

    function exportpdf()
        {
            $o_data = DB::select("SELECT o.Order_Id, o.Cus_Phone, o.Cus_Name, o.Recipient_Name, o.Recipient_Phone, o.Recipient_Email, 
                                        CONCAT_WS(', ', o.Recipient_Address, o.Recipient_Ward, o.Recipient_District, o.Recipient_Province_City) AS Recipient_AddressR, 
                                        o.Staff_Id, o.Create_Date, o.Payment_Code, o.Note, o.Is_Paid, o.Is_Delivered,
                                        SUM(od.AfterPrm_Total) AS Total_Money 
                                        FROM `order` o 
                                        JOIN order_detail od ON o.Order_Id = od.Order_Id 
                                        GROUP BY o.Order_Id, o.Cus_Phone, o.Cus_Name, o.Recipient_Name, o.Recipient_Phone, o.Recipient_Email, 
                                        o.Recipient_Address, o.Recipient_Ward, o.Recipient_District, o.Recipient_Province_City, o.Staff_Id, 
                                        o.Create_Date, o.Payment_Code, o.Note, o.Is_Paid, o.Is_Delivered");
            
            $od_data = DB::select("SELECT * FROM order_detail");
            
            $pdf = PDF::loadView('preexport', compact('o_data', 'od_data'));
            return $pdf->download('listorder.pdf');
        }
}