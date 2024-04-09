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

// Route::get('/trangchu', function () {
//     return view('admin.index');
// })->middleware(['auth'])->name('admin.index');

require __DIR__.'/auth.php';

Route::get('/quanly/trangchu','App\Http\Controllers\admin\main@index')->name('admin.index');

Route::get('/quanly/dangxuat','App\Http\Controllers\admin\main@logout')->name('admin.logout');

Route::get('/quanly/caidat','App\Http\Controllers\admin\main@setting')->name('admin.setting');
Route::post('/quanly/caidat/capnhat','App\Http\Controllers\admin\main@saveinfo') ->name('save.info');


//QUẢN LÝ TÀI KHOẢN
Route::get('/quanly/taikhoan','App\Http\Controllers\admin\account@main')->name('account.main');
Route::get('/quanly/khachhang','App\Http\Controllers\admin\account@customer')->name('account.customer');

Route::get('/quanly/nhvien/add','App\Http\Controllers\admin\account@formaddstaff')->name('account.add');
Route::post('/quanly/nhvien/added','App\Http\Controllers\admin\account@addstaff')->name('account.added');

Route::get('/quanly/nhvien/update/{sdt}','App\Http\Controllers\admin\account@formupdatestaff');
Route::post('/quanly/nhvien/updated/{sdt}','App\Http\Controllers\admin\account@updatestaff');

Route::post('/quanly/nhvien/capquyen/{sdt}','App\Http\Controllers\admin\account@giverole') -> name('account.giverole');

Route::delete('/quanly/nhvien/delete/{sdt}','App\Http\Controllers\admin\account@delstaff');


//QUẢN LÝ LOẠI BÁNH
Route::get('/quanly/loaibanh','App\Http\Controllers\admin\product@maintype')->name('type.main');

Route::get('/quanly/loaibanh/add','App\Http\Controllers\admin\product@formaddtype')->name('type.add');
Route::post('/quanly/loaibanh/added','App\Http\Controllers\admin\product@addtype')->name('type.added');

Route::get('/quanly/loaibanh/update/{id}','App\Http\Controllers\admin\product@formupdatetype');
Route::post('/quanly/loaibanh/updated/{id}','App\Http\Controllers\admin\product@updatetype');

Route::delete('/quanly/loaibanh/delete/{id}','App\Http\Controllers\admin\product@deltype');


//QUẢN LÝ SẢN PHẨM 
Route::get('/quanly/sanpham','App\Http\Controllers\admin\product@mainpro') ->name('product.main');

Route::get('/quanly/sanpham/add','App\Http\Controllers\admin\product@formaddpro')->name('product.add');
Route::post('/quanly/sanpham/added','App\Http\Controllers\admin\product@addpro')->name('product.added');

Route::get('/quanly/sanpham/update/{id}','App\Http\Controllers\admin\product@formupdatepro');
Route::post('/quanly/sanpham/updated/{id}','App\Http\Controllers\admin\product@updatepro');

Route::delete('/quanly/sanpham/delete/{id}','App\Http\Controllers\admin\product@delpro');


//QUẢN LÝ ĐƠN HÀNG
Route::get('/quanly/donhang','App\Http\Controllers\admin\order@mainorder') ->name('order.main');
Route::get('/quanly/donhang/chitiet','App\Http\Controllers\admin\order@mainorder') ->name('order.viewdetail');

Route::post('/quanly/donhang/updated/{id}','App\Http\Controllers\admin\order@updateorder');

Route::delete('/quanly/donhang/delete/{id}','App\Http\Controllers\admin\order@delorder');

Route::get('/quanly/donhang/preexport','App\Http\Controllers\admin\order@preexport') ->name('order.preexport');
Route::get('/quanly/donhang/export','App\Http\Controllers\admin\order@exportpdf') ->name('order.export');


///QUẢN LÝ GIỚI THIỆU
Route::get('/quanly/gioithieu','App\Http\Controllers\admin\others@mainabus')->name('abus.main');

Route::get('/quanly/gioithieu/add','App\Http\Controllers\admin\others@formaddabus')->name('abus.add');
Route::post('/quanly/gioithieu/added','App\Http\Controllers\admin\others@addabus')->name('abus.added');

Route::post('/quanly/gioithieu/updated/{id}','App\Http\Controllers\admin\others@updateabus');

Route::delete('/quanly/gioithieu/delete/{id}','App\Http\Controllers\admin\others@delabus');


///QUẢN LÝ KHUYẾN MÃI
Route::get('/quanly/khuyenmai','App\Http\Controllers\admin\others@mainprom')->name('promotion.main');

Route::get('/quanly/khuyenmai/add','App\Http\Controllers\admin\others@formaddprom')->name('promotion.add');
Route::post('/quanly/khuyenmai/added','App\Http\Controllers\admin\others@addprom')->name('promotion.added');

Route::get('/quanly/khuyenmai/update/{id}','App\Http\Controllers\admin\others@formupdateprom');
Route::post('/quanly/khuyenmai/updated/{id}','App\Http\Controllers\admin\others@updateprom');

Route::delete('/quanly/khuyenmai/delete/{id}','App\Http\Controllers\admin\others@delprom');


///QUẢN LÝ BLOG
Route::get('/quanly/blog','App\Http\Controllers\admin\others@mainblog')->name('blog.main');

Route::get('/quanly/blog/add','App\Http\Controllers\admin\others@formaddblog')->name('blog.add');
Route::post('/quanly/blog/added','App\Http\Controllers\admin\others@addblog')->name('blog.added');

Route::get('/quanly/blog/update/{id}','App\Http\Controllers\admin\others@formupdateblog');
Route::post('/quanly/blog/updated/{id}','App\Http\Controllers\admin\others@updateblog');
Route::delete('/quanly/blog/delete/{id}','App\Http\Controllers\admin\others@delblog');

