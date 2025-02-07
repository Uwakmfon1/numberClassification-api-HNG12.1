<?php

use App\Http\Controllers\ClassificationController;
use Illuminate\Support\Facades\Route;



Route::get('number/{temp}',[ClassificationController::class,'index']);
