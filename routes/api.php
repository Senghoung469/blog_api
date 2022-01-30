<?php
use Illuminate\Support\Facades\Route;
Route::fallback(function () {
    return response()->json([
        'message' => 'Page Not Found.'], 404);
});
Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {
    // Users
    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
    Route::get('/user/{id}', [\App\Http\Controllers\UserController::class, 'getUserById']);
    Route::post('/user', [\App\Http\Controllers\UserController::class, 'createUser']);
    Route::post('/user/{id}', [\App\Http\Controllers\UserController::class, 'updateUser']);
    Route::delete('/user/{id}', [\App\Http\Controllers\UserController::class, 'deleteUser']);
    // Auth
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
    // Category
    Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index']);
    Route::get('/category/{id}', [\App\Http\Controllers\CategoryController::class, 'getCategoryById']);
    Route::post('/category', [\App\Http\Controllers\CategoryController::class, 'createCategory']);
    Route::post('/category/{id}', [\App\Http\Controllers\CategoryController::class, 'updateCategory']);
    Route::delete('/category/{id}', [\App\Http\Controllers\CategoryController::class, 'deleteCategory']);
    // Tag
    Route::get('/tags', [\App\Http\Controllers\TagController::class, 'index']);
    Route::get('/tag/{id}', [\App\Http\Controllers\TagController::class, 'getTagById']);
    Route::post('/tag', [\App\Http\Controllers\TagController::class, 'createTag']);
    Route::post('/tag/{id}', [\App\Http\Controllers\TagController::class, 'updateTag']);
    Route::delete('/tag/{id}', [\App\Http\Controllers\TagController::class, 'deleteTag']);
    // Post
    Route::get('/post', [\App\Http\Controllers\PostController::class, 'index']);
    Route::get('/post/{id}', [\App\Http\Controllers\PostController::class, 'getPostById']);
    Route::post('/post', [\App\Http\Controllers\PostController::class, 'createPost']);
    // Upload
    Route::post('/uploader', [\App\Http\Controllers\ServiceController::class, 'uploader']);
});
