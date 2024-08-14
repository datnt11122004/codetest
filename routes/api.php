<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('products')->group(function (){
    Route::get('/',[\App\Http\Controllers\API\MusicialsController::class,'index']);//danh sách
    Route::post('/',[\App\Http\Controllers\API\MusicialsController::class,'store']);//thêm
    Route::get('/{id}',[\App\Http\Controllers\API\MusicialsController::class,'show']);//chi tiết
    Route::put('/{id}',[\App\Http\Controllers\API\MusicialsController::class,'update']);//sửa
    Route::delete('/{id}',[\App\Http\Controllers\API\MusicialsController::class,'destroy']);//xóa
});
