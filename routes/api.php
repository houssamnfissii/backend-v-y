<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CbrandController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CmodelController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Models\Cmodel;
use App\Models\Reservation;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::post('/login',[AuthController::class,'login']);
// Route::post('/register',[AuthController::class,'register']);
// Route::post('/logout',[AuthController::class,'logout']);



Route::get('cars/car_offers',[CarController::class,'car_offers']);
Route::get('cars/{id}',[CarController::class,'show']);
Route::get('cbrands',[CbrandController::class,'index']);
Route::get('cmodels',[CmodelController::class,'index']);
Route::get('cmodels/findBrand/{id}',[CmodelController::class,'findBrand']);
Route::get('cities',[CityController::class,'index']);
Route::post('reservations',[ReservationController::class,'store']);

