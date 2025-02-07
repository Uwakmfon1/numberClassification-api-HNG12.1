<?php

use App\Http\Controllers\ClassificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('number/{temp}',[ClassificationController::class,'index']);

//
