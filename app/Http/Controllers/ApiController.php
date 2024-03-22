<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;


class ApiController extends Controller
{
    public function discountedProducts()
    {
        $products = Product::where('giaban', '>', 50000)->get();
        return response()->json($products);
    }
}
