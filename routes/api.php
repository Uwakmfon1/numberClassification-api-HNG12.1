<?php

use App\Http\Controllers\ClassificationController;
use Illuminate\Support\Facades\Route;



Route::get('classify-number',[ClassificationController::class,'index']);
