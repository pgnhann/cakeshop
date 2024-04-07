<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

class product extends Controller
{

////////////////QUẢN LÝ LOẠI BÁNH//////////////////

function maintype()
    {
        $type = DB::select("SELECT * FROM category");
        return view('admin.product.maintype', compact("type"));
    }

function formaddtype()
    {
        $latestType = DB::table('category')->orderBy('malb', 'desc')->first();
        $nextTypeNumber = $latestType ? intval(substr($latestType->malb, 1)) + 1 : 1;
        $nextTypeID = "T" . str_pad($nextTypeNumber, 2, "0", STR_PAD_LEFT);
        
        return view('admin.product.addtype', compact("nextTypeID"));
    }

function addtype(Request $request)
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

        DB::table("category")->insert($data);

        return redirect()->route('type.main')->with('status', 'THÊM LOẠI BÁNH THÀNH CÔNG!');
    }

function formupdatetype($id)
    {
        $type = DB::table('category')
                    ->where('malb', $id)
                    ->first();
        return view('admin.product.updatetype', compact('type'));
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