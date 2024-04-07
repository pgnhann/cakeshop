<?php

use App\Http\Controllers\Product2Controller;
use App\Http\Controllers\Promotion2Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/vidu1","App\Http\Controllers\ViDuController@vidu");
Route::get("/qlsach/theloai","App\Http\Controllers\BookController@laythongtintheloai");
Route::get("/qlsach/thongtinsach","App\Http\Controllers\BookController@laythongtinsach");

Route::get("/pgnhann","App\Http\Controllers\BookController@pgnhann");

// Route::get("/test","App\Http\Controllers\Controller@test");

Route::get("/san-pham", [
    Product2Controller::class,"index"
]);

Route::get("/khuyen-mai/insert", [
    Promotion2Controller::class,"insertdata"
]);

