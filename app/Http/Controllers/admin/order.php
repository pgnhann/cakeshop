<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

class order extends Controller
{

    function mainorder()
        {
            // $order = DB::select("SELECT * FROM `order`");
            // $order = DB::table('order')
            //         ->join('order_detail', 'order.madh', '=', 'order_detail.madh')
            //         ->select('order.*', 'order_detail.*');

            //     SELECT 
            //     o.Order_Id, 
            //     o.Cus_Phone, 
            //     o.Cus_Name, 
            //     o.Recipient_Name, 
            //     o.Recipient_Phone, 
            //     o.Recipient_Email, 
            //     CONCAT_WS(', ', o.Recipient_Address, o.Recipient_Ward, o.Recipient_District, o.Recipient_Province_City) AS Recipient_AddressR,
            //     o.Staff_Id, 
            //     o.Create_Date, 
            //     o.Payment_Code, 
            //     o.Note,
            //     GROUP_CONCAT(od.Pd_Name SEPARATOR ', ') AS Product_Names,
            //     SUM(od.Quantity) AS Total_Quantity,
            //     SUM(od.AfterPrm_Total) AS Total_Money
            // FROM 
            //     `order` o
            // JOIN 
            //     order_detail od ON o.Order_Id = od.Order_Id
            // GROUP BY 
            //     o.Order_Id

            $order = DB::select("SELECT a.*, b.*
                                FROM `order` a
                                JOIN order_detail b ON a.madh = b.madh");

            return view('admin.order.mainorder', compact("order"));
        }

    function formupdatetype($id)
        {
            $order = DB::table('order')
                        ->where('madh', $id)
                        ->first();
            return view('admin.order.mainorder', compact("order"));
        }

    function updatetype(Request $request)
        {
            $id = $request->input('idtype');
            $name = $request->input('nametype');
            $descr = $request->input('descrtype');
            $bonus = $request->input('bonus');
            $instru = $request->input('instru');
            
            $data = [
                "malb" => $id,
                "tenlb" => $name,
                "gioithieu" => $descr,
                "phukien" => $bonus,
                "baoquan" => $instru
            ];

            DB::table("category")->where("malb", $data["malb"])->update($data);

            return redirect()->route('type.main')->with('status', 'CẬP NHẬT THÀNH CÔNG!');
        }


    function deltype($id)
        {
            DB::table("category")->where("malb", $id)->delete();

            return redirect()->route('type.main')->with('status', 'XÓA THÀNH CÔNG!');
        }

    ///////////////////////QUẢN LÝ SẢN PHẨM///////////////////

    function mainpro(Request $request)
        {
            $filter = $request->query('filter', 'all');

            if ($filter === 'all') 
            {
                $pro = DB::select("SELECT * FROM product");
            } 
            else 
            {
                $pro = DB::select("SELECT * FROM product WHERE tenlb = ?", [$filter]);
            }
            
            return view('admin.product.mainpro', compact("pro", "filter"));
        }

    function formaddpro()
        {
            $latestProduct = DB::table('product')->orderBy('masp', 'desc')->first();
            $nextProductNumber = $latestProduct ? intval(substr($latestProduct->masp, 1)) + 1 : 1;
            $nextProductID = "P" . str_pad($nextProductNumber, 2, "0", STR_PAD_LEFT);

            return view('admin.product.addpro', compact("nextProductID"));
        }

    function addpro(Request $request)
        {
            $id = $request->input('idpro');
            $type = $request->input('typepro');
            $name = $request->input('namepro');
            $ingre = $request->input('ingrepro');
            $price = $request->input('pricepro');

            if ($request->hasFile('imgpro')) 
            {
                $image = $request->file('imgpro');
                $imgName = $image->getClientOriginalName();
                $image->storeAs('public/images', $imgName);
            } 
            else 
            {
                $imgPath = 'default/path/to/image.jpg';
            }

            $data = [
                'masp' => $id,
                'tenlb' => $type,
                'tensp' => $name,
                'nglieu' => $ingre,
                'giaban' => $price,
                'hinhanh' => $imgName,
            ];

            DB::table("product")->insert($data);

            return redirect()->route('product.main')->with('status', 'THÊM SẢN PHẨM THÀNH CÔNG!');
        
        }

    function formupdatepro($id)
        {
            $pro = DB::table('product')
                        ->where('masp', $id)
                        ->first();
            return view('admin.product.updatepro', compact('pro'));
        }

    function updatepro(Request $request)
        {
            $id = $request->input('idpro');
            $type = $request->input('typepro');
            $name = $request->input('namepro');
            $ingre = $request->input('ingrepro');
            $price = $request->input('pricepro');
            
            if ($request->hasFile('imgpro')) 
            {
                $image = $request->file('imgpro');
                $imgName = $image->getClientOriginalName();
                $image->storeAs('public/images', $imgName);
            } 
            else 
            {
                $imgName = $request->input('imgName');
            }
            
            $data = [
                'masp' => $id,
                'tenlb' => $type,
                'tensp' => $name,
                'nglieu' => $ingre,
                'giaban' => $price,
                'hinhanh' => $imgName,
            ];

            DB::table("product")->where("masp", $data["masp"])->update($data);
            
            return redirect()->route('product.main')->with('status', 'CẬP NHẬT THÀNH CÔNG!');
        }


    function delpro($id)
        {
            DB::table("product")->where("masp", $id)->delete();

            return redirect()->route('product.main')->with('status', 'XÓA THÀNH CÔNG!');
        }

}