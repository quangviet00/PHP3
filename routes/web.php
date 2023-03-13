<?php

use GrahamCampbell\ResultType\Result;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthtController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\NewsController;

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



Route::get('/', [ClientController::class ,'showNew']);

Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function(){

    Route::get('/user', [UserController::class ,'index'])->name('user.list');
    Route::delete('/user/delete/{id}', [UserController::class ,'delete'])->name('user.delete');
    //news
   Route::get('/new',[NewsController::class,'index'])->name('new');
   Route::get('/new/quanlydangtin',[NewsController::class,'quanlydangtin'])->name('new/quanlydangtin');
   Route::get('/new/create',[NewsController::class,'create'])->name('new.create');
   Route::get('/new/edit/{id}',[NewsController::class,'edit'])->name('new.edit');
   Route::get('/new/detail/{id}',[NewsController::class,'detail'])->name('new.detail');
   Route::post('/new/store',[NewsController::class,'store'])->name('new.store');
   Route::put('/new/update/{new}',[NewsController::class,'update'])->name('new.update');
   Route::delete('/new/delete/{id}',[NewsController::class,'delete'])->name('new.delete');
   Route::get('/new/status/{new}', [NewsController::class, 'status'])->name('new.status');
});

Route::middleware('guest')->prefix('/auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthtController::class, 'getLogin'])->name('getLogin');
    Route::post('/login', [AuthtController::class, 'postLogin'])->name('postLogin');

});
//logout
Route::get('/auth/logout', [AuthtController::class, 'logout'])->middleware('auth');
Route::prefix('/auth')->name('auth.')->group(function(){
    Route::get('/register',[AuthtController::class,'getRegister'])->name('getRegister');
    Route::post('/register',[AuthtController::class,'postRegister'])->name('postRegister');
});
// Route::prefix('/admin')->name('admin.')->group(function(){
//     Route::get('/user', [UserController::class ,'index'])->name('user.list');
//     Route::delete('/user/delete/{id}', [UserController::class ,'delete'])->name('user.delete');
//     //news
//    Route::get('/new',[NewsController::class,'index'])->name('new');
//    Route::get('/new/quanlydangtin',[NewsController::class,'quanlydangtin'])->name('new/quanlydangtin');
//    Route::get('/new/create',[NewsController::class,'create'])->name('new.create');
//    Route::get('/new/edit/{id}',[NewsController::class,'edit'])->name('new.edit');
//    Route::get('/new/detail/{id}',[NewsController::class,'detail'])->name('new.detail');
//    Route::post('/new/store',[NewsController::class,'store'])->name('new.store');
//    Route::put('/new/update/{new}',[NewsController::class,'update'])->name('new.update');
//    Route::delete('/new/delete/{id}',[NewsController::class,'delete'])->name('new.delete');
//    Route::get('/new/status/{new}', [NewsController::class, 'status'])->name('new.status');
// });



