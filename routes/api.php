<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\RideController;
use App\Http\Controllers\CancelController;

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

Route::post('/login',[UserController::class,'login']);
Route::get('/logout/{id}',[UserController::class,'logout']);
 
Route::prefix('/booking')->namespace('Booking')->group(function () {
    
    Route::get('/getAll',[BookingController ::class,'getAll']);
    Route::post('/save',[BookingController::class,'save']);
    Route::get('/delete/{id}',[BookingController ::class,'delete']);
 
});

Route::prefix('/ride')->namespace('Ride')->group(function () {

    Route::post('/save',[RideController::class,'save']);
    Route::get('/getAll',[RideController ::class,'getAll']);
});

Route::prefix('/payment')->namespace('Payment')->group(function () {

    Route::post('/save',[PaymentController::class,'save']);
 
});

Route::prefix('/cancelRide')->namespace('Payment')->group(function () {

    Route::post('/save',[CancelController::class,'save']);
 
});
Route::group(['middleware' => 'auth:sanctum'], function()

{
    
    
   

    });