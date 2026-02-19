<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [UserController::class, 'login'])->name('user.login');

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('/boards', BoardController::class)->only(['index', 'store', 'update', 'destroy']);
});
