<?php

use App\Http\Controllers\Api\GetCountriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/api')->group(function () {
    Route::get('countries', GetCountriesController::class);
});
