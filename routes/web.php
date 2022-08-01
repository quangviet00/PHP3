<?php

use GrahamCampbell\ResultType\Result;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

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





Route::middleware('auth')->prefix('/user')->name('user.')->group(function(){
    Route::get('/', [UserController::class ,'index'])->name('list');

    //delete user
    Route::delete('/delete/{id}',[UserController::class,'delete'])->name('delete');
    Route::post('/store',[UserController::class,'store'])->name('store');
    //add user
    Route::get('/add',[UserController::class,'add'])->name('add');
    Route::post('/store', [UserController::class, 'store'])->name('store');

    //update user
    Route::get('/edit/{id}',[UserController::class,'edit'])->name('edit');
    Route::post('/update/{id}',[UserController::class,'update'])->name('update');



});
//position
Route::prefix('/position')->name('position')->group(function(){
    Route::get('/', [PositionController::class ,'index'])->name('list');
});
//room
Route::get('/room', [RoomController::class ,'index'])->name('room.list')->middleware('auth');
// product
Route::prefix('/product')->name('product.')->group(function(){
    Route::get('/', [ProductController::class ,'index'])->name('list');
    //add
    Route::get('/add',[ProductController::class,'add'])->name('add');
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    //delete
    Route::delete('/delete/{id}',[ProductController::class,'delete'])->name('delete');
    //update
    Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit');
    Route::post('/update/{id}',[ProductController::class,'update'])->name('update');
    Route::get('/update-status/{id}',[ProductController::class,'update_status'])->name('update-status');


});
//login
Route::middleware('guest')->prefix('/auth')->name('auth.')->group(function(){
    Route::get('/login',[AuthController::class,'getLogin'])->name('login');
    Route::post('/login',[AuthController::class,'postLogin'])->name('login');

});
//logout
Route::get('/auth/logout', [AuthController::class, 'logout'])->middleware('auth');


