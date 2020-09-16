<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ConsumerController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('consumers', ConsumerController::class);
Route::get('consumers/filter', [ConsumerController::class, 'filter']);