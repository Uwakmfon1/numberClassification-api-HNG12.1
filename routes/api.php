<?php

use App\Http\Controllers\ClassificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/get', function(){
    return "you just got me";
});

Route::get('number/{temp}',[ClassificationController::class,'index']);

Route::get('/func/{temp}',[ClassificationController::class,'funFact']);
//
