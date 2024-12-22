<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts/index', [PostController::class, 'index']);
Route::get('/posts/{post}/show', [PostController::class, 'show']);
Route::get('/posts/store', [PostController::class, 'store']);
Route::get('/posts/{post}/update', [PostController::class, 'update']);
Route::get('/posts/{post}/destroy', [PostController::class, 'destroy']);

Route::get('/profiles/index', [ProfileController::class, 'index']);
Route::get('/profiles/{profile}/show', [ProfileController::class, 'show']);
Route::get('/profiles/store', [ProfileController::class, 'store']);
Route::get('/profiles/{profile}/update', [ProfileController::class, 'update']);
Route::get('/profiles/{profile}/destroy', [ProfileController::class, 'destroy']);

Route::get('/roles/index', [RoleController::class, 'index']);
Route::get('/roles/{role}/show', [RoleController::class, 'show']);
Route::get('/roles/store', [RoleController::class, 'store']);
Route::get('/roles/{role}/update', [RoleController::class, 'update']);
Route::get('/roles/{role}/destroy', [RoleController::class, 'destroy']);

Route::get('/tags/index', [TagController::class, 'index']);
Route::get('/tags/{tag}/show', [TagController::class, 'show']);
Route::get('/tags/store', [TagController::class, 'store']);
Route::get('/tags/{tag}/update', [TagController::class, 'update']);
Route::get('/tags/{tag}/destroy', [TagController::class, 'destroy']);

Route::get('/users/index', [UserController::class, 'index']);
Route::get('/users/{user}/show', [UserController::class, 'show']);
Route::get('/users/store', [UserController::class, 'store']);
Route::get('/users/{user}/update', [UserController::class, 'update']);
Route::get('/users/{user}/destroy', [UserController::class, 'destroy']);
