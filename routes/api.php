<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VariantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//public route
//for basic crud api
//Route::resource('products', ProductController::class);

// Route::get('/products/search/{name}', [ProductController::class, 'search']);
// Route::get('/products', [ProductController::class, 'index']);
// Route::post('/products/{id}', [ProductController::class, 'show']);
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);


// //Protected route
// Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::post('/products', [ProductController::class, 'store']);
//     Route::delete('/products/{id}', [ProductController::class, 'destroy']);
//     Route::put('/products/{id}', [ProductController::class, 'update']);
//     Route::post('/logout', [AuthController::class, 'logout']);
// });

// products group
Route::prefix('/products')->group(function () {
    Route::get('/search/{name}', [ProductController::class, 'search']);
    Route::get('/', [ProductController::class, 'index']);
    Route::post('/{id}', [ProductController::class, 'show']);
    Route::post('/', [ProductController::class, 'store']);
    Route::delete('/{id}', [ProductController::class, 'destroy']);
    Route::put('/{id}', [ProductController::class, 'update']);
});

// products variants group
Route::prefix('/variants')->group(function(){
    Route::get('/', [VariantController::class, 'index']);
    Route::post('/add',[VariantController::class, 'store']);
    Route::get('/search/{name}', [VariantController::class, 'search']);
});

// Product variants ID group

Route::prefix('/variants/{id}')->group(function(){
    Route::put('/', [VariantController::class, 'update']);
    Route::delete('/', [VariantController::class, 'destroy']);
    Route::post('/', [VariantController::class, 'show']);
});