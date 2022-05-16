<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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
Route::prefix('/products/variants')->group(function(){
    Route::get('/search/{variant}', [ProductController::class, 'searchVariants']);
    Route::put('/add/{id}',[ProductController::class, 'addVariants']); // not updating the null values
    Route::patch('/update/{id}', [ProductController::class, 'updateVariants']);
});
// products variantsID group
Route::prefix('/products/variants/{variantID}')->group(function(){
    Route::get('/', [ProductController::class, 'searchViaVariantID']);
});