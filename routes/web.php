<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/quanly/trangchu','App\Http\Controllers\admin\main@index')->name('admin.index');

Route::get('/quanly/dangxuat','App\Http\Controllers\admin\main@logout')->name('admin.logout');

Route::get('/quanly/caidat','App\Http\Controllers\admin\main@setting')->name('admin.setting');
Route::post('/quanly/caidat/capnhat','App\Http\Controllers\admin\main@saveinfo') ->name('save.info');


//QUẢN LÝ TÀI KHOẢN
Route::get('/quanly/taikhoan','App\Http\Controllers\admin\account@main')->name('account.main');
Route::get('/quanly/khachhang','App\Http\Controllers\admin\account@customer')->name('account.customer');


//QUẢN LÝ LOẠI BÁNH
Route::get('/quanly/loaibanh','App\Http\Controllers\admin\product@maintype')->name('type.main');


//QUẢN LÝ SẢN PHẨM 
Route::get('/quanly/sanpham','App\Http\Controllers\admin\product@mainpro') ->name('product.main');


//QUẢN LÝ ĐƠN HÀNG
Route::get('/quanly/donhang','App\Http\Controllers\admin\order@mainorder') ->name('order.main');
Route::get('/quanly/donhang/chitiet','App\Http\Controllers\admin\order@mainorder') ->name('order.viewdetail');

Route::post('/quanly/donhang/updated/{id}','App\Http\Controllers\admin\order@updateorder');
Route::delete('/quanly/donhang/delete/{id}','App\Http\Controllers\admin\order@delorder');

Route::get('/quanly/donhang/preexport','App\Http\Controllers\admin\order@preexport') ->name('order.preexport');
Route::get('/quanly/donhang/export','App\Http\Controllers\admin\order@exportpdf') ->name('order.export');


///QUẢN LÝ GIỚI THIỆU
Route::get('/quanly/gioithieu','App\Http\Controllers\admin\others@mainabus')->name('abus.main');


///QUẢN LÝ KHUYẾN MÃI
Route::get('/quanly/khuyenmai','App\Http\Controllers\admin\others@mainprom')->name('promotion.main');


///QUẢN LÝ BLOG
Route::get('/quanly/blog','App\Http\Controllers\admin\others@mainblog')->name('blog.main');

