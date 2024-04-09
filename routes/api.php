<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get_discounted_product_list', 'App\Http\Controllers\ProductController@discountedProducts');
Route::get('get_hot_sale_list','App\Http\Controllers\OrderController@Hotsale_Product');
Route::get('get_filter_list','App\Http\Controllers\OrderController@filter');
Route::get('get_pdf_file','App\Http\Controllers\OrderController@get_pdf_file');
Route::Get('sendOrder','App\Http\Controllers\OrderController@sendOrder');
Route::get("/test","App\Http\Controllers\Controller@test");
