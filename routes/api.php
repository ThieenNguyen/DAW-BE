<?php
use App\Http\Controllers\ColorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductLikeViewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SlideShowController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// users
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
});

// colors
Route::prefix('colors')->group(function () {
    Route::get('/', [ColorController::class, 'index']);
    Route::post('/', [ColorController::class, 'store']);
    Route::put('/update/{id}', [ColorController::class, 'update']);
    Route::delete('/destroy/{id}', [ColorController::class, 'destroy']);
});

// orders
Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index']);
    Route::get('/{id}', [OrderController::class, 'getOrderById']);
    Route::put('/{id}/status', [OrderController::class, 'updateOrderStatus']);
    Route::delete('/{id}', [OrderController::class, 'destroy']);
});

//categoryD
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::post('/store', [CategoryController::class, 'store']);
    Route::get('/search', [CategoryController::class, 'search']);
    Route::get('/show/{id}', [CategoryController::class, 'show']);
    Route::put('/update/{id}', [CategoryController::class, 'update']);
    Route::delete('/destroy/{id}', [CategoryController::class, 'destroy']);
});

// products
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::post('/', [ProductController::class, 'store']);
    Route::get('/{id}', [ProductController::class, 'getById']);
    Route::post('/{id}', [ProductController::class, 'update']);
});
// products-like-view
Route::prefix('products-like-view')->group(function () {
    Route::get('/', [ProductLikeViewController::class, 'index']);
});


//size 
Route::prefix('sizes')->group(function () {
    Route::get('/', [SizeController::class, 'index']);
    Route::post('/store/', [SizeController::class, 'store']); // Thêm một kích thước mới
    Route::put('/update/{id}', [SizeController::class, 'update']); // Cập nhật thông tin một kích thước theo ID
    Route::delete('/{id}', [SizeController::class, 'destroy']); // Xóa một kích thước theo ID
});
Route::prefix('slideshows')->group(function () {
    Route::get('/', [SlideShowController::class, 'index']);
    Route::post('/store/', [SlideShowController::class, 'store']); // Thêm một kích thước mới
    Route::put('/update/{id}', [SlideShowController::class, 'update']); // Cập nhật thông tin một kích thước theo ID
    Route::delete('/destroy/{id}', [SlideShowController::class, 'destroy']); // Xóa một kích thước theo ID
});