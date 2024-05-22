<?php

use App\Http\Controllers\App\DepartmentController;
use App\Http\Controllers\App\PositionController;
use App\Http\Controllers\App\UserController;
use App\Http\Middleware\CorsMiddleware;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('cors')->get('/hola', function () {
    return response()->json(['message' => 'Hola Mundo']);
});

Route::middleware(CorsMiddleware::class)->apiResource('users', UserController::class);

Route::apiResource('departments', DepartmentController::class);

Route::apiResource('positions', PositionController::class);

//