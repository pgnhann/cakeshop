<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Promotion;

class ProductController extends Controller
{
    public function discountedProducts()
    {
        $promotions = Promotion::where('Prm_StDate', '<=', now())
            ->where('Prm_EnDate', '>=', now())
            ->get();

        $discountedProducts = Product::whereIn('Pd_Id', $promotions->pluck('Prm_Related'))->get();

        $discountedProductsInfo = [];
        foreach ($discountedProducts as $product) {
            $matchingPromotions = $promotions->whereIn('Prm_Related', $product->Pd_Id); 
            $promotionCodes = [];

            foreach ($matchingPromotions as $promotion) {
                $promotionCodes[] = [
                    'Prm_Name' => $promotion->Prm_Desc,
                    'Prm_Disc' => $promotion->Prm_Disc,
                ];
            }

            $productinfo = [
                'Pd_Id' => $product->Pd_Id,
                'Pd_Category' => $product->Pd_Category,
                'Pd_Name' => $product->Pd_Name,
                'Pd_Material' => $product->Pd_Material,
                'Pd_Price' => $product->Pd_Price,
                'promotionCodes' => $promotionCodes,
            ];

            $discountedProductsInfo[] = $productinfo;
        }

        return response()->json($discountedProductsInfo);
    }
    
    
}
