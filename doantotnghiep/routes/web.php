<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\QuanController;
use App\Http\Controllers\Admin\PhuongController;

use App\Http\Controllers\Admin\Users\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PagesController;
use App\Http\Controllers\Auth\DangtinController;
use App\Http\Controllers\Auth\CommentController;
use App\Http\Controllers\Auth\SendmailController;
use App\Http\Controllers\Admin\BinhluanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoaiPhongController;

use App\Models\Dangtin;

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

//Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
//Route::post('admin/users/login/store', [LoginController::class, 'store']);

//Route::middleware(['auth'])->group(function () {
//
//
//        Route::get('admin/main', [MainController::class, 'index'])->name('admin');
//
//
//        });
//Route::prefix('admin')->group(function () {
//    Route::get('/main', [MainController::class, 'index']);
//    Route::get('/quan',[QuanController::class,'index']);
//    Route::get('/quan/create',[QuanController::class,'create']);
//    Route::get('quan/store',[QuanController::class,'store']);
//    Route::get('/quan/{id}',[QuanController::class,'show']);
//
//    Route::get('/phuong',[HuyenController::class,'index']);
//
//});
//Route::get('admin/login', [AdminController::class, 'index'])->name('login');

//Route::middleware('admin')->group(function (){
//    Route::get('admin/login', [AdminController::class, 'index'])->name('login');
//    Route::post('admin/main', [AdminController::class, 'LoginPost'])->name('admin.dashboard');


Route::get('admin/logout',[AdminController::class,'logout'])->name('logout');


Route::get('admin/login',[AdminController::class,'index'])->name('admin.login');
Route::post('admin/main', [AdminController::class, 'LoginPost'])->name('admin.main');

Route::middleware(['auth'])->group(function (){
    Route::prefix('admin/')->group(function () {
        Route::get('main', [MainController::class, 'index']);
        Route::get('/quan',[QuanController::class,'index'])->name('admin.quan');
        Route::get('/quan/create',[QuanController::class,'create'])->name('admin.quan.create');
        Route::post('quan/store',[QuanController::class,'store'])->name('admin.quan.store');
        Route::get('/quan/{id}',[QuanController::class,'show'])->name('show');
        Route::get('/quan/edit/{quan}',[QuanController::class,'edit'])->name('admin.quan.edit');
        Route::post('quan/update/{quan}',[QuanController::class,'update'])->name('update');
        Route::get('admin/quan/destroy/{id}',[QuanController::class,'destroy'])->name('admin.quan.destroy');

        Route::get('/phuong',[PhuongController::class,'index'])->name('admin.phuong');
        Route::get('/phuong/create',[PhuongController::class,'create'])->name('admin.phuong.create');
        Route::post('phuong/store',[PhuongController::class,'store'])->name('admin.phuong.store');

        Route::get('slide',[\App\Http\Controllers\Admin\SlideController::class,'index'])->name('admin.slide');
        Route::get('/slide/create',[\App\Http\Controllers\Admin\SlideController::class,'create'])->name('admin.slide.create');
        Route::post('slide/store',[\App\Http\Controllers\Admin\SlideController::class,'store'])->name('admin.slide.store');

        Route::get('/dangtin',[\App\Http\Controllers\Admin\DangtinController::class,'index'])->name('admin.dangtin');
        Route::post('duyetbaidang',[\App\Http\Controllers\Admin\DangtinController::class,'duyetbaidang']);

        Route::get('binhluan',[BinhluanController::class,'index'])->name('admin.binhluan');

        Route::get('taikhoannguoidung',[UserController::class,'index'])->name('admin.taikhoan');
        Route::post('duyettaikhoan',[UserController::class,'duyettaikhoan']);

        Route::get('loaiphong',[LoaiPhongController::class,'index'])->name('admin.loaiphong');
        Route::post('loaiphong/destroy/{id}',[QuanController::class,'destroy'])->name('admin.loaiphong.destroy');
    });
});

Route::get('trangchu',[PagesController::class,'trangchu'])->name('trangchu');

Route::get('dangky',[PagesController::class,'showRegister'])->name('show-register');
Route::post('dangky',[PagesController::class,'register'])->name('register');
Route::get('dangnhap',[PagesController::class,'getDangnhap'])->name('show-login');
Route::post('dangnhap',[PagesController::class,'postDangnhap'])->name('login');
Route::get('logout',[PagesController::class,'logout'])->name('logout');

Route::get('dangtin',[DangtinController::class,'index'])->name('dangtin');
Route::post('dangtin',[DangtinController::class,'create'])->name('create');
Route::get('trangchitiet/{id}',[DangtinController::class,'trangchitiet'])->name('trangchitiet');
Route::post('rating',[DangtinController::class,'rating'])->name('rating');

Route::get('nguoidung',[PagesController::class,'getnguoidung'])->name('nguoidung');
Route::post('nguoidung/{user}',[PagesController::class,'updatenguoidung'])->name('update');

Route::get('getupdatepassword',[PagesController::class,'getupdatepassword'])->name('password');
Route::post('postupdatepassword',[PagesController::class,'updatepassword'])->name('updatepassword');
Route::get('forgetPassword',[PagesController::class,'forgetPass'])->name('forgetPass');
Route::post('forget-password',[PagesController::class,'postforgetPass']);

Route::get('get_password/{user}/{token}',[PagesController::class,'getPass'])->name('getPass');
Route::post('get_password/{user}/{token}',[PagesController::class,'postgetPass']);


Route::post('comment/{id}',[CommentController::class,'comment'])->name('comment');







//Route::get('3',function (){
//    $result = App\Models\User::find(1)->Dangtin->toArray();
//    echo '<pre>';
//    print_r($result);
//});
//Route::get('4',function (){
//    $result = App\Models\Duong::find(1)->dangtin->toArray();
//    echo '<pre>';
//    print_r($result);
//});
