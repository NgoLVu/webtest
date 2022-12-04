<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\LoaitinController;
use App\Http\Controllers\TinTucController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Models\TheLoaiModel;
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

Route::get('admin/dangnhap',[AuthController::class,'getDangnhap'])->name('Dangnhap');
Route::post('admin/dangnhap',[AuthController::class,'postDangnhap'])->name('postDangNhap');
Route::get('admin/logout',[AuthController::class,'postLogOut'])->name('postLogOut');

Route::prefix('admin')->middleware('AdminLogin')->group(function(){
    Route::get('/', function () {
        return view('layouts.admin');
    })->name('home');
Route::prefix('user')->name('user.')->group(function(){
    Route::get('/',[UserController::class,'index'])->name('index');
    Route::get('/create',[UserController::class,'create'])->name('create');
    Route::post('/create',[UserController::class,'store'])->name('store');
    Route::get('/edit/{id}',[UserController::class,'edit'])->name('edit');
    Route::post('/update',[UserController::class,'update'])->name('update');
    Route::get('/delete/{id}',[UserController::class,'destroy'])->name('delete');
});
Route::prefix('category')->name('category.')->group(function(){
    Route::get('/',[TheLoaiController::class,'index'])->name('index');
    Route::get('/create',[TheLoaiController::class,'create'])->name('create');
    Route::post('/create',[TheLoaiController::class,'store'])->name('store');
    Route::get('/edit/{id}',[TheLoaiController::class,'edit'])->name('edit');
    Route::post('/update',[TheLoaiController::class,'update'])->name('update');
    Route::get('/delete/{id}',[TheLoaiController::class,'destroy'])->name('delete');
});
Route::prefix('slide')->name('slide.')->group(function(){
    Route::get('/',[SlideController::class,'index'])->name('index');
    Route::get('/create',[SlideController::class,'create'])->name('create');
    Route::post('/create',[SlideController::class,'store'])->name('store');
    Route::get('/edit/{id}',[SlideController::class,'edit'])->name('edit');
    Route::post('/update',[SlideController::class,'update'])->name('update');
    Route::get('/delete/{id}',[SlideController::class,'destroy'])->name('delete');
});
Route::prefix('Loai-tin')->name('Loaitin.')->group(function(){
    Route::get('/',[LoaitinController::class,'index'])->name('index');
    Route::get('/create',[LoaitinController::class,'create'])->name('create');
    Route::post('/create',[LoaitinController::class,'store'])->name('store');
    Route::get('/edit/{id}',[LoaitinController::class,'edit'])->name('edit');
    Route::post('/update',[LoaitinController::class,'update'])->name('update');
    Route::get('/delete/{id}',[LoaitinController::class,'destroy'])->name('delete');
});
Route::prefix('Tin-tuc')->name('Tintuc.')->group(function(){
    Route::get('/',[TinTucController::class,'index'])->name('index');
    Route::get('/create',[TinTucController::class,'create'])->name('create');
    Route::post('/create',[TinTucController::class,'store'])->name('store');
    Route::get('/edit/{id}',[TinTucController::class,'edit'])->name('edit');
    Route::post('/update',[TinTucController::class,'update'])->name('update');
    Route::get('/delete/{id}',[TinTucController::class,'destroy'])->name('delete');
});
Route::get('comment',function(){
    return view('admin.comment.index');
})->name('comment');
});
// Phần route ở phía view client
Route::get('/',[PageController::class,'trangchu'])->name('trangchu');
Route::get('/lienhe',[PageController::class,'lienhe'])->name('lienhe');
Route::get('/loaitin/{id}.html',[PageController::class,'loaitin'])->name('loaitin');
Route::get('/tintuc/{id}.html',[PageController::class,'tintuc'])->name('tintuc');
Route::post('timkiem',[PageController::class,'timkiem'])->name('timkiem');

Route::get('dangnhap',[PageController::class,'getDangnhap'])->name('Dangnhap_U');
Route::post('dangnhap',[PageController::class,'postDangnhap'])->name('postDangNhap_U');
Route::get('logout',[PageController::class,'postLogOut'])->name('postLogOut_U');
