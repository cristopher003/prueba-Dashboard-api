<?php

use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\UserController;
use App\Http\Middleware\CorsMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('cors')->get('/hola', function () {
    return response()->json(['message' => 'Hola Mundo']);
});

Route::middleware(CorsMiddleware::class)->apiResource('users', UserController::class);
// Route::middleware([CorsMiddleware::class])->post('/users',  [UserController::class, 'store']);
// Route::middleware([CorsMiddleware::class])->post('/users', [UserController::class, 'store']);


// Route::post('/user', [UserController::class, 'create']);

Route::apiResource('departments', DepartmentController::class);

Route::apiResource('positions', PositionController::class);

//