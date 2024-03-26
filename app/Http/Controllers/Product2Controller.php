<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class Product2Controller extends Controller
{
    //
    public function index(){
       $data = DB::select("select * from product2");
       if(isNull($data)){
        return response()->json(["message" => "Không có data"]);
       }
       return response()->json([
        "data" => $data
       ]);
    }
}