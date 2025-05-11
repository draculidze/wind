<?php

use App\Http\Controllers\Api\Admin\CategoryController;
use App\Http\Controllers\Api\Admin\PostController;
use App\Http\Controllers\Api\Admin\ProfileController;
use App\Http\Controllers\Api\Admin\RoleController;
use App\Http\Controllers\Api\Admin\TagController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('auth/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'jwt.auth', 'prefix' => 'auth'], function ($router) {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::get('/posts/{post}', [PostController::class, 'show']);

Route::group(['middleware' => ['jwt.auth', IsAdminMiddleware::class]], function ($router) {
    Route::get('/posts', [PostController::class, 'index']);

    Route::post('/posts', [PostController::class, 'store']);
    Route::patch('/posts/{post}', [PostController::class, 'update']);
    Route::delete('/posts/{post}', [PostController::class, 'destroy']);

    Route::apiResource('/profiles', ProfileController::class);
    Route::apiResource('/categories', CategoryController::class);
    Route::apiResource('/roles', RoleController::class);
    Route::apiResource('/tags', TagController::class);
});

